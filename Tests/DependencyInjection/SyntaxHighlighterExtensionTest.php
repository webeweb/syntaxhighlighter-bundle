<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Translation\TranslatorInterface;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\SyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\Provider\SyntaxHighlighterStringsProvider;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractFrameworkTestCase;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;

/**
 * SyntaxHighlighter extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection
 * @final
 */
final class SyntaxHighlighterExtensionTest extends AbstractFrameworkTestCase {

    /**
     * Container builder.
     *
     * @var ContainerBuilder
     */
    protected $containerBuilder;

    /**
     * Kernel.
     *
     * @var KernelInterface
     */
    protected $kernel;

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

        // Set a Kernel mock.
        $this->kernel = $this->getMockBuilder(KernelInterface::class)->getMock();

        // Set a Translator mock.
        $this->translator = $this->getMockBuilder(TranslatorInterface::class)->getMock();

        // We set a container builder with only the necessary.
        $this->containerBuilder = new ContainerBuilder(new ParameterBag(["kernel.environment" => "dev"]));
        $this->containerBuilder->set("kernel", $this->kernel);
        $this->containerBuilder->set("translator", $this->translator);
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoad() {

        $obj = new SyntaxHighlighterExtension();

        $obj->load([], $this->containerBuilder);

        $this->assertInstanceOf(SyntaxHighlighterStringsProvider::class, $this->containerBuilder->get(SyntaxHighlighterStringsProvider::SERVICE_NAME));
        $this->assertInstanceOf(SyntaxHighlighterTwigExtension::class, $this->containerBuilder->get(SyntaxHighlighterTwigExtension::SERVICE_NAME));
    }

}
