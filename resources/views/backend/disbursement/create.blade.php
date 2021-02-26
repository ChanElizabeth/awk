@extends('backend.layouts.master')
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.js"></script> -->

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
        <header class="page-title-bar">

        <!-- title and toolbar -->
        <div class="d-md-flex align-items-md-start">
            <h1 class="page-title mr-sm-auto"> Collection Table </h1><!-- .btn-toolbar -->
        </div><!-- /title and toolbar -->
        </header>
            <div class="page-section">
                <div class="card card-fluid">
                <!-- <div class="card-header">
                    <strong>Form Pembuatan Pembayaran</strong>
                </div> -->
                <div class="card-body">
                    <form action="{{ route('dashboard.disbursement.check') }}" method="post" class="form-horizontal">
                        @csrf
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="account_number" class=" form-control-label">Nomor Rekening</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="account_number" name="account_number" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="bank_code" class=" form-control-label">Bank Tujuan</label></div>
                            <div class='col-12 col-md-9'>
                                    
                                 <select name="bank_code" class="selectpicker" data-live-search="true" data-width="100%">
                                    @foreach ($response1 as $bank)
                                         <option value="{{ $bank->bank_code }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select> 
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label for="amount" class=" form-control-label">Jumlah Pembayaran</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" data-type="currency" name="amount" class="form-control">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="remark" class=" form-control-label">Catatan</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="remark" name="remark" class="form-control" maxlength="18"></div>
                        </div>
                        <button type='submit' class='btn btn-primary'>Check</button>
                        <a href="{{ route('dashboard.disbursement.index') }}" class='btn btn-danger'>Back</a>
                    </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
