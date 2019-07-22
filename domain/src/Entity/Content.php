<?php

namespace AdventistCommons\Domain\Entity;

use AdventistCommons\Domain\Hydrator\Normalizer;

/**
 * @author    vibby <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Content extends Entity
{
	private $name;
	private $region;
	private $section;
	private $content;
	private $isHidden;
	
	public static function __getMetaData(): array
	{
		return [
			'fields' => [
				'section' => [
					'hydrate_normalizer' => Normalizer\ForeignNormalizer::class,
					'store_processor' => null,
					'class'    => Section::class,
					'multiple' => true,
				],
			],
		];
	}

	public function __construct()
	{
	}
	
	public function getName(): ?string
	{
		return $this->name;
	}

	public function setName($name): self
	{
		$this->name = $name;

		return $this;
	}
	
	public function getRegion(): ?string
	{
		return $this->region;
	}

	public function setRegion($region): self
	{
		$this->region = $region;

		return $this;
	}
	
	public function getContent(): ?string
	{
		return $this->content;
	}

	public function setContent($content): self
	{
		$this->content = $content;

		return $this;
	}
	
	public function isHidden(): ?bool
	{
		return $this->isHidden;
	}

	public function setIsHidden(bool $isHidden): self
	{
		$this->isHidden = $isHidden;

		return $this;
	}
	
	public function setSection(Section $section)
	{
		$this->section = $section;
	}

	public function getSection(): Section
	{
		return $this->section;
	}
}
