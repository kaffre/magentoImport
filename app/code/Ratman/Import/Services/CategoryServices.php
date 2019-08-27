<?php 
namespace Ratman\Import\Services;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Catalog\Model\CategoryFactory;

class CategoryServices 
{
    protected $storeManager;
    protected $categoryFactory;

    public function __construct(
        StoreManagerInterface $storeManager,
        CategoryFactory $categoryFactory
    ){
        $this->storeManager = $storeManager;
        $this->categoryFactory = $categoryFactory;
    }

    public function getCategoryId($categoryName)
    {
        $parentId = $this->storeManager->getStore()->getRootCategoryId();
        $parentCategory = $this->categoryFactory->create()->load($parentId);
        $category = $this->categoryFactory->create();

        $cat = $category->getCollection()
            ->addAttributeToFilter('name', $categoryName)
            ->getFirstItem();

        if (!$cat->getId()) {
            $category->setPath($parentCategory->getPath())
                ->setParentId($parentId)
                ->setName($categoryName)
                ->setIsActive(true);
            $category->save();
            return $category->getId();
        }

        return $cat->getId();
    }
}