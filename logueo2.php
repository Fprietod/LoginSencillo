<?php
$mysqli=new mysqli('localhost','root','','consultorio');
if ($mysqli->connect_errno) {
  echo "Error al conectarse con My SQL debido al error".$mysqli->connect_error;
  sleep(10);
}
$usuarios = $mysqli->query("SELECT user, Tipo_usuario
	FROM usuario
	WHERE user='".$_POST['user']."'
	AND pass = '".$_POST['pass']."'");
	if($usuarios ->num_rows ==1):
     $datos= $usuarios ->fetch_assoc();
     echo json_encode(array('error'=> false,'tipo'=>$datos['Tipo_usuario']));
  else:
  	echo json_encode(array('error'=>true));
  endif;
$mysqli->close();

?>