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

/* form/templates/settings/validate.hbs */
class __TwigTemplate_728c228c961675d45c68dc1303fe5e90e14694dfb19d2666ff6c1ba110b9d9e9 extends \MailPoetVendor\Twig\Template
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
        echo "<p class=\"clearfix\">
  <label>";
        // line 2
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Validate for:");
        echo "</label>
  <select name=\"params[validate]\">
    <option {{#ifCond params.validate '==' ''}}selected=\"selected\"{{/ifCond}}
      value=\"\">
      ";
        // line 6
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Nothing");
        echo "
    </option>

    <option {{#ifCond params.validate '==' 'number'}}selected=\"selected\"{{/ifCond}}
      value=\"number\">
      ";
        // line 11
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Numbers only");
        echo "
    </option>

    <option {{#ifCond params.validate '==' 'alphanum'}}selected=\"selected\"{{/ifCond}}
      value=\"alphanum\">
      ";
        // line 16
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Alphanumerical");
        echo "
    </option>

    <option {{#ifCond params.validate '==' 'phone'}}selected=\"selected\"{{/ifCond}}
      value=\"phone\">
      ";
        // line 21
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Phone number, (+,-,#,(,) and spaces allowed)");
        echo "
    </option>
  </select>
</p>";
    }

    public function getTemplateName()
    {
        return "form/templates/settings/validate.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 21,  56 => 16,  48 => 11,  40 => 6,  33 => 2,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templates/settings/validate.hbs", "E:\\xampp\\htdocs\\wordpress-project\\liberty_cremations\\wp-content\\plugins\\mailpoet\\views\\form\\templates\\settings\\validate.hbs");
    }
}
