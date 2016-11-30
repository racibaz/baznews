<?php

/* @DevicesDetection/software.twig */
class __TwigTemplate_65e4b7d9ef3d35bad0f22e97b713953030e7b4c56f913ec58342de85b92d7471 extends Twig_Template
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
        <h2 piwik-enriched-headline>";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_OperatingSystems")), "html", null, true);
        echo "</h2>
        ";
        // line 5
        echo (isset($context["osReport"]) ? $context["osReport"] : $this->getContext($context, "osReport"));
        echo "
        ";
        // line 6
        if ( !twig_test_empty(((array_key_exists("configurations", $context)) ? (_twig_default_filter((isset($context["configurations"]) ? $context["configurations"] : $this->getContext($context, "configurations")))) : ("")))) {
            // line 7
            echo "            <h2 piwik-enriched-headline>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Resolution_Configurations")), "html", null, true);
            echo "</h2>
            ";
            // line 8
            echo (isset($context["configurations"]) ? $context["configurations"] : $this->getContext($context, "configurations"));
            echo "
        ";
        }
        // line 10
        echo "    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_Browsers")), "html", null, true);
        echo "</h2>
        ";
        // line 14
        echo (isset($context["browserReport"]) ? $context["browserReport"] : $this->getContext($context, "browserReport"));
        echo "
        <h2 piwik-enriched-headline>";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_BrowserEngines")), "html", null, true);
        echo "</h2>
        ";
        // line 16
        echo (isset($context["browserEngineReport"]) ? $context["browserEngineReport"] : $this->getContext($context, "browserEngineReport"));
        echo "
        ";
        // line 17
        if ( !twig_test_empty(((array_key_exists("browserPlugins", $context)) ? (_twig_default_filter((isset($context["browserPlugins"]) ? $context["browserPlugins"] : $this->getContext($context, "browserPlugins")))) : ("")))) {
            // line 18
            echo "            <h2 piwik-enriched-headline>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
            echo "</h2>
            ";
            // line 19
            echo (isset($context["browserPlugins"]) ? $context["browserPlugins"] : $this->getContext($context, "browserPlugins"));
            echo "
        ";
        }
        // line 21
        echo "    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@DevicesDetection/software.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  72 => 19,  67 => 18,  65 => 17,  61 => 16,  57 => 15,  53 => 14,  49 => 13,  44 => 10,  39 => 8,  34 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"row\">

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_OperatingSystems\"|translate }}</h2>
        {{ osReport | raw}}
        {% if configurations|default is not empty %}
            <h2 piwik-enriched-headline>{{ 'Resolution_Configurations'|translate }}</h2>
            {{ configurations|raw }}
        {% endif %}
    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_Browsers\"|translate }}</h2>
        {{ browserReport | raw }}
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_BrowserEngines\"|translate }}</h2>
        {{ browserEngineReport | raw }}
        {% if browserPlugins|default is not empty %}
            <h2 piwik-enriched-headline>{{ 'General_Plugins'|translate }}</h2>
            {{ browserPlugins|raw }}
        {% endif %}
    </div>

</div>
";
    }
}
