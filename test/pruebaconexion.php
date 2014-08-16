<?php 
	require 'modelo.php';
	class ConexionTest extends PHPUnit_Framework_TestCase
	{
		protected static $conexion;

		public static function setUpBeforeClass()
	    {
	        self::$conexion = mysql_connect('localhost', 'root', 'poloji');
	    }

		public function testConexion()
		{
			$this->assertEquals(self::$conexion, abrir_conexion_basededatos());
		}

		public function testCerrarconexion()
		{
			$this->assertEquals(true, cerrar_conexion_basededatos(self::$conexion));
		}
	}
?>