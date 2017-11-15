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
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;

/**
 * SyntaxHightlighter strings test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\API
 * @final
 */
final class SyntaxHighlighterStringsTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the __construct() method.
	 *
	 * @return void
	 */
	public function testConstruct() {

		$obj = new SyntaxHighlighterStrings();

		$this->assertEquals("SyntaxHighlighter\n\n", $obj->getAlert());
		$this->assertEquals("Brush wasn't made for html-script option:", $obj->getBrushNotHtmlScript());
		$this->assertEquals("copy to clipboard", $obj->getCopyToClipboard());
		$this->assertEquals("The code is in your clipboard now", $obj->getCopyToClipboardConfirmation());
		$this->assertEquals("+ expand source", $obj->getExpandSource());
		$this->assertEquals("?", $obj->getHelp());
		$this->assertEquals("Can't find brush for:", $obj->getNoBrush());
		$this->assertEquals("print", $obj->getPrint());
		$this->assertEquals("view source", $obj->getViewSource());
	}

	/**
	 * Tests the __toString() method.
	 *
	 * @return void
	 */
	public function testToString() {

		$obj = new SyntaxHighlighterStrings();

		$obj->setAlert("SyntaxHighlighter bundle");
		$obj->setBrushNotHtmlScript("Brush wasn't made for HTML-Script option :");
		$obj->setCopyToClipboard("Copy to clipboard");
		$obj->setCopyToClipboardConfirmation("Operation success");
		$obj->setExpandSource("Expand source");
		$obj->setHelp("Help");
		$obj->setNoBrush("Can't find brush for :");
		$obj->setPrint("Print");
		$obj->setViewSource("View source");

		$res	 = [];
		$res[]	 = "SyntaxHighlighter.config.strings.alert = \"SyntaxHighlighter bundle\";";
		$res[]	 = "SyntaxHighlighter.config.strings.brushNotHtmlScript = \"Brush wasn't made for HTML-Script option :\";";
		$res[]	 = "SyntaxHighlighter.config.strings.copyToClipboard = \"Copy to clipboard\";";
		$res[]	 = "SyntaxHighlighter.config.strings.copyToClipboardConfirmation = \"Operation success\";";
		$res[]	 = "SyntaxHighlighter.config.strings.expandSource = \"Expand source\";";
		$res[]	 = "SyntaxHighlighter.config.strings.help = \"Help\";";
		$res[]	 = "SyntaxHighlighter.config.strings.noBrush = \"Can't find brush for :\";";
		$res[]	 = "SyntaxHighlighter.config.strings.print = \"Print\";";
		$res[]	 = "SyntaxHighlighter.config.strings.viewSource = \"View source\";";

		$this->assertEquals(implode("\n", $res), (string) $obj);
	}

}
