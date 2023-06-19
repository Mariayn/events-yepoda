

    <header class="px-4 d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom" style="background-color:#D8FBBC">
      <a href="{{PATH_LOCALHOST}}" class="nav-link col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <img src="./assets/images/logo-brand.png" alt="logo-brand" width="150" height="50">
      </a>
      
      <?php if ($_SESSION["Membership"]["Rol"]==="admin"){ ?>
      <a class="text-decoration-none" href="{{PATH_LOCALHOST}}adminProfile">Perfil Administrador</a>
      <?php }?>   

      <ul class="nav justify-content-end">

        <?php if (isset($_SESSION["Membership"]["UserID"])){ ?>
        <li class="nav-item">
            <a href="#" class="nav-link"><i class="fa-regular fa-bell"></i>
            </a>
        </li>

        <li class="nav-item dropdown">
          <div class="TextAvatar nav-link" data-bs-toggle="dropdown">
            <span class="TextAvatar__letter">m</span>
          </div>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Mi cuenta</a></li>
            <li><a class="dropdown-item" href="#">Ajustes</a></li>
            <li><a class="dropdown-item" href="{{PATH_LOCALHOST}}logout">Cerrar sesión</a></li>
          </ul>
        </li>

      </ul>

      <?php }?>   

    </header>

