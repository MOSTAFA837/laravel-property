<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenitie;

class AmenitieController extends Controller
{
    public function view()
    {
        $amenities = Amenitie::latest()->get();

        return view('backend.amenitie.view', compact('amenities'));
    }

    public function add()
    {
        return view('backend.amenitie.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'amenitie_name' => 'required|max:200',
        ]);

        Amenitie::insert([
            'amenitie_name' => $request->amenitie_name,
        ]);

        $notification = [
            'message' => 'Amenitie created successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.amenitie')
            ->with($notification);
    }

    public function edit($id)
    {
        $amenitie = Amenitie::findOrFail($id);

        return view('backend.amenitie.edit', compact('amenitie'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'amenitie_name' => 'required|max:200',
        ]);

        Amenitie::findOrFail($id)->update([
            'amenitie_name' => $request->amenitie_name,
        ]);

        $notification = [
            'message' => 'Amenitie updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.amenitie')
            ->with($notification);
    }

    public function delete($id)
    {
        Amenitie::findOrFail($id)->delete();

        $notification = [
            'message' => 'Amenitie deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
