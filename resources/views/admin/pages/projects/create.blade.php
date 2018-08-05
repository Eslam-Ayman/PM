@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                اضافة مشروع جديد
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
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" action="/projects" method="POST"  enctype="multipart/form-data">
                  <div class="box-body">
                 @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">العنوان</label>
                      <input type="text" class="form-control" placeholder="" name="title">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">الوصف</label>
                      <input type="text" class="form-control" placeholder="" name="description">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">موعد الانتهاء</label>
                      <input type="date" class="form-control" placeholder="" name="due_date">
                    </div>
                    <div class="form-group">
                      <label>المستخدم</label>
                      <select class="form-control select2" style="width: 100%;" name="user_id">
                        @foreach($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select>
                    </div><!-- /.form-group -->
                    <div class="form-group">
                      <label for="exampleInputPassword1">نسبة التقدم</label>
                      <input id="range_6" type="text" value="" name="precentage">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">الصور</label>
                      <input type="file" id="exampleInputFile" multiple="multiple" name="image_name[]">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">الملفات</label>
                      <input type="file" id="exampleInputFile" multiple="multiple" name="file_name[]">
                    </div>
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">أضافة</button>
                  </div>
                </form>
              </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    
@stop