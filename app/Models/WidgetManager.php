<?php

namespace App\Models;

use Caffeinated\Modules\Facades\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;

class WidgetManager extends Model
{

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
        'name',
        'slug',
        'namespace',
        'position',
        'group',
        'is_active',
    ];


    public static function validate($input) {
        $rules = array(
            'name'                          => 'required|string',
            'namespace'                     => 'required',
            'position'                      => 'required|numeric',
            'group'                         => 'required',
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



}