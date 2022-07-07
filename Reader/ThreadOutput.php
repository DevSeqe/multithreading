<?php

namespace Codeage\Multithreading\Reader;

class ThreadOutput
{

    private string $outputFile;

    public function __construct($output)
    {
        $this->outputFile = $output;
    }

    public function read(): array {
        $output = [];
        if(!file_exists($this->outputFile)) return $output;

        $log = explode("\n", file_get_contents($this->outputFile));
        $output = array_map(fn($line): string => trim($line), $log);
        file_put_contents($this->outputFile, null);

        return array_filter($output);
    }

    public function close(){
        unlink($this->outputFile);
    }

}