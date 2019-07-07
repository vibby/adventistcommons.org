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

/* twigs/account.twig */
class __TwigTemplate_1094493e9f9247d5ba4f59bebcdc71c0f734c13577ba2fdedcdcca4cb175a1ae extends \Twig\Template
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
        $this->parent = $this->loadTemplate("twigs/template.twig", "twigs/account.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        // line 4
        echo "\t<div class=\"container\">
\t\t<div class=\"row justify-content-center mt-5\">
\t\t\t<div class=\"col-lg-3 mb-3\">
\t\t\t\t<ul class=\"nav nav-tabs flex-lg-column\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link active\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#profile\">Profile</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" id=\"password-tab\" data-toggle=\"tab\" href=\"#password\" role=\"tab\">Password</a>
\t\t\t\t\t</li>
\t\t\t\t\t";
        // line 14
        if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
            // line 15
            echo "\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" id=\"permissions-tab\" data-toggle=\"tab\" href=\"#permissions\" role=\"tab\">Permissions</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t";
        }
        // line 19
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-xl-8 col-lg-9\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t<div class=\"tab-pane fade show active\" role=\"tabpanel\" id=\"profile\">
\t\t\t\t\t\t\t\t<div class=\"media mb-4\">
\t\t\t\t\t\t\t\t\t<img alt=\"Image\" src=\"https://www.gravatar.com/avatar/";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "md5email", []), "html", null, true);
        echo "?s=144&d=mp\" class=\"avatar avatar-lg\" />
\t\t\t\t\t\t\t\t\t<div class=\"media-body ml-3\">
\t\t\t\t\t\t\t\t\t\t<strong>Profile picture</strong><br>
\t\t\t\t\t\t\t\t\t\t<small>To change your profile picture, visit <a href=\"https://en.gravatar.com/\">Gravatar.com</a></small>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<!--end of avatar-->
\t\t\t\t\t\t\t\t<form class=\"auto-submit\" action=\"/account/save\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">First Name</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"First name\" value=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "first_name", []), "html", null, true);
        echo "\" name=\"first_name\" class=\"form-control\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Last Name</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Last name\" value=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "last_name", []), "html", null, true);
        echo "\" name=\"last_name\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Email</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" placeholder=\"Enter your email address\" name=\"email\" value=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "email", []), "html", null, true);
        echo "\" class=\"form-control\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Location</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Enter your location\" name=\"location\" value=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "location", []), "html", null, true);
        echo "\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Bio</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<textarea type=\"text\" placeholder=\"Tell us a little about yourself\" name=\"bio\" class=\"form-control\" rows=\"4\">";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "bio", []), "html", null, true);
        echo "</textarea>
\t\t\t\t\t\t\t\t\t\t\t<small>This will be displayed on your public profile</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t                                <input type=\"hidden\" name=\"id\" value=\"";
        // line 66
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Save</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tab-pane fade\" role=\"tabpanel\" id=\"password\">
\t\t\t\t\t\t\t\t<form action=\"/account/save_password\" method=\"post\" class=\"auto-submit\">
\t\t\t\t\t\t\t\t\t";
        // line 74
        if ( !$this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
            // line 75
            echo "\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Current Password</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Enter your current password\" name=\"current_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t";
        }
        // line 82
        echo "\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">New Password</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Enter a new password\" name=\"new_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t\t<small>Password must be at least 8 characters long</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Confirm Password</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Confirm your new password\" name=\"confirm_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t                                <input type=\"hidden\" name=\"id\" value=\"";
        // line 95
        echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "id", []), "html", null, true);
        echo "\">
\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Change Password</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        // line 101
        if ($this->getAttribute(($context["user"] ?? null), "is_admin", [])) {
            // line 102
            echo "\t\t\t\t\t\t\t\t<div class=\"tab-pane fade\" role=\"tabpanel\" id=\"permissions\">
\t\t\t\t\t\t\t\t\t<form action=\"/user/save_permissions\" method=\"post\" class=\"auto-submit\">
\t\t\t\t\t\t\t\t\t\t<h6>Site Permissions</h6>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Permission level</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"group_id\" class=\"custom-select\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 110
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["permission_groups"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
                // line 111
                echo "\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option ";
                echo ((($this->getAttribute($context["group"], "id", []) == ($context["user_group_id"] ?? null))) ? ("selected") : (""));
                echo " value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "id", []), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["group"], "description", []), "html", null, true);
                echo "</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 113
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t\t\t<h6>";
            // line 118
            echo twig_escape_filter($this->env, (($this->getAttribute(($context["edit_user"] ?? null), "first_name", []) . " ") . $this->getAttribute(($context["edit_user"] ?? null), "last_name", [])), "html", null, true);
            echo " contributes to the following projects</h6>
\t\t\t\t\t\t\t\t\t\t";
            // line 119
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["membership"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
                // line 120
                echo "\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "project_id", []), "html", null, true);
                echo "\" target=\"_blank\">";
                echo twig_escape_filter($this->env, ((($this->getAttribute($context["project"], "product_name", []) . " (") . $this->getAttribute($context["project"], "language_name", [])) . ") "), "html", null, true);
                echo "</a><span class=\"badge badge-light text-secondary ml-1\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["project"], "member_type", []), "html", null, true);
                echo "</span>
\t\t\t\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['project'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 122
            echo "\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["edit_user"] ?? null), "id", []), "html", null, true);
            echo "\">
\t\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Save Permissions</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
        }
        // line 129
        echo "\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
";
    }

    public function getTemplateName()
    {
        return "twigs/account.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  243 => 129,  232 => 122,  219 => 120,  215 => 119,  211 => 118,  204 => 113,  191 => 111,  187 => 110,  177 => 102,  175 => 101,  166 => 95,  151 => 82,  142 => 75,  140 => 74,  129 => 66,  122 => 62,  113 => 56,  104 => 50,  95 => 44,  86 => 38,  72 => 27,  62 => 19,  56 => 15,  54 => 14,  42 => 4,  39 => 3,  29 => 1,);
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

{% block content %}
\t<div class=\"container\">
\t\t<div class=\"row justify-content-center mt-5\">
\t\t\t<div class=\"col-lg-3 mb-3\">
\t\t\t\t<ul class=\"nav nav-tabs flex-lg-column\">
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link active\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#profile\">Profile</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t<a class=\"nav-link\" id=\"password-tab\" data-toggle=\"tab\" href=\"#password\" role=\"tab\">Password</a>
\t\t\t\t\t</li>
\t\t\t\t\t{% if user.is_admin %}
\t\t\t\t\t\t<li class=\"nav-item\">
\t\t\t\t\t\t\t<a class=\"nav-link\" id=\"permissions-tab\" data-toggle=\"tab\" href=\"#permissions\" role=\"tab\">Permissions</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t{% endif %}
\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<div class=\"col-xl-8 col-lg-9\">
\t\t\t\t<div class=\"card\">
\t\t\t\t\t<div class=\"card-body\">
\t\t\t\t\t\t<div class=\"tab-content\">
\t\t\t\t\t\t\t<div class=\"tab-pane fade show active\" role=\"tabpanel\" id=\"profile\">
\t\t\t\t\t\t\t\t<div class=\"media mb-4\">
\t\t\t\t\t\t\t\t\t<img alt=\"Image\" src=\"https://www.gravatar.com/avatar/{{edit_user.md5email}}?s=144&d=mp\" class=\"avatar avatar-lg\" />
\t\t\t\t\t\t\t\t\t<div class=\"media-body ml-3\">
\t\t\t\t\t\t\t\t\t\t<strong>Profile picture</strong><br>
\t\t\t\t\t\t\t\t\t\t<small>To change your profile picture, visit <a href=\"https://en.gravatar.com/\">Gravatar.com</a></small>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<!--end of avatar-->
\t\t\t\t\t\t\t\t<form class=\"auto-submit\" action=\"/account/save\" method=\"post\" autocomplete=\"off\">
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">First Name</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"First name\" value=\"{{edit_user.first_name}}\" name=\"first_name\" class=\"form-control\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Last Name</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Last name\" value=\"{{edit_user.last_name}}\" name=\"last_name\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Email</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"email\" placeholder=\"Enter your email address\" name=\"email\" value=\"{{edit_user.email}}\" class=\"form-control\" required />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Location</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" placeholder=\"Enter your location\" name=\"location\" value=\"{{edit_user.location}}\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Bio</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<textarea type=\"text\" placeholder=\"Tell us a little about yourself\" name=\"bio\" class=\"form-control\" rows=\"4\">{{edit_user.bio}}</textarea>
\t\t\t\t\t\t\t\t\t\t\t<small>This will be displayed on your public profile</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t                                <input type=\"hidden\" name=\"id\" value=\"{{edit_user.id}}\">
\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Save</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"tab-pane fade\" role=\"tabpanel\" id=\"password\">
\t\t\t\t\t\t\t\t<form action=\"/account/save_password\" method=\"post\" class=\"auto-submit\">
\t\t\t\t\t\t\t\t\t{% if not user.is_admin %}
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Current Password</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Enter your current password\" name=\"current_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">New Password</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Enter a new password\" name=\"new_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t\t<small>Password must be at least 8 characters long</small>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Confirm Password</label>
\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"password\" placeholder=\"Confirm your new password\" name=\"confirm_password\" class=\"form-control\" />
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</div>
\t                                <input type=\"hidden\" name=\"id\" value=\"{{edit_user.id}}\">
\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Change Password</button>
\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% if( user.is_admin) %}
\t\t\t\t\t\t\t\t<div class=\"tab-pane fade\" role=\"tabpanel\" id=\"permissions\">
\t\t\t\t\t\t\t\t\t<form action=\"/user/save_permissions\" method=\"post\" class=\"auto-submit\">
\t\t\t\t\t\t\t\t\t\t<h6>Site Permissions</h6>
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group row align-items-center\">
\t\t\t\t\t\t\t\t\t\t\t<label class=\"col-3\">Permission level</label>
\t\t\t\t\t\t\t\t\t\t\t<div class=\"col\">
\t\t\t\t\t\t\t\t\t\t\t\t<div class=\"input-group\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<select name=\"group_id\" class=\"custom-select\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% for group in permission_groups %}
\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<option {{ (group.id == user_group_id )? \"selected\" : \"\" }} value=\"{{group.id}}\">{{group.description}}</option>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t\t\t\t</select>
\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<hr>
\t\t\t\t\t\t\t\t\t\t<h6>{{edit_user.first_name ~ \" \" ~ edit_user.last_name}} contributes to the following projects</h6>
\t\t\t\t\t\t\t\t\t\t{% for project in membership %}
\t\t\t\t\t\t\t\t\t\t\t<a href=\"/projects/{{project.project_id}}\" target=\"_blank\">{{ project.product_name ~ \" (\" ~ project.language_name ~ \") \" }}</a><span class=\"badge badge-light text-secondary ml-1\">{{ project.member_type }}</span>
\t\t\t\t\t\t\t\t\t\t{% endfor %}
\t\t\t\t\t\t\t\t\t\t<input type=\"hidden\" name=\"user_id\" value=\"{{edit_user.id}}\">
\t\t\t\t\t\t\t\t\t\t<div class=\"row justify-content-end\">
\t\t\t\t\t\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-primary mr-2\">Save Permissions</button>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t{% endif %}
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
{% endblock %}", "twigs/account.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/account.twig");
    }
}
