<?php
    class usuariosRepository {
        
        private $db;
 
        public function __construct($PDOConnection){ $this->db = $PDOConnection; } 

        public function create($rol, $usuario, $nombre, $contrasena)
        {
            try
            {
                 $statement = $this->db->prepare("CALL InsUsuario (?,?,?,?);");
                 $statement->bindParam(1, $rol);
                 $statement->bindParam(2, $usuario);
                 $statement->bindParam(3, $nombre);
                 $statement->bindParam(4, $contrasena);
                 
                 $result = $statement->execute();
                
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function update($id, $rol, $usuario, $nombre, $activo, $bloqueado)
        {
            try
            {
                 $statement = $this->db->prepare("CALL ActUsuario (?,?,?,?,?,?);");
                 $statement->bindParam(1, $id);
                 $statement->bindParam(2, $rol);
                 $statement->bindParam(3, $usuario);
                 $statement->bindParam(4, $nombre);
                 $statement->bindParam(5, $activo);
                 $statement->bindParam(6, $bloqueado);
                
                 $result = $statement->execute();

                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage(); 
                return false;
            }
        }

        public function changePassword($id, $contrasena)
        {
            try
            {
                 $statement = $this->db->prepare("CALL ActUsuarioCambiarContrasena (?,?);");
                 $statement->bindParam(1, $id);
                 $statement->bindParam(2, $contrasena);

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
                 $statement = $this->db->prepare("CALL DelUsuario (?);");
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
            $statement = $this->db->prepare("CALL ConsUsuarioPorId (?);");
            $statement->bindParam(1, $id);
            $statement->execute();
            
            $updateRow = $statement->fetch(PDO::FETCH_OBJ);          
            return $updateRow;
        }

        public function selectUsuario($usuario, $contrasena)
        {
            $statement = $this->db->prepare("CALL ConsUsuarioPorUsuarioContrasena (?, ?);");
            $statement->bindParam(1, $usuario);
            $statement->bindParam(2, $contrasena);
            $statement->execute();
            
            $selectRow = $statement->fetch(PDO::FETCH_NUM);          
            return $selectRow;
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
                        <tr class="<?php print($row['Activo']) == 'No' ? 'danger' : '';?> <?php print($row['Bloqueado']) == 'Si' ? 'danger' : '';?>">
                            
                            <td><?php print($row['IdUsuario']); ?></td>
                            <td><?php print($row['Rol']); ?></td>
                            <td><?php print($row['Usuario']); ?></td>
                            <td><?php print($row['Nombre']); ?></td>
                            <td style="text-align: center;"><?php print($row['Activo']); ?></td>
                            <td style="text-align: center;"><?php print($row['Bloqueado']); ?></td>
                            
                            <td style="text-align: center;">
                                <a href="update.php?updateId=<?php print($row['IdUsuario']); ?>"><i class="glyphicon glyphicon-edit" title="Modificar usuario"></i></a>
                            </td>

                            <td style="text-align: center;">
                                <a href="changePassword.php?changeId=<?php print($row['IdUsuario']); ?>"><i class="glyphicon glyphicon-lock" title="Cambiar contraseña"></i></a>
                            </td>

                            <td style="text-align: center;">
                                <a href="delete.php?deleteId=<?php print($row['IdUsuario']); ?>"  title="Eliminar usuario"
                                   onClick="return confirm('¿Está seguro que desea eliminar este registro?');" >
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
                        <td>No hay registro...</td>
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