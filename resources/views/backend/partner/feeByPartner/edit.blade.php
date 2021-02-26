@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Merubah Fee <strong>Bank {{ $data['fee']->bank }}</strong> </div>
                <div class="card-body card-block">
                    <form action="{{ route('dashboard.partner.feeByPartner.update', $data['fee']->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Fee</div>
                                <input type="text" data-type="currency" name="fee" class="form-control" value="{{$data['fee']->fee}}">
                            </div>
                        </div>

                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            <a href="{{ route('dashboard.partner.feeByPartner.index') }}" class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
