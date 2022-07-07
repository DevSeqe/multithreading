<?php

namespace Codeage\Multithreading\Configuration;

class Configuration
{

    private string $pidfileLocation;

    private string $logfileLocation;

    /**
     * @return string
     */
    public function getPidfileLocation(): string
    {
        return $this->pidfileLocation;
    }

    /**
     * @param string $pidfileLocation
     * @return Configuration
     */
    public function setPidfileLocation(string $pidfileLocation): Configuration
    {
        $this->pidfileLocation = $pidfileLocation;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogfileLocation(): string
    {
        return $this->logfileLocation;
    }

    /**
     * @param string $logfileLocation
     * @return Configuration
     */
    public function setLogfileLocation(string $logfileLocation): Configuration
    {
        $this->logfileLocation = $logfileLocation;
        return $this;
    }



}