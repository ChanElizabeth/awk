@extends('backend.layouts.master')

@section('content')
    @include('flash-message')

    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <header class="page-title-bar">

            <!-- title and toolbar -->
            <div class="d-md-flex align-items-md-start">
                <h1 class="page-title mr-sm-auto"> App Settings </h1><!-- .btn-toolbar -->
                
            </div><!-- /title and toolbar -->
            </header>
                <div class="card">
                    <!-- <div class="card-header"><strong>App Settings</strong></div> -->
                    <div class="page-section">

                    <div class="card-body">
                        <form method="POST" action="{{ route('dashboard.admin.setting.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name" class=" form-control-label">Nama</label>
                                <input name="name" type="text" class="form-control" value="{{ $data['name'] }}">
                            </div>

                            <div class="form-group">
                                <label for="desc" class=" form-control-label">Deskripsi</label>
                                <input name="desc" type="text" class="form-control" value="{{ $data['desc'] }}">
                            </div>

                            <div class="form-group">
                                <label for="api_secret_key" class=" form-control-label">FLIP API SECRET</label>
                                <input name="api_secret_key" type="text" class="form-control"
                                    value="{{ $data['FLIP_API_SECRET_KEY'] }}">
                            </div>

                            <div class="form-group">
                                <label for="validation_token" class=" form-control-label">FLIP VALIDATION TOKEN</label>
                                <input name="validation_token" type="text" class="form-control"
                                    value="{{ $data['FLIP_VALIDATION_TOKEN'] }}">
                            </div>

                            <div class="form-group">
                                <label for="environment" class=" form-control-label">FLIP ENV</label>
                                <input name="environment" type="text" class="form-control"
                                    value="{{ $data['FLIP_ENVIRONMENT'] }}">
                            </div>

                            <div class="form-group">
                                <label for="global_fee" class=" form-control-label">FLIP GLOBAL FEE</label>
                                <input name="global_fee" type="text" class="form-control"
                                    value="{{ $data['FLIP_GLOBAL_FEE'] }}">
                            </div>

                            <div class="form-group">
                                <label for="public_key" class=" form-control-label">APP PUBLIC KEY</label>
                                <input name="public_key" type="text" class="form-control"
                                    value="{{ $data['FLIP_PUBLIC_KEY'] }}">
                            </div>

                            <div class="form-group">
                                <label for="private_key" class=" form-control-label">APP PRIVATE KEY</label>
                                <input name="private_key" type="text" class="form-control"
                                    value="{{ $data['FLIP_PRIVATE_KEY'] }}">
                            </div>

                            <div class="form-actions form-group">
                                <button type="submit" class="btn btn-primary pull-right btn-block">Update</button>
                            </div>
                        </form>
                    </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
