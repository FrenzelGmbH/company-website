<?php

use yii\db\Schema;

class m140311_202026_categories extends \yii\db\Migration
{
	public function up()
	{
    $this->createTable('tbl_categories',array(
        'id'             => 'INTEGER PRIMARY KEY AUTO_INCREMENT',
        'parent'         => 'INTEGER DEFAULT NULL',
        'name'           => 'VARCHAR(200)',
        'status'         => 'VARCHAR(200) DEFAULT "created" NOT NULL',        
        'cat_module'     => 'INTEGER NOT NULL', //integer based module id, defined within dms model
        'creator_id'     => 'INTEGER NOT NULL',
        'time_deleted'   => 'INTEGER DEFAULT NULL',
        'time_create'    => 'INTEGER DEFAULT NULL'
    ),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');
	}

	public function down()
	{
		$this->dropTable('tbl_categories');
	}

}
