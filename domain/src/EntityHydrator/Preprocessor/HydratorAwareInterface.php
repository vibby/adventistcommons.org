<?php

namespace AdventistCommons\Domain\EntityHydrator\Preprocessor;

use  AdventistCommons\Domain\EntityHydrator\Hydrator;

interface HydratorAwareInterface
{
	public function setHydrator(Hydrator $hydrator): void;
}
