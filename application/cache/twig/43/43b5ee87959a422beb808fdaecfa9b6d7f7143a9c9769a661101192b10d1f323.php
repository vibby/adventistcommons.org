<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* twigs/utility_template.twig */
class __TwigTemplate_260232f35599e38b13a61e0028c168bcd9546a8352ff763f85f8b971ce73a6dc extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">

    <head>
        <meta charset=\"utf-8\">
        <title>Adventist Commons | ";
        // line 6
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"icon\" href=\"/assets/img/favicon.png\">
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/css?family=Gothic+A1\" rel=\"stylesheet\">
        <link href=\"/assets/css/theme.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    </head>

    <body>
        <div class=\"main-container fullscreen\">
            <div class=\"container\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-xl-5 col-lg-6 col-md-7\">
                        <div class=\"text-center\">
                            ";
        // line 20
        $this->displayBlock('content', $context, $blocks);
        // line 21
        echo "                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type=\"text/javascript\" src=\"/assets/js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/autosize.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/popper.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/prism.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/draggable.bundle.legacy.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/swap-animation.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/dropzone.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/list.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/bootstrap.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/selectize.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/theme.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.timeago.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/app.js?v=1\"></script>
\t\t<link href=\"/assets/css/selectize.bootstrap3.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />

    </body>

</html>
";
    }

    // line 20
    public function block_content($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "twigs/utility_template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 20,  57 => 21,  55 => 20,  38 => 6,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html lang=\"en\">

    <head>
        <meta charset=\"utf-8\">
        <title>Adventist Commons | {{ title }}</title>
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <link rel=\"icon\" href=\"/assets/img/favicon.png\">
        <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
        <link href=\"https://fonts.googleapis.com/css?family=Gothic+A1\" rel=\"stylesheet\">
        <link href=\"/assets/css/theme.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
    </head>

    <body>
        <div class=\"main-container fullscreen\">
            <div class=\"container\">
                <div class=\"row justify-content-center\">
                    <div class=\"col-xl-5 col-lg-6 col-md-7\">
                        <div class=\"text-center\">
                            {% block content %}{% endblock %}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type=\"text/javascript\" src=\"/assets/js/jquery.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/autosize.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/popper.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/prism.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/draggable.bundle.legacy.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/swap-animation.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/dropzone.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/list.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/bootstrap.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/selectize.min.js\"></script>
        <script type=\"text/javascript\" src=\"/assets/js/theme.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.timeago.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/app.js?v=1\"></script>
\t\t<link href=\"/assets/css/selectize.bootstrap3.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />

    </body>

</html>
", "twigs/utility_template.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/utility_template.twig");
    }
}
