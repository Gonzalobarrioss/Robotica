<?php
    include("database.php");
    
    $query = "SELECT * from componente";
    $result = mysqli_query($connection,$query);

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id' => $row['id_comp'],
            'num_comp' => $row['nro_comp'],
            'descripcion' => $row['descripcion'],
            'ubicacion' => $row['ubicacion'],
            'estado' => $row['estado']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>