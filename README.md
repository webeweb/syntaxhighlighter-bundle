WBWSyntaxHighlighterBundle
====================

[![Build Status](https://travis-ci.org/webeweb/WBWSyntaxHighlighterBundle.svg?branch=master)](https://travis-ci.org/webeweb/WBWSyntaxHighlighterBundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/WBWSyntaxHighlighterBundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/WBWSyntaxHighlighterBundle?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/stable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/unstable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![License](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/license)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![composer.lock](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/composerlock)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![SensioLabsInsight](https://insight.sensiolabs.com/projects/778dc4ef-a0d6-4193-a40e-e9a151c8a801/mini.png)](https://insight.sensiolabs.com/projects/778dc4ef-a0d6-4193-a40e-e9a151c8a801)

/!\ This package is currently in developpment /!\

---

## Installation

Edit `composer.json` file to add this bundle package:

```yml

"require": {
    ...
    "webeweb/syntaxhighlighter-bundle": "~1.0@dev"
},

```

Run `composer update webeweb/syntaxhighlighter-bundle`

---

## Testing

To test the package, is better to clone this repository on your computer. After, go to the package folder and do
the following (assuming you have `composer` installed on your computer):

```bash

$ composer install --no-interaction --prefer-source --dev

```

Once all required libraries are installed then do:

```bash

$ vendor/bin/phpunit

```

---

## License

WBWSyntaxHighlighterBundle is released under the LGPL License. See the bundled [LICENSE](LICENSE) file for details.
