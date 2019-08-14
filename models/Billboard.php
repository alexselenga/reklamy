<?php

namespace app\models;

/**
 * This is the model class for table "billboard".
 *
 * @property int $billboard_id
 * @property string $billboard_name
 */
class Billboard extends \yii\db\ActiveRecord implements \app\ext\IdentInterface
{
    use \app\ext\IdentTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billboard';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['billboard_name'], 'required'],
            [['billboard_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'billboard_id' => 'Billboard ID',
            'billboard_name' => 'Billboard Name',
        ];
    }
}
