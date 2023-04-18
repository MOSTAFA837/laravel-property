@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property </h6>

                            <form method="POST" action="{{ route('update.property', $property->id) }}" class="forms-sample">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Name </label>
                                            <input type="text" name="property_name" class="form-control"
                                                value="{{ $property->property_name }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select name="property_status" class="form-select"
                                                id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="rent"
                                                    {{ $property->property_status == 'rent' ? 'selected' : '' }}>
                                                    For Rent
                                                </option>
                                                <option value="buy"
                                                    {{ $property->property_status == 'buy' ? 'selected' : '' }}>
                                                    For Buy
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Lowest Price </label>
                                            <input type="text" name="lowest_price" class="form-control"
                                                value="{{ $property->lowest_price }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Max Price </label>
                                            <input type="text" name="max_price" class="form-control"
                                                value="{{ $property->max_price }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">BedRooms</label>
                                            <input type="text" name="bedrooms" class="form-control"
                                                value="{{ $property->bedrooms }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" name="bathrooms" class="form-control"
                                                value="{{ $property->bathrooms }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" name="garage" class="form-control"
                                                value="{{ $property->garage }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" name="garage_size"
                                                class="form-control"value="{{ $property->garage_size }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control"
                                                value="{{ $property->address }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" class="form-control"
                                                value="{{ $property->city }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" name="postal_code" class="form-control"
                                                value="{{ $property->postal_code }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code </label>
                                            <input type="text" name="postal_code" class="form-control"
                                                value="{{ $property->postal_code }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Size</label>
                                            <input type="text" name="property_size" class="form-control"
                                                value="{{ $property->property_size }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Video</label>
                                            <input type="text" name="property_video" class="form-control"
                                                value="{{ $property->property_video }}">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Neighborhood</label>
                                            <input type="text" name="neighborhood" class="form-control"
                                                value="{{ $property->neighborhood }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" name="latitude" class="form-control"
                                                value="{{ $property->latitude }}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                                target="_blank">Go here to get Latitude from address</a>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" name="longitude" class="form-control"
                                                value="{{ $property->longitude }}">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                                target="_blank">Go here to get Longitude from address</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Type </label>
                                            <select name="ptype_id" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Type</option>
                                                @foreach ($propertyTypes as $ptype)
                                                    <option value="{{ $ptype->id }}"
                                                        {{ $ptype->id == $property->ptype_id ? 'selected' : '' }}>
                                                        {{ $ptype->type_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Amenities </label>
                                            <select name="amenities_id[]" class="js-example-basic-multiple form-select"
                                                multiple="multiple" data-width="100%">

                                                @foreach ($amenities as $amenitie)
                                                    <option value="{{ $amenitie->amenitie_name }}"
                                                        {{ in_array($amenitie->amenitie_name, $explodedPropertyAmenities) ? 'selected' : '' }}>
                                                        {{ $amenitie->amenitie_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label"> Agent </label>
                                            <select name="agent_id" class="form-select" id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Agent</option>
                                                @foreach ($activeAgents as $agent)
                                                    <option value="{{ $agent->id }}"
                                                        {{ $agent->id == $property->agent_id ? 'selected' : '' }}>
                                                        {{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3">
                                            {{ $property->short_descp }}
                                        </textarea>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Long Description</label>
                                        <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10">
                                            {!! $property->long_descp !!}
                                        </textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="featured" value="1" class="form-check-input"
                                            id="checkInline1" {{ $property->featured == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline1">
                                            Featured Property
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="hot" value="1" class="form-check-input"
                                            id="checkInline" {{ $property->hot == '1' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="checkInline">
                                            Hot Property
                                        </label>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Thambnail --}}
    <div class="page-content" style="margin-top: -35px;">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Main Thambnail Image </h6>

                            <form method="post" action="{{ route('update.property.thambnail', $property->id) }}"
                                id="myForm" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="old_img" value="{{ $property->property_thambnail }}">

                                <div class="row mb-3">
                                    <div class="form-group col-md-6">
                                        <label class="form-label">Main Thambnail </label>
                                        <input type="file" name="property_thambnail" class="form-control"
                                            onChange="mainThambUrl(this)">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label"> </label>
                                        <img id="mainThamb" src="{{ asset($property->property_thambnail) }}"
                                            style="width:150px; height:120px; object-fit: cover; margin-top:10px; border-radius: 10px">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Update Thumbnail</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- multi images --}}
    <div class="page-content" style="margin-top: -35px;">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Multi Images </h6>

                            <form method="post" action="{{ route('update.property.multiimage') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Image</th>
                                                <th>Change Image </th>
                                                <th>Delete </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($multiImages as $key => $img)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>

                                                    <td class="py-1">
                                                        <img src="{{ asset($img->img_name) }}" alt="image"
                                                            style="width:120px; height:70px;object-fit: cover">
                                                    </td>

                                                    <td>
                                                        <input type="file" class="form-control"
                                                            name="multi_img[{{ $img->id }}]">
                                                    </td>

                                                    <td>
                                                        <input type="submit" class="btn btn-primary px-4"
                                                            value="Update Image">

                                                        <a href="{{ route('delete.property.multiimage', $img->id) }}"
                                                            class="btn btn-danger" id="delete">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <form method="post" action="{{ route('store.property.multiimage') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="image_property_id" value="{{ $property->id }}">

                                <table class="table table-striped">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <input type="file" class="form-control" name="multi_img">
                                            </td>

                                            <td>
                                                <input type="submit" class="btn btn-info px-4" value="Add Image">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content" style="margin-top: -35px;">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Property Facility </h6>

                            <form method="post" action="{{ route('update.facilities') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="facility_property_id" value="{{ $property->id }}">

                                @foreach ($facilities as $item)
                                    <div class="row add_item">
                                        <div class="whole_extra_item_add" id="whole_extra_item_add">
                                            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                                                <div class="container mt-2">
                                                    <div class="row">

                                                        <div class="form-group col-md-4">
                                                            <label for="facility_name">Facility</label>
                                                            <select name="facility_name[]" id="facility_name"
                                                                class="form-control">
                                                                <option value="">Select Facility</option>
                                                                <option value="Hospital"
                                                                    {{ $item->facility_name == 'Hospital' ? 'selected' : '' }}>
                                                                    Hospital</option>
                                                                <option value="SuperMarket"
                                                                    {{ $item->facility_name == 'SuperMarket' ? 'selected' : '' }}>
                                                                    Super Market</option>
                                                                <option value="School"
                                                                    {{ $item->facility_name == 'School' ? 'selected' : '' }}>
                                                                    School</option>
                                                                <option value="Entertainment"
                                                                    {{ $item->facility_name == 'Entertainment' ? 'selected' : '' }}>
                                                                    Entertainment</option>
                                                                <option value="Pharmacy"
                                                                    {{ $item->facility_name == 'Pharmacy' ? 'selected' : '' }}>
                                                                    Pharmacy</option>
                                                                <option value="Airport"
                                                                    {{ $item->facility_name == 'Airport' ? 'selected' : '' }}>
                                                                    Airport</option>
                                                                <option value="Railways"
                                                                    {{ $item->facility_name == 'Railways' ? 'selected' : '' }}>
                                                                    Railways</option>
                                                                <option value="Bus Stop"
                                                                    {{ $item->facility_name == 'Bus Stop' ? 'selected' : '' }}>
                                                                    Bus Stop</option>
                                                                <option value="Beach"
                                                                    {{ $item->facility_name == 'Beach' ? 'selected' : '' }}>
                                                                    Beach</option>
                                                                <option value="Mall"
                                                                    {{ $item->facility_name == 'Mall' ? 'selected' : '' }}>
                                                                    Mall</option>
                                                                <option value="Bank"
                                                                    {{ $item->facility_name == 'Bank' ? 'selected' : '' }}>
                                                                    Bank</option>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-4">
                                                            <label for="distance">Distance</label>
                                                            <input type="text" name="distance[]" id="distance"
                                                                class="form-control" value="{{ $item->distance }}">
                                                        </div>

                                                        <div class="form-group col-md-4" style="padding-top: 20px">
                                                            <span class="btn btn-success btn-sm addeventmore">
                                                                <i class="fa fa-plus-circle">Add</i>
                                                            </span>
                                                            <span class="btn btn-danger btn-sm removeeventmore">
                                                                <i class="fa fa-minus-circle">Remove</i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                                <br> <br>

                                <button type="submit" class="btn btn-primary">Save Changes </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add multiple facility --}}
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="facility_name">Facilities</label>
                            <select name="facility_name[]" id="facility_name" class="form-control">
                                <option value="" selected="">Select Facility</option>

                                <option value="Hospital">Hospital</option>
                                <option value="SuperMarket">Super Market</option>
                                <option value="School">School</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Pharmacy">Pharmacy</option>
                                <option value="Airport">Airport</option>
                                <option value="Railways">Railways</option>
                                <option value="Bus Stop">Bus Stop</option>
                                <option value="Beach">Beach</option>
                                <option value="Mall">Mall</option>
                                <option value="Bank">Bank</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="distance">Distance</label>
                            <input type="text" name="distance[]" id="distance" class="form-control"
                                placeholder="Distance (Km)">
                        </div>
                        <div class="form-group col-md-4" style="padding-top: 20px">
                            <span class="btn btn-success btn-sm addeventmore"><i class="fa fa-plus-circle">Add</i></span>
                            <span class="btn btn-danger btn-sm removeeventmore"><i
                                    class="fa fa-minus-circle">Remove</i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
