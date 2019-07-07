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

/* twigs/template.twig */
class __TwigTemplate_a5bc1ef98d5ea1c727f8bdc2279e5021e5d26afb3e674ff66b5b5580e7ae0966 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t    <title>Adventist Commons | ";
        // line 6
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</title>
\t    <link rel=\"icon\" href=\"/assets/img/favicon.png\"> 
\t\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Gothic+A1\" rel=\"stylesheet\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Ubuntu:400,700\" rel=\"stylesheet\">
\t\t<link href=\"/assets/css/theme.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t\t<link href=\"/assets/css/custom.css?v=7\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t</head>
\t<body>
\t\t<div class=\"layout layout-nav-top\">
\t\t\t<div class=\"navbar navbar-expand-lg bg-dark navbar-dark sticky-top\">
\t\t\t\t<a class=\"navbar-brand\" href=\"/\">
\t\t\t\t\t<img src=\"/assets/img/logo_text.png\" height=\"40\" />
\t\t\t\t</a>
\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<div class=\"d-block d-lg-none ml-2\">
\t\t\t\t\t";
        // line 25
        if (($context["user"] ?? null)) {
            // line 26
            echo "\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "is_admin", []), "html", null, true);
            echo "?s=80&d=mp\" class=\"avatar\" />
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t<a href=\"/account\" class=\"dropdown-item\">Account Settings</a>
\t\t\t\t\t\t\t\t";
            // line 32
            if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
                // line 33
                echo "\t\t\t\t\t\t\t\t\t<a href=\"/user/list\" class=\"dropdown-item\">Manage Users</a>
\t\t\t\t\t\t\t\t";
            }
            // line 35
            echo "\t\t\t\t\t\t\t\t<a href=\"/logout\" class=\"dropdown-item\">Log Out</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        } else {
            // line 39
            echo "\t\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/login\">Login</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/register\">Sign Up</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t";
        }
        // line 48
        echo "\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"collapse navbar-collapse justify-content-between\" id=\"navbar-collapse\">
\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/home\">How It Works</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/products\">Available Products</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/projects\">Translations In Progress</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"d-lg-flex align-items-center mx-lg-2\">
\t\t\t\t\t\t<form class=\"form-inline my-lg-0 my-2 mx-lg-2\">
\t\t\t\t\t\t\t<div class=\"input-group input-group-dark input-group-round\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\">
\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">search</i>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input type=\"search\" class=\"form-control form-control-dark\" placeholder=\"Search\" aria-label=\"Search app\" aria-describedby=\"search-app\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t<div class=\"d-none d-lg-block\">
\t\t\t\t\t\t\t";
        // line 75
        if (($context["user"] ?? null)) {
            // line 76
            echo "\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t\t\t<img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/";
            // line 78
            echo twig_escape_filter($this->env, $this->getAttribute(($context["user"] ?? null), "image", []), "html", null, true);
            echo "?s=80&d=mp\" class=\"avatar\" />
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/account\" class=\"dropdown-item\">Account Settings</a>
\t\t\t\t\t\t\t\t\t\t";
            // line 82
            if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
                // line 83
                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/user/list\" class=\"dropdown-item\">Manage Users</a>
\t\t\t\t\t\t\t\t\t\t";
            }
            // line 85
            echo "\t\t\t\t\t\t\t\t\t\t<a href=\"/logout\" class=\"dropdown-item\">Log Out</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        } else {
            // line 89
            echo "\t\t\t\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/login\">Login</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/register\">Sign Up</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t";
        }
        // line 98
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"main-container\">
\t\t\t\t";
        // line 103
        if (($context["is_home"] ?? null)) {
            // line 104
            echo "\t\t\t\t\t<div class=\"jumbotron jumbotron-fluid bg-dark mb-0 banner\">
\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t<h1 class=\"display-4\">Certified Adventist Resources<br><span style=\"color:#f9dc90\">Culturally Relevant</span></h1>
\t\t\t\t\t\t\t<p class=\"lead\">Translatable, Printable, Sharable.</p>
\t\t\t\t\t\t\t<a href=\"/projects\" class=\"btn btn-light mb-5\">Get Started</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t
\t\t\t\t\t<div class=\"breadcrumb-bar navbar bg-white\" style=\"min-height:20px\"></div>
\t\t\t\t";
        } else {
            // line 113
            echo "\t\t\t\t\t<div class=\"breadcrumb-bar navbar bg-white sticky-top\">
\t\t\t\t\t\t<nav aria-label=\"breadcrumb\">
\t\t\t\t\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t\t\t\t\t";
            // line 116
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 117
                echo "\t\t\t\t\t\t\t\t\t";
                if ($this->getAttribute($context["breadcrumb"], "url", [], "any", true, true)) {
                    // line 118
                    echo "\t\t\t\t\t\t\t\t\t\t<li class=\"breadcrumb-item active\"><a href=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "url", []), "html", null, true);
                    echo "\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "label", []), "html", null, true);
                    echo "</a></li>
\t\t\t\t\t\t\t\t\t";
                } else {
                    // line 120
                    echo "\t\t\t\t\t\t\t\t\t  <li class=\"breadcrumb-item\">";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["breadcrumb"], "label", []), "html", null, true);
                    echo "</li>
\t\t\t\t\t\t\t\t\t";
                }
                // line 122
                echo "\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 123
            echo "\t\t\t\t\t\t\t</ol>
\t\t\t\t\t\t</nav>
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 127
        echo "\t\t\t\t";
        $this->displayBlock('content', $context, $blocks);
        // line 128
        echo "\t\t\t</div>
\t\t</div>
\t\t<footer class=\"text-small text-faded text-center p-3\">
\t\t\tCopyright © 2019 AdventistCommons.org. This website is an initiative of the Middle East and North Africa Union of Seventh-day Adventists.<br>
\t\t\t<a href=\"/feedback\">Feedback</a> | <a href=\"/feedback\">Bug report</a>
\t\t</footer>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/autosize.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/popper.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/prism.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/draggable.bundle.legacy.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/swap-animation.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/dropzone.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/list.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/bootstrap.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/selectize.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.timeago.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/theme.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/app.js?v=8\"></script>
\t\t<link href=\"/assets/css/selectize.bootstrap3.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t</body>
</html>";
    }

    // line 127
    public function block_content($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "twigs/template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  247 => 127,  222 => 128,  219 => 127,  213 => 123,  207 => 122,  201 => 120,  193 => 118,  190 => 117,  186 => 116,  181 => 113,  170 => 104,  168 => 103,  161 => 98,  150 => 89,  144 => 85,  140 => 83,  138 => 82,  131 => 78,  127 => 76,  125 => 75,  96 => 48,  85 => 39,  79 => 35,  75 => 33,  73 => 32,  66 => 28,  62 => 26,  60 => 25,  38 => 6,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html lang=\"en\">
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
\t    <title>Adventist Commons | {{ title }}</title>
\t    <link rel=\"icon\" href=\"/assets/img/favicon.png\"> 
\t\t<link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Gothic+A1\" rel=\"stylesheet\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Ubuntu:400,700\" rel=\"stylesheet\">
\t\t<link href=\"/assets/css/theme.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t\t<link href=\"/assets/css/custom.css?v=7\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t</head>
\t<body>
\t\t<div class=\"layout layout-nav-top\">
\t\t\t<div class=\"navbar navbar-expand-lg bg-dark navbar-dark sticky-top\">
\t\t\t\t<a class=\"navbar-brand\" href=\"/\">
\t\t\t\t\t<img src=\"/assets/img/logo_text.png\" height=\"40\" />
\t\t\t\t</a>
\t\t\t\t<div class=\"d-flex align-items-center\">
\t\t\t\t\t<button class=\"navbar-toggler\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbar-collapse\" aria-controls=\"navbar-collapse\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<div class=\"d-block d-lg-none ml-2\">
\t\t\t\t\t{% if user %}
\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t<img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/{{ user.is_admin }}?s=80&d=mp\" class=\"avatar\" />
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t<a href=\"/account\" class=\"dropdown-item\">Account Settings</a>
\t\t\t\t\t\t\t\t{% if user.is_admin %}
\t\t\t\t\t\t\t\t\t<a href=\"/user/list\" class=\"dropdown-item\">Manage Users</a>
\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t<a href=\"/logout\" class=\"dropdown-item\">Log Out</a>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t{% else %}
\t\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/login\">Login</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/register\">Sign Up</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t{% endif %}
\t\t\t\t\t</div>
\t\t\t\t</div>

\t\t\t\t<div class=\"collapse navbar-collapse justify-content-between\" id=\"navbar-collapse\">
\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/home\">How It Works</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/products\">Available Products</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-item mr-2\">
\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/projects\">Translations In Progress</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t\t<div class=\"d-lg-flex align-items-center mx-lg-2\">
\t\t\t\t\t\t<form class=\"form-inline my-lg-0 my-2 mx-lg-2\">
\t\t\t\t\t\t\t<div class=\"input-group input-group-dark input-group-round\">
\t\t\t\t\t\t\t\t<div class=\"input-group-prepend\">
\t\t\t\t\t\t\t\t\t<span class=\"input-group-text\">
\t\t\t\t\t\t\t\t\t\t<i class=\"material-icons\">search</i>
\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input type=\"search\" class=\"form-control form-control-dark\" placeholder=\"Search\" aria-label=\"Search app\" aria-describedby=\"search-app\">
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</form>
\t\t\t\t\t\t<div class=\"d-none d-lg-block\">
\t\t\t\t\t\t\t{% if user %}
\t\t\t\t\t\t\t\t<div class=\"dropdown\">
\t\t\t\t\t\t\t\t\t<a href=\"#\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t\t\t\t\t<img alt=\"Image\" width=\"40\" src=\"https://www.gravatar.com/avatar/{{ user.image }}?s=80&d=mp\" class=\"avatar\" />
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t<div class=\"dropdown-menu dropdown-menu-right\">
\t\t\t\t\t\t\t\t\t\t<a href=\"/account\" class=\"dropdown-item\">Account Settings</a>
\t\t\t\t\t\t\t\t\t\t{% if user.is_admin %}
\t\t\t\t\t\t\t\t\t\t\t<a href=\"/user/list\" class=\"dropdown-item\">Manage Users</a>
\t\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t\t<a href=\"/logout\" class=\"dropdown-item\">Log Out</a>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t<ul class=\"navbar-nav\">
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/login\">Login</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t\t\t\t<a class=\"nav-link\" href=\"/register\">Sign Up</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t<div class=\"main-container\">
\t\t\t\t{% if is_home %}
\t\t\t\t\t<div class=\"jumbotron jumbotron-fluid bg-dark mb-0 banner\">
\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t<h1 class=\"display-4\">Certified Adventist Resources<br><span style=\"color:#f9dc90\">Culturally Relevant</span></h1>
\t\t\t\t\t\t\t<p class=\"lead\">Translatable, Printable, Sharable.</p>
\t\t\t\t\t\t\t<a href=\"/projects\" class=\"btn btn-light mb-5\">Get Started</a>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>\t
\t\t\t\t\t<div class=\"breadcrumb-bar navbar bg-white\" style=\"min-height:20px\"></div>
\t\t\t\t{% else %}
\t\t\t\t\t<div class=\"breadcrumb-bar navbar bg-white sticky-top\">
\t\t\t\t\t\t<nav aria-label=\"breadcrumb\">
\t\t\t\t\t\t\t<ol class=\"breadcrumb\">
\t\t\t\t\t\t\t\t{% for breadcrumb in breadcrumbs  %}
\t\t\t\t\t\t\t\t\t{% if breadcrumb.url is defined %}
\t\t\t\t\t\t\t\t\t\t<li class=\"breadcrumb-item active\"><a href=\"{{ breadcrumb.url }}\">{{ breadcrumb.label }}</a></li>
\t\t\t\t\t\t\t\t\t{% else %}
\t\t\t\t\t\t\t\t\t  <li class=\"breadcrumb-item\">{{ breadcrumb.label }}</li>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t</ol>
\t\t\t\t\t\t</nav>
\t\t\t\t\t</div>
\t\t\t\t{% endif %}
\t\t\t\t{% block content %}{% endblock %}
\t\t\t</div>
\t\t</div>
\t\t<footer class=\"text-small text-faded text-center p-3\">
\t\t\tCopyright © 2019 AdventistCommons.org. This website is an initiative of the Middle East and North Africa Union of Seventh-day Adventists.<br>
\t\t\t<a href=\"/feedback\">Feedback</a> | <a href=\"/feedback\">Bug report</a>
\t\t</footer>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/autosize.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/popper.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/prism.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/draggable.bundle.legacy.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/swap-animation.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/dropzone.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/list.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/bootstrap.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/selectize.min.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/jquery.timeago.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/theme.js\"></script>
\t\t<script type=\"text/javascript\" src=\"/assets/js/app.js?v=8\"></script>
\t\t<link href=\"/assets/css/selectize.bootstrap3.css\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
\t</body>
</html>", "twigs/template.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/template.twig");
    }
}
