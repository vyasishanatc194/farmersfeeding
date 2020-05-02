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

/* layout.html */
class __TwigTemplate_959fa081da5cf364e41cdc14f69705a08c53d2cb089408764c663887968bb8c8 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
            'templates' => [$this, 'block_templates'],
            'title' => [$this, 'block_title'],
            'content' => [$this, 'block_content'],
            'after_css' => [$this, 'block_after_css'],
            'translations' => [$this, 'block_translations'],
            'after_translations' => [$this, 'block_after_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        if ((isset($context["sub_menu"]) ? $context["sub_menu"] : null)) {
            // line 2
            echo "<script type=\"text/javascript\">
jQuery('.toplevel_page_mailpoet-newsletters.menu-top-last')
  .addClass('wp-has-current-submenu')
  .find('a[href\$=\"";
            // line 5
            echo \MailPoetVendor\twig_escape_filter($this->env, (isset($context["sub_menu"]) ? $context["sub_menu"] : null), "html", null, true);
            echo "\"]')
  .addClass('current')
  .parent()
  .addClass('current');
</script>
";
        }
        // line 11
        echo "
<!-- system notices -->
<div id=\"mailpoet_notice_system\" class=\"mailpoet_notice\" style=\"display:none;\"></div>

<!-- handlebars templates -->
";
        // line 16
        $this->displayBlock('templates', $context, $blocks);
        // line 17
        echo "
<!-- main container -->
<div class=\"wrap\">
  <!-- notices -->
  <div id=\"mailpoet_notice_error\" class=\"mailpoet_notice\" style=\"display:none;\"></div>
  <div id=\"mailpoet_notice_success\" class=\"mailpoet_notice\" style=\"display:none;\"></div>

  <!-- title block -->
  ";
        // line 25
        $this->displayBlock('title', $context, $blocks);
        // line 26
        echo "  <!-- content block -->
  ";
        // line 27
        $this->displayBlock('content', $context, $blocks);
        // line 28
        echo "</div>

<!-- stylesheets -->
";
        // line 31
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("admin.css");
        // line 33
        echo "

";
        // line 35
        echo do_action("mailpoet_styles_admin_after");
        echo "

<!-- rtl specific stylesheet -->
";
        // line 38
        if ($this->env->getExtension('MailPoet\Twig\Functions')->isRtl()) {
            // line 39
            echo "  ";
            echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("rtl.css");
            echo "
";
        }
        // line 41
        echo "
";
        // line 42
        $this->displayBlock('after_css', $context, $blocks);
        // line 43
        echo "
<script type=\"text/javascript\">
  var mailpoet_date_format = \"";
        // line 45
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\Functions')->getWPDateTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_time_format = \"";
        // line 46
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_escape_filter($this->env, $this->env->getExtension('MailPoet\Twig\Functions')->getWPTimeFormat(), "js"), "html", null, true);
        echo "\";
  var mailpoet_version = \"";
        // line 47
        echo $this->env->getExtension('MailPoet\Twig\Functions')->getMailPoetVersion();
        echo "\";
  var mailpoet_locale = \"";
        // line 48
        echo $this->env->getExtension('MailPoet\Twig\Functions')->getTwoLettersLocale();
        echo "\";
  var mailpoet_polls_data = ";
        // line 49
        echo json_encode($this->env->getExtension('MailPoet\Twig\Polls')->getPollsData());
        echo ";
  var mailpoet_polls_visibility = ";
        // line 50
        echo json_encode($this->env->getExtension('MailPoet\Twig\Polls')->getPollsVisibility());
        echo ";
  var mailpoet_premium_version = ";
        // line 51
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->getMailPoetPremiumVersion());
        echo ";
  var mailpoet_analytics_enabled = ";
        // line 52
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_jsonencode_filter(call_user_func_array($this->env->getFunction('is_analytics_enabled')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_analytics_data = ";
        // line 53
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_data')->getCallable(), []));
        echo ";
  var mailpoet_analytics_public_id = ";
        // line 54
        echo json_encode(call_user_func_array($this->env->getFunction('get_analytics_public_id')->getCallable(), []));
        echo ";
  var mailpoet_analytics_new_public_id = ";
        // line 55
        echo \MailPoetVendor\twig_escape_filter($this->env, \MailPoetVendor\twig_jsonencode_filter(call_user_func_array($this->env->getFunction('is_analytics_public_id_new')->getCallable(), [])), "html", null, true);
        echo ";
  var mailpoet_free_domains = ";
        // line 56
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->getFreeDomains());
        echo ";
  var mailpoet_woocommerce_active = ";
        // line 57
        echo json_encode($this->env->getExtension('MailPoet\Twig\Functions')->isWoocommerceActive());
        echo ";
  // RFC 5322 standard; http://emailregex.com/ combined with https://google.github.io/closure-library/api/goog.format.EmailAddress.html#isValid
  var mailpoet_email_regex = /(?=^[+a-zA-Z0-9_.!#\$%&'*\\/=?^`{|}~-]+@([a-zA-Z0-9-]+\\.)+[a-zA-Z0-9]{2,63}\$)(?=^(([^<>()\\[\\]\\\\.,;:\\s@\"]+(\\.[^<>()\\[\\]\\\\.,;:\\s@\"]+)*)|(\".+\"))@((\\[[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}\\.[0-9]{1,3}])|(([a-zA-Z\\-0-9]+\\.)+[a-zA-Z]{2,})))/;
  var mailpoet_feature_flags = ";
        // line 60
        echo json_encode((isset($context["feature_flags"]) ? $context["feature_flags"] : null));
        echo ";
</script>

<!-- javascripts -->
";
        // line 64
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("vendor.js", "mailpoet.js");
        // line 67
        echo "

";
        // line 69
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["ajaxFailedErrorMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("An error has happened while performing a request, the server has responded with response code %d"), "senderEmailAddressWarning1" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You might not reach the inbox of your subscribers if you use this email address.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning2" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Use an address like %suggested for the Sender and put %originalSender in the <em>Reply-to</em> field below.", "In the last step, before sending a newsletter. URL: ?page=mailpoet-newsletters#/send/2"), "senderEmailAddressWarning3" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.")]);
        // line 74
        echo "
";
        // line 75
        $this->displayBlock('translations', $context, $blocks);
        // line 76
        echo "
";
        // line 77
        $this->displayBlock('after_translations', $context, $blocks);
        // line 78
        echo "
";
        // line 79
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("admin_vendor_chunk.js", "admin_vendor.js");
        // line 82
        echo "

";
        // line 84
        echo do_action("mailpoet_scripts_admin_before");
        echo "

";
        // line 86
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("admin.js");
        // line 88
        echo "

";
        // line 90
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("lib/analytics.js");
        echo "

";
        // line 92
        $context["has_valid_premium_key"] = $this->env->getExtension('MailPoet\Twig\Functions')->hasValidPremiumKey();
        // line 93
        echo "
";
        // line 94
        $context["helpscout_form_id"] = "dd918048-8d73-11e7-b5b5-0ec85169275a";
        // line 95
        if ((isset($context["has_valid_premium_key"]) ? $context["has_valid_premium_key"] : null)) {
            // line 96
            echo "  ";
            $context["helpscout_form_id"] = "6974b88d-8d85-11e7-b5b5-0ec85169275a";
        }
        // line 98
        echo "<script>!function(e,o,n){window.HSCW=o,window.HS=n,n.beacon=n.beacon||{};var t=n.beacon;t.userConfig={},t.readyQueue=[],t.config=function(e){this.userConfig=e},t.ready=function(e){this.readyQueue.push(e)},o.config={docs:{enabled:!0,baseUrl:\"https://mailpoet3.helpscoutdocs.com/\"},contact:{enabled:!0,formId:\"";
        echo \MailPoetVendor\twig_escape_filter($this->env, (isset($context["helpscout_form_id"]) ? $context["helpscout_form_id"] : null), "html", null, true);
        echo "\"}};var r=e.getElementsByTagName(\"script\")[0],c=e.createElement(\"script\");c.type=\"text/javascript\",c.async=!0,c.src=\"https://djtflbt20bdde.cloudfront.net/\",r.parentNode.insertBefore(c,r)}(document,window.HSCW||{},window.HS||{});</script>

<script type=\"text/javascript\">
  if(window['HS'] !== undefined) {
    // HelpScout Beacon: Configuration
    HS.beacon.config({
      icon: 'message',
      zIndex: 50000,
      instructions: \"";
        // line 106
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Want to give feedback to the MailPoet team? Contact us here. Please provide as much information as possible!");
        echo "\",
      showContactFields: true
    });

    // HelpScout Beacon: Custom information
    HS.beacon.ready(function() {
      HS.beacon.identify(
        ";
        // line 113
        echo json_encode(\MailPoet\Helpscout\Beacon::getData());
        echo "
      );
    });
  }
</script>
<script>
  Parsley.addMessages('mailpoet', {
    defaultMessage: '";
        // line 120
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value seems to be invalid.");
        echo "',
    type: {
      email: '";
        // line 122
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid email.");
        echo "',
      url: '";
        // line 123
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid url.");
        echo "',
      number: '";
        // line 124
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid number.");
        echo "',
      integer: '";
        // line 125
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be a valid integer.");
        echo "',
      digits: '";
        // line 126
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be digits.");
        echo "',
      alphanum: '";
        // line 127
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be alphanumeric.");
        echo "'
    },
    notblank: '";
        // line 129
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should not be blank.");
        echo "',
    required: '";
        // line 130
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is required.");
        echo "',
    pattern: '";
        // line 131
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value seems to be invalid.");
        echo "',
    min: '";
        // line 132
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be greater than or equal to %s.");
        echo "',
    max: '";
        // line 133
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be lower than or equal to %s.");
        echo "',
    range: '";
        // line 134
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be between %s and %s.");
        echo "',
    minlength: '";
        // line 135
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is too short. It should have %s characters or more.");
        echo "',
    maxlength: '";
        // line 136
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value is too long. It should have %s characters or fewer.");
        echo "',
    length: '";
        // line 137
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value length is invalid. It should be between %s and %s characters long.");
        echo "',
    mincheck: '";
        // line 138
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select at least %s choices.");
        echo "',
    maxcheck: '";
        // line 139
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select %s choices or fewer.");
        echo "',
    check: '";
        // line 140
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("You must select between %s and %s choices.");
        echo "',
    equalto: '";
        // line 141
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This value should be the same.");
        echo "'
  });

  Parsley.setLocale('mailpoet');
</script>
";
        // line 146
        $this->displayBlock('after_javascript', $context, $blocks);
    }

    // line 16
    public function block_templates($context, array $blocks = [])
    {
    }

    // line 25
    public function block_title($context, array $blocks = [])
    {
    }

    // line 27
    public function block_content($context, array $blocks = [])
    {
    }

    // line 42
    public function block_after_css($context, array $blocks = [])
    {
    }

    // line 75
    public function block_translations($context, array $blocks = [])
    {
    }

    // line 77
    public function block_after_translations($context, array $blocks = [])
    {
    }

    // line 146
    public function block_after_javascript($context, array $blocks = [])
    {
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  382 => 146,  377 => 77,  372 => 75,  367 => 42,  362 => 27,  357 => 25,  352 => 16,  348 => 146,  340 => 141,  336 => 140,  332 => 139,  328 => 138,  324 => 137,  320 => 136,  316 => 135,  312 => 134,  308 => 133,  304 => 132,  300 => 131,  296 => 130,  292 => 129,  287 => 127,  283 => 126,  279 => 125,  275 => 124,  271 => 123,  267 => 122,  262 => 120,  252 => 113,  242 => 106,  230 => 98,  226 => 96,  224 => 95,  222 => 94,  219 => 93,  217 => 92,  212 => 90,  208 => 88,  206 => 86,  201 => 84,  197 => 82,  195 => 79,  192 => 78,  190 => 77,  187 => 76,  185 => 75,  182 => 74,  180 => 69,  176 => 67,  174 => 64,  167 => 60,  161 => 57,  157 => 56,  153 => 55,  149 => 54,  145 => 53,  141 => 52,  137 => 51,  133 => 50,  129 => 49,  125 => 48,  121 => 47,  117 => 46,  113 => 45,  109 => 43,  107 => 42,  104 => 41,  98 => 39,  96 => 38,  90 => 35,  86 => 33,  84 => 31,  79 => 28,  77 => 27,  74 => 26,  72 => 25,  62 => 17,  60 => 16,  53 => 11,  44 => 5,  39 => 2,  37 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "layout.html", "/data03/c5882760/public_html/wp-content/plugins/mailpoet/views/layout.html");
    }
}
