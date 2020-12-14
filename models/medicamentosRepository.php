<?php
    class medicamentosRepository {
        
        private $db;
 
        public function __construct($PDOConnection)
        {
            $this->db = $PDOConnection;
        }

        public function create($tipoFarmaco, $ubicacion, $marca, $descripcion, $dosis)
        {
            try
            {
                 $statement = $this->db->prepare("CALL InsMedicamento (?,?,?,?,?);");
                 $statement->bindParam(1, $tipoFarmaco);
                 $statement->bindParam(2, $ubicacion);
                 $statement->bindParam(3, $marca);
                 $statement->bindParam(4, $descripcion);
                 $statement->bindParam(5, $dosis);
                 
                 $result = $statement->execute();
                
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function update($id, $tipoFarmaco, $ubicacion, $marca, $descripcion, $dosis, $estado)
        {
            try
            {
                 $statement = $this->db->prepare("CALL ActMedicamento (?,?,?,?,?,?,?);");
                 $statement->bindParam(1, $id);
                 $statement->bindParam(2, $tipoFarmaco);
                 $statement->bindParam(3, $ubicacion);
                 $statement->bindParam(4, $marca);
                 $statement->bindParam(5, $descripcion);
                 $statement->bindParam(6, $dosis);
                 $statement->bindParam(7, $estado);
                
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
                 $statement = $this->db->prepare("CALL DelMedicamento (?);");
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

        public function selectById($id)
        {
            $statement = $this->db->prepare("SELECT * FROM Medicamentos WHERE IdMedicamento = ?");
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
                        <tr class="<?php print($row['Estado']) == 'Activo' ? '' : 'danger';?>">
                            
                            <td><?php print($row['IdMedicamento']); ?></td>
                            <td><?php print($row['TipoFarmaco']); ?></td>
                            <td><?php print($row['Ubicacion']); ?></td>
                            <td><?php print($row['Marca']); ?></td>
                            <td><?php print($row['Descripcion']); ?></td>
                            <td><?php print($row['Dosis']); ?></td>
                            <td style="text-align: center;"><?php print($row['Estado']); ?></td>
                           
                            <td style="text-align: center;">
                                <a href="update.php?updateId=<?php print($row['IdMedicamento']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                            </td>
                            
                            <td style="text-align: center;">
                                <a href="delete.php?deleteId=<?php print($row['IdMedicamento']); ?>" onClick="return confirm('¿Está seguro que desea eliminar este registro?');" >
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