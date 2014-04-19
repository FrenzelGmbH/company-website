<?php

use yii\db\Schema;

class m140323_143951_addLatNLong extends \yii\db\Migration
{
    public function up()
    {
      $this->addColumn('tbl_address','no_latitude','FLOAT DEFAULT 0.00');
      $this->addColumn('tbl_address','no_longitude','FLOAT DEFAULT 0.00');
    }

    public function down()
    {
      $this->dropColumn('tbl_address','no_latitude');
      $this->dropColumn('tbl_address','no_longitude');
    }
}
