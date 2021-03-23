<?php
namespace Dagou\Highcharts\ViewHelpers;

use Dagou\Highcharts\Interfaces\Source;
use Dagou\Highcharts\Source\Local;
use Dagou\Highcharts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class PluginViewHelper extends ScriptViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('plugin', 'string', 'HighCharts plugin to load.', TRUE);
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.', FALSE, FALSE);
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'highcharts.plugin'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if (!$this->arguments['src']) {
            if (!$this->arguments['disableSource']
                && ($className = ExtensionUtility::getSource())
                && is_subclass_of($className, Source::class)
            ) {
                $source = GeneralUtility::makeInstance($className);
            } else {
                $source = GeneralUtility::makeInstance(Local::class);
            }

            $this->tag->addAttribute('src', $source->getPlugin($this->arguments['plugin']));
        }

        $this->arguments['identifier'] .= '.'.$this->arguments['plugin'];

        return parent::render();
    }
}