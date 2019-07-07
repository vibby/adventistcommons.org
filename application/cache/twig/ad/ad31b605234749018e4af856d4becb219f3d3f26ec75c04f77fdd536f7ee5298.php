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

/* twigs/auth/list.twig */
class __TwigTemplate_c212eca6672c87f3e2ab54b2d378e263ff57b11d5ef54fbcc41ab905f2c2624a extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'title' => [$this, 'block_title'],
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/auth/list.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        echo "Adventist Commons | ";
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo " ";
    }

    // line 4
    public function block_content($context, array $blocks = [])
    {
        // line 5
        echo "\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h1>Users</h1>
\t\t\t\t</div>
\t\t\t\t<div class=\"card p-4\">
\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t<table class=\"table\">
\t\t\t\t\t\t\t<tr class=\"table-borderless\">
\t\t\t\t\t\t\t\t<th>Picture</th>
\t\t\t\t\t\t\t\t<th>First name</th>
\t\t\t\t\t\t\t\t<th>Last name</th>
\t\t\t\t\t\t\t\t<th>Email</th>
\t\t\t\t\t\t\t\t<th>Access Level</th>
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["users"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 23
            echo "\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td><img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/";
            // line 24
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "md5email", []), "html", null, true);
            echo "?s=80&d=mp\" class=\"avatar\" /></td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "first_name", []), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "last_name", []), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "email", []), "html", null, true);
            echo "</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["user"], "groups", []));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 30
                echo "\t\t\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "description", []), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<a href=\"/user/edit/";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["user"], "id", []), "html", null, true);
            echo "\" class=\"btn btn-sm btn-outline-secondary\">Edit</a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "twigs/auth/list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 38,  111 => 34,  107 => 32,  98 => 30,  94 => 29,  89 => 27,  85 => 26,  81 => 25,  77 => 24,  74 => 23,  70 => 22,  51 => 5,  48 => 4,  40 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'twigs/template.twig' %}

{% block title %}Adventist Commons | {{title}} {% endblock %}
{% block content %}
\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h1>Users</h1>
\t\t\t\t</div>
\t\t\t\t<div class=\"card p-4\">
\t\t\t\t\t<div class=\"table-responsive\">
\t\t\t\t\t\t<table class=\"table\">
\t\t\t\t\t\t\t<tr class=\"table-borderless\">
\t\t\t\t\t\t\t\t<th>Picture</th>
\t\t\t\t\t\t\t\t<th>First name</th>
\t\t\t\t\t\t\t\t<th>Last name</th>
\t\t\t\t\t\t\t\t<th>Email</th>
\t\t\t\t\t\t\t\t<th>Access Level</th>
\t\t\t\t\t\t\t\t<th></th>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t{% for user in users  %}
\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t<td><img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/{{user.md5email}}?s=80&d=mp\" class=\"avatar\" /></td>
\t\t\t\t\t\t\t\t\t<td>{{user.first_name}}</td>
\t\t\t\t\t\t\t\t\t<td>{{user.last_name}}</td>
\t\t\t\t\t\t\t\t\t<td>{{user.email}}</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t{% for group in user.groups %}
\t\t\t\t\t\t\t\t\t\t\t{{group.description}}
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t\t<a href=\"/user/edit/{{user.id}}\" class=\"btn btn-sm btn-outline-secondary\">Edit</a>
\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</table>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}", "twigs/auth/list.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/auth/list.twig");
    }
}
