<?php

namespace AdventistCommons\Domain\File;

class Uploaded extends File
{
	protected $originalName;
	protected $statusCode;

	public function __construct($path, $mimeType, $size, $name, $errorCode)
	{
		parent::__construct($path);
		$this->mimeType = $mimeType;
		$this->size = $size;

		$this->originalName = $name;
		$this->statusCode = $errorCode;
		
		$this->extension = File::ExtractExtension($name);
	}

	public function getErrorMessage()
	{
		switch ($this->statusCode) {
			case UPLOAD_ERR_OK:
				return null;
			case UPLOAD_ERR_INI_SIZE:
				return 'File too big according to server requirements';
			case UPLOAD_ERR_FORM_SIZE:
				return 'File too big according to form requirements';
			case UPLOAD_ERR_PARTIAL:
				return 'The file transfer was not completed';
			case UPLOAD_ERR_NO_FILE:
				return 'No file given';
			case UPLOAD_ERR_NO_TMP_DIR:
				return 'No temporary path defined to write the file';
			case UPLOAD_ERR_CANT_WRITE:
				return 'File cannot be written in temporary path';
			case UPLOAD_ERR_EXTENSION:
				return 'An extension on the server had an error treating the file';
			default :
				throw new \Exception('Unexpected error code from uploaded file');
		}
	}
	
	public function makeDefinitive(string $uploadsDirectory, $definitiveFileName = null)
	{
		$definitiveFileName =
			$definitiveFileName ??
			sprintf('%s.%s', uniqid(rand(), true), $this->getExtension());
		$definitivePath = $uploadsDirectory.'/'.$definitiveFileName;
		copy($this->path, $definitivePath);
		
		return new File($definitiveFileName);
	}
}
