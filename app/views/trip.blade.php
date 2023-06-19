@extends('layouts.main_template.primary')

@section('title','Evento')

@section('style')
<style>
    .shadow{
        background-color: rgb(246, 246, 246);
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

</style>
@stop

@section('body')
@include('layouts.main_template.simpleHeader2')
   

    <div class="container">
        
        <div class="row">
            <div class="col-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{PATH_LOCALHOST}}">Inicio</a></li>
                    <li class="breadcrumb-item"><a href="{{PATH_LOCALHOST}}viewEvents">Eventos</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Compartir coche</li>
                </ol>
            </nav>

            </div>
        </div>
        
        <?php if (isset($_SESSION["Membership"]["UserID"])) { ?>

        <div class="row justify-content-center">

            <div class="col-sm-6 col-md-4">
                <div class="form-group shadow p-3 rounded">
                    <h3>Registrar Viaje</h3>
                    <form method="POST" action="{{PATH_LOCALHOST}}registerTrip">
                        <input value="<?php echo $myEvent[0]['id'];?>" name="eventId" type="hidden">
                        <input value="<?php echo $_SESSION["Membership"]["UserID"] ?>" name="userId" type="hidden" class="form-control">

                        <div class="mb-3">
                            <label for="email" class="form-label">Viaje para el evento:</label>
                            <input value="<?php echo $myEvent[0]['eventName'];?>" type="text" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Punto de recogida:</label>
                            <input name="pickUpLocation" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Punto de llegada:</label>
                            <input value="<?php echo $myEvent[0]['address'];?> | <?php echo $myEvent[0]['township'];?>" name="eventDestination" type="text" class="form-control" id="email" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirma Punto de llegada:</label>
                            <input name="userDestination" type="text" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Plazas:</label>
                            <input name="nPlazas" type="text" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Precio del viaje:</label>
                            <input name="price" type="text" class="form-control" id="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Link:</label>
                            <input name="link" type="text" class="form-control" id="password">
                        </div>

                        <button type="submit" class="btn btn-primary w-100 my-2">Registrar viaje</button>
                    </form>
                </div>
            </div>

            <div class="col-sm-6 col-md-4">
                <div class="text-center" >
              
                </div>
            </div>

        </div>

        <?php } else { ?>
        los siento, no puedes acceder.
        <?php
        }  ?>
          

    </div>

    


@stop



@section('script')
<script>


    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop



@stop

