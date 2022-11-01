<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Ms.Maniquine</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.0/tailwind.min.css" integrity="sha512-wOgO+8E/LgrYRSPtvpNg8fY7vjzlqdsVZ34wYdGtpj/OyVdiw5ustbFnMuCb75X9YdHHsV5vY3eQq3wCE4s5+g==" crossorigin="anonymous" />
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/simplebar.css')}}">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/feather.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/uppy.min.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/jquery.steps.css')}}">
    <link rel="stylesheet" href="{{asset('admin/css/quill.snow.css')}}">
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('admin/css/app-light.css')}}">
    <!--editer--> 
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" integrity="sha512-aEe/ZxePawj0+G2R+AaIxgrQuKT68I28qh+wgLrcAJOz3rxCP+TwrK5SPN+E5I+1IQjNtcfvb96HDagwrKRdBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  @livewireStyles
  <body class="vertical  light">
    <div class="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
            @include('admin.navbar')
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
            @include('admin.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
            <!--@yield('lay')-->

            {{$slot}}
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div> <!-- .wrapper -->
    <script src="{{asset('admin/js/jquery.min.js')}}"></script>
    <script src="{{asset('admin/js/popper.min.js')}}"></script>
    <script src="{{asset('admin/js/moment.min.js')}}"></script>
    <script src="{{asset('admin/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/js/simplebar.min.js')}}"></script>
    
    <script src="{{asset('admin/js/jquery.stickOnScroll.js')}}"></script>
    <script src="{{asset('admin/js/tinycolor-min.js')}}"></script>
    <script src="{{asset('admin/js/config.js')}}"></script>
    <script src="{{asset('admin/js/config.fontawesome.min.js')}}"></script>
    <script src="{{asset('admin/js/config.fontawesome.js')}}"></script>
    <script src="{{asset('admin/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
      $('#dataTable-1').DataTable(
      {
        autoWidth: true,
        "lengthMenu": [
          [16, 32, 64, -1],
          [16, 32, 64, "All"]
        ]
      });
    </script>
    @stack('scripts')
    <script src="{{asset('admin/js/apps.js')}}"></script>
    
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-56159088-1"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js" integrity="sha512-GDey37RZAxFkpFeJorEUwNoIbkTwsyC736KNSYucu1WJWFK9qTdzYub8ATxktr6Dwke7nbFaioypzbDOQykoRg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
    @livewireScripts
   
  </body>
</html>