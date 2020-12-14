<?php
    class marcaRepository {
        
        private $db;
 
        public function __construct($PDOConnection)
        {
            $this->db = $PDOConnection;
        }

        public function create($descripcion, $estado)
        {
            try
            {
                 $statement = $this->db->prepare("CALL InsMarca (?,?);");
                 $statement->bindParam(1, $descripcion);
                 $statement->bindParam(2, $estado);
                 
                 $result = $statement->execute();
                
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function update($id, $descripcion, $estado)
        {
            try
            {
                 $statement = $this->db->prepare("CALL ActMarca (?,?,?);");
                 $statement->bindParam(1, $id);
                 $statement->bindParam(2, $descripcion);
                 $statement->bindParam(3, $estado);
                
                 $result = $statement->execute();

                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function delete($id)
        {
            try
            {
                 $statement = $this->db->prepare("CALL DelMarca (?);");
                 $statement->bindParam(1, $id);
                
                 $result = $statement->execute();
                 return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function getAll()
        {
            $statement = $this->db->prepare("CALL ConsMarcas();");
            $statement->execute();
            $listRows = $statement->fetchAll(PDO::FETCH_OBJ);         
            
            return $listRows;
        }

        public function getById($id)
        {
            $statement = $this->db->prepare("SELECT * FROM Marcas WHERE IdMarca = ?");
            $statement->execute([$id]);
            $updateRow = $statement->fetch(PDO::FETCH_OBJ);          
            return $updateRow;
        }
      
        public function dataView($query)
        {
            $statement = $this->db->prepare($query);
            $statement->execute();
            
            if($statement->rowCount() > 0)
            {
                while($row = $statement->fetch(PDO::FETCH_ASSOC))
                {
                    ?>
                        <tr class="<?php print($row['Estado']) == 'Activa' ? '' : 'danger';?>">
                            
                            <td><?php print($row['IdMarca']); ?></td>
                            <td><?php print($row['Descripcion']); ?></td>
                            <td style="text-align: center;"><?php print($row['Estado']); ?></td>
                            <td style="text-align: center;">
                                <a href="update.php?updateId=<?php print($row['IdMarca']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                            <td style="text-align: center;">
                                <a href="delete.php?deleteId=<?php print($row['IdMarca']); ?>" onClick="return confirm('¿Está seguro que desea eliminar este registro?');" >
                                    <i class="glyphicon glyphicon-remove-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                }
            }
            else
            {
                ?>
                    <tr>
                        <td colspan="10">No hay registro...</td>
                    </tr>
                <?php
            }
        }

        public function paging($query, $recordsPerPage)
        {
            $startingPosition = 0;
            
            if(isset($_GET["pageNumber"]))
            {
                $startingPosition = ($_GET["pageNumber"] -1) * $recordsPerPage;
            }
            
            $newQuery = $query." limit $startingPosition,$recordsPerPage";
           
            return $newQuery;
        }

        public function pagingLink($query, $recordsPerPage)
        {
        
            $self = $_SERVER['PHP_SELF'];
            
            $statement = $this->db->prepare($query);
            $statement->execute();
            
            $totalNumberOfRecords = $statement->rowCount();
            
            if($totalNumberOfRecords > 0)
            {
                ?>
                    <ul class="pagination">
                <?php
                $totalNumberOfRecords = ceil($totalNumberOfRecords / $recordsPerPage);
            
                $currentPage = 1;

                if(isset($_GET["pageNumber"]))
                {
                    $currentPage = $_GET["pageNumber"];
                }

                if($currentPage != 1)
                {
                    $previous = $currentPage-1;
                    echo "<li><a href='".$self."?pageNumber=1'>Primera</a></li>";
                    echo "<li><a href='".$self."?pageNumber=".$previous."'>Previa</a></li>";
                }
                
                for($i = 1; $i <= $totalNumberOfRecords; $i++)
                {
                    if($i == $currentPage)
                    {
                        echo "<li><a href='".$self."?pageNumber=".$i."' style='color:red;'>".$i."</a></li>";
                    }
                    else
                    {
                        echo "<li><a href='".$self."?pageNumber=".$i."'>".$i."</a></li>";
                    }
                }
                if($currentPage != $totalNumberOfRecords)
                {
                    $next = $currentPage +1;
                    echo "<li><a href='".$self."?pageNumber=".$next."'>Siguiente</a></li>";
                    echo "<li><a href='".$self."?pageNumber=".$totalNumberOfRecords."'>Ultima</a></li>";
                }
                ?>
                    </ul>
                <?php
            }
        }
    }

?>