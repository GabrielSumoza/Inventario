<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=vagu_sis","root","");
		return $link;

	}

}