<?php

namespace AdventistCommons\Domain\Xliff;

use AdventistCommons\Domain\Entity\Content;
use AdventistCommons\Domain\Entity\Section;
use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Hydrator\Hydrator;
use AdventistCommons\Domain\Hydrator\Normalizer\HydratorAwareInterface;

class XliffParser implements HydratorAwareInterface
{
	const PARAGRAPH_SECTION_NAMES = [
		'maincontent' => 'Main content',
		'main' => 'Main content',
	];
	const TAG_SECTION_NAMES = [
		'cover' => 'Front cover',
		'backcover' => 'Back cover',
	];
	
	/** @var Hydrator */
	private $hydrator;
	
	public function setHydrator(Hydrator $hydrator): void
	{
		$this->hydrator = $hydrator;
	}
	
	public function parseFile(File $file)
	{
		return $this->parseXml(simplexml_load_file($file->getAbsolutePath()));
	}
	
	public function parseXml(\SimpleXMLElement $xml)
	{
		$sections = [];
		foreach( $xml as $key => $region ) {
			if( $key === 'interior' ) {
				$sections = array_merge($sections, $this->parseXliffParagraphContent($region));
			} else {
				$sections = array_merge($sections, $this->parseXliffTagContent($region, $key));
			}
		}
		
		return $sections;
	}
	
	private function parseXliffParagraphContent(\SimpleXMLElement $region)
	{
		$sections = [];
		foreach( $region as $regionName => $content ) {
			$sectionData = [
				'name' => self::formatRegionName($regionName, self::PARAGRAPH_SECTION_NAMES),
				'xliff_region' => $regionName,
			];
			$section = $this->hydrator->hydrate(Section::class, $sectionData);
			
			$paragraphs = preg_split('/\R/u', $content);;
			foreach( $paragraphs as $p ) {
				$contentData = [
					'content' => $p,
					'is_hidden' => empty($p),
				];
				$section->addContent($this->hydrator->hydrate(Content::class, $contentData));
			}
			$sections[] = $section;
		}
		
		return $sections;
	}
	
	private function parseXliffTagContent(\SimpleXMLElement $region, string $regionName)
	{
		$sectionData = [
			'name' => self::formatRegionName($regionName, self::TAG_SECTION_NAMES),
			'xliff_region' => $regionName,
		];
		$section = $this->hydrator->hydrate(Section::class, $sectionData);
		
		foreach($region as $tagName => $tagContent) {
			$contentData = [
				'content' => $tagContent,
				'xliff_tag' => $tagName,
			];
			$section->addContent($this->hydrator->hydrate(Content::class, $contentData));
		}
		
		return [$section];
	}
	
	private static function formatRegionName($regionName, array $replace): string
	{
		return $replace[$regionName]
			?? ucfirst( str_replace( '_', ' ', $regionName ) );
	}
}
