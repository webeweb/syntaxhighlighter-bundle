<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2019 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests;

use WBW\Bundle\SyntaxHighlighterBundle\SyntaxHighlighterInterface;

/**
 * SyntaxHighlighter interface test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests
 */
class SyntaxHighlighterInterfaceTest extends AbstractTestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $this->assertEquals("3.0.83", SyntaxHighlighterInterface::SYNTAXHIGHLIGHTER_VERSION);
    }
}
