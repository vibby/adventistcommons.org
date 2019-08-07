<?php

namespace AdventistCommons\Domain\Action;

use AdventistCommons\Domain\Entity\Entity;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Metadata\MetadataManager;
use AdventistCommons\Domain\Request\UploadedCollection;
use AdventistCommons\Domain\Repository\RepositoryLister;
use AdventistCommons\Domain\Request\ParameterCollection;
use AdventistCommons\Domain\validation\ValidatorCollection;
use AdventistCommons\Domain\Validation\Entity\EntityValidator;

/**
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class SubmitEntity
{
    private $hydrator;
    private $repositoryLister;
    private $metadataManager;
    private $validatorCollection;
    
    public function __construct(
        Hydrator $hydrator,
        RepositoryLister $repositoryLister,
        MetadataManager $metadataManager,
        ValidatorCollection $validatorCollection
    ) {
        $this->hydrator             = $hydrator;
        $this->repositoryLister     = $repositoryLister;
        $this->metadataManager      = $metadataManager;
        $this->validatorCollection  = $validatorCollection;
    }
    
    public function act(
        string $className,
        ParameterCollection $entityData,
        UploadedCollection $uploadedFiles = null
    ): Entity {
        $entity = null;
        if (isset($entityData['id']) && $entityData['id']) {
            $repository = $this->repositoryLister->getForClassName($className);
            $entity     = $repository->find($entityData['id']);
        }
        $entity = $this->hydrator->hydrate(
            $entity ?? $className,
            $entityData,
            $uploadedFiles,
            false
        );
        $validatorClass = $this->metadataManager->getForClass($className)->getValidator();
        /** @var EntityValidator $validator */
        $validator      = $this->validatorCollection->get($validatorClass);
        $validator->validate($entity);
        
        return $entity;
    }
}
