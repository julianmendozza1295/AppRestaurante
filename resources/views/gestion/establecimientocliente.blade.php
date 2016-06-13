@extends('layouts.admin.principal')

@section('content')
    <div class="form-group">
        <a href="registroestablecimiento/cliente" class="btn btn-success" data-modal="" >Registrar Marca Comercial</a>

    </div>
    <?php

    for ($i = 0; $i < count($datosEstablcimiento); $i++) {
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b>{{$datosEstablcimiento[$i]->establecimiento}} </b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <source
                                        media="(min-width: 650px)"
                                        srcset="http://vignette3.wikia.nocookie.net/outcast/images/f/f8/Imagen-no-disponible.png/revision/latest?cb=20160322191504&path-prefix=es">
                                <source
                                        media="(min-width: 465px)"
                                        srcset="images/kitten-sitting.png"/>
                                <img
                                        src="http://vignette3.wikia.nocookie.net/outcast/images/f/f8/Imagen-no-disponible.png/revision/latest?cb=20160322191504&path-prefix=es"
                                        alt="Imagen no disponible"/>
                            </picture>
                        </div>
                        <div class="col-md-4">
                            <br><b>Pagina Web:&nbsp;</b>{{$datosEstablcimiento[$i]->web}} </br>
                            <br><b>Correo Electronico:&nbsp;</b>{{$datosEstablcimiento[$i]->correo}} </br>
                            <br><b>Facebook:&nbsp;</b>{{$datosEstablcimiento[$i]->facebook}} </br>
                            <br><b>Twitter:&nbsp;</b>{{$datosEstablcimiento[$i]->twitter}} </br>
                            <br><b>Instagram:&nbsp;</b>{{$datosEstablcimiento[$i]->instagram}} </br>
                        </div>
                        <!-- espacio vacio del column -->
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer " align="right">

            <a href="sucursalcliente/{{$datosEstablcimiento[$i]->idestablecimiento}}"data-dismiss="modal" class="btn btn-primary" >Sucursal</a>



            <?php if ($datosEstablcimiento[$i]->estado == 'activo') {?>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
            <?php } ?>

            <?php if ($datosEstablcimiento[$i]->estado == 'inactivo') {?>

            <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
            <?php } ?>



        </div>
    </div>
    <?php
    }
    ?>

@endsection