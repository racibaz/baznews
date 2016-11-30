<?php

/* @Goals/addNewGoal.twig */
class __TwigTemplate_fc20bec8c6bac166cbed63b51a99292085c779555baf2e370da009852e7465fc extends Twig_Template
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
        if ((isset($context["userCanEditGoals"]) ? $context["userCanEditGoals"] : $this->getContext($context, "userCanEditGoals"))) {
            // line 2
            echo "    <h2 piwik-enriched-headline>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html", null, true);
            echo "</h2>
    <p>";
            // line 3
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_NewGoalIntro")), "html", null, true);
            echo "</p>
    <p>";
            // line 4
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LearnMoreAboutGoalTrackingDocumentation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>", "</a>"));
            echo "
       ";
            // line 5
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ManageGoalsOrCreateANewGoal", "<a href='#module=Goals&action=editGoals'>", "</a>"));
            echo "
    </p>

    ";
            // line 8
            $this->loadTemplate("@Goals/_addEditGoal.twig", "@Goals/addNewGoal.twig", 8)->display($context);
            // line 9
            echo "
    <br/><br/>

";
        } else {
            // line 13
            echo "    <h2>";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html", null, true);
            echo "</h2>
    <p>
        ";
            // line 15
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_NoGoalsNeedAccess"));
            echo "
    </p>
    <p>
        ";
            // line 18
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LearnMoreAboutGoalTrackingDocumentation", "<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>", "</a>"));
            echo "
    </p>

";
        }
    }

    public function getTemplateName()
    {
        return "@Goals/addNewGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  60 => 18,  54 => 15,  48 => 13,  42 => 9,  40 => 8,  34 => 5,  30 => 4,  26 => 3,  21 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "{% if userCanEditGoals %}
    <h2 piwik-enriched-headline>{{ 'Goals_AddNewGoal'|translate }}</h2>
    <p>{{ 'Goals_NewGoalIntro'|translate }}</p>
    <p>{{ 'Goals_LearnMoreAboutGoalTrackingDocumentation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>\",\"</a>\")|raw }}
       {{ 'Goals_ManageGoalsOrCreateANewGoal'|translate(\"<a href='#module=Goals&action=editGoals'>\",\"</a>\")|raw }}
    </p>

    {% include \"@Goals/_addEditGoal.twig\" %}

    <br/><br/>

{% else %}
    <h2>{{ 'Goals_AddNewGoal'|translate }}</h2>
    <p>
        {{ 'Goals_NoGoalsNeedAccess'|translate|raw }}
    </p>
    <p>
        {{ 'Goals_LearnMoreAboutGoalTrackingDocumentation'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/docs/tracking-goals-web-analytics/' target='_blank'>\",\"</a>\")|raw }}
    </p>

{% endif %}
";
    }
}
