<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <?php
    /* Función que se encarga de crear la base de datos con la que vamos a trabajar, en este caso "agenda".
    Si ya está creada, dará un error diciendo que la base de datos no se ha podido crear, mientras que si falla la conexión 
    lanzará una excepción.
    */
    function crearBase(){
        $dsn = "mysql:host=127.0.0.1;port=3307";
        $usuario = "alumno";
        $clave = "alumno";
        
        try{
            $bd = new PDO($dsn,$usuario,$clave);
            $consulta = "CREATE DATABASE agenda CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";

            if($bd -> query($consulta)){
                echo "<p>Base de datos creada</p>";
            }else{
                echo "<p>Error, la base de datos no se ha creado </p>";
            }
            $bd = null;

        }catch(PDOException $e){
            echo "Falló la conexión: " .$e->getMessage();
        }
}
    /* Función que se encarga de crear una tabla en la base de datos creada anteriormente, en este caso "personas".
    */
    function crearTabla(){
        $dsn = "mysql:dbname=agenda;host=127.0.0.1;port=3307";
        $usuario = "alumno";
        $clave = "alumno";

        try{
            $bd = new PDO($dsn,$usuario,$clave);
            $consulta = "CREATE TABLE personas(
                id integer UNSIGNED not null AUTO_INCREMENT,
                nombre varchar(20),
                apellidos varchar(50),
                PRIMARY KEY (id))";
                
                if($bd -> query($consulta)){
                    echo "<p>Tabla creada correctamente</p>";
                }else{
                    echo "<p>Error, no se creó la tabla</p>";
                }
        }catch(PDOException $e){
            echo "Falló la conexión: " .$e->getMessage();
        }
    }


    
    crearTabla(); // Llamamos a las funciones para que se ejecuten.
    crearBase();
     ?>
</body>
</html>