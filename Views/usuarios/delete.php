<?php include_once '../../controllers/usuariosController.php';?>
<?php 
   
   if(isset($_GET['deleteId']))
   {
       $id = $_GET['deleteId'];

       if($CrudUsuarios->delete($id))
            header("Location: index.php"); 

        else
            echo "Error cargando los datos...";
   }

?>