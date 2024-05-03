@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('admin/users') }}">Users</a></li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.users.update', $user->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-heading">
                                        <h4>User Details</h4>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Full Name <span class="login-danger">*</span></label>
                                        <input class="form-control" name="name" type="text" value="{{ $user->name }}" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Phone <span class="login-danger"></span></label>
                                        <input class="form-control" name="phone" type="text" value="{{ $user->phone }}" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Email <span class="login-danger">*</span></label>
                                        <input class="form-control" name="email" type="email" value="{{ $user->email }}" placeholder="Email">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="New Password"  autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>Confirm Password</label>
                                        <input class="form-control" name="password_confirmation" type="password" placeholder="Confirm New Password"  autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="input-block local-forms">
                                        <label>User Role <span class="login-danger">*</span></label>
                                        <select name="role" class="form-control select">
                                            <option value="0" @if($user->role == 0) selected @endif>Admin</option>
                                            <option value="1" @if($user->role == 1) selected @endif>Doctor</option>
                                            <option value="2" @if($user->role == 2) selected @endif>Lab Partner</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-xl-8">
                                    <div class="input-block local-forms">
                                        <label>Address</label>
                                        <input class="form-control" type="text" name="address" value="{{ $user->address }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>State</label>
                                        <input class="form-control" type="text" name="state" value="{{ $user->state }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>City</label>
                                        <input class="form-control" type="text" name="city" value="{{ $user->city }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>Zipcode</label>
                                        <input class="form-control" type="text" name="zipcode" value="{{ $user->zipcode }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-3">
                                    <div class="input-block local-forms">
                                        <label>Country</label>
                                        <input class="form-control" type="text" name="country" value="{{ $user->country }}">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6 col-xl-6">
                                    <div class="input-block local-top-form">
                                        <label class="local-top">Image</label>
                                        <div class="settings-btn upload-files-avator">
                                            <input type="file" accept="image/*" name="image" id="file" onchange="if (!window.__cfRLUnblockHandlers) return false; loadFile(event)" class="hide-input" data-cf-modified-f9acf832ee8f784de218997b->
                                            <label for="file" class="upload">Choose File</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-6">

                                    <div class="input-block select-gender">
                                        <label class="gen-label">Status</label>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="1" class="form-check-input mt-0" @if($user->status == 1) checked @endif>Active
                                            </label>
                                        </div>
                                        <div class="form-check-inline">
                                            <label class="form-check-label">
                                                <input type="radio" name="status" value="0" class="form-check-input mt-0" @if($user->status == 0) checked @endif>In Active
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary submit-form me-2">Update</button>
                                        <a href="{{ url('admin/users') }}" class="btn btn-secondary cancel-form">Cancel</a>
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

<div id="delete_patient" class="modal fade delete-modal" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <img src="assets/img/sent.png" alt width="50" height="46">
                <h3>Are you sure want to delete this?</h3>
                <div class="m-t-20"> <a href="#" class="btn btn-white" data-bs-dismiss="modal">Close</a>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
