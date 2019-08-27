<?php
namespace Ratman\Import\Helper;

Class JsonHelper
{
	public function convertJsonToObject($url)
	{
		$json = file_get_contents($url);
		$object = json_decode($json);
		return $object;
	}
}