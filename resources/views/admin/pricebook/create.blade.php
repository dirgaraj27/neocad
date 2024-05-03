@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Pricebook </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add New Pricebook</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-heading">
                                                <h4>Pricebook Details</h4>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Code <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" value="#12343">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-6">
                                            <div class="input-block local-forms">
                                                <label>Pricebook Name <span class="login-danger">*</span></label>
                                                <input class="form-control" type="text" name="name" value="#12343">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6 col-xl-12">
                                            <div class="input-block local-forms">
                                                <label>Dental Practice: <span class="login-danger">*</span></label>
                                                <select name="user_id" class="form-control select">
                                                    <option>-- Select --</option>
                                                    @foreach($users as $user)
                                                       <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
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
                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-8">
                                <div class="table-responsive">
                                    <table class="table border-0 custom-table comman-table datatable mb-0">
                                        <thead>
                                            <tr>
                                                <th width="30px">S.No.</th>
                                                <th>Services</th>
                                                <th>Service Type</th>
                                                <th>Price</th>
                                                <th width="50px"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($services as $index => $service)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->serviceType->name }}</td>
                                                <td>
                                                    <input class="form-control price-field" type="text" name="prices[{{ $service->id }}]" value="{{ $service->price ?? '' }}" readonly>
                                                </td>
                                                <td class="text-end">
                                                    <button type="button" class="btn btn-primary update-price" disabled>Update</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div class="col-12">
                                <div class="doctor-submit text-end">
                                    <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>
                                    <button type="submit" class="btn btn-primary cancel-form">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
