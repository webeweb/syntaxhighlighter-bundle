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
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterConfig;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;

/**
 * SyntaxHighlighter config test.
 *
 * @author webeweb <https://github.com/webeweb/>
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

        $this->assertFalse($obj->getBloggerMode());
        $this->assertNull($obj->getStrings());
        $this->assertFalse($obj->getStripBrs());
        $this->assertEquals("pre", $obj->getTagName());
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

        $res0 = <<<'EOTXT'
SyntaxHighlighter.config.bloggerMode = true;
SyntaxHighlighter.config.stripBrs = true;
SyntaxHighlighter.config.tagName = "blocquote";

EOTXT;

        $this->assertEquals($res0, (string) $obj);

        $obj->setStrings(new SyntaxHighlighterStrings());

        $res9 = $res0 . <<<'EOTXT'
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
EOTXT;

        $this->assertEquals($res9, (string) $obj);
    }

}
