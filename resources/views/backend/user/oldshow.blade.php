@extends('backend.layouts.master')

@section('content')
@include('flash-message')
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Profil Pengguna</strong><small> Ganti Data Diri</small></div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{ route('dashboard.user.update') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class=" form-control-label">Nama</label>
                                <input name="name" type="text" id="name" value="{{ $response->name }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="phone" class=" form-control-label">Nomor Telepon</label>
                                <input name="phone" type="text" id="phone" value="{{ $response->phone }}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email" class=" form-control-label">Email</label>
                                <input name="email" type="email" id="email" value="{{ $response->email }}" class="form-control">
                            </div>
                            <input type="hidden" name="id" value={{ $response->id }}>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('dashboard.user.show') }}" class="btn btn-danger btn-sm">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header"><strong>Kata Sandi Pengguna</strong><small> Ganti Kata Sandi</small></div>
                    <div class="card-body card-block">
                        <form method="POST" action="{{ route('user-password.update')}}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="current_password" class=" form-control-label">Kata Sandi Sekarang</label>
                                <input type="password" id="current_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password" class=" form-control-label">Kata Sandi Baru</label>
                                <input type="password" id="new_password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password-confirm" class=" form-control-label">Konfirmasi Kata Sandi Baru</label>
                                <input type="password" id="new_password_confirm" class="form-control" required>
                            </div>
                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                <a href="{{ route('dashboard.user.show') }}" class="btn btn-danger btn-sm">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
