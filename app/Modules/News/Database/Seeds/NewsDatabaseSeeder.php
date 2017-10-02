<?php

namespace App\Modules\News\Database\Seeds;

use App\Models\Menu;
use App\Models\Setting;
use App\Models\WidgetGroup;
use App\Modules\News\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NewsSourceTableSeeder::class);
        $this->call(NewsCategoriesTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(PhotoCategoriesTableSeeder::class);
        $this->call(PhotoGalleriesTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(VideoCategoriesTableSeeder::class);
        $this->call(VideoGalleriesTableSeeder::class);
        $this->call(VideosTableSeeder::class);
        $this->call(FutureNewsTableSeeder::class);
        $this->call(RecommendationNewsTableSeeder::class);
        $this->call(RelationsTableSeeder::class);
        $this->call(NewsWidgetManagerTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(SitemapsTableSeeder::class);
        $this->call(RssTableSeeder::class);
        $this->call(SearchListsTableSeeder::class);


        $setting = Setting::where('attribute_key', 'break_news')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'break_news',
                'attribute_value' => '5',
            ]);
        }

        $setting = Setting::where('attribute_key', 'band_news')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'band_news',
                'attribute_value' => '5',
            ]);
        }

        $setting = Setting::where('attribute_key', 'box_cuff')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'box_cuff',
                'attribute_value' => '20',
            ]);
        }

        $setting = Setting::where('attribute_key', 'main_cuff')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'main_cuff',
                'attribute_value' => '20',
            ]);
        }

        $setting = Setting::where('attribute_key', 'mini_cuff')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'mini_cuff',
                'attribute_value' => '10',
            ]);
        }

        $setting = Setting::where('attribute_key', 'find_tags_in_content')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'find_tags_in_content',
                'attribute_value' => "1",
                'is_active' => 1
            ]);
        }

        $setting = Setting::where('attribute_key', 'automatic_add_tags')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'automatic_add_tags',
                'attribute_value' => "1",
                'is_active' => 1
            ]);
        }

        $setting = Setting::where('attribute_key', 'is_show_editor_profile_in_news')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'is_show_editor_profile_in_news',
                'attribute_value' => "1",
                'is_active' => 1
            ]);
        }

        $setting = Setting::where('attribute_key', 'is_show_previous_and_next_news')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'is_show_previous_and_next_news',
                'attribute_value' => "1",
                'is_active' => 1
            ]);
        }


        $setting = Setting::where('attribute_key', 'is_url_shortener')->first();
        if (empty($setting)) {
            Setting::create([
                'attribute_key' => 'is_url_shortener',
                'attribute_value' => "1",
                'is_active' => 1
            ]);
        }


        $widget_group = WidgetGroup::where('name', 'news_content_header')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_header',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'news_content_side_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_side_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'news_content_center')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_center',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'news_content_right_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_right_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'news_content_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'news_content_fixed_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'news_content_fixed_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_header')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_header',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_header')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_header',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_side_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_side_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_center')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_center',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_right_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_right_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'photo_content_fixed_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'photo_content_fixed_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_header')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_header',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_side_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_side_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_center')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_center',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_right_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_right_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'video_content_fixed_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'video_content_fixed_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_header')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_header',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_side_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_side_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_center')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_center',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_right_bar')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_right_bar',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_footer',
                'is_active' => 1
            ]);
        }

        $widget_group = WidgetGroup::where('name', 'archive_content_fixed_footer')->first();
        if (empty($widget_group)) {
            WidgetGroup::create([
                'name' => 'archive_content_fixed_footer',
                'is_active' => 1
            ]);
        }


        foreach (NewsCategory::all()->take(6) as $item) {

            Menu::create([
                'parent_id' => null,
                '_lft' => 1,
                '_rgt' => 1,
                'name' => $item->name,
                'slug' => $item->slug,
                'route' => 'news-category/' . $item->slug,
                'order' => 10,
                'is_header' => 1,
                'is_footer' => 1,
                'is_active' => 1,
            ]);
        }
    }
}
