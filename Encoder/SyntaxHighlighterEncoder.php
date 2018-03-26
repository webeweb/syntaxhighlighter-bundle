<?php

/**
 * This file is part of the syntaxhighligter-bundle package.
 *
 * (c) 2018 WEBEWEB
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Encoder;

use WBW\Library\Core\Utility\StringUtility;

/**
 * SyntaxHighlighter encoder.
 *
 * @author webeweb <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Encoder
 * @final
 */
final class SyntaxHighlighterEncoder {

    /**
     * Convert a array value.
     *
     * @param array $value The array value.
     * @param array $output The output array.
     * @param string $prefix The prefix.
     * @param string $suffix The suffix.
     */
    public static function arrayToString(array $value, array &$output, $prefix, $suffix) {
        if (null !== $value) {
            $output[] = $prefix . "[" . implode(", ", $value) . "]" . $suffix;
        }
    }

    /**
     * Convert a boolean value.
     *
     * @param boolean $value The boolean value.
     * @param array $output The output array.
     * @param string $prefix The prefix.
     * @param string $suffix The suffix.
     */
    public static function booleanToString($value, array &$output, $prefix, $suffix) {
        if (null !== $value) {
            $output[] = $prefix . StringUtility::parseBoolean($value) . $suffix;
        }
    }

    /**
     * Convert a string value.
     *
     * @param string $value The string value.
     * @param array $output The output array.
     * @param string $prefix The prefix.
     * @param string $suffix The suffix.
     */
    public static function stringToString($value, array &$output, $prefix, $suffix) {
        if (null !== $value) {
            $output[] = $prefix . $value . $suffix;
        }
    }

}
