<?php

/* @Live/_dataTableViz_visitorLog.twig */
class __TwigTemplate_094fcb1362b198cdb213cf3a0591ec410a16f640c9c6109e41262ec5e44de407 extends Twig_Template
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
        $context["displayVisitorsInOwnColumn"] = (((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) ? (false) : (true));
        // line 2
        echo "
";
        // line 3
        $context["cycleIndex"] = 0;
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["dataTable"]) ? $context["dataTable"] : $this->getContext($context, "dataTable")), "getRows", array(), "method"));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["visitor"]) {
            // line 5
            echo "    ";
            $context["visitHasEcommerceActivity"] = $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method");
            // line 6
            echo "    ";
            $context["breakBeforeVisitorRank"] = ((((isset($context["visitHasEcommerceActivity"]) ? $context["visitHasEcommerceActivity"] : $this->getContext($context, "visitHasEcommerceActivity")) && $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method"))) ? (true) : (false));
            // line 7
            echo "    ";
            ob_start();
            // line 8
            echo "
    <span class=\"visitorLogIcons\">

        <span class=\"visitorDetails\">
        ";
            // line 12
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method")) {
                // line 13
                echo "            <span class=\"visitorLogIconWithDetails\">
                <img src=\"";
                // line 14
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserIcon"), "method"), "html", null, true);
                echo "\"/>
                <ul class=\"details\">
                    <li>";
                // line 16
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnBrowser")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "browser"), "method"), "html", null, true);
                echo "</li>
                    <li>";
                // line 17
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_BrowserEngine")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "browserFamily"), "method"), "html", null, true);
                echo "</li>
                    ";
                // line 18
                if ((twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "pluginsIcons"), "method")) > 0)) {
                    // line 19
                    echo "                        <li>
                            ";
                    // line 20
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Plugins")), "html", null, true);
                    echo ":
                            ";
                    // line 21
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["visitor"], "getColumn", array(0 => "pluginsIcons"), "method"));
                    foreach ($context['_seq'] as $context["_key"] => $context["pluginIcon"]) {
                        // line 22
                        echo "                                <img src=\"";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginIcon", array()), "html", null, true);
                        echo "\" alt=\"";
                        echo \Piwik\piwik_escape_filter($this->env, twig_capitalize_string_filter($this->env, $this->getAttribute($context["pluginIcon"], "pluginName", array()), true), "html", null, true);
                        echo "\"/>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pluginIcon'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 24
                    echo "                        </li>
                    ";
                }
                // line 26
                echo "                </ul>
            </span>
        ";
            }
            // line 29
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystemIcon"), "method")) {
                // line 30
                echo "            <span class=\"visitorLogIconWithDetails\">
                <img src=\"";
                // line 31
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystemIcon"), "method"), "html", null, true);
                echo "\"/>
                <ul class=\"details\">
                    <li>";
                // line 33
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_ColumnOperatingSystem")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "operatingSystem"), "method"), "html", null, true);
                echo "</li>
                </ul>
            </span>
        ";
            }
            // line 37
            echo "        ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceTypeIcon"), "method")) {
                // line 38
                echo "            <span class=\"visitorLogIconWithDetails\">
                <img src=\"";
                // line 39
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceTypeIcon"), "method"), "html", null, true);
                echo "\"/>
                <ul class=\"details\">
                    <li>";
                // line 41
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceType")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceType"), "method"), "html", null, true);
                echo "</li>
                    ";
                // line 42
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceBrand"), "method")) {
                    echo "<li>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceBrand")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceBrand"), "method"), "html", null, true);
                    echo "</li>";
                }
                // line 43
                echo "                    ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceModel"), "method")) {
                    echo "<li>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("DevicesDetection_DeviceModel")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "deviceModel"), "method"), "html", null, true);
                    echo "</li>";
                }
                // line 44
                echo "                    ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "resolution"), "method")) {
                    echo "<li>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Resolution_ColumnResolution")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "resolution"), "method"), "html", null, true);
                    echo "</li>";
                }
                // line 45
                echo "                </ul>
            </span>
        ";
            }
            // line 48
            echo "        </span>

        <span class=\"visitorType\">
            ";
            // line 52
            echo "            ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConverted"), "method")) {
                // line 53
                echo "                <span title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitConvertedNGoals", $this->getAttribute($context["visitor"], "getColumn", array(0 => "goalConversions"), "method"))), "html", null, true);
                echo "\" class='visitorRank visitorLogTooltip'
                      ";
                // line 54
                if (( !(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn")) || (isset($context["breakBeforeVisitorRank"]) ? $context["breakBeforeVisitorRank"] : $this->getContext($context, "breakBeforeVisitorRank")))) {
                    echo "style=\"margin-left:0;\"";
                }
                echo ">
                    <img src=\"";
                // line 55
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConvertedIcon"), "method"), "html", null, true);
                echo "\"/>
                    <span class='hash'>#</span>
                    ";
                // line 57
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "goalConversions"), "method"), "html", null, true);
                echo "
                    ";
                // line 58
                if ((isset($context["visitHasEcommerceActivity"]) ? $context["visitHasEcommerceActivity"] : $this->getContext($context, "visitHasEcommerceActivity"))) {
                    // line 59
                    echo "                        &nbsp;
                        <img src=\"";
                    // line 60
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                    echo "\" class='visitorLogTooltip' title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                    echo "\"/>
                    ";
                }
                // line 62
                echo "                </span>
            ";
                // line 64
                echo "            ";
            } elseif ((isset($context["visitHasEcommerceActivity"]) ? $context["visitHasEcommerceActivity"] : $this->getContext($context, "visitHasEcommerceActivity"))) {
                // line 65
                echo "                <img class=\"visitorLogTooltip\" src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatusIcon"), "method"), "html", null, true);
                echo "\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitEcommerceStatus"), "method"), "html", null, true);
                echo "\"/>
            ";
            }
            // line 67
            echo "        </span>
    </span>

    ";
            $context["visitorColumnContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 71
            echo "
    ";
            // line 72
            ob_start();
            // line 73
            echo "    <div class=\"visitorReferrer\">
        ";
            // line 74
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "website")) {
                // line 75
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnWebsite")), "html", null, true);
                echo ":
            <a href=\"";
                // line 76
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\" rel=\"noreferrer\" target=\"_blank\" class=\"visitorLogTooltip\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                echo "\"
               style=\"text-decoration:underline;\">
                ";
                // line 78
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            </a>
        ";
            }
            // line 81
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "campaign")) {
                // line 82
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_ColumnCampaign")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "
            ";
                // line 83
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"))) {
                    echo " - ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                }
                // line 84
                echo "        ";
            }
            // line 85
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "search")) {
                // line 86
                $context["keywordNotDefined"] = call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NotDefined", call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnKeyword"))));
                // line 87
                $context["showKeyword"] = ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method")) && ($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method") != (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined"))));
                // line 88
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "searchEngineIcon"), "method")) {
                    // line 89
                    echo "                <img src=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "searchEngineIcon"), "method"), "html", null, true);
                    echo "\" alt=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                    echo "\"/>
            ";
                }
                // line 91
                echo "            <span ";
                if ( !(isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword"))) {
                    echo "title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, (isset($context["keywordNotDefined"]) ? $context["keywordNotDefined"] : $this->getContext($context, "keywordNotDefined")), "html", null, true);
                    echo "\" class=\"visitorLogTooltip\"";
                }
                echo ">";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                echo "</span>
            ";
                // line 92
                if ((isset($context["showKeyword"]) ? $context["showKeyword"] : $this->getContext($context, "showKeyword"))) {
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_Keywords")), "html", null, true);
                    echo ":
                <a href=\"";
                    // line 93
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerUrl"), "method"), "html", null, true);
                    echo "\" rel=\"noreferrer\" target=\"_blank\" style=\"text-decoration:underline;\">
                    \"";
                    // line 94
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                    echo "\"</a>
            ";
                }
                // line 96
                echo "            ";
                ob_start();
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeyword"), "method"), "html", null, true);
                $context["keyword"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 97
                echo "            ";
                ob_start();
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerName"), "method"), "html", null, true);
                $context["searchName"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 98
                echo "            ";
                ob_start();
                echo "#";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                $context["position"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                // line 99
                echo "            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method")) {
                    // line 100
                    echo "                <span title='";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_KeywordRankedOnSearchResultForThisVisitor", (isset($context["keyword"]) ? $context["keyword"] : $this->getContext($context, "keyword")), (isset($context["position"]) ? $context["position"] : $this->getContext($context, "position")), (isset($context["searchName"]) ? $context["searchName"] : $this->getContext($context, "searchName")))), "html", null, true);
                    echo "' class='visitorRank visitorLogTooltip'>
                                <span class='hash'>#</span>
                    ";
                    // line 102
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerKeywordPosition"), "method"), "html", null, true);
                    echo "
                            </span>
            ";
                }
                // line 105
                echo "        ";
            }
            // line 106
            echo "        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "referrerType"), "method") == "direct")) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Referrers_DirectEntry")), "html", null, true);
            }
            // line 107
            echo "    </div>
    ";
            $context["referrerContent"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 109
            echo "
    ";
            // line 110
            ob_start();
            // line 111
            echo "        <div class=\"card row\">

            ";
            // line 113
            if (( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method")) &&  !$this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "hideProfileLink", array()))) {
                // line 114
                echo "                <a class=\"visitor-log-visitor-profile-link visitorLogTooltip\" title=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                echo "\" data-visitor-id=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                echo "\">
                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>";
                // line 115
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_ViewVisitorProfile")), "html", null, true);
                // line 116
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method"))) {
                    echo ": ";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                echo "</span>
                </a>
            ";
            }
            // line 119
            echo "
        ";
            // line 120
            $context["cycleIndex"] = ((isset($context["cycleIndex"]) ? $context["cycleIndex"] : $this->getContext($context, "cycleIndex")) + 1);
            // line 121
            echo "            <div class=\"col-md-";
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                echo "3";
            } else {
                echo "4";
            }
            echo "\">
                <strong class=\"visitorLogTooltip\" title=\"";
            // line 122
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorType"), "method") == "new")) {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewVisitor")), "html", null, true);
            } else {
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_VisitorsLastVisit", $this->getAttribute($context["visitor"], "getColumn", array(0 => "daysSinceLastVisit"), "method"))), "html", null, true);
            }
            echo "\">
                    ";
            // line 123
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "serverDatePrettyFirstAction"), "method"), "html", null, true);
            echo "
                    ";
            // line 124
            if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                echo "<br/>";
            } else {
                echo "-";
            }
            echo " ";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "serverTimePrettyFirstAction"), "method"), "html", null, true);
            echo "</strong>
                ";
            // line 125
            if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitIp"), "method"))) {
                // line 126
                echo "                    <br/>
                <span class=\"visitorLogTooltip\" title=\"";
                // line 127
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method"))) {
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_UserId")), "html", null, true);
                    echo ": ";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                // line 128
                echo "
";
                // line 129
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"))) {
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_VisitorID")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorId"), "method"), "html", null, true);
                }
                // line 130
                if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "latitude"), "method") || $this->getAttribute($context["visitor"], "getColumn", array(0 => "longitude"), "method"))) {
                    // line 131
                    echo "
";
                    // line 132
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "location"), "method"), "html", null, true);
                    echo "

GPS (lat/long): ";
                    // line 134
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "latitude"), "method"), "html", null, true);
                    echo ",";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "longitude"), "method"), "html", null, true);
                }
                echo "\">
                    IP: ";
                // line 135
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitIp"), "method"), "html", null, true);
                echo "
                    ";
                // line 136
                if ( !twig_test_empty($this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method"))) {
                    echo "<br/><br/>";
                    echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "userId"), "method");
                }
                // line 137
                echo "
                    </span>";
            }
            // line 139
            echo "
                ";
            // line 140
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "provider"), "method")) {
                // line 141
                echo "                    <br/>
                    ";
                // line 142
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Provider_ColumnProvider")), "html", null, true);
                echo ":
                    ";
                // line 143
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method")) {
                    // line 144
                    echo "                        <a href=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                    echo "\" rel=\"noreferrer\" target=\"_blank\" class=\"visitorLogTooltip\" title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerName"), "method"), "html", null, true);
                    echo " ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method"), "html", null, true);
                    echo "\" style=\"text-decoration:underline;\">
                    ";
                }
                // line 146
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "providerName"), "method"), "html", null, true);
                // line 147
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "providerUrl"), "method")) {
                    echo "</a>";
                }
                // line 148
                echo "                ";
            }
            // line 149
            echo "                ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method") || $this->getAttribute($context["visitor"], "getColumn", array(0 => "countryFlag"), "method"))) {
                // line 150
                echo "                    <br/>
                ";
            }
            // line 152
            echo "                ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method")) {
                // line 153
                echo "                    <span class=\"visitorLogIconWithDetails\">
                        <img src=\"";
                // line 154
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitorTypeIcon"), "method"), "html", null, true);
                echo "\"/>
                        <ul class=\"details\">
                            <li>";
                // line 156
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ReturningVisitor")), "html", null, true);
                echo " - ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitCount"), "method"))), "html", null, true);
                echo "</li>
                        </ul>
                    </span>
                ";
            }
            // line 160
            echo "                ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "countryFlag"), "method")) {
                // line 161
                echo "                    <span class=\"visitorLogIconWithDetails\">
                        <img src=\"";
                // line 162
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "countryFlag"), "method"), "html", null, true);
                echo "\"/>
                        <ul class=\"details\">
                            <li>";
                // line 164
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Country")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "country"), "method"), "html", null, true);
                echo "</li>
                            ";
                // line 165
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "region"), "method")) {
                    echo "<li>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_Region")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "region"), "method"), "html", null, true);
                    echo "</li>";
                }
                // line 166
                echo "                            ";
                if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "city"), "method")) {
                    echo "<li>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountry_City")), "html", null, true);
                    echo ": ";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "city"), "method"), "html", null, true);
                    echo "</li>";
                }
                // line 167
                echo "                        </ul>
                    </span>
                ";
            }
            // line 170
            echo "                ";
            if ($this->getAttribute($context["visitor"], "getColumn", array(0 => "customVariables"), "method")) {
                // line 171
                echo "                    <br/>
                    ";
                // line 172
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["visitor"], "getColumn", array(0 => "customVariables"), "method"));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 173
                    echo "                        ";
                    $context["name"] = ("customVariableName" . $context["id"]);
                    // line 174
                    echo "                        ";
                    $context["value"] = ("customVariableValue" . $context["id"]);
                    // line 175
                    echo "                        <br/>
                        <acronym class=\"visitorLogTooltip\" title=\"";
                    // line 176
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                    echo " (index ";
                    echo \Piwik\piwik_escape_filter($this->env, $context["id"], "html", null, true);
                    echo ")\">
                            ";
                    // line 177
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute($context["customVariable"], (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array"), 30)), "html", null, true);
                    echo "
                        </acronym>
                    ";
                    // line 179
                    if ((twig_length_filter($this->env, $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo ": ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('truncate')->getCallable(), array($this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array"), 50)), "html", null, true);
                    }
                    // line 180
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 181
                echo "                ";
            }
            // line 182
            echo "                ";
            if ( !(isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 183
                echo "                    <br/>
                    ";
                // line 184
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                ";
            }
            // line 186
            echo "                    ";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["referrerContent"]) ? $context["referrerContent"] : $this->getContext($context, "referrerContent")), "html", null, true);
            echo "
            </div>

            ";
            // line 189
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                // line 190
                echo "                <div class=\"col-md-2 own-visitor-column\">
                    ";
                // line 191
                echo \Piwik\piwik_escape_filter($this->env, (isset($context["visitorColumnContent"]) ? $context["visitorColumnContent"] : $this->getContext($context, "visitorColumnContent")), "html", null, true);
                echo "
                </div>
            ";
            }
            // line 194
            echo "
            <div class=\"col-md-";
            // line 195
            if ((isset($context["displayVisitorsInOwnColumn"]) ? $context["displayVisitorsInOwnColumn"] : $this->getContext($context, "displayVisitorsInOwnColumn"))) {
                echo "7";
            } else {
                echo "8";
            }
            echo " column ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitConverted"), "method") &&  !(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget")))) {
                echo "highlightField";
            }
            echo "\">
                ";
            // line 196
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.visitorLogViewBeforeActionsInfo", $context["visitor"]));
            echo "
                <div class=\"visitor-log-page-list\">
                    <strong>
                        ";
            // line 199
            echo \Piwik\piwik_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method")), "html", null, true);
            echo "
                        ";
            // line 200
            if ((twig_length_filter($this->env, $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method")) <= 1)) {
                // line 201
                echo "                            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Action")), "html", null, true);
                echo "
                        ";
            } else {
                // line 203
                echo "                            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Actions")), "html", null, true);
                echo "
                        ";
            }
            // line 205
            echo "                        ";
            if (($this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDuration"), "method") > 0)) {
                echo "- ";
                echo $this->getAttribute($context["visitor"], "getColumn", array(0 => "visitDurationPretty"), "method");
            }
            // line 206
            echo "                    </strong>
                    <br/>
                    <ol class='visitorLog'>
                        ";
            // line 209
            $this->loadTemplate("@Live/_actionsList.twig", "@Live/_dataTableViz_visitorLog.twig", 209)->display(array_merge($context, array("actionDetails" => $this->getAttribute($context["visitor"], "getColumn", array(0 => "actionDetails"), "method"))));
            // line 210
            echo "                    </ol>
                </div>
                ";
            // line 212
            echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Live.visitorLogViewAfterActionsInfo", $context["visitor"]));
            echo "
            </div>
        </div>
    ";
            $context["visitorRow"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 216
            echo "
    ";
            // line 217
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["visitorRow"]) ? $context["visitorRow"] : $this->getContext($context, "visitorRow")), "html", null, true);
            echo "
";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['visitor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_dataTableViz_visitorLog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  725 => 217,  722 => 216,  715 => 212,  711 => 210,  709 => 209,  704 => 206,  698 => 205,  692 => 203,  686 => 201,  684 => 200,  680 => 199,  674 => 196,  662 => 195,  659 => 194,  653 => 191,  650 => 190,  648 => 189,  641 => 186,  636 => 184,  633 => 183,  630 => 182,  627 => 181,  621 => 180,  616 => 179,  611 => 177,  605 => 176,  602 => 175,  599 => 174,  596 => 173,  592 => 172,  589 => 171,  586 => 170,  581 => 167,  572 => 166,  564 => 165,  558 => 164,  553 => 162,  550 => 161,  547 => 160,  538 => 156,  533 => 154,  530 => 153,  527 => 152,  523 => 150,  520 => 149,  517 => 148,  513 => 147,  511 => 146,  501 => 144,  499 => 143,  495 => 142,  492 => 141,  490 => 140,  487 => 139,  483 => 137,  478 => 136,  474 => 135,  467 => 134,  462 => 132,  459 => 131,  457 => 130,  451 => 129,  448 => 128,  442 => 127,  439 => 126,  437 => 125,  427 => 124,  423 => 123,  415 => 122,  406 => 121,  404 => 120,  401 => 119,  392 => 116,  390 => 115,  383 => 114,  381 => 113,  377 => 111,  375 => 110,  372 => 109,  368 => 107,  363 => 106,  360 => 105,  354 => 102,  348 => 100,  345 => 99,  339 => 98,  334 => 97,  329 => 96,  324 => 94,  320 => 93,  315 => 92,  304 => 91,  296 => 89,  294 => 88,  292 => 87,  290 => 86,  287 => 85,  284 => 84,  279 => 83,  272 => 82,  269 => 81,  263 => 78,  256 => 76,  251 => 75,  249 => 74,  246 => 73,  244 => 72,  241 => 71,  235 => 67,  227 => 65,  224 => 64,  221 => 62,  214 => 60,  211 => 59,  209 => 58,  205 => 57,  200 => 55,  194 => 54,  189 => 53,  186 => 52,  181 => 48,  176 => 45,  167 => 44,  158 => 43,  150 => 42,  144 => 41,  139 => 39,  136 => 38,  133 => 37,  124 => 33,  119 => 31,  116 => 30,  113 => 29,  108 => 26,  104 => 24,  93 => 22,  89 => 21,  85 => 20,  82 => 19,  80 => 18,  74 => 17,  68 => 16,  63 => 14,  60 => 13,  58 => 12,  52 => 8,  49 => 7,  46 => 6,  43 => 5,  26 => 4,  24 => 3,  21 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "{% set displayVisitorsInOwnColumn = (isWidget ? false : true) %}

{% set cycleIndex=0 %}
{% for visitor in dataTable.getRows() %}
    {% set visitHasEcommerceActivity = visitor.getColumn('visitEcommerceStatusIcon') %}
    {% set breakBeforeVisitorRank = (visitHasEcommerceActivity and visitor.getColumn('visitorTypeIcon')) ? true : false %}
    {% set visitorColumnContent %}

    <span class=\"visitorLogIcons\">

        <span class=\"visitorDetails\">
        {% if visitor.getColumn('browserIcon') %}
            <span class=\"visitorLogIconWithDetails\">
                <img src=\"{{ visitor.getColumn('browserIcon') }}\"/>
                <ul class=\"details\">
                    <li>{{ 'DevicesDetection_ColumnBrowser'|translate }}: {{ visitor.getColumn('browser') }}</li>
                    <li>{{ 'DevicesDetection_BrowserEngine'|translate }}: {{ visitor.getColumn('browserFamily') }}</li>
                    {% if visitor.getColumn('pluginsIcons')|length > 0 %}
                        <li>
                            {{ 'General_Plugins'|translate }}:
                            {% for pluginIcon in visitor.getColumn('pluginsIcons') %}
                                <img src=\"{{ pluginIcon.pluginIcon }}\" alt=\"{{ pluginIcon.pluginName|capitalize(true) }}\"/>
                            {% endfor %}
                        </li>
                    {% endif %}
                </ul>
            </span>
        {% endif %}
        {% if visitor.getColumn('operatingSystemIcon') %}
            <span class=\"visitorLogIconWithDetails\">
                <img src=\"{{ visitor.getColumn('operatingSystemIcon') }}\"/>
                <ul class=\"details\">
                    <li>{{ 'DevicesDetection_ColumnOperatingSystem'|translate }}: {{ visitor.getColumn('operatingSystem') }}</li>
                </ul>
            </span>
        {% endif %}
        {% if visitor.getColumn('deviceTypeIcon') %}
            <span class=\"visitorLogIconWithDetails\">
                <img src=\"{{ visitor.getColumn('deviceTypeIcon') }}\"/>
                <ul class=\"details\">
                    <li>{{ 'DevicesDetection_DeviceType'|translate }}: {{ visitor.getColumn('deviceType') }}</li>
                    {% if visitor.getColumn('deviceBrand') %}<li>{{ 'DevicesDetection_DeviceBrand'|translate }}: {{ visitor.getColumn('deviceBrand') }}</li>{% endif %}
                    {% if visitor.getColumn('deviceModel') %}<li>{{ 'DevicesDetection_DeviceModel'|translate }}: {{ visitor.getColumn('deviceModel') }}</li>{% endif %}
                    {% if visitor.getColumn('resolution') %}<li>{{ 'Resolution_ColumnResolution'|translate }}: {{ visitor.getColumn('resolution') }}</li>{% endif %}
                </ul>
            </span>
        {% endif %}
        </span>

        <span class=\"visitorType\">
            {# Goals, and/or Ecommerce activity #}
            {% if visitor.getColumn('visitConverted') %}
                <span title=\"{{ 'General_VisitConvertedNGoals'|translate(visitor.getColumn('goalConversions')) }}\" class='visitorRank visitorLogTooltip'
                      {% if not displayVisitorsInOwnColumn or breakBeforeVisitorRank %}style=\"margin-left:0;\"{% endif %}>
                    <img src=\"{{ visitor.getColumn('visitConvertedIcon') }}\"/>
                    <span class='hash'>#</span>
                    {{ visitor.getColumn('goalConversions') }}
                    {% if visitHasEcommerceActivity %}
                        &nbsp;
                        <img src=\"{{ visitor.getColumn('visitEcommerceStatusIcon') }}\" class='visitorLogTooltip' title=\"{{ visitor.getColumn('visitEcommerceStatus') }}\"/>
                    {% endif %}
                </span>
            {# Ecommerce activity only (no goal) #}
            {% elseif visitHasEcommerceActivity %}
                <img class=\"visitorLogTooltip\" src=\"{{ visitor.getColumn('visitEcommerceStatusIcon') }}\" title=\"{{ visitor.getColumn('visitEcommerceStatus') }}\"/>
            {% endif %}
        </span>
    </span>

    {% endset %}

    {% set referrerContent %}
    <div class=\"visitorReferrer\">
        {% if visitor.getColumn('referrerType') == 'website' %}
            {{ 'Referrers_ColumnWebsite'|translate }}:
            <a href=\"{{ visitor.getColumn('referrerUrl') }}\" rel=\"noreferrer\" target=\"_blank\" class=\"visitorLogTooltip\" title=\"{{ visitor.getColumn('referrerUrl') }}\"
               style=\"text-decoration:underline;\">
                {{ visitor.getColumn('referrerName') }}
            </a>
        {% endif %}
        {% if visitor.getColumn('referrerType') == 'campaign' %}
            {{ 'Referrers_ColumnCampaign'|translate }}: {{ visitor.getColumn('referrerName') }}
            {% if visitor.getColumn('referrerKeyword') is not empty %} - {{ visitor.getColumn('referrerKeyword') }}{% endif %}
        {% endif %}
        {% if visitor.getColumn('referrerType') == 'search' %}
            {%- set keywordNotDefined = 'General_NotDefined'|translate('General_ColumnKeyword'|translate) -%}
            {%- set showKeyword = visitor.getColumn('referrerKeyword') is not empty and visitor.getColumn('referrerKeyword') != keywordNotDefined -%}
            {% if visitor.getColumn('searchEngineIcon') %}
                <img src=\"{{ visitor.getColumn('searchEngineIcon') }}\" alt=\"{{ visitor.getColumn('referrerName') }}\"/>
            {% endif %}
            <span {% if not showKeyword %}title=\"{{ keywordNotDefined }}\" class=\"visitorLogTooltip\"{% endif %}>{{ visitor.getColumn('referrerName') }}</span>
            {% if showKeyword %}{{ 'Referrers_Keywords'|translate }}:
                <a href=\"{{ visitor.getColumn('referrerUrl') }}\" rel=\"noreferrer\" target=\"_blank\" style=\"text-decoration:underline;\">
                    \"{{ visitor.getColumn('referrerKeyword') }}\"</a>
            {% endif %}
            {% set keyword %}{{ visitor.getColumn('referrerKeyword') }}{% endset %}
            {% set searchName %}{{ visitor.getColumn('referrerName') }}{% endset %}
            {% set position %}#{{ visitor.getColumn('referrerKeywordPosition') }}{% endset %}
            {% if visitor.getColumn('referrerKeywordPosition') %}
                <span title='{{ 'Live_KeywordRankedOnSearchResultForThisVisitor'|translate(keyword,position,searchName) }}' class='visitorRank visitorLogTooltip'>
                                <span class='hash'>#</span>
                    {{ visitor.getColumn('referrerKeywordPosition') }}
                            </span>
            {% endif %}
        {% endif %}
        {% if visitor.getColumn('referrerType') == 'direct' %}{{ 'Referrers_DirectEntry'|translate }}{% endif %}
    </div>
    {% endset %}

    {% set visitorRow %}
        <div class=\"card row\">

            {% if visitor.getColumn('visitorId') is not empty and not clientSideParameters.hideProfileLink %}
                <a class=\"visitor-log-visitor-profile-link visitorLogTooltip\" title=\"{{ 'Live_ViewVisitorProfile'|translate }}\" data-visitor-id=\"{{ visitor.getColumn(\"visitorId\") }}\">
                    <img src=\"plugins/Live/images/visitorProfileLaunch.png\"/> <span>{{ 'Live_ViewVisitorProfile'|translate }}
                        {%- if visitor.getColumn('userId') is not empty %}: {{ visitor.getColumn('userId')|raw }}{% endif %}</span>
                </a>
            {% endif %}

        {% set cycleIndex=cycleIndex+1 %}
            <div class=\"col-md-{% if displayVisitorsInOwnColumn %}3{% else %}4{% endif %}\">
                <strong class=\"visitorLogTooltip\" title=\"{% if visitor.getColumn('visitorType')=='new' %}{{ 'General_NewVisitor'|translate }}{% else %}{{ 'Live_VisitorsLastVisit'|translate(visitor.getColumn('daysSinceLastVisit')) }}{% endif %}\">
                    {{ visitor.getColumn('serverDatePrettyFirstAction') }}
                    {% if isWidget %}<br/>{% else %}-{% endif %} {{ visitor.getColumn('serverTimePrettyFirstAction') }}</strong>
                {% if visitor.getColumn('visitIp') is not empty %}
                    <br/>
                <span class=\"visitorLogTooltip\" title=\"{% if visitor.getColumn('userId') is not empty %}{{ 'General_UserId'|translate }}: {{ visitor.getColumn('userId')|raw }}{% endif %}

{% if visitor.getColumn('visitorId') is not empty %}{{ 'General_VisitorID'|translate }}: {{ visitor.getColumn('visitorId') }}{% endif -%}
{%- if visitor.getColumn('latitude') or visitor.getColumn('longitude') %}

{{ visitor.getColumn('location') }}

GPS (lat/long): {{ visitor.getColumn('latitude') }},{{ visitor.getColumn('longitude') }}{% endif %}\">
                    IP: {{ visitor.getColumn('visitIp') }}
                    {% if visitor.getColumn('userId') is not empty %}<br/><br/>{{ visitor.getColumn('userId')|raw }}{% endif %}

                    </span>{% endif %}

                {% if visitor.getColumn('provider') %}
                    <br/>
                    {{ 'Provider_ColumnProvider'|translate }}:
                    {% if visitor.getColumn('providerUrl') %}
                        <a href=\"{{ visitor.getColumn('providerUrl') }}\" rel=\"noreferrer\" target=\"_blank\" class=\"visitorLogTooltip\" title=\"{{ visitor.getColumn('providerName') }} {{ visitor.getColumn('providerUrl') }}\" style=\"text-decoration:underline;\">
                    {% endif -%}
                        {{ visitor.getColumn('providerName') }}
                    {%- if visitor.getColumn('providerUrl') %}</a>{% endif %}
                {% endif %}
                {% if visitor.getColumn('visitorTypeIcon') or visitor.getColumn('countryFlag') %}
                    <br/>
                {% endif %}
                {% if visitor.getColumn('visitorTypeIcon') %}
                    <span class=\"visitorLogIconWithDetails\">
                        <img src=\"{{ visitor.getColumn('visitorTypeIcon') }}\"/>
                        <ul class=\"details\">
                            <li>{{ 'General_ReturningVisitor'|translate }} - {{ 'General_NVisits'|translate(visitor.getColumn('visitCount')) }}</li>
                        </ul>
                    </span>
                {% endif %}
                {% if visitor.getColumn('countryFlag') %}
                    <span class=\"visitorLogIconWithDetails\">
                        <img src=\"{{ visitor.getColumn('countryFlag') }}\"/>
                        <ul class=\"details\">
                            <li>{{ 'UserCountry_Country'|translate }}: {{ visitor.getColumn('country') }}</li>
                            {% if visitor.getColumn('region') %}<li>{{ 'UserCountry_Region'|translate }}: {{ visitor.getColumn('region') }}</li>{% endif %}
                            {% if visitor.getColumn('city') %}<li>{{ 'UserCountry_City'|translate }}: {{ visitor.getColumn('city') }}</li>{% endif %}
                        </ul>
                    </span>
                {% endif %}
                {% if visitor.getColumn('customVariables') %}
                    <br/>
                    {% for id,customVariable in visitor.getColumn('customVariables') %}
                        {% set name='customVariableName' ~ id %}
                        {% set value='customVariableValue' ~ id %}
                        <br/>
                        <acronym class=\"visitorLogTooltip\" title=\"{{ 'CustomVariables_CustomVariables'|translate }} (index {{ id }})\">
                            {{ customVariable[name]|truncate(30) }}
                        </acronym>
                    {% if customVariable[value]|length > 0 %}: {{ customVariable[value]|truncate(50) }}{% endif %}
                    {% endfor %}
                {% endif %}
                {% if not displayVisitorsInOwnColumn %}
                    <br/>
                    {{ visitorColumnContent }}
                {% endif %}
                    {{ referrerContent }}
            </div>

            {% if displayVisitorsInOwnColumn %}
                <div class=\"col-md-2 own-visitor-column\">
                    {{ visitorColumnContent }}
                </div>
            {% endif %}

            <div class=\"col-md-{% if displayVisitorsInOwnColumn %}7{% else %}8{% endif %} column {% if visitor.getColumn('visitConverted') and not isWidget %}highlightField{% endif %}\">
                {{ postEvent('Live.visitorLogViewBeforeActionsInfo', visitor) }}
                <div class=\"visitor-log-page-list\">
                    <strong>
                        {{ visitor.getColumn('actionDetails')|length }}
                        {% if visitor.getColumn('actionDetails')|length <= 1 %}
                            {{ 'General_Action'|translate }}
                        {% else %}
                            {{ 'General_Actions'|translate }}
                        {% endif %}
                        {% if visitor.getColumn('visitDuration') > 0 %}- {{ visitor.getColumn('visitDurationPretty')|raw }}{% endif %}
                    </strong>
                    <br/>
                    <ol class='visitorLog'>
                        {% include \"@Live/_actionsList.twig\" with {'actionDetails': visitor.getColumn('actionDetails')} %}
                    </ol>
                </div>
                {{ postEvent('Live.visitorLogViewAfterActionsInfo', visitor) }}
            </div>
        </div>
    {% endset %}

    {{ visitorRow }}
{% endfor %}
";
    }
}
