<?php

namespace AdventistCommons\Domain\Storage\Remover;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
interface SeriesRemoverInterface
{
	public function removeSeries(int $id): void;
}
