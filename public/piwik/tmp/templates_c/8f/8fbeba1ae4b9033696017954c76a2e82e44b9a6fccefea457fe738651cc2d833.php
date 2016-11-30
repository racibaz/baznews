<?php

/* @Goals/_formAddGoal.twig */
class __TwigTemplate_554db6b6920a979f992b700b8681b3175377c61a6fd868304ba9e5c6137e3221 extends Twig_Template
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
        echo "<div class='entityAddContainer' style=\"display:none;\">
    <form>
        <table class=\"dataTable entityTable\">
            <thead>
            <tr class=\"first\">
                <th colspan=\"2\">";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AddNewGoal")), "html", null, true);
        echo "</th>
            <tr>
            </thead>
            <tbody>
            <tr>
                <td class=\"first\">";
        // line 11
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalName")), "html", null, true);
        echo " </td>
                <td><input type=\"text\" name=\"name\" value=\"\" size=\"28\" id=\"goal_name\" class=\"inp\"/></td>
            </tr>
            <tr>
                <td style='width:260px;' class=\"first\">";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_GoalIsTriggered")), "html", null, true);
        echo "</td>
                <td>
                    <select name=\"trigger_type\" class=\"inp\">
                        <option value=\"visitors\">";
        // line 18
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhenVisitors")), "html", null, true);
        echo "</option>
                        <option value=\"manually\">";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Manually")), "html", null, true);
        echo "</option>
                    </select>

                    <p id=\"match_attribute_section2\">
                        <input type=\"radio\" id=\"match_attribute_url\" value=\"url\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_url\">";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitUrl")), "html", null, true);
        echo "</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_title\" value=\"title\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_title\">";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_VisitPageTitle")), "html", null, true);
        echo "</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_event\" value=\"event\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_event\">";
        // line 30
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_SendEvent")), "html", null, true);
        echo "</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_file\" value=\"file\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_file\">";
        // line 33
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Download")), "html", null, true);
        echo "</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_external_website\" value=\"external_website\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_external_website\">";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ClickOutlink")), "html", null, true);
        echo "</label>
                    </p>
                </td>
            </tr>
            </tbody>
            <tbody id=\"match_attribute_section\">
            <tr>
                <td class=\"first\">";
        // line 43
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereThe")), "html", null, true);
        echo " <span class=\"whereUrl\" id=\"match_attribute_name\"></span><select name=\"event_type\" class=\"whereEvent inp\">
                        <option value=\"event_category\">";
        // line 44
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventCategory")), "html", null, true);
        echo "</option>
                        <option value=\"event_action\">";
        // line 45
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventAction")), "html", null, true);
        echo "</option>
                        <option value=\"event_name\">";
        // line 46
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_EventName")), "html", null, true);
        echo "</option>
                    </select></td>
                <td>
                    <select name=\"pattern_type\" class=\"inp\">
                        <option value=\"contains\">";
        // line 50
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Contains", "")), "html", null, true);
        echo "</option>
                        <option value=\"exact\">";
        // line 51
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_IsExactly", "")), "html", null, true);
        echo "</option>
                        <option value=\"regex\">";
        // line 52
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_MatchesExpression", "")), "html", null, true);
        echo "</option>
                    </select>

                    ";
        // line 55
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Pattern")), "html", null, true);
        echo "

                    <input type=\"text\" name=\"pattern\" value=\"\" size=\"16\" class=\"inp\"/>
                    <br/>

                    <div id=\"examples_pattern\" class=\"entityInlineHelp\"></div>
                    <br/>
\t\t\t\t<span style=\"float:right;\">
                    ";
        // line 63
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
        echo " <input type=\"checkbox\" id=\"case_sensitive\"/>
                    <label for=\"case_sensitive\">";
        // line 64
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_CaseSensitive")), "html", null, true);
        echo "</label>
\t\t\t\t</span>
                </td>
            </tr>
            </tbody>
            <tbody id=\"manual_trigger_section\" style=\"display:none;\">
            <tr>
                <td colspan=\"2\" class=\"first\">
                    ";
        // line 72
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_WhereVisitedPageManuallyCallsJavascriptTrackerLearnMore", "<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/javascript-tracking/%23toc-manually-trigger-a-conversion-for-a-goal'>", "</a>"));
        echo "
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\"> ";
        // line 78
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AllowMultipleConversionsPerVisit")), "html", null, true);
        echo " </td>
                <td>
                    <input type=\"radio\" id=\"allow_multiple_0\" value=\"0\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_0\">";
        // line 81
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultGoalConvertedOncePerVisit")), "html", null, true);
        echo "</label>

                    <div class=\"entityInlineHelp\">
                        ";
        // line 84
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_HelpOneConversionPerVisit")), "html", null, true);
        echo "
                    </div>
                    <br/>

                    <input type=\"radio\" id=\"allow_multiple_1\" value=\"1\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_1\">";
        // line 89
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AllowGoalConvertedMoreThanOncePerVisit")), "html", null, true);
        echo "</label>
                    <br/><br/>
            </tr>
            <tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\">";
        // line 96
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_Optional")), "html", null, true);
        echo " ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenue")), "html", null, true);
        echo "</td>
                <td>";
        // line 97
        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array(" <input type=\"text\" name=\"revenue\" size=\"2\" value=\"0\" class=\"inp\" /> ", (isset($context["idSite"]) ? $context["idSite"] : $this->getContext($context, "idSite"))));
        echo "
                    <div class=\"entityInlineHelp\"> ";
        // line 98
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_DefaultRevenueHelp")), "html", null, true);
        echo " </div>
                </td>
            </tr>
            <tr>
            </tbody>

            ";
        // line 104
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.endGoalEditTable"));
        echo "

        </table>
        <input type=\"hidden\" name=\"methodGoalAPI\" value=\"\"/>
        <input type=\"hidden\" name=\"goalIdUpdate\" value=\"\"/>
        <input type=\"submit\" value=\"\" name=\"submit\" id=\"goal_submit\" class=\"submit\"/>
    </form>

</div>
";
    }

    public function getTemplateName()
    {
        return "@Goals/_formAddGoal.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  210 => 104,  201 => 98,  197 => 97,  191 => 96,  181 => 89,  173 => 84,  167 => 81,  161 => 78,  152 => 72,  141 => 64,  137 => 63,  126 => 55,  120 => 52,  116 => 51,  112 => 50,  105 => 46,  101 => 45,  97 => 44,  93 => 43,  83 => 36,  77 => 33,  71 => 30,  65 => 27,  59 => 24,  51 => 19,  47 => 18,  41 => 15,  34 => 11,  26 => 6,  19 => 1,);
    }

    public function getSource()
    {
        return "<div class='entityAddContainer' style=\"display:none;\">
    <form>
        <table class=\"dataTable entityTable\">
            <thead>
            <tr class=\"first\">
                <th colspan=\"2\">{{ 'Goals_AddNewGoal'|translate }}</th>
            <tr>
            </thead>
            <tbody>
            <tr>
                <td class=\"first\">{{ 'Goals_GoalName'|translate }} </td>
                <td><input type=\"text\" name=\"name\" value=\"\" size=\"28\" id=\"goal_name\" class=\"inp\"/></td>
            </tr>
            <tr>
                <td style='width:260px;' class=\"first\">{{ 'Goals_GoalIsTriggered'|translate }}</td>
                <td>
                    <select name=\"trigger_type\" class=\"inp\">
                        <option value=\"visitors\">{{ 'Goals_WhenVisitors'|translate }}</option>
                        <option value=\"manually\">{{ 'Goals_Manually'|translate }}</option>
                    </select>

                    <p id=\"match_attribute_section2\">
                        <input type=\"radio\" id=\"match_attribute_url\" value=\"url\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_url\">{{ 'Goals_VisitUrl'|translate }}</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_title\" value=\"title\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_title\">{{ 'Goals_VisitPageTitle'|translate }}</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_event\" value=\"event\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_event\">{{ 'Goals_SendEvent'|translate }}</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_file\" value=\"file\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_file\">{{ 'Goals_Download'|translate }}</label>
                        <br/>
                        <input type=\"radio\" id=\"match_attribute_external_website\" value=\"external_website\" name=\"match_attribute\"/>
                        <label for=\"match_attribute_external_website\">{{ 'Goals_ClickOutlink'|translate }}</label>
                    </p>
                </td>
            </tr>
            </tbody>
            <tbody id=\"match_attribute_section\">
            <tr>
                <td class=\"first\">{{ 'Goals_WhereThe'|translate }} <span class=\"whereUrl\" id=\"match_attribute_name\"></span><select name=\"event_type\" class=\"whereEvent inp\">
                        <option value=\"event_category\">{{ 'Events_EventCategory'|translate }}</option>
                        <option value=\"event_action\">{{ 'Events_EventAction'|translate }}</option>
                        <option value=\"event_name\">{{ 'Events_EventName'|translate }}</option>
                    </select></td>
                <td>
                    <select name=\"pattern_type\" class=\"inp\">
                        <option value=\"contains\">{{ 'Goals_Contains'|translate(\"\") }}</option>
                        <option value=\"exact\">{{ 'Goals_IsExactly'|translate(\"\") }}</option>
                        <option value=\"regex\">{{ 'Goals_MatchesExpression'|translate(\"\") }}</option>
                    </select>

                    {{ 'Goals_Pattern'|translate }}

                    <input type=\"text\" name=\"pattern\" value=\"\" size=\"16\" class=\"inp\"/>
                    <br/>

                    <div id=\"examples_pattern\" class=\"entityInlineHelp\"></div>
                    <br/>
\t\t\t\t<span style=\"float:right;\">
                    {{ 'Goals_Optional'|translate }} <input type=\"checkbox\" id=\"case_sensitive\"/>
                    <label for=\"case_sensitive\">{{ 'Goals_CaseSensitive'|translate }}</label>
\t\t\t\t</span>
                </td>
            </tr>
            </tbody>
            <tbody id=\"manual_trigger_section\" style=\"display:none;\">
            <tr>
                <td colspan=\"2\" class=\"first\">
                    {{ 'Goals_WhereVisitedPageManuallyCallsJavascriptTrackerLearnMore'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=http://piwik.org/docs/javascript-tracking/%23toc-manually-trigger-a-conversion-for-a-goal'>\",\"</a>\")|raw }}
                </td>
            </tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\"> {{ 'Goals_AllowMultipleConversionsPerVisit'|translate }} </td>
                <td>
                    <input type=\"radio\" id=\"allow_multiple_0\" value=\"0\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_0\">{{ 'Goals_DefaultGoalConvertedOncePerVisit'|translate }}</label>

                    <div class=\"entityInlineHelp\">
                        {{ 'Goals_HelpOneConversionPerVisit'|translate }}
                    </div>
                    <br/>

                    <input type=\"radio\" id=\"allow_multiple_1\" value=\"1\" name=\"allow_multiple\"/>
                    <label for=\"allow_multiple_1\">{{ 'Goals_AllowGoalConvertedMoreThanOncePerVisit'|translate }}</label>
                    <br/><br/>
            </tr>
            <tr>
            </tbody>
            <tbody>
            <tr>
                <td class=\"first\">{{ 'Goals_Optional'|translate }} {{ 'Goals_DefaultRevenue'|translate }}</td>
                <td>{{ ' <input type=\"text\" name=\"revenue\" size=\"2\" value=\"0\" class=\"inp\" /> '|money(idSite)|raw }}
                    <div class=\"entityInlineHelp\"> {{ 'Goals_DefaultRevenueHelp'|translate }} </div>
                </td>
            </tr>
            <tr>
            </tbody>

            {{ postEvent(\"Template.endGoalEditTable\") }}

        </table>
        <input type=\"hidden\" name=\"methodGoalAPI\" value=\"\"/>
        <input type=\"hidden\" name=\"goalIdUpdate\" value=\"\"/>
        <input type=\"submit\" value=\"\" name=\"submit\" id=\"goal_submit\" class=\"submit\"/>
    </form>

</div>
";
    }
}
