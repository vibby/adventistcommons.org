<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('build_uploaded_files_from_request'))
{
	function build_uploaded_files_from_request(array $files): \AdventistCommons\Domain\File\UploadedCollection
	{
		$collection = new \AdventistCommons\Domain\File\UploadedCollection;
		foreach ($files as $fileInfo) {
			if ($file = \AdventistCommons\Domain\File\UploadedBuilder::build($fileInfo)) {
				$collection[] = $file;
			}
		}
		
		return $collection;
	}
}
