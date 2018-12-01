<?php

/**
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Provider;

use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\CoreBundle\Provider\ProviderInterface;
use WBW\Bundle\CoreBundle\Service\TranslatorTrait;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;

/**
 * SyntaxHighlighter strings provider.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Provider
 */
class SyntaxHighlighterStringsProvider implements ProviderInterface {

    use TranslatorTrait;

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.syntaxhighlighter.provider.syntaxhighlighter_strings";

    /**
     * Constructor.
     *
     * @param TranslatorInterface $translator The translator.
     */
    public function __construct(TranslatorInterface $translator) {
        $this->setTranslator($translator);
    }

    /**
     * Get a strings.
     *
     * @return SyntaxHighlighterStrings Returns the strings.
     */
    public function getSyntaxHighlighterStrings() {

        // Initialize the strings.
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

        // Return the strings.
        return $strings;
    }

}
