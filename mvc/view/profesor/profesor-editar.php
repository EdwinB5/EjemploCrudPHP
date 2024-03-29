<h1 class="page-header">
    <?php echo $alm->idProfesor != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Profesor">Profesores</a></li>
  <li class="active"><?php echo $alm->idProfesor != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-profesor" action="?c=Profesor&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="idProfesor" value="<?php echo $alm->idProfesor; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <div class="form-group">
        <label>Apellido</label>
        <input type="text" name="Apellido" value="<?php echo $alm->Apellido; ?>" class="form-control" placeholder="Ingrese su apellido" data-validacion-tipo="requerido|min:10" />
    </div>
    
    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $alm->Correo; ?>" class="form-control" placeholder="Ingrese su correo electrónico" data-validacion-tipo="requerido|email" />
    </div>
    
    <div class="form-group">
        <label>Sexo</label>
        <select name="Sexo" class="form-control">
            <option <?php echo $alm->Sexo == 1 ? 'selected' : ''; ?> value="1">Masculino</option>
            <option <?php echo $alm->Sexo == 2 ? 'selected' : ''; ?> value="2">Femenino</option>
        </select>
    </div>
    
    <div class="form-group">
        <label>Fecha de nacimiento</label>
        <input readonly type="text" name="FechaNacimiento" value="<?php echo $alm->FechaNacimiento; ?>" class="form-control datepicker" placeholder="Ingrese su fecha de nacimiento" data-validacion-tipo="requerido" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-profesor").submit(function(){
            return $(this).validate();
        });
    })
</script>