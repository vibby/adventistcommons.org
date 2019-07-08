<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Container
{
	/** @var ContainerHolder */
	private $containerHolder;

	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->model('ion_auth_model');
		$CI->load->model('product_model');
		$models = [
			Product_model::class  => $CI->product_model,
			Ion_auth_model::class => $CI->ion_auth_model,
		];

		$CI->load->library('ContainerHolder');
		$containerHolder = $CI->containerholder;

		foreach ($models as $class => $model) {
			$containerHolder->set(
				$class,
				function() use ($model) {
					return $model;
				}
			);
		}

		$containerHolder->set(
			\AdventistCommons\Domain\EntityBuilder\LanguageHydrator::class,
			function () use ($containerHolder) {
				return new \AdventistCommons\Domain\EntityBuilder\LanguageHydrator();
			}
		);
		$containerHolder->set(
			\AdventistCommons\Domain\EntityBuilder\ProjectHydrator::class,
			function () use ($containerHolder) {
				return new \AdventistCommons\Domain\EntityBuilder\ProjectHydrator(
					$containerHolder->get(\AdventistCommons\Domain\EntityBuilder\LanguageHydrator::class)
				);
			}
		);
		$containerHolder->set(
			\AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator::class,
			function () use ($containerHolder) {
				return new \AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator();
			}
		);
		$containerHolder->set(
			\AdventistCommons\Domain\EntityBuilder\ProductHydrator::class,
			function () use ($containerHolder) {
				return new \AdventistCommons\Domain\EntityBuilder\ProductHydrator(
					$containerHolder->get(\AdventistCommons\Domain\EntityBuilder\ProjectHydrator::class),
					$containerHolder->get(\AdventistCommons\Domain\EntityBuilder\ProductAttachmentHydrator::class)
				);
			}
		);
		$containerHolder->set(
			\AdventistCommons\Domain\Repository\ProductRepository::class,
			function () use ($containerHolder) {
				return new \AdventistCommons\Domain\Repository\ProductRepository(
					$containerHolder->get(Product_model::class),
					$containerHolder->get(\AdventistCommons\Domain\EntityBuilder\ProductHydrator::class)
				);
			}
		);

		$containerHolder->close();

		$this->containerHolder = $containerHolder;
	}

	public function get( $name )
	{
		return $this->containerHolder->get($name);
	}
}
