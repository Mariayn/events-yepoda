@extends('layouts.main_template.primary')

@section('title','Mi perfil')

@section('style')
<style>


.custom-table {
        background-color: #BCD8FB;
    }
    
    .custom-table td {
        border: 1px solid #FBBCD8;
        max-width: 200px; /* Ajusta el valor según tus necesidades */
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
    
    .custom-table td:first-child {
        border-left: none;
        border-top-left-radius: 10px; /* Ajusta el valor según tus necesidades */
        border-bottom-left-radius: 10px; /* Ajusta el valor según tus necesidades */
    }
    
    .custom-table td:last-child {
        border-right: none;
        border-top-right-radius: 10px; /* Ajusta el valor según tus necesidades */
        border-bottom-right-radius: 10px; /* Ajusta el valor según tus necesidades */
    }



</style>
@stop

@section('body')
    @include('layouts.main_template.simpleHeader')
    <link href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css" rel="stylesheet">
  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" language="javascript" src="https://nightly.datatables.net/responsive/js/dataTables.responsive.min.js"></script>

    <div class="container">
        <div class="row justify-content-around mt-3">
            <div class="col-sm-12 col-md-3 col-lg-3">
                <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <strong>Empresa</strong>
                    <button class="nav-link textBeautyGreen" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Registrar empresa</button>
                    <button class="nav-link textBeautyGreen" id="v-pills-companyList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-companyList" type="button" role="tab" aria-controls="v-pills-companyList" aria-selected="false">Ver empresas</button>
                
                    <span class="fw-bold">Evento</span> 
                    <button class="nav-link textBeautyGreen" id="v-pills-registerEvent-tab" data-bs-toggle="pill" data-bs-target="#v-pills-registerEvent" type="button" role="tab" aria-controls="v-pills-registerEvent" aria-selected="false">Registrar evento</button>
                    <button class="nav-link textBeautyGreen" id="v-pills-eventLists-tab" data-bs-toggle="pill" data-bs-target="#v-pills-eventLists" type="button" role="tab" aria-controls="v-pills-eventLists" aria-selected="false">Ver eventos</button>

                    <span class="fw-bold">Artista</span> 
                    <button class="nav-link textBeautyGreen" id="v-pills-registerArtist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-registerArtist" type="button" role="tab" aria-controls="v-pills-registerArtist" aria-selected="false">Registrar artista</button>
                    <button class="nav-link textBeautyGreen" id="v-pills-listArtist-tab" data-bs-toggle="pill" data-bs-target="#v-pills-listArtist" type="button" role="tab" aria-controls="v-pills-listArtist" aria-selected="false">Ver artistas</button>

                    <span class="fw-bold">Usuario</span> 
                    <button class="nav-link textBeautyGreen" id="v-pills-userList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-userList" type="button" role="tab" aria-controls="v-pills-userList" aria-selected="false">Ver usuarios</button>

                    <span class="fw-bold">Viajes</span> 
                    <button class="nav-link textBeautyGreen" id="v-pills-tripList-tab" data-bs-toggle="pill" data-bs-target="#v-pills-tripList" type="button" role="tab" aria-controls="v-pills-tripList" aria-selected="false">Solicitud de viajes</button>
                </div>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-8">
                <div class="tab-content" id="v-pills-tabContent">
                    <!--register company-->    
                    <div class="tab-pane fade show active mx-auto" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3>Registrar empresa</h3>
                        <form method="POST" action="{{PATH_LOCALHOST}}registerCompany">
                            <div class="mb-3">
                                <label for="email" class="form-label">Nombre empresa:</label>
                                <input name="companyName" type="text" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">CIF:</label>
                                <input name="cif" type="text" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Dirección:</label>
                                <input name="address" type="text" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Código postal:</label>
                                <input name="postalCode" type="text" class="form-control" id="password" required>
                            </div>

                            <button type="submit" class="btn btn-dark w-100 my-2">Registrar empresa</button>
                        </form>
                    </div>
                    <!--company list--->
                    <div class="tab-pane fade table-responsive" id="v-pills-companyList" role="tabpanel" aria-labelledby="v-pills-companyList-tab">
                        <h3>Empresas registradas</h3>
                        <table id="table-companyList" class="table w-100 custom-table">
                            <thead>
                                <tr>
                                    <th>Empresa</th>
                                    <th>CIF</th>
                                    <th>Dirección</th>
                                    <th>Cod. postal</th>
                                    <th>F. alta</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>

                    <!--register event-->  
                    <div class="tab-pane fade" id="v-pills-registerEvent" role="tabpanel" aria-labelledby="v-pills-registerEvent-tab">
                        <h3>Registrar evento</h3>
                        <form method="POST" action="{{PATH_LOCALHOST}}registerEvent">
                            <div class="mb-3">
                                <label for="email" class="form-label">Nombre del evento:</label>
                                <input name="eventName" type="text" class="form-control" id="email">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Artista</label>
                                <select name="idArtist" class="form-select" id="inputGroupSelect01">
                                    <option selected disabled>Seleccionar</option>
                                    
                                    <?php
                                    $array = count($artistList);
                                    for ($i = 0; $i < $array; ++$i){?>
                                    <option value="<?php echo $artistList[$i]['id']; ?>"><?php echo $artistList[$i]['artistName']; ?></option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Ubicación:</label>
                                <input name="location" type="text" class="form-control" id="email" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Dirección:</label>
                                <input name="address" type="text" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea" class="form-label">Descripción del evento:</label>
                                <textarea class="form-control" name="eventDescription" id="validationTextarea" placeholder="Required example textarea" required></textarea>
                            </div>

                            <div class="mb-3 input-group">
                                <label class="input-group-text" for="inputGroupSelect01">Pais</label>
                                <select name="countryId" class="form-select" id="inputGroupCountries">
                                    <option selected disabled>Selecciona</option>

                                    <?php
                                    $arrayCountry = count($countryList);
                                    for ($i = 0; $i < $arrayCountry; ++$i){?>
                                    <option value="<?php echo $countryList[$i]['id']; ?>"><?php echo $countryList[$i]['contryName']; ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="mb-3 input-group">
                                <label class="input-group-text" for="inputGroupSelect01">Provincia</label>
                                <select name="provId" class="form-select" id="idProvince">
                                    <option selected>Selecciona</option>
                                    
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Ciudad:</label>
                                <input name="township" type="text" class="form-control" id="password" placeholder="">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Código postal:</label>
                                <input name="postalCode" type="text" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Enlace venta de tickets:</label>
                                <input name="ticketsLink" type="text" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Fecha:</label>
                                <input name="dateEvent" type="date" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Hora apertura de evento:</label>
                                <input name="timeStart" type="time" class="form-control" id="password">
                            </div>
                            <div class="mb-3 input-group">
                                <label class="input-group-text" for="inputGroupSelect01">Empresa promotora</label>
                                <select name="companyId" class="form-select" id="inputGroupSelect01">
                                    <option selected disabled>Selecciona</option>
                                    
                                    <?php
                                    $arrayCompany = count($companyList);
                                    for ($i = 0; $i < $arrayCompany; ++$i){?>
                                    <option value="<?php echo $companyList[$i]['id']; ?>"><?php echo $companyList[$i]['nameCompany']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary w-100 my-2">Registrar evento</button>
                        </form>
                    </div>
                    <!--event list--> 
                    <div class="tab-pane fade table-responsive" id="v-pills-eventLists" role="tabpanel" aria-labelledby="v-pills-eventLists-tab">
                        <h3>Eventos registrados</h3>                
                        <table id="table-events" class="table custom-table">
                            <thead>
                                <tr>
                                    <th>Nombre Evento</th>
                                    <th>Artista</th>
                                    <th>Lugar</th>
                                    <th>Dirección</th>
                                
                                    <th>Provincia</th>
                                    <th>Ciudad</th>
                                    <th>Cód. postal</th>
                                    <th>Venta entrada</th>
                                    <th>Fecha evento</th>
                                    <th>Hora inicio</th>
                                    <th>Empresa</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>

                    <div class="tab-pane fade" id="v-pills-registerArtist" role="tabpanel" aria-labelledby="v-pills-registerArtist-tab">
                    <!--register artist -->
                        <h3>Registrar artista</h3>
                        <form method="POST" action="{{PATH_LOCALHOST}}registerArtist" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="email" class="form-label">Nombre del artista:</label>
                                <input name="artistName" type="text" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea" class="form-label">Descripción del artista:</label>
                                <textarea class="form-control" name="artistDescription" id="validationTextarea" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="profilPicture" class="form-label">Imagen del artista:</label>        
                                <img id="previewImage" class="img-thumbnail" style="max-width: 200px; max-height: 200px;" src="{{PATH_LOCALHOST}}assets/images/user_icon_.png" alt="...">
                        
                            <div id="filebutton"><i class="fas fa-cloud-upload-alt"></i> Seleccionar imagen</div>
                                <input required type="file"  name="profilPicture" id="myInputFile">
                            </div>
                        

                            <button type="submit" class="btn btn-primary w-100 my-2">Registrar</button>
                        </form>

                    </div>
    <!--artist list-->
                    <div class="tab-pane fade table-responsive" id="v-pills-listArtist" role="tabpanel" aria-labelledby="v-pills-listArtist-tab">
                        <h3>Artistas registrados</h3>                
                        <table id="table-electro" class="table w-100 custom-table">
                            <thead>
                                <tr>
                                    <th>Imagen</th>
                                    <th>Artista</th>
                                    <th>F. creación</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                
                    </div>
    <!--user list-->
                    <div class="tab-pane fade table-responsive" id="v-pills-userList" role="tabpanel" aria-labelledby="v-pills-userList-tab">
                    <h3>Usuarios registrados</h3>    
                    <table id="table-user" class="table w-100 custom-table">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>F. alta</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
    <!--trips requests-->                                   
                    <div class="tab-pane fade table-responsive" id="v-pills-tripList" role="tabpanel" aria-labelledby="v-pills-tripList-tab">
                        <h3>Solicitud de viajes</h3>
                        <table id="table-tripList" class="table w-100 custom-table">
                            <thead>
                                <tr>
                                    <th>Nombre Evento</th>
                                    <th>Lugar recogida por usuario</th>
                                    <th>Dirección evento original</th>
                                    <th>Lugar llegada/usuario</th>
                                    <th>Plazas</th>
                                    <th>Precio viaje</th>
                                    <th>Link</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>                        
            
        </div>

    </div>


@stop



@section('script')
    <script>

        document.getElementById("myInputFile").addEventListener("change", function() {
        // obtener el archivo seleccionado
        const selectedFile = this.files[0];

        // crear un objeto URL
        const objectUrl = URL.createObjectURL(selectedFile);

        // establecer la propiedad src de la imagen con la URL del objeto
        document.getElementById("previewImage").src = objectUrl;
            });
            $('#filebutton').on('click', function() {
            $('#myInputFile').click();
            });


//DATATABLE ARTISTAS
$(function(){
			var table = $('#table-electro').DataTable({
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                 },
                ajax:{
                    url:"{{PATH_LOCALHOST}}artist/collect",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "GET",
                    dataSrc:"",   
                },
                columns : [
                        {

                            title: "", 
                            data: 'ruta', render: function(data, type, full, meta) {return "<img src='{{PATH_LOCALHOST}}" +data + "' width='40px' height='40px'></img>"}
                        },
                        {
                            'data' : "artistName"
                        },
                        {
                            'data' : "created_at"
                        },  
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}artist/edit/" +data + "' width='40px' height='40px'>Editar</a>"}
                            
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}artist/delete/" +data + "' width='40px' height='40px'>Eliminar</a>"}
                        },
                    ]
			    });
/*
                $('tbody').on('click', 'button', function () {
                var data = table.row($(this).parents('tr')).data();
                console.log(data["id"]);
                //document.getElementById('refubi').setAttribute('href', "{{PATH_LOCALHOST}}artist/edit/" + data["id"]);
                });

                $('tbody').on('click', 'tr', function (e) {
                 
                if($(e.target).is("button")) {
                }else{
                var data = table.row($(this)).data();
                window.location.href = "{{PATH_LOCALHOST}}artist/edit/" + data["id"];
                 
            }*/
                });



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

//user table ajax
$(function(){
			var table = $('#table-user').DataTable({
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                 },
                ajax:{
                    url:"{{PATH_LOCALHOST}}user/getUsers",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "GET",
                    dataSrc:"",   
                },
                columns : [
                        {
                            'data' : "name"
                        },
                        {
                            'data' : "surname"
                        },
                        {
                            'data' : "created_at"
                        },
                        {
                            'data' : "email"
                        },  
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}user/delete/" +data + "' width='40px' height='40px'>Eliminar</a>"}
                        },
                    ]
			    });

});


//company table ajax
$(function(){
			var table = $('#table-companyList').DataTable({
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                 },
                ajax:{
                    url:"{{PATH_LOCALHOST}}company/getCompany",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "GET",
                    dataSrc:"",   
                },
                columns : [
                        {
                            'data' : "nameCompany"
                        },
                        {
                            'data' : "cif"
                        },
                        {
                            'data' : "address"
                        }, 
                        {
                            'data' : "postalCode"
                        },   
                        {
                            'data' : "created_at"
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}company/edit/" +data + "' width='40px' height='40px'>Editar</a>"}
                            
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}company/delete/" +data + "' width='40px' height='40px'>Eliminar</a>"}
                        },
                    ]
			    });

});


//events table ajax
$(function(){
			var table = $('#table-events').DataTable({
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                 },
                ajax:{
                    url:"{{PATH_LOCALHOST}}event/getEvents",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "GET",
                    dataSrc:"",   
                },
                columns : [
                        {
                            'data' : "eventName"
                        },
                        {
                            'data' : "artistName"
                        },
                        {
                            'data' : "location"
                        },
                        {
                            'data' : "address"
                        },
                        {
                            'data' : "province"
                        },
                        {
                            'data' : "township"
                        },
                        {
                            'data' : "postalCode"
                        },
                        {
                            'data' : "ticketsLink"
                        },
                        {
                            'data' : "fecha"
                        }, 
                        {
                            'data' : "timeStart"
                        },   
                        {
                            'data' : "nameCompany"
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}event/edit/" +data + "' width='40px' height='40px'>Editar</a>"}
                            
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}event/delete/" +data + "' width='40px' height='40px'>Eliminar</a>"}
                        },
                    ]
			    });

});

//ajax trips
$(function(){
			var table = $('#table-tripList').DataTable({
                responsive: true,
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                 },
                ajax:{
                    url:"{{PATH_LOCALHOST}}trips/getTrips",
                    contentType: "application/json; charset=utf-8",
                    dataType: "json",
                    type: "GET",
                    dataSrc:"",   
                },
                columns : [
                        {
                            'data' : "eventName"
                        },
                        {
                            'data' : "pickUpLocation"
                        },
                        {
                            'data' : "eventDestination"
                        }, 
                        {
                            'data' : "destination"
                        },   
                        {
                            'data' : "nPlazas"
                        },
                        {
                            'data' : "price"
                        },
                        {
                            'data' : "link"
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}trips/approve/" +data + "' width='40px' height='40px'>Aprobar</a>"}
                        },
                        {
                            title: "", 
                            data: 'id', render: function(data, type, full, meta) {return "<a href='{{PATH_LOCALHOST}}trips/denegate/" +data + "' width='40px' height='40px'>Denegar</a>"}
                        },
                    ]
			    });

});
    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>




@stop



@stop

