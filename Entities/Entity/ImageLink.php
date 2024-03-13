<?php

namespace app\Entities\Entity;

use app\Entities\Forms\ImageLinkForm;
use Yii;

/**
 * This is the model class for table "image_link".
 *
 * @property int $id
 * @property string|null $url
 * @property bool|null $is_solution
 */
class ImageLink extends \yii\db\ActiveRecord
{
    public static function create(ImageLinkForm $form): self
    {
        $imageLink = new static();
        $imageLink->url = $form->url;
        $imageLink->is_solution =$form->is_solution;
        return $imageLink;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image_link';
    }



    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'is_solution' => 'Is Solution',
        ];
    }
}
