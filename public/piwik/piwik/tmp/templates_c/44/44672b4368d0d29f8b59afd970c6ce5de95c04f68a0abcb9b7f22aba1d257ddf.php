<?php

/* @LanguagesManager/getLanguagesSelector.twig */
class __TwigTemplate_f2264e55e2997c3e82eb84f1ab3041b6b695f0e2ad759c411c98c6c4dadcd095 extends Twig_Template
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
        echo "<span class=\"topBarElem\">
    <div class=\"languageSelection\"
         ng-cloak
         menu-title=\"";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, (isset($context["currentLanguageName"]) ? $context["currentLanguageName"] : $this->getContext($context, "currentLanguageName")), "html_attr");
        echo "\"
         piwik-menudropdown>
        <a class=\"item\"
            href=\"?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/translations/\">";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("LanguagesManager_AboutPiwikTranslations")), "html", null, true);
        echo "</a>
        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["languages"]) ? $context["languages"] : $this->getContext($context, "languages")));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 9
            echo "            <a class=\"item ";
            if (($this->getAttribute($context["language"], "code", array()) == (isset($context["currentLanguageCode"]) ? $context["currentLanguageCode"] : $this->getContext($context, "currentLanguageCode")))) {
                echo "active";
            }
            echo "\"
               value=\"";
            // line 10
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["language"], "code", array()), "html", null, true);
            echo "\"
               title=\"";
            // line 11
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()), "html", null, true);
            echo " (";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["language"], "english_name", array()), "html", null, true);
            echo ")\">";
            echo \Piwik\piwik_escape_filter($this->env, $this->getAttribute($context["language"], "name", array()), "html", null, true);
            echo "</a>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "
        <form action=\"index.php?module=LanguagesManager&amp;action=saveLanguage\" method=\"post\">
            <input type=\"hidden\" name=\"language\" id=\"language\">
            ";
        // line 17
        echo "            ";
        if (array_key_exists("token_auth", $context)) {
            echo "<input type=\"hidden\" name=\"token_auth\" value=\"";
            echo \Piwik\piwik_escape_filter($this->env, (isset($context["token_auth"]) ? $context["token_auth"] : $this->getContext($context, "token_auth")), "html", null, true);
            echo "\"/>";
        }
        // line 18
        echo "        </form>
    </div>
</span>
";
    }

    public function getTemplateName()
    {
        return "@LanguagesManager/getLanguagesSelector.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 18,  66 => 17,  61 => 13,  49 => 11,  45 => 10,  38 => 9,  34 => 8,  30 => 7,  24 => 4,  19 => 1,);
    }

    public function getSource()
    {
        return "<span class=\"topBarElem\">
    <div class=\"languageSelection\"
         ng-cloak
         menu-title=\"{{ currentLanguageName|e('html_attr') }}\"
         piwik-menudropdown>
        <a class=\"item\"
            href=\"?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/translations/\">{{ 'LanguagesManager_AboutPiwikTranslations'|translate }}</a>
        {% for language in languages %}
            <a class=\"item {% if language.code == currentLanguageCode %}active{% endif %}\"
               value=\"{{ language.code }}\"
               title=\"{{ language.name }} ({{ language.english_name }})\">{{ language.name }}</a>
        {% endfor %}

        <form action=\"index.php?module=LanguagesManager&amp;action=saveLanguage\" method=\"post\">
            <input type=\"hidden\" name=\"language\" id=\"language\">
            {# During installation token_auth is not set #}
            {% if token_auth is defined %}<input type=\"hidden\" name=\"token_auth\" value=\"{{ token_auth }}\"/>{% endif %}
        </form>
    </div>
</span>
";
    }
}
