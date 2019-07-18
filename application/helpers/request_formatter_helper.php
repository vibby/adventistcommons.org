<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('build_uploaded_files_from_request'))
{
	function build_uploaded_files_from_request(array $files): \AdventistCommons\Domain\File\UploadedCollection
	{
		return \AdventistCommons\Domain\File\UploadedCollection::buildFromRequestsFiles($files);
	}
}
