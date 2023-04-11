<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PropertyType;

class PropertyTypeController extends Controller
{
    public function view()
    {
        $types = PropertyType::latest()->get();

        return view('backend.type.view', compact('types'));
    }

    public function add()
    {
        return view('backend.type.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',
        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = [
            'message' => 'Property type added successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.type')
            ->with($notification);
    }

    public function edit($id)
    {
        $type = PropertyType::findOrFail($id);

        return view('backend.type.edit', compact('type'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required',
            'type_icon' => 'required',
        ]);

        PropertyType::findOrFail($id)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,
        ]);

        $notification = [
            'message' => 'Property type updated successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->route('all.type')
            ->with($notification);
    }

    public function delete($id)
    {
        PropertyType::findOrFail($id)->delete();

        $notification = [
            'message' => 'Property type deleted successfully',
            'alert-type' => 'success',
        ];

        return redirect()
            ->back()
            ->with($notification);
    }
}
