<?php
namespace Dagou\Highcharts\ViewHelpers;

use Dagou\Highcharts\Interfaces\Source;
use Dagou\Highcharts\Source\Local;
use Dagou\Highcharts\Traits\Feature;
use Dagou\Highcharts\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\ViewHelpers\Asset\ScriptViewHelper;

class LoadViewHelper extends ScriptViewHelper {
    use Feature;

    public function initializeArguments(): void {
        parent::initializeArguments();

        $this->registerArgument('feature', 'string', 'HighCharts feature to load.', FALSE, 'default');
        $this->registerArgument('disableSource', 'boolean', 'Disable Source.', FALSE, FALSE);
        $this->overrideArgument(
            'identifier',
            'string',
            'Use this identifier within templates to only inject your JS once, even though it is added multiple times.',
            FALSE,
            'highcharts'
        );
    }

    /**
     * @return string
     */
    public function render(): string {
        if ($this->isValidFeature($this->arguments['feature'])) {
            if (!$this->arguments['src']) {
                if (!$this->arguments['disableSource']
                    && ($className = ExtensionUtility::getSource())
                    && is_subclass_of($className, Source::class)
                ) {
                    $source = GeneralUtility::makeInstance($className);
                } else {
                    $source = GeneralUtility::makeInstance(Local::class);
                }

                $this->tag->addAttribute('src', $source->getJs($this->arguments['feature']));
            }

            $this->arguments['identifier'] .= '.'.$this->arguments['feature'];

            return parent::render();
        }

        return '';
    }
}