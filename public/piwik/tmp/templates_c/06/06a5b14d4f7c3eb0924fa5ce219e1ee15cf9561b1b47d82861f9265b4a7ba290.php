<?php

/* @DevicesDetection/devices.twig */
class __TwigTemplate_833d68794d48df94fb1a4e06e7e4dd2f53508261e236fce12839bb020914ce1c extends Twig_Template
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
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceType")), "html", null, true);
        echo "</h2>
        ";
        // line 5
        echo (isset($context["deviceTypes"]) ? $context["deviceTypes"] : $this->getContext($context, "deviceTypes"));
        echo "
        <h2 piwik-enriched-headline>";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceBrand")), "html", null, true);
        echo "</h2>
        ";
        // line 7
        echo (isset($context["deviceBrands"]) ? $context["deviceBrands"] : $this->getContext($context, "deviceBrands"));
        echo "
    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceModel")), "html", null, true);
        echo "</h2>
        ";
        // line 12
        echo (isset($context["deviceModels"]) ? $context["deviceModels"] : $this->getContext($context, "deviceModels"));
        echo "
        ";
        // line 13
        if ( !twig_test_empty(((array_key_exists("resolutions", $context)) ? (_twig_default_filter((isset($context["resolutions"]) ? $context["resolutions"] : $this->getContext($context, "resolutions")))) : ("")))) {
            // line 14
            echo "            <h2 piwik-enriched-headline>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Resolution_Resolutions")), "html", null, true);
            echo "</h2>
            ";
            // line 15
            echo (isset($context["resolutions"]) ? $context["resolutions"] : $this->getContext($context, "resolutions"));
            echo "
        ";
        }
        // line 17
        echo "    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "@DevicesDetection/devices.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 17,  58 => 15,  53 => 14,  51 => 13,  47 => 12,  43 => 11,  36 => 7,  32 => 6,  28 => 5,  24 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class=\"row\">

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_DeviceType\"|translate }}</h2>
        {{ deviceTypes  | raw}}
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_DeviceBrand\"|translate }}</h2>
        {{ deviceBrands | raw }}
    </div>

    <div class=\"col-md-6\">
        <h2 piwik-enriched-headline>{{ \"DevicesDetection_DeviceModel\"|translate }}</h2>
        {{ deviceModels | raw }}
        {% if resolutions|default is not empty %}
            <h2 piwik-enriched-headline>{{ 'Resolution_Resolutions'|translate }}</h2>
            {{ resolutions|raw }}
        {% endif %}
    </div>

</div>
";
    }
}
