<?php
namespace Ratman\Import\Helper;

use Ratman\Import\Helper\JsonHelper;

Class DataHelper
{
	protected $_jsonHelper;

	public function __construct(JsonHelper $jsonHelper)
	{
		$this->_jsonHelper = $jsonHelper;
	}

	public function prepareData($url)
	{
		$products = $this->_jsonHelper->convertJsonToObject($url);
		$arrayOfProducts = array();
		foreach ($products as $product) {

			$arrayOfProducts[] = [
				'product_id' => $product->product_id,
				'name' => $product->name,
				'size' => $product->size,
				'price' => $product->price,
				'beer_id' => $product->beer_id,
				'image_url' => $product->image_url,
				'category' => $product->category,
				'abv' => $product->abv,
				'style' => $product->style,
				'attributes' => $product->attributes,
				'type' => $product->type,
				'brewer' => $product->brewer,
				'country' => $product->country,
				'on_sale' => $product->on_sale
			];
		}

		return $arrayOfProducts;
	}
}