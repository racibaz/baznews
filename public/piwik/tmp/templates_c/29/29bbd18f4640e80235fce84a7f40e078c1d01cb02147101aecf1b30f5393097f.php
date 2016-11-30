<?php

/* _sparklineFooter.twig */
class __TwigTemplate_5e7d1faebf2087d64c4a086fe62aefdd7014eeaffc6e576bf5ffb180e515c7fc extends Twig_Template
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
        echo "<script type=\"text/javascript\">
    \$(function () {
        initializeSparklines();
    });
</script>
";
    }

    public function getTemplateName()
    {
        return "_sparklineFooter.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    public function getSource()
    {
        return "<script type=\"text/javascript\">
    \$(function () {
        initializeSparklines();
    });
</script>
";
    }
}
