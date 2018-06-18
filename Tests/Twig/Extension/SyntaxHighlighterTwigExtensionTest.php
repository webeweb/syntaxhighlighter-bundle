<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
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
use WBW\Library\Core\Exception\IO\FileNotFoundException;

/**
 * SyntaxHighlighter Twig extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\Twig\Extension
 * @final
 */
final class SyntaxHighlighterTwigExtensionTest extends PHPUnit_Framework_TestCase {

    /**
     * Tests the getFunctions() method.
     *
     * @return void
     */
    public function testGetFunctions() {

        $obj = new SyntaxHighlighterTwigExtension();

        $res = $obj->getFunctions();

        $this->assertCount(1, $res);

        $this->assertInstanceOf(Twig_SimpleFunction::class, $res[0]);
        $this->assertEquals("syntaxHighlighter", $res[0]->getName());
        $this->assertEquals([$obj, "syntaxHighlighterFunction"], $res[0]->getCallable());
        $this->assertEquals(["html"], $res[0]->getSafe(new Twig_Node()));
    }

    /**
     * Tests the syntaxHighlighterFunction() method.
     *
     * @return void
     * @depends testGetFunctions
     */
    public function testSyntaxHighlighterFunction() {

        $obj = new SyntaxHighlighterTwigExtension();

        try {
            $arg0 = ["filename" => getcwd() . "/SyntaxHighlighterBundle"];

            $obj->syntaxHighlighterFunction($arg0);
        } catch (Exception $ex) {

            $this->assertInstanceOf(FileNotFoundException::class, $ex);
            $this->assertContains("syntaxhighlighter-bundle/SyntaxHighlighterBundle\" is not found", $ex->getMessage());
        }

        $arg1 = ["content" => "<span>span</span>", "language" => "html"];
        $res1 = <<< 'EOTXT'
<pre class="brush: html;">
<span>span</span>
</pre>
EOTXT;

        $this->assertEquals($res1, $obj->syntaxHighlighterFunction($arg1));

        $arg9 = ["filename" => getcwd() . "/SyntaxHighlighterBundle.php", "language" => "php"];
        $res9 = <<< 'EOTXT'
<pre class="brush: php;">
<?php

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
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle
 */
class SyntaxHighlighterBundle extends Bundle {

}

</pre>
EOTXT;
        $this->assertEquals($res9, $obj->syntaxHighlighterFunction($arg9));
    }

}
