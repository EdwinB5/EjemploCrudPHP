<h1 class="page-header">
    <?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=Curso">Cursos</a></li>
  <li class="active"><?php echo $alm->id != null ? $alm->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-curso" action="?c=Curso&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $alm->id; ?>" />
    
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $alm->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre del curso" data-validacion-tipo="requerido|min:3" />
    </div>
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-curso").submit(function(){
            return $(this).validate();
        });
    })
</script>