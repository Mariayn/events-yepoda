<div class="container">

    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
      <a href="{{PATH_LOCALHOST}}" class="nav-link col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="./assets/images/logo-brand.png" alt="logo-brand" width="150" height="50">
      </a> 

      <h4>Eventos</h4>

    

        <?php if (isset($_SESSION["Membership"]["UserID"])){ ?>
      <div class="col-md-3 text-end">

        <a class="btn btn-dark btn-primary text-decoration-none" href="{{PATH_LOCALHOST}}logout">Cerrar sesión
        </a>

        <a href="{{PATH_LOCALHOST}}userProfile" id ="profile" >
          <i class="fa-solid fa-user fa-lg ms-4" style="color: #000000;"></i>
        </a>
               
      </div>
      <?php }else{?>

      <div class="col-md-3 text-end">
        <button type="button" class="btn btn-outline-primary me-2" data-bs-dismiss="modal" 
        data-bs-toggle="modal" data-bs-target="#loginModal">Iniciar sesión</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" 
        data-bs-toggle="modal" data-bs-target="#registroModal">
        Regístrate</button>
      </div>
      <?php } ?>

 

    

    </header>

</div>