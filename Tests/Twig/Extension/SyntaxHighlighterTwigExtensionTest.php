<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\Twig\Extension;

use Exception;
use PHPUnit_Framework_TestCase;
use Twig_Node;
use Twig_SimpleFunction;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;
use WBW\Library\Core\Exception\File\FileNotFoundException;

/**
 * SyntaxHighlighter Twig extension test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\Twig\Extension
 * @version 2.4.3
 * @final
 */
final class SyntaxHighlighterTwigExtensionTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the getFunctions() method.
	 *
	 * @return void
	 */
	public function testGetFunctions() {

		$obj = new SyntaxHighlighterTwigExtension(getcwd());

		$this->assertCount(2, $obj->getFunctions(), "The method getFunctions() does not return the expected count");

		$this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[0], "The method getFunctions() does not return the expected object on item 0");
		$this->assertEquals("syntaxHighlighterScript", $obj->getFunctions()[0]->getName(), "The method getName() does not return the expected name on item 0");
		$this->assertEquals([$obj, "syntaxHighlighterScriptFunction"], $obj->getFunctions()[0]->getCallable(), "The method getCallable() does not return the expected callable on item 0");
		$this->assertEquals(["html"], $obj->getFunctions()[0]->getSafe(new Twig_Node()), "The method getSafe() does not return the expected safe on item 0");

		$this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[1], "The method getFunctions() does not return the expected object on item 1");
		$this->assertEquals("syntaxHighlighterStyle", $obj->getFunctions()[1]->getName(), "The method getName() does not return the expected name on item 1");
		$this->assertEquals([$obj, "syntaxHighlighterStyleFunction"], $obj->getFunctions()[1]->getCallable(), "The method getCallable() does not return the expected callable on item 1");
		$this->assertEquals(["html"], $obj->getFunctions()[1]->getSafe(new Twig_Node()), "The method getSafe() does not return the expected safe on item 1");
	}

	/**
	 * Tests the syntaxHighlighterScriptFunction() method.
	 *
	 * @return void
	 */
	public function testSyntaxHighlighterScriptFunction() {

		$obj = new SyntaxHighlighterTwigExtension(getcwd());

		try {
			$obj->syntaxHighlighterScriptFunction("exception");
		} catch (Exception $ex) {
			$this->assertInstanceOf(FileNotFoundException::class, $ex, "The method syntaxHighlighterScriptFunction() does not throw the expected exception");
			$this->assertEquals("The file \"scripts/exception.js\" is not found", $ex->getMessage(), "The method getMessage() does not return the expected value");
		}

		$res1 = "<script src=\"/bundles/syntaxhighlighter/scripts/shCore.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res1, $obj->syntaxHighlighterScriptFunction("shCore"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$res2 = "<script src=\"/bundles/syntaxhighlighter/scripts/shLegacy.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res2, $obj->syntaxHighlighterScriptFunction("shLegacy"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$res3 = "<script src=\"/bundles/syntaxhighlighter/scripts/XRegExp.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($res3, $obj->syntaxHighlighterScriptFunction("XRegExp"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB1 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushAS3.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB1, $obj->syntaxHighlighterScriptFunction("shBrushAS3"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB2 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushAppleScript.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB2, $obj->syntaxHighlighterScriptFunction("shBrushAppleScript"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB3 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushBash.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB3, $obj->syntaxHighlighterScriptFunction("shBrushBash"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB4 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCSharp.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB4, $obj->syntaxHighlighterScriptFunction("shBrushCSharp"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB5 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushColdFusion.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB5, $obj->syntaxHighlighterScriptFunction("shBrushColdFusion"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB6 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCpp.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB6, $obj->syntaxHighlighterScriptFunction("shBrushCpp"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB7 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCss.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB7, $obj->syntaxHighlighterScriptFunction("shBrushCss"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB8 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushDelphi.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB8, $obj->syntaxHighlighterScriptFunction("shBrushDelphi"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB9 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushDiff.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB9, $obj->syntaxHighlighterScriptFunction("shBrushDiff"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB10 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushErlang.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB10, $obj->syntaxHighlighterScriptFunction("shBrushErlang"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB11 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushGroovy.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB11, $obj->syntaxHighlighterScriptFunction("shBrushGroovy"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB12 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJScript.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB12, $obj->syntaxHighlighterScriptFunction("shBrushJScript"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB13 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJava.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB13, $obj->syntaxHighlighterScriptFunction("shBrushJava"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB14 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJavaFX.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB14, $obj->syntaxHighlighterScriptFunction("shBrushJavaFX"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB15 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPerl.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB15, $obj->syntaxHighlighterScriptFunction("shBrushPerl"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB16 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPhp.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB16, $obj->syntaxHighlighterScriptFunction("shBrushPhp"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB17 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPlain.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB17, $obj->syntaxHighlighterScriptFunction("shBrushPlain"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB18 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPowerShell.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB18, $obj->syntaxHighlighterScriptFunction("shBrushPowerShell"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB19 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPython.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB19, $obj->syntaxHighlighterScriptFunction("shBrushPython"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB20 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushRuby.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB20, $obj->syntaxHighlighterScriptFunction("shBrushRuby"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB21 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushSass.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB21, $obj->syntaxHighlighterScriptFunction("shBrushSass"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB22 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushScala.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB22, $obj->syntaxHighlighterScriptFunction("shBrushScala"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB23 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushSql.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB23, $obj->syntaxHighlighterScriptFunction("shBrushSql"), "The method syntaxHighlighterScriptFunction() does not return the expected value");

		$resB24 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushXml.js\" type=\"text/javascript\"></script>";
		$this->assertEquals($resB24, $obj->syntaxHighlighterScriptFunction("shBrushXml"), "The method syntaxHighlighterScriptFunction() does not return the expected value");
	}

	/**
	 * Tests the syntaxHighlighterStyleFunction() method.
	 *
	 * @return void
	 */
	public function testSyntaxHighlighterStyleFunction() {

		$obj = new SyntaxHighlighterTwigExtension(getcwd());

		try {
			$obj->syntaxHighlighterStyleFunction("exception");
		} catch (Exception $ex) {
			$this->assertInstanceOf(FileNotFoundException::class, $ex, "The method syntaxHighlighterStyleFunction() does not throw the expected exception");
			$this->assertEquals("The file \"styles/exception.css\" is not found", $ex->getMessage(), "The method getMessage() does not return the expected value");
		}

		$res0 = "<link href=\"/bundles/syntaxhighlighter/styles/shCore.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($res0, $obj->syntaxHighlighterStyleFunction("shCore"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC1 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreDefault.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC1, $obj->syntaxHighlighterStyleFunction("shCoreDefault"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC2 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreDjango.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC2, $obj->syntaxHighlighterStyleFunction("shCoreDjango"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC3 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreEclipse.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC3, $obj->syntaxHighlighterStyleFunction("shCoreEclipse"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC4 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreEmacs.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC4, $obj->syntaxHighlighterStyleFunction("shCoreEmacs"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC5 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreFadeToGrey.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC5, $obj->syntaxHighlighterStyleFunction("shCoreFadeToGrey"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC6 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreMDUltra.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC6, $obj->syntaxHighlighterStyleFunction("shCoreMDUltra"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC7 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreMidnight.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC7, $obj->syntaxHighlighterStyleFunction("shCoreMidnight"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resC8 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreRDark.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resC8, $obj->syntaxHighlighterStyleFunction("shCoreRDark"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT1 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeDefault.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT1, $obj->syntaxHighlighterStyleFunction("shThemeDefault"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT2 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeDjango.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT2, $obj->syntaxHighlighterStyleFunction("shThemeDjango"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT3 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeEclipse.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT3, $obj->syntaxHighlighterStyleFunction("shThemeEclipse"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT4 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeEmacs.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT4, $obj->syntaxHighlighterStyleFunction("shThemeEmacs"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT5 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeFadeToGrey.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT5, $obj->syntaxHighlighterStyleFunction("shThemeFadeToGrey"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT6 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeMDUltra.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT6, $obj->syntaxHighlighterStyleFunction("shThemeMDUltra"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT7 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeMidnight.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT7, $obj->syntaxHighlighterStyleFunction("shThemeMidnight"), "The method syntaxHighlighterStyleFunction() does not return the expected value");

		$resT8 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeRDark.css\" rel=\"stylesheet\" type=\"text/css\">";
		$this->assertEquals($resT8, $obj->syntaxHighlighterStyleFunction("shThemeRDark"), "The method syntaxHighlighterStyleFunction() does not return the expected value");
	}

}
