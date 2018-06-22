<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Provider;

use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;

/**
 * SyntaxHighlighter strings provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Provider
 */
class SyntaxHighlighterStringsProvider {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.bundle.syntaxhighlighterbundle.provider.syntaxhighlighterstrings";

    /**
     * Translator.
     *
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * Get a SyntaxHighlighter strings.
     *
     * @return SyntaxHighlighterStrings Returns teh SyntaxHighlighter strings.
     */
    public function getSyntaxHighlighterStrings() {

        // Initialize the SyntaxHighlighter strings.
        $strings = new SyntaxHighlighterStrings();
        $strings->setAlert($this->getTranslator()->trans("strings.alert", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setBrushNotHtmlScript($this->getTranslator()->trans("strings.brush_no_html_script", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setCopyToClipboard($this->getTranslator()->trans("strings.copy_to_clipboard", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setCopyToClipboardConfirmation($this->getTranslator()->trans("strings.copy_to_clipboard_confirmation", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setExpandSource($this->getTranslator()->trans("strings.expand_source", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setHelp($this->getTranslator()->trans("strings.help", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setNoBrush($this->getTranslator()->trans("strings.no_brush", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setPrint($this->getTranslator()->trans("strings.print", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));
        $strings->setViewSource($this->getTranslator()->trans("strings.view_source", [], "SyntaxHighlighterBundle", $this->getTranslator()->getLocale()));

        // Return the SyntaxHighlighter strings.
        return $strings;
    }

    /**
     * Get the translator.
     *
     * @return TranslatorInterface Returns the translator.
     */
    public function getTranslator() {
        return $this->translator;
    }

    /**
     * Set the translator.
     *
     * @param TranslatorInterafce $translator The translator.
     * @return SyntaxHighlighterStringsProvider Returns this SyntaxHighlighter strings provider.
     */
    protected function setTranslator(TranslatorInterafce $translator) {
        $this->translator = $translator;
        return $this;
    }

}