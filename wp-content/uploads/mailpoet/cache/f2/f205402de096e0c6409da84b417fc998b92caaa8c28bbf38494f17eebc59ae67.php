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

/* form/templates/settings/values_item.hbs */
class __TwigTemplate_74a75ae8a15c882a4f315a9476289cd85bae8943f28fb76440d221bc8253b3f2 extends \MailPoetVendor\Twig\Template
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
        echo "<li class=\"clearfix\">
  {{#ifCond type 'in' 'radio,select'}}
    <input class=\"is_checked radio\" type=\"radio\" name=\"\"
    {{#if is_checked}}checked=\"checked\"{{/if}} value=\"1\"/>
  {{else}}
    <input class=\"is_checked checkbox\" type=\"checkbox\" name=\"\"
    {{#if is_checked}}checked=\"checked\"{{/if}} value=\"1\"/>
  {{/ifCond}}

    <input
      type=\"text\"
      name=\"\"
      class=\"value\"
      value=\"{{ value }}\"
      data-parsley-errors-messages-disabled=\"true\"
      data-parsley-required=\"true\"
    />

    {{#ifCond type 'in' 'radio,select'}}
      <a class=\"remove\" href=\"javascript:;\">";
        // line 20
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Remove");
        echo "</a>
    {{/ifCond}}
</li>";
    }

    public function getTemplateName()
    {
        return "form/templates/settings/values_item.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  51 => 20,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templates/settings/values_item.hbs", "/var/www/html/dev/wordpress/liberty_cremations/wp-content/plugins/mailpoet/views/form/templates/settings/values_item.hbs");
    }
}
