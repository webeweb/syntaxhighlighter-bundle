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

use WBW\Bundle\SyntaxHighlighterBundle\SyntaxHighlighterBundle;

/**
 * SyntaxHighlighter bundle test
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests
 */
class SyntaxHighlighterBundleTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("3.0.83", SyntaxHighlighterBundle::SYNTAXHIGHLIGHTER_VERSION);
    }

    /**
     * Tests the getAssetsRelativeDirectory() method.
     *
     * @return void
     */
    public function testGetAssetsRelativeDirectory() {

        $obj = new SyntaxHighlighterBundle();

        $this->assertEquals("/Resources/assets", $obj->getAssetsRelativeDirectory());
    }

}
