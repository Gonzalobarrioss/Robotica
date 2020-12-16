<?php
    include("database.php");
    if(isset($_POST['num_componente'])){
        $num_comp = $_POST['num_componente'];
        $descripcion = $_POST['descripcion'];
        $ubicacion = $_POST['ubicacion'];

        $query = "INSERT INTO componente(nro_comp,descripcion,ubicacion,estado) VALUES('$num_comp','$descripcion',
        '$ubicacion','0')";
        $result = mysqli_query($connection,$query);
        if(!$result){
            die(mysqli_error($connection));
        }
        echo "Proceso satisfactorio.";
    }
?>