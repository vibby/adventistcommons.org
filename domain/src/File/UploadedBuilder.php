<?php

namespace AdventistCommons\Domain\File;

/**
 * @author    Vincent Beauvivre <vibea@smile.fr>
 * @copyright 2019
 */
class UploadedBuilder
{
    const KEY_FOR_PATH      = 'tmp_name';
    const KEY_FOR_MIME_TYPE = 'type';
    const KEY_FOR_SIZE      = 'size';
    const KEY_FOR_NAME      = 'name';
    const KEY_FOR_ERROR     = 'error';

    public static function build(array $entry)
    {
        if ($entry['error'] === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        return new Uploaded(
            $entry[self::KEY_FOR_PATH],
            $entry[self::KEY_FOR_MIME_TYPE],
            $entry[self::KEY_FOR_SIZE],
            $entry[self::KEY_FOR_NAME],
            $entry[self::KEY_FOR_ERROR]
        );
    }
}
