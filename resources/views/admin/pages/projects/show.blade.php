@extends('admin.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                ممحادثة المشروع
            </h1>
            <!-- <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Forms</a></li>
                <li class="active">Advanced Elements</li>
            </ol> -->
        </section>

        <!-- Main content -->
        <section class="content">

             <div class="box box-success">
                <div class="box-header">
                  <i class="fa fa-comments-o"></i>
                  <h3 class="box-title">Chat</h3>
                </div>
                <div class="box-body chat" id="chat-box">
                @foreach($project->messages as $message)
                  <!-- chat item -->
                  <div class="item">
                    <img src="{{$message->user->image_path}}" alt="user image" class="online">
                    <p class="message">
                      <a href="#" class="name">
                        <small class="text-muted pull-left"><i class="fa fa-clock-o"></i> {{$message->created_at}}</small>
                        {{$message->user->name}}
                      </a>
                      {{$message->message}}
                    </p>
                    @if(count($message->images) > 0 || count($message->files) > 0)
                    <div class="attachment">
                      <h4>Attachments:</h4>
                      <p class="filename">
                      @foreach($message->images as $image)
                        <img src="{{$image->image_path}}" class="col-xs-2">
                        @endforeach
                      </p>
                      <div class="pull-left">
                        <!-- <button class="btn btn-primary btn-sm btn-flat">Open</button> -->
                      </div>
                    </div><!-- /.attachment -->
                    @endif
                  </div><!-- /.item -->
                @endforeach
                </div><!-- /.chat -->
                <div class="box-footer">
                <form action="/projects/{{$project->id}}/message" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="input-group">
                    <input class="form-control" placeholder="Type message..." name="message" required>
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i></button>
                    </div>
                  </div>
                  <div class="form-group">
                      <label for="exampleInputFile">الصور</label>
                      <input type="file" id="exampleInputFile" multiple="multiple" name="image_name[]">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputFile">الملفات</label>
                      <input type="file" id="exampleInputFile" multiple="multiple" name="file_name[]">
                    </div>
                </form>
                </div>
              </div><!-- /.box (chat box) -->

        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
@stop