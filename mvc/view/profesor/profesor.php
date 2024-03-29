<h1 class="page-header">Profesores</h1>

<div class="well well-sm text-right">
    <a class="btn btn-danger" href="?c=Profesor&a=Crud">Nuevo profesor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th style="width:120px;">Sexo</th>
            <th style="width:120px;">Nacimiento</th>
            <th style="width:60px;"></th>
            <th style="width:60px;"></th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Apellido; ?></td>
            <td><?php echo $r->Correo; ?></td>
            <td><?php echo $r->Sexo == 1 ? 'Hombre' : 'Mujer'; ?></td>
            <td><?php echo $r->FechaNacimiento; ?></td>
            <td>
                <a href="?c=Profesor&a=Crud&idProfesor=<?php echo $r->idProfesor; ?>">Editar</a>
            </td>
            <td>
                <a onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=Profesor&a=Eliminar&idProfesor=<?php echo $r->idProfesor; ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table> 