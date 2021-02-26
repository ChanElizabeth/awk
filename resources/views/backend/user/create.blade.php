@extends('backend.layouts.master')

@section('css')
    <style>
        .hidden{
            display: none;
        }
    </style>
@endsection

@section('content')
@include('flash-message')
<div class="animated fadeIn">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">Form Pembuatan Pengguna</div>
                <div class="card-body card-block">
                    <form action="{{ route('dashboard.user.admin.store') }}" method="POST" class="">
                        @csrf
                        <div class="form-group">
                                <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Name</span></label> <input type="text" id="name" name="name" class="form-control">
                                </div>
                        </div>
                        <div class="form-group">
                                <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Email</span></label> <input type="email" id="email" name="email" class="form-control">
                                </div>                                
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Telepon</span></label> <input type="text" id="phone" name="phone" class="form-control">
                            </div> 
                           
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Password</span></label> <input type="password" id="password" name="password" class="form-control">
                            </div> 
                            
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-alt">
                                    <label class="input-group-prepend"><span class="input-group-text">Confirm Password</span></label> <input type="password" id="confirm_password" name="confirm_password" class="form-control">
                            </div> 
                             
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="role_id" class="form-control-label">Role</label></div>
                            <div class="col-12 col-md-10">
                                <select name="role_id" id="role_id" class="custom-select" onchange="val_type()">
                                    @foreach ($roles as $role)
                                        @if ($role->id != 1)
                                            <option value="{{ $role->id }}">{{ $role->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row form-group hidden" id="partner_type_div">
                            <div class="col col-md-2"><label for="partner_type" class="form-control-label">Partner Type</label></div>
                            <div class="col-12 col-md-10">
                                <select name="partner_type" class="form-control" id="partner_type_select">
                                    <option value="0">Non Collect</option>
                                    <option value="1">Collect</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions form-group">
                            <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                            <a href='{{ route('dashboard.user.admin.userlist') }}' class='btn btn-danger btn-sm'>Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function val_type(){
        let tipe = document.getElementById('role_id').value;
        let element = document.getElementById('partner_type_div')
        if(tipe == 4){
            element.classList.remove("hidden");
        }else{
            element.classList.add("hidden");
            document.getElementById('partner_type_select').value=0
        }
    }
</script>

@endsection
