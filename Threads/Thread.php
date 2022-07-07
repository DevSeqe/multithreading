<?php

namespace Codeage\Multithreading\Threads;

use Codeage\Multithreading\Reader\ThreadOutput;

class Thread
{
    private ?int $pid = null;

    private string $pidfile;

    private string $name;

    private ThreadOutput $threadOutput;

    public function __construct(string $pidfile, string $name, string $output)
    {
        $this->pidfile = $pidfile;
        $this->name = $name;
        $this->threadOutput = new ThreadOutput($output);
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function output(): ThreadOutput {
        return $this->threadOutput;
    }

    public function isRunning(): bool
    {
        if(!$this->pid){
            $pid = file_get_contents($this->pidfile);
            $this->pid = (int)$pid;
        }
        $result = shell_exec(sprintf("ps %d", $this->pid));
        if( count(preg_split("/\n/", $result)) > 2){
            return true;
        }

        return false;
    }

    public function stop(){
        $this->threadOutput->close();
        unlink($this->pidfile);
    }

}