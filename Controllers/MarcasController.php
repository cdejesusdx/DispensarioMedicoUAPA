<?php
    include 'Models/DBConexion.php';

    class MarcasController{

        
        public function Create($descripcion, $estado)
        {
            try
            {
                 // Sentencia SQL
                 $statement = $PDOConnection->prepare("INSERT INTO Marcas(Descripcion, Estado) VALUES (?,?);");
                 $statement->bindParam(1, $descripcion);
                 $statement->bindParam(2, $estado);
                
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function Update($id, $descripcion, $estado)
        {
            try
            {
                 // Sentencia SQL
                 $statement = $PDOConnection->prepare("UPDATE Marcas SET Descripcion = ?, Estado = ? WHERE IdMarca = ?");
                 $statement->bindParam(1, $descripcion);
                 $statement->bindParam(2, $estado);
                 $statement->bindParam(3, $id);
                
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function Delete($id)
        {
            try
            {
                 // Sentencia SQL
                 $statement = $PDOConnection->prepare("DELETE FROM Marcas WHERE IdMarca = ?");
                 $statement->bindParam(1, $id);
                
                return true;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function GetById($id)
        {
            $statement = $PDOConnection->prepare("SELECT * FROM Marcas WHERE IdMarca=:id");
            $statement->execute(array(":id"=>$id));
            $editRow = $statement->fetch(PDO::FETCH_ASSOC);
            return $editRow;
        }

        public function DataView($query)
        {
            $statement = $PDOConnection->prepare($query);
            $statement->execute();
            
            if($statement->rowCount()>0)
            {
                while($row=$statement->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                        <tr>
                            <td><?php print($row['Descripcion']); ?></td>
                            <td><?php print($row['Estado']); ?></td>
                            <td align="center">
                                <a href="Update.php?id=<?php print($row['IdMarca']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                            <td align="center">
                             <a href="Delete.php?id=<?php print($row['IdMarca']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                            </td>
                        </tr>
                    <?php
                }
            }
            else
            {
                ?>
                    <tr>
                    <td>No hay registro...</td>
                    </tr>
                <?php
            }
        }
    }
?>