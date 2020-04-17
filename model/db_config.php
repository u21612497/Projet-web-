<?php
Class DbConfig{
	public static function dbConnect()
	{
		return new PDO('mysql:host=localhost;dbname=2019_projet1_choix;charset=utf8', 'root', '');
	}
}