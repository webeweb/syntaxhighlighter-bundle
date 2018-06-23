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
 * SyntaxHighlighter config.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\API
 */
class SyntaxHighlighterConfig {

    /**
     * Blogger mode.
     *
     * @var boolean
     */
    private $bloggerMode;

    /**
     * Strings
     *
     * @var SyntaxHighlighterStrings
     */
    private $strings;

    /**
     * Strip BRs.
     *
     * @var boolean
     */
    private $stripBrs;

    /**
     * Tag name.
     *
     * @var string
     */
    private $tagName;

    /**
     * Constructor.
     */
    public function __construct() {
        $this->setBloggerMode(false);
        $this->setStripBrs(false);
        $this->setTagName("pre");
    }

    /**
     * Get the blogger mode.
     *
     * @return boolean Returns the blogger mode.
     */
    public function getBloggerMode() {
        return $this->bloggerMode;
    }

    /**
     * Get the strings.
     *
     * @return SyntaxHighlighterStrings Returns the strings
     */
    public function getStrings() {
        return $this->strings;
    }

    /**
     * Get the strip BRs.
     *
     * @return boolean Returns the strip BRs.
     */
    public function getStripBrs() {
        return $this->stripBrs;
    }

    /**
     * Get the tag name.
     *
     * @return string Returns the tag name.
     */
    public function getTagName() {
        return $this->tagName;
    }

    /**
     * Set the blogger mode.
     *
     * @param boolean $bloggerMode The blogger mode.
     * @return SyntaxHighlighterConfig Returns this SyntaxHighlighter config.
     */
    public function setBloggerMode($bloggerMode) {
        $this->bloggerMode = $bloggerMode;
        return $this;
    }

    /**
     * Set the strings.
     *
     * @param SyntaxHighlighterStrings $strings The strings.
     * @return SyntaxHighlighterConfig Returns this SyntaxHighlighter config.
     */
    public function setStrings(SyntaxHighlighterStrings $strings = null) {
        $this->strings = $strings;
        return $this;
    }

    /**
     * Set the strip BRs.
     *
     * @param boolean $stripBrs The strip BRs.
     * @return SyntaxHighlighterConfig Returns this SyntaxHighlighter config.
     */
    public function setStripBrs($stripBrs) {
        $this->stripBrs = $stripBrs;
        return $this;
    }

    /**
     * Set the tag name.
     *
     * @param string $tagName The tag name.
     * @return SyntaxHighlighterConfig Returns this SyntaxHighlighter config.
     */
    public function setTagName($tagName) {
        $this->tagName = $tagName;
        return $this;
    }

}
