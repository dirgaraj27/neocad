@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="appointments.html">Service Types </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Category List</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <form action="{{ route('service_types.update', $serviceType->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-heading">
                                                <h4>Service Types</h4>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="input-block local-forms">
                                                <label>Service Type <span class="login-danger">*</span></label>
                                                <input class="form-control" name="name" type="text" value="{{ $serviceType->name }}" placeholder>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block select-gender">
                                                <label for="status">Status</label>
                                                <select name="status" id="status" class="form-control">
                                                    <option value="active" {{ $serviceType->status == 'active' ? 'selected' : '' }}>Active</option>
                                                    <option value="inactive" {{ $serviceType->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="doctor-submit text-end">
                                                <button type="submit" class="btn btn-primary submit-form me-2">Update</button>

                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
