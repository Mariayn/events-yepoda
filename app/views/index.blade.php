@extends('layouts.main_template.primary')

@section('title','YEPODA | Embrace the moment')

@section('style')
<style>
.error-messageLogin {
  display: none;
  margin-top: 10px;
}

</style>
@stop

@section('body')
    @include('layouts.main_template.header')

<?php
// Obtener el mensaje de error de la variable de sesión
$error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : null;
unset($_SESSION['login_error']); // Limpiar la variable de sesión
//echo $error;
?>

    <div class="container">

      <div class="row py-5" >
        <div class="row justify-content-center">

          <!-- Mostrar el mensaje de error -->
          <?php if ($error): ?>
          <div id="error-messageLogin" class="error-messageLogin alert alert-danger mb-3" role="alert"><?php echo $error; ?></div>
          <?php endif; ?>
          
          <div class="col-6 text-center">
            <h3>¡La mejor plataforma web de kpop donde encontrarás a tus artistas favoritos!</h3>
            <h5>La mejor noche de tu vida está esperando.
              <br>
              Y nosotros tenemos la información.
            </h5>
          </div>
        </div>
        <form method="POST" action="{{PATH_LOCALHOST}}searcher">
          <div class="row justify-content-center mt-3">
            <div class="col-6 d-flex">
              
              <input name="search" type="text" class="form-control" id="floatEvent" placeholder="Busca por artista,banda o localidad">
              <button type="submit" class="btn btn-primary" id="button_search">
                <img src="{{PATH_LOCALHOST}}assets/images/magnifyingGlass.png" class="icon-magnifier search-icon" style="height: 22px">
              </button>
              
            </div>                
          </div>
        </form>
      </div>

      <div class="row justify-content-center">
        <div class="col-11">

          <div class="row justify-content-around bg-light rounded p-3 m-2"><!--a lo tengo q quitar-->
                <?php
                $array = count($mainEvents);
                for ($i = 0; $i < $array; ++$i){
                ?>
            <div class="col-md-3 card">
                  <img src="{{PATH_LOCALHOST}}<?php echo $mainEvents[$i]['route'];?>" class="card-img-top" style="height: 100px">
                  <div class="card-body">
                    <p class="card-text"><?php echo $mainEvents[$i]['eventName'];?></strong> | <?php echo $mainEvents[$i]['fecha'];?></p>
                    <a href="{{PATH_LOCALHOST}}eventDetails/<?php echo $mainEvents[$i]['id'];?>" class="card-link text-decoration-none">Ver más <i class="fa-solid fa-angles-right"></i></a>
                  </div>
            </div>
            <?php } ?>
            
          </div>

        </div>
      </div>

      <!--btn ver todos los eventos-->
      <div class="row justify-content-center">
        <div class="col-sm-6 col-md-4 py-3">
          <button id="upcoming_events" class="btn btn-secondary mx-auto d-block"> <a href="{{PATH_LOCALHOST}}viewEvents" style="color: #ffffff;text-decoration: none;">Ver todos los eventos</a>
          </button>
        </div>
      </div>

      <!--section de subscripcion-->
      <div class="row py-5 justify-content-center" id="container">
        
          <div class="col-6 text-center beautyGreen" style="padding:20px">
            <h3>¡Subscríbete para recibir las últimas novedades de tus artistas favoritos!</h3>

            <div class="d-flex">
              <input type="text" class="form-control" id="floatEvent" placeholder="email@example.com">
              <button type="button" class="btn btn-primary" id="button_search">
                Subcribirme
              </button>
            </div> 
          </div>

      </div>

       
      </div>

      

    </div>
      <!--footer-->
      @include('layouts.main_template.footer')

@stop

@section('script')
    <script>


//esta función espera a que se cargue el documento HTML para obtener el mensaje de error del servidor y llamar a la función showError() si existe un mensaje de error
$(document).ready(function() {
    // Obtener el mensaje de error del servidor
    var error = "<?php echo $error; ?>";

    if (error) {
      showError(error);
    }
  });

function showError(message) {
  var errorDiv = $('#error-messageLogin');
  errorDiv.text(message);
  errorDiv.show();
  setTimeout(function() {
    errorDiv.fadeOut();
  }, 2000);
}


    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop




@stop