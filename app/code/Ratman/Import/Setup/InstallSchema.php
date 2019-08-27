<?php
namespace Ratman\Import\Setup;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{

	public function install(\Magento\Framework\Setup\SchemaSetupInterface $setup, \Magento\Framework\Setup\ModuleContextInterface $context)
	{
		$installer = $setup;
		$installer->startSetup();
		if (!$installer->tableExists('ratman_import_products')) {
			$table = $installer->getConnection()->newTable(
				$installer->getTable('ratman_import_products'))
				->addColumn(
					'id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[
						'identity' => true,
						'nullable' => false,
						'primary'  => true,
						'unsigned' => true,
					],
					'Post ID'
				)
				->addColumn(
					'product_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[],
					'product ID'
				)
				->addColumn(
					'name',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					['nullable => false'],
					'Product Name'
				)
				->addColumn(
					'size',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					255,
					[],
					'Product Size'
				)
				->addColumn(
					'price',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					null,
					[],
					'Product Price'
				)
				->addColumn(
					'beer_id',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					null,
					[],
					'Beer ID'
				)
				->addColumn(
					'status',
					\Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
					1,
					[],
					'Post Status'
				)
				->addColumn(
					'image_url',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Product Image URL'
				)
				->addColumn(
					'category',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products Category'
				)
				->addColumn(
					'abv',
					\Magento\Framework\DB\Ddl\Table::TYPE_DECIMAL,
					null,
					[],
					'Products abv'
				)
				->addColumn(
					'style',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products style'
				)
				->addColumn(
					'attributes',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products attributes'
				)
				->addColumn(
					'type',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products type'
				)
				->addColumn(
					'brewer',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products brewer'
				)
				->addColumn(
					'country',
					\Magento\Framework\DB\Ddl\Table::TYPE_TEXT,
					null,
					[],
					'Products country'
				)
				->addColumn(
					'on_sale',
					\Magento\Framework\DB\Ddl\Table::TYPE_BOOLEAN,
					null,
					[],
					'Products on sale'
				);
				
			$installer->getConnection()->createTable($table);
		}
	}
}
