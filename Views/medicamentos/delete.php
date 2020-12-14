<?php include_once '../../controllers/medicamentosController.php';?>
<?php 
   
   if(isset($_GET['deleteId']))
   {
       $id = $_GET['deleteId'];

       if($CrudMedicamentos->delete($id))
            header("Location: index.php"); 

        else
            echo "Error cargando los datos...";
   }

?>