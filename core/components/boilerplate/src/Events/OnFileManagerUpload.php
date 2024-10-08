<?php

namespace Boshnik\Boilerplate\Events;

/**
 * class OnFileManagerUpload
 */
class OnFileManagerUpload extends Event
{
    public function run()
    {
        $error_msg = 'You cannot upload files to the root partition.';
        $source = & $scriptProperties['source'];
        if (empty($source)) return;

        if ($source && !$source->hasErrors()) {
            if ($directory === '/' && $files) {
                foreach ($files as $file) {
                    $path = $directory . $source->fileHandler->sanitizePath($file['name']);
                    $source->removeObject($path);
                }
                $source->addError('path', $error_msg);
            }
        }
    }
}