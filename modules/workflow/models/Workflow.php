<?php

namespace app\modules\workflow\models;

use \Yii;
use \yii\base\Model;
use \yii\db\ActiveRecord;
use \yii\helpers\ArrayHelper;

class Workflow extends ActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public static function tableName()
    {
        return '{{%workflow}}';
    }

    //all application workflow stati
    const ACTION_APPROVE  = 'approve';
    const ACTION_REJECT   = 'reject';
    const ACTION_CHANGE   = 'change';
    const ACTION_ESCALATE = 'escalate';
    const ACTION_ARCHIVE  = 'archive';
    const ACTION_BOOK     = 'book';

    //all appication stati
    const STATUS_CREATED   = 'created';
    const STATUS_REJECTED  = 'rejected';
    const STATUS_REQUESTED = 'requested';
    const STATUS_CORRECTED = 'corrected';
    const STATUS_APPROVED  = 'approved';
    const STATUS_PENDING   = 'pending';
    const STATUS_BOOKED    = 'booked';
    
    const STATUS_DRAFT     = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_ARCHIVED  = 'archived';
    
    public static $statusse = array(
        self::STATUS_CREATED   =>'created',
        self::STATUS_REQUESTED =>'requested',
        self::STATUS_REJECTED  =>'rejected',
        self::STATUS_CORRECTED =>'corrected',
        self::STATUS_APPROVED  =>'approved',
        self::STATUS_PENDING   =>'pending',
        self::STATUS_BOOKED    =>'booked',
        self::STATUS_DRAFT     => 'draft',
        self::STATUS_PUBLISHED => 'published',
        self::STATUS_ARCHIVED  => 'archived',
    );

    public static function getStatusOptions()
    {
        return self::$statusse;
    }

    /**
     * Returns a string representation of the model's categories
     *
     * @return string The category of this model as a string
     */
    public function getStatusAsString($status)
    {
        $options = self::getStatusOptions();
        return isset($options[$status]) ? $options[$status] : '';
    }

    /**
    * @var const MODULE_TIMETABLE
    * is used for managing workflow
    */
    const MODULE_TIMETABLE   = 1;
    const MODULE_PRINTREPORT = 2;
    const MODULE_CMS         = 3;
    const MODULE_BLOG        = 4;
    const MODULE_TASKS       = 5;
    const MODULE_REVISION    = 6;
    const MODULE_HOLIDAY     = 7;

    public static $appmodules = array(
        self::MODULE_TIMETABLE   => 'timetable',
        self::MODULE_PRINTREPORT => 'printreport',
        self::MODULE_CMS         => 'page',
        self::MODULE_BLOG        => 'post',
        self::MODULE_TASKS       => 'tasks/default',
        self::MODULE_REVISION    => 'revision/default',
        self::MODULE_HOLIDAY     => 'holiday',
    );

    public static function getModuleOptions(){
        return self::$appmodules;
    }

    /**
     * Returns a string representation of the model's module table name
     *
     * @return string The module table name of this workflow as a string
     */
    public static function getModuleAsString($id=NULL)
    {
        $options = self::getModuleOptions();
        if(!is_null($id))
            return isset($options[$id]) ? $options[$id] : '';
        return isset($options[$this->wf_table]) ? $options[$this->wf_table] : '';
    }

    /**
     * Returns a string representation of the model's module table name
     *
     * @return string The module table name of this workflow as a string
     */
    public static function getModuleAsController($id)
    {
        $options = self::getModuleOptions();
        if(isset($options[$id])){ 
            $cleanme = $options[$id];
            //cut table shortcut
            $cleanme = str_replace(Yii::$app->db->tablePrefix, '', $cleanme);
            $cleanme = implode('',explode('_',$cleanme));
            return $cleanme;
        }
        return 'site';
    }

    /**
    * @return model \app\models\user User
    */
    public function getPreviousUser(){
        return $this->hasOne('\app\models\User', array('id' => 'previous_user_id'));
    }

    /**
    * @return model \app\models\user User
    */
    public function getNextUser(){
        return $this->hasOne('\app\models\User', array('id' => 'next_user_id'));
    }
 
    /**
     * @return array primary key of the table
     **/     
    public static function primaryKey()
    {
        return array('id');
    }

 	public function rules()
	{
	    return array(
            array('previous_user_id','required'),
	        array('date_create','string'),	        
	    );
	}

    /**
    * before we save the record, we will md5 the password
    */
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->date_create = Date('Y-m-d H:i:s');
            }
            else {
                //on update
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id'               => 'ID',
            'previous_user_id' => Yii::t('app','From User'),
            'next_user_id'     => Yii::t('app','Acting User'),
            'module'           => Yii::t('app','Module'),
            'wf_table'         => Yii::t('app','Module DB'),
            'wf_id'            => Yii::t('app','Module RecId'),
            'status_from'      => Yii::t('app','Old State'),
            'status_to'        => Yii::t('app','Current State'),
            'actions_next'     => Yii::t('app','Allowed Actions'),
            'date_create'      => Yii::t('app','Created at'),
		);        
    }

    public static function getAdapterForUserWorkflow() {
        $userId = Yii::$app->user->identity->id;
        return static::find()->where('(previous_user_id = '.$userId.' OR next_user_id = '.$userId.')');
    }

    /**
    * @return array splitted actions that are allowed from next
    */
    public function getNextActions(){
        $allowed_actions = array();        
        $allowed_actions = explode(',',$this->actions_next);
        if(Yii::$app->user->isAdmin){
            $allowed_actions[]='update';
        }
        $allowed_actions[]='view';
        return $allowed_actions;
    }

    /**
    * will insert a record into a new workflow
    *
    * @param integer module table by const from workflow model
    * @param integer the fk of the table refrenced by param one
    */
    public static function addRecordIntoWorkflow($module,$id,$status=self::STATUS_CREATED,$user_id=NULL,$actions=NULL){
        //grep the modules as array
        $options = self::getModuleOptions();

        $NWflow = new self;
        $NWflow->previous_user_id = Yii::$app->user->identity->id;
        $NWflow->next_user_id = is_null($user_id)?$NWflow->previous_user_id:$user_id;
        $NWflow->module = $options[(int)$module];
        $NWflow->wf_table = $module;
        $NWflow->wf_id = $id;
        $NWflow->status_from = self::STATUS_CREATED;
        $NWflow->status_to = $status;        
        $NWflow->actions_next = is_array($actions)?array_merge($actions,','):'';
        if($NWflow->save())
            return true;
        return false;
    }

    /**
    * @return query to get the workflow logs for a special entry
    * @param integer the id of the module - workflow table - see static params from Workflow Model
    * @param integer the primarey key value of the record within the linked table
    */
    public static function getAdapterForWorkflowLog($module,$id)
    {
        return static::find()->where('wf_table = '.$module.' AND wf_id = '.$id);
    }

    /**
    * @return query to get the number of workflow logs for a special entry
    * @param integer the id of the module - workflow table - see static params from Workflow Model
    * @param integer the primarey key value of the record within the linked table
    */
    public static function getAdapterForWorkflowLogCount($module,$id)
    {
        return static::find()->where('wf_table = '.$module.' AND wf_id = '.$id)->Count();
    }

}
