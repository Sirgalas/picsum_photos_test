<?php

declare(strict_types=1);

namespace app\Entities\Forms;

use app\Entities\Entity\ImageLink;
use yii\base\Model;

class ImageLinkForm extends Model
{
    public string $url;
    public bool $is_solution;

    public function __construct(ImageLink  $imageLink = null, $config = [])
    {
        parent::__construct($config);
        if($imageLink) {
            $this->url = $imageLink->url;
            $this->is_solution = $imageLink->is_solution;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_solution'], 'boolean'],
            [['url'], 'string', 'max' => 510],
        ];
    }
}