
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('build_uploaded_files_from_request'))
{
	function build_uploaded_files_from_request(array $files): \AdventistCommons\Domain\Request\UploadedCollection
	{
		return \AdventistCommons\Domain\Request\UploadedCollection::buildFromRequestsFiles($files);
	}
	
	function build_entity_params_from_request(array $params): \AdventistCommons\Domain\Request\ParameterCollection
	{
		return \AdventistCommons\Domain\Request\ParameterCollection::buildFromRequestsparams($params);
	}
}
