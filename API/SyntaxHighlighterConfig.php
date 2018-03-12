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
 * SyntaxHighlighter config.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\API
 * @final
 */
final class SyntaxHighlighterConfig {

    /**
     * Blogger mode.
     *
     * @var boolean
     */
    private $bloggerMode = false;

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
    private $stripBrs = false;

    /**
     * Tag name.
     *
     * @var string
     */
    private $tagName = "pre";

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
        $script = "SyntaxHighlighter.config.";

        // Initialize the output.
        $output = [];

        // Check the blogger mode.
        if (null !== $this->bloggerMode) {
            $output[] = $script . "bloggerMode = " . StringUtility::parseBoolean($this->bloggerMode) . ";";
        }

        // Check the strip BRs.
        if (null !== $this->stripBrs) {
            $output[] = $script . "stripBrs = " . StringUtility::parseBoolean($this->stripBrs) . ";";
        }

        // Check the tag name.
        if (null !== $this->tagName) {
            $output[] = $script . "tagName = \"" . $this->tagName . "\";";
        }

        // Check the strings.
        if (null !== $this->strings) {
            $output[] = (string) $this->strings;
        }

        // Return the output.
        return implode("\n", $output);
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
     * @return SyntaxHighlighterConfig Returns the SyntaxHighlighter config.
     */
    public function setBloggerMode($bloggerMode = false) {
        $this->bloggerMode = $bloggerMode;
        return $this;
    }

    /**
     * Set the strings.
     *
     * @param SyntaxHighlighterStrings $strings The strings.
     * @return SyntaxHighlighterConfig Returns the SyntaxHighlighter config.
     */
    public function setStrings(SyntaxHighlighterStrings $strings = null) {
        $this->strings = $strings;
        return $this;
    }

    /**
     * Set the strip BRs.
     *
     * @param boolean $stripBrs The strip BRs.
     * @return SyntaxHighlighterConfig Returns the SyntaxHighlighter config.
     */
    public function setStripBrs($stripBrs = false) {
        $this->stripBrs = $stripBrs;
        return $this;
    }

    /**
     * Set the tag name.
     *
     * @param string $tagName The tag name.
     * @return SyntaxHighlighterConfig Returns the SyntaxHighlighter config.
     */
    public function setTagName($tagName = "pre") {
        $this->tagName = $tagName;
        return $this;
    }

}
