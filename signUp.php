<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documento sin título</title>
</head>
<body>
    <?php
        //Inicializo la sesion
        session_start();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        //Establezco la conexion con la BD
        $link = mysqli_connect("localhost", "root");
        mysqli_select_db($link,"atom");
        //Defino la consulta
        $query = "select id from usuarios where username=?";
        //Preparo la consulta
        $stmt = mysqli_prepare($link, $query);
        //Enlazo los parametros
        mysqli_stmt_bind_param($stmt, 's', $username);
        //Ejecuto la consulta
        mysqli_stmt_execute($stmt);
        //Enlazo las variables resultantes
        mysqli_stmt_bind_result($stmt, $id);
        //Recupero el valor
        mysqli_stmt_fetch($stmt);
        //Cierro la consulta
        mysqli_stmt_close($stmt);
        //Cierro la conexion
        mysqli_close($link);
        //Verifico que el usuario no exista
        if (is_null($id)) {
            //Establezco la conexion con la BD
            $link = mysqli_connect("localhost", "root");
            mysqli_select_db($link,"atom");
            //Defino la consulta
            $query = "select id from usuarios where mail=?";
            //Preparo la consulta
            $stmt = mysqli_prepare($link, $query);
            //Enlazo los parametros
            mysqli_stmt_bind_param($stmt, 's', $email);
            //Ejecuto la consulta
            mysqli_stmt_execute($stmt);
            //Enlazo las variables resultantes
            mysqli_stmt_bind_result($stmt, $id);
            //Recupero el valor
            mysqli_stmt_fetch($stmt);
            //Cierro la consulta
            mysqli_stmt_close($stmt);
            //Cierro la conexion
            mysqli_close($link);
            if (is_null($id)) {
                //Establezco la conexion con la BD
                $link = mysqli_connect("localhost", "root");
                mysqli_select_db($link,"atom");
                $query = "insert into usuarios (username, password, mail) values('".$username."','".$password."','".$email."')";
                if (mysqli_query($link, $query)) {
                    $id = mysqli_insert_id($link);
                    $_SESSION['id']=$id;
                    header("location: home.php");
                } else {
                    echo "Error: " . $query . "<br>" . mysqli_error($link);
                }
                mysqli_close($link);
            }
            else {
                echo('Mail ya en uso');
            }
        }
        else {
            echo('Usuario ya existente');
        }
    ?>
</body>
</html>