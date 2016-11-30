<?php

/* @Live/_actionsList.twig */
class __TwigTemplate_92d22888829142d78d63f755856da17024b34c7157035d8f216e719b6f71082a extends Twig_Template
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
        $context["previousAction"] = false;
        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["actionDetails"]) ? $context["actionDetails"] : $this->getContext($context, "actionDetails")));
        foreach ($context['_seq'] as $context["_key"] => $context["action"]) {
            // line 3
            echo "    ";
            ob_start();
            // line 4
            echo "        ";
            if ($this->getAttribute($context["action"], "customVariables", array(), "any", true, true)) {
                // line 5
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CustomVariables_CustomVariables")), "html", null, true);
                echo ":
            ";
                // line 6
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "customVariables", array()));
                foreach ($context['_seq'] as $context["id"] => $context["customVariable"]) {
                    // line 7
                    echo "                ";
                    $context["name"] = ("customVariablePageName" . $context["id"]);
                    // line 8
                    echo "                ";
                    $context["value"] = ("customVariablePageValue" . $context["id"]);
                    // line 9
                    echo "                - ";
                    echo $this->getAttribute($context["customVariable"], (isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")), array(), "array");
                    echo " ";
                    if ((twig_length_filter($this->env, $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array")) > 0)) {
                        echo " = ";
                        echo $this->getAttribute($context["customVariable"], (isset($context["value"]) ? $context["value"] : $this->getContext($context, "value")), array(), "array");
                    }
                    // line 10
                    echo "
                ";
                    // line 12
                    echo "            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['id'], $context['customVariable'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 13
                echo "        ";
            }
            // line 14
            echo "    ";
            $context["customVariablesTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
            // line 15
            echo "
    <li class=\"";
            // line 16
            if ($this->getAttribute($context["action"], "goalName", array(), "any", true, true)) {
                echo "goal";
            } else {
                echo "action";
            }
            echo "\"
        title=\"";
            // line 17
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "serverTimePretty", array()), "html", null, true);
            if (($this->getAttribute($context["action"], "url", array(), "any", true, true) && twig_length_filter($this->env, trim($this->getAttribute($context["action"], "url", array()))))) {
                // line 18
                echo "
";
                // line 19
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
            }
            if (twig_length_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))))) {
                // line 20
                echo "
";
                // line 21
                echo \Piwik\piwik_escape_filter($this->env, trim((isset($context["customVariablesTooltip"]) ? $context["customVariablesTooltip"] : $this->getContext($context, "customVariablesTooltip"))), "html", null, true);
            }
            // line 22
            if ($this->getAttribute($context["action"], "generationTime", array(), "any", true, true)) {
                // line 23
                echo "
";
                // line 24
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnGenerationTime")), "html", null, true);
                echo ": ";
                echo $this->getAttribute($context["action"], "generationTime", array());
            }
            // line 25
            if ($this->getAttribute($context["action"], "timeSpentPretty", array(), "any", true, true)) {
                // line 26
                echo "
";
                // line 27
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_TimeOnPage")), "html", null, true);
                echo ": ";
                echo $this->getAttribute($context["action"], "timeSpentPretty", array());
            }
            echo "\">
        <div>
        ";
            // line 29
            if ((($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder") || ($this->getAttribute($context["action"], "type", array()) == "ecommerceAbandonedCart"))) {
                // line 30
                echo "        ";
                // line 31
                echo "            <img src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                echo "\"/>
            ";
                // line 32
                if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                    // line 33
                    echo "                <strong>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_EcommerceOrder")), "html", null, true);
                    echo "</strong>
                <span style='color:#666;'>(";
                    // line 34
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "orderId", array()), "html", null, true);
                    echo ")</span>
            ";
                } else {
                    // line 36
                    echo "                <strong>";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_AbandonedCart")), "html", null, true);
                    echo "</strong>

                ";
                    // line 39
                    echo "            ";
                }
                // line 40
                echo "            <p>
            <span ";
                // line 41
                if ( !(isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                    echo "style='margin-left:20px;'";
                }
                echo ">
                ";
                // line 42
                if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                    // line 44
                    ob_start();
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                    echo ": ";
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    echo "
";
                    // line 45
                    if ( !twig_test_empty($this->getAttribute($context["action"], "revenueSubTotal", array()))) {
                        echo " - ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Subtotal")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueSubTotal", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    }
                    // line 46
                    echo "
";
                    // line 47
                    if ( !twig_test_empty($this->getAttribute($context["action"], "revenueTax", array()))) {
                        echo " - ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Tax")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueTax", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    }
                    // line 48
                    echo "
";
                    // line 49
                    if ( !twig_test_empty($this->getAttribute($context["action"], "revenueShipping", array()))) {
                        echo " - ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Shipping")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueShipping", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    }
                    // line 50
                    echo "
";
                    // line 51
                    if ( !twig_test_empty($this->getAttribute($context["action"], "revenueDiscount", array()))) {
                        echo " - ";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Discount")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenueDiscount", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    }
                    $context["ecommerceOrderTooltip"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 53
                    echo "                <abbr title=\"";
                    echo \Piwik\piwik_escape_filter($this->env, (isset($context["ecommerceOrderTooltip"]) ? $context["ecommerceOrderTooltip"] : $this->getContext($context, "ecommerceOrderTooltip")), "html", null, true);
                    echo "\">";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                    echo ":
                ";
                } else {
                    // line 55
                    echo "                    ";
                    ob_start();
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                    $context["revenueLeft"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
                    // line 56
                    echo "                    ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_LeftInCart", (isset($context["revenueLeft"]) ? $context["revenueLeft"] : $this->getContext($context, "revenueLeft")))), "html", null, true);
                    echo ":
                ";
                }
                // line 58
                echo "                    <strong>";
                echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                echo "</strong>
                ";
                // line 59
                if (($this->getAttribute($context["action"], "type", array()) == "ecommerceOrder")) {
                    // line 60
                    echo "                </abbr>
                ";
                }
                // line 61
                echo ", ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                echo ": ";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "items", array()), "html", null, true);
                echo "

                ";
                // line 64
                echo "                ";
                if ( !twig_test_empty($this->getAttribute($context["action"], "itemDetails", array()))) {
                    // line 65
                    echo "                    <ul style='list-style:square;margin-left:";
                    if ((isset($context["isWidget"]) ? $context["isWidget"] : $this->getContext($context, "isWidget"))) {
                        echo "15";
                    } else {
                        echo "50";
                    }
                    echo "px;'>
                        ";
                    // line 66
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["action"], "itemDetails", array()));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 67
                        echo "                            <li>
                                ";
                        // line 68
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["product"], "itemSKU", array()), "html", null, true);
                        if ( !twig_test_empty($this->getAttribute($context["product"], "itemName", array()))) {
                            echo ": ";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["product"], "itemName", array()), "html", null, true);
                        }
                        // line 69
                        echo "                                ";
                        if ( !twig_test_empty($this->getAttribute($context["product"], "itemCategory", array()))) {
                            echo " (";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["product"], "itemCategory", array()), "html", null, true);
                            echo ")";
                        }
                        // line 70
                        echo "                                ,
                                ";
                        // line 71
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Quantity")), "html", null, true);
                        echo ": ";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                        echo ",
                                ";
                        // line 72
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Price")), "html", null, true);
                        echo ": ";
                        echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["product"], "price", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                        echo "
                            </li>
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 75
                    echo "                    </ul>
                ";
                }
                // line 77
                echo "            </span>
            </p>
        ";
            } elseif ( !$this->getAttribute(            // line 79
$context["action"], "goalName", array(), "any", true, true)) {
                // line 80
                echo "            ";
                // line 81
                echo "            ";
                if ( !twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false)))) {
                    // line 82
                    echo "                <span class=\"truncated-text-line\">";
                    echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "pageTitle", array())));
                    echo "</span>
            ";
                }
                // line 84
                echo "            ";
                if ($this->getAttribute($context["action"], "siteSearchKeyword", array(), "any", true, true)) {
                    // line 85
                    echo "                ";
                    if (($this->getAttribute($context["action"], "type", array()) == "search")) {
                        // line 86
                        echo "                    <img src='";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                        echo "' title='";
                        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Actions_SubmenuSitesearch")), "html", null, true);
                        echo "' class=\"action-list-action-icon search\">
                ";
                    }
                    // line 88
                    echo "                <span class=\"truncated-text-line\">";
                    echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "siteSearchKeyword", array())));
                    echo "</span>
            ";
                }
                // line 90
                echo "            ";
                if ( !twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false)))) {
                    // line 91
                    echo "                <img src='";
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                    echo "' title='";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Events_Event")), "html", null, true);
                    echo "' class=\"action-list-action-icon event\">
                <span class=\"truncated-text-line event\">";
                    // line 92
                    echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventCategory", array())));
                    echo " - ";
                    echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventAction", array())));
                    echo " ";
                    if ($this->getAttribute($context["action"], "eventName", array(), "any", true, true)) {
                        echo "- ";
                        echo call_user_func_array($this->env->getFilter('rawSafeDecoded')->getCallable(), array($this->getAttribute($context["action"], "eventName", array())));
                    }
                    echo " ";
                    if ($this->getAttribute($context["action"], "eventValue", array(), "any", true, true)) {
                        echo "[";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "eventValue", array()), "html", null, true);
                        echo "]";
                    }
                    echo "</span>
            ";
                }
                // line 94
                echo "            ";
                if ( !twig_test_empty($this->getAttribute($context["action"], "url", array()))) {
                    // line 95
                    echo "                ";
                    if ((($this->getAttribute($context["action"], "type", array()) == "action") &&  !twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false))))) {
                        echo "<p>";
                    }
                    // line 96
                    echo "                ";
                    if ((($this->getAttribute($context["action"], "type", array()) == "download") || ($this->getAttribute($context["action"], "type", array()) == "outlink"))) {
                        // line 97
                        echo "                    <img src='";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                        echo "' class=\"action-list-action-icon ";
                        echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "type", array()), "html", null, true);
                        echo "\">
                ";
                    }
                    // line 99
                    echo "
                ";
                    // line 100
                    if (( !twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false))) && ((($this->getAttribute(                    // line 101
(isset($context["previousAction"]) ? $context["previousAction"] : null), "url", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute((isset($context["previousAction"]) ? $context["previousAction"] : null), "url", array()), false)) : (false)) == $this->getAttribute($context["action"], "url", array())))) {
                        // line 102
                        echo "                    ";
                        // line 103
                        echo "                ";
                    } else {
                        // line 104
                        echo "                    ";
                        if ((((is_string($__internal_815dea4ab2907c71eeb0108a68fa3818b8cd0aa2165b23238f8986f73ef56fbd = twig_lower_filter($this->env, trim($this->getAttribute($context["action"], "url", array())))) && is_string($__internal_fa7b02be849aee5fb61b499f2a27af6ba7c909ff04bc37fcaa52b842a3f5d308 = "javascript:") && ('' === $__internal_fa7b02be849aee5fb61b499f2a27af6ba7c909ff04bc37fcaa52b842a3f5d308 || 0 === strpos($__internal_815dea4ab2907c71eeb0108a68fa3818b8cd0aa2165b23238f8986f73ef56fbd, $__internal_fa7b02be849aee5fb61b499f2a27af6ba7c909ff04bc37fcaa52b842a3f5d308))) || (is_string($__internal_e08119fbf8b26b30b5ce79e193329eed0cc0e493bd81e9f06d7ff7298cc398b4 = twig_lower_filter($this->env, trim($this->getAttribute(                        // line 105
$context["action"], "url", array())))) && is_string($__internal_02f47ddd2e53a7b3fbf81062e320f5f29ca86287d066b3e33ed43f23d2e82762 = "vbscript:") && ('' === $__internal_02f47ddd2e53a7b3fbf81062e320f5f29ca86287d066b3e33ed43f23d2e82762 || 0 === strpos($__internal_e08119fbf8b26b30b5ce79e193329eed0cc0e493bd81e9f06d7ff7298cc398b4, $__internal_02f47ddd2e53a7b3fbf81062e320f5f29ca86287d066b3e33ed43f23d2e82762)))) || (is_string($__internal_520f7e605a6b854bf88f164ab2aea5cde4025110900e6c7da0475a1daa47d3d6 = twig_lower_filter($this->env, trim($this->getAttribute(                        // line 106
$context["action"], "url", array())))) && is_string($__internal_2d59d340d3b1623284cbffb71428d8d933ae84f89dd01818b5c6a1d39bd0b6cc = "data:") && ('' === $__internal_2d59d340d3b1623284cbffb71428d8d933ae84f89dd01818b5c6a1d39bd0b6cc || 0 === strpos($__internal_520f7e605a6b854bf88f164ab2aea5cde4025110900e6c7da0475a1daa47d3d6, $__internal_2d59d340d3b1623284cbffb71428d8d933ae84f89dd01818b5c6a1d39bd0b6cc))))) {
                            // line 107
                            echo "                        ";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                            echo "
                    ";
                        } else {
                            // line 109
                            echo "                    <a href=\"";
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                            echo "\" rel=\"noreferrer\" target=\"_blank\" class=\"";
                            if (twig_test_empty((($this->getAttribute($context["action"], "eventCategory", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "eventCategory", array()), false)) : (false)))) {
                                echo "action-list-url";
                            }
                            echo " truncated-text-line\"
                       ";
                            // line 110
                            if (( !array_key_exists("overrideLinkStyle", $context) || (isset($context["overrideLinkStyle"]) ? $context["overrideLinkStyle"] : $this->getContext($context, "overrideLinkStyle")))) {
                                echo "style=\"text-decoration:underline;\"";
                            }
                            echo ">
                       ";
                            // line 111
                            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "url", array()), "html", null, true);
                            echo "
                    </a>
                    ";
                        }
                        // line 114
                        echo "                ";
                    }
                    // line 115
                    echo "                ";
                    if ((($this->getAttribute($context["action"], "type", array()) == "action") &&  !twig_test_empty((($this->getAttribute($context["action"], "pageTitle", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["action"], "pageTitle", array()), false)) : (false))))) {
                        echo "</p>";
                    }
                    // line 116
                    echo "            ";
                } elseif ((($this->getAttribute($context["action"], "type", array()) != "search") && ($this->getAttribute($context["action"], "type", array()) != "event"))) {
                    // line 117
                    echo "                <p>
                <span>";
                    // line 118
                    echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "pageUrlNotDefined", array()), "html", null, true);
                    echo "</span>
                </p>
            ";
                }
                // line 121
                echo "        ";
            } else {
                // line 122
                echo "            ";
                // line 123
                echo "            <img src=\"";
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "icon", array()), "html", null, true);
                echo "\" />
            <strong>";
                // line 124
                echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["action"], "goalName", array()), "html", null, true);
                echo "</strong>
            ";
                // line 125
                if (($this->getAttribute($context["action"], "revenue", array()) > 0)) {
                    echo ", ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_ColumnRevenue")), "html", null, true);
                    echo ":
                <strong>";
                    // line 126
                    echo call_user_func_array($this->env->getFilter('money')->getCallable(), array($this->getAttribute($context["action"], "revenue", array()), $this->getAttribute((isset($context["clientSideParameters"]) ? $context["clientSideParameters"] : $this->getContext($context, "clientSideParameters")), "idSite", array())));
                    echo "</strong>
            ";
                }
                // line 128
                echo "        ";
            }
            // line 129
            echo "        </div>
    </li>

    ";
            // line 132
            $context["previousAction"] = $context["action"];
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['action'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "@Live/_actionsList.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  479 => 132,  474 => 129,  471 => 128,  466 => 126,  460 => 125,  456 => 124,  451 => 123,  449 => 122,  446 => 121,  440 => 118,  437 => 117,  434 => 116,  429 => 115,  426 => 114,  420 => 111,  414 => 110,  405 => 109,  399 => 107,  397 => 106,  396 => 105,  394 => 104,  391 => 103,  389 => 102,  387 => 101,  386 => 100,  383 => 99,  375 => 97,  372 => 96,  367 => 95,  364 => 94,  346 => 92,  339 => 91,  336 => 90,  330 => 88,  322 => 86,  319 => 85,  316 => 84,  310 => 82,  307 => 81,  305 => 80,  303 => 79,  299 => 77,  295 => 75,  284 => 72,  278 => 71,  275 => 70,  268 => 69,  262 => 68,  259 => 67,  255 => 66,  246 => 65,  243 => 64,  235 => 61,  231 => 60,  229 => 59,  224 => 58,  218 => 56,  213 => 55,  205 => 53,  197 => 51,  194 => 50,  187 => 49,  184 => 48,  177 => 47,  174 => 46,  167 => 45,  160 => 44,  158 => 42,  152 => 41,  149 => 40,  146 => 39,  140 => 36,  135 => 34,  130 => 33,  128 => 32,  123 => 31,  121 => 30,  119 => 29,  111 => 27,  108 => 26,  106 => 25,  101 => 24,  98 => 23,  96 => 22,  93 => 21,  90 => 20,  86 => 19,  83 => 18,  80 => 17,  72 => 16,  69 => 15,  66 => 14,  63 => 13,  57 => 12,  54 => 10,  46 => 9,  43 => 8,  40 => 7,  36 => 6,  31 => 5,  28 => 4,  25 => 3,  21 => 2,  19 => 1,);
    }

    public function getSource()
    {
        return "{% set previousAction = false %}
{% for action in actionDetails %}
    {% set customVariablesTooltip %}
        {% if action.customVariables is defined %}
            {{ 'CustomVariables_CustomVariables'|translate }}:
            {% for id,customVariable in action.customVariables %}
                {% set name = 'customVariablePageName' ~ id %}
                {% set value = 'customVariablePageValue' ~ id %}
                - {{ customVariable[name]|raw }} {% if customVariable[value]|length > 0 %} = {{ customVariable[value]|raw }}{% endif %}

                {# line break above is important #}
            {% endfor %}
        {% endif %}
    {% endset %}

    <li class=\"{% if action.goalName is defined %}goal{% else %}action{% endif %}\"
        title=\"{{ action.serverTimePretty }}{% if action.url is defined and action.url|trim|length %}

{{ action.url }}{% endif %}{% if customVariablesTooltip|trim|length %}

{{ customVariablesTooltip|trim }}{% endif -%}
        {%- if action.generationTime is defined %}

{{ 'General_ColumnGenerationTime'|translate }}: {{ action.generationTime|raw }}{% endif %}
        {%- if action.timeSpentPretty is defined %}

{{ 'General_TimeOnPage'|translate }}: {{ action.timeSpentPretty|raw }}{% endif -%}\">
        <div>
        {% if action.type == 'ecommerceOrder' or action.type == 'ecommerceAbandonedCart' %}
        {# Ecommerce Abandoned Cart / Ecommerce Order #}
            <img src=\"{{ action.icon }}\"/>
            {% if action.type == 'ecommerceOrder' %}
                <strong>{{ 'Goals_EcommerceOrder'|translate }}</strong>
                <span style='color:#666;'>({{ action.orderId }})</span>
            {% else %}
                <strong>{{'Goals_AbandonedCart'|translate}}</strong>

                {# TODO: would be nice to have the icons Orders / Cart in the ecommerce log footer #}
            {% endif %}
            <p>
            <span {% if not isWidget %}style='margin-left:20px;'{% endif %}>
                {% if action.type == 'ecommerceOrder' %}
{# spacing is important for tooltip to look nice #}
{% set ecommerceOrderTooltip %}{{ 'General_ColumnRevenue'|translate }}: {{ action.revenue|money(clientSideParameters.idSite)|raw }}
{% if action.revenueSubTotal is not empty %} - {{ 'General_Subtotal'|translate }}: {{ action.revenueSubTotal|money(clientSideParameters.idSite)|raw }}{% endif %}

{% if action.revenueTax is not empty %} - {{ 'General_Tax'|translate }}: {{ action.revenueTax|money(clientSideParameters.idSite)|raw }}{% endif %}

{% if action.revenueShipping is not empty %} - {{ 'General_Shipping'|translate }}: {{ action.revenueShipping|money(clientSideParameters.idSite)|raw }}{% endif %}

{% if action.revenueDiscount is not empty %} - {{ 'General_Discount'|translate }}: {{ action.revenueDiscount|money(clientSideParameters.idSite)|raw }}{% endif %}
{% endset %}
                <abbr title=\"{{ ecommerceOrderTooltip }}\">{{ 'General_ColumnRevenue'|translate }}:
                {% else %}
                    {% set revenueLeft %}{{ 'General_ColumnRevenue'|translate }}{% endset %}
                    {{ 'Goals_LeftInCart'|translate(revenueLeft) }}:
                {% endif %}
                    <strong>{{ action.revenue|money(clientSideParameters.idSite)|raw }}</strong>
                {% if action.type == 'ecommerceOrder' %}
                </abbr>
                {% endif %}, {{ 'General_Quantity'|translate }}: {{ action.items }}

                {# Ecommerce items in Cart/Order #}
                {% if action.itemDetails is not empty %}
                    <ul style='list-style:square;margin-left:{% if isWidget %}15{% else %}50{% endif %}px;'>
                        {% for product in action.itemDetails %}
                            <li>
                                {{ product.itemSKU }}{% if product.itemName is not empty %}: {{ product.itemName }}{% endif %}
                                {% if product.itemCategory is not empty %} ({{ product.itemCategory }}){% endif %}
                                ,
                                {{ 'General_Quantity'|translate }}: {{ product.quantity }},
                                {{ 'General_Price'|translate }}: {{ product.price|money(clientSideParameters.idSite)|raw }}
                            </li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </span>
            </p>
        {% elseif action.goalName is not defined%}
            {# Page view / Download / Outlink / Event #}
            {% if action.pageTitle|default(false) is not empty %}
                <span class=\"truncated-text-line\">{{ action.pageTitle|rawSafeDecoded }}</span>
            {% endif %}
            {% if action.siteSearchKeyword is defined %}
                {% if action.type == 'search' %}
                    <img src='{{ action.icon }}' title='{{ 'Actions_SubmenuSitesearch'|translate }}' class=\"action-list-action-icon search\">
                {% endif %}
                <span class=\"truncated-text-line\">{{ action.siteSearchKeyword|rawSafeDecoded }}</span>
            {% endif %}
            {% if action.eventCategory|default(false) is not empty %}
                <img src='{{ action.icon }}' title='{{ 'Events_Event'|translate }}' class=\"action-list-action-icon event\">
                <span class=\"truncated-text-line event\">{{ action.eventCategory|rawSafeDecoded }} - {{ action.eventAction|rawSafeDecoded }} {% if action.eventName is defined %}- {{ action.eventName|rawSafeDecoded }}{% endif %} {% if action.eventValue is defined %}[{{ action.eventValue }}]{% endif %}</span>
            {% endif %}
            {% if action.url is not empty %}
                {% if action.type == 'action' and action.pageTitle|default(false) is not empty %}<p>{% endif %}
                {% if action.type == 'download' or action.type == 'outlink' %}
                    <img src='{{ action.icon }}' class=\"action-list-action-icon {{ action.type }}\">
                {% endif %}

                {% if action.eventCategory|default(false) is not empty
                    and previousAction.url|default(false) == action.url %}
                    {# For events, do not show (url) if the Event URL is the same as the URL last displayed #}
                {% else %}
                    {% if action.url|trim|lower starts with 'javascript:' or
                          action.url|trim|lower starts with 'vbscript:' or
                          action.url|trim|lower starts with 'data:' %}
                        {{ action.url }}
                    {%  else %}
                    <a href=\"{{ action.url }}\" rel=\"noreferrer\" target=\"_blank\" class=\"{% if action.eventCategory|default(false) is empty %}action-list-url{# don't put URL on new line for events #}{% endif %} truncated-text-line\"
                       {% if overrideLinkStyle is not defined or overrideLinkStyle %}style=\"text-decoration:underline;\"{% endif %}>
                       {{ action.url }}
                    </a>
                    {%  endif %}
                {% endif %}
                {% if action.type == 'action' and action.pageTitle|default(false) is not empty %}</p>{% endif %}
            {% elseif action.type != 'search' and action.type != 'event' %}
                <p>
                <span>{{ clientSideParameters.pageUrlNotDefined }}</span>
                </p>
            {% endif %}
        {% else %}
            {# Goal conversion #}
            <img src=\"{{ action.icon }}\" />
            <strong>{{ action.goalName }}</strong>
            {% if action.revenue > 0 %}, {{ 'General_ColumnRevenue'|translate }}:
                <strong>{{ action.revenue|money(clientSideParameters.idSite)|raw }}</strong>
            {% endif %}
        {% endif %}
        </div>
    </li>

    {% set previousAction = action %}
{% endfor %}";
    }
}
