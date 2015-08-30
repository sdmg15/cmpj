<?php 

class PDOFactory 
{
	public static function  getPdoInstance(){
		$base = new PDO('mysql:host=localhost;dbname=cmpj;charset=utf8','root','');
		$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $base;
	}
}
