@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Konfirmasi Pembayaran</div>
                <div class="card-body card-block">
                    <form method="POST" action="{{route('dashboard.partner.order.confirm')}}">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">ID Transaksi</label></div>
                            <div class="col-12 col-md-9">{{$response->id_transaction}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Bank Dituju</label></div>
                            <div class="col-12 col-md-9">{{$response->bank_tujuan_code}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Jumlah Pembayaran</label></div>
                            <div class="col-12 col-md-9">{{$response->nominal}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Status</label></div>
                            @if ($response->verified_at == NULL)
                                <div class="col-12 col-md-9">PENDING</div>
                            @else
                                <div class="col-12 col-md-9">SUCCESS</div>
                            @endif
                        </div>
                        <div class="form-actions form-group">
                            @can('isAdmin', Auth::user())
                                <input name="id_transaction" type='hidden' value="{{$response->id_transaction}}">
                                <button type="submit" class="btn btn-success btn-sm">Verify</button>
                            @endcan
                            <a href='{{ route('dashboard.partner.order.index') }}' class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
