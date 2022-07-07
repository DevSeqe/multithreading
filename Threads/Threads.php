<?php

namespace Codeage\Multithreading\Threads;

use Codeage\Multithreading\Exceptions\ThreadDoesntExistException;

class Threads
{
    /**
     * @var Thread[]
     */
    private array $threads = [];

    /**
     * @return Thread[]
     */
    public function all(): array {
        return $this->threads;
    }

    public function add(string $name, Thread $thread){
        if($this->has($name)) throw new ThreadDoesntExistException($name);
        $this->threads[$name] = $thread;
    }

    /**
     * @param string $name
     *
     * @return bool
     */
    public function has(string $name): bool{
        return (isset($this->threads[$name]));
    }

    /**
     * @return bool
     */
    public function empty(): bool {
        return empty($this->threads);
    }

    /**
     * @param string $name
     *
     * @return Thread
     *
     * @throws ThreadDoesntExistException
     */
    public function get(string $name){
        if(!$this->has($name)) throw new ThreadDoesntExistException($name);

        return $this->threads[$name];
    }

    public function remove(string $name){
        if(!$this->has($name)) throw new ThreadDoesntExistException($name);

        unset($this->threads[$name]);
    }
}