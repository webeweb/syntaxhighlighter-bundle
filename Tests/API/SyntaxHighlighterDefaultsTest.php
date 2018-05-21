<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterDefaults;

/**
 * SyntaxHighlighter defaults test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\API
 * @final
 */
final class SyntaxHighlighterDefaultsTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the __construct() method.
     *
     * @return void
     */
    public function testConstruct() {

        $obj = new SyntaxHighlighterDefaults();

        $this->assertTrue($obj->getAutoLinks());
        $this->assertEquals("", $obj->getClassName());
        $this->assertFalse($obj->getCollapse());
        $this->assertEquals(1, $obj->getFirstLine());
        $this->assertTrue($obj->getGutter());
        $this->assertNull($obj->getHighlight());
        $this->assertFalse($obj->getHtmlScript());
        $this->assertTrue($obj->getSmartTabs());
        $this->assertEquals(4, $obj->getTabSize());
        $this->assertTrue($obj->getToolbar());
    }

    /**
     * Tests the __toString() method.
     *
     * @return void
     */
    public function testToString() {

        $obj = new SyntaxHighlighterDefaults();

        $obj->setAutoLinks(false);
        $obj->setClassName("classname");
        $obj->setCollapse(true);
        $obj->setFirstLine(0);
        $obj->setGutter(false);
        $obj->setHighlight([1, 2, 3]);
        $obj->setHtmlScript(true);
        $obj->setSmartTabs(false);
        $obj->setTabSize(8);
        $obj->setToolbar(false);

        $res = <<< 'EOTXT'
SyntaxHighlighter.defaults['auto-links'] = false;
SyntaxHighlighter.defaults['class-name'] = "classname";
SyntaxHighlighter.defaults['collapse'] = true;
SyntaxHighlighter.defaults['first-line'] = 0;
SyntaxHighlighter.defaults['gutter'] = false;
SyntaxHighlighter.defaults['highlight'] = [1, 2, 3];
SyntaxHighlighter.defaults['html-script'] = true;
SyntaxHighlighter.defaults['smart-tabs'] = false;
SyntaxHighlighter.defaults['tab-size'] = 8;
SyntaxHighlighter.defaults['toolbar'] = false;
EOTXT;

        $this->assertEquals($res, (string) $obj);
    }

}
