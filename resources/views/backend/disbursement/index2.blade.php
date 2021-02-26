
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
                <header class="page-title-bar">

                <!-- title and toolbar -->
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto"> Tabel Pembayaran </h1><!-- .btn-toolbar -->
                    <div id="dt-buttons" class="btn-toolbar">
                    <a href="{{ route('dashboard.disbursement.create') }}" class='btn btn-primary'>Buat Pembayaran</a>

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
                                <th> </th>
                                <th style="min-width: 100px;"> ID </th>
                                <th> No Akun </th>
                                <th> Bank Tujuan </th>
                                <th> Jumlah </th>
                                <th> Status </th>
                                <th style="width:100px; min-width:100px;"> &nbsp; </th>
                            </tr>
                            </thead><!-- /thead -->
                            <!-- tbody -->
                            <tbody>
                            @foreach ($response1 as $transaction)
                            <tr>
                                <td></td>
                                <td> {{ $transaction->id }} </td>
                                <td><span class="name">{{ $transaction->account_number }}</span> </td>
                                <td><span class="email">{{ $transaction->bank_code }}</span> </td>
                                <td> <span class="phone">{{ $transaction->amount }}</span> </td>
                                @if ($transaction->status == "PENDING")
                                <td> <span class="label-warning">Menunggu</span> </td>
                                @elseif ($transaction->status == "SUCCESS")
                                <td> <span class="label-success">Berhasil</span> </td>
                                @elseif ($transaction->status == 'GAGAL')
                                <td> <span class="label-success">Gagal</span> </td>
                                @endif
                                <td> <a href="{{ route('dashboard.disbursement.show', $transaction->id) }}" class="btn btn-link">View</a></td>
                            </tr>
                            @endforeach
                            
                            </tbody><!-- /tbody -->
                        </table><!-- /.table -->
                    </div><!-- /.card-body -->

                </div><!-- /.card -->

                </div>
                <!-- /.page-section -->
                <div>
                    @can('isAdmin', Auth::user())
                    <ul class="pagination justify-content-center mt-4">
                        <li><a class="page-link" href="{{ route('dashboard.disbursement.indexPages', $current_page - 1)}}"><i class="fa fa-lg fa-angle-left"></i></a> </li>
                        <li><a class="page-link" href="{{ route('dashboard.disbursement.indexPages', $current_page + 1)}}"><i class="fa fa-lg fa-angle-right"></i></a> </li>
                    </ul>
                    @endcan
                </div>
    </div>
</div>