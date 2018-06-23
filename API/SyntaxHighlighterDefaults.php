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

/**
 * SyntaxHighlighter defaults.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\API
 */
class SyntaxHighlighterDefaults {

    /**
     * Auto links.
     *
     * @var boolean
     */
    private $autoLinks;

    /**
     * Class name.
     *
     * @var string
     */
    private $className;

    /**
     * Collapse.
     *
     * @var boolean
     */
    private $collapse;

    /**
     * First line.
     *
     * @var integer
     */
    private $firstLine;

    /**
     * Gutter.
     *
     * @var boolean
     */
    private $gutter;

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
    private $htmlScript;

    /**
     * Samrt tabs.
     *
     * @var boolean
     */
    private $smartTabs;

    /**
     * Tab size.
     *
     * @var integer
     */
    private $tabSize;

    /**
     * Toolbar.
     *
     * @var boolean
     */
    private $toolbar;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setAutoLinks(true);
        $this->setClassName("");
        $this->setCollapse(false);
        $this->setFirstLine(1);
        $this->setGutter(true);
        $this->setHighlight([]);
        $this->setHtmlScript(false);
        $this->setSmartTabs(true);
        $this->setTabSize(4);
        $this->setToolbar(true);
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
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setAutoLinks($autoLinks) {
        $this->autoLinks = $autoLinks;
        return $this;
    }

    /**
     * Set the class name.
     *
     * @param string $className The class name.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setClassName($className) {
        $this->className = $className;
        return $this;
    }

    /**
     * Set the collapse.
     *
     * @param boolean $collapse The collapse.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setCollapse($collapse) {
        $this->collapse = $collapse;
        return $this;
    }

    /**
     * Set the first line.
     *
     * @param integer $firstLine The first line.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setFirstLine($firstLine) {
        $this->firstLine = $firstLine;
        return $this;
    }

    /**
     * Set the gutter.
     *
     * @param boolean $gutter The gutter.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setGutter($gutter) {
        $this->gutter = $gutter;
        return $this;
    }

    /**
     * Set the highlight.
     *
     * @param array $highlight The highlight.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.

     */
    public function setHighlight(array $highlight) {
        $this->highlight = $highlight;
        return $this;
    }

    /**
     * Set the HTML script.
     *
     * @param boolean $htmlScript The HTML script.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.

     */
    public function setHtmlScript($htmlScript) {
        $this->htmlScript = $htmlScript;
        return $this;
    }

    /**
     * Set the smart tabs.
     *
     * @param boolean $smartTabs The smart tabs.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.
     */
    public function setSmartTabs($smartTabs) {
        $this->smartTabs = $smartTabs;
        return $this;
    }

    /**
     * Set the tab size.
     *
     * @param integer $tabSize The tab size.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.

     */
    public function setTabSize($tabSize) {
        $this->tabSize = $tabSize;
        return $this;
    }

    /**
     * Set the toolbar.
     *
     * @param boolean $toolbar The toolbar.
     * @return SyntaxHighlighterDefaults Returns this SyntaxHighlighter defaults.

     */
    public function setToolbar($toolbar) {
        $this->toolbar = $toolbar;
        return $this;
    }

}
