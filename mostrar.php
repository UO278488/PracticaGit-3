<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar persona</title>
</head>
<body>
<?php 

/* Función que se encarga de mostrar todos los datos sobre todas las personas almacenadas en la base de datos.
*/
function mostrarPersonas(){
    $dsn = "mysql:dbname=agenda;host=127.0.0.1;port=3307";
    $usuario = "alumno";
    $clave = "alumno";

    try{
        $bd = new PDO($dsn,$usuario,$clave);
        $consulta = "SELECT nombre, apellidos FROM personas";
        $resultado = $bd -> query($consulta);
        echo "Numero de registros: " . $resultado->rowCount() . "<br>";

        foreach($resultado as $elemento){
            echo "Nombre: " . $elemento["nombre"];
            echo " - Apellidos: " . $elemento["apellidos"] . "<br>";
        }
        $bd = null;
    }catch(PDOException $e){
        echo "Falló la conexión: " .$e->getMessage();
    }
}
mostrarPersonas();
echo "<br><a href = \"index.php\">Volver atrás</a>";
?>

</body>
</html>