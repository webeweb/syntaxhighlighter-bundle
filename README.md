syntaxhighlighter-bundle
========================

[![Build Status](https://travis-ci.org/webeweb/syntaxhighlighter-bundle.svg?branch=master)](https://travis-ci.org/webeweb/syntaxhighlighter-bundle)
[![Coverage Status](https://coveralls.io/repos/github/webeweb/syntaxhighlighter-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/syntaxhighlighter-bundle?branch=master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/syntaxhighlighter-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/syntaxhighlighter-bundle/?branch=master)
[![Latest Stable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/stable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle)
[![Latest Unstable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/unstable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle)
[![License](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/license)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle)
[![composer.lock](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/composerlock)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle)

Integrate SyntaxHighlighter with Symfony 2 and more.

`syntaxhighlighter-bundle` eases the use of SyntaxHighlighter to highlight
syntax in your Symfony application by providing Twig extensions and PHP
objects to do the heavy lifting. The bundle include the excellent JS library
[SyntaxHighlighter](http://alexgorbatchev.com/SyntaxHighlighter/).

Dry out your SyntaxHighlighter code by writing it all in PHP !

Includes:

- [SyntaxHighlighter 3.0.83](http://alexgorbatchev.com/SyntaxHighlighter/)

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net)
[![Symfony](https://img.shields.io/badge/Symfony-%5E2.7%7C%5E3.0%7C%5E4.0-brightgreen.svg)](https://symfony.com)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/syntaxhighlighter-bundle "^3.0"
```

This command requires you to have Composer installed globally, as explained in
the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the
Composer documentation.

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
    public function registerBundles() {
        $bundles = [
            // ...
            new WBW\Bundle\CoreBundle\CoreBundle(),
            new WBW\Bundle\SyntaxHighlighterBundle\SyntaxHighlighterBundle(),
        ];

        // ...

        return $bundles;
    }
```

Once the bundle is added then do:

```bash
$ php bin/console wbw:core:unzip-assets
$ php bin/console assets:install
```

---

## Usage

### 1) Controller

```php
    public function indexAction(Request $request) {

        // ...

        // Initialize the SyntaxHighlighter config.
        $config = new SyntaxHighlighterConfig();
        $config->setStrings(new SyntaxHighlighterStrings());

        // Initialize the SyntaxHighlighter defaults.
        $defaults = new SyntaxHighlighterDefaults();

        // Initialize the SyntaxHighlighter content.
        $content = "<?php\nphpinfo();";

        // Return the response.
        return $this->render("@AppBundle:DefaultController:index"), [
                "syntaxHighlighterConfig"   => $config,
                "syntaxHighlighterContent"  => $content,
                "syntaxHighlighterDefaults" => $defaults,
        ]);
    }
```

### 2) Template

```html
{# src/AppBundle/Resources/views/Default/index.html.twig #}

{% block stylesheets %}
    {{ parent() }}
    {% include "@SyntaxHighlighter/layout/stylesheets.html.twig" with {"shTheme": "eclipse"} %}
{% endblock %}

{% block content %}
    {{ syntaxHighlighterContent({"tag": "pre", "content": syntaxHighlighterContent, "language": "php"}) }}
    {# syntaxHighlighterContent({"tag": "pre", "filename": "/path/to/file.html", "language": "html"}) #}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {% include "@SyntaxHighlighter/layout/javascripts.html.twig" %}
    {{ syntaxHighlighterConfig(syntaxHighlighterConfig)|syntaxHighlighterScript() }}
    {{ syntaxHighlighterDefaults(syntaxHighlighterDefaults)|syntaxHighlighterScript() }}
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>
{% endblock %}
```

---

## Testing

To test the package, is better to clone this repository on your computer.
Open a command console and execute the following commands to download the latest
stable version of this package:

```bash
$ git clone https://github.com/webeweb/syntaxhighlighter-bundle.git
$ cd syntaxhighlighter-bundle
$ composer install
```

Once all required libraries are installed then do:

```bash
$ vendor/bin/phpunit
```

---

## License

`syntaxhighlighter-bundle` is released under the LGPL License. See the bundled
[LICENSE](LICENSE) file for details.
