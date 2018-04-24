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

use WBW\Bundle\SyntaxHighlighterBundle\Encoder\SyntaxHighlighterEncoder;

/**
 * SyntaxHightlighter strings.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\API
 */
class SyntaxHighlighterStrings {

    /**
     * Alert.
     *
     * @var string
     */
    private $alert = "SyntaxHighlighter\n\n";

    /**
     * Brush not HTML script.
     *
     * @var string
     */
    private $brushNotHtmlScript = "Brush wasn't made for html-script option:";

    /**
     * Copy to clipboard.
     *
     * @var string
     */
    private $copyToClipboard = "copy to clipboard";

    /**
     * Copy to clipboard confirmation.
     *
     * @var string
     */
    private $copyToClipboardConfirmation = "The code is in your clipboard now";

    /**
     * Expand source.
     *
     * @var string
     */
    private $expandSource = "+ expand source";

    /**
     * Help.
     *
     * @var string
     */
    private $help = "?";

    /**
     * No brush.
     *
     * @var string
     */
    private $noBrush = "Can't find brush for:";

    /**
     * Print.
     *
     * @var string
     */
    private $print = "print";

    /**
     * View source.
     *
     * @var string
     */
    private $viewSource = "view source";

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
        $script = "SyntaxHighlighter.config.strings.";

        // Initialize the output.
        $output = [];

        SyntaxHighlighterEncoder::stringToString($this->alert, $output, $script . "alert = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->brushNotHtmlScript, $output, $script . "brushNotHtmlScript = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->copyToClipboard, $output, $script . "copyToClipboard = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->copyToClipboardConfirmation, $output, $script . "copyToClipboardConfirmation = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->expandSource, $output, $script . "expandSource = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->help, $output, $script . "help = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->noBrush, $output, $script . "noBrush = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->print, $output, $script . "print = \"", "\";");
        SyntaxHighlighterEncoder::stringToString($this->viewSource, $output, $script . "viewSource = \"", "\";");

        // Return the output.
        return implode("\n", $output);
    }

    /**
     * Get the alert.
     *
     * @return string Returns the alert.
     */
    public function getAlert() {
        return $this->alert;
    }

    /**
     * Get the brush not HTML script.
     *
     * @return string Returns the brush not HTML script.
     */
    public function getBrushNotHtmlScript() {
        return $this->brushNotHtmlScript;
    }

    /**
     * Get the copy to clipboard.
     *
     * @return string Returns the copy to clipboard.
     */
    public function getCopyToClipboard() {
        return $this->copyToClipboard;
    }

    /**
     * Get the copy to clipboard confirmation.
     *
     * @return string Returns the copy to clipboard confirmation.
     */
    public function getCopyToClipboardConfirmation() {
        return $this->copyToClipboardConfirmation;
    }

    /**
     * Get the expand source.
     *
     * @return string Returns the expand source.
     */
    public function getExpandSource() {
        return $this->expandSource;
    }

    /**
     * Get the help.
     *
     * @return string Returns the help.
     */
    public function getHelp() {
        return $this->help;
    }

    /**
     * Get the no brush.
     *
     * @return string Returns the no brush.
     */
    public function getNoBrush() {
        return $this->noBrush;
    }

    /**
     * Get the print.
     *
     * @return string Returns the print.
     */
    public function getPrint() {
        return $this->print;
    }

    /**
     * Get the view source.
     *
     * @return string Returns the view source.
     */
    public function getViewSource() {
        return $this->viewSource;
    }

    /**
     * Set the alert.
     *
     * @param string $alert The alert.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setAlert($alert = "SyntaxHighlighter\n\n") {
        $this->alert = $alert;
        return $this;
    }

    /**
     * Set the brush not HTML script.
     *
     * @param string $brushNotHtmlScript The brush not HTML script.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setBrushNotHtmlScript($brushNotHtmlScript = "Brush wasn't made for html-script option:") {
        $this->brushNotHtmlScript = $brushNotHtmlScript;
        return $this;
    }

    /**
     * Set the copy to clipboard.
     *
     * @param string $copyToClipboard The copy to clipboard.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setCopyToClipboard($copyToClipboard = "copy to clipboard") {
        $this->copyToClipboard = $copyToClipboard;
        return $this;
    }

    /**
     * Set the copy to clipboard confirmation.
     *
     * @param string $copyToClipboardConfirmation The copy to clipboard confirmation.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setCopyToClipboardConfirmation($copyToClipboardConfirmation = "The code is in your clipboard now") {
        $this->copyToClipboardConfirmation = $copyToClipboardConfirmation;
        return $this;
    }

    /**
     * Set the expand source.
     *
     * @param string $expandSource The expand source.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setExpandSource($expandSource = "+ expand source") {
        $this->expandSource = $expandSource;
        return $this;
    }

    /**
     * Set the help.
     *
     * @param string $help The help.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setHelp($help = "?") {
        $this->help = $help;
        return $this;
    }

    /**
     * Set the no brush.
     *
     * @param string $noBrush The no brush.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setNoBrush($noBrush = "Can't find brush for:") {
        $this->noBrush = $noBrush;
        return $this;
    }

    /**
     * Set the print.
     *
     * @param string $print The print.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setPrint($print = "print") {
        $this->print = $print;
        return $this;
    }

    /**
     * Set the view source.
     *
     * @param string $viewSource The view source.
     * @return SyntaxHighlighterStrings Returns the SyntaxHighlighter strings.
     */
    public function setViewSource($viewSource = "view source") {
        $this->viewSource = $viewSource;
        return $this;
    }

}
