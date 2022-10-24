
<!DOCTYPE html>
<html lang="en">

<head>
<title>Admin @yield('title')</title>
 @include('admin.head')   
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

       @include('admin.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('admin.topbar')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-4 text-gray-800">Blank Page</h1> -->
                <p>@yield('content-title')</p>
                @yield('content')
                
                </div>
                <!-- /.container-fluid -->
               
            </div>
            <!-- End of Main Content -->

            @include('admin.footer')

        </div>
        <!-- End of Content Wrapper -->
       
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <form action="/logout" method="post">
                    @csrf
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" type="submit" value="logout">
                    </form>
                </div>
            </div>
        </div>
    </div>

  @include('admin.script')

</body>

</html>