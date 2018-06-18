<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension;

use Twig_SimpleFunction;
use WBW\Library\Core\Exception\IO\FileNotFoundException;
use WBW\Library\Core\Utility\Argument\ArrayUtility;
use WBW\Library\Core\Utility\IO\FileUtility;

/**
 * SyntaxHighlighter Twig extension.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension
 */
class SyntaxHighlighterTwigExtension extends AbstractSyntaxHighlighterTwigExtension {

    /**
     * Service name.
     *
     * @var string
     */
    const SERVICE_NAME = "webeweb.bundle.syntaxhighlighterbundle.twig.extension.syntaxhighlighter";

    /**
     * Constructor.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Displays a SyntaxHighlighter.
     *
     * @param array $args The arguments.
     * @return string Returns the SyntaxHighlighter.
     * @throws FileNotFoundException Throws a file not found exception if the file does not exists.
     */
    public function syntaxHighlighterFunction(array $args = []) {

        // Get the parameters.
        $language = ArrayUtility::get($args, "language", "php");
        $filename = ArrayUtility::get($args, "filename");
        $content  = ArrayUtility::get($args, "content");

        // Check the filename.
        if (null !== $filename) {

            // Get the file contents.
            $content = FileUtility::getContents($filename);
        }

        // Return the HTML.
        return $this->syntaxHighlighter($language, $content);
    }

    /**
     * Get the Twig functions.
     *
     * @return Twig_SimpleFunction[] Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("syntaxHighlighter", [$this, "syntaxHighlighterFunction"], ["is_safe" => ["html"]]),
        ];
    }

}
