<?php
/**
 * Created by PhpStorm.
 * User: recai.cansiz
 * Date: 19.09.2017
 * Time: 10:44
 *
 * @param array $inputs
 * @param array|null $excepts
 *
 * @return array
 */

function removeHtmlTagsOfFields(array $inputs, array $excepts = null)
{
    $inputOriginal = $inputs;

    $inputs = array_except($inputs, $excepts);

    foreach ($inputs as $index => $in){
        $inputs[$index] = strip_tags($in);
    }

    if(!empty($excepts)){

        foreach ($excepts as $except){
            $inputs[$except] = $inputOriginal[$except];
        }
    }

    return $inputs;
}


/**
 * @param string $field
 *
 * @return string
 */
function removeHtmlTagsOfField(string $field){
    return htmlentities(strip_tags($field), ENT_QUOTES, 'UTF-8');
}