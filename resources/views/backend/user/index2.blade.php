
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
                <header class="page-title-bar">

                <!-- title and toolbar -->
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto"> Tabel Pengguna </h1><!-- .btn-toolbar -->
                    <div id="dt-buttons" class="btn-toolbar">
                    <a href="{{ route('dashboard.user.admin.create') }}" class='btn btn-primary'>Buat Pengguna</a>

                    </div><!-- /.btn-toolbar -->
                </div><!-- /title and toolbar -->
                </header>
                <!-- /.page-title-bar -->
                <!-- .page-section -->
                <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid">
                    <!-- .card-header -->
                    <!-- <div class="card-header"> -->
                        <!-- .nav-tabs -->
                        
                            
                        <!-- <ul class="nav nav-tabs card-header-tabs">
                            <li class="nav-item">
                            <a class="nav-link active show" data-toggle="tab" href="#tab1">All</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab2">Ongoing</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tab3">Completed</a>
                            </li> -->
                        <!-- </ul> -->
                        <!-- /.nav-tabs -->
                    <!-- </div> -->
                    <!-- /.card-header -->
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table class="table">
                            <!-- thead -->
                            <thead>
                            <tr>
                                <!-- <th colspan="2" style="min-width: 100px;">
                                <div class="thead-dd dropdown">
                                    <span class="custom-control custom-control-nolabel custom-checkbox"><input type="checkbox" class="custom-control-input" id="check-handle"> <label class="custom-control-label" for="check-handle"></label></span>
                                    <div class="thead-btn" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="fa fa-caret-down"></span>
                                    </div>
                                    <div class="dropdown-menu">
                                    <div class="dropdown-arrow"></div><a class="dropdown-item" href="#">Select all</a> <a class="dropdown-item" href="#">Unselect all</a>
                                    <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Bulk remove</a> <a class="dropdown-item" href="#">Bulk edit</a> <a class="dropdown-item" href="#">Separate actions</a>
                                    </div>
                                </div>
                                </th> -->
                                <th style="min-width: 100px;"> ID </th>
                                <th> Nama </th>
                                <th> E-Mail </th>
                                <th> Telepon </th>
                                <th> Role </th>
                                <th style="width:100px; min-width:100px;"> &nbsp; </th>
                            </tr>
                            </thead><!-- /thead -->
                            <!-- tbody -->
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
                                    <td> <a href="{{ route('dashboard.user.admin.edit', $user->id) }}" class="btn btn-link">View</a></td>
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
                            
                            </tbody><!-- /tbody -->
                        </table><!-- /.table -->
                    </div><!-- /.card-body -->

                </div><!-- /.card -->

                </div>
    </div>
</div>

