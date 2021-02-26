<?php
namespace Dagou\Highcharts\ViewHelpers;

use Dagou\Highcharts\Interfaces\Source;
use Dagou\Highcharts\Source\Local;
use Dagou\Highcharts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class LoadModuleViewHelper extends ScriptViewHelper {
    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('module', 'string', 'HighCharts module to load.', TRUE);
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.', FALSE, FALSE);
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'highcharts.module'
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

            $this->tag->addAttribute('src', $source->getModule($this->arguments['module']));
        }

        $this->arguments['identifier'] .= '.'.$this->arguments['module'];

        return parent::render();
    }
}