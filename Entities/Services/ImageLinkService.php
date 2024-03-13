<?php

declare(strict_types=1);

namespace app\Entities\Services;

use app\Entities\Entity\ImageLink;
use app\Entities\Forms\ImageLinkForm;
use app\Entities\Repositories\ImageLinkRepository;

use Yii;
use yii\httpclient\Client;
use yii\web\Response;

class ImageLinkService
{
    public ImageLinkRepository $imageLinkRepository;

    public function __construct(ImageLinkRepository $imageLinkRepository)  {
        $this->imageLinkRepository = $imageLinkRepository;
    }

    final public function create(ImageLinkForm $form): ImageLink
    {
        $imageLink = ImageLink::create($form);
        return $this->imageLinkRepository->save($imageLink);
    }

    final public function getImage()
    {
        $url = $this->getUrl();
        while ($this->imageLinkRepository->exists(['url' => $url])) {
            $url = $this->getUrl();
        }
        return $url;
    }

    private function getUrl(): string
    {
        return sprintf('https://picsum.photos/id/%d/600/500',random_int(1, 1028));
    }
}