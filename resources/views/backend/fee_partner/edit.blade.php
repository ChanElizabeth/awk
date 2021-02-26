@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Fee</div>
                <div class="card-body card-block">
                    <form action="{{ route('dashboard.user.admin.fee.update', ['id'=>request()->route('id'), 'fee_id'=>request()->route('fee_id')]) }}" method="POST" class="">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="bank_code" class=" form-control-label">Bank</label></div>
                            <div class="col-12 col-md-9">
                                <select name="bank_code" id="bank_code" class="form-control" disabled="true">
                                    <option value="{{ $response->bank_code }}">{{ $response->bank_code }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-addon">Fee</div>
                                <input data-type="currency" type="number" id="fee" name="fee" class="form-control" value="{{ $response->fee }}">
                                <div class="input-group-addon"><i class="fa fa-money"></i></div>
                            </div>
                        </div>
                        <input type="hidden" value={{ request()->route('id')}} name='id'>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href="{{ route('dashboard.user.admin.userlist') }}" class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
