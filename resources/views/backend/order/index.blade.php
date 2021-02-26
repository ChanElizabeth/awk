@extends('backend.layouts.master')

@section('content')
@include('flash-message')

<div class="mb-3">
    <a href='{{ route('dashboard.partner.order.create') }}' class='btn btn-primary'>Buat Order</a>
</div>

<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Tabel Order</strong>
                </div>
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th>ID Transaksi</th>
                                <th>Bank Tujuan</th>
                                <th>Nominal</th>
                                <th>Status</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($response as $order)
                            <tr>
                                <td> {{ $order->id_transaction }} </td>
                                <td><span class="name">{{ $order->bank_tujuan_code }}</span> </td>
                                <td><span class="email">{{ $order->nominal }}</span> </td>
                                @if ($order->verified_at == NULL)
                                <td> <span class="role">PENDING</span> </td>
                                @else
                                <td> <span class="role">SUCCESS</span> </td>
                                @endif
                                <td> <a href="{{ route('dashboard.partner.order.detail', $order->id_transaction)}}" class="btn btn-link">View</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div>
    </div>
</div>

@endsection
