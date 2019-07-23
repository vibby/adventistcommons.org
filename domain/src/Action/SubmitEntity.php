<?php

namespace AdventistCommons\Domain\Action;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Repository\RepositoryLister;
use AdventistCommons\Domain\Request\ParameterCollection;
use AdventistCommons\Domain\Request\UploadedCollection;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class SubmitEntity
{
    private $hydrator;
    private $repositoryLister;
    private $metadataManager;
    
    public function __construct(
        Hydrator $hydrator,
        RepositoryLister $repositoryLister,
        MetadataManager $metadataManager
    ) {
        $this->hydrator = $hydrator;
        $this->repositoryLister = $repositoryLister;
        $this->metadataManager = $metadataManager;
    }
    
    public function do(
        string $className,
        ParameterCollection $entityData,
        UploadedCollection $uploadedFiles = null
    ): Entity {
        $entity = null;
        $repository = $this->repositoryLister->getForClassName($className);
        if (isset($entityData['id']) && $entityData['id']) {
            $entity = $repository->find($entityData['id']);
        }
        $entity = $this->hydrator->hydrate(
            $entity ?? $className,
            $entityData,
            $uploadedFiles,
            false
        );
        $validator = $this->metadataManager->getForClass($className)->getValidator();
        $validator::validate($entity);
        
        return $entity;
    }
}
