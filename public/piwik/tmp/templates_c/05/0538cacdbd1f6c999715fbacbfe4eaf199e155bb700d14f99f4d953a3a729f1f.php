<?php

/* @VisitsSummary/getSparklines.twig */
class __TwigTemplate_94524cc2c910c84213f92b66b5b565b4abd3e8ee5b02acaa5253f53cd63adfbd extends Twig_Template
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
        $this->loadTemplate("@VisitsSummary/_sparklines.twig", "@VisitsSummary/getSparklines.twig", 1)->display($context);
    }

    public function getTemplateName()
    {
        return "@VisitsSummary/getSparklines.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "{% include \"@VisitsSummary/_sparklines.twig\" %}";
    }
}
