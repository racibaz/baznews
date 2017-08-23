<?php

namespace App\Models;

use App\Traits\Eventable;
use Caffeinated\Modules\Facades\Module;
use RecursiveArrayIterator;
use RecursiveIteratorIterator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class WidgetManager extends Model
{
    use Eventable;
    use SoftDeletes;

    public static $widgetGroups = [
        'header' => 'header',
        'side_bar' => 'side_bar',
        'center' => 'center',
        'right_bar' => 'right_bar',
        'footer' => 'footer',
        'fixed_footer' => 'fixed_footer',
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
        'module_name',
        'namespace',
        'group',
        'position',
        'is_active',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];


    public static function boot()
    {
        parent::boot();

        static::created(function () {
            Cache::tags('homePage')->flush();
        });

        static::updated(function () {
            Cache::tags('homePage')->flush();
        });

        static::deleted(function () {
            Cache::tags('homePage')->flush();
        });
    }


    public function widget_group()
    {
        return $this->belongsTo(WidgetGroup::class, 'widget_group_id');
    }

    public static function validate($input)
    {
        $rules = array(
            'name' => 'required|string',
            'namespace' => 'required',
            'position' => 'required|numeric',
        );
        return Validator::make($input, $rules);
    }

    public static function getAllWidgets()
    {
        return WidgetManager::where('is_active', 1)->orderBy('position', 'asc')->get();
    }

    public static function getEnableModuleWidgets()
    {
        $widgets = [];

        foreach (Module::all() as $module) {

            //module pasif ise widget bilgilerini almıyoruz.
            if (Module::isDisabled($module['slug'])) {
                continue;
            }

            //module's widgets.json file path
            $moduleWidgetsJsonFilePath = base_path('app/Modules/' . $module['basename'] . '/Widgets/widgets.json');

            $jsonFile = file_get_contents($moduleWidgetsJsonFilePath);

            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($jsonFile, true)),
                RecursiveIteratorIterator::SELF_FIRST);


            foreach ($jsonIterator as $key => $val) {
                if (is_array($val)) {
                    $widgetName = $key;
                } else {

                    $widgets[$widgetName][$key] = $val;
                }
            }
        }

        return $widgets;
    }

    public static function getWidgetInfo($widgetSlug)
    {
        $widget = [];

        //module un widgets.json file yolu
        $widgetsJsonFilePath = base_path('app/Widgets/widgets.json');

        $jsonFile = file_get_contents($widgetsJsonFilePath);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($jsonFile, true)),
            RecursiveIteratorIterator::SELF_FIRST);


        foreach ($jsonIterator as $key => $val) {
            if (is_array($val)) {
                $widgetName = $key;
                //echo "$key:\n";
            } else {

                if ($key === 'slug' && $val === $widgetSlug) {

                    foreach ($jsonIterator as $subKey => $subVal) {
                        if (is_array($subVal)) {
                            $currentWidgetName = $subKey;
                        }

                        /*Bir module de birden fazla widget var ise
                         *onun için yukarıda "slug" üzerinden eşleştirme yapmış olsak da tekrar kontrol ediyoruz.
                         * */
                        if ($widgetName === $currentWidgetName) {
                            $widget[$subKey] = $subVal;
                        }
                    }
                }
            }
        }

        //Eğer widget sistemin core unda tanımlanmış ise modüllere bakmıyor.
        if (count($widget) > 0)
            return $widget;


        foreach (Module::all() as $module) {
            //module pasif ise widget bilgilerini almıyoruz.
            if (Module::isDisabled($module['slug'])) {
                continue;
            }

            //module's widgets.json file path
            $moduleWidgetsJsonFilePath = base_path('app/Modules/' . $module['basename'] . '/Widgets/widgets.json');

            $jsonFile = file_get_contents($moduleWidgetsJsonFilePath);

            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($jsonFile, true)),
                RecursiveIteratorIterator::SELF_FIRST);


            foreach ($jsonIterator as $key => $val) {
                if (is_array($val)) {
                    $widgetName = $key;
                } else {

                    if ($key === 'slug' && $val === $widgetSlug) {

                        foreach ($jsonIterator as $subKey => $subVal) {
                            if (is_array($subVal)) {
                                $currentWidgetName = $subKey;
                            }

                            /*Bir module de birden fazla widget var ise
                             *onun için yukarıda "slug" üzerinden eşleştirme yapmış olsak da tekrar kontrol ediyoruz.
                             * */
                            if ($widgetName === $currentWidgetName) {
                                $widget[$subKey] = $subVal;
                            }
                        }
                    }
                }
            }
        }


        return $widget;
    }

    public static function getCoreWidgets()
    {
        $widgets = [];

        //module un widgets.json file yolu
        $widgetsJsonFilePath = base_path('app/Widgets/widgets.json');

        $jsonFile = file_get_contents($widgetsJsonFilePath);

        $jsonIterator = new RecursiveIteratorIterator(
            new RecursiveArrayIterator(json_decode($jsonFile, true)),
            RecursiveIteratorIterator::SELF_FIRST);


        /*Module widget larını listelerken module ismini dizileri ayrıştırmak için kullanıyoruz.
         * Burda ise module ismi olmadığı için widget in property ismini kullanmak için
         * "$val" değikeni dizi iken "$key" değişkeni json ın property ismi oluyor.
         * Bizde bu yönlenle hem "$key" in dizi oluğ olmadığını kontrol ediyoruz
         * hem de "$key" in property ismini alıyoruz.
         * */

        foreach ($jsonIterator as $key => $val) {
            if (is_array($val)) {
                $widgetName = $key;
                //echo "$key:\n";
            } else {
                $widgets[$widgetName][$key] = $val;
            }
        }

        return $widgets;
    }

}