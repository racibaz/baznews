<?php

namespace App\Models;

use Caffeinated\Modules\Facades\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Validator;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class WidgetManager extends Model
{
    use SoftDeletes;

    public static $widgetGroups = [
        'header' =>  'header',
        'side_bar' => 'side_bar',
        'center' => 'center',
        'right_bar' =>  'right_bar',
        'footer' =>  'footer',
        'fixed_footer' =>  'fixed_footer',
    ];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
//        'widget_group_id',
        'name',
        'slug',
        'namespace',
        'group',
        'position',
        'is_active',
    ];

    protected $dates = ['created_at','updated_at','deleted_at'];


    public function widget_group()
    {
        return $this->belongsTo('App\Models\WidgetGroup','widget_group_id');
    }


    public static function validate($input) {
        $rules = array(
//            'widget_group_id'               => 'required',
            'name'                          => 'required|string',
            'namespace'                     => 'required',
            'position'                      => 'required|numeric',
        );
        return Validator::make($input, $rules);
    }

    public static function getAllWidgets()
    {
        return WidgetManager::where('is_active',1)->get();
    }

    public static function getEnableModuleWidgets()
    {
        $widgets =[];

        foreach (Module::all() as $module)
        {

            //module pasif ise widget bilgilerini almıyoruz.
            if (Module::isDisabled($module['slug'])) {
                continue;
            }

            //module un widgets.json file yolu
            $moduleWidgetsJsonFilePath = base_path('app/Modules/' . $module['basename'] . '/Widgets/widgets.json');

            $jsonFile = file_get_contents($moduleWidgetsJsonFilePath);

            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($jsonFile, true)),
                RecursiveIteratorIterator::SELF_FIRST);


            foreach ($jsonIterator as $key => $val)
            {
                if(is_array($val)) {
                    //echo "$key:\n";
                } else {

                    $widgets[$module['basename']][$key] = $val;
                }
            }
        }

        return $widgets;
    }

    public static function getWidgetInfo($widgetSlug)
    {
        $widget = [];

        foreach (Module::all() as $module)
        {
            //module pasif ise widget bilgilerini almıyoruz.
            if (Module::isDisabled($module['slug'])) {
                continue;
            }

            //module un widgets.json file yolu
            $moduleWidgetsJsonFilePath = base_path('app/Modules/' . $module['basename'] . '/Widgets/widgets.json');

            $jsonFile = file_get_contents($moduleWidgetsJsonFilePath);

            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($jsonFile, true)),
                RecursiveIteratorIterator::SELF_FIRST);


            foreach ($jsonIterator as $key => $val)
            {
                if(is_array($val)) {
                    //echo "$key:\n";
                } else {

                    if($key === 'slug' && $val === $widgetSlug){

                        foreach ($jsonIterator as $key => $val)
                        {
                            $widget[$key] = $val;
                        }
                    }
                }
            }
        }

        return $widget;
    }



}