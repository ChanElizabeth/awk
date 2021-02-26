@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Konfirmasi Pembayaran</div>
                <div class="card-body card-block">
                    <form action="{{route('dashboard.disbursement.store')}}" method="POST" class="">
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Nomor Rekening</label></div>
                                <div class="col-12 col-md-9">{{$response2['account_number']}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Pemilik Rekening</label></div>
                                <div class="col-12 col-md-9">{{$response1['account_holder']}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Bank Dituju</label></div>
                                <div class="col-12 col-md-9">{{$response1['bank_code']}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Jumlah Pembayaran</label></div>
                                <div class="col-12 col-md-9">{{$response2['amount']}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Catatan</label></div>
                                <div class="col-12 col-md-9">{{$response2['remark']}}</div>
                            </div>
                            <input type='hidden' name='account_number' value='{{ $response2['account_number']}}'>
                            <input type='hidden' name='bank_code' value='{{ $response2['bank_code']}}'>
                            <input type='hidden' name='amount' value='{{ $response2['amount']}}'>
                            <input type='hidden' name='recipient_city' value='{{ $response2['recipient_city']}}'>
                            <input type='hidden' name='remark' value='{{ $response2['remark']}}'>
                            <input type="hidden" id="id" name="id" value="{{ Auth::user()->id }}">
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href='{{ route('dashboard.disbursement.index') }}' class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
