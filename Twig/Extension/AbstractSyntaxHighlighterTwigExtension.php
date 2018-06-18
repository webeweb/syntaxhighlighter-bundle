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
     * Displays a SyntaxHighlighter.
     *
     * @param string $language The language.
     * @param string $content The content.
     * @return string Returns the SyntaxHightlighter.
     */
    protected function syntaxHighlighter($language, $content) {

        // Initialize the template.
        $template = "<pre %attributes%>\n%innerHTML%\n</pre>";

        // Initialize the attributes.
        $attributes = [];

        $attributes["class"][] = "brush:";
        $attributes["class"][] = (null !== $language ? $language : "php") . ";";

        // Return the HTML.
        return StringUtility::replace($template, ["%attributes%", "%innerHTML%"], [StringUtility::parseArray($attributes), $content]);
    }

}
