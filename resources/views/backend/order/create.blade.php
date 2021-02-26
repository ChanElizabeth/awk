@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Form Pembuatan Order</strong>
                </div>
                <div class="card-body card-block">
                    <form action="{{ route('dashboard.partner.order.check') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="nominal" class=" form-control-label">Nominal</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="nominal" name="nominal" class="form-control" data-type="currency"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="bank_code" class=" form-control-label">Bank Tujuan</label></div>
                            <div class='col-12 col-md-9'>
                                <select name="bank_code" id="bank_code" class="form-control">
                                    @foreach ($response1 as $bank)
                                    <option value="{{ $bank->bank_code }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type='submit' class='btn btn-primary'>Check</button>
                        <a href='{{ route('dashboard.disbursement.index') }}' class='btn btn-danger'>Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
