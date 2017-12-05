<div class="am-pagetitle">
    <h5 class="am-title">Personas</h5>
</div>
<!-- am-pagetitle -->

<div class="am-pagebody">
    <div class="row">
        <div class="card card pd-20 pd-sm-40">
            <h1>Persona</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Usuario</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $key => $value) : ?>
                        <tr>
                            <td><?= $value->nombre ?></td>
                            <td><?= $value->telefono ?></td>
                            <td><?= $value->usuario ?></td>
                            <td>
                                <a href="#" onclick="colores('<?= $value->codigo ?>')" >Colores</a>
                                <a href="<?= URL ?>persona/editar/<?= $value->codigo ?>">Editar</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="mdlColores" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Colores</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <ul class="list-group" id="list_colores">
            

        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>