<?php
namespace Dagou\Highcharts\Source;

use Dagou\Highcharts\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    const URL = '';

    /**
     * @param string $package
     *
     * @return string
     */
    public function getJs(string $package): string {
        return static::URL.$this->getJsBuild($package);
    }

    /**
     * @param string $package
     *
     * @return string
     */
    protected function getJsBuild(string $package): string {
        switch ($package) {
            case 'default':
                return 'highcharts.js';
            case '3d':
                return 'highcharts-3d.js';
            case 'more':
                return 'highcharts-more.js';
        }
    }
}