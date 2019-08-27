<?php
namespace Ratman\Import\Helper;

Class FileHelper
{
	public function getOffset()
	{
		return file_get_contents(__DIR__.'/databaseOffset.txt');
	}

	public function setOffset($offset)
	{
		$file = fopen(__DIR__.'/databaseOffset.txt', 'w');
		fwrite($file, $offset);
		fclose($file);
	}
}