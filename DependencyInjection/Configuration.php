<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;
use WBW\Bundle\CoreBundle\DependencyInjection\ConfigurationHelper;

/**
 * Configuration.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface {

    /**
     * {@inheritDoc}
     *
     * wbw_syntaxhighlighter:
     *      twig:  false
     *      theme: Django
     *      brushes:
     *          - "Php"
     *          - "Css"
     *          - "JScript"
     */
    public function getConfigTreeBuilder() {

        $assets  = ConfigurationHelper::loadYamlConfig(__DIR__, "assets");
        $brushes = $assets["assets"]["wbw.syntaxhighlighter.asset.syntaxhighlighter"]["brushes"];
        $themes  = $assets["assets"]["wbw.syntaxhighlighter.asset.syntaxhighlighter"]["themes"];

        $treeBuilder = new TreeBuilder(WBWSyntaxHighlighterExtension::EXTENSION_ALIAS);

        $rootNode = ConfigurationHelper::getRootNode($treeBuilder, WBWSyntaxHighlighterExtension::EXTENSION_ALIAS);
        $rootNode
            ->children()
                ->booleanNode("twig")->defaultTrue()->info("Load Twig extensions")->end()
                ->variableNode("theme")->defaultValue("Default")->info("SyntaxHightlighter theme")
                    ->validate()
                        ->ifNotInArray($themes)
                        ->thenInvalid("The SyntaxHighlighter theme %s is not supported. Please choose one of " . json_encode($themes))
                    ->end()
                ->end()
                ->arrayNode("brushes")->info("Use SyntaxHightlighter brushes")
                    ->prototype("scalar")
                        ->validate()
                            ->ifNotInArray($brushes)
                            ->thenInvalid("The SyntaxHighlighter brush %s is not supported. Please choose one of " . json_encode($brushes))
                        ->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
