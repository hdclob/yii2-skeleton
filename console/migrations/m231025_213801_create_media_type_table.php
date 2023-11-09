<?php

use console\migrations\base\Migration;

class m231025_213801_create_media_type_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('media_type', [
			'media_type_id' => $this->primaryKey(),
			'name' => $this->string(255)->notNull(),
		]);

		$this->batchInsert('media_type', [
			'media_type_id',
			'name'
		], [
			[
				'media_type_id' => 1,
				'name' => 'Image'
			],
			[
				'media_type_id' => 2,
				'name' => 'Video'
			],
			[
				'media_type_id' => 3,
				'name' => 'Youtube Video'
			],
		]);
	}

	public function safeDown()
	{
		$this->dropTable('media_type');
	}
}