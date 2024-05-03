@extends('layouts.main')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/cases') }}">Case </a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Add New Case</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('cases.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Dental Practice<span class="login-danger">*</span></label>
                                        <select name="user_id" class="form-control select">
                                            <option>-- Select --</option>
                                            @foreach($users as $user)
                                               <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('user_id')
                                        <div class="text-danger"> Please Select Dental Practices</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Doctor Name <span class="login-danger">*</span></label>
                                        <input class="form-control" name="doctor_name" type="text">
                                        @error('doctor_name')
                                        <div class="text-danger">Enter the Doctor Name</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block select-gender">
                                        <label class="gen-label">Gender<span
                                                class="login-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Male" class="form-check-input">Male
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="gender" value="Female" class="form-check-input">Female
                                            </label>
                                        </div>
                                        @error('gender')
                                        <div class="text-danger">Please Select One</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Patient Name <span class="login-danger">*</span></label>
                                        <input class="form-control" name="patient_name" type="text">
                                        @error('patient_name')
                                        <div class="text-danger">Enter the patient name</div>
                                    @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Service Type</label>
                                        <select name="service_type_id" class="form-control select" onchange="getServices(this.value)">
                                            <option>Select Service Type</option>
                                            @foreach($serviceTypes as $serviceType)
                                                <option value="{{ $serviceType->id }}">{{ $serviceType->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Services</label>
                                        <select name="service_id" id="servicesDropdown" class="form-control select" onchange="updateTotalCost(this.value)">
                                            <option>-- Select Service --</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms cal-icon">
                                        <label>Due Date: <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker"  name="due_date" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-2">
                                    <div class="input-block local-forms">
                                        <label>Tooth#: <span class="login-danger">*</span></label>
                                        <input class="form-control" name="tooth" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>Stump Shade: <span class="login-danger">*</span></label>
                                        <input class="form-control" name="stump_shade" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>Final Shade: <span class="login-danger">*</span></label>
                                        <select name="final_shade" class="form-control select">
                                            <option>-- Select --</option>
                                            <option value="Option One">Option One</option>
                                            <option value="Option Two">Option Two</option>
                                            <option value="Option Three">Option Three</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block select-gender">
                                        <label class="gen-label">Case Submission Type:<span
                                                class="login-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="case_type" value="Digital Case" class="form-check-input">Digital Case
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="case_type" value="Physical" class="form-check-input">Physical
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block select-gender">
                                        <label class="gen-label">Pickup:<span class="login-danger">*</span></label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" id="pickupYes" name="pickup" value="Yes" class="form-check-input">Yes
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" id="pickupNo" name="pickup" value="No" class="form-check-input">No
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6 pickupDetails" style="display: none;">
                                    <div class="input-block local-forms">
                                        <label>Pickup Note: <span class="login-danger">*</span></label>
                                        <input class="form-control" name="pickup_note" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6 pickupDetails" style="display: none;">
                                    <div class="input-block local-forms">
                                        <label>Pickup Date: <span class="login-danger">*</span></label>
                                        <input class="form-control datetimepicker" name="pickup_date" type="text">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-12">
                                    <div class="input-block local-forms">
                                        <label>Doctor's Note
                                            <span class="login-danger">*</span></label>
                                        <textarea class="form-control" name="doctor_note" rows="3" cols="30"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-top-form">
                                        <label class="local-top">Upload Your Files: <span class="login-danger">*</span></label>
                                        <div class="settings-btn upload-files-avator">
                                            <input type="file" accept="image/*" name="images[]" id="file" multiple onchange="previewFiles(event)"
                                                class="hide-input">
                                            <label for="file" class="upload">Choose Files</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">
                                    <div id="fileInfo" style="display: none;"></div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-forms">
                                        <label>Total Cost:</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">$</span>
                                            </div>
                                            <input class="form-control" id="totalCostInput" name="total_cost" type="text" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="doctor-submit text-end">
                                        <button type="submit" class="btn btn-primary submit-form me-2">Submit</button>

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

@endsection
