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

/* twigs/editor.twig */
class __TwigTemplate_c042ce125186aa4444e4b3543665ba3ef034124f37aa8500564c6a1464071772 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/editor.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header clearfix\">
\t\t\t\t\t<h1>";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["section"] ?? null), "name", []), "html", null, true);
        echo "</h1>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["content"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 13
            echo "\t\t\t\t\t\t<div class=\"card-list editor-item\" id=\"p";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", []), "html", null, true);
            echo "\" data-content-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "id", []), "html", null, true);
            echo "\" data-project-id=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["project"] ?? null), "id", []), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t<div class=\"card-list-body row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "content", []), "html", null, true);
            echo "<br><br>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-md-6 textarea-wrapper\">
\t\t\t\t\t\t\t\t\t<div class=\"locked-status ";
            // line 19
            echo ((($this->getAttribute($context["p"], "total_approvals", []) == 0)) ? ("hidden") : (""));
            echo "\">
\t\t\t\t\t\t\t\t\t\t<small class=\"status-locked\"><i class=\"material-icons text-small align-middle\">lock</i> locked for translators </small>
\t\t\t\t\t\t\t\t\t\t<span class=\"float-right badge badge-secondary\"><span class=\"approval_count\">";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "total_approvals", []), "html", null, true);
            echo "</span>/";
            echo twig_escape_filter($this->env, ($context["num_required_approvals"] ?? null), "html", null, true);
            echo "</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "errors", []));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 24
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-warning revision-request\" data-log-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "id", []), "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["error"], "comment", []), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t";
                // line 26
                if (($context["can_review"] ?? null)) {
                    // line 27
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-secondary btn-sm float-right resolve-error\">Resolve</button>
\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 29
                echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control\" ";
            // line 32
            echo ((( !($context["can_commit"] ?? null) || (($this->getAttribute($context["p"], "total_approvals", []) > 0) &&  !($context["can_always_commit"] ?? null)))) ? ("disabled") : (""));
            echo "  rows=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "textarea_height", []), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["p"], "latest_revision", []), "html", null, true);
            echo "</textarea>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<nav class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group float-left\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 36
            if ((($context["can_always_commit"] ?? null) || (($context["can_commit"] ?? null) && ($this->getAttribute($context["p"], "total_approvals", []) == 0)))) {
                // line 37
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-success btn-sm commit-paragraph\">Commit</button>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 39
            echo "\t\t\t\t\t\t\t\t\t\t\t";
            if (($context["can_review"] ?? null)) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown d-inline-block\">\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-";
                // line 41
                echo (($this->getAttribute($context["p"], "user_has_approved", [])) ? ("success") : ("secondary"));
                echo " btn-sm dropdown-toggle review-toggle\" type=\"button\" data-toggle=\"dropdown\">";
                echo (($this->getAttribute($context["p"], "user_has_approved", [])) ? ("Approved") : ("Review"));
                echo "</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 43
                if (( !$this->getAttribute($context["p"], "is_approved", []) &&  !$this->getAttribute($context["p"], "user_has_approved", []))) {
                    // line 44
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item approve-paragraph\">Approve</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 46
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item request-revision\">Request Revision</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 50
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group float-right\">
\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-secondary btn-sm\" data-toggle=\"collapse\" data-target=\"#";
            // line 52
            echo twig_escape_filter($this->env, sprintf("p_%s_revisions", $this->getAttribute($context["p"], "id", [])), "html", null, true);
            echo "\">";
            ((($this->getAttribute($context["p"], "total_revisions", []) == 1)) ? (print ("1 revision")) : (print (twig_escape_filter($this->env, sprintf("%s revisions", $this->getAttribute($context["p"], "total_revisions", [])), "html", null, true))));
            echo "</button>
\t\t\t\t\t\t\t\t\t\t\t";
            // line 53
            if (($context["can_auto_translate"] ?? null)) {
                // line 54
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-sm btn-outline-primary auto-translate ";
                echo (((twig_length_filter($this->env, $this->getAttribute($context["p"], "latest_revision", [])) == 0)) ? ("") : ("hidden"));
                echo "\">Auto Translate</button>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 56
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</nav>
\t\t\t\t\t\t\t\t\t<div id=\"";
            // line 58
            echo twig_escape_filter($this->env, sprintf("p_%s_revisions", $this->getAttribute($context["p"], "id", [])), "html", null, true);
            echo "\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t<div class=\"accordion\" id=\"";
            // line 59
            echo twig_escape_filter($this->env, sprintf("p_%s_revisions_accordian", $this->getAttribute($context["p"], "id", [])), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["p"], "revisions", []));
            foreach ($context['_seq'] as $context["_key"] => $context["revision"]) {
                // line 61
                echo "\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card mb-0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-header p-2 revision-header\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img alt=\"Image\" src=\"https://www.gravatar.com/avatar/";
                // line 63
                echo twig_escape_filter($this->env, ($context["md5email"] ?? null), "html", null, true);
                echo "?s=60&d=mp\" class=\"avatar mr-1\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 64
                echo twig_escape_filter($this->env, (($this->getAttribute($context["revision"], "first_name", []) . " ") . $this->getAttribute($context["revision"], "last_name", [])), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<time class=\"text-small float-right\" datetime=\"";
                // line 65
                echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "created_at", []), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "created_at_formatted", []), "html", null, true);
                echo "</time>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"revision-content collapse\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body text-small p-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                // line 69
                echo twig_escape_filter($this->env, $this->getAttribute($context["revision"], "diff", []), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['revision'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            echo "\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"response\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t";
        // line 86
        if (($context["can_review"] ?? null)) {
            echo " 
\t\t<form class=\"modal fade auto-submit\" action=\"/editor/suggest_revision\" id=\"suggest-revision-form\" tabindex=\"-1\" role=\"dialog\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\">Suggest Revision</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<textarea class=\"form-control col\" name=\"comment\" placeholder=\"What needs revising?\"></textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" name=\"content_id\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"project_id\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\t\t\tSubmit
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t";
        }
    }

    public function getTemplateName()
    {
        return "twigs/editor.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  244 => 86,  237 => 81,  225 => 74,  214 => 69,  205 => 65,  201 => 64,  197 => 63,  193 => 61,  189 => 60,  185 => 59,  181 => 58,  177 => 56,  171 => 54,  169 => 53,  163 => 52,  159 => 50,  153 => 46,  149 => 44,  147 => 43,  140 => 41,  137 => 40,  134 => 39,  130 => 37,  128 => 36,  117 => 32,  114 => 31,  107 => 29,  103 => 27,  101 => 26,  97 => 25,  92 => 24,  88 => 23,  81 => 21,  76 => 19,  70 => 16,  59 => 13,  55 => 12,  48 => 8,  42 => 4,  39 => 3,  29 => 1,);
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
\t\t\t\t<div class=\"page-header clearfix\">
\t\t\t\t\t<h1>{{ section.name }}</h1>
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t{% for p in content  %}
\t\t\t\t\t\t<div class=\"card-list editor-item\" id=\"p{{ p.id }}\" data-content-id=\"{{ p.id }}\" data-project-id=\"{{ project.id }}\">
\t\t\t\t\t\t\t<div class=\"card-list-body row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t\t{{ p.content }}<br><br>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"col-md-6 textarea-wrapper\">
\t\t\t\t\t\t\t\t\t<div class=\"locked-status {{ p.total_approvals == 0 ? \"hidden\": '' }}\">
\t\t\t\t\t\t\t\t\t\t<small class=\"status-locked\"><i class=\"material-icons text-small align-middle\">lock</i> locked for translators </small>
\t\t\t\t\t\t\t\t\t\t<span class=\"float-right badge badge-secondary\"><span class=\"approval_count\">{{ p.total_approvals }}</span>/{{ num_required_approvals }}</span>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t{% for error in p.errors  %}
\t\t\t\t\t\t\t\t\t\t<div class=\"alert alert-warning revision-request\" data-log-id=\"{{ error.id }}\">
\t\t\t\t\t\t\t\t\t\t\t{{ error.comment }}
\t\t\t\t\t\t\t\t\t\t\t{% if can_review %}
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-secondary btn-sm float-right resolve-error\">Resolve</button>
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t\t\t\t<textarea class=\"form-control\" {{ ( not can_commit or p.total_approvals > 0 and not can_always_commit ) ? \"disabled\": '' }}  rows=\"{{ p.textarea_height }}\">{{ p.latest_revision }}</textarea>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<nav class=\"clearfix\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group float-left\">
\t\t\t\t\t\t\t\t\t\t\t{% if( can_always_commit or ( can_commit and p.total_approvals == 0 ) ) %}
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-success btn-sm commit-paragraph\">Commit</button>
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t{% if can_review %}
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown d-inline-block\">\t\t
\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-{{ p.user_has_approved ? \"success\" : \"secondary\" }} btn-sm dropdown-toggle review-toggle\" type=\"button\" data-toggle=\"dropdown\">{{ p.user_has_approved? \"Approved\" : \"Review\" }}</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% if not p.is_approved and not p.user_has_approved %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item approve-paragraph\">Approve</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item request-revision\">Request Revision</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group float-right\">
\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-outline-secondary btn-sm\" data-toggle=\"collapse\" data-target=\"#{{ \"p_%s_revisions\"|format(p.id) }}\">{{ p.total_revisions == 1 ? \"1 revision\" : \"%s revisions\"|format( p.total_revisions ) }}</button>
\t\t\t\t\t\t\t\t\t\t\t{% if can_auto_translate %}
\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-sm btn-outline-primary auto-translate {{ p.latest_revision|length == 0 ? \"\" : \"hidden\" }}\">Auto Translate</button>
\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</nav>
\t\t\t\t\t\t\t\t\t<div id=\"{{ \"p_%s_revisions\"|format( p.id ) }}\" class=\"collapse\">
\t\t\t\t\t\t\t\t\t\t<div class=\"accordion\" id=\"{{ \"p_%s_revisions_accordian\"|format( p.id ) }}\">
\t\t\t\t\t\t\t\t\t\t\t{% for revision in p.revisions  %}
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card mb-0\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-header p-2 revision-header\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img alt=\"Image\" src=\"https://www.gravatar.com/avatar/{{ md5email }}?s=60&d=mp\" class=\"avatar mr-1\" />
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ revision.first_name ~ \" \" ~ revision.last_name }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<time class=\"text-small float-right\" datetime=\"{{ revision.created_at }} {{ revision.created_at_formatted }}</time>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"revision-content collapse\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body text-small p-2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{{ revision.diff }}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"response\"></div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t{% endfor %}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>

\t{% if(can_review) %} 
\t\t<form class=\"modal fade auto-submit\" action=\"/editor/suggest_revision\" id=\"suggest-revision-form\" tabindex=\"-1\" role=\"dialog\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\">Suggest Revision</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<div class=\"form-group\">
\t\t\t\t\t\t\t<textarea class=\"form-control col\" name=\"comment\" placeholder=\"What needs revising?\"></textarea>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<input type=\"hidden\" name=\"content_id\">
\t\t\t\t\t\t<input type=\"hidden\" name=\"project_id\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\t\t\tSubmit
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t{% endif %}
{% endblock %}", "twigs/editor.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/editor.twig");
    }
}
