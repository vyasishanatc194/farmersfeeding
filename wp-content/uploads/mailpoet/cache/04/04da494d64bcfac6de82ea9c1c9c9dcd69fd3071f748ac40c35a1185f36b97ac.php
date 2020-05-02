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

/* form/templates/settings/segment_selection.hbs */
class __TwigTemplate_18467968ccc37e73508b30bb1f3ed4d68cd915b71e78f3025967fd61ff28133c extends \MailPoetVendor\Twig\Template
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
        echo "<ul id=\"mailpoet_segment_selection\" class=\"clearfix\"></ul>

<div id=\"mailpoet_segment_available_container\">
  <h3>";
        // line 4
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Select the segment that you want to add:");
        echo "</h3>

  <select class=\"mailpoet_segment_available\"></select>

  <a href=\"javascript:;\" class=\"mailpoet_segment_add\"><span>";
        // line 8
        echo $this->env->getExtension('MailPoet\Twig\I18n')->translate("Add");
        echo "</span></a>
</div>

<script type=\"text/javascript\">
  jQuery(function(\$) {
    ";
        // line 14
        echo "      var selected_segments = {{#if params.values}}{{{ json_encode params.values }}}
        {{else}}[]{{/if}};
    ";
        // line 17
        echo "
    \$(function() {
      mailpoet_segment_available_render();
      mailpoet_segment_selection_render();

      setInputNames();

      // add segment
      \$('.mailpoet_segment_add').on('click', function() {
        // add currently selected segment to the selection
        var selected_segment = \$('.mailpoet_segment_available :selected');

        // add segment to selection
        selected_segments.push({
          id: selected_segment.val(),
          name: selected_segment.text(),
          is_checked: 0
        });

        // remove segment from available segments
        selected_segment.remove();

        // render selection
        mailpoet_segment_selection_render();

        setInputNames();
      });

      // remove segment
      \$('#mailpoet_segment_selection').on('click', '.remove', function(e) {
        if(\$('#mailpoet_segment_selection').children().length === 1) {
          return e.preventDefault();
        }
        var element = \$(this).parents('li');
        // remove currently selected segment to the selection
        var selected_segment = parseInt(element.data('segment'), 10);

        // remove segment from selection
        selected_segments = selected_segments.filter(function(segment) {
          return (parseInt(segment.id, 10) !== selected_segment);
        });

        // remove element
        element.remove();

        // render available segment
        mailpoet_segment_available_render();

        setInputNames();
      });
    });

    function setupSortableSegments() {
      // make segment selection sortable
      Sortable.create('mailpoet_segment_selection', {
        handles: \$\$('#mailpoet_segment_selection .handle'),
         onChange: function(item) {
          setInputNames();
        }
      });
    }

    function mailpoet_segment_available_render() {
      // clear available segments
      \$('.mailpoet_segment_available').html('');

      var selected_segment_ids = selected_segments.map(function(segment) {
        return segment.id;
      });

      // display available segments
      \$.each(mailpoet_segments, function(i, segment) {
        if(\$.inArray(segment.id, selected_segment_ids) < 0) {
          \$('.mailpoet_segment_available').append(
            '<option value=\"'+segment.id+'\">'+segment.name+'</option>'
          );
        }
      });
      mailpoet_segment_available_toggle();
    }

    function mailpoet_segment_selection_render() {
      // segment item template
      var template = Handlebars.compile(
        \$('#field_settings_segment_selection_item').html()
      );

      // update view
      \$('#mailpoet_segment_selection').html(
        template({ segments: selected_segments })
      );

      mailpoet_segment_available_toggle();
    }

    function mailpoet_segment_available_toggle() {
      // toggle visibility of available segments
      if(\$('.mailpoet_segment_available option').length === 0) {
        \$('#mailpoet_segment_available_container').hide();
      } else {
        \$('#mailpoet_segment_available_container').show();
      }
    }

    function setInputNames() {
      \$('#mailpoet_segment_selection li').each(function(index, item) {
        \$(item).find('.mailpoet_is_checked').attr('name', 'params[values]['+index+'][is_checked]');
        \$(item).find('.mailpoet_segment_id').attr('name', 'params[values]['+index+'][id]');
        \$(item).find('.mailpoet_segment_name').attr('name', 'params[values]['+index+'][name]');
      });
      setupSortableSegments();
    }
  });
<{{!}}/script>";
    }

    public function getTemplateName()
    {
        return "form/templates/settings/segment_selection.hbs";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  54 => 17,  50 => 14,  42 => 8,  35 => 4,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "form/templates/settings/segment_selection.hbs", "E:\\xampp\\htdocs\\wordpress-project\\liberty_cremations\\wp-content\\plugins\\mailpoet\\views\\form\\templates\\settings\\segment_selection.hbs");
    }
}
