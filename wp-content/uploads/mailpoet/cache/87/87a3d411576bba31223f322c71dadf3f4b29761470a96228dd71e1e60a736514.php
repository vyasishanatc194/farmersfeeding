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

/* form/templates/blocks/text.hbs */
class __TwigTemplate_e4f09a4e91d69d8d6a94dd9d729d4b0b55c3e4309c1da0ac19d327fbce3073ea extends \MailPoetVendor\Twig\Template
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
        echo "{{#unless params.label_within}}<label>{{ params.label }}{{#if params.required}} *{{/if}}</label>{{/unless}}
<input type=\"text\" disabled=\"disabled\" value=\"\" placeholder=\"{{#if params.label_within}}{{ params.label }}{{#if params.required}} *{{/if}}{{/if}}\" />";
    }

    public function getTemplateName()
    {
        return "form/templates/blocks/text.hbs";
    }

    public function getDebugInfo()
    {
        return array (  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templates/blocks/text.hbs", "/data03/c5882760/public_html/wp-content/plugins/mailpoet/views/form/templates/blocks/text.hbs");
    }
}
