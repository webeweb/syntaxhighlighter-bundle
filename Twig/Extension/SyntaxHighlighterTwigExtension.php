<?php

/*
 * This file is part of the WBWSyntaxHighlighterBundle package.
 *
 * (c) 2017 NdC/WBW
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension;

use Twig_Extension;
use Twig_SimpleFunction;
use WBW\Library\Core\Exception\File\FileNotFoundException;

/**
 * SyntaxHighlighter Twig extension.
 *
 * @author NdC/WBW <https://github.com/webeweb/>
 * @package WBW\Bundle\SyntaxHighlighterBundle\Twig\Extension
 * @final
 */
final class SyntaxHighlighterTwigExtension extends Twig_Extension {

	/**
	 * Service name.
	 */
	const SERVICE_NAME = "webeweb.syntaxhighlighter-bundle.twig.extension.syntaxhighlighter";

	/**
	 * Directory.
	 *
	 * @var string
	 */
	private $directory;

	/**
	 * Constructor.
	 *
	 * @param string $directory The directory.
	 */
	public final function __construct($directory) {
		$this->directory = $directory;
	}

	/**
	 * Get the Twig functions.
	 *
	 * @return array Returns the Twig functions.
	 */
	public function getFunctions() {
		return [
			new Twig_SimpleFunction('syntaxHighlighterScript', [$this, 'syntaxHighlighterScriptFunction'], ['is_safe' => ['html']]),
			new Twig_SimpleFunction('syntaxHighlighterStyle', [$this, 'syntaxHighlighterStyleFunction'], ['is_safe' => ['html']]),
		];
	}

	/**
	 * Get the resources directory.
	 *
	 * @return string Returns the resources directory.
	 */
	private function getResourcesDirectory() {
		return $this->directory . "/Resources";
	}

	/**
	 * Displays a SyntaxHighlighter resource.
	 *
	 * @param string $open The open.
	 * @param string $filename The filename.
	 * @param string $close The close.
	 * @throws FileNotFoundException Throws a SyntaxHighlighter file not found exception if the resource is not found.
	 */
	private function syntaxHighlighterResourceFunction($open, $filename, $close) {

		// Initialize and check the filepath.
		$filepath = $this->getResourcesDirectory() . "/public/" . $filename;
		if (!file_exists($filepath)) {
			throw new FileNotFoundException($filename);
		}

		// Return the output.
		return $open . $filename . $close;
	}

	/**
	 * Displays a SyntaxHighlighter script.
	 *
	 * @param string $script The script name.
	 * @return string Returns the SyntaxHighlighter script.
	 * @throws FileNotFoundException Throws a file not found exception if the script is not found.
	 */
	public function syntaxHighlighterScriptFunction($script) {

		// Initialize the filename.
		$filename = implode("/", ["scripts", $script . ".js"]);

		// Return the output.
		return $this->syntaxHighlighterResourceFunction("<script src=\"/bundles/wbwsyntaxhighlighter/", $filename, "\" type=\"text/javascript\"></script>");
	}

	/**
	 * Displays a SyntaxHighlighter style.
	 *
	 * @param string $css The CSS name.
	 * @return string Returns the SyntaxHighlighter style.
	 * @throws FileNotFoundException Throws a file not found exception if the CSS is not found.
	 */
	public function syntaxHighlighterStyleFunction($css) {

		// Initialize the filename.
		$filename = implode("/", ["styles", $css . ".css"]);

		// Return the output.
		return $this->syntaxHighlighterResourceFunction("<link href=\"/bundles/wbwsyntaxhighlighter/", $filename, "\" rel=\"stylesheet\" type=\"text/css\">");
	}

}
