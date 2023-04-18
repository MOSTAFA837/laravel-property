@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-12 col-xl-12 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Add Property </h6>

                            <form method="post" action="{{ route('store.property') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Name </label>
                                            <input type="text" name="property_name" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Property Status</label>
                                            <select name="property_status" class="form-select"
                                                id="exampleFormControlSelect1">
                                                <option selected="" disabled="">Select Status</option>
                                                <option value="rent">For Rent</option>
                                                <option value="buy">For Buy</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Lowest Price </label>
                                            <input type="text" name="lowest_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Max Price </label>
                                            <input type="text" name="max_price" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Main Thambnail </label>
                                            <input type="file" name="property_thambnail" class="form-control"
                                                onChange="mainThambUrl(this)">

                                            <img src="" id="mainThamb">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Multiple Image </label>
                                            <input type="file" name="multi_img[]" class="form-control" id="multiImg"
                                                multiple="">

                                            <div class="row" id="preview_multi_imgs"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">BedRooms</label>
                                            <input type="text" name="bedrooms" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Bathrooms</label>
                                            <input type="text" name="bathrooms" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage</label>
                                            <input type="text" name="garage" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Garage Size</label>
                                            <input type="text" name="garage_size" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" name="city" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">State</label>
                                            <input type="text" name="state" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code </label>
                                            <input type="text" name="postal_code" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Size</label>
                                            <input type="text" name="property_size" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Video</label>
                                            <input type="text" name="property_video" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Neighborhood</label>
                                            <input type="text" name="neighborhood" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input type="text" name="latitude" class="form-control">
                                            <a href="https://www.latlong.net/convert-address-to-lat-long.html"
                                                target="_blank">Go here to get Latitude from address</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input type="text" name="longitude" class="form-control">
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

                                                @foreach ($property_types as $ptype)
                                                    <option value="{{ $ptype->id }}">{{ $ptype->type_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="mb-3">
                                            <label class="form-label">Property Amenities </label>
                                            <select name="amenities[]" class="js-example-basic-multiple form-select"
                                                multiple="multiple" data-width="100%">

                                                @foreach ($amenities as $amenitie)
                                                    <option value="{{ $amenitie->amenitie_name }}">
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

                                                @foreach ($active_agents as $agent)
                                                    <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Short Description</label>
                                        <textarea name="short_descp" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>

                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="mb-3">
                                        <label class="form-label">Long Description</label>
                                        <textarea name="long_descp" class="form-control" name="tinymce" id="tinymceExample" rows="10"></textarea>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="featured" value="1" class="form-check-input"
                                            id="checkInline1">
                                        <label class="form-check-label" for="checkInline1">
                                            Features Property
                                        </label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input type="checkbox" name="hot" value="1" class="form-check-input"
                                            id="checkInline">
                                        <label class="form-check-label" for="checkInline">
                                            Hot Property
                                        </label>
                                    </div>
                                </div>


                                {{-- Facilities Option --}}
                                <div class="row add_item">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="facility_name" class="form-label">Facilities </label>
                                            <select name="facility_name[]" id="facility_name" class="form-control">
                                                <option value="">Select Facility</option>
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
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="distance" class="form-label"> Distance </label>
                                            <input type="text" name="distance[]" id="distance" class="form-control"
                                                placeholder="Distance (Km)">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4" style="padding-top: 30px;">
                                        <a class="btn btn-success addeventmore">
                                            <i class="fa fa-plus-circle"></i>
                                            Add More..
                                        </a>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mt-3">Save Changes </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- add multiple Facility --}}
    <div style="visibility: hidden">
        <div class="whole_extra_item_add" id="whole_extra_item_add">
            <div class="whole_extra_item_delete" id="whole_extra_item_delete">
                <div class="container mt-2">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="facility_name">Facilities</label>
                            <select name="facility_name[]" id="facility_name" class="form-control">
                                <option value="">Select Facility</option>
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

    {{-- <script type="text/javascript">
        // // form validation
        // $(document).ready(function() {
        //     $('#myForm').validate({
        //         rules: {
        //             property_name: {
        //                 required: true,
        //             },
        //             property_status: {
        //                 required: true,
        //             },
        //             lowest_price: {
        //                 required: true,
        //             },
        //             max_price: {
        //                 required: true,
        //             },
        //             ptype_id: {
        //                 required: true,
        //             },


        //         },
        //         messages: {
        //             property_name: {
        //                 required: 'Please Enter Property Name',
        //             },
        //             property_status: {
        //                 required: 'Please Select Property Status',
        //             },
        //             lowest_price: {
        //                 required: 'Please Enter Lowest Price',
        //             },
        //             max_price: {
        //                 required: 'Please Enter Max Price',
        //             },
        //             ptype_id: {
        //                 required: 'Please Select Property Type',
        //             },


        //         },
        //         errorElement: 'span',
        //         errorPlacement: function(error, element) {
        //             error.addClass('invalid-feedback');
        //             element.closest('.form-group').append(error);
        //         },
        //         highlight: function(element, errorClass, validClass) {
        //             $(element).addClass('is-invalid');
        //         },
        //         unhighlight: function(element, errorClass, validClass) {
        //             $(element).removeClass('is-invalid');
        //         },
        //     });
        // });
        // // end form validation

        // // thambnail
        // function mainThambUrl(input) {
        //     if (input.files && input.files[0]) {
        //         var reader = new FileReader();

        //         reader.onload = function(e) {
        //             $("#mainThamb").attr("src", e.target.result).width(100).height(80);
        //         };
        //         reader.readAsDataURL(input.files[0]);
        //     }
        // }
        // // end thambnail

        // //  multi images
        // $("#multiImg").on("change", function() {
        //     if (window.File && window.FileReader && window.FileList && window.Blob) {
        //         var data = $(this)[0].files;

        //         $.each(data, function(index, file) {
        //             if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)) {
        //                 var fileRead = new FileReader();

        //                 fileRead.onload = (function(file) {
        //                     return function(e) {
        //                         var img = $("<img/>")
        //                             .addClass("thamb")
        //                             .attr("src", e.target.result)
        //                             .width(100)
        //                             .height(80);

        //                         $("#preview_multi_imgs").append(img);
        //                     };
        //                 })(file);

        //                 fileRead.readAsDataURL(file);
        //             }
        //         });
        //     } else {
        //         alert("Your browser doesn't support File API!");
        //     }
        // });
        // //  end multi images

        // // add more facilities
        // var counter = 0;
        // $(document).on("click", ".addeventmore", function() {
        //     var whole_extra_item_add = $("#whole_extra_item_add").html();
        //     console.log(whole_extra_item_add);

        //     $(this).closest(".add_item").append(whole_extra_item_add);
        //     counter++;
        // });

        // $(document).on("click", ".removeeventmore", function(event) {
        //     $(this).closest("#whole_extra_item_delete").remove();
        //     counter -= 1
        // });
        // // end add more facilities
    </script> --}}
@endsection
