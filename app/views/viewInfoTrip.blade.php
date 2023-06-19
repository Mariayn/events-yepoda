@extends('layouts.main_template.primary')

@section('title','Mi perfil')

@section('style')
<style>

</style>
@stop

@section('body')
   
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>



    <div class="container">

        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 border-bottom">
        <a href="{{PATH_LOCALHOST}}viewEvents" class="nav-link col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <i class="fa-solid fa-chevron-right fa-xs"></i> Volver
        </a>
        </header>    


        <div class="row  justify-content-center">
        
                <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                    <h2>¿De ida al evento? <br> ¿Te gustaría compartir coche?</h2>
                </div>

                <div class="col-12 col-md-4 col-lg-4 form-group mt-2">
                    <h3>Viaje para el evento <strong><?php echo $infoTrip[0]['eventName'];?></strong></h3>
                    
                    <div class="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" colspan=2 style="text-align: center;">Detalles</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Punto de recogida:</td>
                                <td><?php echo $infoTrip[0]['pickUpLocation']; ?></td>
                            </tr>
                            <tr>
                                <td>Punto de llegada:</td>
                                <td><?php echo $infoTrip[0]['destination']; ?></td>
                            </tr>
                            <tr>
                                <td>Plazas:</td>
                                <td><?php echo $infoTrip[0]['nPlazas']; ?></td>
                            </tr>
                            <tr>
                                <td>Precio del viaje:</td>
                                <td><?php echo $infoTrip[0]['price']; ?></td>
                            </tr>
                            <tr>
                                <td>Link:</td>
                                <td><?php echo $infoTrip[0]['link']; ?></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>

                    

                </div>

                <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-center align-items-center">
                <button type="button" class="btn btn-primary btn-lg" id="btnAbrirCorreo" onclick="abrirCorreo()">Envía un mensaje a <?php echo $infoTrip[0]['name'];?> </button>
                </div>

        </div>

 

    

    </div>



@stop



@section('script')
    <script>	
    //function opens default email address
    function abrirCorreo() {
    var direccionCorreo = "<?php echo $infoTrip[0]['email'];?>";
    window.open("mailto:" + direccionCorreo);
    }

    
   
    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop



@stop

