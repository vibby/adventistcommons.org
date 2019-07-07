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

/* twigs/projects.twig */
class __TwigTemplate_789e2c84dfe636d3c613cc97170b96e6df93a313cde79595e4fab73d89549497 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/projects.twig", 1);
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
\t\t\t\t\t<h1>Adventist Commons</h1>
\t\t\t\t\t<p class=\"lead\">Contribute to a project below or browse <a href=\"/products\" class=\"text-secondary\">other available products</a> for more books and resources.</p>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t<h3>Translations In Progress</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-sm btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons align-top\">language</i> ";
        // line 20
        ((($context["selected_language"] ?? null)) ? (print (twig_escape_filter($this->env, $this->getAttribute(($context["selected_language"] ?? null), "name", []), "html", null, true))) : (print ("All Languages")));
        echo "
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/projects?language=all\">All languages</a>
\t\t\t\t\t\t\t\t\t";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 25
            echo "\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/projects?language=";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "id", []), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "name", []), "html", null, true);
            echo "</a>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--end of content list head-->
\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t";
        // line 33
        if ((twig_length_filter($this->env, ($context["projects"] ?? null)) == 0)) {
            // line 34
            echo "\t\t\t\t\t\t\t<p class=\"lead m-auto p-5\">
\t\t\t\t\t\t\t\t";
            // line 35
            if (($context["selected_language"] ?? null)) {
                // line 36
                echo "\t\t\t\t\t\t\t\t\tNo translations in progress for ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["selected_language"] ?? null), "name", []), "html", null, true);
                echo " – <a href='/projects?language=all'>view all languages</a>
\t\t\t\t\t\t\t\t";
            } else {
                // line 38
                echo "\t\t\t\t\t\t\t\t\tNo translations in progress. 
\t\t\t\t\t\t\t\t";
            }
            // line 40
            echo "\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t";
        }
        // line 42
        echo "\t\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["projects"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 43
            echo "\t\t\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t\t\t<div class=\"card card-project\">

\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: ";
            // line 47
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "percent_complete", []), "html", null, true);
            echo " %\"></div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t";
            // line 51
            if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
                // line 52
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown card-options\">
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-options\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">more_vert</i>
\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/delete/";
                // line 57
                echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "id", []), "html", null, true);
                echo "\" class=\"dropdown-item confirm-dialog\" data-confirm-message=\"Are you sure? All translated content will be destroyed.\">Delete</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 61
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "id", []), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<h5 data-filter-by=\"text\">";
            // line 63
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "product_name", []), "html", null, true);
            echo "<span class=\"badge badge-light text-secondary ml-1\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "language_name", []), "html", null, true);
            echo "</span></h5>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<ul class=\"avatars\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 67
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["project"], "members", []));
            foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
                // line 68
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"tooltip\" title=\"";
                // line 69
                echo twig_escape_filter($this->env, (($this->getAttribute($context["member"], "first_name", []) . " ") . $this->getAttribute($context["member"], "last_name", [])), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"avatar\" src=\"";
                // line 70
                echo twig_escape_filter($this->env, $this->getAttribute($context["member"], "avatar", []), "html", null, true);
                echo "\" data-filter-by=\"alt\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta d-flex justify-content-between\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons mr-1\">playlist_add_check</i>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">";
            // line 78
            echo twig_escape_filter($this->env, (($this->getAttribute($context["project"], "completed_strings", []) . "/") . $this->getAttribute($context["project"], "total_strings", [])), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\" data-filter-by=\"text\">";
            // line 80
            echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "status", []), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 86
        echo "\t\t\t\t\t</div>
\t\t\t\t\t<!--end of content list body-->
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "twigs/projects.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  205 => 86,  193 => 80,  188 => 78,  182 => 74,  172 => 70,  168 => 69,  165 => 68,  161 => 67,  152 => 63,  148 => 62,  145 => 61,  138 => 57,  131 => 52,  129 => 51,  122 => 47,  116 => 43,  111 => 42,  107 => 40,  103 => 38,  97 => 36,  95 => 35,  92 => 34,  90 => 33,  82 => 27,  71 => 25,  67 => 24,  60 => 20,  42 => 4,  39 => 3,  29 => 1,);
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
\t\t\t\t\t<h1>Adventist Commons</h1>
\t\t\t\t\t<p class=\"lead\">Contribute to a project below or browse <a href=\"/products\" class=\"text-secondary\">other available products</a> for more books and resources.</p>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t<h3>Translations In Progress</h3>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t<button class=\"btn btn-sm btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons align-top\">language</i> {{ selected_language ? selected_language.name : 'All Languages' }}
\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/projects?language=all\">All languages</a>
\t\t\t\t\t\t\t\t\t{% for language in languages  %}
\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/projects?language={{ language.id }}\">{{ language.name }}</a>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<!--end of content list head-->
\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t{% if projects|length == 0 %}
\t\t\t\t\t\t\t<p class=\"lead m-auto p-5\">
\t\t\t\t\t\t\t\t{% if selected_language %}
\t\t\t\t\t\t\t\t\tNo translations in progress for {{ selected_language.name }} – <a href='/projects?language=all'>view all languages</a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\tNo translations in progress. 
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t{% for project in projects  %}
\t\t\t\t\t\t\t<div class=\"col-lg-6\">
\t\t\t\t\t\t\t\t<div class=\"card card-project\">

\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: {{ project.percent_complete }} %\"></div>
\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t{% if user.is_admin %}
\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown card-options\">
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn-options\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">more_vert</i>
\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/delete/{{ project.id }}\" class=\"dropdown-item confirm-dialog\" data-confirm-message=\"Are you sure? All translated content will be destroyed.\">Delete</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/{{ project.id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t<h5 data-filter-by=\"text\">{{ project.product_name }}<span class=\"badge badge-light text-secondary ml-1\">{{ project.language_name }}</span></h5>
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<ul class=\"avatars\">
\t\t\t\t\t\t\t\t\t\t\t{% for member in project.members  %}
\t\t\t\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"tooltip\" title=\"{{ member.first_name  ~ \" \" ~ member.last_name }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img class=\"avatar\" src=\"{{ member.avatar }}\" data-filter-by=\"alt\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta d-flex justify-content-between\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons mr-1\">playlist_add_check</i>
\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">{{ project.completed_strings  ~ \"/\" ~ project.total_strings }}</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\" data-filter-by=\"text\">{{ project.status }}</span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t\t<!--end of content list body-->
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}", "twigs/projects.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/projects.twig");
    }
}
