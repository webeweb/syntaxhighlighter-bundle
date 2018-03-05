<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\API;

use WBW\Library\Core\Utility\StringUtility;

/**
 * SyntaxHighlighter defaults.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\API
 * @final
 */
final class SyntaxHighlighterDefaults {

    /**
     * Auto links.
     *
     * @var boolean
     */
    private $autoLinks = true;

    /**
     * Class name.
     *
     * @var string
     */
    private $className = "";

    /**
     * Collapse.
     *
     * @var boolean
     */
    private $collapse = false;

    /**
     * First line.
     *
     * @var integer
     */
    private $firstLine = 1;

    /**
     * Gutter.
     *
     * @var boolean
     */
    private $gutter = true;

    /**
     * Highlight.
     *
     * @var array
     */
    private $highlight;

    /**
     * HTML script.
     *
     * @var boolean
     */
    private $htmlScript = false;

    /**
     * Samrt tabs.
     *
     * @var boolean
     */
    private $smartTabs = true;

    /**
     * Tab size.
     *
     * @var integer
     */
    private $tabSize = 4;

    /**
     * Toolbar.
     *
     * @var boolean
     */
    private $toolbar = true;

    /**
     * Constructor.
     */
    public function __construct() {
        // NOTHING TO DO.
    }

    /**
     * Convert into a string representing this instance.
     *
     * @return string Returns a string representing this instance.
     */
    public function __toString() {

        // Initialize.
        $script = "SyntaxHighlighter.defaults";

        // Initialize the output.
        $output = [];

        // Check the auto links.
        if (null !== $this->autoLinks) {
            $output[] = $script . "['auto-links'] = " . StringUtility::parseBoolean($this->autoLinks) . ";";
        }

        // Check the class name.
        if (null !== $this->className) {
            $output[] = $script . "['class-name'] = \"" . $this->className . "\";";
        }

        // Check the collapse.
        if (null !== $this->collapse) {
            $output[] = $script . "['collapse'] = " . StringUtility::parseBoolean($this->collapse) . ";";
        }

        // Check the first line.
        if (null !== $this->firstLine) {
            $output[] = $script . "['first-line'] = " . $this->firstLine . ";";
        }

        // Check the gutter.
        if (null !== $this->gutter) {
            $output[] = $script . "['gutter'] = " . StringUtility::parseBoolean($this->gutter) . ";";
        }

        // Check the highlight.
        if (null !== $this->highlight) {
            $output[] = $script . "['highlight'] = [" . implode(", ", $this->highlight) . "];";
        }

        // Check the HTML script.
        if (null !== $this->htmlScript) {
            $output[] = $script . "['html-script'] = " . StringUtility::parseBoolean($this->htmlScript) . ";";
        }

        // Check the smart tabs.
        if (null !== $this->smartTabs) {
            $output[] = $script . "['smart-tabs'] = " . StringUtility::parseBoolean($this->smartTabs) . ";";
        }

        // Check the tab size.
        if (null !== $this->tabSize) {
            $output[] = $script . "['tab-size'] = " . $this->tabSize . ";";
        }

        // Check the toolbar.
        if (null !== $this->toolbar) {
            $output[] = $script . "['toolbar'] = " . StringUtility::parseBoolean($this->toolbar) . ";";
        }

        // Return the output.
        return implode("\n", $output);
    }

    /**
     * Get the auto links.
     *
     * @return boolean Returns the auto links.
     */
    public function getAutoLinks() {
        return $this->autoLinks;
    }

    /**
     * Get the class name.
     *
     * @return string Returns the class name.
     */
    public function getClassName() {
        return $this->className;
    }

    /**
     * Get the collapse.
     *
     * @return boolean Returns the collapse.
     */
    public function getCollapse() {
        return $this->collapse;
    }

    /**
     * Get the first line.
     *
     * @return integer Returns the first line.
     */
    public function getFirstLine() {
        return $this->firstLine;
    }

    /**
     * Get the gutter.
     *
     * @return boolean Returns the gutter.
     */
    public function getGutter() {
        return $this->gutter;
    }

    /**
     * Get the highlight.
     *
     * @return array Returns the hightlight.
     */
    public function getHighlight() {
        return $this->highlight;
    }

    /**
     * Get the HTML script.
     *
     * @return boolean Returns the HTML script.
     */
    public function getHtmlScript() {
        return $this->htmlScript;
    }

    /**
     * Get the smart tabs.
     *
     * @return boolean Returns the smart tabs.
     */
    public function getSmartTabs() {
        return $this->smartTabs;
    }

    /**
     * Get the tab size.
     *
     * @return integer Returns the tab size.
     */
    public function getTabSize() {
        return $this->tabSize;
    }

    /**
     * Get the toolbar.
     *
     * @return boolean Returns the toolbar.
     */
    public function getToolbar() {
        return $this->toolbar;
    }

    /**
     * Set the auto links.
     *
     * @param boolean $autoLinks The auto links.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setAutoLinks($autoLinks = true) {
        $this->autoLinks = $autoLinks;
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $className The class name.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setClassName($className = "") {
        $this->className = $className;
        return $this;
    }

    /**
     * Set the collapse.
     *
     * @param boolean $collapse The collapse.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setCollapse($collapse = false) {
        $this->collapse = $collapse;
        return $this;
    }

    /**
     * Set the first line.
     *
     * @param integer $firstLine The first line.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setFirstLine($firstLine = 1) {
        $this->firstLine = $firstLine;
        return $this;
    }

    /**
     * Set the gutter.
     *
     * @param boolean $gutter The gutter.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setGutter($gutter = true) {
        $this->gutter = $gutter;
        return $this;
    }

    /**
     * Set the highlight.
     *
     * @param array $highlight The Highlight.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.

     */
    public function setHighlight(array $highlight = null) {
        $this->highlight = $highlight;
        return $this;
    }

    /**
     * Set the HTML script.
     *
     * @param boolean $htmlScript The HTML script.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.

     */
    public function setHtmlScript($htmlScript = false) {
        $this->htmlScript = $htmlScript;
        return $this;
    }

    /**
     * Set the smart tabs.
     *
     * @param boolean $smartTabs The smart tabs.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.
     */
    public function setSmartTabs($smartTabs = true) {
        $this->smartTabs = $smartTabs;
        return $this;
    }

    /**
     * Set the tab size.
     *
     * @param integer $tabSize The tab size.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.

     */
    public function setTabSize($tabSize = 4) {
        $this->tabSize = $tabSize;
        return $this;
    }

    /**
     * Set the toolbar.
     *
     * @param boolean $toolbar The toolbar.
     * @return SyntaxHighlighterDefaults Returns the SyntaxHighlighter defaults.

     */
    public function setToolbar($toolbar = true) {
        $this->toolbar = $toolbar;
        return $this;
    }

}
