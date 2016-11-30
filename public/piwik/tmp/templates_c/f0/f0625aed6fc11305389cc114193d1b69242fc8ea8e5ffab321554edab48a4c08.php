<?php

/* @Installation/trackingCode.twig */
class __TwigTemplate_35bbc696751dd052b4fbdbf5e80111ea6684040c4c95cda8a0d9118bcebe5929 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Installation/layout.twig", "@Installation/trackingCode.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Installation/layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "
    ";
        // line 5
        if (array_key_exists("displayfirstWebsiteSetupSuccess", $context)) {
            // line 6
            echo "        <div id=\"feedback\" class=\"alert alert-success\">
            ";
            // line 7
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SetupWebsiteSetupSuccess", (isset($context["displaySiteName"]) ? $context["displaySiteName"] : $this->getContext($context, "displaySiteName")))), "html", null, true);
            echo "
        </div>
    ";
        }
        // line 10
        echo "
    ";
        // line 11
        echo (isset($context["trackingHelp"]) ? $context["trackingHelp"] : $this->getContext($context, "trackingHelp"));
        echo "

    <h3>";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_LargePiwikInstances")), "html", null, true);
        echo "</h3>
    <p>
        ";
        // line 15
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JsTagArchivingHelp1", "<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/setup-auto-archiving/\">", "</a>"));
        echo "
    </p>
    <p>
        ";
        // line 18
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReadThisToLearnMore", "<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/optimize/\">", "</a>"));
        echo "
    </p>

";
    }

    public function getTemplateName()
    {
        return "@Installation/trackingCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  64 => 18,  58 => 15,  53 => 13,  48 => 11,  45 => 10,  39 => 7,  36 => 6,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Installation/layout.twig' %}

{% block content %}

    {% if displayfirstWebsiteSetupSuccess is defined %}
        <div id=\"feedback\" class=\"alert alert-success\">
            {{ 'Installation_SetupWebsiteSetupSuccess'|translate(displaySiteName) }}
        </div>
    {% endif %}

    {{ trackingHelp|raw }}

    <h3>{{ 'Installation_LargePiwikInstances'|translate }}</h3>
    <p>
        {{ 'Installation_JsTagArchivingHelp1'|translate('<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/setup-auto-archiving/\">','</a>')|raw }}
    </p>
    <p>
        {{ 'General_ReadThisToLearnMore'|translate('<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/optimize/\">','</a>')|raw }}
    </p>

{% endblock %}
";
    }
}
