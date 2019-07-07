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

/* twigs/auth/forgot_password.twig */
class __TwigTemplate_b6fc807d61d4deb3523253a36b1067dd1a10aa952b9a567b1be26a6a33b253db extends \Twig\Template
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
        return "twigs/utility_template.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("twigs/utility_template.twig", "twigs/auth/forgot_password.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<h1 class=\"h2\">Forgot password &#x1f62B;</h1>
\t<p class=\"lead\">Enter your email address to reset</p>
\t";
        // line 6
        if (($context["message"] ?? null)) {
            // line 7
            echo "\t\t<div class=\"alert alert-warning\">";
            echo twig_escape_filter($this->env, ($context["message"] ?? null), "html", null, true);
            echo "</div>
\t";
        }
        // line 9
        echo "\t<form action=\"forgot_password\" method=\"post\" data-loading-text=\"loading...\">
\t\t<div class=\"form-group\">
\t\t\t<input class=\"form-control\" type=\"email\" placeholder=\"Email Address\" name=\"identity\" />
\t\t</div>
\t\t<button class=\"btn btn-lg btn-block btn-primary\" role=\"button\" type=\"submit\">
\t\t\tSend reset link
\t\t</button>
\t</form>
";
    }

    public function getTemplateName()
    {
        return "twigs/auth/forgot_password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 9,  48 => 7,  46 => 6,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"twigs/utility_template.twig\" %}

{% block content %}
\t<h1 class=\"h2\">Forgot password &#x1f62B;</h1>
\t<p class=\"lead\">Enter your email address to reset</p>
\t{% if message %}
\t\t<div class=\"alert alert-warning\">{{ message }}</div>
\t{% endif %}
\t<form action=\"forgot_password\" method=\"post\" data-loading-text=\"loading...\">
\t\t<div class=\"form-group\">
\t\t\t<input class=\"form-control\" type=\"email\" placeholder=\"Email Address\" name=\"identity\" />
\t\t</div>
\t\t<button class=\"btn btn-lg btn-block btn-primary\" role=\"button\" type=\"submit\">
\t\t\tSend reset link
\t\t</button>
\t</form>
{% endblock %}", "twigs/auth/forgot_password.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/auth/forgot_password.twig");
    }
}
