<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection;

use PHPUnit_Framework_TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\HttpKernel\Kernel;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\SyntaxHighlighterExtension;
use WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension\SyntaxHighlighterTwigExtension;

/**
 * SyntaxHighlighter extension test.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Tests\DependencyInjection
 * @final
 */
final class SyntaxHighlighterExtensionTest extends PHPUnit_Framework_TestCase {

	/**
	 * Tests the load() method.
	 *
	 * @return void
	 */
	public function testLoad() {

		// Set the mocks.
		$kernel = $this->getMockBuilder(Kernel::class)->setConstructorArgs(["dev", false])->getMock();

		// We set a container builder with only the necessary.
		$container = new ContainerBuilder(new ParameterBag(["kernel.environment" => "dev"]));
		$container->set("kernel", $kernel);

		$obj = new SyntaxHighlighterExtension();

		$obj->load([], $container);
		$this->assertInstanceOf(SyntaxHighlighterTwigExtension::class, $container->get(SyntaxHighlighterTwigExtension::SERVICE_NAME));
	}

}
