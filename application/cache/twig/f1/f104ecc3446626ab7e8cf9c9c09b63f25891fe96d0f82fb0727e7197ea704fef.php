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

/* twigs/home.twig */
class __TwigTemplate_b5a0fda6e272bb60dd3200e41ce86add5e07f34de7ee9395953dcc17c9722b64 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "twigs/template.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/home.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t
\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11 text-center\">
\t\t\t\t<h1 class=\"mt-4\">How it Works</h1>
\t\t\t\t<p class=\"lead\">Training resources that are free, translatable, sharable.</p>
\t\t\t\t<div class=\"row mt-4\">
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/products\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/browse.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/products\">Browse Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/projects\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/translate.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/projects\">Translate Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/products\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/download.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/products\">Download Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"jumbotron jumbotron-fluid bg-dark text-white\">
\t\t<div class=\"container text-center\">
\t\t\t<p class=\"lead d-inline-block text-left\">
\t\t\t\t<b>Ready to bring resources to the 10/40 window?</b><br>
\t\t\t\t<span>Adventist Commons needs your help</span>
\t\t\t</p>
\t\t\t<a href=\"/projects\" class=\"btn btn-primary btn-lg ml-4\">Get Started</a>
\t\t</div>
\t</div>

";
    }

    public function getTemplateName()
    {
        return "twigs/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"twigs/template.twig\" %}

{% block content %}
\t
\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11 text-center\">
\t\t\t\t<h1 class=\"mt-4\">How it Works</h1>
\t\t\t\t<p class=\"lead\">Training resources that are free, translatable, sharable.</p>
\t\t\t\t<div class=\"row mt-4\">
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/products\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/browse.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/products\">Browse Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/projects\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/translate.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/projects\">Translate Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-4\">
\t\t\t\t\t\t<div class=\"card mb-3\">
\t\t\t\t\t\t\t<a href=\"/products\">
\t\t\t\t\t\t\t\t<img class=\"card-img-top mt-4 w-25\" src=\"assets/img/download.svg\">
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t<a class=\"card-title h6\" href=\"/products\">Download Products</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<div class=\"jumbotron jumbotron-fluid bg-dark text-white\">
\t\t<div class=\"container text-center\">
\t\t\t<p class=\"lead d-inline-block text-left\">
\t\t\t\t<b>Ready to bring resources to the 10/40 window?</b><br>
\t\t\t\t<span>Adventist Commons needs your help</span>
\t\t\t</p>
\t\t\t<a href=\"/projects\" class=\"btn btn-primary btn-lg ml-4\">Get Started</a>
\t\t</div>
\t</div>

{% endblock %}", "twigs/home.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/home.twig");
    }
}
