<?php

declare(strict_types=1);

namespace app\Entities\Repositories;

use app\Entities\Entity\ImageLink;
use app\Exceptions\NotFoundException;
use app\Exceptions\NotSaveException;
use app\Helpers\ErrorHelpers;

class ImageLinkRepository
{
    final public function get(int $id): ImageLink
    {
        if(!$imageLink = ImageLink::findOne($id)) {
            throw new NotFoundException(' image not find');
        }
        return $imageLink;
    }
    final public function find(int $id): ?ImageLink
    {
        if(!$imageLink = ImageLink::findOne($id)) {
            return null;
        }
        return $imageLink;
    }

    final public function save(ImageLink $imageLink): ImageLink
    {
        if(!$imageLink->save()) {
            throw new NotSaveException(ErrorHelpers::errorsToStr($imageLink->errors));
        }
        return $imageLink;
    }

    final public function delete(int $id): void
    {
        $imageLink = $this->get($id);
        $imageLink->delete();
    }

    final public function exists(array $criteria): bool
    {
        return ImageLink::find()->where($criteria)->exists();
    }

}