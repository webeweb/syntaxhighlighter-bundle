<?php

/*
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Provider;

use WBW\Bundle\CoreBundle\Component\BaseTranslatorInterface;
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
    const SERVICE_NAME = "wbw.syntaxhighlighter.provider.syntaxhighlighter_strings";

    /**
     * Constructor.
     *
     * @param BaseTranslatorInterface $translator The translator.
     */
    public function __construct(BaseTranslatorInterface $translator) {
        $this->setTranslator($translator);
    }

    /**
     * Get a strings.
     *
     * @return SyntaxHighlighterStrings Returns the strings.
     */
    public function getSyntaxHighlighterStrings() {

        $strings = new SyntaxHighlighterStrings();
        $strings->setAlert($this->getTranslator()->trans("strings.alert", [], "WBWSyntaxHighlighterBundle"));
        $strings->setBrushNotHtmlScript($this->getTranslator()->trans("strings.brush_no_html_script", [], "WBWSyntaxHighlighterBundle"));
        $strings->setCopyToClipboard($this->getTranslator()->trans("strings.copy_to_clipboard", [], "WBWSyntaxHighlighterBundle"));
        $strings->setCopyToClipboardConfirmation($this->getTranslator()->trans("strings.copy_to_clipboard_confirmation", [], "WBWSyntaxHighlighterBundle"));
        $strings->setExpandSource($this->getTranslator()->trans("strings.expand_source", [], "WBWSyntaxHighlighterBundle"));
        $strings->setHelp($this->getTranslator()->trans("strings.help", [], "WBWSyntaxHighlighterBundle"));
        $strings->setNoBrush($this->getTranslator()->trans("strings.no_brush", [], "WBWSyntaxHighlighterBundle"));
        $strings->setPrint($this->getTranslator()->trans("strings.print", [], "WBWSyntaxHighlighterBundle"));
        $strings->setViewSource($this->getTranslator()->trans("strings.view_source", [], "WBWSyntaxHighlighterBundle"));

        return $strings;
    }
}
