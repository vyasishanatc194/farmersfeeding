<?php

use MailPoetVendor\Twig\Environment;
use MailPoetVendor\Twig\Error\LoaderError;
use MailPoetVendor\Twig\Error\RuntimeError;
use MailPoetVendor\Twig\Markup;
use MailPoetVendor\Twig\Sandbox\SecurityError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedTagError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFilterError;
use MailPoetVendor\Twig\Sandbox\SecurityNotAllowedFunctionError;
use MailPoetVendor\Twig\Source;
use MailPoetVendor\Twig\Template;

/* form/templates/blocks/date_years.hbs */
class __TwigTemplate_a82d899b852259066c05c8590daef55d87b778211ddeb717e28e72c378d5db89 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        $context["currentYear"] = \MailPoetVendor\twig_date_format_filter($this->env, "now", "Y");
        // line 2
        $context["minYear"] = ((isset($context["currentYear"]) ? $context["currentYear"] : null) - 100);
        // line 3
        echo "
<select id=\"{{ id }}_years\">
  <option value=\"\">";
        // line 5
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Year");
        echo "</option>
  ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = \MailPoetVendor\twig_ensure_traversable(range((isset($context["currentYear"]) ? $context["currentYear"] : null), (isset($context["minYear"]) ? $context["minYear"] : null)));
        foreach ($context['_seq'] as $context["_key"] => $context["year"]) {
            // line 7
            echo "    <option
      ";
            // line 8
            if (((isset($context["currentYear"]) ? $context["currentYear"] : null) == $context["year"])) {
                // line 9
                echo "      {{#if params.is_default_today}}selected=\"selected\"{{/if}}
      ";
            }
            // line 11
            echo "    >";
            echo \MailPoetVendor\twig_escape_filter($this->env, $context["year"], "html", null, true);
            echo "</option>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['year'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "</select>";
    }

    public function getTemplateName()
    {
        return "form/templates/blocks/date_years.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 13,  55 => 11,  51 => 9,  49 => 8,  46 => 7,  42 => 6,  38 => 5,  34 => 3,  32 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templates/blocks/date_years.hbs", "/data03/c5882760/public_html/wp-content/plugins/mailpoet/views/form/templates/blocks/date_years.hbs");
    }
}
