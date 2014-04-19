<?php

use yii\db\Schema;

class m140306_143519_anonymuscomments extends \yii\db\Migration
{
	public function up()
	{
    $this->addColumn('tbl_comment','anonymous','VARCHAR(250) DEFAULT NULL');
	}

	public function down()
	{
		$this->dropColumn('tbl_comment','anonymous');
	}
}
