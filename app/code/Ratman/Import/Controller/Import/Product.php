<?php
namespace Ratman\Import\Controller\Import;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Message\ManagerInterface;
use Ratman\Import\Services\ImportServices;

Class Product extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	protected $_managerInterface;
	protected $_categoryServices;
	protected $_importServices;

	public function __construct(
		Context $context,
		PageFactory $pageFactory,
		ManagerInterface $managerInterface,
		ImportServices $importServices
	){
		$this->_pageFactory = $pageFactory;
		$this->_managerInterface = $managerInterface;
		$this->_importServices = $importServices;
		parent::__construct($context);
	}

	public function execute()
	{
		$this->_importServices->importProduct();
		die();
	}
}