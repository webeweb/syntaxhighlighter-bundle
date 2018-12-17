<?php

/*
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension;

use Twig_Environment;
use Twig_SimpleFilter;
use Twig_SimpleFunction;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterDefaults;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;
use WBW\Library\Core\Argument\ArrayHelper;
use WBW\Library\Core\Argument\StringHelper;
use WBW\Library\Core\Exception\FileSystem\FileNotFoundException;
use WBW\Library\Core\FileSystem\FileHelper;

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
    const SERVICE_NAME = "webeweb.syntaxhighlighter.twig.extension.syntaxhighlighter";

    /**
     * Constructor.
     *
     * @param Twig_Environment $twigEnvironment The Twig environment.
     */
    public function __construct(Twig_Environment $twigEnvironment) {
        parent::__construct($twigEnvironment);
    }

    /**
     * Get the Twig filters.
     *
     * @return Twig_SimpleFilter[] Returns the Twig filters.
     */
    public function getFilters() {
        return [
            new Twig_SimpleFilter("syntaxHighlighterScript", [$this, "syntaxHighlighterScriptFilter"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return Twig_SimpleFunction[] Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new Twig_SimpleFunction("syntaxHighlighterConfig", [$this, "syntaxHighlighterConfigFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("syntaxHighlighterContent", [$this, "syntaxHighlighterContentFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("syntaxHighlighterDefaults", [$this, "syntaxHighlighterDefaultsFunction"], ["is_safe" => ["html"]]),
            new Twig_SimpleFunction("syntaxHighlighterStrings", [$this, "syntaxHighlighterStringsFunction"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Displays a SyntaxHighlighter content.
     *
     * @param array $args The arguments.
     * @return string Returns the SyntaxHighlighter content.
     * @throws FileNotFoundException Throws a file not found exception if the file does not exists.
     */
    public function syntaxHighlighterContentFunction(array $args = []) {

        // Get the parameters.
        $tag      = ArrayHelper::get($args, "tag", "pre");
        $language = ArrayHelper::get($args, "language", "php");
        $filename = ArrayHelper::get($args, "filename");
        $content  = ArrayHelper::get($args, "content");

        // Check the filename.
        if (null !== $filename) {

            // Get the file contents.
            $content = FileHelper::getContents($filename);
        }

        // Return the HTML.
        return $this->syntaxHighlighterContent($tag, $language, $content);
    }

    /**
     * Displays a SyntaxHighlighter config.
     *
     * @param SyntaxHighlighterConfig $config The SyntaxHighlighter config.
     * @return string Returns the SyntaxHighlighter config.
     */
    public function syntaxHighlighterConfigFunction(SyntaxHighlighterConfig $config) {
        return $this->syntaxHighlighterConfig($config);
    }

    /**
     * Displays a SyntaxHighlighter defaults.
     *
     * @param SyntaxHighlighterDefaults $defaults The SyntaxHighlighter defaults.
     * @return string Returns the SyntaxHighlighter defaults.
     */
    public function syntaxHighlighterDefaultsFunction(SyntaxHighlighterDefaults $defaults) {
        return $this->syntaxHighlighterDefaults($defaults);
    }

    /**
     * Displays a SyntaxHighlighter script.
     *
     * @param string $content The content.
     * @return string Returns the SyntaxHighlighter script.
     */
    public function syntaxHighlighterScriptFilter($content) {

        // Initialize the template.
        $template = "<script type=\"text/javascript\">\n%innerHTML%\n</script>";

        // Return the HTML.
        return StringHelper::replace($template, ["%innerHTML%"], [$content]);
    }

    /**
     * Displays a SyntaxHighlighter strings.
     *
     * @param SyntaxHighlighterStrings $strings The SyntaxHighlighter strings.
     * @return string Returns the SyntaxHighlighter strings.
     */
    public function syntaxHighlighterStringsFunction(SyntaxHighlighterStrings $strings) {
        return $this->syntaxHighlighterStrings($strings);
    }

}
