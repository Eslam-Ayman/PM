@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Advanced Form Elements
                <small>Preview</small>
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Advanced Elements</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

             <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Quick Example</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
                        <div class="box-body">
                        @csrf
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group row">

                            <div class="col-md-6 col-xs-offset-2">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{$user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Name') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 col-xs-offset-2">
                                <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{$user->phone}}" required>

                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="phone" class="col-md-2 col-form-label text-md-right">Phone</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 col-xs-offset-2">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$user->email}}" required>

                                
                            </div>
                            <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 col-xs-offset-2">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                
                            </div>
                            <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6 col-xs-offset-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                            </div>
                            <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        </div>

                        <div class="form-group">
                            <label class="">
                              <div class="iradio_flat-green checked" aria-checked="false" aria-disabled="false" style="position: relative;">
                                <input type="radio" name="type" class="flat-red" checked="" style="position: absolute; opacity: 0;" value="1">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                               </div>
                              Normal User
                            </label>
                            <label class="">
                              <div class="iradio_flat-green"  aria-checked="true" aria-disabled="false" style="position: relative;">
                                <input type="radio" name="type" class="flat-red" style="position: absolute; opacity: 0;" value="0">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                              </div>
                              Admin
                            </label>
                          </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <input name="image_name" type="file" class="btn btn-success pull-right">
                            </div>
                        </div>
                    </div>
                    </form>
                    <img src="{{$user->image_path}}" class="img-responsive">
              </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@stop