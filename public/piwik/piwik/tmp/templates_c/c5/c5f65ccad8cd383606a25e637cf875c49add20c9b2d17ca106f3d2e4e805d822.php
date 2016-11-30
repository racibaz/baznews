<?php

/* @Installation/welcome.twig */
class __TwigTemplate_45c89135b2eb5fa8c56246b5dea5fa879dcb60924c137f7ba1983fdd006fb79a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Installation/layout.twig", "@Installation/welcome.twig", 1);
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
    <h2>";
        // line 5
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_Welcome")), "html", null, true);
        echo "</h2>

    ";
        // line 7
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_WelcomeHelp", (isset($context["totalNumberOfSteps"]) ? $context["totalNumberOfSteps"] : $this->getContext($context, "totalNumberOfSteps"))));
        echo "

    <script type=\"text/javascript\">
        <!--
        \$(function () {
            // client-side test for broken tracker (e.g., mod_security rule)
            \$('.next-step').hide();
            \$.ajax({
                url: 'piwik.php',
                data: 'url=http://example.com',
                complete: function () {
                    \$('.next-step').show();
                },
                error: function (req) {
                    \$('.next-step a').attr('href', \$('.next-step a').attr('href') + '&trackerStatus=' + req.status);
                }
            });
        });
        //-->
    </script>

    ";
        // line 28
        if ( !(isset($context["showNextStep"]) ? $context["showNextStep"] : $this->getContext($context, "showNextStep"))) {
            // line 29
            echo "        <p class=\"next-step\">
            <a href=\"";
            // line 30
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["url"]) ? $context["url"] : $this->getContext($context, "url")), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_RefreshPage")), "html", null, true);
            echo " &raquo;</a>
        </p>
    ";
        }
        // line 33
        echo "
";
    }

    public function getTemplateName()
    {
        return "@Installation/welcome.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 33,  68 => 30,  65 => 29,  63 => 28,  39 => 7,  34 => 5,  31 => 4,  28 => 3,  11 => 1,);
    }

    public function getSource()
    {
        return "{% extends '@Installation/layout.twig' %}

{% block content %}

    <h2>{{ 'Installation_Welcome'|translate }}</h2>

    {{ 'Installation_WelcomeHelp'|translate(totalNumberOfSteps)|raw }}

    <script type=\"text/javascript\">
        <!--
        \$(function () {
            // client-side test for broken tracker (e.g., mod_security rule)
            \$('.next-step').hide();
            \$.ajax({
                url: 'piwik.php',
                data: 'url=http://example.com',
                complete: function () {
                    \$('.next-step').show();
                },
                error: function (req) {
                    \$('.next-step a').attr('href', \$('.next-step a').attr('href') + '&trackerStatus=' + req.status);
                }
            });
        });
        //-->
    </script>

    {% if not showNextStep %}
        <p class=\"next-step\">
            <a href=\"{{ url }}\">{{ 'General_RefreshPage'|translate }} &raquo;</a>
        </p>
    {% endif %}

{% endblock %}
";
    }
}
