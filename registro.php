 <!--Completar el Código que se requerirá a continuación-->
 <!--Recuperar las variables con los datos ingresados en el formulario. 
  Validar que el rut ingresado no se encuantre en la base de datos.
  Si ya existe un registro vinculado al rut ingresado:
	 Redirigir a crear_personal y entregar mensaje.
  Si no existe:
	 Insertar datos en tabla correspondiente.
	 Redirigir a crear_personal y mostrar mensaje.
Si las contraseñas no existen redirigir a crear_personal y mostrar mensaje. --> 	
<?php
    include('conexion.php');
    include('sesion.php');
    
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cargo = $_POST['cargo'];
    $contraseña1 = md5($_POST['contrasena1']);
    $contraseña2 = md5($_POST['contrasena2']);
    $consulta = "SELECT * FROM personal WHERE rut = '$rut'";
    $ejecutar = mysqli_query($conexion,$consulta);
    $resultado = mysqli_num_rows($ejecutar);


    if($resultado>0){
        header("Location:crear_personal.php?mensaje=si");

    }else{
        if($contraseña1 == $contraseña2 ){
            $crear_personal = "INSERT INTO personal (rut, nombre, apellido, cargo, contraseña)
            VALUES('$rut','$nombre','$apellido', '$cargo', '$contraseña1' ) ";
            $ejecucion= mysqli_query($conexion,$crear_personal);
            header("Location:crear_personal.php");

        }else{
            header("Location:crear_personal.php?erronea=si");
        }
    }










?>