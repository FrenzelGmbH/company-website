<?php

use yii\db\Schema;

class m140319_230647_recipies extends \yii\db\Migration
{
    public function up()
    {
      $this->createTable('tbl_recipie',array(
          'id'                      => 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
          'parent_id'               => 'INTEGER UNSIGNED DEFAULT NULL',
          'name'                    => 'VARCHAR(200)',          
          'creator_id'              => 'INTEGER NOT NULL',
          'status'                  => 'VARCHAR(255) NOT NULL DEFAULT "created"',
          'time_deleted'            => 'INTEGER DEFAULT NULL',
          'time_create'             => 'INTEGER',
      ),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');

      $this->createTable('tbl_incredient',array(
          'id'                      => 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
          'name'                    => 'VARCHAR(200)',
          'cup_factor'              => 'FLOAT DEFAULT "1.00"',
          'creator_id'              => 'INTEGER NOT NULL',
          'status'                  => 'VARCHAR(255) NOT NULL DEFAULT "created"',
          'time_deleted'            => 'INTEGER DEFAULT NULL',
          'time_create'             => 'INTEGER',
      ),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');

      $this->createTable('tbl_recipie_detail',array(
          'id'                      => 'INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT',
          'recipie_id'              => 'INTEGER UNSIGNED NOT NULL',
          'incredient_id'           => 'INTEGER UNSIGNED NULL',
          'incredient'              => 'VARCHAR(200)',
          'amount'                  => 'FLOAT DEFAULT "1.00"',
          'uom'                     => 'INTEGER UNSIGNED NOT NULL DEFAULT 1',
          'creator_id'              => 'INTEGER NOT NULL',
          'status'                  => 'VARCHAR(255) NOT NULL DEFAULT "created"',
          'time_deleted'            => 'INTEGER DEFAULT NULL',
          'time_create'             => 'INTEGER',
      ),'CHARACTER SET utf8 COLLATE utf8_bin ENGINE = InnoDB;');

       //add the related fk's
      $this->addForeignKey('FK_recipiedetail_recipie','tbl_recipie_detail','recipie_id','tbl_recipie','id');      
    }

    public function down()
    {
      //FIRST DROP FK's
      $this->dropForeignKey('FK_recipiedetail_recipie','tbl_recipie_detail');
      
      //DROP THE TABLES
      $this->dropTable('tbl_recipie');
      $this->dropTable('tbl_incredient');
      $this->dropTable('tbl_recipie_detail');
    }
}
