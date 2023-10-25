<?php

use console\migrations\base\Migration;

class m231025_213802_create_media_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('media', [
			'media_id' => $this->primaryKey(),
			'project_id' => $this->integer(11)->notNull(),
			'title' => $this->string(255)->notNull(),
			'media_type_id' => $this->integer(11)->notNull(),
			'url' => $this->string(255)->notNull()
		]);

		$this->createIndex('idx-media-media_type_id', 'media', 'media_type_id');
		$this->addForeignKey('fk-media-project_id', 'media', 'project_id', 'project', 'project_id');
		$this->addForeignKey('fk-media-media_type_id', 'media', 'media_type_id', 'media_type', 'media_type_id');
	}

	public function safeDown()
	{
		$this->dropForeignKey('fk-media-media_type_id', 'media');
		$this->dropForeignKey('fk-media-project_id', 'media');

		$this->dropTable('media');
	}
}