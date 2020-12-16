<?php
    include("database.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $fecha = $_POST['fecha'];
        $fecha = date("Y/m/d H:i:s", strtotime($fecha));

        $estado;
        $query = "SELECT * FROM componente where id_comp='$id'";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die(mysqli_error($connection));
        }
        while($row = mysqli_fetch_array($result)){
            $estado = $row['estado'];
        }

        if($estado){
            $estado = 0;
            $valor = "Off";
        }
        else{
            $estado = 1;
            $valor = "On";
        }

        $query = "UPDATE componente SET estado = $estado WHERE id_comp = '$id'";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die(mysqli_error($connection));
        }
        
        $query = "INSERT INTO movimiento(componente,fecha,valor,status) 
            VALUES('$id','$fecha','$valor','$estado')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die(mysqli_error($connection));
        }
        echo "Proceso satisfatorio.";

    }
?>