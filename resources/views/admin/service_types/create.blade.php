@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/service_types') }}">Service Types </a></li>
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
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <form method="POST" action="{{ route('service_types.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-heading">
                                                <h4>Service Types</h4>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="input-block local-forms">
                                                <label>Service Type <span class="login-danger">*</span></label>
                                                <input class="form-control" name="name" type="text" placeholder>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block select-gender">
                                                <label class="gen-label">Status <span class="login-danger">*</span></label>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="status" value="1" class="form-check-input mt-0">Active
                                                    </label>
                                                </div>
                                                <div class="form-check-inline">
                                                    <label class="form-check-label">
                                                        <input type="radio" name="status" value="0" class="form-check-input mt-0">In Active
                                                    </label>
                                                </div>
                                                @error('status')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                            </div>

                                        </div>
                                        <div class="col-12">
                                            <div class="doctor-submit text-end">
                                                <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
                                                <button type="button" class="btn btn-primary cancel-form">Cancel</button>
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
