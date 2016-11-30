<?php

/* @Live/indexVisitorLog.twig */
class __TwigTemplate_f2f0707106eff3fe3182eae2b8b1d48aa0a1384d5a9c00ad871fb8bb48cf6e37 extends Twig_Template
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
        echo "<h2 piwik-enriched-headline>";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorLog")), "html", null, true);
        echo "</h2>

";
        // line 3
        echo (isset($context["visitorLog"]) ? $context["visitorLog"] : $this->getContext($context, "visitorLog"));
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Live/indexVisitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 3,  19 => 1,);
    }

    public function getSource()
    {
        return "<h2 piwik-enriched-headline>{{ 'Live_VisitorLog'|translate }}</h2>

{{ visitorLog|raw }}
";
    }
}
