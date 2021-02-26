<?php
namespace Dagou\Highcharts\Traits;

trait Feature {
    /**
     * @var array
     */
    protected $feature = [
        'default',
        '3d',
        'more',
    ];

    /**
     * @param string $feature
     *
     * @return bool
     */
    protected function isValidFeature(string $feature): bool {
        return in_array($feature, $this->feature);
    }
}