@extends('backend.layouts.master')

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Edit Pengguna</div>
                <div class="card-body card-block">
                    <form action="{{ route('dashboard.user.admin.editSubmit') }}" method="POST" class="">
                        @csrf
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="name" class=" form-control-label">Nama</label></div>
                                <div class="col-12 col-md-9">{{$response->name}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="email" class=" form-control-label">Email</label></div>
                                <div class="col-12 col-md-9">{{$response->email}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="phone" class=" form-control-label">Nomor Telepon</label></div>
                                <div class="col-12 col-md-9">{{$response->phone}}</div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3"><label for="role_id" class=" form-control-label">Role</label></div>
                                <div class='col-12 col-md-9'>
                                    <select name="role_id" id="role_id" class="selectpicker" data-live-search="true" data-width="100%">
                                        @foreach ($roles as $role)
                                            @if ($role->id != 1)
                                                @if ($role->id == $response->role_id)
                                                    <option value="{{ $role->id }}" selected>{{ $role->title }}</option>
                                                @else
                                                    <option value="{{ $role->id }}">{{ $role->title }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Limit</span></label> <input type="number" id="limit" name="limit" class="form-control" min="0"  step="1" value="0">
                                </div>
                                <!-- <div class="input-group">
                                    <div class="input-group-addon">Limit</div>
                                    <input type="number" id="limit" name="limit" class="form-control">
                                </div> -->
                            </div>
                            <input type='hidden' value='{{$response->id}}' name='id'>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href="{{ route('dashboard.user.admin.userlist') }}" class='btn btn-danger btn-sm'>Back</a>
                            <a href="{{ route('dashboard.user.admin.fee.index', $response->id) }}" class="btn btn-success btn-sm">Edit Fee</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
