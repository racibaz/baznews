<?php

/* @UserCountry/index.twig */
class __TwigTemplate_a25cf9d7a87522a44c2d9be70d9d39cd300a926586b42aa4da5cbe7849638976 extends Twig_Template
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
        echo "<div class=\"row\">

    <div class=\"col-md-6\">
        ";
        // line 4
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.leftColumnUserCountry"));
        echo "

        <h2 piwik-enriched-headline>";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Continent")), "html", null, true);
        echo "</h2>
        ";
        // line 7
        echo (isset($context["dataTableContinent"]) ? $context["dataTableContinent"] : $this->getContext($context, "dataTableContinent"));
        echo "

        <div class=\"sparkline\">
            ";
        // line 10
        echo call_user_func_array($this->env->getFunction('sparkline')->getCallable(), array((isset($context["urlSparklineCountries"]) ? $context["urlSparklineCountries"] : $this->getContext($context, "urlSparklineCountries"))));
        echo "
            ";
        // line 11
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_DistinctCountries", (("<strong>" . call_user_func_array($this->env->getFilter('number')->getCallable(), array((isset($context["numberDistinctCountries"]) ? $context["numberDistinctCountries"] : $this->getContext($context, "numberDistinctCountries"))))) . "</strong>")));
        echo "
        </div>
        <div style=\"clear:left\"></div>

        ";
        // line 15
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.footerUserCountry"));
        echo "
    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Country")), "html", null, true);
        echo "</h2>
        ";
        // line 20
        echo (isset($context["dataTableCountry"]) ? $context["dataTableCountry"] : $this->getContext($context, "dataTableCountry"));
        echo "

        <h2 piwik-enriched-headline>";
        // line 22
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Region")), "html", null, true);
        echo "</h2>
        ";
        // line 23
        echo (isset($context["dataTableRegion"]) ? $context["dataTableRegion"] : $this->getContext($context, "dataTableRegion"));
        echo "

        <h2 piwik-enriched-headline>";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_City")), "html", null, true);
        echo "</h2>
        ";
        // line 26
        echo (isset($context["dataTableCity"]) ? $context["dataTableCity"] : $this->getContext($context, "dataTableCity"));
        echo "
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@UserCountry/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  79 => 26,  75 => 25,  70 => 23,  66 => 22,  61 => 20,  57 => 19,  50 => 15,  43 => 11,  39 => 10,  33 => 7,  29 => 6,  24 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"row\">

    <div class=\"col-md-6\">
        {{ postEvent(\"Template.leftColumnUserCountry\") }}

        <h2 piwik-enriched-headline>{{ 'UserCountry_Continent'|translate }}</h2>
        {{ dataTableContinent|raw }}

        <div class=\"sparkline\">
            {{ sparkline(urlSparklineCountries) }}
            {{ 'UserCountry_DistinctCountries'|translate(\"<strong>\"~numberDistinctCountries|number~\"</strong>\")|raw }}
        </div>
        <div style=\"clear:left\"></div>

        {{ postEvent(\"Template.footerUserCountry\") }}
    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>{{ 'UserCountry_Country'|translate }}</h2>
        {{ dataTableCountry|raw }}

        <h2 piwik-enriched-headline>{{ 'UserCountry_Region'|translate }}</h2>
        {{ dataTableRegion|raw }}

        <h2 piwik-enriched-headline>{{ 'UserCountry_City'|translate }}</h2>
        {{ dataTableCity|raw }}
    </div>

</div>
";
    }
}
