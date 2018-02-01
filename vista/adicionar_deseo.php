<?php
session_start();
if(isset ($_SESSION['validacion']) && $_SESSION['validacion'] == 1) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Deseos</title>
        <link rel="stylesheet" type ="text/css" href="css/add_wish.css">
    </head>
    <body>
    <center>
        <a href ="menu.php" class = "uno">Volver...</a>       
    <div class ="maik">  
        <form name="deseos_agregar">
            <h3 class = "title">Ingresa Tus Datos...</h3>
            <p>Nombre de la compañia</p><input title = "Se necesita el titulo de la compañia" type = "text" id ="titulo" required>
                <div><textarea name ="deseo" rows="10" cols="20"  id="area" title ="Ingresa los datos " required ></textarea></div>
                <p id="mensaje" style="color: white;"></p>
                <input type="reset" value="Limpiar" class ="uno"><button type="button" id= "Agregar" class="uno "> Agregar Deseo</button>
        </form>     
    </div>  
    </center>
  <script type="text/javascript" src="../js/jquery.js"></script>
  <script type="text/javascript" src="../js/operaciones.js"></script>
    </body>
</html>
<?php
}else{
    echo"Debes iniciar sesion antes de acceder a esta página"; 
}
?>
