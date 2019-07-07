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

/* twigs/product.twig */
class __TwigTemplate_c480e3de413432818ae16e2727f461304d9fe990bf1797252c5bb538d2b458e6 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/product.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<div class=\"container\">
\t<div class=\"row justify-content-center\">
\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t<div class=\"page-header clearfix\">
\t\t\t\t<img src=\"/uploads/";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "cover_image", []), "html", null, true);
        echo "\" width=\"140\" class=\"float-left mr-3 rounded\">
\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h2>";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "name", []), "html", null, true);
        echo "</h2>
\t\t\t\t\t";
        // line 11
        if (($context["ion_auth_is_admin"] ?? null)) {
            // line 12
            echo "\t\t\t\t\t\t<a href=\"/products/edit/";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "id", []), "html", null, true);
            echo "\" class=\"btn btn-sm btn-secondary float-right\"><i class=\"material-icons align-top text-small\">edit</i> Edit</a>
\t\t\t\t\t";
        }
        // line 14
        echo "\t\t\t\t</div>
\t\t\t\t<p>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "description", []), "html", null, true);
        echo "</p>
\t\t\t\t";
        // line 16
        if ($this->getAttribute(($context["product"] ?? null), "type", [])) {
            // line 17
            echo "\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Type</strong>: ";
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "type", [])), "html", null, true);
            echo "</span>
\t\t\t\t";
        }
        // line 19
        echo "\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "author", [])) {
            // line 20
            echo "\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Author</strong>: ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "author", []), "html", null, true);
            echo "</span>
\t\t\t\t";
        }
        // line 22
        echo "\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "page_count", [])) {
            // line 23
            echo "\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Pages</strong>: ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "page_count", []), "html", null, true);
            echo "</span>
\t\t\t\t";
        }
        // line 25
        echo "\t\t\t</div>
\t\t\t<hr>
\t\t\t<ul class=\"nav nav-tabs nav-fill mb-3\">
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link active\" data-toggle=\"tab\" href=\"#product-languages\" role=\"tab\">Languages</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" data-toggle=\"tab\" href=\"#product-specs\" role=\"tab\">Specifications</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<div class=\"tab-content\">
\t\t\t\t<div class=\"tab-pane fade show active\" id=\"product-languages\" role=\"tabpanel\">
\t\t\t\t\t<div class=\"content-list-head d-flex\">
\t\t\t\t\t\t<h3>Languages</h3>
\t\t\t\t\t\t<div class=\"float-right d-none d-sm-block\">
\t\t\t\t\t\t\t";
        // line 40
        if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
            // line 41
            echo "\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#add-file-form\">Upload File</button>
\t\t\t\t\t\t\t";
        }
        // line 43
        echo "\t\t\t\t\t\t\t";
        if (($context["user"] ?? null)) {
            // line 44
            echo "\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#add-project-form\">Start New Translation</button>
\t\t\t\t\t\t\t";
        }
        // line 46
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t\t<div class=\"card-list\">
\t\t\t\t\t\t\t<div class=\"card-list-body\">
\t\t\t\t\t\t\t\t";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 52
            echo "\t\t\t\t\t\t\t\t\t<div class=\"card card-task\">
\t\t\t\t\t\t\t\t\t\t";
            // line 53
            if ($this->getAttribute($context["language"], "project", [], "any", true, true)) {
                // line 54
                echo "\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-danger\" role=\"progressbar\" style=\"width: ";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["language"], "project", []), "percent_complete", []), "html", null, true);
                echo " %\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 58
            echo "\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6 data-filter-by=\"text\">";
            // line 61
            echo twig_escape_filter($this->env, $this->getAttribute($context["language"], "language_name", []), "html", null, true);
            echo "</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>";
            // line 63
            (($this->getAttribute($this->getAttribute($context["language"], "project", []), "status", [])) ? (print (twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["language"], "project", []), "status", []), "html", null, true))) : (print ("")));
            echo "</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta\">
\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 67
            if ($this->getAttribute($context["language"], "attachments", [], "any", true, true)) {
                // line 68
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t";
                if (($context["user"] ?? null)) {
                    // line 69
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDownload
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    // line 74
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["language"], "attachments", []));
                    foreach ($context['_seq'] as $context["_key"] => $context["attachment"]) {
                        // line 75
                        echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/uploads/";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["attachment"], "file", []), "html", null, true);
                        echo "\">";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["attachment"], "file_type", []), "html", null, true);
                        echo "</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attachment'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 77
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 80
                    echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/login\" class=\"text-secondary\">Login to download</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
                }
                // line 82
                echo "\t\t\t\t\t\t\t\t\t\t\t\t";
            } else {
                // line 83
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["language"], "project", []), "id", []), "html", null, true);
                echo "\" class=\"btn btn-secondary\">Start Translating</a>
\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            // line 85
            echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 89
        echo "\t\t\t\t\t\t\t\t";
        if ((twig_length_filter($this->env, ($context["languages"] ?? null)) < 1)) {
            // line 90
            echo "\t\t\t\t\t\t\t\t\t<p>This product is not yet available in any languages.</p>
\t\t\t\t\t\t\t\t";
        }
        // line 92
        echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"tab-pane fade\" id=\"product-specs\" role=\"tabpanel\">
\t\t\t\t\t";
        // line 97
        if ($this->getAttribute(($context["product"] ?? null), "type", [])) {
            // line 98
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Product type</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 100
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "type", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 103
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "author", [])) {
            // line 104
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Author(s)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 106
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "author", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 109
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "publisher", [])) {
            // line 110
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Publisher</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">
\t\t\t\t\t\t\t\t";
            // line 113
            if ($this->getAttribute(($context["product"] ?? null), "publisher_website", [])) {
                // line 114
                echo "\t\t\t\t\t\t\t\t\t<a href=\"";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "publisher_website", [])), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "publisher", [])), "html", null, true);
                echo "</a>
\t\t\t\t\t\t\t\t";
            } else {
                // line 116
                echo "\t\t\t\t\t\t\t\t\t";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "publisher", [])), "html", null, true);
                echo "
\t\t\t\t\t\t\t\t";
            }
            // line 118
            echo "\t\t\t\t\t\t\t</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 121
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "page_count", [])) {
            // line 122
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Page count</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 124
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "page_count", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 127
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "audience", [])) {
            // line 128
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Audience</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 130
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "audience", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 133
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "format_open", [])) {
            // line 134
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Format (open)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 136
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "format_open", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 139
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "format_open", [])) {
            // line 140
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Format (closed)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 142
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "format_closed", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 145
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "cover_colors", [])) {
            // line 146
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Colors (cover)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 148
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "cover_colors", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 151
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "interior_colors", [])) {
            // line 152
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Colors (interior)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 154
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "interior_colors", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 157
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "cover_paper", [])) {
            // line 158
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Paper (cover)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 160
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "cover_paper", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 163
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "interior_paper", [])) {
            // line 164
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Paper (interior)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 166
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "interior_paper", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 169
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "binding", [])) {
            // line 170
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Binding</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 172
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "binding", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 175
        echo "\t\t\t\t\t";
        if ($this->getAttribute(($context["product"] ?? null), "finishing", [])) {
            // line 176
            echo "\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Finishing</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">";
            // line 178
            echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute(($context["product"] ?? null), "finishing", [])), "html", null, true);
            echo "</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t";
        }
        // line 181
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<form class=\"modal fade auto-submit\" action=\"/projects/add\" id=\"add-project-form\" tabindex=\"-1\" role=\"dialog\">
\t<div class=\"modal-dialog\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">Start New Translation</h5>
\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">Language</label>
\t\t\t\t\t<select class=\"language-select col\" name=\"language_id\" data-placeholder=\"Select a language...\">
\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"";
        // line 202
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\tStart Translation
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</form>

<form class=\"modal fade auto-submit\" action=\"/products/add_file\" id=\"add-file-form\"  tabindex=\"-1\" role=\"dialog\">
\t<div class=\"modal-dialog\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">Upload File</h5>
\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">File type</label>
\t\t\t\t\t<select class=\"col form-control\" name=\"file_type\" data-placeholder=\"Select a file type...\">
\t\t\t\t\t\t";
        // line 226
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["file_types"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["type"]) {
            // line 227
            echo "\t\t\t\t\t\t\t<option value=\"";
            echo twig_escape_filter($this->env, $context["key"], "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["type"], "html", null, true);
            echo "</option>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 229
        echo "\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">Language</label>
\t\t\t\t\t<select class=\"language-select col\" name=\"language_id\" data-placeholder=\"Select a language...\">
\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"input-group mt-2\">
\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"file\" name=\"file\">
\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"file\">Choose file</label>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"";
        // line 244
        echo twig_escape_filter($this->env, $this->getAttribute(($context["product"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\tUpload File
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</form>
";
    }

    public function getTemplateName()
    {
        return "twigs/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  504 => 244,  487 => 229,  476 => 227,  472 => 226,  445 => 202,  422 => 181,  416 => 178,  412 => 176,  409 => 175,  403 => 172,  399 => 170,  396 => 169,  390 => 166,  386 => 164,  383 => 163,  377 => 160,  373 => 158,  370 => 157,  364 => 154,  360 => 152,  357 => 151,  351 => 148,  347 => 146,  344 => 145,  338 => 142,  334 => 140,  331 => 139,  325 => 136,  321 => 134,  318 => 133,  312 => 130,  308 => 128,  305 => 127,  299 => 124,  295 => 122,  292 => 121,  287 => 118,  281 => 116,  273 => 114,  271 => 113,  266 => 110,  263 => 109,  257 => 106,  253 => 104,  250 => 103,  244 => 100,  240 => 98,  238 => 97,  231 => 92,  227 => 90,  224 => 89,  215 => 85,  209 => 83,  206 => 82,  202 => 80,  197 => 77,  186 => 75,  182 => 74,  175 => 69,  172 => 68,  170 => 67,  163 => 63,  158 => 61,  153 => 58,  147 => 55,  144 => 54,  142 => 53,  139 => 52,  135 => 51,  128 => 46,  124 => 44,  121 => 43,  117 => 41,  115 => 40,  98 => 25,  92 => 23,  89 => 22,  83 => 20,  80 => 19,  74 => 17,  72 => 16,  68 => 15,  65 => 14,  59 => 12,  57 => 11,  53 => 10,  48 => 8,  42 => 4,  39 => 3,  29 => 1,);
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
\t<div class=\"row justify-content-center\">
\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t<div class=\"page-header clearfix\">
\t\t\t\t<img src=\"/uploads/{{ product.cover_image }}\" width=\"140\" class=\"float-left mr-3 rounded\">
\t\t\t\t<div class=\"d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h2>{{ product.name }}</h2>
\t\t\t\t\t{% if ion_auth_is_admin %}
\t\t\t\t\t\t<a href=\"/products/edit/{{ product.id }}\" class=\"btn btn-sm btn-secondary float-right\"><i class=\"material-icons align-top text-small\">edit</i> Edit</a>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t\t<p>{{ product.description }}</p>
\t\t\t\t{% if product.type %}
\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Type</strong>: {{ product.type|capitalize }}</span>
\t\t\t\t{% endif %}
\t\t\t\t{% if product.author %}
\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Author</strong>: {{ product.author }}</span>
\t\t\t\t{% endif %}
\t\t\t\t{% if product.page_count %}
\t\t\t\t\t<span class=\"text-small pr-2\"><strong>Pages</strong>: {{ product.page_count }}</span>
\t\t\t\t{% endif %}
\t\t\t</div>
\t\t\t<hr>
\t\t\t<ul class=\"nav nav-tabs nav-fill mb-3\">
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link active\" data-toggle=\"tab\" href=\"#product-languages\" role=\"tab\">Languages</a>
\t\t\t\t</li>
\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t<a class=\"nav-link\" data-toggle=\"tab\" href=\"#product-specs\" role=\"tab\">Specifications</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<div class=\"tab-content\">
\t\t\t\t<div class=\"tab-pane fade show active\" id=\"product-languages\" role=\"tabpanel\">
\t\t\t\t\t<div class=\"content-list-head d-flex\">
\t\t\t\t\t\t<h3>Languages</h3>
\t\t\t\t\t\t<div class=\"float-right d-none d-sm-block\">
\t\t\t\t\t\t\t{% if user.is_admin %}
\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#add-file-form\">Upload File</button>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t{% if user %}
\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary\" data-toggle=\"modal\" data-target=\"#add-project-form\">Start New Translation</button>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"content-list-body\">
\t\t\t\t\t\t<div class=\"card-list\">
\t\t\t\t\t\t\t<div class=\"card-list-body\">
\t\t\t\t\t\t\t\t{% for language in languages  %}
\t\t\t\t\t\t\t\t\t<div class=\"card card-task\">
\t\t\t\t\t\t\t\t\t\t{% if language.project is defined %}
\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"progress-bar bg-danger\" role=\"progressbar\" style=\"width: {{ language.project.percent_complete }} %\"></div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t
\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t<h6 data-filter-by=\"text\">{{ language.language_name }}</h6>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>{{ language.project.status ? language.project.status : \"\" }}</span>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta\">
\t\t\t\t\t\t\t\t\t\t\t\t{% if language.attachments is defined %}
\t\t\t\t\t\t\t\t\t\t\t\t\t{% if user %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<button class=\"btn btn-secondary dropdown-toggle\" type=\"button\" data-toggle=\"dropdown\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\tDownload
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for attachment in language.attachments  %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a class=\"dropdown-item\" href=\"/uploads/{{ attachment.file }}\">{{ attachment.file_type }}</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/login\" class=\"text-secondary\">Login to download</a>
\t\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/{{ language.project.id }}\" class=\"btn btn-secondary\">Start Translating</a>
\t\t\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t{% if languages|length < 1 %}
\t\t\t\t\t\t\t\t\t<p>This product is not yet available in any languages.</p>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"tab-pane fade\" id=\"product-specs\" role=\"tabpanel\">
\t\t\t\t\t{% if product.type %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Product type</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.type|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.author %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Author(s)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.author|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.publisher %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Publisher</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">
\t\t\t\t\t\t\t\t{% if product.publisher_website %}
\t\t\t\t\t\t\t\t\t<a href=\"{{ product.publisher_website|capitalize }}\" target=\"_blank\">{{ product.publisher|capitalize }}</a>
\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t{{ product.publisher|capitalize }}
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.page_count %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Page count</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.page_count|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.audience %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Audience</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.audience|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.format_open %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Format (open)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.format_open|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.format_open %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Format (closed)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.format_closed|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.cover_colors %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Colors (cover)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.cover_colors|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.interior_colors %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Colors (interior)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.interior_colors|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.cover_paper %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Paper (cover)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.cover_paper|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.interior_paper %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Paper (interior)</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.interior_paper|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.binding %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Binding</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.binding|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t\t{% if product.finishing %}
\t\t\t\t\t\t<dl class=\"row\">
\t\t\t\t\t\t\t<dt class=\"col-sm-4\">Finishing</dt>
\t\t\t\t\t\t\t<dd class=\"col-sm-8\">{{ product.finishing|capitalize }}</dd>
\t\t\t\t\t\t</dl>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<form class=\"modal fade auto-submit\" action=\"/projects/add\" id=\"add-project-form\" tabindex=\"-1\" role=\"dialog\">
\t<div class=\"modal-dialog\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">Start New Translation</h5>
\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">Language</label>
\t\t\t\t\t<select class=\"language-select col\" name=\"language_id\" data-placeholder=\"Select a language...\">
\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"{{ product.id }}\">
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\tStart Translation
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</form>

<form class=\"modal fade auto-submit\" action=\"/products/add_file\" id=\"add-file-form\"  tabindex=\"-1\" role=\"dialog\">
\t<div class=\"modal-dialog\" role=\"document\">
\t\t<div class=\"modal-content\">
\t\t\t<div class=\"modal-header\">
\t\t\t\t<h5 class=\"modal-title\">Upload File</h5>
\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t</button>
\t\t\t</div>
\t\t\t<div class=\"modal-body\">
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">File type</label>
\t\t\t\t\t<select class=\"col form-control\" name=\"file_type\" data-placeholder=\"Select a file type...\">
\t\t\t\t\t\t{% for key, type in file_types  %}
\t\t\t\t\t\t\t<option value=\"{{ key }}\">{{ type }}</option>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t<label class=\"col-3\">Language</label>
\t\t\t\t\t<select class=\"language-select col\" name=\"language_id\" data-placeholder=\"Select a language...\">
\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t</select>
\t\t\t\t</div>
\t\t\t\t<div class=\"input-group mt-2\">
\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"file\" name=\"file\">
\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"file\">Choose file</label>
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<input type=\"hidden\" name=\"product_id\" value=\"{{ product.id }}\">
\t\t\t</div>
\t\t\t<div class=\"modal-footer\">
\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\tUpload File
\t\t\t\t</button>
\t\t\t</div>
\t\t</div>
\t</div>
</form>
{% endblock %}", "twigs/product.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/product.twig");
    }
}
