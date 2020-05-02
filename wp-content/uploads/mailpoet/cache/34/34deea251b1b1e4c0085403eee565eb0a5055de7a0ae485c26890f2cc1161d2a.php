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

/* settings.html */
class __TwigTemplate_b0c3b87bf0e3b08aac8da35a8abf848a8e02e1c9dbcf0c6cf8e248d45e9f59a8 extends \MailPoetVendor\Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->blocks = [
            'after_css' => [$this, 'block_after_css'],
            'content' => [$this, 'block_content'],
            'translations' => [$this, 'block_translations'],
            'after_javascript' => [$this, 'block_after_javascript'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $this->parent = $this->loadTemplate("layout.html", "settings.html", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_after_css($context, array $blocks = [])
    {
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateStylesheet("settings.css");
        echo "
";
    }

    // line 7
    public function block_content($context, array $blocks = [])
    {
        // line 8
        echo "  <div id=\"settings_container\"></div>

  <script type=\"text/javascript\">
    ";
        // line 12
        echo "      var mailpoet_woocommerce_active = ";
        echo json_encode((($context["is_woocommerce_active"] ?? null) == true));
        echo ";
      var mailpoet_is_new_user = ";
        // line 13
        echo json_encode((($context["is_new_user"] ?? null) == true));
        echo ";
      var mailpoet_settings = ";
        // line 14
        echo json_encode(($context["settings"] ?? null));
        echo ";
      var mailpoet_segments = ";
        // line 15
        echo json_encode(($context["segments"] ?? null));
        echo ";
      var mailpoet_pages = ";
        // line 16
        echo json_encode(($context["pages"] ?? null));
        echo ";
      var mailpoet_mss_key_valid = ";
        // line 17
        echo json_encode(($context["mss_key_valid"] ?? null));
        echo ";
      var mailpoet_premium_key_valid = ";
        // line 18
        echo json_encode(($context["premium_key_valid"] ?? null));
        echo ";
      var mailpoet_premium_plugin_installed = ";
        // line 19
        echo json_encode(($context["premium_plugin_installed"] ?? null));
        echo ";
    ";
        // line 21
        echo "    var mailpoet_beacon_articles = [
      '57f71d49c697911f2d323486',
      '57fb0e1d9033600277a681ca',
      '57f49a929033602e61d4b9f4',
      '57fb134cc697911f2d323e3b',
    ];
  </script>
";
    }

    // line 29
    public function block_translations($context, array $blocks = [])
    {
        // line 30
        echo "  ";
        echo $this->env->getExtension('MailPoet\Twig\I18n')->localize(["settings" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Settings"), "basicsTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Basics"), "signupConfirmationTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign-up Confirmation"), "sendWithTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Send With..."), "wooCommerceTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("WooCommerce"), "advancedTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Advanced"), "keyActivationTab" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Key Activation"), "saveSettings" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Save settings"), "settingsSaved" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Settings saved"), "defaultSenderTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Default sender"), "defaultSenderDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("These email addresses will be selected by default for each new email."), "from" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("From"), "yourName" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your name"), "replyTo" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Reply-to"), "subscribeInCommentsTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribe in comments"), "subscribeInCommentsDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Visitors that comment on a post can subscribe to your list via a checkbox."), "subscribeInRegistrationTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribe in registration form"), "subscribeInRegistrationDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Allow users who register as a WordPress user on your website to subscribe to a MailPoet list (in addition to the \"WordPress Users\" list). This also enables WordPress users to receive confirmation emails (if sign-up confirmation is enabled)."), "usersWillBeSubscribedTo" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Users will be subscribed to these lists:"), "yesAddMe" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes, add me to your mailing list"), "chooseList" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Choose a list"), "manageSubTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Manage Subscription page"), "manageSubDescription1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("When your subscribers click the \"Manage your subscription\" link, they will be directed to this page."), "manageSubDescription2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("If you want to use a custom Subscription page, simply paste this shortcode on to a WordPress page: [mailpoet_manage_subscription]"), "previewPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview page"), "preview" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Preview"), "subscribersCanChooseFrom" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribers can choose from these lists:"), "leaveEmptyToDisplayAll" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Leave this field empty to display all lists"), "unsubscribeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Unsubscribe page"), "unsubscribeDescription1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("When your subscribers click the \"Unsubscribe\" link, they will be directed to this page."), "unsubscribeDescription2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("If you want to use a custom Unsubscribe page, simply paste this shortcode on to a WordPress page: [mailpoet_manage text=\"Manage your subscription\"]"), "statsNotifsTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Stats notifications", "name of a setting to automatically send statistics (newsletter open rate, click rate, etc) by email"), "statsNotifsDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Enter the email address that should receive your newsletter’s stats 24 hours after it has been sent, or every first Monday of the month for Welcome Emails and WooCommerce emails.", "Please reuse the current translations of “Welcome Emails”"), "newslettersAndPostNotifs" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Newsletters and Post Notifications"), "welcomeAndWcEmails" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Welcome Emails and WooCommerce emails", "Please reuse the current translations of “Welcome Emails”"), "pleaseFillEmail" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please fill the email address."), "newSubscriberNotifsTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("New subscriber notifications"), "newSubscriberNotifsDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enter the email address that should receive notifications when someone subscribes."), "yes" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Yes"), "no" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("No"), "archiveShortcodeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Archive page shortcode"), "archiveShortcodeDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Paste this shortcode on a page to display a list of past newsletters."), "subscribersCountShortcodeTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Shortcode to display total number of subscribers"), "subscribersCountShortcodeDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Paste this shortcode on a post or page to display the total number of confirmed subscribers."), "gdprTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Be GDPR compliant"), "gdprDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("You need to comply with European law in regards to data privacy if you have European subscribers. Rest assured, it’s easy!"), "readGuide" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read our guide"), "invalidEmail" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Invalid email address"), "enableSignupConfTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Enable sign-up confirmation"), "enableSignupConfDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("If you enable this option, your subscribers will first receive a confirmation email after they subscribe. Once they confirm their subscription (via this email), they will be marked as 'confirmed' and will begin to receive your email newsletters."), "readAboutDoubleOptIn" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Read more about Double Opt-in confirmation."), "signupConfirmationIsMandatory" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Sign-up confirmation is mandatory when using the MailPoet Sending Service."), "emailSubject" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email subject"), "emailContent" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Email content"), "emailContentDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Don't forget to include:<br /><br />[activation_link]Confirm your subscription.[/activation_link]<br /><br />Optional: [lists_to_confirm]."), "confirmationPage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Confirmation page"), "confirmationPageDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("When subscribers click on the activation link, they will be redirected to this page."), "subscribersNeedToActivateSub" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribers will need to activate their subscription via email in order to receive your newsletters. This is highly recommended!"), "newSubscribersAutoConfirmed" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("New subscribers will be automatically confirmed, without having to confirm their subscription. This is not recommended!"), "reinstallConfirmation" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Are you sure? All of your MailPoet data will be permanently erased (newsletters, statistics, subscribers, etc.)."), "announcementHeader" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Get notified when someone subscribes"), "announcementParagraph1" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("It’s been a popular feature request from our users, we hope you get lots of emails about all your new subscribers!"), "announcementParagraph2" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("(You can turn this feature off if it’s too many emails.)"), "premiumTabActivationKeyLabel" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activation Key", "mailpoet"), "premiumTabDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This key is used to validate your free or paid subscription. Paying customers will enjoy automatic upgrades of their Premium plugin and access to faster support.", "mailpoet"), "premiumTabNoKeyNotice" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Please specify a license key before validating it.", "mailpoet"), "premiumTabVerifyButton" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Verify", "mailpoet"), "premiumTabKeyValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is valid", "mailpoet"), "premiumTabKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid", "mailpoet"), "premiumTabPremiumActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is active", "mailpoet"), "premiumTabPremiumInstallingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium plugin is being installed", "mailpoet"), "premiumTabPremiumActivatingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium plugin is being activated", "mailpoet"), "premiumTabPremiumNotInstalledMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is not installed.", "mailpoet"), "premiumTabPremiumInstallMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Install MailPoet Premium plugin", "mailpoet"), "premiumTabPremiumNotActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is not active.", "mailpoet"), "premiumTabPremiumActivateMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate MailPoet Premium plugin", "mailpoet"), "premiumTabPremiumInstallationInstallingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("downloading MailPoet Premium…", "mailpoet"), "premiumTabPremiumInstallationActivatingMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("activating MailPoet Premium…", "mailpoet"), "premiumTabPremiumInstallationActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Premium is active!", "mailpoet"), "premiumTabPremiumInstallationErrorMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Something went wrong. Please [link]download the Premium plugin from your account[/link] and [link]contact our support team[/link].", "mailpoet"), "premiumTabPremiumKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid for MailPoet Premium", "mailpoet"), "premiumTabMssActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Sending Service is active", "mailpoet"), "premiumTabMssNotActiveMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("MailPoet Sending Service is not active.", "mailpoet"), "premiumTabMssActivateMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Activate MailPoet Sending Service", "mailpoet"), "premiumTabMssKeyNotValidMessage" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Your key is not valid for the MailPoet Sending Service", "mailpoet"), "wcCustomizerTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Use MailPoet to customize WooCommerce emails", "Setting for using our editor for WooCommerce email"), "wcCustomizerDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("You can use the MailPoet editor to customize the template used to send WooCommerce emails (notification for order processing, completed, ...).", "Setting for using our editor for WooCommerce email"), "openTemplateEditor" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Open template editor", "Settings button to go to WooCommerce email editor"), "wcOptinTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Opt-in on checkout", "settings area: add an email opt-in checkbox on the checkout page (e-commerce websites)"), "wcOptinDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Customers can subscribe to the \"WooCommerce Customers\" list via a checkbox on the checkout page."), "wcOptinMsgTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Checkbox opt-in message", "settings area: set the email opt-in message on the checkout page (e-commerce websites)"), "wcOptinMsgDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("This is the checkbox message your customers will see on your WooCommerce checkout page to subscribe to the \"WooCommerce Customers\" list."), "wcOptinMsgPlaceholder" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Checkbox opt-in message", "placeholder text for the WooCommerce checkout opt-in message"), "wcOptinMsgCannotBeEmpty" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("The checkbox opt-in message cannot be empty."), "subscribeOldWCTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribe old WooCommerce customers"), "subscribeOldWCDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translate("Subscribe all my past customers to this list because they agreed to receive marketing emails from me."), "enableCookiesTitle" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("Enable browser cookies", "Option in settings page: the user can accept or forbid MailPoet to use browser cookies"), "enableCookiesDescription" => $this->env->getExtension('MailPoet\Twig\I18n')->translateWithContext("If you enable this option, MailPoet will use browser cookies for more precise WooCommerce tracking. This is practical for abandoned cart emails for example.", "Browser cookies are data created by websites and stored in visitors web browser")]);
        // line 146
        echo "
";
    }

    // line 149
    public function block_after_javascript($context, array $blocks = [])
    {
        // line 150
        echo $this->env->getExtension('MailPoet\Twig\Assets')->generateJavascript("settings.js");
        echo "
";
    }

    public function getTemplateName()
    {
        return "settings.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  117 => 150,  114 => 149,  109 => 146,  106 => 30,  103 => 29,  92 => 21,  88 => 19,  84 => 18,  80 => 17,  76 => 16,  72 => 15,  68 => 14,  64 => 13,  59 => 12,  54 => 8,  51 => 7,  45 => 4,  42 => 3,  32 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "settings.html", "/data03/c5882760/public_html/wp-content/plugins/mailpoet/views/settings.html");
    }
}
