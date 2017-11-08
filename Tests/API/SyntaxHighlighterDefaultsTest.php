<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 NdC/WBW
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
 * @author NdC/WBW <https://github.com/webeweb/>
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

		$this->assertEquals(true, $obj->getAutoLinks(), "The method getAutoLinks() does not return the expected value");
		$this->assertEquals("", $obj->getClassName(), "The method getClassName() does not return the expected value");
		$this->assertEquals(false, $obj->getCollapse(), "The method getCollapse() does not return the expected value");
		$this->assertEquals(1, $obj->getFirstLine(), "The method getFirstLine() does not return the expected value");
		$this->assertEquals(true, $obj->getGutter(), "The method getGutter() does not return the expected value");
		$this->assertEquals(null, $obj->getHighlight(), "The method getHighlight() does not return the expected value");
		$this->assertEquals(false, $obj->getHtmlScript(), "The method getHtmlScript() does not return the expected value");
		$this->assertEquals(true, $obj->getSmartTabs(), "The method getSmartTabs() does not return the expected value");
		$this->assertEquals(4, $obj->getTabSize(), "The method getTabSize() does not return the expected value");
		$this->assertEquals(true, $obj->getToolbar(), "The method getToolbar() does not return the expected value");
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

		$res	 = [];
		$res []	 = "SyntaxHighlighter.defaults['auto-links'] = false;";
		$res []	 = "SyntaxHighlighter.defaults['class-name'] = \"classname\";";
		$res []	 = "SyntaxHighlighter.defaults['collapse'] = true;";
		$res []	 = "SyntaxHighlighter.defaults['first-line'] = 0;";
		$res []	 = "SyntaxHighlighter.defaults['gutter'] = false;";
		$res []	 = "SyntaxHighlighter.defaults['highlight'] = [1, 2, 3];";
		$res []	 = "SyntaxHighlighter.defaults['html-script'] = true;";
		$res []	 = "SyntaxHighlighter.defaults['smart-tabs'] = false;";
		$res []	 = "SyntaxHighlighter.defaults['tab-size'] = 8;";
		$res []	 = "SyntaxHighlighter.defaults['toolbar'] = false;";

		$this->assertEquals(implode("\n", $res), (string) $obj, "The method toString() does not return the expected value");
	}

}
