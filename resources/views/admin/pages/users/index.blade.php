@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ادارة المستخدمين
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Advanced Elements</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box">
                <div class="box-header">
                  <h3 class="box-title"></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead sty>
                      <tr>
                        <th style="text-align: right;">اسم المستخدم</th>
                        <th style="text-align: right;">ايميل</th>
                        <th style="text-align: right;">المحمول</th>
                        <th style="text-align: right;">الصورة</th>
                        <th style="text-align: right;">edit</th>
                        <th style="text-align: right;">delete</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                      <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->phone}}</td>
                        <td><img class="img-responsive" src="{{$user->image_path}}"></td>
                        <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form method="POST" action="/users/{{$user->id}}" accept-charset="UTF-8">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </form>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                    <!-- <tfoot>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                      </tr>
                    </tfoot> -->
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@stop