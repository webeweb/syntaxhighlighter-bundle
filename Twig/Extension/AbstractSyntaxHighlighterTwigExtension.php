<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension;

use Twig_Extension;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterDefaults;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;
use WBW\Library\Core\Utility\Argument\StringUtility;

/**
 * Abstract SyntaxHighlighter Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension
 * @abstract
 */
abstract class AbstractSyntaxHighlighterTwigExtension extends Twig_Extension {

    /**
     * Constructor.
     */
    protected function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Displays a SyntaxHighlighter config.
     *
     * @param SyntaxHighlighterConfig $config The SyntaxHighlighter configuration.
     * @return string Returns the SyntaxHighlighter config.
     */
    protected function syntaxHighlighterConfig(SyntaxHighlighterConfig $config) {

        // Initialize the template.
        $template = [];

        $template[] = "SyntaxHighlighter.config.bloggerMode = " . StringUtility::parseBoolean($config->getBloggerMode()) . ";";
        $template[] = "SyntaxHighlighter.config.stripBrs = " . StringUtility::parseBoolean($config->getStripBrs()) . ";";
        $template[] = "SyntaxHighlighter.config.tagName = \"" . $config->getTagName() . "\";";
        if (null !== $config->getStrings()) {
            $template[] = $this->syntaxHighlighterStrings($config->getStrings());
        }

        // Return the HTML.
        return implode("\n", $template);
    }

    /**
     * Displays a SyntaxHighlighter content.
     *
     * @param string $language The language.
     * @param string $content The content.
     * @return string Returns the SyntaxHightlighter content.
     */
    protected function syntaxHighlighterContent($tag, $language, $content) {

        // Initialize the template.
        $template = "<%tag% %attributes%>\n%innerHTML%\n</%tag%>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["class"][] = "brush:";
        $attributes["class"][] = null !== $language ? $language : "php";

        // Return the HTML.
        return StringUtility::replace($template, ["%tag%", "%attributes%", "%innerHTML%"], [$tag, StringUtility::parseArray($attributes), htmlentities($content)]);
    }

    /**
     * Displays a SyntaxHighlighter defaults.
     *
     * @param SyntaxHighlighterDefaults $defaults The SyntaxHighlighter defaults.
     * @return string Returns the SyntaxHighlighter defaults.
     */
    protected function syntaxHighlighterDefaults(SyntaxHighlighterDefaults $defaults) {

        // Initialize the template.
        $template = [];

        $template[] = "SyntaxHighlighter.defaults['auto-links'] = " . StringUtility::parseBoolean($defaults->getAutoLinks()) . ";";
        $template[] = "SyntaxHighlighter.defaults['class-name'] = \"" . $defaults->getClassName() . "\";";
        $template[] = "SyntaxHighlighter.defaults['collapse'] = " . StringUtility::parseBoolean($defaults->getCollapse()) . ";";
        $template[] = "SyntaxHighlighter.defaults['first-line'] = " . $defaults->getFirstLine() . ";";
        $template[] = "SyntaxHighlighter.defaults['gutter'] = " . StringUtility::parseBoolean($defaults->getGutter()) . ";";
        $template[] = "SyntaxHighlighter.defaults['highlight'] = [" . implode(",", $defaults->getHighlight()) . "];";
        $template[] = "SyntaxHighlighter.defaults['html-script'] = " . StringUtility::parseBoolean($defaults->getHtmlScript()) . ";";
        $template[] = "SyntaxHighlighter.defaults['smart-tabs'] = " . StringUtility::parseBoolean($defaults->getSmartTabs()) . ";";
        $template[] = "SyntaxHighlighter.defaults['tab-size'] = " . $defaults->getTabSize() . ";";
        $template[] = "SyntaxHighlighter.defaults['toolbar'] = " . StringUtility::parseBoolean($defaults->getToolbar()) . ";";

        // Return the HTML.
        return implode("\n", $template);
    }

    /**
     * Displays a SyntaxHighlighter strings.
     *
     * @param SyntaxHighlighterStrings $strings The SyntaxHighlighter strings.
     * @return string Returns the SyntaxHighlighter strings.
     */
    protected function syntaxHighlighterStrings(SyntaxHighlighterStrings $strings) {

        // Initialize the template.
        $template = [];

        $template[] = "SyntaxHighlighter.config.strings.alert = \"" . $strings->getAlert() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.brushNotHtmlScript = \"" . $strings->getBrushNotHtmlScript() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.copyToClipboard = \"" . $strings->getCopyToClipboard() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.copyToClipboardConfirmation = \"" . $strings->getCopyToClipboardConfirmation() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.expandSource = \"" . $strings->getExpandSource() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.help = \"" . $strings->getHelp() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.noBrush = \"" . $strings->getNoBrush() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.print = \"" . $strings->getPrint() . "\";";
        $template[] = "SyntaxHighlighter.config.strings.viewSource = \"" . $strings->getViewSource() . "\";";

        // Return the HTML.
        return implode("\n", $template);
    }

}
