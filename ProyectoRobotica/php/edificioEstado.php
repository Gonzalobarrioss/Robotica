<?php
    include("database.php");
    $id = $_POST['id'];
    //$estado = $_POST['estado'];
    $query = "SELECT * FROM componente WHERE id_comp = '$id'";
    $resul = mysqli_query($connection,$query);
    while($row = mysqli_fetch_array($resul)){
        $estado = $row['estado'];
    }
    if ($estado == "1"){
        $estado = 0;
    }
    else if($estado == "0"){
        $estado = 1;
    }
    echo $estado;
    
    $query = "SELECT * FROM edificio";
    $result = mysqli_query($connection,$query);
    if(!$result){
        die(mysqli_error($connection));
    }
    if($result->num_rows == 0){
        $query = "INSERT INTO edificio(led,estado) VALUES('$id','$estado')";
    }
    else{
        $query = "UPDATE edificio SET led = '$id', estado='$estado'";
    }
    $resul = mysqli_query($connection,$query);
    if(!$resul){
        die(mysqli_error($connection));
    }
    echo "Proceso Satisfactorio."

?>