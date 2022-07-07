<?php

namespace Codeage\Multithreading\Reader;

use Codeage\Multithreading\Configuration\Configuration;

class DirectoryScanner
{

    public function setup(Configuration $configuration){
        if (!file_exists($configuration->getPidfileLocation())) {
            mkdir(getcwd().'/processes', 0777, true);
        }
        if (!file_exists($configuration->getLogfileLocation())) {
            mkdir(getcwd().'/processes/logs', 0777, true);
        }
    }

}