@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Konfirmasi Pembayaran</div>
                <div class="card-body card-block">
                    <form>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name" class=" form-control-label">Nomor Rekening</label></div>
                            <div class="col-12 col-md-9">{{$response->account_number}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Bank Dituju</label></div>
                            <div class="col-12 col-md-9">{{$response->bank_code}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Jumlah Pembayaran</label></div>
                            <div class="col-12 col-md-9">{{$response->amount}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Catatan</label></div>
                            <div class="col-12 col-md-9">{{$response->remark}}</div>
                        </div>
                        <div class="form-actions form-group">
                            <a href='{{ route('dashboard.disbursement.index') }}' class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
