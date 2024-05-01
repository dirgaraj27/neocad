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
                <div class="card card-table show-entire">
                    <div class="card-body">
                        <div class="page-table-header mb-2">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="doctor-table-blk">
                                        <h3>Service Types</h3>
                                        <div class="doctor-search-blk">
                                            <div class="top-nav-search table-search-blk">
                                                <form>
                                                    <input type="text" class="form-control" placeholder="Search here">
                                                    <a class="btn"><img src="assets/img/icons/search-normal.svg" alt></a>
                                                </form>
                                            </div>
                                            <div class="add-group">
                                                <a href="{{ url('/service_types/create') }}" class="btn btn-primary add-pluss ms-2"><img src="{{ asset('images/icons/plus.svg')}}" alt></a>
                                                <a href="javascript:;" class="btn btn-primary doctor-refresh ms-2"><img src="{{ asset('images/icons/re-fresh.svg')}}" alt></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto text-end float-end ms-auto download-grp">
                                    <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-01.svg" alt></a>
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
                                        <th width="30px">
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </th>
                                        <th width="30px">S.No.</th>
                                        <th>Service Types</th>
                                        <th width="100px">Status</th>
                                        <th width="50px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($serviceTypes as $index => $serviceType)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox" value="something">
                                            </div>
                                        </td>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $serviceType->name }}</td>
                                        <td>{{ $serviceType->status }}</td>
                                        <td class="text-end">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a class="dropdown-item" href="{{ route('service_types.edit', $serviceType->id) }}"><i class="fa-solid fa-pen-to-square m-r-5"></i>Edit</a>
                                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#delete_service_type_{{ $serviceType->id }}"><i class="fa fa-trash-alt m-r-5"></i>Delete</a>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <div id="delete_service_type_{{ $serviceType->id }}" class="modal fade delete-modal" role="dialog">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-body text-center">
                                                    <img src="assets/img/sent.png" alt width="50" height="46">
                                                    <h3>Are you sure want to delete this service type?</h3>
                                                    <div class="m-t-20">
                                                        <form action="{{ route('service_types.destroy', $serviceType->id) }}" method="POST">
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
