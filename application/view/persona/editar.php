
<div class="am-pagetitle">
    <h5 class="am-title">Personas</h5>
</div>
<!-- am-pagetitle -->

<div class="am-pagebody">
    <div class="row">
        <div class="card card pd-20 pd-sm-40">
            <h1>Persona</h1>
            <form action="<?= URL ?>persona/modificar" method="post">
                <input type="hidden" name="id" value="<?= $respuesta->id ?>">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Documento</label>
                            <input name="documento" type="text" class="form-control" value="<?= $respuesta->documento ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="nombre" type="text" class="form-control" value="<?= $respuesta->nombre ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Apellido</label>
                            <input name="apellido" type="text" class="form-control" value="<?= $respuesta->apellido ?>">
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input name="telefono" type="text" class="form-control" value="<?= $respuesta->telefono ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Direccion</label>
                            <input name="direccion" type="text" class="form-control" value="<?= $respuesta->direccion ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Correo</label>
                            <input name="correo" type="text" class="form-control" value="<?= $respuesta->correo ?>">
                        </div>
                    </div>
                    <button class="btn btn-warning float-lg-right">Modificar</button>
                </div>
            </form>
        </div>
    </div>
</div>