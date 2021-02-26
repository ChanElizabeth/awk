@extends('backend.layouts.master')

@section('css')
    <link rel="stylesheet" href="{{ asset('backend_theme') }}/assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection

@section('content')
    @include('flash-message')

    <!-- <div class="animated fadeIn"> -->
        <!-- <div class="row"> -->
            <div class="col-lg-12">

                <header class="page-title-bar">

                <!-- title and toolbar -->
                <div class="d-md-flex align-items-md-start">
                    <h1 class="page-title mr-sm-auto"> Tabel Fee </h1><!-- .btn-toolbar -->
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
                                    <th>Bank</th>
                                    <th>Fee</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['fee_partner'] as $key => $fee)
                                    <tr>
                                        <td>{{$fee->bank}}</td>
                                        <td>Rp {{ number_format($fee->fee) }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-icon btn-secondary" href="{{ route('dashboard.partner.feeByPartner.edit', $fee->id) }}"><i style="align-middle"class="fa fa-pencil-alt align-middle"></i></a>
                                        </td>
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
