@extends('layouts.main_template.primary')

@section('title','Mi perfil')

@section('style')
<style>
</style>
@stop

@section('body')
    @include('layouts.main_template.simpleHeader')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js'></script>
    <div class="container">
        <div class="row bg-light rounded m-2"><!---------ROW 1--------->
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{PATH_LOCALHOST}}">Ir a inicio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Mi cuenta</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-around bg-light rounded p-3 m-2"><!---------ROW 2--------->
            <div class="col-sm-12 col-3 col-md-2 position-relative">
                <nav class="nav flex-column">
                    <a class="nav-link active fw-bold" aria-current="page" href="#">Mi cuenta</a>
                    
                    <?php
                        $myArray = count($sqlTrip);
                        if($myArray==0){
                    ?>
                    
                    <?php } else{ ?>
                    <a class="nav-link" href="{{PATH_LOCALHOST}}myTrips/<?php echo $_SESSION["Membership"]["UserID"]?>"> <i class="fa-solid fa-car"></i> Ver viaje</a>    
                    <?php } ?>
                </nav>
            </div>

            <div class="col-sm-12 col-4 col-md-4 position-relative">
                <div class="container">
                    <h3>Mi cuenta</h3>
                    <p class="InfoField__label">Usuario</p>
                    <p class="InfoField__value text-primary"><?php echo $_SESSION["Membership"]["Name"]?></p>
                    <p class="InfoField__label">Email</p>
                    <p class="InfoField__value text-primary"><?php echo $_SESSION["Membership"]["Email"]?></p>

                    <div class="mt-4">
                        <h4>Contraseña</h4>
                        <form onSubmit = "return verifyPass(this)" method="POST" action="{{PATH_LOCALHOST}}password">
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Contraseña antigua</label>
                            <input  name="oldPass" type="password" class="form-control" id="formGroupExampleInput" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Contraseña nueva</label>
                            <input required name="newPass" type="password" class="form-control" id="pass1">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Confirmar contraseña nueva</label>
                            <input required name="newPass2" type="password" class="form-control" id="pass2">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="col-sm-12 col-5 col-md-6 position-relative" >
                <h3><i class="fa-solid fa-calendar"></i> Mi calendario</h3>
                <div id='calendar'>
                    
                </div>

            </div>
            

        </div>

    </div>

    

    @section('script')
    <script>

function verifyPass(){
    //console.log("sdsd")
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
        if(pass1 !== pass2){
            //event.preventDefault();
            alert("Las claves introducidas no son iguales");
            return false;
        }
}



document.addEventListener('DOMContentLoaded', function() {
    

    var calendarEl = document.getElementById('calendar');
        var ret;
        var calendar = new FullCalendar.Calendar(calendarEl, {

    eventClick: function(info) {
        window.location.href = "{{PATH_LOCALHOST}}eventDetails/"+ info.event.id ;
    }
  });

  calendar.setOption('locale', 'es');
  calendar.render();
  calendar.changeView('listWeek');
  $.ajax({
  url: "{{PATH_LOCALHOST}}calendar/collect", 
  method:'post',
 
  data: { 
  },
  success: function(response) {

    var events = []; 
    resultados = JSON.parse(response); 

    
    $.each(resultados, function(index, val) { 
        calendar.addEvent({
        id: val.id,
        title: val.eventName,
        code: val.id,
        direccion: val.adress,
        start: val.date + 'T' + val.timeStart,
        end:  val.date + 'T' + val.timeStart,
        extendedProps: {
        description:  val.eventDescription
        
        },
    
        
      });
    });
    callback(events);

  }



});
        $(".fc-toolbar-chunk").children('button').text( "Hoy" );

        
      $(".fc-button-group").on('click', function(event){
        $(".fc-toolbar-chunk").children('button').text( "Hoy" );
      });

        $(".fc-toolbar-chunk").on('click', function(event){
            $(".fc-toolbar-chunk").children('button').text( "Hoy" );
        });
      });
    </script>    
@stop




@stop

