@extends('layouts.main_template.primary')

@section('title','Mi perfil')

@section('style')
<style>
</style>
@stop

@section('body')
    @include('layouts.main_template.simpleHeader')

    <div class="container">
        <div class="row justify-content-md-center mt-4">
            <div class="col-4">
                <nav class="nav flex-column">
                    <a class="nav-link active" aria-current="page" href="#">Mi perfil</a>
                    <a class="nav-link" href="{{PATH_LOCALHOST}}/postTrip">Publicar viaje</a>
                    <a class="nav-link" href="#">Ver viaje</a>
                </nav>
            </div>

            <div class="col-5">
                <div class="container">
                    <h3>Mi perfil</h3>
                    <p class="InfoField__label">Usuario</p>
                    <p class="InfoField__value">Maria del Carmen Yn</p>
                    <p class="InfoField__label">Email</p>
                    <p class="InfoField__value">maria.yn.21@hotmail.com</p>

                    <div class="mt-4">
                        <h4>Contraseña</h4>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Contraseña antigua</label>
                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Contraseña nueva</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput2" class="form-label">Confirmar contraseña nueva</label>
                            <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Guardar cambios</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-3">
                anuncios
            </div>

        </div>

    </div>

    


@stop




@stop

