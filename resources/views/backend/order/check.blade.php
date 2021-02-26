@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Konfirmasi Pembayaran</div>
                <div class="card-body card-block">
                    <form action="{{route('dashboard.partner.order.store')}}" method="POST" class="">
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Jumlah Pembayaran</label></div>
                                <div class="col-12 col-md-9">{{$temp->nominal}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Bank Dituju</label></div>
                                <div class="col-12 col-md-9">{{$temp->bank_tujuan_code}}</div>
                            </div>
                            <input type='hidden' name='bank_code' value='{{$temp->bank_tujuan_code}}'>
                            <input type='hidden' name='amount' value='{{$temp->nominal}}'>
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
