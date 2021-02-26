
@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
@include('flash-message')    <!-- .app -->

<!-- <div class="animated fadeIn"> -->
        <!-- <div class="row"> -->
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
<div class="card">
<div class="page-section">
<!-- 
    <div class="card-header">
        <strong class="card-title">Table Fee</strong>
    </div> -->
    <div class="card-body">
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <!-- <th>Bank</th>
                    <th>Fee</th>
                    <th>Aksi</th> -->
                    <th style="min-width: 100px;"> ID </th>
                    <th> No Akun </th>
                    <th> Bank Tujuan </th>
                    <th> Jumlah </th>
                    <th> Status </th>
                    <th style="width:100px; min-width:100px;"> Aksi </th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($response1 as $transaction)
                <tr>
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
                    <td> <a href="{{ route('dashboard.disbursement.show', $transaction->id) }}" class="btn btn-primary">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- </div> -->
<!-- </div> -->

           
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