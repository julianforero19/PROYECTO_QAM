<?php 

class login
{
		public function Login_user($user, $pass)
		{

			session_start();

			require_once './conexion/conexion.php';

			//Logica

			$db = database::conectar();

			 $cont=0; 

			$sql2="SELECT * FROM PERSONA WHERE CORREO_PERSONA='$user' AND PASSWORD='$pass'";
			$result2 = $db->query($sql2);
			while ($row2=$result2->fetch(PDO::FETCH_ASSOC))
			{
				$id_persona=stripslashes($row2["PERSONA_ID"]);
			$cont=$cont+1;
			}
			if($cont==0)
			{
				print"<script>alert(\"Usuario y/o Password Incorrectas.\");window.location='index.php';</script>";
			}

			if($cont!=0)
			{
				$_SESSION['PERSONA_ID']=$id_persona;

				$sql1="SELECT ROL FROM PERSONA_ROL WHERE ID_PERSONA='$id_persona'";
				$result1 = $db->query($sql1);


			while ($row1=$result1->fetch(PDO::FETCH_ASSOC))
			{
				$role=stripslashes($row1["ROL"]);	
			}

				if(@$role == null)
				{
					print"<script>alert(\"El usuario no tiene asignado Rol\");window.location='index.php';</script>";
				}

				if (@$role == 'ADMINISTRADOR')
				{
					$_SESSION['active']=1;
					header ('Location: index.php');
				}

				elseif (@$role == 'CLIENTE')
				{
					$_SESSION['active']=1;
					header('Location: index.php');
				}
				elseif (@$role == 'EMPLEADO')
				{
					$_SESSION['active']=1;
					header('Location: index.php');
				}

				elseif(@$role == 'TEMPORAL')
				{
					print"<script>alert(\"Usuario Temporal, Comuniquese al Administrador\");window.location='index.php';</script>";
				}

			}//finalizacion conteo

		}//finalizacion del metodo

	}//Cerrando Clase

	$Nuevo=new login();
	$Nuevo->Login_user($_POST["user"],$_POST["pass"]);
?>