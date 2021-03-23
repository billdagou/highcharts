# TYPO3 Extension: HighCharts

EXT:highcharts allows you to use [HighCharts](https://www.highcharts.com/) in your extensions.

**The extension version only matches the HighCharts library version, it doesn't mean anything else.**

## How to use it
You can load the library in your Fluid template.

	<highcharts:js />

You can load some specific plugin, like `3d` or `more`.

    <highcharts:plugin plugin="3d" />

Or some specific module.

    <highcharts:module module="..." />

You can also load your own libraries.

    <highcharts:js src="..." />
    <highcharts:plugin plugin="..." src="..." />
    <highcharts:module module="..." src="... />

For more options please refer to &lt;f:asset.script&gt;.

To use other HighCharts source, you can register it in `ext_localconf.php` or `AdditionalConfiguration.php`.

    \Dagou\Highcharts\Utility\ExtensionUtility::registerSource(\Dagou\Highcharts\Source\HighCharts::class);

You may want to disable the other source and use the local one instead in some cases, for example saving page as PDF by [WKHtmlToPdf](https://wkhtmltopdf.org/).

    <highcharts:js disableSource="true" />
    <highcharts:plugin plugin="..." disableSource="true" />
    <highcharts:module module="..." disableSource="true" />