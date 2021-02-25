<?php
namespace Dagou\Highcharts\Traits;

trait Package {
    /**
     * @var array
     */
    protected $packages = [
        'default',
        '3d',
        'more',
    ];

    /**
     * @param string $package
     *
     * @return bool
     */
    protected function isValidPackage(string $package): bool {
        return in_array($package, $this->packages);
    }
}