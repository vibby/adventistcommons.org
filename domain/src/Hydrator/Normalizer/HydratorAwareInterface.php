<?php

namespace AdventistCommons\Domain\Hydrator\Normalizer;

use  AdventistCommons\Domain\Hydrator\Hydrator;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface HydratorAwareInterface
{
	public function setHydrator(Hydrator $hydrator): void;
}
