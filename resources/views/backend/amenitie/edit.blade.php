@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <div class="col-md-8 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Edit Amenitie </h6>

                            <form method="POST" action="{{ route('update.amenitie', $amenitie->id) }}" class="forms-sample">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Amenitie Name </label>
                                    <input type="text" name="amenitie_name"
                                        class="form-control @error('amenitie_name') is-invalid @enderror"
                                        value="{{ $amenitie->amenitie_name }}">

                                    @error('amenitie_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary me-2">Save Changes </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
