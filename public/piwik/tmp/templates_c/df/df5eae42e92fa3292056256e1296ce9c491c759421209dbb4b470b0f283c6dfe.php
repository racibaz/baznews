<?php

/* @Goals/_addEditGoal.twig */
class __TwigTemplate_01a11277056935ae068e49e7e5f786327ac42c74beee933456ebafa16452c836 extends Twig_Template
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
        echo "
";
        // line 2
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "@Goals/_addEditGoal.twig", 2);
        // line 3
        echo $context["ajax"]->geterrorDiv();
        echo "
";
        // line 4
        echo $context["ajax"]->getloadingDiv("goalAjaxLoading");
        echo "

<div class=\"entityContainer\">
    ";
        // line 7
        if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
            // line 8
            echo "        ";
            $this->loadTemplate("@Goals/_listGoalEdit.twig", "@Goals/_addEditGoal.twig", 8)->display($context);
            // line 9
            echo "    ";
        }
        // line 10
        echo "    ";
        if ((isset($context["userCanEditGoals"]) ? $context["userCanEditGoals"] : $this->getContext($context, "userCanEditGoals"))) {
            // line 11
            echo "        ";
            $this->loadTemplate("@Goals/_formAddGoal.twig", "@Goals/_addEditGoal.twig", 11)->display($context);
            // line 12
            echo "        ";
            if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
                // line 13
                echo "            <div class='entityCancel' style='display:none;'>
                ";
                // line 14
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OrCancel", "<a class='entityCancelLink'>", "</a>"));
                echo "
            </div>

        ";
            }
            // line 18
            echo "    ";
        }
        // line 19
        echo "    <a id='bottom'></a>
</div>

<script type=\"text/javascript\">
    var mappingMatchTypeName = {
        \"url\": \"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_URL")), "html", null, true);
        echo "\",
        \"title\": \"";
        // line 25
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_PageTitle")), "html", null, true);
        echo "\",
        \"file\": \"";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Filename")), "html", null, true);
        echo "\",
        \"external_website\": \"";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ExternalWebsiteUrl")), "html", null, true);
        echo "\",
        \"event\": \"";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
        echo "\"
    };
    var mappingMatchTypeExamples = {
        \"url\": \"";
        // line 31
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'checkout/confirmation'")), "html", null, true);
        echo " \\
        <br />";
        // line 32
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://example.com/thank-you.html'")), "html", null, true);
        echo " \\
        <br />";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)\\/demo\\/(.*)'")), "html", null, true);
        echo "\",
        \"title\": \"";
        // line 34
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'Order confirmation'")), "html", null, true);
        echo "\",
        \"file\": \"";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'files/brochure.pdf'")), "html", null, true);
        echo " \\
        <br />";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://example.com/files/brochure.pdf'")), "html", null, true);
        echo " \\
        <br />";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)\\.zip'")), "html", null, true);
        echo "\",
        \"external_website\": \"";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'amazon.com'")), "html", null, true);
        echo " \\
        <br />";
        // line 39
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'http://mypartner.com/landing.html'")), "html", null, true);
        echo " \\
        <br />";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'http://www.amazon.com\\/(.*)\\/yourAffiliateId'")), "html", null, true);
        echo "\",
        \"event\": \"";
        // line 41
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "'video'")), "html", null, true);
        echo " \\
        <br />";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "'click'")), "html", null, true);
        echo " \\
        <br />";
        // line 43
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ForExampleShort")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "'(.*)_banner'")), "html", null, true);
        echo "\"
    };
    \$(document).ready(function () {
        ";
        // line 46
        if ((isset($context["userCanEditGoals"]) ? $context["userCanEditGoals"] : $this->getContext($context, "userCanEditGoals"))) {
            // line 47
            echo "            bindGoalForm();

            ";
            // line 49
            if ( !array_key_exists("onlyShowAddNewGoal", $context)) {
                // line 50
                echo "                piwik.goals = ";
                echo (isset($context["goalsJSON"]) ? $context["goalsJSON"] : $this->getContext($context, "goalsJSON"));
                echo ";
                bindListGoalEdit();

                ";
                // line 53
                if ((isset($context["idGoal"]) ? $context["idGoal"] : $this->getContext($context, "idGoal"))) {
                    // line 54
                    echo "                    editGoal(";
                    echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, (isset($context["idGoal"]) ? $context["idGoal"] : $this->getContext($context, "idGoal")), "js"), "html", null, true);
                    echo ");
                ";
                } else {
                    // line 56
                    echo "                    showEditGoals();
                ";
                }
                // line 58
                echo "            ";
            } else {
                // line 59
                echo "                initAndShowAddGoalForm();
            ";
            }
            // line 61
            echo "        ";
        } else {
            // line 62
            echo "            piwik.goals = ";
            echo (isset($context["goalsJSON"]) ? $context["goalsJSON"] : $this->getContext($context, "goalsJSON"));
            echo ";
            showEditGoals();
        ";
        }
        // line 65
        echo "    });

</script>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_addEditGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 65,  210 => 62,  207 => 61,  203 => 59,  200 => 58,  196 => 56,  190 => 54,  188 => 53,  181 => 50,  179 => 49,  175 => 47,  173 => 46,  165 => 43,  159 => 42,  153 => 41,  147 => 40,  141 => 39,  135 => 38,  129 => 37,  123 => 36,  117 => 35,  111 => 34,  105 => 33,  99 => 32,  93 => 31,  87 => 28,  83 => 27,  79 => 26,  75 => 25,  71 => 24,  64 => 19,  61 => 18,  54 => 14,  51 => 13,  48 => 12,  45 => 11,  42 => 10,  39 => 9,  36 => 8,  34 => 7,  28 => 4,  24 => 3,  22 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "
{% import 'ajaxMacros.twig' as ajax %}
{{ ajax.errorDiv() }}
{{ ajax.loadingDiv('goalAjaxLoading') }}

<div class=\"entityContainer\">
    {% if onlyShowAddNewGoal is not defined %}
        {% include \"@Goals/_listGoalEdit.twig\" %}
    {% endif %}
    {% if userCanEditGoals %}
        {% include \"@Goals/_formAddGoal.twig\" %}
        {% if onlyShowAddNewGoal is not defined %}
            <div class='entityCancel' style='display:none;'>
                {{ 'General_OrCancel'|translate(\"<a class='entityCancelLink'>\",\"</a>\")|raw }}
            </div>

        {% endif %}
    {% endif %}
    <a id='bottom'></a>
</div>

<script type=\"text/javascript\">
    var mappingMatchTypeName = {
        \"url\": \"{{ 'Goals_URL'|translate }}\",
        \"title\": \"{{ 'Goals_PageTitle'|translate }}\",
        \"file\": \"{{ 'Goals_Filename'|translate }}\",
        \"external_website\": \"{{ 'Goals_ExternalWebsiteUrl'|translate }}\",
        \"event\": \"{{ 'Events_Event'|translate }}\"
    };
    var mappingMatchTypeExamples = {
        \"url\": \"{{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'checkout/confirmation'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://example.com/thank-you.html'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)\\\\\\/demo\\\\\\/(.*)'\") }}\",
        \"title\": \"{{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'Order confirmation'\") }}\",
        \"file\": \"{{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'files/brochure.pdf'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://example.com/files/brochure.pdf'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)\\\\\\.zip'\") }}\",
        \"external_website\": \"{{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'amazon.com'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'http://mypartner.com/landing.html'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'http://www.amazon.com\\\\\\/(.*)\\\\\\/yourAffiliateId'\") }}\",
        \"event\": \"{{ 'General_ForExampleShort'|translate }} {{ 'Goals_Contains'|translate(\"'video'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_IsExactly'|translate(\"'click'\") }} \\
        <br />{{ 'General_ForExampleShort'|translate }} {{ 'Goals_MatchesExpression'|translate(\"'(.*)_banner'\") }}\"
    };
    \$(document).ready(function () {
        {% if userCanEditGoals %}
            bindGoalForm();

            {% if onlyShowAddNewGoal is not defined %}
                piwik.goals = {{ goalsJSON|raw }};
                bindListGoalEdit();

                {% if idGoal %}
                    editGoal({{ idGoal|e('js') }});
                {% else %}
                    showEditGoals();
                {% endif %}
            {% else %}
                initAndShowAddGoalForm();
            {% endif %}
        {% else %}
            piwik.goals = {{ goalsJSON|raw }};
            showEditGoals();
        {% endif %}
    });

</script>
";
    }
}
