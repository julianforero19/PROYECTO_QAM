<?php
class database{

	private static $dbhost ="localhost";
	private static $dbname ="PROYECTO_QAM";
	private static $dbusername ="root";
	private static $dbuserpassword ="";

	public static function conectar(){
		try{

			$pdo = new PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname,self::$dbusername,self::$dbuserpassword);
			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			return $pdo;
		}catch(Exception $e){
			die($e->getMessage());
		}
	}
}
?>