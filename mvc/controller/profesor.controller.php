<?php
require_once 'model/profesor.php';

class ProfesorController{
    
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Profesor();
    }
    
    public function Index(){
        require_once 'view/header.php';
        require_once 'view/profesor/profesor.php';
        require_once 'view/footer.php';
    }
    
    public function Crud(){
        $alm = new Profesor();
        
        if(isset($_REQUEST['idProfesor'])){
            $alm = $this->model->Obtener($_REQUEST['idProfesor']);
        }
        
        require_once 'view/header.php';
        require_once 'view/profesor/profesor-editar.php';
        require_once 'view/footer.php';
    }
    
    public function Guardar(){
        $alm = new Profesor();
        
        $alm->idProfesor = $_REQUEST['idProfesor'];
        $alm->Nombre = $_REQUEST['Nombre'];
        $alm->Apellido = $_REQUEST['Apellido'];
        $alm->Correo = $_REQUEST['Correo'];
        $alm->Sexo = $_REQUEST['Sexo'];
        $alm->FechaNacimiento = $_REQUEST['FechaNacimiento'];

        $alm->idProfesor > 0 
            ? $this->model->Actualizar($alm)
            : $this->model->Registrar($alm);
        
        header('Location: index_1.php');
    }
    
    public function Eliminar(){
        $this->model->Eliminar($_REQUEST['idProfesor']);
        header('Location: index_1.php');
    }
}