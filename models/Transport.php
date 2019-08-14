<?php

namespace app\models;

/**
 * This is the model class for table "transport".
 *
 * @property int $transport_id
 * @property string $transport_name
 */
class Transport extends \yii\db\ActiveRecord implements \app\ext\IdentInterface
{
    use \app\ext\IdentTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transport';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['transport_name'], 'required'],
            [['transport_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transport_id' => 'Transport ID',
            'transport_name' => 'Transport Name',
        ];
    }
}
