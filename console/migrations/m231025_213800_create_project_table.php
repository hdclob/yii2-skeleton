<?php

use console\migrations\base\Migration;

class m231025_213800_create_project_table extends Migration
{
	public function safeUp()
	{
		$this->createTable('project', [
			'project_id' => $this->primaryKey(),
			'title' => $this->string(255)->notNull(),
			'description' => $this->text(),
			'display' => $this->integer(1)->notNull()->defaultValue(0),
			'created_at' => $this->integer(11)->notNull(),
			'updated_at' => $this->integer(11)->notNull()
		]);
	}

	public function safeDown()
	{
		$this->dropTable('project');
	}
}