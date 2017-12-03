<form action="<?= URL ?>persona/guardar" method="post" enctype="multipart/form-data">
<div class="am-pagetitle">
    <h5 class="am-title">Personas</h5>
</div>
<!-- am-pagetitle -->

<div class="am-pagebody">
    <div class="row">
        <div class="card card pd-20">
            <h1>Persona</h1>
            
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input name="nombre" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Telefono</label>
                            <input name="telefono" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Imagen</label>
                            <input name="imagen" type="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Rol</label>
                            <select name="rol" id="" class="form-control">
                                <option value="">Seleccionar</option>
                                <?php foreach($roles as $value): ?>
                                    <option value="<?= $value->codigo ?>"><?= $value->nombre ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Usuario</label>
                            <input name="usuario" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Clave</label>
                            <input name="clave" type="password" class="form-control">
                        </div>
                    </div>
                    
                </div>
            
        </div>
        <div class="card pd-20">
            <h1>Colores</h1>
            <table class="table" id="tblColores">
                <thead>
                    <tr>
                        <th>Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="color[]" class="form-control"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <button type="button" onclick="agregar()" class="btn btn-info">Agregar</button>
                        </td>
                    </tr>
                </tfoot>
            <table>
        </div>
    </div>
</div>
<button class="btn btn-success float-lg-right">Guardar</button>
</form>