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

/* twigs/email/template.twig */
class __TwigTemplate_b71c46ef53b88170cebd40100f35e19a3ecb0798a7af3d3f4ca4a7a957fd63de extends \Twig\Template
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
        echo "<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">

<head>
\t<!--[if !mso]><!-- -->
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<!--<![endif]-->
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t<style type=\"text/css\">
\t\t#outlook a { padding:0; }
\t\t.ReadMsgBody { width:100%; }
\t\t.ExternalClass { width:100%; }
\t\t.ExternalClass * { line-height:100%; }
\t\tbody { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
\t\ttable, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
\t\timg { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
\t\tp { display:block;margin:13px 0; }
\t</style>
\t<!--[if !mso]><!-->
\t<style type=\"text/css\">
\t\t@media only screen and (max-width:480px) {
\t\t\t@-ms-viewport { width:320px; }
\t\t\t@viewport { width:320px; }
\t\t}
\t</style>
\t<!--<![endif]-->
\t<!--[if mso]>
\t\t<xml>
\t\t<o:OfficeDocumentSettings>
\t\t\t<o:AllowPNG/>
\t\t\t<o:PixelsPerInch>96</o:PixelsPerInch>
\t\t</o:OfficeDocumentSettings>
\t\t</xml>
\t\t<![endif]-->
\t<!--[if lte mso 11]>
\t\t<style type=\"text/css\">
\t\t\t.outlook-group-fix { width:100% !important; }
\t\t</style>
\t\t<![endif]-->


\t<style type=\"text/css\">
\t\t@media only screen and (min-width:480px) {
\t\t\t.mj-column-per-100 { width:100% !important; max-width: 100%; }
\t\t}
\t\t[owa] .mj-column-per-100 { width:100% !important; max-width: 100%; }

\t\t@media only screen and (max-width:480px) {
\t\t\ttable.full-width-mobile { width: 100% !important; }
\t\t\ttd.full-width-mobile { width: auto !important; }
\t\t}
\t</style>


</head>

<body style=\"background-color:#F4F4F4;\">


\t<div style=\"background-color:#F4F4F4;\">


\t\t<!--[if mso | IE]>
\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\"
\t>
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td class=\"\" style=\"vertical-align:top;width:600px;\">
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"center\" style=\"font-size:0px;padding:10px 25px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-collapse:collapse;border-spacing:0px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td style=\"width:600px;\">

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img height=\"auto\" src=\"";
        // line 99
        echo twig_escape_filter($this->env, ($context["base_url"] ?? null), "html", null, true);
        echo "assets/img/email_header.jpg\" style=\"border:none;border-radius:px;display:block;outline:none;text-decoration:none;height:auto;width:100%;\" width=\"600\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>

\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>

\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\">
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"background:#ffffff;background-color:#ffffff;width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td
\t\t\t\t\t class=\"\" style=\"vertical-align:top;width:600px;\"
\t\t\t\t>
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t<h1 style=\"font-size: 20px; font-weight: bold;\">";
        // line 164
        echo twig_escape_filter($this->env, ($context["heading"] ?? null), "html", null, true);
        echo "</h1>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 171
        $this->displayBlock('content', $context, $blocks);
        // line 172
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>

\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\"
\t>
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"background:transparent;background-color:transparent;Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"background:transparent;background-color:transparent;width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td
\t\t\t\t\t class=\"\" style=\"vertical-align:top;width:600px;\"
\t\t\t\t>
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-size: 13px; margin: 10px 0;\"><a target=\"_blank\" href=\"https://AdventistCommons.org\">AdventistCommons.org</a> | Resourcing the global church<br><a href=\"mailto:info@adventistcommons.org\">info@adventistcommons.org</a></p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>

\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<![endif]-->


\t</div>

</body>

</html>";
    }

    // line 171
    public function block_content($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "twigs/email/template.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  310 => 171,  211 => 172,  209 => 171,  199 => 164,  131 => 99,  31 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("<!doctype html>
<html xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">

<head>
\t<!--[if !mso]><!-- -->
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<!--<![endif]-->
\t<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
\t<style type=\"text/css\">
\t\t#outlook a { padding:0; }
\t\t.ReadMsgBody { width:100%; }
\t\t.ExternalClass { width:100%; }
\t\t.ExternalClass * { line-height:100%; }
\t\tbody { margin:0;padding:0;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%; }
\t\ttable, td { border-collapse:collapse;mso-table-lspace:0pt;mso-table-rspace:0pt; }
\t\timg { border:0;height:auto;line-height:100%; outline:none;text-decoration:none;-ms-interpolation-mode:bicubic; }
\t\tp { display:block;margin:13px 0; }
\t</style>
\t<!--[if !mso]><!-->
\t<style type=\"text/css\">
\t\t@media only screen and (max-width:480px) {
\t\t\t@-ms-viewport { width:320px; }
\t\t\t@viewport { width:320px; }
\t\t}
\t</style>
\t<!--<![endif]-->
\t<!--[if mso]>
\t\t<xml>
\t\t<o:OfficeDocumentSettings>
\t\t\t<o:AllowPNG/>
\t\t\t<o:PixelsPerInch>96</o:PixelsPerInch>
\t\t</o:OfficeDocumentSettings>
\t\t</xml>
\t\t<![endif]-->
\t<!--[if lte mso 11]>
\t\t<style type=\"text/css\">
\t\t\t.outlook-group-fix { width:100% !important; }
\t\t</style>
\t\t<![endif]-->


\t<style type=\"text/css\">
\t\t@media only screen and (min-width:480px) {
\t\t\t.mj-column-per-100 { width:100% !important; max-width: 100%; }
\t\t}
\t\t[owa] .mj-column-per-100 { width:100% !important; max-width: 100%; }

\t\t@media only screen and (max-width:480px) {
\t\t\ttable.full-width-mobile { width: 100% !important; }
\t\t\ttd.full-width-mobile { width: auto !important; }
\t\t}
\t</style>


</head>

<body style=\"background-color:#F4F4F4;\">


\t<div style=\"background-color:#F4F4F4;\">


\t\t<!--[if mso | IE]>
\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\"
\t>
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0;padding-bottom:0px;padding-top:0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td class=\"\" style=\"vertical-align:top;width:600px;\">
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"center\" style=\"font-size:0px;padding:10px 25px;padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"border-collapse:collapse;border-spacing:0px;\">
\t\t\t\t\t\t\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t<td style=\"width:600px;\">

\t\t\t\t\t\t\t\t\t\t\t\t\t\t\t<img height=\"auto\" src=\"{{ base_url }}assets/img/email_header.jpg\" style=\"border:none;border-radius:px;display:block;outline:none;text-decoration:none;height:auto;width:100%;\" width=\"600\" />

\t\t\t\t\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t\t\t\t</tbody>
\t\t\t\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>

\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>

\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\">
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"background:#ffffff;background-color:#ffffff;Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"background:#ffffff;background-color:#ffffff;width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td
\t\t\t\t\t class=\"\" style=\"vertical-align:top;width:600px;\"
\t\t\t\t>
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t<h1 style=\"font-size: 20px; font-weight: bold;\">{{ heading }}</h1>
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">
\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t{% block content %}{% endblock %}
\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>

\t<table
\t\t align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"\" style=\"width:600px;\" width=\"600\"
\t>
\t\t<tr>
\t\t\t<td style=\"line-height:0px;font-size:0px;mso-line-height-rule:exactly;\">
\t<![endif]-->


\t\t<div style=\"background:transparent;background-color:transparent;Margin:0px auto;max-width:600px;\">

\t\t\t<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"background:transparent;background-color:transparent;width:100%;\">
\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td style=\"direction:ltr;font-size:0px;padding:20px 0px 20px 0px;text-align:center;vertical-align:top;\">
\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">

\t\t<tr>

\t\t\t\t<td
\t\t\t\t\t class=\"\" style=\"vertical-align:top;width:600px;\"
\t\t\t\t>
\t\t\t<![endif]-->

\t\t\t\t\t\t\t<div class=\"mj-column-per-100 outlook-group-fix\" style=\"font-size:13px;text-align:left;direction:ltr;display:inline-block;vertical-align:top;width:100%;\">

\t\t\t\t\t\t\t\t<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\" style=\"vertical-align:top;\" width=\"100%\">

\t\t\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t\t\t<td align=\"left\" style=\"font-size:0px;padding:0px 25px 0px 25px;padding-top:0px;padding-bottom:0px;word-break:break-word;\">

\t\t\t\t\t\t\t\t\t\t\t<div style=\"font-family:Arial, sans-serif;font-size:13px;line-height:22px;text-align:left;color:#55575d;\">
\t\t\t\t\t\t\t\t\t\t\t\t<p style=\"font-size: 13px; margin: 10px 0;\"><a target=\"_blank\" href=\"https://AdventistCommons.org\">AdventistCommons.org</a> | Resourcing the global church<br><a href=\"mailto:info@adventistcommons.org\">info@adventistcommons.org</a></p>
\t\t\t\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t\t\t</tr>

\t\t\t\t\t\t\t\t</table>

\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<!--[if mso | IE]>
\t\t\t\t</td>

\t\t</tr>

\t\t\t\t\t\t\t</table>
\t\t\t\t\t\t<![endif]-->
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>

\t\t</div>


\t\t<!--[if mso | IE]>
\t\t\t</td>
\t\t</tr>
\t</table>
\t<![endif]-->


\t</div>

</body>

</html>", "twigs/email/template.twig", "/Applications/MAMP/htdocs/adventistcommons.org/application/views/twigs/email/template.twig");
    }
}
