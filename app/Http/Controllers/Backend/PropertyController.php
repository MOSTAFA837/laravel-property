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
        $amenites_arr = $request->amenities;
        $amenites = implode(',', $amenites_arr);
        // dd($amenites);

        $property_code = IdGenerator::generate([
            'table' => 'properties',
            'field' => 'property_code',
            'length' => 5,
            'prefix' => 'PC',
        ]);

        $image = $request->file('property_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $save_url = 'upload/property/thambnail/' . $name_gen;

        Image::make($image)
            ->resize(370, 250)
            ->save($save_url);

        $property_id = Property::insertGetId([
            'property_code' => $property_code,
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),
            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,
            'ptype_id' => $request->ptype_id,
            'amenities_id' => $amenites,
            'short_descp' => $request->short_descp,
            'long_descp' => $request->long_descp,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'garage' => $request->garage,
            'garage_size' => $request->garage_size,
            'property_size' => $request->property_size,
            'property_video' => $request->property_video,
            'address' => $request->address,
            'city' => $request->city,
            'state' => $request->state,
            'postal_code' => $request->postal_code,
            'neighborhood' => $request->neighborhood,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'featured' => $request->featured,
            'hot' => $request->hot,
            'agent_id' => $request->agent_id,
            'property_thambnail' => $save_url,
            'status' => 1,
            'created_at' => Carbon::now(),
        ]);

        // Multiple Image
        $images = $request->file('multi_img');
        foreach ($images as $img) {
            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            Image::make($img)
                ->resize(770, 520)
                ->save('upload/property/multi_images/' . $make_name);
            $uploadPath = 'upload/property/multi_images/' . $make_name;

            MultiImg::insert([
                'property_id' => $property_id,
                'img_name' => $uploadPath,
                'created_at' => Carbon::now(),
            ]);
        }

        // Facilities
        $facilities = Count($request->facility_name);

        if ($facilities != null) {
            for ($i = 0; $i < $facilities; $i++) {
                $fcount = new Facility();
                $fcount->property_id = $property_id;
                $fcount->facility_name = $request->facility_name[$i];
                $fcount->distance = $request->distance[$i];
                $fcount->save();
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

    public function edit($id)
    {
        $property = Property::findOrFail($id);

        $propertyAmenities = $property->amenities_id;
        $explodedPropertyAmenities = explode(',', $propertyAmenities);

        $propertyTypes = PropertyType::latest()->get();
        $amenities = Amenitie::latest()->get();
        $activeAgents = User::where('status', 'active')
            ->where('role', 'agent')
            ->latest()
            ->get();

        $multiImages = MultiImg::where('property_id', $id)->get();

        return view('backend.property.edit', compact('property', 'propertyTypes', 'amenities', 'activeAgents', 'explodedPropertyAmenities', 'multiImages'));
    }

    public function update(Request $request)
    {
        $property_id = $request->id;

        $amenities_arr = $request->amenities_id;
        $amenities = implode(',', $amenities_arr);

        Property::findOrFail($property_id)->update([
            'property_name' => $request->property_name,
            'property_slug' => strtolower(str_replace(' ', '-', $request->property_name)),

            'property_status' => $request->property_status,
            'lowest_price' => $request->lowest_price,
            'max_price' => $request->max_price,

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

            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Property Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.property')
            ->with($notification);
    }

    public function updateThambnail(Request $request)
    {
        $property_id = $request->id;

        $newImage = $request->file('property_thambnail');
        $name_gen = hexdec(uniqid()) . '.' . $newImage->getClientOriginalExtension();

        $newImageUrl = 'upload/property/thambnail/' . $name_gen;
        Image::make($newImage)
            ->resize(570, 350)
            ->save($newImageUrl);

        $oldImage = $request->old_img;
        if (file_exists($oldImage)) {
            unlink($oldImage);
        }

        Property::findOrFail($property_id)->update([
            'property_thambnail' => $newImageUrl,
            'updated_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Property Image Thambnail Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    public function updateMultiImage(Request $request)
    {
        $multiImages = $request->multi_img;

        foreach ($multiImages as $id => $img) {
            $deleteImage = MultiImg::findOrFail($id);
            unlink($deleteImage->img_name);

            $make_name = hexdec(uniqid()) . '.' . $img->getClientOriginalExtension();
            $uploadPath = 'upload/property/multi_images/' . $make_name;

            Image::make($img)
                ->resize(770, 520)
                ->save($uploadPath);

            MultiImg::where('id', $id)->update([
                'img_name' => $uploadPath,
                'updated_at' => Carbon::now(),
            ]);
        }

        $notification = [
            'message' => 'Property Multi Image Updated Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    public function deleteMultiImage($id)
    {
        $oldImg = MultiImg::findOrFail($id);

        unlink($oldImg->img_name);
        $oldImg->delete();

        $notification = [
            'message' => 'Property Multi Image Deleted Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }

    public function storeMultiImage(Request $request)
    {
        $property_id = $request->image_property_id;
        $image = $request->file('multi_img');

        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image_url = 'upload/property/multi_images/' . $name_gen;

        Image::make($image)
            ->resize(770, 520)
            ->save($image_url);

        MultiImg::insert([
            'property_id' => $property_id,
            'img_name' => $image_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = [
            'message' => 'Property Multi Image Added Successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
