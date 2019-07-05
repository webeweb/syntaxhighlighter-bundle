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

use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\WBWSyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\WBWSyntaxHighlighterBundle;

/**
 * SyntaxHighlighter bundle test
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests
 */
class WBWSyntaxHighlighterBundleTest extends AbstractTestCase {

    /**
     * Tests the getAssetsRelativeDirectory() method.
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory() {

        $obj = new WBWSyntaxHighlighterBundle();

        $this->assertEquals(AssetsProviderInterface::ASSETS_RELATIVE_DIRECTORY, $obj->getAssetsRelativeDirectory());
    }

    /**
     * Tests the getContainerExtension() method.
     *
     * @return void
     */
    public function testGetContainerExtension() {

        $obj = new WBWSyntaxHighlighterBundle();

        $this->assertInstanceOf(WBWSyntaxHighlighterExtension::class, $obj->getContainerExtension());
    }
}
