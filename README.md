syntaxhighlighter-bundle
========================

[![Build Status](https://travis-ci.org/webeweb/syntaxhighlighter-bundle.svg?branch=master)](https://travis-ci.org/webeweb/syntaxhighlighter-bundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/syntaxhighlighter-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/syntaxhighlighter-bundle?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/stable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/unstable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![License](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/license)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![composer.lock](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/composerlock)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/778dc4ef-a0d6-4193-a40e-e9a151c8a801/mini.png)](https://insight.sensiolabs.com/projects/778dc4ef-a0d6-4193-a40e-e9a151c8a801)

Integrate SyntaxHighlighter with Symfony2

/!\ This package is currently in developpment /!\

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash

$ composer require webeweb/syntaxhighlighter-bundle "~1.0@dev"

```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php

	public function registerBundles() {
		$bundles = [
            // ...
            new WBW\Bundle\SyntaxHighlighterBundle\WBWSyntaxHighlighterBundle(),
        ];

		// ...

		return $bundles;
    }

```

Once the bundle is added then do:

```bash

$ php bin/console assets:install

```

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash

$ mkdir syntaxhighlighter-bundle
$ cd syntaxhighlighter-bundle
$ git clone git@github.com:webeweb/syntaxhighlighter-bundle.git .
$ composer install

```

Once all required libraries are installed then do:

```bash

$ vendor/bin/phpunit

```

---

## License

syntaxhighlighter-bundle is released under the LGPL License. See the bundled
[LICENSE](LICENSE) file for details.
