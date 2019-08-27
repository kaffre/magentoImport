<?php 
namespace Ratman\Import\Services;

use Magento\Catalog\Model\productFactory;
use Ratman\Import\Services\ImageServices;
use Ratman\Import\Services\CategoryServices;

class ProductServices 
{
    protected $_productFactory;
    protected $_imageServices;
    protected $_categoryServices;

    public function __construct(
        productFactory $productFactory,
        ImageServices $imageServices,
        CategoryServices $categoryServices
    ){
        $this->_imageServices = $imageServices;
        $this->_productFactory = $productFactory;
        $this->_categoryServices = $categoryServices;
    }

    public function create($productData)
    {
    	$categoryId = $this->_categoryServices->getCategoryId($productData['category']);
		$product = $this->_productFactory->create();
		$product->setId($productData['product_id']);
        $product->setSku('#'.$productData['product_id']);
	    $product->setName($productData['name'].' '.$productData['size']);
	    $product->setAttributeSetId(4);
	    $product->setStatus(1);
	    $product->setTypeId('simple');
	    $product->setPrice(10);
	    $product->setCategoryIds(array($categoryId));
	    $product->setCustomAttribute('size', $productData['size']);
	    $product->setCustomAttribute('type', $productData['type']);
	    $product->setCustomAttribute('brewer', $productData['brewer']);
	    $product->setCustomAttribute('country', $productData['country']);
	    $product->setCustomAttribute('abv', $productData['abv']);
	    $product->setStockData(array(
	        'use_config_manage_stock' => 0, 
	        'manage_stock' => 1, 
	        'is_in_stock' => 1, 
	        'qty' => 0 
	        )
	    ); 

	    if (false) {
	    	$image = $this->_imageServices->save();
	    	$product->setImage($image);
	        $product->setSmallImage($image);
	        $product->setThumbnail($image);
        }
	    $product->save();
    }
}