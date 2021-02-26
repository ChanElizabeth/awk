@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Detail Collection</div>
                <div class="card-body card-block">
                    <form method="POST" action="{{ route('dashboard.user.admin.money-collection.collect')}}">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="transaction_id" class=" form-control-label">Transaction ID</label></div>
                            <div class="col-12 col-md-9">{{$response->transaction_id}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Partner</label></div>
                            <div class="col-12 col-md-9">{{$response->partner_id}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Amount</label></div>
                            <div class="col-12 col-md-9">{{$response->amount}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Status</label></div>
                            <div class="col-12 col-md-9">{{$response->status}}</div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email" class=" form-control-label">Date</label></div>
                            <div class="col-12 col-md-9">{{$response->created_at}}</div>
                        </div>
                        <input type="hidden" name="transaction_id" value="{{$response->transaction_id}}">
                        <div class="form-actions form-group">
                            @if ($response->status == 0)
                            <button type='submit' class='btn btn-primary btn-sm'>Collect</button>
                            @endif
                            <a href='{{ route('dashboard.user.admin.money-collection.index') }}' class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
