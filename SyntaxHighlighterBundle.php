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
use WBW\Bundle\CoreBundle\Provider\AssetsProviderInterface;

/**
 * SyntaxHighlighter bundle.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle
 */
class SyntaxHighlighterBundle extends Bundle implements AssetsProviderInterface {

    /**
     * {@inheritdoc}
     */
    public function getAssetsRelativeDirectory() {
        return "/Resources/assets";
    }

}
