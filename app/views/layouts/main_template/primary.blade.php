<!DOCTYPE html>
<html lang="es">
<!-- Head Tag Inic-->
<head>
  <title>@yield('title', 'maria')</title><!-- YIELD con 2 datos,primero es nombre del yield y el sgdo es un placeholder-->
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="icon" type="image/png" href="{{PATH_LOCALHOST}}assets/images/Favicon.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1"> 
  <!--FONT AWESOME-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
  
  <!-- Bootstrap Reference -->
  <link rel="stylesheet" href="{{PATH_LOCALHOST}}vendor/twbs/bootstrap/dist/css/bootstrap.min.css?{{date('YmdHis')}}">
  <link rel="stylesheet" href="{{PATH_LOCALHOST}}assets/css/style.css?{{date('YmdHis')}}">      
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Yusei+Magic&display=swap" rel="stylesheet">

  <script type="text/javascript">var PATH_LOCALHOST= "<?= PATH_LOCALHOST ?>";</script> 

  <!-- JQuery Reference -->
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

  <!-- Datatable Reference -->
  <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

  @yield('style')
  
  </head>

  <body>


    @yield('body')

    


  </body>


@yield('script')
</html>