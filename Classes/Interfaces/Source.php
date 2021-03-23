<?php
namespace Dagou\Highcharts\Interfaces;

interface Source {
    const VERSION = '9.0.1';

    /**
     * @return string
     */
    public function getJs(): string;

    /**
     * @param string $plugin
     *
     * @return string
     */
    public function getPlugin(string $plugin): string;

    /**
     * @param string $module
     *
     * @return string
     */
    public function getModule(string $module): string;
}