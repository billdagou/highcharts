<?php
namespace Dagou\Highcharts\Source;

use Dagou\Highcharts\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    const URL = '';

    /**
     * @param string $feature
     *
     * @return string
     */
    public function getJs(string $feature): string {
        return static::URL.$this->getJsBuild($feature);
    }

    /**
     * @param string $feature
     *
     * @return string
     */
    protected function getJsBuild(string $feature): string {
        switch ($feature) {
            case 'default':
                return 'highcharts.js';
            case '3d':
                return 'highcharts-3d.js';
            case 'more':
                return 'highcharts-more.js';
        }
    }
}