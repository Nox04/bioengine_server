<?php

namespace App\Helpers;

use Symfony\Component\Process\Process;

class Biometrics
{
    public static function match($document)
    {
        $process = new Process([
            storage_path().'/app/run.sh',
            storage_path().'/app/',
            'match',
            $document,
            storage_path().'/app/cache/$document.bmp',
        ]);

        $process->run();
        return $process;
    }

    public static function enroll($document, $position)
    {
        $process = new Process([
            storage_path().'/app/run.sh',
            storage_path().'/app/',
            'enroll',
            $document,
            storage_path().'/app/cache/$document.bmp',
            $position,
        ]);

        $process->run();
        return $process;
    }
}
