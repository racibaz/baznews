<?php

/* @SitesManager/_displayJavascriptCode.twig */
class __TwigTemplate_3f72cfd75761bf6614104f82799002277d23647a4c866fabed920b61c170117f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<h2>";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_TrackingTags", (isset($context["displaySiteName"]) ? $context["displaySiteName"] : $this->getContext($context, "displaySiteName")))), "html", null, true);
        echo "</h2>

<div class='trackingHelp'>
    <p>";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_Intro")), "html", null, true);
        echo "</p>

    <p>";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3", "<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\" target=\"_blank\">", "</a>"));
        echo "</p>

    <h3>";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

    <p>";
        // line 10
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead", "&lt;/head&gt;"));
        echo "</p>

    <pre>";
        // line 12
        echo (isset($context["jsTag"]) ? $context["jsTag"] : $this->getContext($context, "jsTag"));
        echo "</pre>

    <p>";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "</p>

    <p>";
        // line 16
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_EndNote", "<em>", "</em>"));
        echo "</p>
</div>";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_displayJavascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  51 => 14,  46 => 12,  41 => 10,  36 => 8,  31 => 6,  26 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<h2>{{ 'SitesManager_TrackingTags'|translate(displaySiteName) }}</h2>

<div class='trackingHelp'>
    <p>{{ 'Installation_JSTracking_Intro'|translate }}</p>

    <p>{{ 'CoreAdminHome_JSTrackingIntro3'|translate('<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\" target=\"_blank\">','</a>')|raw }}</p>

    <h3>{{ 'General_JsTrackingTag'|translate }}</h3>

    <p>{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead'|translate(\"&lt;/head&gt;\")|raw }}</p>

    <pre>{{ jsTag|raw }}</pre>

    <p>{{ 'CoreAdminHome_JSTrackingIntro5'|translate('<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">','</a>')|raw }}</p>

    <p>{{ 'Installation_JSTracking_EndNote'|translate('<em>','</em>')|raw }}</p>
</div>";
    }
}
