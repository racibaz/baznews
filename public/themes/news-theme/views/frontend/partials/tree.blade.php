<?php
$traverse = function ($categories, $prefix = '--') use (&$traverse) {
    foreach ($categories as $category) {
        echo PHP_EOL . $prefix . ' ' . $category->name . '<br/>';

        $traverse($category->children, $prefix . '-');
    }
};
$traverse($recordsTree);
?>