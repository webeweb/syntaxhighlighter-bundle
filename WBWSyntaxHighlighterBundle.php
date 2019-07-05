<?php

/*
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2017 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;
use WBW\Bundle\SyntaxHighlighterBundle\DependencyInjection\WBWSyntaxHighlighterExtension;

/**
 * SyntaxHighlighter bundle.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle
 */
class WBWSyntaxHighlighterBundle extends Bundle implements AssetsProviderInterface {

    /**
     * {@inheritDoc}
     */
    public function getAssetsRelativeDirectory() {
        return self::ASSETS_RELATIVE_DIRECTORY;
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension() {
        return new WBWSyntaxHighlighterExtension();
    }
}
