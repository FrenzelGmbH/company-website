<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserForm represents the model behind the search form about User.
 */
class UserForm extends Model
{
    public $id;
    public $username;
    public $password;
    public $email;
    public $role;
    public $prename;
    public $name;
    public $phone;
    public $mobile;
    public $fax;
    public $messanger;
    public $parent_user_id;
    public $backup_user_id;
    public $time_create;
    public $time_update;
    public $time_login;
    public $date_entry;
    public $date_exit;
    public $no_employee;

    public function rules()
    {
        return array(
            array('id, role, parent_user_id, backup_user_id, time_create, time_update, time_login', 'integer'),
            array('username, password, email, prename, name, phone, mobile, fax, messanger, date_entry, date_exit, no_employee', 'safe'),
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'email' => 'Email',
            'role' => 'Role',
            'prename' => 'Prename',
            'name' => 'Name',
            'phone' => 'Phone',
            'mobile' => 'Mobile',
            'fax' => 'Fax',
            'messanger' => 'Messanger',
            'parent_user_id' => 'Parent User ID',
            'backup_user_id' => 'Backup User ID',
            'time_create' => 'Time Create',
            'time_update' => 'Time Update',
            'time_login' => 'Time Login',
            'date_entry' => 'Date Entry',
            'date_exit' => 'Date Exit',
            'no_employee' => 'No Employee',
        );
    }

    public function search($params)
    {
        $query = User::find();
        $dataProvider = new ActiveDataProvider(array(
            'query' => $query,
        ));

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $this->addCondition($query, 'id');
        $this->addCondition($query, 'username', true);
        $this->addCondition($query, 'password', true);
        $this->addCondition($query, 'email', true);
        $this->addCondition($query, 'role');
        $this->addCondition($query, 'prename', true);
        $this->addCondition($query, 'name', true);
        $this->addCondition($query, 'phone', true);
        $this->addCondition($query, 'mobile', true);
        $this->addCondition($query, 'fax', true);
        $this->addCondition($query, 'messanger', true);
        $this->addCondition($query, 'parent_user_id');
        $this->addCondition($query, 'backup_user_id');
        $this->addCondition($query, 'time_create');
        $this->addCondition($query, 'time_update');
        $this->addCondition($query, 'time_login');
        $this->addCondition($query, 'date_entry');
        $this->addCondition($query, 'date_exit');
        $this->addCondition($query, 'no_employee', true);
        return $dataProvider;
    }

    protected function addCondition($query, $attribute, $partialMatch = false)
    {
        $value = $this->$attribute;
        if (trim($value) === '') {
            return;
        }
        if ($partialMatch) {
            $value = '%' . strtr($value, array('%'=>'\%', '_'=>'\_', '\\'=>'\\\\')) . '%';
            $query->andWhere(array('like', $attribute, $value));
        } else {
            $query->andWhere(array($attribute => $value));
        }
    }
}
