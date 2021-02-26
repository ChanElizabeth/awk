@extends('backend.layouts.master')

@section('content')
@include('flash-message')

<div class="mb-3">
    <a href="{{ route('dashboard.disbursement.create') }}" class='btn btn-primary'>Buat Pembayaran</a>
</div>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card card-fluid">
                  <!-- .card-header -->
                  <div class="card-header"> Tabel Pembayaran </div><!-- /.card-header -->
                  <!-- .card-body -->
                  <div class="card-body">
                    <!-- .table -->
                    <table class="table">
                        <thead>
                            <th style="min-width: 280px;"> ID </th>
                            <th> Nomor Akun </th>
                            <th> Bannk Tujuan </th>
                            <th> Jumlah </th>
                            <th> Status </th>
                            <th></th>

                            <th style="width:100px; min-width:100px;"> &nbsp; </th>
                               
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
                                <td> <a href="{{ route('dashboard.disbursement.show', $transaction->id) }}" class="btn btn-link">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div><!-- /.card-body -->
                </div><!-- /.card -->
                
            </div>
            <div>
                @can('isAdmin', Auth::user())
                <a href='{{ route('dashboard.disbursement.indexPages', $current_page - 1)}}' class='btn btn-primary'><i class="menu-icon ti ti-arrow-left"></i></a>
                <a href='{{ route('dashboard.disbursement.indexPages', $current_page + 1)}}' class='btn btn-primary'><i class="menu-icon ti ti-arrow-right"></i></a>
                @endcan
            </div>
        </div>
    </div>
</div>

@endsection
