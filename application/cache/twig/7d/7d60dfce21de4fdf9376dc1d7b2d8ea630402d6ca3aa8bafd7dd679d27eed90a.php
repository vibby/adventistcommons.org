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

/* twigs/project.twig */
class __TwigTemplate_e9ef91fd4d8073039ce6962c3938da5e721fd8d48f5b290ccea90ac82c92fc51 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/project.twig", 1);
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
\t\t\t\t\t<h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "name", []), "html", null, true);
        echo " <span class=\"badge badge-secondary text-light ml-1\">";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "language_name", []), "html", null, true);
        echo "</span></h1>
\t\t\t\t\t<p class=\"lead\">";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "description", []), "html", null, true);
        echo "</p>
\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t<ul class=\"avatars\">
\t\t\t\t\t\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["members"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 13
            echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
            // line 14
            echo twig_escape_filter($this->env, (($this->getAttribute($context["member"], "first_name", []) . " ") . $this->getAttribute($context["member"], "last_name", [])), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<img class=\"avatar\" src=\"";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["member"], "avatar", []), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 19
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" style=\"width:";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "percent_complete", []), "html", null, true);
        echo "%;\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex justify-content-between text-small\">
\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t<i class=\"material-icons\">playlist_add_check</i>
\t\t\t\t\t\t\t\t<span>";
        // line 28
        echo twig_escape_filter($this->env, ((((($this->getAttribute(($context["project"] ?? null), "completed_strings", []) . " / ") . $this->getAttribute(($context["project"] ?? null), "total_strings", [])) . " (") . $this->getAttribute(($context["project"] ?? null), "percent_complete", [])) . "%)"), "html", null, true);
        echo "</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<span>";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "status", []), "html", null, true);
        echo "</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<ul class=\"nav nav-tabs nav-fill\" role=\"tablist\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link active\" data-toggle=\"tab\" href=\"#content\" role=\"tab\">Content</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" data-toggle=\"tab\" href=\"#members\" role=\"tab\">Contributors</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"tab-pane fade show active\" id=\"content\" role=\"tabpanel\">
\t\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t\t<h3>Content</h3>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t\t\t<div class=\"card-list\">
\t\t\t\t\t\t\t\t<div class=\"card-list-body\">
\t\t\t\t\t\t\t\t\t";
        // line 53
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["sections"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["section"]) {
            // line 54
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"card card-task\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: ";
            // line 56
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "percent_complete", []), "html", null, true);
            echo "%\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/editor/";
            // line 60
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["project"] ?? null), "id", []) . "/") . $this->getAttribute($context["section"], "id", [])), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h6 data-filter-by=\"text\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["section"], "name", []), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">playlist_add_check</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 65
            echo twig_escape_filter($this->env, (($this->getAttribute($context["section"], "completed_strings", []) . "/") . $this->getAttribute($context["section"], "total_strings", [])), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/editor/";
            // line 69
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["project"] ?? null), "id", []) . "/") . $this->getAttribute($context["section"], "id", [])), "html", null, true);
            echo "\" class=\"btn btn-secondary\">Start Translating</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['section'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tab-pane fade show\" id=\"members\" role=\"tabpanel\">
\t\t\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t\t\t<h3>Contributors</h3>
\t\t\t\t\t\t\t\t\t";
        // line 83
        if (($context["can_manage_members"] ?? null)) {
            // line 84
            echo "\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-round\" data-toggle=\"modal\" data-target=\"#member-add-modal\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">add</i>
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t";
        }
        // line 88
        echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t\t\t";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["members"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["member"]) {
            // line 92
            echo "\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t<a class=\"media media-member\">
\t\t\t\t\t\t\t\t\t\t\t<img class=\"avatar avatar-lg\" src=\"";
            // line 94
            echo twig_escape_filter($this->env, $this->getAttribute($context["member"], "avatar", []), "html", null, true);
            echo "\"/>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6 class=\"mb-0\" data-filter-by=\"text\">";
            // line 96
            echo twig_escape_filter($this->env, (($this->getAttribute($context["member"], "first_name", []) . " ") . $this->getAttribute($context["member"], "last_name", [])), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<span data-filter-by=\"text\" class=\"text-body\">";
            // line 97
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["member"], "type", [])), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['member'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 102
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<form class=\"modal fade\" id=\"member-add-modal\" data-project-id=\"";
        // line 110
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "id", []), "html", null, true);
        echo "\" tabindex=\"-1\" aria-hidden=\"true\">
\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t<div class=\"modal-content\">
\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t<h5 class=\"modal-title\">Add Member</h5>
\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\" aria-label=\"Close\">
\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t<div class=\"user-search\">
\t\t\t\t\t\t<div class=\"input-group input-group-round\">
\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t<span class=\"input-group-text\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">filter_list</i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"search\" class=\"form-control search\" placeholder=\"Find users by name or email\" ";
        // line 127
        echo (($this->getAttribute(($context["user"] ?? null), "is_admin", [])) ? ("data-is-admin='true'") : (""));
        echo " data-project-id=\"";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group-users user-list\" style=\"overflow:visible\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</form>

";
    }

    public function getTemplateName()
    {
        return "twigs/project.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  252 => 127,  232 => 110,  222 => 102,  211 => 97,  207 => 96,  202 => 94,  198 => 92,  194 => 91,  189 => 88,  183 => 84,  181 => 83,  170 => 74,  159 => 69,  152 => 65,  145 => 61,  141 => 60,  134 => 56,  130 => 54,  126 => 53,  100 => 30,  95 => 28,  87 => 23,  81 => 19,  71 => 15,  67 => 14,  64 => 13,  60 => 12,  54 => 9,  48 => 8,  42 => 4,  39 => 3,  29 => 1,);
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
\t\t\t\t\t<h1>{{ product.name }} <span class=\"badge badge-secondary text-light ml-1\">{{ project.language_name }}</span></h1>
\t\t\t\t\t<p class=\"lead\">{{ product.description }}</p>
\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t<ul class=\"avatars\">
\t\t\t\t\t\t\t{% for member in members  %}
\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a href=\"#\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"{{ member.first_name ~ \" \" ~ member.last_name }}\">
\t\t\t\t\t\t\t\t\t\t<img class=\"avatar\" src=\"{{ member.avatar }}\"/>
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div>
\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" style=\"width:{{ project.percent_complete }}%;\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"d-flex justify-content-between text-small\">
\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t<i class=\"material-icons\">playlist_add_check</i>
\t\t\t\t\t\t\t\t<span>{{ project.completed_strings ~ \" / \" ~ project.total_strings ~ \" (\" ~ project.percent_complete ~ \"%)\" }}</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<span>{{ project.status }}</span>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<ul class=\"nav nav-tabs nav-fill\" role=\"tablist\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link active\" data-toggle=\"tab\" href=\"#content\" role=\"tab\">Content</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" data-toggle=\"tab\" href=\"#members\" role=\"tab\">Contributors</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t\t
\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t<div class=\"tab-pane fade show active\" id=\"content\" role=\"tabpanel\">
\t\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t\t<h3>Content</h3>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t\t\t<div class=\"card-list\">
\t\t\t\t\t\t\t\t<div class=\"card-list-body\">
\t\t\t\t\t\t\t\t\t{% for section in sections  %}
\t\t\t\t\t\t\t\t\t\t<div class=\"card card-task\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-success\" role=\"progressbar\" style=\"width: {{ section.percent_complete }}%\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/editor/{{ project.id ~ '/' ~ section.id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h6 data-filter-by=\"text\">{{ section.name }}</h6>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">playlist_add_check</i>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span>{{ section.completed_strings ~ \"/\" ~ section.total_strings }}</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/editor/{{ project.id ~ \"/\" ~ section.id }}\" class=\"btn btn-secondary\">Start Translating</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"tab-pane fade show\" id=\"members\" role=\"tabpanel\">
\t\t\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t\t\t<div class=\"row content-list-head\">
\t\t\t\t\t\t\t\t<div class=\"col-auto\">
\t\t\t\t\t\t\t\t\t<h3>Contributors</h3>
\t\t\t\t\t\t\t\t\t{% if can_manage_members %}
\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-round\" data-toggle=\"modal\" data-target=\"#member-add-modal\">
\t\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">add</i>
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t\t\t{% for member in members  %}
\t\t\t\t\t\t\t\t\t<div class=\"col-6\">
\t\t\t\t\t\t\t\t\t\t<a class=\"media media-member\">
\t\t\t\t\t\t\t\t\t\t\t<img class=\"avatar avatar-lg\" src=\"{{ member.avatar }}\"/>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"media-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6 class=\"mb-0\" data-filter-by=\"text\">{{ member.first_name ~ \" \" ~ member.last_name }}</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<span data-filter-by=\"text\" class=\"text-body\">{{ member.type|capitalize }}</span>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t<form class=\"modal fade\" id=\"member-add-modal\" data-project-id=\"{{ project.id }}\" tabindex=\"-1\" aria-hidden=\"true\">
\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t<div class=\"modal-content\">
\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t<h5 class=\"modal-title\">Add Member</h5>
\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\" aria-label=\"Close\">
\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t</button>
\t\t\t\t</div>
\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t<div class=\"user-search\">
\t\t\t\t\t\t<div class=\"input-group input-group-round\">
\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t<span class=\"input-group-text\">
\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">filter_list</i>
\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<input type=\"search\" class=\"form-control search\" placeholder=\"Find users by name or email\" {{ user.is_admin ? \"data-is-admin='true'\" : '' }} data-project-id=\"{{ project.id }}\">
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"form-group-users user-list\" style=\"overflow:visible\"></div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</form>

{% endblock %}", "twigs/project.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/project.twig");
    }
}
