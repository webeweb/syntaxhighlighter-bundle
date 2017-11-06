<?php

/*
 * This file is part of the WBWSyntaxHighlighterBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\API;

use PHPUnit_Framework_TestCase;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;

/**
 * SyntaxHighlighter config test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\API
 * @final
 */
final class SyntaxHighlighterConfigTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the __construct() method.
	 *
	 * @return void
	 */
	public function testConstruct() {

		$obj = new SyntaxHighlighterConfig();

		$this->assertEquals(false, $obj->getBloggerMode(), "The method getBloggerMode() does not return the expected value");
		$this->assertEquals(null, $obj->getStrings(), "The method getStrings() does not return the expected value");
		$this->assertEquals(false, $obj->getStripBrs(), "The method getStripBrs() does not return the expected value");
		$this->assertEquals("pre", $obj->getTagName(), "The method getTagName() does not return the expected value");
	}

	/**
	 * Tests the __toString() method.
	 *
	 * @return void
	 */
	public function testToString() {

		$obj = new SyntaxHighlighterConfig();

		$obj->setBloggerMode(true);
		$obj->setStripBrs(true);
		$obj->setTagName("blocquote");

		$res	 = [];
		$res []	 = "SyntaxHighlighter.config.bloggerMode = true;";
		$res []	 = "SyntaxHighlighter.config.stripBrs = true;";
		$res []	 = "SyntaxHighlighter.config.tagName = \"blocquote\";";

		$this->assertEquals(implode("\n", $res), (string) $obj, "The method toString() does not return the expected value");

		$obj->setStrings(new SyntaxHighlighterStrings());

		$res1	 = $res;
		$res1[]	 = "SyntaxHighlighter.config.strings.alert = \"SyntaxHighlighter\n\n\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.brushNotHtmlScript = \"Brush wasn't made for html-script option:\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.copyToClipboard = \"copy to clipboard\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.copyToClipboardConfirmation = \"The code is in your clipboard now\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.expandSource = \"+ expand source\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.help = \"?\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.noBrush = \"Can't find brush for:\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.print = \"print\";";
		$res1[]	 = "SyntaxHighlighter.config.strings.viewSource = \"view source\";";

		$this->assertEquals(implode("\n", $res1), (string) $obj, "The method toString() does not return the expected value");
	}

}
