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
                <h3>Editar artista</h3>
                <form method="POST" action="{{PATH_LOCALHOST}}updateArtist" enctype="multipart/form-data">
            
                            <div class="mb-3">
                                <label for="email" class="form-label">Nombre artista:</label>
                                <input value="<?php echo $infoArtist[0]['artistName'];?>" name="artistName" type="text" class="form-control" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="validationTextarea" class="form-label">Descripción del artista:</label>
                                <textarea placeholder="<?php echo $infoArtist[0]['artistDescription'];?>" class="form-control" name="artistDescription" id="validationTextarea" required></textarea>
                            </div>
            
                            <div class="mb-3">
                                <label for="profilPicture" class="form-label">Imagen del artista:</label>
                                <img id="previewImage" class="img-thumbnail" style="max-width: 200px; max-height: 200px;" src="{{PATH_LOCALHOST}}<?php echo $infoArtist[0]['ruta'];?>" alt="...">
                        
                                <div id="filebutton"><i class="fas fa-cloud-upload-alt"></i> Seleccionar imagen</div>
                                <input required type="file"  name="profilPicture" id="myInputFile">
                            </div>
                            <input value="<?php echo $infoArtist[0]['id'];?>" name="artistId" type="hidden">
                        
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

