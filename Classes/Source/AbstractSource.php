<?php
namespace Dagou\Highcharts\Source;

use Dagou\Highcharts\Interfaces\Source;
use TYPO3\CMS\Core\SingletonInterface;

abstract class AbstractSource implements Source, SingletonInterface {
    const URL = '';

    /**
     * @return string
     */
    public function getJs(): string {
        return static::URL.$this->getJsBuild();
    }

    /**
     * @return string
     */
    protected function getJsBuild(): string {
        return 'highcharts.js';
    }

    /**
     * @param string $plugin
     *
     * @return string
     */
    public function getPlugin(string $plugin): string {
        return static::URL.'highcharts-'.$plugin.'.js';
    }

    /**
     * @param string $module
     *
     * @return string
     */
    public function getModule(string $module): string {
        return static::URL.'modules/'.$module.'.js';
    }
}