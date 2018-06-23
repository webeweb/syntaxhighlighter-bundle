syntaxhighlighter-bundle
========================

[![Build Status](https://travis-ci.org/webeweb/syntaxhighlighter-bundle.svg?branch=master)](https://travis-ci.org/webeweb/syntaxhighlighter-bundle) [![Coverage Status](https://coveralls.io/repos/github/webeweb/syntaxhighlighter-bundle/badge.svg?branch=master)](https://coveralls.io/github/webeweb/syntaxhighlighter-bundle?branch=master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/webeweb/syntaxhighlighter-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/webeweb/syntaxhighlighter-bundle/?branch=master) [![Latest Stable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/stable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![Latest Unstable Version](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/v/unstable)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![License](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/license)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle) [![composer.lock](https://poser.pugx.org/webeweb/syntaxhighlighter-bundle/composerlock)](https://packagist.org/packages/webeweb/syntaxhighlighter-bundle)

Integrate SyntaxHighlighter with Symfony 2.

> IMPORTANT NOTICE: This package is still under development. Any changes will be
> done without prior notice to consumers of this package. Of course this code
> will become stable at a certain point, but for now, use at your own risk.

Includes:

- [SyntaxHighlighter 3.0.83](https://github.com/syntaxhighlighter/syntaxhighlighter/)

---

## Compatibility

[![PHP](https://img.shields.io/badge/PHP-%5E5.6%7C%5E7.0-blue.svg)](http://php.net) [![HHVM](https://img.shields.io/badge/HHVM-ready-orange.svg)](https://hhvm.com/) [![Symfony](https://img.shields.io/badge/Symfony-%5E2.6%7C%5E3.0-brightgreen.svg)](https://symfony.com)

---

## Installation

Open a command console, enter your project directory and execute the following
command to download the latest stable version of this package:

```bash
$ composer require webeweb/syntaxhighlighter-bundle "^1.0"
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
            new WBW\Bundle\SyntaxHighlighterBundle\SyntaxHighlighterBundle(),
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

## Usage

### 1) Controller

```php
    // ...
    // Initialize the SyntaxHighlighter config.
    $config = new SyntaxHighlighterConfig();
    $config->setStrings(new SyntaxHighlighterStrings());

    // Initialize the SyntaxHighlighter defaults.
    $defaults = new SyntaxHighlighterDefaults();

    // Returns the response.
    return $this->render("@AppBundle:Controller:action"), [
            "syntaxHighlighterConfig"   => $config,
            "syntaxHighlighterContent"  => $content,
            "syntaxHighlighterDefaults" => $defaults,
    ]);
    // ...
```

### 2) Template

```html
{# src/AppBundle/Resources/views/Controller/action.html.twig #}

{% block stylesheet %}
    {{ parent() }}
    {% include "@SyntaxHighlighter/include/styles.html.twig" with {"theme": "eclipse"} %}
{% endblock %}

{% block content %}
    {{ syntaxHighlighterContent({"tag": "pre", "content": syntaxHighlighterContent, "language": "php"}) }}
    {# syntaxHighlighterContent({"tag": "pre", "filename": "filename", "language": "php"}) #}
{% endblock %}

{% block javascript %}
    {{ parent() }}
    {% include "@SyntaxHighlighter/include/scripts.html.twig" %}
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
