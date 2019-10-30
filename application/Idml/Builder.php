<?php

namespace AdventistCommons\Idml;

/**
 * Class Able to build some Idml holder
 * @package AdventistCommons\Export\Idml
 * @author    Vincent Beauvivre <vincent@beauvivre.fr>
 * @copyright 2019
 */
class Builder
{
	private $translator;
	
	private static $arr_accepted_mime_types = [
		'application/zip; charset=binary',
		'application/octet-stream; charset=binary',
	];
	
	public function __construct(
		Translator $translator
	) {
		$this->translator = $translator;
	}
	
	public function buildFromArrayProductAndProject(array $product, array $project = null): Holder
	{
		if ($project && $product['id'] !== $project['product_id']) {
			throw new \LogicException('Consistence error in product and project');
		}
		if (!$product['idml_file']) {
			return null;
		}
		$idmlPath = realpath(sprintf(
			'%s/../../uploads/%s.idml',
			__DIR__,
			$product['idml_file']
		));
		self::checkFile($idmlPath);
		
		$holder = new Holder($idmlPath, $product);
		if ($project) {
			$holder = $this->translator->translate($holder, $project);
		}
		
		return $holder;
	}
	
	public function buildFromProductAndPath(array $product, string $idmlPath)
	{
		self::checkFile($idmlPath);
		
		return new Holder($idmlPath, $product);
	}
	
	/**
	 * @param $idmlPath
	 * @throws FileNotFoundException
	 */
	private static function checkFile(string $idmlPath): void
	{
		if (!$idmlPath || !file_exists($idmlPath)) {
			throw new FileNotFoundException('Idml file do not exists anymore');
		}
		self::checkMimeType($idmlPath);
	}
	
	/**
	 * Checks the mimetype of the IDML file
	 *
	 * @param $location
	 * @throws \Exception
	 */
	private static function checkMimeType($location): void
	{
		$fileInfo = new \finfo(FILEINFO_MIME);
		if (!in_array($fileInfo->file($location), self::$arr_accepted_mime_types)) {
			throw new FileNotFoundException('No correct mimetype');
		}
	}
}
