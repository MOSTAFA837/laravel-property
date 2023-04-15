<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Amenitie;
use App\Models\PropertyType;
use App\Models\User;
use App\Models\Property;
use App\Models\MultiImg;
use App\Models\Facility;

use Intervention\Image\Facades\Image;
use Carbon\Carbon;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class PropertyController extends Controller
{
    public function view()
    {
        $properties = Property::latest()->get();

        return view('backend.property.view', compact('properties'));
    }

    public function add()
    {
        $amenities = Amenitie::latest()->get();
        $property_types = PropertyType::latest()->get();
        $active_agents = User::where('status', 'active')
            ->where('role', 'agent')
            ->latest()
            ->get();

        return view('backend.property.add', compact('amenities', 'property_types', 'active_agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'amenities' => 'required',
        ]);

        $amenities_arr = $request->amenities;
        $amenities = implode(',', $amenities_arr);
        // dd($amenities);

        $property_code = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 8,
            'prefix' => 'PROP',
        ]);

        $image = $request->file('property_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        $image_url = 'upload/property/thambnail/' . $name_gen;
        Image::make($image)
            ->resize(570, 350)
            ->save($image_url);

        $property_id = Property::insertGetId([
            'property_code' => $property_code,

            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),

            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,

            'property_thambnail' => $image_url,

            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,

            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'neighborhood' => $request->neighborhood,

            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,

            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenities,
            'agent_id' => $request->agent_id,

            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,

            'featured' => $request->featured,
            'hot' => $request->hot,

            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // multi images
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $img_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();

            $uploadPath = 'upload/property/multi_images/' . $img_name;

            Image::make($img)
                ->resize(770, 520)
                ->save($uploadPath);

            MultiImg::insert([
                'property_id' => $property_id,
                'img_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        // facilities
        $facilities = Count($request->facility_name);
        if ($facilities !== null) {
            for ($i = 0; $i < $facilities; $i++) {
                $facility = new Facility();

                $facility->property_id = $property_id;
                $facility->facility_name = $request->facility_name[$i];
                $facility->distance = $request->distance[$i];
                $facility->save();
            }
        }

        $notification = [
            'message' => 'Property Inserted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.property')
            ->with($notification);
    }
}
