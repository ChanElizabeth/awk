
@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
@include('flash-message')    <!-- .app -->

<!-- <div class="animated fadeIn"> -->
        <!-- <div class="row"> -->
        <div class="col-lg-12">

<header class="page-title-bar">

<!-- title and toolbar -->
<div class="d-md-flex align-items-md-start">
    <h1 class="page-title mr-sm-auto"> Tabel Fee </h1><!-- .btn-toolbar -->
    <div id="dt-buttons" class="btn-toolbar">
        <a href="{{ route('dashboard.disbursement.create') }}" class='btn btn-primary'>Buat Fee</a>

    </div><!-- /.btn-toolbar -->
</div><!-- /title and toolbar -->
</header>
<!-- /.page-title-bar -->
<div class="card">
<div class="page-section">
<!-- 
    <div class="card-header">
        <strong class="card-title">Table Fee</strong>
    </div> -->
    <div class="card-body">
        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bank Tujuan</th>
                    <th>Fee</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($response as $index=>$fee)
                <tr>
                    <td> {{ $index + 1}} </td>
                    <td> {{ $fee->bank_code }} </td>
                    <td> <span class="fee">{{ $fee->fee }}</span> </td>
                    <td> <a href="{{ route('dashboard.user.admin.fee.edit', ['id'=>$fee->user_id, 'fee_id'=>$fee->id])}}" class="btn btn-link">Edit</a> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
<!-- </div> -->
<!-- </div> -->

           
@endsection

@section('script')
    <script src="{{ asset('backend_theme') }}/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="{{ asset('backend_theme') }}/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#bootstrap-data-table-export').DataTable();
        } );
    </script>
@endsection
