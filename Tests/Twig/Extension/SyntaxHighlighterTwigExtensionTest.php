<?php

/**
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\Twig\Extension;

use Exception;
use Twig_Node;
use Twig_SimpleFilter;
use Twig_SimpleFunction;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterDefaults;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;
use WBW\Library\Core\Exception\FileSystem\FileNotFoundException;

/**
 * SyntaxHighlighter Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\Twig\Extension
 */
class SyntaxHighlighterTwigExtensionTest extends AbstractFrameworkTestCase {

    /**
     * Tests the getFilters() method.
     *
     * @return void
     */
    public function testGetFilters() {

        $obj = new SyntaxHighlighterTwigExtension();

        $res = $obj->getFilters();

        $this->assertCount(1, $res);

        $this->assertInstanceOf(Twig_SimpleFilter::class, $res[0]);
        $this->assertEquals("syntaxHighlighterScript", $res[0]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterScriptFilter"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Twig_Node()));
    }

    /**
     * Tests the getFunctions() method.
     *
     * @return void
     */
    public function testGetFunctions() {

        $obj = new SyntaxHighlighterTwigExtension();

        $res = $obj->getFunctions();

        $this->assertCount(4, $res);

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[0]);
        $this->assertEquals("syntaxHighlighterConfig", $res[0]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterConfigFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[1]);
        $this->assertEquals("syntaxHighlighterContent", $res[1]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterContentFunction"], $res[1]->getCallable());
        $this->assertEquals(["html"], $res[1]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[2]);
        $this->assertEquals("syntaxHighlighterDefaults", $res[2]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterDefaultsFunction"], $res[2]->getCallable());
        $this->assertEquals(["html"], $res[2]->getSafe(new Twig_Node()));

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[3]);
        $this->assertEquals("syntaxHighlighterStrings", $res[3]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterStringsFunction"], $res[3]->getCallable());
        $this->assertEquals(["html"], $res[3]->getSafe(new Twig_Node()));
    }

    /**
     * Tests the syntaxHighlighterConfigFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterConfigFunction() {

        $obj = new SyntaxHighlighterTwigExtension();

        // ===
        $arg = new SyntaxHighlighterConfig();
        $arg->setBloggerMode(true);
        $arg->setStripBrs(true);
        $arg->setTagName("blocquote");

        $res0 = <<<'EOT'
SyntaxHighlighter.config.bloggerMode = true;
SyntaxHighlighter.config.stripBrs = true;
SyntaxHighlighter.config.tagName = "blocquote";
EOT;

        $this->assertEquals($res0, $obj->syntaxHighlighterConfigFunction($arg));

        // ===
        $arg->setStrings(new SyntaxHighlighterStrings());

        $res9 = $res0 . "\n" . <<<'EOT'
SyntaxHighlighter.config.strings.alert = "SyntaxHighlighter

";
SyntaxHighlighter.config.strings.brushNotHtmlScript = "Brush wasn't made for html-script option:";
SyntaxHighlighter.config.strings.copyToClipboard = "copy to clipboard";
SyntaxHighlighter.config.strings.copyToClipboardConfirmation = "The code is in your clipboard now";
SyntaxHighlighter.config.strings.expandSource = "+ expand source";
SyntaxHighlighter.config.strings.help = "?";
SyntaxHighlighter.config.strings.noBrush = "Can't find brush for:";
SyntaxHighlighter.config.strings.print = "print";
SyntaxHighlighter.config.strings.viewSource = "view source";
EOT;

        $this->assertEquals($res9, $obj->syntaxHighlighterConfigFunction($arg));
    }

    /**
     * Tests the syntaxHighlighterContentFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterContentFunction() {

        $obj = new SyntaxHighlighterTwigExtension();

        // ===
        $arg0 = ["content" => "<span>span</span>", "language" => "html"];
        $res0 = <<<'EOT'
<pre class="brush: html">
&lt;span&gt;span&lt;/span&gt;
</pre>
EOT;

        $this->assertEquals($res0, $obj->syntaxHighlighterContentFunction($arg0));

        // ===
        $arg9 = ["filename" => getcwd() . "/SyntaxHighlighterBundle.php", "language" => "php"];
        $res9 = <<<'EOT'
<pre class="brush: php">
&lt;?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * SyntaxHighlighter bundle.
 *
 * @author webeweb &lt;https://github.com/webeweb/&gt;
 * @package WBW\Bundle\SyntaxHighlighterBundle
 */
class SyntaxHighlighterBundle extends Bundle {

}

</pre>
EOT;
        $this->assertEquals($res9, $obj->syntaxHighlighterContentFunction($arg9));
    }

    /**
     * Tests the syntaxHighlighterContentFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterContentFunctionWithFileNotFoundException() {

        $obj = new SyntaxHighlighterTwigExtension();

        try {

            $arg = ["filename" => getcwd() . "/SyntaxHighlighterBundle"];

            $obj->syntaxHighlighterContentFunction($arg);
        } catch (Exception $ex) {

            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertContains("syntaxhighlighter-bundle/SyntaxHighlighterBundle\" is not found", $ex->getMessage());
        }
    }

    /**
     * Tests the syntaxHighlighterDefaultsFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterDefaultsFunction() {

        $obj = new SyntaxHighlighterTwigExtension();

        $arg = new SyntaxHighlighterDefaults();
        $arg->setAutoLinks(false);
        $arg->setClassName("classname");
        $arg->setCollapse(true);
        $arg->setFirstLine(0);
        $arg->setGutter(false);
        $arg->setHighlight([1, 2, 3]);
        $arg->setHtmlScript(true);
        $arg->setSmartTabs(false);
        $arg->setTabSize(8);
        $arg->setToolbar(false);

        $res = <<<'EOT'
SyntaxHighlighter.defaults['auto-links'] = false;
SyntaxHighlighter.defaults['class-name'] = "classname";
SyntaxHighlighter.defaults['collapse'] = true;
SyntaxHighlighter.defaults['first-line'] = 0;
SyntaxHighlighter.defaults['gutter'] = false;
SyntaxHighlighter.defaults['highlight'] = [1,2,3];
SyntaxHighlighter.defaults['html-script'] = true;
SyntaxHighlighter.defaults['smart-tabs'] = false;
SyntaxHighlighter.defaults['tab-size'] = 8;
SyntaxHighlighter.defaults['toolbar'] = false;
EOT;

        $this->assertEquals($res, $obj->syntaxHighlighterDefaultsFunction($arg));
    }

    /**
     * Tests the syntaxHighlighterScriptFilter() method.
     *
     * @return void
     * @depends testGetFilters
     */
    public function testSyntaxHighlighterScriptFilter() {

        $obj = new SyntaxHighlighterTwigExtension();

        $res = "<script type=\"text/javascript\">\ncontent\n</script>";

        $this->assertEquals($res, $obj->syntaxHighlighterScriptFilter("content"));
    }

    /**
     * Tests the syntaxHighlighterStringsFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterStringsFunction() {

        $obj = new SyntaxHighlighterTwigExtension();

        $arg = new SyntaxHighlighterStrings();

        $arg->setAlert("SyntaxHighlighter bundle");
        $arg->setBrushNotHtmlScript("Brush wasn't made for HTML-Script option :");
        $arg->setCopyToClipboard("Copy to clipboard");
        $arg->setCopyToClipboardConfirmation("Operation success");
        $arg->setExpandSource("Expand source");
        $arg->setHelp("Help");
        $arg->setNoBrush("Can't find brush for :");
        $arg->setPrint("Print");
        $arg->setViewSource("View source");

        $res = <<<'EOT'
SyntaxHighlighter.config.strings.alert = "SyntaxHighlighter bundle";
SyntaxHighlighter.config.strings.brushNotHtmlScript = "Brush wasn't made for HTML-Script option :";
SyntaxHighlighter.config.strings.copyToClipboard = "Copy to clipboard";
SyntaxHighlighter.config.strings.copyToClipboardConfirmation = "Operation success";
SyntaxHighlighter.config.strings.expandSource = "Expand source";
SyntaxHighlighter.config.strings.help = "Help";
SyntaxHighlighter.config.strings.noBrush = "Can't find brush for :";
SyntaxHighlighter.config.strings.print = "Print";
SyntaxHighlighter.config.strings.viewSource = "View source";
EOT;

        $this->assertEquals($res, $obj->syntaxHighlighterStringsFunction($arg));
    }

}
