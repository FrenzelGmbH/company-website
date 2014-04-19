<?php

use yii\db\Schema;

class m140126_114440_additionaldmpaperfields extends \yii\db\Migration
{
	public function up()
	{
    $this->addColumn('tbl_dmpaper','department','VARCHAR(255) DEFAULT "unknown"');
    $this->addColumn('tbl_dmpaper','documenttype','VARCHAR(255) DEFAULT "PDF"');
	}

	public function down()
	{
		$this->dropColumn('tbl_dmpaper','department');
    $this->dropColumn('tbl_dmpaper','documenttype');
	}
}
