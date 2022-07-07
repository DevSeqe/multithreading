<?php

namespace Codeage\Multithreading;

use Codeage\Multithreading\Configuration\Configuration;
use Codeage\Multithreading\Reader\DirectoryScanner;
use Codeage\Multithreading\Threads\Thread;
use Codeage\Multithreading\Threads\Threads;

class MultithreadingProcessor
{
    private DirectoryScanner $directoryScanner;

    private Threads $threads;

    public function __construct(Configuration $configuration)
    {
        $this->directoryScanner = new DirectoryScanner();
        $this->directoryScanner->setup($configuration);

        $this->threads = new Threads();
    }

    public function startThread(string $name, string $cmd): void {
        $output = sprintf('%s/processes/logs/%s.log', getcwd(), $name);
        $pidfile = sprintf('%s/processes/%s.pid', getcwd(), $name);

        exec(sprintf("%s > %s 2>&1 & echo $! >> %s", $cmd, $output, $pidfile));

        $thread = new Thread($pidfile, $name, $output);
        $this->threads->add($name, $thread);
    }

    public function finishThread(Thread $thread): void{
        $thread->stop();
        $this->threads()->remove($thread->getName());
    }

    public function threads(): Threads {
        return $this->threads;
    }
}