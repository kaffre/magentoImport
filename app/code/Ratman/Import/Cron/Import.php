<?php
namespace Ratman\Import\Cron;

use Ratman\Import\Services\ImportServices;

class Import
{
	protected $_importServices;

	public function __construct(
		ImportServices $importServices
	){
		$this->_importServices = $importServices;
	}

	public function execute()
	{
		$this->_importServices->importProduct();
	}
}

