<?php

/*
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests;

use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\SyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\SyntaxHighlighterInterface;
use WBW\Bundle\SyntaxHighlighterBundle\WBWSyntaxHighlighterBundle;

/**
 * SyntaxHighlighter bundle test
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests
 */
class WBWSyntaxHighlighterBundleTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals(SyntaxHighlighterInterface::SYNTAXHIGHLIGHTER_VERSION, WBWSyntaxHighlighterBundle::SYNTAXHIGHLIGHTER_VERSION);
    }

    /**
     * Tests the getAssetsRelativeDirectory() method.
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory() {

        $obj = new WBWSyntaxHighlighterBundle();

        $this->assertEquals("/Resources/assets", $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests the getContainerExtension() method.
     *
     * @return void
     */
    public function testGetContainerExtension() {

        $obj = new WBWSyntaxHighlighterBundle();

        $res = $obj->getContainerExtension();
        $this->assertInstanceOf(SyntaxHighlighterExtension::class, $res);
    }
}
