DOCUMENTATION
=============

Add the following lines in the `app/config/config.yml` file of your project:

```yaml
wbw_syntaxhighlighter:
    theme:   "Default"
    brushes:
        - "Php"
        - "Css"
        - "JScript"
```

Add the following code in a controller class:

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

Add the following code in the corresponding template:

```html
{# src/AppBundle/Resources/views/Default/index.html.twig #}

{% block stylesheets %}
    {{ parent() }}
    {% include "@WBWSyntaxHighlighter/layout/stylesheets.html.twig" %}
{% endblock %}

{% block content %}
    {{ syntaxHighlighterContent({"tag": "pre", "content": syntaxHighlighterContent, "language": "php"}) }}
    {# syntaxHighlighterContent({"tag": "pre", "filename": "/path/to/file.html", "language": "html"}) #}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    {% include "@WBWSyntaxHighlighter/layout/javascripts.html.twig" %}
    {{ syntaxHighlighterConfig(syntaxHighlighterConfig)|syntaxHighlighterScript() }}
    {{ syntaxHighlighterDefaults(syntaxHighlighterDefaults)|syntaxHighlighterScript() }}
<script type="text/javascript">
    SyntaxHighlighter.all();
</script>
{% endblock %}
```
