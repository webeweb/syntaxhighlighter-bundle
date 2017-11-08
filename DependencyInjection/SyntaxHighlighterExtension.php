<?php

/*
 * This file is part of the syntaxhighligter-bundle.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * SyntaxHiglighter extension.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection
 * @final
 */
final class SyntaxHighlighterExtension extends Extension {

	/**
	 * {@inheritdoc}
	 */
	public function load(array $configs, ContainerBuilder $container) {

		// Create the file locator.
		$fileLocator = new FileLocator(__DIR__ . "/../Resources/config");

		// Load the services.
		$serviceLoader = new YamlFileLoader($container, $fileLocator);
		$serviceLoader->load("services.yml");
	}

}
