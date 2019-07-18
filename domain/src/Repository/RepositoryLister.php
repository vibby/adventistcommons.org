<?php

namespace AdventistCommons\Domain\Repository;

use AdventistCommons\Domain\Entity\Product;
use AdventistCommons\Domain\Entity\Series;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class RepositoryLister
{
	private $repositoryByClassName = [];

	public function __construct(ProductRepository $productRepository, SeriesRepository $seriesRepository)
	{		
		$this->repositoryByClassName = [
			Product::class => $productRepository,
			Series::class  => $seriesRepository,
		];
	}

	public function getForClassName($className)
	{
		return $this->repositoryByClassName[$className];
	}
}
