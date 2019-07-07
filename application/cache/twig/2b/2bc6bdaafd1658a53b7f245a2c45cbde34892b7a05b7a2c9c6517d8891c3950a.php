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

/* twigs/email/forgot_password.twig */
class __TwigTemplate_ffa76412ddd6b560d53e2f12999ee9a90a9b35eee11affb8cbba3d3bfc4e62f5 extends \Twig\Template
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
        return "twigs/email/template.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("twigs/email/template.twig", "twigs/email/forgot_password.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<p style=\"font-size: 13px; margin: 10px 0;\"><span style=\"color:#444444\">Hello ";
        echo twig_escape_filter($this->env, ($context["user"] ?? null), "html", null, true);
        echo ", </span></p>
\t<p>Having some trouble getting into your account? Click the button below to reset your password.</p>

\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-collapse:separate;line-height:100%;margin:auto;\">
\t\t<tr>
\t\t\t<td align=\"center\" bgcolor=\"#414141\" role=\"presentation\" style=\"border:none;border-radius:3px;cursor:auto;padding:10px 25px;background:#414141;\" valign=\"middle\">
\t\t\t\t<a href=\"";
        // line 10
        echo twig_escape_filter($this->env, ($context["link"] ?? null), "html", null, true);
        echo "\" style=\"background:#414141;color:#ffffff;font-family:Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;\" target=\"_blank\">Create a new password</a>
\t\t\t</td>
\t\t</tr>
\t</table>
";
    }

    public function getTemplateName()
    {
        return "twigs/email/forgot_password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 10,  42 => 4,  39 => 3,  29 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends \"twigs/email/template.twig\" %}

{% block content %}
\t<p style=\"font-size: 13px; margin: 10px 0;\"><span style=\"color:#444444\">Hello {{ user }}, </span></p>
\t<p>Having some trouble getting into your account? Click the button below to reset your password.</p>

\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-collapse:separate;line-height:100%;margin:auto;\">
\t\t<tr>
\t\t\t<td align=\"center\" bgcolor=\"#414141\" role=\"presentation\" style=\"border:none;border-radius:3px;cursor:auto;padding:10px 25px;background:#414141;\" valign=\"middle\">
\t\t\t\t<a href=\"{{ link }}\" style=\"background:#414141;color:#ffffff;font-family:Arial, sans-serif;font-size:13px;font-weight:normal;line-height:120%;Margin:0;text-decoration:none;text-transform:none;\" target=\"_blank\">Create a new password</a>
\t\t\t</td>
\t\t</tr>
\t</table>
{% endblock %}", "twigs/email/forgot_password.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/email/forgot_password.twig");
    }
}
