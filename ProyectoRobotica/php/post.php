
<?php
include "config.php";
include "utilidades.php";
$dbConn =  connect($db);
/*
  listar todos los posts o solo uno
 */


$page = $_SERVER['PHP_SELF'];
$sec = "2";
header("Refresh: $sec; url=$page");
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['led']))
    {
      //AcA CONSULTAMOS LA TABLE MOVIMIENTOS_TEMPORAL - HACEMOS UN SELECT Y UNA VEZ PROCESADA EN ARDUINO LO DELETEAMOS
      $sql = $dbConn->prepare("SELECT * FROM edificio where led=:led");
      $sql->bindValue(':led', $_GET['led']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      //header("Location: HTTP://192.168.0.22:8080/roboticaejemplo/php/post.php");
      echo json_encode(  $sql->fetch(PDO::FETCH_ASSOC)  );
      exit();
    }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM edificio");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      //header("Location: HTTP://192.168.0.22:8080/roboticaejemplo/php/post.php");
      echo json_encode( $sql->fetchAll()  );
      exit();
    }


}
// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    $sql = "INSERT INTO posts
          (title, status, content, user_id)
          VALUES
          (:title, :status, :content, :user_id)";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id'] = $postId;
      header("HTTP/1.1 200 OK");
      //header("Location: HTTP://192.168.0.22:8080/roboticaejemplo/php/post.php");
      echo json_encode($input);
      exit();
   }
}
//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
  $id = $_GET['id'];
  $statement = $dbConn->prepare("DELETE FROM edifico where id=:id");
  $statement->bindValue(':id', $id);
  $statement->execute();
  header("HTTP/1.1 200 OK");
  //header("Location: HTTP://192.168.0.22:8080/roboticaejemplo/php/post.php");
  exit();
}
//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id'];
    $fields = getParams($input);
    $sql = "
          UPDATE posts
          SET $fields
          WHERE id='$postId'
           ";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
   header("HTTP/1.1 200 OK");
   exit();
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>
