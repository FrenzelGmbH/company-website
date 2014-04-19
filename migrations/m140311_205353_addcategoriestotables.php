<?php

use yii\db\Schema;

class m140311_205353_addcategoriestotables extends \yii\db\Migration
{
	public function up()
	{
    $this->addColumn('tbl_post','categories_id','INTEGER(11) DEFAULT NULL');
    $this->addColumn('tbl_pages','categories_id','INTEGER(11) DEFAULT NULL');
    $this->addColumn('tbl_dmpaper','categories_id','INTEGER(11) DEFAULT NULL');
    $this->addColumn('tbl_comment','categories_id','INTEGER(11) DEFAULT NULL');
    $this->addColumn('tbl_article','categories_id','INTEGER(11) DEFAULT NULL');
	}

	public function down()
	{
		$this->dropColumn('tbl_post','categories_id');
    $this->dropColumn('tbl_pages','categories_id');
    $this->dropColumn('tbl_dmpaper','categories_id');
    $this->dropColumn('tbl_comment','categories_id');
    $this->dropColumn('tbl_article','categories_id');
	}
}
