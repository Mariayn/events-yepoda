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
                <h3>Modificar empresa</h3>
                <form method="POST" action="{{PATH_LOCALHOST}}editCompany">
                        <div class="mb-3">
                            <label for="email" class="form-label">Nombre empresa:</label>
                            <input value="<?php echo $infoCompany[0]['nameCompany'];?>" name="companyName" type="text" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">CIF:</label>
                            <input value="<?php echo $infoCompany[0]['cif'];?>" name="cif" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Dirección:</label>
                            <input value="<?php echo $infoCompany[0]['address'];?>" name="address" type="text" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Código postal:</label>
                            <input value="<?php echo $infoCompany[0]['postalCode'];?>" name="postalCode" type="text" class="form-control" required>
                        </div>
                        <input value="<?php echo $infoCompany[0]['id'];?>" name="idComp" type="hidden" class="form-control">

                        <button type="submit" class="btn btn-primary w-100 my-2">Modificar</button>
                    </form>

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

    </script>

  <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@stop



@stop

