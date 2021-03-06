<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('BO._layouts.head.headMeta')
    <!-- Bootstrap CSS -->
    @include('BO._layouts.head.headBoostrap')
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    @include('BO._layouts.body.navbar')
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include('BO._layouts.body.sideBar')
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    <div class="dashboard-wrapper">
        <div class="container-fluid dashboard-content ">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
            @include('BO._layouts.body.pageHeader')
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            @yield('wrapper-content')
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
            @include('BO._layouts.body.footer')
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
@include('BO._layouts.end.endBody')
</body>

</html>