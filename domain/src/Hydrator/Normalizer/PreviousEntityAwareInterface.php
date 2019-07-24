<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use  AdventistCommons\Domain\Entity\Entity;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface PreviousEntityAwareInterface
{
    public function setPreviousEntity(Entity $previousEntity);
}
