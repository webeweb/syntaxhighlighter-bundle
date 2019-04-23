<?php

/*
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection;

use Exception;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\WBWSyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\Provider\SyntaxHighlighterStringsProvider;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractTestCase;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;

/**
 * SyntaxHighlighter extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection
 */
class WBWSyntaxHighlighterExtensionTest extends AbstractTestCase {

    /**
     * Tests the load() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad() {

        $obj = new WBWSyntaxHighlighterExtension();

        $obj->load([], $this->containerBuilder);

        $this->assertInstanceOf(SyntaxHighlighterStringsProvider::class, $this->containerBuilder->get(SyntaxHighlighterStringsProvider::SERVICE_NAME));
        $this->assertInstanceOf(SyntaxHighlighterTwigExtension::class, $this->containerBuilder->get(SyntaxHighlighterTwigExtension::SERVICE_NAME));
    }
}
