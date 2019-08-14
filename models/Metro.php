<?php

namespace app\models;

/**
 * This is the model class for table "metro".
 *
 * @property int $metro_id
 * @property string $metro_name
 */
class Metro extends \yii\db\ActiveRecord implements \app\ext\IdentInterface
{
    use \app\ext\IdentTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'metro';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['metro_name'], 'required'],
            [['metro_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'metro_id' => 'Metro ID',
            'metro_name' => 'Metro Name',
        ];
    }
}
