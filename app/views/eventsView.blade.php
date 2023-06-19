@extends('layouts.main_template.primary')

@section('title','Eventos')

@section('style')
<style>
    .shadow{
        background-color: rgb(246, 246, 246);
    }

    #container {
  background: rgb(2, 0, 36);
  background: linear-gradient(
    90deg,
    rgba(2, 0, 36, 1) 0%,
    rgba(11, 94, 215, 1) 0%,
    rgba(221, 255, 187, 1) 100%
  );
}


.events-cont{
    padding-top: 40px;
    margin-bottom: 40px; 
}

.event{
    position: relative;
}

</style>
@stop

@section('body')
@include('layouts.main_template.simpleHeader2')
   

    <div class="container events-cont">

        <div class="row d-flex justify-content-center">
            
                <?php
                $array_count = count($sqleventList);
                for ($i = 0; $i < $array_count; ++$i){
                ?>

                <div class="col-12 col-md-4 col-lg-3 mb-3 mx-2">
                    <div class="card event" style="width: 20rem; height: 16rem;">
                        <img src="{{PATH_LOCALHOST}}<?php echo $sqleventList[$i]['route'];?>" class="card-img-top" style="height: 100px" alt="imagen del artista">
                        <div class="card-body">
                            <p class="card-text"><strong><?php echo $sqleventList[$i]['eventName'];?></strong> | <?php echo $sqleventList[$i]['fecha'];?></p>
                            <strong class="card-text"><?php echo $sqleventList[$i]['province'];?> · <?php echo $sqleventList[$i]['contryName'];?></strong>
                            <br>
                            <a href="{{PATH_LOCALHOST}}eventDetails/<?php echo $sqleventList[$i]['id'];?>" class="card-link text-decoration-none">Ver más <i class="fa-solid fa-angles-right"></i></a>
                        </div>
                        
                    </div>
                </div>

                <?php } ?>

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

