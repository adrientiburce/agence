<?php
namespace App\Listener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use Liip\ImagineBundle\Imagine\Cache\CacheManager;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Vich\UploaderBundle\Templating\Helper\UploaderHelper;


class ImageCacheSubscriber implements EventSubscriber
{
    
    /**
     * @var CacheManager
     */
    private $cache;

    public function __construct(CacheManager $cache)
    {
        $this->cache = $cache;
    }

    public function getSubscribedEvents()
    {
        return [
            'preUpdate',
            'preRemove',
        ];
    }
    
    public function preUpdate(PreUpdateEventArgs $args, UploaderHelper $helper)
    {
        $entity = $args->getEntity();
        if(!$entity instanceof Property){
            return;
        }
        if($entity->getImageFile() instanceof UploadedFile){
            $this->cache->remove($helper->asset($entity, 'imageFile'));
        };
    }

    public function preRemove(LifecycleEventArgs $args, UploaderHelper $helper)
    {
        $entity = $args->getEntity();
        if(!$entity instanceof Property){
            return;
        }
        $this->cache->remove($helper->asset($entity, 'imageFile'));
    }
} 