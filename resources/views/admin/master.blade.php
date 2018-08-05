<!DOCTYPE html>
<html>
@include('admin.partial.head')

<body class="skin-blue sidebar-mini" dir="rtl">
<div class="wrapper">
    @include('admin.partial.nav')
    @include('admin.partial.right-sideMenu')

    @include('admin.partial.messages')

    @yield('content')

    @include('admin.partial.footer')
    @include('admin.partial.left-sideMenu')


    <div class="control-sidebar-bg"></div>
</div><!-- ./wrapper -->
@include('admin.partial.scripts')
</body>
</html>
