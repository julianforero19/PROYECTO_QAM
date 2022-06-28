<?php  

require_once 'MODEL_PERSONA.PHP';
require_once './conexion/conexion.php';

$db =database::conectar();


if (isset($_REQUEST['action'])) 
{
	switch ($_REQUEST['action'])
	{
		case 'actualizar':

		$update = new PERSONA();
		$update->Update_PERSONA($_POST["PERSONA_ID"],$_POST["TIPDOC_ID"],$_POST["PERSONA_ID2"],$_POST["TIPDOC_ID2"],$_POST["PRI_NOMBRE_PERSONA"],$_POST["SEG_NOMBRE_PERSONA"],$_POST["PRI_APELLIDO_PERSONA"],$_POST["SEG_APELLIDO_PERSONA"],$_POST["DIREC_PERSONA"],$_POST["CEL_PERSONA"],$_POST["CORREO_PERSONA"],$_POST["PASSWORD"]);
		break;
		

		case 'registrar':

		$insert = new PERSONA();
		$insert->Insertar_PERSONA($_POST["PERSONA_ID"],$_POST["TIPDOC_ID"],$_POST["PRI_NOMBRE_PERSONA"],$_POST["SEG_NOMBRE_PERSONA"],$_POST["PRI_APELLIDO_PERSONA"],$_POST["SEG_APELLIDO_PERSONA"],$_POST["DIREC_PERSONA"],$_POST["CEL_PERSONA"],$_POST["CORREO_PERSONA"],$_POST["PASSWORD"]);

		break;

		//caso para metodo eliminar

		case "eliminar":
		$delete=new PERSONA();
		$delete->Delete_PERSONA($_GET["PERSONA_ID"]);

		break;


		//caso para metodo editar
		case 'editar':
		$capt= $_GET["PERSONA_ID"];
	}
	
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <title>REGISTRO</title>
</head>
<body>

        <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="#" method="post">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" name="PRI_NOMBRE_PERSONA" class="form-control form-control-user" id="primer_nombre"
                                            placeholder="Primer Nombre" required><br>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                      <input type="text" name="SEG_NOMBRE_PERSONA" class="form-control form-control-user" id="segundo_nombre"
                                          placeholder="Segundo Nombre"><br>
                                  </div>
                                    <div class="col-sm-6">
                                        <input type="text" name="PRI_APELLIDO_PERSONA" class="form-control form-control-user" id="primer_apellido"
                                            placeholder="Primer Apellido" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="text" name="SEG_APELLIDO_PERSONA" class="form-control form-control-user" id="segundo_apellido"
                                          placeholder="Segundo Apellido" required>
                                  </div>
                                </div>
                                <div class="form-group">
                                    <select name="TIPDOC_ID" id="tdoc" placeholder="seleccione" class="form-control" style="border-radius: 10rem;">
                                      <option value="CC">Cedula de Ciudadania</option>
                                      <option value="TI">Tarjeta de Identidad</option>
                                      <option value="CE">Cedula Extranjera</option>
                                      <option value="NIP">Numero de Identificacion Personal</option>
                                      <option value="NIT">Numero Inico Tributario</option>
                                      <option value="PAP">Pasaporte</option>
                                    </select>
                              </div>
                                <div class="form-group">
                                  <input type="number" name="PERSONA_ID" class="form-control form-control-user" id="n_documento"
                                      placeholder="# Documento" required>
                              </div>
                                <div class="form-group">
                                    <input type="email" name="CORREO_PERSONA" class="form-control form-control-user" id="correo"
                                        placeholder="Correo Electronico" required>
                                </div>
                                <div class="form-group">
                                  <input type="text" name="DIREC_PERSONA" class="form-control form-control-user" id="direccion"
                                      placeholder="Direccion de Residencia">
                              </div>
                              <div class="form-group">
                                <input type="tel" name="CEL_PERSONA" class="form-control form-control-user" id="telefono"
                                    placeholder="# Celular" required>
                            </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" name="PASSWORD" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password"required>
                                    </div>
                                    <!-- <div class="col-sm-6">
                                        <input type="password" name="PASSWORD"class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"required>
                                    </div> -->
                                </div>
                                <p><input type="submit" class="btn btn-primary btn-user btn-block" value="REGISTRAR" onclick= "this.form.action='?action=registrar';"/>
                                    
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login2.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>
</html>