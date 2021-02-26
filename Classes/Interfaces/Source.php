<?php
namespace Dagou\Highcharts\Interfaces;

interface Source {
    const VERSION = '9.0.1';

    /**
     * @param string $feature
     *
     * @return string
     */
    public function getJs(string $feature): string;
}