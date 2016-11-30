<?php

/* _jsCssIncludes.twig */
class __TwigTemplate_910f3a3b57a0a85c7f0cfea2c9286a49e6a1a2097f5445b9b8ccdb45c6728742 extends Twig_Template
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
        // line 2
        echo "    ";
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "css")));
        echo "
    ";
        // line 3
        echo call_user_func_array($this->env->getFunction('includeAssets')->getCallable(), array(array("type" => "js")));
        echo "
";
    }

    public function getTemplateName()
    {
        return "_jsCssIncludes.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 3,  19 => 2,);
    }

    public function getSource()
    {
        return "{% autoescape false %}
    {{ includeAssets({\"type\": \"css\"}) }}
    {{ includeAssets({\"type\":\"js\"}) }}
{% endautoescape %}
";
    }
}
