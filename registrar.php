<?php
include 'cn.php';
//Recibir los datos y almacenarlos en las variables
$nombre = $_POST["nombre"];
$apellidos = $_POST["apellidos"];
$correo = $_POST["correo"];
$usuario = $_POST["usuario"];
$clave = sha1($_POST["clave"]);
$telefono = $_POST["telefono"];
$sexo = $_POST["sexo"];
$terminos = $_POST["terminos"];
//Consulta para insertar
$insertar = "INSERT INTO usuarios(nombre, apellidos, correo, usuario, clave, telefono, sexo, terminos) VALUES ('$nombre', '$apellidos', '$correo', '$usuario', '$clave', '$telefono', '$sexo','$terminos')";

$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>
    alert("El usuario ya esta registrado");
    window.history.go(-1);
    </script>';
    exit;
}

$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>
         alert("El correo ya esta registrado");
         window.history.go(-1);
         </script>';
    exit;
}


//Ejecutar consultas
$resultado = mysqli_query($conexion, $insertar);
if (!$resultado) {
    echo '<script>
    alert("Error al registrarse");
    window.history.go(-1);
    </script>';;
} else {
    echo '<script>
    alert("Registrado exitosamente");
    window.history.go(-1);
    </script>';
}
//Cerrar conexion
mysqli_close($conexion);
