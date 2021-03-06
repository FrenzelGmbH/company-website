<?php

namespace app\modules\posts\models;

use Yii;
use app\modules\parties\models\Party;

/**
 * This is the model class for table "tbl_widget".
 *
 * @property string $id
 * @property string $name
 * @property string $wgt_table
 * @property string $wgt_id
 * @property string $param1_str
 * @property integer $param2_int
 * @property string $param3_date
 * @property string $status
 * @property integer $time_deleted
 * @property integer $time_create
 */
class WidgetConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_widget';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['wgt_table', 'wgt_id', 'param2_int', 'time_deleted', 'time_create'], 'integer'],
            [['param3_date'], 'safe'],
            [['name', 'param1_str'], 'string', 'max' => 200],
            [['status'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'wgt_table' => Yii::t('app', 'Wgt Table'),
            'wgt_id' => Yii::t('app', 'Wgt ID'),
            'param1_str' => Yii::t('app', 'Param1 Str'),
            'param2_int' => Yii::t('app', 'Param2 Int'),
            'param3_date' => Yii::t('app', 'Param3 Date'),
            'status' => Yii::t('app', 'Status'),
            'time_deleted' => Yii::t('app', 'Time Deleted'),
            'time_create' => Yii::t('app', 'Time Create'),
        ];
    }

    /**
     * [findRelatedRecords description]
     * @param  [type] $WIDGET [description]
     * @param  [type] $module [description]
     * @param  [type] $id     [description]
     * @return [type]         [description]
     */
    public static function findRelatedRecords($WIDGET,$module,$id)
    {
        return static::find()->where('name = "'.$WIDGET.'" AND wgt_table = '.$module.' AND wgt_id = '.$id);
    }

    /**
     * [findRelatedModels description]
     * @param  [type] $WIDGET [description]
     * @param  [type] $module [description]
     * @param  [type] $id     [description]
     * @return [type]         [description]
     */
    public static function findRelatedModels($WIDGET,$module,$id)
    {
        return self::find()
            ->where([
                'name' => $WIDGET,
                'wgt_table' => $module,
                'wgt_id' => $id
            ])
            ->all();
    }

    /**
    * @return \yii\db\ActiveRelation
    */
    public function getParty()
    {
        return $this->hasOne(Party::className(), ['id' => 'param2_int']);
    } 

}
