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
        <a href="{{PATH_LOCALHOST}}adminProfile" class="nav-link col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            > Volver
        </a>
        </header>    

        <div class="d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col">
        
                <h3>Editar evento</h3>
                    <form method="POST" action="{{PATH_LOCALHOST}}editEvent">
                        <div class="mb-3">
                            <label for="email" class="form-label">Nombre del evento:</label>
                            <input value="<?php echo $infoEvent[0]['eventName'];?>" name="eventName" type="text" class="form-control" id="email">
                        </div>
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="inputGroupSelect01">Artista</label>
                            <select name="idArtist" class="form-select" id="inputGroupSelect01">

                                <?php
                                      $array = count($artistList);
                                         for ($i = 0; $i < $array; ++$i){?>
                                         <?php if($artistList[$i]['id'] == $infoEvent[0]['artistId']){ ?>
                                              <option value="<?php echo $artistList[$i]['id']; ?>" selected ><?php echo $artistList[$i]['artistName']; ?></option>
                                         <?php }else { ?>
                                             <option value="<?php echo $artistList[$i]['id']; ?>"><?php echo $artistList[$i]['artistName']; ?></option>
                                <?php }} ?>

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Ubicación:</label>
                            <input value="<?php echo $infoEvent[0]['location'];?>" name="location" type="text" class="form-control" id="email" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Dirección:</label>
                            <input value="<?php echo $infoEvent[0]['address'];?>" name="address" type="text" class="form-control" id="password" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="validationTextarea" class="form-label">Descripción del evento:</label>
                            <textarea class="form-control" name="eventDescription" id="validationTextarea" required ><?php echo $infoEvent[0]['eventDescription'];?></textarea>
                        </div>

                        <div class="mb-3 input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Pais</label>
                            <select name="countryId" class="form-select" id="inputGroupCountries">
                               
                                <?php
                                      $arrayCountry = count($countryList);
                                         for ($i = 0; $i < $arrayCountry; ++$i){?>
                                         <?php if($countryList[$i]['id'] == $infoEvent[0]['countryId']){ ?>
                                              <option value="<?php echo $countryList[$i]['id']; ?>" selected ><?php echo $countryList[$i]['contryName']; ?></option>
                                         <?php }else { ?>
                                             <option value="<?php echo $countryList[$i]['id']; ?>"><?php echo $countryList[$i]['contryName']; ?></option>
                                <?php }} ?>
                                
                            </select>
                        </div>
                        <div class="mb-3 input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Provincia</label>
                            <select name="provId" class="form-select" id="idProvince">
                            <?php
                                      $arrayprovinceList = count($provinceList);
                                         for ($i = 0; $i < $arrayprovinceList; ++$i){?>
                                         <?php if($provinceList[$i]['id'] == $infoEvent[0]['provinceId']){ ?>
                                              <option value="<?php echo $provinceList[$i]['id']; ?>" selected ><?php echo $provinceList[$i]['province']; ?></option>
                                         <?php }else { ?>
                                             <option value="<?php echo $provinceList[$i]['id']; ?>"><?php echo $provinceList[$i]['province']; ?></option>
                                <?php }} ?>
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Ciudad:</label>
                            <input value="<?php echo $infoEvent[0]['township'];?>" name="township" type="text" class="form-control" id="password" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Código postal:</label>
                            <input value="<?php echo $infoEvent[0]['postalCode'];?>" name="postalCode" type="text" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Enlace venta de tickets:</label>
                            <input value="<?php echo $infoEvent[0]['ticketsLink'];?>" name="ticketsLink" type="text" class="form-control" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Fecha:</label>
                            <input value="<?php echo $infoEvent[0]['date'];?>" name="dateEvent" type="date" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Hora apertura de evento:</label>
                            <input value="<?php echo $infoEvent[0]['timeStart'];?>" name="timeStart" type="time" class="form-control">
                        </div>
                        <div class="mb-3 input-group">
                            <label class="input-group-text" for="inputGroupSelect01">Empresa promotora</label>
                            <select name="companyId" class="form-select" id="inputGroupSelect01">

                                <?php
                                      $arrayCompany = count($companyList);
                                         for ($i = 0; $i < $arrayCompany; ++$i){?>
                                         <?php if($companyList[$i]['id'] == $infoEvent[0]['compId']){ ?>
                                              <option value="<?php echo $companyList[$i]['id']; ?>" selected ><?php echo $companyList[$i]['nameCompany']; ?></option>
                                         <?php }else { ?>
                                             <option value="<?php echo $companyList[$i]['id']; ?>"><?php echo $companyList[$i]['nameCompany']; ?></option>
                                <?php }} ?>
                            </select>
                        </div>

                        <input value="<?php echo $infoEvent[0]['id'];?>" name="eventId" type="hidden" class="form-control">
                        <button type="submit" class="btn btn-primary w-100 my-2">Modificar evento</button>
                    </form>

            </div>

        </div>
        </div>

    </div>

    


@stop



@section('script')
    <script>	

            // ajax provinvias
$( "#inputGroupCountries" ).change(function() {
  $Vcountry=$(this).val();
  //alert("Vcountry");
  SearchCountry($Vcountry);
  
});

// ajax search for countries
function SearchCountry(Vcountry){
  $.ajax({
    type: "POST",
    data:{
    id: Vcountry
    },
    url: "{{PATH_LOCALHOST}}country/search",  
    success: function(response) {
    var data = JSON.parse(response);    
    $( "#idProvince" ).empty();
    $( "#idProvince" ).append( $( "<option value='x' selected disabled>Selecciona una subcategoría</option>" ) );
    $.each( data, function( key, value ) {
    $( "#idProvince" ).append( $( "<option value=" + value.id + ">" + value.province + "</option>" ) );
    });


}
});
}	

    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop



@stop

