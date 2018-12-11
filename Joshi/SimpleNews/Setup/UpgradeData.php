<?php
namespace Joshi\SimpleNews\Setup;

use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\UpgradeDataInterface;

class UpgradeData implements UpgradeDataINterface {
	public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
		$setup->startSetup();

		if (version_compare($context->getVersion(), '0.0.2') < 0) {
			$tableName = $setup->getTable('tutorial_simplenews');

			if ($setup->getConnection()->isTableExists($tableName) == true) {
				$data = [
					[
						'title' => 'How to create a simple module',
						'summary' => 'The Summary',
						'description' => 'The Description',
						'created_at' => date('Y-m-d H:i:s'),
						'status' => 1,
					],
					[
						'title' => 'How to use model and collection in magento 2',
						'summary' => 'The Summary',
						'description' => 'The Description',
						'created_at' => date('Y-m-d H:i:s'),
						'status' => 1,
					],
					[
						'title' => 'Create a module with custom database table',
						'summary' => 'The Summary',
						'description' => 'The Description',
						'created_at' => date('Y-m-d H:i:s'),
						'status' => 1,
					],
				];

				foreach ($data as $item) {
					$setup->getConnection()->insert($tableName, $item);
				}
			}
		}

		$setup->endSetup();
	}
}
