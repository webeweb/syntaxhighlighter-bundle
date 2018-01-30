<?php

/**
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

        $this->assertCount(2, $obj->getFunctions());

        $this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[0]);
        $this->assertEquals("syntaxHighlighterScript", $obj->getFunctions()[0]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterScriptFunction"], $obj->getFunctions()[0]->getCallable());
        $this->assertEquals(["html"], $obj->getFunctions()[0]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $obj->getFunctions()[1]);
        $this->assertEquals("syntaxHighlighterStyle", $obj->getFunctions()[1]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterStyleFunction"], $obj->getFunctions()[1]->getCallable());
        $this->assertEquals(["html"], $obj->getFunctions()[1]->getSafe(new Twig_Node()));
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
            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertEquals("The file \"scripts/exception.js\" is not found", $ex->getMessage());
        }

        $res1 = "<script src=\"/bundles/syntaxhighlighter/scripts/shCore.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res1, $obj->syntaxHighlighterScriptFunction("shCore"));

        $res2 = "<script src=\"/bundles/syntaxhighlighter/scripts/shLegacy.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res2, $obj->syntaxHighlighterScriptFunction("shLegacy"));

        $res3 = "<script src=\"/bundles/syntaxhighlighter/scripts/XRegExp.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($res3, $obj->syntaxHighlighterScriptFunction("XRegExp"));

        $resB1 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushAS3.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB1, $obj->syntaxHighlighterScriptFunction("shBrushAS3"));

        $resB2 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushAppleScript.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB2, $obj->syntaxHighlighterScriptFunction("shBrushAppleScript"));

        $resB3 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushBash.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB3, $obj->syntaxHighlighterScriptFunction("shBrushBash"));

        $resB4 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCSharp.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB4, $obj->syntaxHighlighterScriptFunction("shBrushCSharp"));

        $resB5 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushColdFusion.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB5, $obj->syntaxHighlighterScriptFunction("shBrushColdFusion"));

        $resB6 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCpp.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB6, $obj->syntaxHighlighterScriptFunction("shBrushCpp"));

        $resB7 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushCss.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB7, $obj->syntaxHighlighterScriptFunction("shBrushCss"));

        $resB8 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushDelphi.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB8, $obj->syntaxHighlighterScriptFunction("shBrushDelphi"));

        $resB9 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushDiff.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB9, $obj->syntaxHighlighterScriptFunction("shBrushDiff"));

        $resB10 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushErlang.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB10, $obj->syntaxHighlighterScriptFunction("shBrushErlang"));

        $resB11 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushGroovy.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB11, $obj->syntaxHighlighterScriptFunction("shBrushGroovy"));

        $resB12 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJScript.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB12, $obj->syntaxHighlighterScriptFunction("shBrushJScript"));

        $resB13 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJava.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB13, $obj->syntaxHighlighterScriptFunction("shBrushJava"));

        $resB14 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushJavaFX.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB14, $obj->syntaxHighlighterScriptFunction("shBrushJavaFX"));

        $resB15 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPerl.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB15, $obj->syntaxHighlighterScriptFunction("shBrushPerl"));

        $resB16 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPhp.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB16, $obj->syntaxHighlighterScriptFunction("shBrushPhp"));

        $resB17 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPlain.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB17, $obj->syntaxHighlighterScriptFunction("shBrushPlain"));

        $resB18 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPowerShell.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB18, $obj->syntaxHighlighterScriptFunction("shBrushPowerShell"));

        $resB19 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushPython.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB19, $obj->syntaxHighlighterScriptFunction("shBrushPython"));

        $resB20 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushRuby.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB20, $obj->syntaxHighlighterScriptFunction("shBrushRuby"));

        $resB21 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushSass.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB21, $obj->syntaxHighlighterScriptFunction("shBrushSass"));

        $resB22 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushScala.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB22, $obj->syntaxHighlighterScriptFunction("shBrushScala"));

        $resB23 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushSql.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB23, $obj->syntaxHighlighterScriptFunction("shBrushSql"));

        $resB24 = "<script src=\"/bundles/syntaxhighlighter/scripts/shBrushXml.js\" type=\"text/javascript\"></script>";
        $this->assertEquals($resB24, $obj->syntaxHighlighterScriptFunction("shBrushXml"));
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
            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertEquals("The file \"styles/exception.css\" is not found", $ex->getMessage());
        }

        $res0 = "<link href=\"/bundles/syntaxhighlighter/styles/shCore.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($res0, $obj->syntaxHighlighterStyleFunction("shCore"));

        $resC1 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreDefault.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC1, $obj->syntaxHighlighterStyleFunction("shCoreDefault"));

        $resC2 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreDjango.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC2, $obj->syntaxHighlighterStyleFunction("shCoreDjango"));

        $resC3 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreEclipse.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC3, $obj->syntaxHighlighterStyleFunction("shCoreEclipse"));

        $resC4 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreEmacs.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC4, $obj->syntaxHighlighterStyleFunction("shCoreEmacs"));

        $resC5 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreFadeToGrey.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC5, $obj->syntaxHighlighterStyleFunction("shCoreFadeToGrey"));

        $resC6 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreMDUltra.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC6, $obj->syntaxHighlighterStyleFunction("shCoreMDUltra"));

        $resC7 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreMidnight.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC7, $obj->syntaxHighlighterStyleFunction("shCoreMidnight"));

        $resC8 = "<link href=\"/bundles/syntaxhighlighter/styles/shCoreRDark.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resC8, $obj->syntaxHighlighterStyleFunction("shCoreRDark"));

        $resT1 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeDefault.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT1, $obj->syntaxHighlighterStyleFunction("shThemeDefault"));

        $resT2 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeDjango.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT2, $obj->syntaxHighlighterStyleFunction("shThemeDjango"));

        $resT3 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeEclipse.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT3, $obj->syntaxHighlighterStyleFunction("shThemeEclipse"));

        $resT4 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeEmacs.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT4, $obj->syntaxHighlighterStyleFunction("shThemeEmacs"));

        $resT5 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeFadeToGrey.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT5, $obj->syntaxHighlighterStyleFunction("shThemeFadeToGrey"));

        $resT6 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeMDUltra.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT6, $obj->syntaxHighlighterStyleFunction("shThemeMDUltra"));

        $resT7 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeMidnight.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT7, $obj->syntaxHighlighterStyleFunction("shThemeMidnight"));

        $resT8 = "<link href=\"/bundles/syntaxhighlighter/styles/shThemeRDark.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->assertEquals($resT8, $obj->syntaxHighlighterStyleFunction("shThemeRDark"));
    }

}
