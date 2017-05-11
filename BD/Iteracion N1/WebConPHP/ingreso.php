<?php
session_start();
echo $_POST["login"];

echo $_POST["password"];
$usuario = array("jhonatan" => "admin123");
if( isset($usuario[$_POST["login"]]) )
{
if($usuario[$_POST["login"]] == $_POST["password"])
	{
	echo "usuario  identificado!!";	
	
	header('Location: menu.php');
	}
		
}
else
{
	echo "usuario no identificado!!";
}


?>
