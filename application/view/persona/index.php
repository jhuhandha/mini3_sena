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
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($registros as $key => $value): ?>
                        <tr>
                            <td><?= $value->documento ?></td>
                            <td><?= $value->nombre ?></td>
                            <td><?= $value->apellido ?></td>
                            <td><?= $value->telefono ?></td>
                            <td><?= $value->direccion ?></td>
                            <td><?= $value->correo ?></td>
                            <td><?= $value->estado==true?"Activo":"Inactivo" ?></td>
                            <td>
                                <a href="<?= URL ?>persona/editar/<?= $value->id ?>">Editar</a> - 
                                <?php if($value->estado): ?>
                                    <a href="<?= URL ?>persona/estado/0/<?= $value->id ?>">Inactivar</a>
                                <?php else: ?>
                                    <a href="<?= URL ?>persona/estado/1/<?= $value->id ?>">Activar</a>
                                <?php endif ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</div>