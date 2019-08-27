<?php
namespace Ratman\Import\Services;

use Ratman\Import\Services\DatabaseServices;
use Ratman\Import\Services\ProductServices;
use Ratman\Import\Helper\FileHelper;

Class ImportServices
{
	protected $_databaseServices;
	protected $_productServices;
	protected $_fileHelper;

	public function __construct(
		DatabaseServices $databaseServices,
		ProductServices $productServices,
		FileHelper $fileHelper
	){
		$this->_databaseServices = $databaseServices;
		$this->_productServices = $productServices;
		$this->_fileHelper = $fileHelper;
	}

	public function importProduct()
	{
		$offset = $this->_fileHelper->getOffset();
		$products = $this->_databaseServices->getDataWithOffset($offset);
	
		foreach ($products as $product) {
			$this->_productServices->create($product);
			$offset++;
		}
		$this->_fileHelper->setOffset($offset);
	}
}