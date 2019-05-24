<?php

/*
 * This file is part of the syntaxhighlighter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection;

use Exception;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\Configuration;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\WBWSyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\Provider\SyntaxHighlighterStringsProvider;
use WBW\Bundle\SyntaxHighlighterBundle\Tests\AbstractTestCase;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;

/**
 * SyntaxHighlighter extension test.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection
 */
class WBWSyntaxHighlighterExtensionTest extends AbstractTestCase {

    /**
     * Configs.
     *
     * @var array
     */
    private $configs;

    /**
     * {@inheritDoc}
     */
    protected function setUp() {
        parent::setUp();

        // Set a configs array mock.
        $this->configs = [
            "wbw_syntaxhighlighter" => [
                "twig" => true,
            ],
        ];
    }

    /**
     * Tests the getConfiguration() method.
     *
     * @return void
     */
    public function testGetConfiguration() {

        $obj = new WBWSyntaxHighlighterExtension();

        $this->assertInstanceOf(Configuration::class, $obj->getConfiguration([], $this->containerBuilder));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     * @throws Exception Throws an exception if an error occurs.
     */
    public function testLoad() {

        $obj = new WBWSyntaxHighlighterExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        // Providers
        $this->assertInstanceOf(SyntaxHighlighterStringsProvider::class, $this->containerBuilder->get(SyntaxHighlighterStringsProvider::SERVICE_NAME));

        // Twig extensions
        $this->assertInstanceOf(SyntaxHighlighterTwigExtension::class, $this->containerBuilder->get(SyntaxHighlighterTwigExtension::SERVICE_NAME));
    }

    /**
     * Tests the load() method.
     *
     * @return void
     */
    public function testLoadWithoutTwig() {

        // Set the configs mock.
        $this->configs["wbw_syntaxhighlighter"]["twig"] = false;

        $obj = new WBWSyntaxHighlighterExtension();

        $this->assertNull($obj->load($this->configs, $this->containerBuilder));

        try {

            $this->containerBuilder->get(SyntaxHighlighterTwigExtension::SERVICE_NAME);
        } catch (Exception $ex) {

            $this->assertInstanceOf(ServiceNotFoundException::class, $ex);
            $this->assertContains(SyntaxHighlighterTwigExtension::SERVICE_NAME, $ex->getMessage());
        }
    }
}
