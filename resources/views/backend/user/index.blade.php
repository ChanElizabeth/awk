
@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
    @include('flash-message')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">

                <header class="page-title-bar">

                <!-- title and toolbar -->
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto"> Tabel Pengguna </h1><!-- .btn-toolbar -->
                    <div id="dt-buttons" class="btn-toolbar">
                        <a href="{{ route('dashboard.disbursement.create') }}" class='btn btn-primary'>Buat Pengguna</a>

                    </div><!-- /.btn-toolbar -->
                </div><!-- /title and toolbar -->
                </header>
                <!-- /.page-title-bar -->
                <div class="card">
                <div class="page-section">

                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th style="min-width: 100px;"> ID </th>
                                <th> Nama </th>
                                <th> E-Mail </th>
                                <th> Telepon </th>
                                <th> Role </th>
                                <th style="width:100px; min-width:100px;"> Aksi </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($response as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td><span class="name">{{ $user->name }}</span> </td>
                                <td><span class="email">{{ $user->email }}</span> </td>
                                <td> <span class="phone">{{ $user->phone }}</span> </td>
                                @if ($user->role_id == 1)
                                <td> <span class="role">Super Admin</span> </td>
                                @elseif ($user->role_id == 2)
                                <td> <span class="role">Admin</span> </td>
                                @elseif ($user->role_id == 3)
                                <td> <span class="role">Finance</span> </td>
                                @else
                                <td> <span class="role">Partner</span> </td>
                                @endif
                                <!-- <td> <span class="phone">{{ $user->fee }}</span> </td> -->
                                <td> <a href="{{ route('dashboard.user.admin.edit', $user->id) }}" class="btn btn-primary">View</a></td>
                                <td>
                                    <form method="POST" action="{{ route('dashboard.user.admin.delete') }}">
                                        @csrf
                                        <input type='hidden' name='id' value="{{$user->id}}">
                                        <!-- <a href="#" class="btn btn-sm btn-icon btn-secondary"><i class="far fa-trash-alt"></i> <span class="sr-only">Remove</span></a> -->
                                        <a type='submit' class="btn btn-sm btn-icon btn-secondary"><i class="fa fa-trash-alt"></i></a>

                                        <!-- <button type='submit' class="btn btn-danger">Delete</button> -->
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('backend_theme') }}/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="{{ asset('backend_theme') }}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection