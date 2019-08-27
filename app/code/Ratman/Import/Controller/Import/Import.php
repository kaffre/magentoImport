<?php
namespace Ratman\Import\Controller\Import;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Message\ManagerInterface;
use Ratman\Import\Services\DatabaseServices;
use Ratman\Import\Services\CategoryServices;
use Ratman\Import\Services\ProductServices;

Class Import extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_managerInterface;
	protected $_databaseServices;
	protected $_categoryServices;
	protected $_productServices;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		ManagerInterface $managerInterface,
		DatabaseServices $databaseServices,
		CategoryServices $categoryServices,
		ProductServices $productServices
	){
		$this->_pageFactory = $pageFactory;
		$this->_managerInterface = $managerInterface;
		$this->_databaseServices = $databaseServices;
		$this->_categoryServices = $categoryServices;
		$this->_productServices = $productServices;
		parent::__construct($context);
	}

	public function execute()
	{
		$this->_databaseServices->clearTableBeforeInit();
		$this->_databaseServices->insertMultiple();
		die('a');
	}
}