<?php
    include("database.php");
    
    $query = "SELECT * from movimiento as m inner join componente as c on m.componente = c.id_comp";
    $result = mysqli_query($connection,$query);

    $json = array();
    while($row = mysqli_fetch_array($result)){
        $json[] = array(
            'id_mov' => $row['id_movimiento'],
            'fecha' => $row['fecha'],
            'componente' => $row['descripcion'],
            'valor' => $row['valor'],
            'estado' => $row['status']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
?>