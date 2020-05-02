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

/* settings/advanced.html */
class __TwigTemplate_bb3db406b88077b4d44ce69217bcbb8c8c91469529736b266e1fd0bc971a3a2e extends \MailPoetVendor\Twig\Template
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
        echo "<table class=\"form-table\">
  <tbody>
    <!-- bounce email -->
    <tr>
      <th scope=\"row\">
        <label for=\"settings[bounce_email]\">
          ";
        // line 7
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Bounce email address");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 10
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your bounced emails will be sent to this address.");
        echo "
          <a href=\"https://kb.mailpoet.com/article/180-how-bounce-management-works-in-mailpoet-3\"
             target=\"_blank\"
          >";
        // line 13
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <input type=\"text\"
            id=\"settings[bounce_email]\"
            name=\"bounce[address]\"
            data-automation-id=\"bounce-address-field\"
            value=\"";
        // line 22
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "bounce", []), "address", []), "html", null, true);
        echo "\"
            placeholder=\"bounce@mydomain.com\"
          />
        </p>
      </td>
    </tr>
    <!-- task scheduler -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 32
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Newsletter task scheduler (cron)");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 35
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select what will activate your newsletter queue.");
        echo "
          <a href=\"http://docs.mailpoet.com/article/129-what-is-the-newsletter-task-scheduler\"
             target=\"_blank\"
          >";
        // line 38
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 47
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "wordpress", []), "html", null, true);
        echo "\"
              data-automation-id=\"wordress_cron_radio\"
              ";
        // line 49
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "wordpress", []))) {
            // line 50
            echo "              checked=\"checked\"
              ";
        }
        // line 52
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Visitors to your website (recommended)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 60
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "mailpoet", []), "html", null, true);
        echo "\"
              data-automation-id=\"mailpoet_cron_radio\"
              ";
        // line 62
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "mailpoet", []))) {
            // line 63
            echo "                checked=\"checked\"
                ";
        }
        // line 65
        echo "              />";
        echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet's own script. Doesn't work with [link]these hosts[/link]."), "http://docs.mailpoet.com/article/131-hosts-which-mailpoet-task-scheduler-wont-work", ["target" => "_blank"]);
        // line 68
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"cron_trigger[method]\"
              value=\"";
        // line 76
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute(($context["cron_trigger"] ?? null), "linux_cron", []), "html", null, true);
        echo "\"
              data-automation-id=\"linux_cron_radio\"
            ";
        // line 78
        if (($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "cron_trigger", []), "method", []) == $this->getAttribute(($context["cron_trigger"] ?? null), "linux_cron", []))) {
            // line 79
            echo "            checked=\"checked\"
            ";
        }
        // line 81
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Server side cron (Linux cron)");
        // line 82
        echo "
          </label>
        </p>
        <div id=\"settings_linux_cron\">
          <p>
            ";
        // line 87
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("To use this option please add this command to your crontab:");
        echo "<br>
            <input
               value=\"php ";
        // line 89
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["linux_cron_path"] ?? null), "html", null, true);
        echo "/mailpoet-cron.php ";
        echo \MailPoetVendor\twig_escape_filter($this->env, ($context["ABSPATH"] ?? null), "html", null, true);
        echo "\"
               class=\"large-text\"
               readonly
            />
          <p>
            ";
        // line 94
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("With the frequency of running it every minute:");
        echo "<br>
            <input
               value=\"*/1 * * * *\"
               class=\"large-text\"
               readonly
            />
        </div>
      </td>
    </tr>
    <!-- roles and capabilities -->
    <tr>
      <th scope=\"row\">
        ";
        // line 106
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Roles and capabilities");
        echo "
        <p class=\"description\">
          ";
        // line 108
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage which WordPress roles access which features of MailPoet.");
        echo "
        </p>
      </th>
      <td>
        ";
        // line 112
        if (($context["members_plugin_active"] ?? null)) {
            // line 113
            echo "        <p>
          <a href=\"";
            // line 114
            echo admin_url("users.php?page=roles");
            echo "\">";
            echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage using the Members plugin");
            echo "</a>
        </p>
        ";
        } else {
            // line 117
            echo "          ";
            echo MailPoet\Util\Helpers::replaceLinkTags($this->env->getExtension('MailPoet\Twig\I18n')->translate("Install the plugin [link]Members[/link] (free) to manage permissions."), "https://wordpress.org/plugins/members/", ["target" => "_blank"]);
            // line 120
            echo "
        ";
        }
        // line 122
        echo "      </td>
    </tr>
    <!-- link tracking -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 128
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Open and click tracking");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 131
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enable or disable open and click tracking.");
        echo "
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"tracking[enabled]\"
              data-automation-id=\"tracking-enabled-radio\"
              value=\"1\"
              ";
        // line 142
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            // line 143
            echo "              checked=\"checked\"
              ";
        }
        // line 145
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              name=\"tracking[enabled]\"
              data-automation-id=\"tracking-disabled-radio\"
              value=\"\"
              ";
        // line 154
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            // line 155
            echo "              checked=\"checked\"
              ";
        }
        // line 157
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- inactive subscribers -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 166
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Stop sending to inactive subscribers");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 169
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Gmail, Yahoo and other email providers will treat your emails like spam if your subscribers don't open your emails in the long run. This option will mark your subscribers as Inactive and MailPoet will stop sending to them.");
        echo "
          <a href=\"https://kb.mailpoet.com/article/264-inactive-subscribers\"
             target=\"_blank\"
          >";
        // line 172
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td
        class=\"mailpoet_inactive_subscribers_disabled";
        // line 176
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            echo " mailpoet_hidden";
        }
        echo "\"
        data-automation-id=\"inactive-subscribers-disabled\"
      >
        <p><i>";
        // line 179
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("This option is disabled because tracking is disabled.");
        echo "</i></p>
      </td>
      <td
        class=\"mailpoet_inactive_subscribers_enabled";
        // line 182
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "tracking", []), "enabled", [])) {
            echo " mailpoet_hidden";
        }
        echo "\"
        data-automation-id=\"inactive-subscribers-enabled\"
      >
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"\"
              data-automation-id=\"inactive-subscribers-option-never\"
              ";
        // line 192
        if ( !$this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", [])) {
            echo "checked=\"checked\"";
        }
        // line 193
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Never");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"90\"
              ";
        // line 202
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 90)) {
            echo "checked=\"checked\"";
        }
        // line 203
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 3 months (recommended if you send once a day)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"180\"
              data-automation-id=\"inactive-subscribers-default\"
              ";
        // line 213
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 180)) {
            echo "checked=\"checked\"";
        }
        // line 214
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 6 months (default, recommended if you send at least once a month)");
        echo "
          </label>
        </p>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"deactivate_subscriber_after_inactive_days\"
              value=\"365\"
              ";
        // line 223
        if (($this->getAttribute(($context["settings"] ?? null), "deactivate_subscriber_after_inactive_days", []) == 365)) {
            echo "checked=\"checked\"";
        }
        // line 224
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("After 12 months");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- share anonymous data? -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 233
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Share anonymous data");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 236
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Share anonymous data and help us improve the plugin. We appreciate your help!");
        echo "
          <a
            href=\"http://docs.mailpoet.com/article/130-sharing-your-data-with-us\"
            target=\"_blank\"
          >";
        // line 240
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Read more.", "support article link label");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"analytics[enabled]\"
              data-automation-id=\"analytics-yes\"
              value=\"1\"
              ";
        // line 251
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "analytics", []), "enabled", [])) {
            // line 252
            echo "                checked=\"checked\"
              ";
        }
        // line 254
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              name=\"analytics[enabled]\"
              data-automation-id=\"analytics-no\"
              value=\"\"
              ";
        // line 263
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "analytics", []), "enabled", [])) {
            // line 264
            echo "                checked=\"checked\"
              ";
        }
        // line 266
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
      </td>
    </tr>
    <!-- reCaptcha settings -->
    <tr>
      <th scope=\"row\">
        <label>
          ";
        // line 275
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enable reCAPTCHA");
        echo "
        </label>
        <p class=\"description\">
          ";
        // line 278
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Use reCAPTCHA to protect MailPoet subscription forms.");
        echo "
          <a
            href=\"https://www.google.com/recaptcha/admin\"
            target=\"_blank\"
          >";
        // line 282
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign up for an API key pair here.");
        echo "</a>
        </p>
      </th>
      <td>
        <p>
          <label>
            <input
              type=\"radio\"
              name=\"re_captcha[enabled]\"
              value=\"1\"
              ";
        // line 292
        if ($this->getAttribute($this->getAttribute(($context["settings"] ?? null), "re_captcha", []), "enabled", [])) {
            // line 293
            echo "                checked=\"checked\"
              ";
        }
        // line 295
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes");
        echo "
          </label>
          &nbsp;
          <label>
            <input
              type=\"radio\"
              name=\"re_captcha[enabled]\"
              value=\"\"
              ";
        // line 303
        if ( !$this->getAttribute($this->getAttribute(($context["settings"] ?? null), "re_captcha", []), "enabled", [])) {
            // line 304
            echo "                checked=\"checked\"
              ";
        }
        // line 306
        echo "            />";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("No");
        echo "
          </label>
        </p>
        <div id=\"settings_re_captcha_tokens\">
          <p>
            <input type=\"text\"
              name=\"re_captcha[site_token]\"
              value=\"";
        // line 313
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "re_captcha", []), "site_token", []), "html", null, true);
        echo "\"
              placeholder=\"";
        // line 314
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your reCAPTCHA Site Key");
        echo "\"
              class=\"regular-text\"
            />
          </p>
          <p>
            <input type=\"text\"
              name=\"re_captcha[secret_token]\"
              value=\"";
        // line 321
        echo \MailPoetVendor\twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["settings"] ?? null), "re_captcha", []), "secret_token", []), "html", null, true);
        echo "\"
              placeholder=\"";
        // line 322
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your reCAPTCHA Secret Key");
        echo "\"
              class=\"regular-text\"
            />
          </p>
          <div id=\"settings_re_captcha_tokens_error\" class=\"mailpoet_error_item mailpoet_error\">
            ";
        // line 327
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please fill the reCAPTCHA keys.");
        echo "
          </div>
        </div>
      </td>
    </tr>
    <!-- reinstall -->
    <tr>
      <th scope=\"row\">
        <label>";
        // line 335
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reinstall from scratch");
        echo "</label>
        <p class=\"description\">
          ";
        // line 337
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Want to start from the beginning? This will completely delete MailPoet and reinstall it from scratch. Remember: you will lose all of your data!");
        echo "
        </p>
      </th>
      <td>
        <p>
          <a
            id=\"mailpoet_reinstall\"
            class=\"button\"
            href=\"javascript:;\">";
        // line 345
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reinstall now...");
        echo "</a>
        </p>
      </td>
    </tr>
    <!-- logging -->
    <tr>
      <th scope=\"row\">
        <label>";
        // line 352
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Logging");
        echo "</label>
        <p class=\"description\">
          ";
        // line 354
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enables logging for diagnostics of plugin behavior.");
        echo "
      <td>
        <select
          name=\"logging\"
          data-automation-id=\"logging-select-box\"
        >
          <option
            value=\"everything\"
            data-automation-id=\"log-everything\"
            ";
        // line 363
        if (($this->getAttribute(($context["settings"] ?? null), "logging", []) == "everything")) {
            // line 364
            echo "              selected
            ";
        }
        // line 366
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Everything", "In settings: \"Logging: Everything\"");
        echo "
          <option
            value=\"errors\"
            data-automation-id=\"log-errors\"
            ";
        // line 370
        if ((($this->getAttribute(($context["settings"] ?? null), "logging", []) != "nothing") && ($this->getAttribute(($context["settings"] ?? null), "logging", []) != "everything"))) {
            // line 371
            echo "              selected
            ";
        }
        // line 373
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Errors only", "In settings: \"Logging: Errors only\"");
        echo "
          <option
            value=\"nothing\"
            data-automation-id=\"log-nothing\"
            ";
        // line 377
        if (($this->getAttribute(($context["settings"] ?? null), "logging", []) == "nothing")) {
            // line 378
            echo "              selected
            ";
        }
        // line 380
        echo "          >";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Nothing", "In settings: \"Logging: Nothing\"");
        echo "
        </select>
  </tbody>
</table>

<script type=\"text/javascript\">
  jQuery(function(\$) {
    \$(function() {
      \$('input[name=\"tracking[enabled]\"]').on('change', function() {
        var trackingEnabled = \$(this).val();
        if (trackingEnabled) {
          \$('.mailpoet_inactive_subscribers_enabled').removeClass('mailpoet_hidden');
          \$('.mailpoet_inactive_subscribers_disabled').addClass('mailpoet_hidden');
        } else {
          \$('.mailpoet_inactive_subscribers_enabled').addClass('mailpoet_hidden');
          \$('.mailpoet_inactive_subscribers_disabled').removeClass('mailpoet_hidden');
        }
      });
    });
  });
</script>
";
    }

    public function getTemplateName()
    {
        return "settings/advanced.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  652 => 380,  648 => 378,  646 => 377,  638 => 373,  634 => 371,  632 => 370,  624 => 366,  620 => 364,  618 => 363,  606 => 354,  601 => 352,  591 => 345,  580 => 337,  575 => 335,  564 => 327,  556 => 322,  552 => 321,  542 => 314,  538 => 313,  527 => 306,  523 => 304,  521 => 303,  509 => 295,  505 => 293,  503 => 292,  490 => 282,  483 => 278,  477 => 275,  464 => 266,  460 => 264,  458 => 263,  445 => 254,  441 => 252,  439 => 251,  425 => 240,  418 => 236,  412 => 233,  399 => 224,  395 => 223,  382 => 214,  378 => 213,  364 => 203,  360 => 202,  347 => 193,  343 => 192,  328 => 182,  322 => 179,  314 => 176,  307 => 172,  301 => 169,  295 => 166,  282 => 157,  278 => 155,  276 => 154,  263 => 145,  259 => 143,  257 => 142,  243 => 131,  237 => 128,  229 => 122,  225 => 120,  222 => 117,  214 => 114,  211 => 113,  209 => 112,  202 => 108,  197 => 106,  182 => 94,  172 => 89,  167 => 87,  160 => 82,  157 => 81,  153 => 79,  151 => 78,  146 => 76,  136 => 68,  133 => 65,  129 => 63,  127 => 62,  122 => 60,  110 => 52,  106 => 50,  104 => 49,  99 => 47,  87 => 38,  81 => 35,  75 => 32,  62 => 22,  50 => 13,  44 => 10,  38 => 7,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings/advanced.html", "E:\\xampp\\htdocs\\wordpress-project\\liberty_cremations\\wp-content\\plugins\\mailpoet\\views\\settings\\advanced.html");
    }
}
