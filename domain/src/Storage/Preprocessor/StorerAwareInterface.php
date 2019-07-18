<?php

namespace AdventistCommons\Domain\Storage\Preprocessor;

use AdventistCommons\Domain\Storage\Storer;

interface StorerAwareInterface
{
	public function setStorer(Storer $stores): void;
}
