<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('') }}/backend//assets/img/favicon.png" rel="icon">
  <link href="{{ url('') }}/backend//assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('') }}/backend/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ url('') }}/backend/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="{{ url('') }}/backend/assets/tags/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css'>

  <link href="{{ url('') }}/backend//assets/css/style.css" rel="stylesheet">
  <style>
    .pagination{
      display: flex;
      justify-content: center;
    }
  </style>

</head>

<body>
    @include('backend.layouts.headers')
    @include('backend.layouts.sidebar')
    <main id="main" class="main">
        @yield('content')
    </main>
    @include('backend.layouts.footer')
    <!-- Vendor JS Files -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/echarts/echarts.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/quill/quill.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ url('') }}/backend/assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="{{ url('') }}/backend/assets/tags/bootstrap-tagsinput.js"></script>
  


   <!-- Template Main JS File -->
  <script src="{{ url('') }}/backend/assets/js/main.js"></script>

 {{-- blog tags --}}
  <script>
     $("#tags").tagsinput('items');
  </script>
</body>
</html>