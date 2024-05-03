@extends('layouts.main')

@section('content')
<div class="page-wrapper">
    <div class="content">

        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">Users </li>
                        <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                        <li class="breadcrumb-item active">All User List</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table show-entire">
                    <div class="card-body">

                        <div class="page-table-header mb-2">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="doctor-table-blk">
                                        <h3>User List</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="user_filter">
                                        <form action="{{ route('admin.users.index') }}" method="GET">
                                            <div class="input-group">
                                                <select class="form-select" name="role" id="role">
                                                    <option value="">All Roles</option>
                                                    <option value="1" {{ request('role') == '1' ? 'selected' : '' }}>Doctor</option>
                                                    <option value="2" {{ request('role') == '2' ? 'selected' : '' }}>Lab Partner</option>
                                                </select>
                                                <button type="submit" class="btn btn-primary">Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="add-group">
                                        <a href="{{ url('admin/users/create') }}" class="btn btn-primary add-pluss ms-2"><img src="{{ asset('images/icons/plus.svg')}}" alt></a>
                                        <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img src="{{ asset('images/icons/re-fresh.svg')}}" alt></a>

                                    </div>
                                </div>


                            </div>
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        </div>

                        <div class="table-responsive">
                            <table class="table border-0 custom-table comman-table datatable mb-0">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox"
                                                    value="something">
                                            </div>
                                        </th>
                                        <th>S.No.</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>User Role</th>
                                        <th></th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $index => $user)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox"
                                                    value="something">
                                            </div>
                                        </td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <div  class="profile-image">
                                            @if($user->image)
                                             <div class="img">
                                                <img src="{{ asset('storage/' . $user->image) }}" alt="User Image">
                                             </div>
                                            @endif

                                        {{ $user->name }}</div></td>
                                        <td>{{ $user->phone }} </td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->role == 1 ? 'Doctor' : 'Lab Partner' }}</td>
                                        <td></td>
                                        <td>{{ $user->status ? 'Active' : 'In-Active' }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false"><i
                                                        class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}"><i
                                                            class="fa-solid fa-pen-to-square m-r-5"></i>
                                                        Edit</a>
                                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_user_{{ $user->id }}"><i class="fa fa-trash-alt m-r-5"></i>Delete</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="delete_user_{{ $user->id }}" class="modal fade delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <img src="{{ asset('images/sent.png')}}" alt width="50" height="46">
                                                    <h3>Are you sure want to delete this user?</h3>
                                                    <div class="m-t-20">
                                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                            <button type="button" class="btn btn-white" data-bs-dismiss="modal">Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
