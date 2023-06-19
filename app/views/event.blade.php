@extends('layouts.main_template.primary')

@section('title','Evento')

@section('style')
<style>
    .shadow{
        background-color: rgb(246, 246, 246);
    }

    .imgArtist{
        background-image:url("{{PATH_LOCALHOST}}<?php echo $sqlEvent[0]['route'];?>"); 
        /* Full height */
        height: 350px;

        /* Center and scale the image nicely */
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    #container {
        height: 100vh;
  background: rgb(2, 0, 36);
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(11, 94, 215, 1) 0%,
    rgba(221, 255, 187, 1) 100%
  );
}

.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  top: -5px;
  right: 110%;
}

.tooltip .tooltiptext::after {
  content: "";
  position: absolute;
  top: 50%;
  left: 100%;
  margin-top: -5px;
  border-width: 5px;
  border-style: solid;
  border-color: transparent transparent transparent black;
}
.tooltip:hover .tooltiptext {
  visibility: visible;
}

</style>
@stop

@section('body')
@include('layouts.main_template.simpleHeader2')
   

    <div class="container">
        
        <div class="row imgArtist">
            <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{PATH_LOCALHOST}}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{PATH_LOCALHOST}}viewEvents">Eventos</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $sqlEvent[0]['artistName'];?></li>
                </ol>
            </nav>

            </div>
        </div>

        <div class="row mt-2">
           
                            
                            <div class="col-3">
                                <h4><?php echo $sqlEvent[0]['eventName'];?></h4>
                                <strong class="card-text"><?php echo $sqlEvent[0]['province'];?> · <?php echo $sqlEvent[0]['contryName'];?></strong>
                                <p><strong>Fecha:</strong> <?php echo $sqlEvent[0]['fecha'];?></p>
                                <p><strong>Lugar:</strong> <?php echo $sqlEvent[0]['location'];?></p>
                                <p><strong>Dirección:</strong> <?php echo $sqlEvent[0]['address'];?></p>
                                <p><strong>Ciudad:</strong> <?php echo $sqlEvent[0]['township'];?></p>
                                <p><strong>Inicio:</strong> <?php echo $sqlEvent[0]['timeStart'];?></p>
                                <p><strong>Entradas:</strong> <?php echo $sqlEvent[0]['ticketsLink'];?></p>
                            </div>
                            <div class="col-4">
                                <h4>INFO</h4>
                                <p>
                                <?php echo $sqlEvent[0]['eventDescription'];?>
                                </p>
                            </div>
                        
                        
                 

                    <div class="col-5">

                        <div class="row">
                            <div class="p-2 bg-light bg-gradient my-1 rounded-pill">
                                <?php if (isset($_SESSION["Membership"]["UserID"])){ ?>
                                <a href="{{PATH_LOCALHOST}}createTrip/<?php echo $sqlEvent[0]['id'];?>" id ="profile" class="text-decoration-none">
                                    <i class="fa-solid fa-car"></i> ¿Compatir coche?
                                </a>
                                <?php } ?>
                            </div>
                        </div>   
                            <div class="row p-2">
                                
                                
                                <?php
                                $arrayTrips = count($sql2);
                                for ($i = 0; $i < $arrayTrips; ++$i){
                                ?>
                                <div class="">
                                <h5>Viajes publicados por usuarios</h5>
                             
                                <div class="card" style="width: 25rem;">

                                    <div style="height: 30vh;background-color: #e7e7e7;overflow-y: scroll;overflow-x:scroll">
                                        <div><i class="fa-solid fa-map-pin"></i>
                                        <?php echo $sql2[$i]['pickUpLocation'];?>
                                        <i class="fa-solid fa-arrow-right"></i>
                                        <?php echo $sql2[$i]['eventDestination'];?>

                                        <?php if (isset($_SESSION["Membership"]["UserID"])){ ?>
                                        <a href="{{PATH_LOCALHOST}}tripDetails/<?php echo $sql2[$i]['id'];?>" type="button" class="btn btn-primary btn-sm">Ver más</a>
                                        <?php } else{ ?>
                                        <a href="#" type="button" class="btn btn-secondary btn-sm">Ver más</a>
                                        
                                        <?php } ?>
                                        </div>
                                    </div>

                                    <?php } ?>
                                </div>
                                </div>
                            </div>    
                        </div>
                    </div>
            </div>
        </div>

      
        <!-- SECTION MINI BLOG -->
        <div class="row justify-content-center mt-5 backgroundGreen">
            <!-- aqui puedo add otra col para los anuncios -->
            
            <div class="col-sm-6 col-md-4 p-2 ">
                <h4>Déjanos tus opinión sobre este evento <i class="fa-solid fa-face-laugh-wink"></i></h4>                            
                <form method="POST" action="{{PATH_LOCALHOST}}saveComent">

                    <div class="form-floating mb-1">
                        <textarea required maxlength="25" name="comment" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        <label for="floatingTextarea2">¿Qué opinas sobre este evento?</label>
                    </div>
                    
                <?php if (isset($_SESSION["Membership"]["UserID"])) { ?>
                    <input value="<?php echo $sqlEvent[0]['id'];?>" name="idEvent" type="hidden" class="form-control">
                    <input value="<?php echo $_SESSION["Membership"]["UserID"] ?>" name="idUser" type="hidden" class="form-control">
                    
                    <div class="d-flex">
                    <button type="submit" class="btn btn-primary me-2" id="synchronize" >Publicar</button>

                    
                <?php } else { ?>
                    <button onmouseover="mostrarAlerta();" onmouseout="ocultarAlerta();" id="btn" type="button" class="btn btn-secondary mb-3">Publicar</button>

                    <span>¡Debes iniciar sesión!</span>
                    <div id="alertContainer"></div>
                    <?php
                    }
                    ?>
                </form>
                <?php if (isset($_SESSION["Membership"]["UserID"])) { ?>
                <div class="d-grid gap-2 d-md-block">
                    <?php if($eventcalendar == NULL || $eventcalendar == ""){?>
                        <a href="{{PATH_LOCALHOST}}incalendar/<?php echo $sqlEvent[0]['id'] ?>" class="btn btn-primary" id="followbtn" type="button">Agregar a mi Calendario <i class="fas fa-calendar"></i></a>
                    <?php }else{?>
                        <a href="{{PATH_LOCALHOST}}outcalendar/<?php echo $eventcalendar[0]['id'] ?>/<?php echo $eventcalendar[0]['eventid'] ?>" class="btn btn-primary" id="followbtn" type="button">Quitar del Calendario <i class="fas fa-calendar"></i></a>
                    <?php }?>
                </div>
                <?php }?>
                </div>
                
            </div>

            <div class="col-sm-6 col-md-4 p-2">

                <div class="card" style="width: 18rem;">
                    <div class="card-header">
                        Comentarios <i class="fa-solid fa-comments"></i>
                    </div>
                    <ul id="commentList" class="list-group list-group-flush" style="height: 30vh;background-color: #e7e7e7;overflow-y: scroll;overflow-x:none">
                     
                    </ul>
                </div>

            </div>
            
            <!-- aqui puedo add otra col para los anuncios -->
        </div>

          

    </div>

    


@stop



@section('script')
<script>

$(document).ready(function() {
  $('#synchronize').click(ajax);
  
  setInterval(ajaxTimer, 10000);
  ajax();
});

function ajaxTimer(){ 
    ajax();
};

function ajax(){
    
$.ajax({
url: "{{PATH_LOCALHOST}}getComments", 
method:'POST',
data:{
    id: "<?php echo $sqlEvent[0]['id'];?>"
    },
success: function(response) {

resultados = JSON.parse(response); 
$("#commentList").empty();
$.each(resultados, function(index, val) { 
    var txt1 = "<li class='list-group-item'><i class='fa-solid fa-user'></i><strong>"+val.name+" ha comentado:</strong> "+val.comment+"</li>";             
    $("#commentList").append(txt1);  
    
});

}

});
}
   /*
   var timeoutId;

   function mostrarAlerta() {
    clearTimeout(timeoutId);

    var alerta = document.createElement('div');
    alerta.className = 'alert alert-warning';
    alerta.role = 'alert';
    alerta.innerText = 'Debes iniciar sesión!';

    var container = document.getElementById('alertContainer');
    container.appendChild(alerta);

    timeoutId = setTimeout(function() {
      ocultarAlerta();
    }, 2000);
  }


  function ocultarAlerta() {
    var container = document.getElementById('alertContainer');
    var alerta = container.firstChild;
    container.removeChild(alerta);
  }
*/
    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop



@stop

