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

use Twig\TwigFilter;
use Twig\TwigFunction;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterDefaults;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;
use WBW\Library\Core\Argument\ArrayHelper;
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
    const SERVICE_NAME = "wbw.syntaxhighlighter.twig.extension.syntaxhighlighter";

    /**
     * Get the Twig filters.
     *
     * @return TwigFilter[] Returns the Twig filters.
     */
    public function getFilters() {
        return [
            new TwigFilter("syntaxHighlighterScript", [$this, "syntaxHighlighterScriptFilter"], ["is_safe" => ["html"]]),
            new TwigFilter("shScript", [$this, "syntaxHighlighterScriptFilter"], ["is_safe" => ["html"]]),
        ];
    }

    /**
     * Get the Twig functions.
     *
     * @return TwigFunction[] Returns the Twig functions.
     */
    public function getFunctions() {
        return [
            new TwigFunction("syntaxHighlighterConfig", [$this, "syntaxHighlighterConfigFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("shConfig", [$this, "syntaxHighlighterConfigFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("syntaxHighlighterContent", [$this, "syntaxHighlighterContentFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("shContent", [$this, "syntaxHighlighterContentFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("syntaxHighlighterDefaults", [$this, "syntaxHighlighterDefaultsFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("shDefaults", [$this, "syntaxHighlighterDefaultsFunction"], ["is_safe" => ["html"]]),

            new TwigFunction("syntaxHighlighterScript", [$this, "syntaxHighlighterScriptFilter"], ["is_safe" => ["html"]]),
            new TwigFunction("shScript", [$this, "syntaxHighlighterScriptFilter"], ["is_safe" => ["html"]]),

            new TwigFunction("syntaxHighlighterStrings", [$this, "syntaxHighlighterStringsFunction"], ["is_safe" => ["html"]]),
            new TwigFunction("shStrings", [$this, "syntaxHighlighterStringsFunction"], ["is_safe" => ["html"]]),
        ];
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
     * Displays a SyntaxHighlighter content.
     *
     * @param array $args The arguments.
     * @return string Returns the SyntaxHighlighter content.
     * @throws FileNotFoundException Throws a file not found exception if the file does not exists.
     */
    public function syntaxHighlighterContentFunction(array $args = []) {

        $tag      = ArrayHelper::get($args, "tag", "pre");
        $language = ArrayHelper::get($args, "language", "php");
        $filename = ArrayHelper::get($args, "filename");
        $content  = ArrayHelper::get($args, "content");

        if (null !== $filename) {
            $content = FileHelper::getContents($filename);
        }

        return $this->syntaxHighlighterContent($tag, $language, $content);
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
        return static::coreHTMLElement("script", "\n" . $content . "\n", ["type" => "text/javascript"]);
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
