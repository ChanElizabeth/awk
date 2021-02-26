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
                    <h1 class="page-title mr-sm-auto"> Collection Table </h1><!-- .btn-toolbar -->
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
                                    <th>Date</th>
                                    <th>Partner</th>
                                    <th>Jumlah</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($response as $index=>$moneys)
                                <tr>
                                    <td> {{ $index + 1}} </td>
                                    <td> <span class="status">{{ $moneys->created_at }}</span> </td>
                                    <td> <a href="{{ route('dashboard.user.admin.edit', $moneys->partner_id)}}" class="btn btn-link">{{ $moneys->partner_id }}</a>  </td>
                                    <td> <span class="amount">{{ $moneys->amount }}</span> </td>
                                    @if ($moneys->status == 1)
                                        <td> <span class="status">Collected</span> </td>
                                    @else
                                        <td> <span class="status">Not Collected</span> </td>
                                    @endif
                                    <td> <a href="{{ route('dashboard.user.admin.money-collection.show', $moneys->transaction_id)}}" class="btn btn-link">View</a> </td>
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
