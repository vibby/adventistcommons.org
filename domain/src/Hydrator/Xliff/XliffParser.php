<?php

namespace AdventistCommons\Domain\Hydrator\Xliff;

use AdventistCommons\Domain\File\File;
use AdventistCommons\Domain\Entity\Content;
use AdventistCommons\Domain\Entity\Section;
use AdventistCommons\Domain\Hydrator\HydratorAwareTrait;
use AdventistCommons\Domain\Hydrator\HydratorAwareInterface;

class XliffParser implements HydratorAwareInterface
{
    use HydratorAwareTrait;
    
    const PARAGRAPH_SECTION_NAMES = [
        'maincontent' => 'Main content',
        'main'        => 'Main content',
    ];
    const TAG_SECTION_NAMES = [
        'cover'     => 'Front cover',
        'backcover' => 'Back cover',
    ];
    
    public function parseFile(File $file)
    {
        return $this->parseXml(simplexml_load_file($file->getAbsolutePath()));
    }
    
    public function parseXml(\SimpleXMLElement $xml)
    {
        $sections = [];
        foreach ($xml as $key => $region) {
            $sections = array_merge(
                $sections,
                $key === 'interior'
                    ? $this->parseXliffParagraphContent($region)
                    : $this->parseXliffTagContent($region, $key)
            );
        }
        
        return $sections;
    }
    
    private function parseXliffParagraphContent(\SimpleXMLElement $region)
    {
        $sections = [];
        foreach ($region as $regionName => $content) {
            $sectionData = [
                'name'         => self::formatRegionName($regionName, self::PARAGRAPH_SECTION_NAMES),
                'xliff_region' => $regionName,
            ];
            /** @var Section $section */
            $section = $this->getHydrator()->hydrate(Section::class, $sectionData);
            
            $paragraphs = preg_split('/\R/u', $content);
            ;
            foreach ($paragraphs as $p) {
                $contentData = [
                    'xliff_content'   => $p,
                    'is_hidden'       => empty($p),
                ];
                $section->addContent($this->getHydrator()->hydrate(Content::class, $contentData));
            }
            $sections[] = $section;
        }
        
        return $sections;
    }
    
    private function parseXliffTagContent(\SimpleXMLElement $region, string $regionName)
    {
        $sectionData = [
            'name'         => self::formatRegionName($regionName, self::TAG_SECTION_NAMES),
            'xliff_region' => $regionName,
        ];
        /** @var Section $section */
        $section = $this->getHydrator()->hydrate(Section::class, $sectionData);
        
        foreach ($region as $tagName => $tagContent) {
            $contentData = [
                'content'   => $tagContent,
                'xliff_tag' => $tagName,
            ];
            $section->addContent($this->getHydrator()->hydrate(Content::class, $contentData));
        }
        
        return [$section];
    }
    
    private static function formatRegionName($regionName, array $replace): string
    {
        return $replace[$regionName]
            ?? ucfirst(str_replace('_', ' ', $regionName));
    }
}
