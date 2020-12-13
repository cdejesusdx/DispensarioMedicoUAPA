<?php include_once '../../models/connectionDB.php';?>
<?php 
   
   if(isset($_GET['deleteId']))
   {
       $id = $_GET['deleteId'];

       if($CrudMarca->delete($id))
            header("Location: index.php"); 

        else
            echo "Error cargando los datos...";
   }

?>