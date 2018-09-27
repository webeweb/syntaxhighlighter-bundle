<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\Provider;

use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\SyntaxHighlighterBundle\API\SyntaxHighlighterStrings;
use WBW\Bundle\SyntaxHighlighterBundle\Provider\SyntaxHighlighterStringsProvider;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractFrameworkTestCase;

/**
 * SyntaxHighlighter strings provider test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\Provider
 * @final
 */
final class SyntaxHighlighterStringsProviderTest extends AbstractFrameworkTestCase {

    /**
     * Translator.
     *
     * @var TranslatorInterface
     */
    protected $translator;

    /**
     * @{inheritdoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();
        $this->translator->expects($this->any())->method("getLocale")->willReturn("en");
        $this->translator->expects($this->any())->method("trans")->willReturn("");
    }

    /**
     * Tests the getSyntaxHighlighterStrings() method.
     *
     * @return void
     */
    public function testGetSyntaxHighlighterStrings() {

        $obj = new SyntaxHighlighterStringsProvider($this->translator);

        $this->assertInstanceOf(SyntaxHighlighterStrings::class, $obj->getSyntaxHighlighterStrings());
    }

}
