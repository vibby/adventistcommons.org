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

/* twigs/feedback.twig */
class __TwigTemplate_efbb4584302740d95607dea791011ef524fde0365a12f5bfafa84806e46442d5 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/feedback.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header\">
\t\t\t\t\t<h1>Feedback</h1>
\t\t\t\t\t<p class=\"lead\">If you have any feedback or encounter any bugs &#128030;, please notify us below. Being very specific will help us reproduce the issue and solve the problem.</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-lg-6\">
\t\t\t\t<form action=\"/home/send_feedback\" method=\"post\" class=\"text-left auto-submit\">
\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t\t\t<input type=\"hidden\" name=\"referer\" value=\"";
        // line 15
        echo twig_escape_filter($this->env, ($context["http_referer"] ?? null), "html", null, true);
        echo "\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" placeholder=\"Name\" name=\"name\" value=\"";
        // line 17
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["user"] ?? null), "first_name", []) . " ") . $this->getAttribute(($context["user"] ?? null), "last_name", [])), "html", null, true);
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input class=\"form-control\" type=\"email\" placeholder=\"Email\" name=\"email\" value=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "email", []), "html", null, true);
        echo "\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<textarea class=\"form-control\" type=\"text\" placeholder=\"Message\" rows=\"8\" name=\"message\"></textarea>
\t\t\t\t\t</div>
\t\t\t\t\t<button class=\"btn btn-lg btn-block btn-primary\" role=\"button\" type=\"submit\">
\t\t\t\t\t\tSend Feedback
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "twigs/feedback.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 20,  63 => 17,  58 => 15,  54 => 14,  42 => 4,  39 => 3,  29 => 1,);
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
\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header\">
\t\t\t\t\t<h1>Feedback</h1>
\t\t\t\t\t<p class=\"lead\">If you have any feedback or encounter any bugs &#128030;, please notify us below. Being very specific will help us reproduce the issue and solve the problem.</p>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"col-lg-6\">
\t\t\t\t<form action=\"/home/send_feedback\" method=\"post\" class=\"text-left auto-submit\">
\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"{{ user.id }}\">
\t\t\t\t\t<input type=\"hidden\" name=\"referer\" value=\"{{ http_referer }}\">
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input class=\"form-control\" type=\"text\" placeholder=\"Name\" name=\"name\" value=\"{{ user.first_name  ~ \" \" ~ user.last_name }}\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<input class=\"form-control\" type=\"email\" placeholder=\"Email\" name=\"email\" value=\"{{ user.email }}\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t<textarea class=\"form-control\" type=\"text\" placeholder=\"Message\" rows=\"8\" name=\"message\"></textarea>
\t\t\t\t\t</div>
\t\t\t\t\t<button class=\"btn btn-lg btn-block btn-primary\" role=\"button\" type=\"submit\">
\t\t\t\t\t\tSend Feedback
\t\t\t\t\t</button>
\t\t\t\t</form>
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}", "twigs/feedback.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/feedback.twig");
    }
}
