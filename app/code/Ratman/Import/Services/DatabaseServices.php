<?php
namespace Ratman\Import\Services;

use Magento\Framework\App\ResourceConnection;
use Ratman\Import\Helper\DataHelper;

Class DatabaseServices 
{
	protected $_resourceConnection;
	protected $_connection;
	protected $_dataHelper;
	protected $table = 'ratman_import_products';

	public function __construct(
		ResourceConnection $resourceConnection,
		DataHelper $dataHelper
	){
		$this->_resourceConnection = $resourceConnection;
		$this->_connection = $resourceConnection->getConnection();
		$this->_dataHelper = $dataHelper;
	}

	public function insertMultiple()
	{
		$data = $this->_dataHelper->prepareData('http://ontariobeerapi.ca/products/');
		$tableName = $this->getTableName();
        return $this->_connection->insertMultiple($tableName, $data);
	}

	public function clearTableBeforeInit()
	{
		$sql = "DELETE FROM ". $this->getTableName();
		$this->_connection->query($sql);
	}

	public function getDataWithOffset($offset)
	{
		$sql = 'SELECT * FROM '.$this->getTableName().' LIMIT 10 OFFSET '.$offset;
		return $this->_connection->fetchAll($sql);
	}

	protected function getTableName()
	{
		return $this->_resourceConnection->getTableName($this->table);
	}
}