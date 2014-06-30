<?php

namespace app\modules\member\models\base;

use Yii;

/**
 * This is the model class for table "letyii_user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property string $role
 * @property integer $status
 * @property string $create_time
 * @property string $update_time
 */
class LetUserBase extends \app\components\ActiveRecord
{
    public static function moduleName() {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'password_reset_token', 'email'], 'required'],
            [['status'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['password_hash', 'password_reset_token', 'email', 'auth_key', 'role'], 'string', 'max' => 128],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('member', 'ID'),
            'username' => Yii::t('member', 'Username'),
            'password_hash' => Yii::t('member', 'Password Hash'),
            'password_reset_token' => Yii::t('member', 'Password Reset Token'),
            'email' => Yii::t('member', 'Email'),
            'auth_key' => Yii::t('member', 'Auth Key'),
            'role' => Yii::t('member', 'Role'),
            'status' => Yii::t('member', 'Status'),
            'create_time' => Yii::t('member', 'Create Time'),
            'update_time' => Yii::t('member', 'Update Time'),
        ];
    }

}
