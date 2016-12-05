<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "share".
 *
 * @property integer $id
 * @property string $user
 * @property string $file
 */
class Share extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'share';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'file'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'file' => 'File',
        ];
    }
}
