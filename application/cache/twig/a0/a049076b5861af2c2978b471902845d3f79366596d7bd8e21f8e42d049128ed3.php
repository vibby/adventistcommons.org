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

/* twigs/products.twig */
class __TwigTemplate_f2d992567e05a32c8937db45d624785ebc0bd3bda3c95cf0d94023341a93c376 extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/products.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"row justify-content-center\">
\t\t\t<div class=\"col-xl-10 col-lg-11\">
\t\t\t\t<div class=\"page-header d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h1>Products</h1>
\t\t\t\t\t";
        // line 9
        if (($context["ion_auth_is_admin"] ?? null)) {
            // line 10
            echo "\t\t\t\t\t\t<button class=\"btn btn-primary d-flex\" data-toggle=\"modal\" data-target=\"#add-product-form\">Add Product</button>
\t\t\t\t\t";
        }
        // line 12
        echo "\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t";
        // line 16
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 17
            echo "\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t<div class=\"card card-project\">
\t\t\t\t\t\t\t\t\t<div class=\"row no-gutters\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col\" style=\"flex: 0 0 120px\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"/uploads/";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "cover_image", []), "html", null, true);
            echo "\" height=\"180\" class=\"rounded-left\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/products/";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", []), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5 data-filter-by=\"text\">";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", []), "html", null, true);
            echo "</h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta d-flex justify-content-between\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Author: ";
            // line 32
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "author", []), "html", null, true);
            echo "</span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Pages: ";
            // line 33
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "page_count", []), "html", null, true);
            echo " </span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Languages:  ";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "languages", []), "html", null, true);
            echo " </span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t";
        // line 48
        if (($context["ion_auth_is_admin"] ?? null)) {
            // line 49
            echo "\t\t<form class=\"modal fade auto-submit\" action=\"/products/save\" id=\"add-product-form\" tabindex=\"-1\" role=\"dialog\" enctype=\"multipart/form-data\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\">Add Product</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<ul class=\"nav nav-tabs nav-fill\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" id=\"product-add-details-tab\" data-toggle=\"tab\" href=\"#product-add-details\" role=\"tab\">General</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" id=\"product-add-specs-tab\" data-toggle=\"tab\" href=\"#product-add-specs\" role=\"tab\">Specifications</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t<div class=\"tab-pane fade show active\" id=\"product-add-details\" role=\"tabpanel\">
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Title</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"name\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-https://goo.gl/maps/Dx2ztuHkeXQ2center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Author(s)</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"author\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Publisher</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"publisher\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Publisher website</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"publisher_website\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Description</label>
\t\t\t\t\t\t\t\t\t<textarea class=\"form-control col\" rows=\"3\" name=\"description\"></textarea>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Audience</label>
\t\t\t\t\t\t\t\t\t<select class=\"form-control col\" name=\"audience\">
\t\t\t\t\t\t\t\t\t\t";
            // line 92
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["audience_options"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 93
                echo "\t\t\t\t\t\t\t\t\t\t\t<option>";
                echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Page count</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"number\" name=\"page_count\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Series</label>
\t\t\t\t\t\t\t\t\t<select class=\"series-select col\" name=\"series_id\" data-placeholder=\"Search for a series...\">
\t\t\t\t\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t\t\t\t\t\t";
            // line 105
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["series"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 106
                echo "\t\t\t\t\t\t\t\t\t\t\t<option value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "id", []), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", []), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Product type</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["product_types"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["type"]) {
                // line 114
                echo "\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"custom-control custom-radio\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"type-";
                // line 116
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\" name=\"type\" class=\"custom-control-input\" value=\"";
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"custom-control-label\" for=\"type-";
                // line 117
                echo twig_escape_filter($this->env, $context["type"], "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, twig_capitalize_string_filter($this->env, $context["type"]), "html", null, true);
                echo "</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['type'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            echo "\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Cover Image</h6>
\t\t\t\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"cover_image\" name=\"cover_image\">
\t\t\t\t\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"cover_image\">Choose file</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>InDesign Translation File (.xliff)</h6>
\t\t\t\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"xliff_file\" name=\"xliff_file\">
\t\t\t\t\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"xliff_file\">Choose file</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tab-pane fade\" id=\"product-add-specs\" role=\"tabpanel\">
\t\t\t\t\t\t\t\t<h6>Format</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Open</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"format_open\" placeholder=\"e.g. 10.4 x 20.5 cm\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Closed</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"format_closed\" placeholder=\"e.g. 10.4 x 41 cm\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Cover</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Colors</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"cover_colors\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Paper</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"cover_paper\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Interior</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Colors</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"interior_colors\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Paper</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"interior_paper\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Binding</label>
\t\t\t\t\t\t\t\t\t<select class=\"form-control col\" name=\"binding\">
\t\t\t\t\t\t\t\t\t\t";
            // line 192
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["product_binding"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 193
                echo "\t\t\t\t\t\t\t\t\t\t\t<option >";
                echo twig_escape_filter($this->env, $context["item"], "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 195
            echo "\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Finishing</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"finishing\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\t\t\tCreate Product
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
        return "twigs/products.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 195,  318 => 193,  314 => 192,  241 => 121,  229 => 117,  223 => 116,  219 => 114,  215 => 113,  208 => 108,  197 => 106,  193 => 105,  181 => 95,  172 => 93,  168 => 92,  123 => 49,  121 => 48,  114 => 43,  99 => 34,  95 => 33,  91 => 32,  83 => 27,  79 => 26,  71 => 21,  65 => 17,  61 => 16,  55 => 12,  51 => 10,  49 => 9,  42 => 4,  39 => 3,  29 => 1,);
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
\t\t\t\t<div class=\"page-header d-flex justify-content-between align-items-center\">
\t\t\t\t\t<h1>Products</h1>
\t\t\t\t\t{% if ion_auth_is_admin %}
\t\t\t\t\t\t<button class=\"btn btn-primary d-flex\" data-toggle=\"modal\" data-target=\"#add-product-form\">Add Product</button>
\t\t\t\t\t{% endif %}
\t\t\t\t</div>
\t\t\t\t<hr>
\t\t\t\t<div class=\"content-list\">
\t\t\t\t\t<div class=\"content-list-body row\">
\t\t\t\t\t\t{% for product in products  %}
\t\t\t\t\t\t\t<div class=\"col-md-6\">
\t\t\t\t\t\t\t\t<div class=\"card card-project\">
\t\t\t\t\t\t\t\t\t<div class=\"row no-gutters\">
\t\t\t\t\t\t\t\t\t\t<div class=\"col\" style=\"flex: 0 0 120px\">
\t\t\t\t\t\t\t\t\t\t\t<img src=\"/uploads/{{ product.cover_image }}\" height=\"180\" class=\"rounded-left\">
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-title\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<a href=\"/products/{{ product.id }}\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<h5 data-filter-by=\"text\">{{ product.name }}</h5>
\t\t\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"card-meta d-flex justify-content-between\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Author: {{ product.author }}</span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Pages: {{ product.page_count }} </span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<span class=\"text-small\">Languages:  {{ product.languages }} </span><br>
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t{% if ion_auth_is_admin %}
\t\t<form class=\"modal fade auto-submit\" action=\"/products/save\" id=\"add-product-form\" tabindex=\"-1\" role=\"dialog\" enctype=\"multipart/form-data\">
\t\t\t<div class=\"modal-dialog\" role=\"document\">
\t\t\t\t<div class=\"modal-content\">
\t\t\t\t\t<div class=\"modal-header\">
\t\t\t\t\t\t<h5 class=\"modal-title\">Add Product</h5>
\t\t\t\t\t\t<button type=\"button\" class=\"close btn btn-round\" data-dismiss=\"modal\">
\t\t\t\t\t\t\t<i class=\"material-icons\">close</i>
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t\t<ul class=\"nav nav-tabs nav-fill\">
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link active\" id=\"product-add-details-tab\" data-toggle=\"tab\" href=\"#product-add-details\" role=\"tab\">General</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" id=\"product-add-specs-tab\" data-toggle=\"tab\" href=\"#product-add-specs\" role=\"tab\">Specifications</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"modal-body\">
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t<div class=\"tab-pane fade show active\" id=\"product-add-details\" role=\"tabpanel\">
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Title</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"name\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-https://goo.gl/maps/Dx2ztuHkeXQ2center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Author(s)</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"author\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Publisher</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"publisher\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Publisher website</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"publisher_website\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Description</label>
\t\t\t\t\t\t\t\t\t<textarea class=\"form-control col\" rows=\"3\" name=\"description\"></textarea>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Audience</label>
\t\t\t\t\t\t\t\t\t<select class=\"form-control col\" name=\"audience\">
\t\t\t\t\t\t\t\t\t\t{% for item in audience_options  %}
\t\t\t\t\t\t\t\t\t\t\t<option>{{ item }}</option>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Page count</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"number\" name=\"page_count\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Series</label>
\t\t\t\t\t\t\t\t\t<select class=\"series-select col\" name=\"series_id\" data-placeholder=\"Search for a series...\">
\t\t\t\t\t\t\t\t\t\t<option value=\"\">None</option>
\t\t\t\t\t\t\t\t\t\t{% for item in series  %}
\t\t\t\t\t\t\t\t\t\t\t<option value=\"{{ item.id }}\">{{item.name}}</option>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Product type</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t{% for type in product_types  %}
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<div class=\"custom-control custom-radio\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"radio\" id=\"type-{{ type }}\" name=\"type\" class=\"custom-control-input\" value=\"{{ type }}\">
\t\t\t\t\t\t\t\t\t\t\t\t<label class=\"custom-control-label\" for=\"type-{{ type }}\">{{ type|capitalize }}</label>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Cover Image</h6>
\t\t\t\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"cover_image\" name=\"cover_image\">
\t\t\t\t\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"cover_image\">Choose file</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>InDesign Translation File (.xliff)</h6>
\t\t\t\t\t\t\t\t<div class=\"input-group mb-3\">
\t\t\t\t\t\t\t\t\t<div class=\"custom-file\">
\t\t\t\t\t\t\t\t\t\t<input type=\"file\" class=\"custom-file-input\" id=\"xliff_file\" name=\"xliff_file\">
\t\t\t\t\t\t\t\t\t\t<label class=\"custom-file-label\" for=\"xliff_file\">Choose file</label>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tab-pane fade\" id=\"product-add-specs\" role=\"tabpanel\">
\t\t\t\t\t\t\t\t<h6>Format</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Open</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"format_open\" placeholder=\"e.g. 10.4 x 20.5 cm\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Closed</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"format_closed\" placeholder=\"e.g. 10.4 x 41 cm\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Cover</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Colors</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"cover_colors\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Paper</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"cover_paper\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<h6>Interior</h6>
\t\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Colors</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"interior_colors\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-4\">Paper</label>
\t\t\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"interior_paper\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Binding</label>
\t\t\t\t\t\t\t\t\t<select class=\"form-control col\" name=\"binding\">
\t\t\t\t\t\t\t\t\t\t{% for item in product_binding  %}
\t\t\t\t\t\t\t\t\t\t\t<option >{{ item }}</option>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Finishing</label>
\t\t\t\t\t\t\t\t\t<input class=\"form-control col\" type=\"text\" name=\"finishing\" />
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"modal-footer\">
\t\t\t\t\t\t<button role=\"button\" class=\"btn btn-primary\" type=\"submit\">
\t\t\t\t\t\t\tCreate Product
\t\t\t\t\t\t</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</form>
\t{% endif %}
{% endblock %}", "twigs/products.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/products.twig");
    }
}
