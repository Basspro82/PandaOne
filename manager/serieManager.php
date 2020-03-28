<?php

require_once "../../framework/database.php";

class SerieManager{

	public static function GetLast($nb)
	{

		return LoadAll('serie','','imdbID ASC');
		
	}

}