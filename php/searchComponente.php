<?php
include('database.php');
$search = $_POST['search'];
if(!empty($search)) {
  $query = "SELECT * FROM movimiento as m  inner join componente as c on c.id_comp = m.componente WHERE m.componente LIKE '$search%'";
  $result = mysqli_query($connection, $query);
  
  if(!$result) {
    die('Query Error' . mysqli_error($connection));
  }
  
  $json = array();
  while($row = mysqli_fetch_array($result)) {
    $json[] = array(
        'id' => $row['id_movimiento'],
        'fecha' => $row['fecha'],
        'componente' => $row['descripcion'],
        'valor' => $row['valor'],
        'estado' => $row['status']
    );
  }
  $jsonstring = json_encode($json);
  echo $jsonstring;
}
?>