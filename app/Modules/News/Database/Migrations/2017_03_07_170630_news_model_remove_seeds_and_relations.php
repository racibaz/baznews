<?php

use App\Models\Permission;
use App\Models\Setting;
use App\Models\WidgetGroup;
use App\Modules\News\Models\FutureNews;
use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use App\Modules\News\Models\NewsSetting;
use App\Modules\News\Models\NewsSource;
use App\Modules\News\Models\Photo;
use App\Modules\News\Models\PhotoCategory;
use App\Modules\News\Models\RecommendationNews;
use App\Modules\News\Models\RelatedNews;
use App\Modules\News\Models\Video;
use App\Modules\News\Models\VideoCategory;
use App\Modules\News\Models\VideoGallery;
use Illuminate\Database\Migrations\Migration;

class NewsModelRemoveSeedsAndRelations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->modelRemoveSeedAndRelations();

        $this->removeEventsTableItems();

        $this->removeTaggableTableItems();

        $this->removeLinksTableItems();
    }

    public function modelRemoveSeedAndRelations()
    {
        //setting
        if(!empty(Setting::where('attribute_key','break_news')->first()))
            Setting::where('attribute_key','break_news')->first()->delete();

        if(!empty(Setting::where('attribute_key','band_news')->first()))
            Setting::where('attribute_key','band_news')->first()->delete();

        if(!empty(Setting::where('attribute_key','box_cuff')->first()))
            Setting::where('attribute_key','box_cuff')->first()->delete();

        if(!empty(Setting::where('attribute_key','main_cuff')->first()))
            Setting::where('attribute_key','main_cuff')->first()->delete();

        if(!empty(Setting::where('attribute_key','mini_cuff')->first()))
            Setting::where('attribute_key','mini_cuff')->first()->delete();

        if(!empty(Setting::where('attribute_key','find_tags_in_content')->first()))
            Setting::where('attribute_key','find_tags_in_content')->first()->delete();

        if(!empty(Setting::where('attribute_key','automatic_add_tags')->first()))
            Setting::where('attribute_key','automatic_add_tags')->first()->delete();

        if(!empty(Setting::where('attribute_key','is_show_editor_profile_in_news')->first()))
            Setting::where('attribute_key','is_show_editor_profile_in_news')->first()->delete();

        if(!empty(Setting::where('attribute_key','is_show_previous_and_next_news')->first()))
            Setting::where('attribute_key','is_show_previous_and_next_news')->first()->delete();

        //widget_groups
        if(!empty(WidgetGroup::where('name','news_content_header')->first()))
            WidgetGroup::where('name','news_content_header')->first()->delete();

        if(!empty(WidgetGroup::where('name','news_content_side_bar')->first()))
            WidgetGroup::where('name','news_content_side_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','news_content_center')->first()))
            WidgetGroup::where('name','news_content_center')->first()->delete();

        if(!empty(WidgetGroup::where('name','news_content_right_bar')->first()))
            WidgetGroup::where('name','news_content_right_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','news_content_footer')->first()))
            WidgetGroup::where('name','news_content_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','news_content_fixed_footer')->first()))
            WidgetGroup::where('name','news_content_fixed_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_header')->first()))
            WidgetGroup::where('name','photo_content_header')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_side_bar')->first()))
            WidgetGroup::where('name','photo_content_side_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_center')->first()))
            WidgetGroup::where('name','photo_content_center')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_right_bar')->first()))
            WidgetGroup::where('name','photo_content_right_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_footer')->first()))
            WidgetGroup::where('name','photo_content_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','photo_content_fixed_footer')->first()))
            WidgetGroup::where('name','photo_content_fixed_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_header')->first()))
            WidgetGroup::where('name','video_content_header')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_side_bar')->first()))
            WidgetGroup::where('name','video_content_side_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_center')->first()))
            WidgetGroup::where('name','video_content_center')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_right_bar')->first()))
            WidgetGroup::where('name','video_content_right_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_footer')->first()))
            WidgetGroup::where('name','video_content_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','video_content_fixed_footer')->first()))
            WidgetGroup::where('name','video_content_fixed_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_header')->first()))
            WidgetGroup::where('name','archive_content_header')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_side_bar')->first()))
            WidgetGroup::where('name','archive_content_side_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_center')->first()))
            WidgetGroup::where('name','archive_content_center')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_right_bar')->first()))
            WidgetGroup::where('name','archive_content_right_bar')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_footer')->first()))
            WidgetGroup::where('name','archive_content_footer')->first()->delete();

        if(!empty(WidgetGroup::where('name','archive_content_fixed_footer')->first()))
            WidgetGroup::where('name','archive_content_fixed_footer')->first()->delete();


        //futurenews
        if(!empty(Permission::where('name','index-futurenews')->first()))
            Permission::where('name','index-futurenews')->first()->delete();

        if(!empty(Permission::where('name','create-futurenews')->first()))
            Permission::where('name','create-futurenews')->first()->delete();

        if(!empty(Permission::where('name','edit-futurenews')->first()))
            Permission::where('name','edit-futurenews')->first()->delete();

        if(!empty(Permission::where('name','destroy-futurenews')->first()))
            Permission::where('name','destroy-futurenews')->first()->delete();

        if(!empty(Permission::where('name','show-futurenews')->first()))
            Permission::where('name','show-futurenews')->first()->delete();

        if(!empty(Permission::where('name','update-futurenews')->first()))
            Permission::where('name','update-futurenews')->first()->delete();

        if(!empty(Permission::where('name','store-futurenews')->first()))
            Permission::where('name','store-futurenews')->first()->delete();

        //newscategory
        if(!empty(Permission::where('name','index-newscategory')->first()))
            Permission::where('name','index-newscategory')->first()->delete();

        if(!empty(Permission::where('name','create-newscategory')->first()))
            Permission::where('name','create-newscategory')->first()->delete();

        if(!empty(Permission::where('name','edit-newscategory')->first()))
            Permission::where('name','edit-newscategory')->first()->delete();

        if(!empty(Permission::where('name','destroy-newscategory')->first()))
            Permission::where('name','destroy-newscategory')->first()->delete();

        if(!empty(Permission::where('name','show-newscategory')->first()))
            Permission::where('name','show-newscategory')->first()->delete();

        if(!empty(Permission::where('name','update-newscategory')->first()))
            Permission::where('name','update-newscategory')->first()->delete();

        if(!empty(Permission::where('name','store-newscategory')->first()))
            Permission::where('name','store-newscategory')->first()->delete();

        //newssource
        if(!empty(Permission::where('name','index-newssource')->first()))
            Permission::where('name','index-newssource')->first()->delete();

        if(!empty(Permission::where('name','create-newssource')->first()))
            Permission::where('name','create-newssource')->first()->delete();

        if(!empty(Permission::where('name','edit-newssource')->first()))
            Permission::where('name','edit-newssource')->first()->delete();

        if(!empty(Permission::where('name','destroy-newssource')->first()))
            Permission::where('name','destroy-newssource')->first()->delete();

        if(!empty(Permission::where('name','show-newssource')->first()))
            Permission::where('name','show-newssource')->first()->delete();

        if(!empty(Permission::where('name','update-newssource')->first()))
            Permission::where('name','update-newssource')->first()->delete();

        if(!empty(Permission::where('name','store-newssource')->first()))
            Permission::where('name','store-newssource')->first()->delete();

        //news
        if(!empty(Permission::where('name','index-news')->first()))
            Permission::where('name','index-news')->first()->delete();

        if(!empty(Permission::where('name','create-news')->first()))
            Permission::where('name','create-news')->first()->delete();

        if(!empty(Permission::where('name','edit-news')->first()))
            Permission::where('name','edit-news')->first()->delete();

        if(!empty(Permission::where('name','destroy-news')->first()))
            Permission::where('name','destroy-news')->first()->delete();

        if(!empty(Permission::where('name','show-news')->first()))
            Permission::where('name','show-news')->first()->delete();

        if(!empty(Permission::where('name','update-news')->first()))
            Permission::where('name','update-news')->first()->delete();

        if(!empty(Permission::where('name','store-news')->first()))
            Permission::where('name','store-news')->first()->delete();

        if(!empty(Permission::where('name','toggleBooleanType-news')->first()))
            Permission::where('name','toggleBooleanType-news')->first()->delete();


        foreach (News::$statuses as $status){

            if(!empty(Permission::where('name',$status . '-news')->first()))
                Permission::where('name', $status . '-news')->first()->delete();
        };


        if(!empty(Permission::where('name','statusToggle-news')->first()))
            Permission::where('name','statusToggle-news')->first()->delete();

        if(!empty(Permission::where('name','showTrashedRecords-news')->first()))
            Permission::where('name','showTrashedRecords-news')->first()->delete();

        if(!empty(Permission::where('name','trashedNewsRestore-news')->first()))
            Permission::where('name','trashedNewsRestore-news')->first()->delete();

        if(!empty(Permission::where('name','historyForceDelete-news')->first()))
            Permission::where('name','historyForceDelete-news')->first()->delete();

        if(!empty(Permission::where('name','forgetCache-news')->first()))
            Permission::where('name','forgetCache-news')->first()->delete();

        //newswidgetmanager
        if(!empty(Permission::where('name','index-newswidgetmanager')->first()))
            Permission::where('name','index-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','create-newswidgetmanager')->first()))
            Permission::where('name','create-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','edit-newswidgetmanager')->first()))
            Permission::where('name','edit-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','destroy-newswidgetmanager')->first()))
            Permission::where('name','destroy-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','show-newswidgetmanager')->first()))
            Permission::where('name','show-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','update-newswidgetmanager')->first()))
            Permission::where('name','update-newswidgetmanager')->first()->delete();

        if(!empty(Permission::where('name','store-newswidgetmanager')->first()))
            Permission::where('name','store-newswidgetmanager')->first()->delete();

        //photocategory
        if(!empty(Permission::where('name','index-photocategory')->first()))
            Permission::where('name','index-photocategory')->first()->delete();

        if(!empty(Permission::where('name','create-photocategory')->first()))
            Permission::where('name','create-photocategory')->first()->delete();

        if(!empty(Permission::where('name','edit-photocategory')->first()))
            Permission::where('name','edit-photocategory')->first()->delete();

        if(!empty(Permission::where('name','destroy-photocategory')->first()))
            Permission::where('name','destroy-photocategory')->first()->delete();

        if(!empty(Permission::where('name','show-photocategory')->first()))
            Permission::where('name','show-photocategory')->first()->delete();

        if(!empty(Permission::where('name','update-photocategory')->first()))
            Permission::where('name','update-photocategory')->first()->delete();

        if(!empty(Permission::where('name','store-photocategory')->first()))
            Permission::where('name','store-photocategory')->first()->delete();

        //photogallery
        if(!empty(Permission::where('name','index-photogallery')->first()))
            Permission::where('name','index-photogallery')->first()->delete();

        if(!empty(Permission::where('name','create-photogallery')->first()))
            Permission::where('name','create-photogallery')->first()->delete();

        if(!empty(Permission::where('name','edit-photogallery')->first()))
            Permission::where('name','edit-photogallery')->first()->delete();

        if(!empty(Permission::where('name','destroy-photogallery')->first()))
            Permission::where('name','destroy-photogallery')->first()->delete();

        if(!empty(Permission::where('name','show-photogallery')->first()))
            Permission::where('name','show-photogallery')->first()->delete();

        if(!empty(Permission::where('name','update-photogallery')->first()))
            Permission::where('name','update-photogallery')->first()->delete();

        if(!empty(Permission::where('name','store-photogallery')->first()))
            Permission::where('name','store-photogallery')->first()->delete();

        if(!empty(Permission::where('name','addMultiPhotosView-photogallery')->first()))
            Permission::where('name','addMultiPhotosView-photogallery')->first()->delete();

        if(!empty(Permission::where('name','addMultiPhotos-photogallery')->first()))
            Permission::where('name','addMultiPhotos-photogallery')->first()->delete();

        if(!empty(Permission::where('name','updateGalleryPhotos-photogallery')->first()))
            Permission::where('name','updateGalleryPhotos-photogallery')->first()->delete();

        if(!empty(Permission::where('name','forgetCache-photogallery')->first()))
            Permission::where('name','forgetCache-photogallery')->first()->delete();

        //photo
        if(!empty(Permission::where('name','index-photo')->first()))
            Permission::where('name','index-photo')->first()->delete();

        if(!empty(Permission::where('name','create-photo')->first()))
            Permission::where('name','create-photo')->first()->delete();

        if(!empty(Permission::where('name','edit-photo')->first()))
            Permission::where('name','edit-photo')->first()->delete();

        if(!empty(Permission::where('name','destroy-photo')->first()))
            Permission::where('name','destroy-photo')->first()->delete();

        if(!empty(Permission::where('name','show-photo')->first()))
            Permission::where('name','show-photo')->first()->delete();

        if(!empty(Permission::where('name','update-photo')->first()))
            Permission::where('name','update-photo')->first()->delete();

        if(!empty(Permission::where('name','store-photo')->first()))
            Permission::where('name','store-photo')->first()->delete();

        //recommendationnews
        if(!empty(Permission::where('name','index-recommendationnews')->first()))
            Permission::where('name','index-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','create-recommendationnews')->first()))
            Permission::where('name','create-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','edit-recommendationnews')->first()))
            Permission::where('name','edit-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','destroy-recommendationnews')->first()))
            Permission::where('name','destroy-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','show-recommendationnews')->first()))
            Permission::where('name','show-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','update-recommendationnews')->first()))
            Permission::where('name','update-recommendationnews')->first()->delete();

        if(!empty(Permission::where('name','store-recommendationnews')->first()))
            Permission::where('name','store-recommendationnews')->first()->delete();

        //videocategory
        if(!empty(Permission::where('name','index-videocategory')->first()))
            Permission::where('name','index-videocategory')->first()->delete();

        if(!empty(Permission::where('name','create-videocategory')->first()))
            Permission::where('name','create-videocategory')->first()->delete();

        if(!empty(Permission::where('name','edit-videocategory')->first()))
            Permission::where('name','edit-videocategory')->first()->delete();

        if(!empty(Permission::where('name','destroy-videocategory')->first()))
            Permission::where('name','destroy-videocategory')->first()->delete();

        if(!empty(Permission::where('name','show-videocategory')->first()))
            Permission::where('name','show-videocategory')->first()->delete();

        if(!empty(Permission::where('name','update-videocategory')->first()))
            Permission::where('name','update-videocategory')->first()->delete();

        if(!empty(Permission::where('name','store-videocategory')->first()))
            Permission::where('name','store-videocategory')->first()->delete();

        //videogallery
        if(!empty(Permission::where('name','index-videogallery')->first()))
            Permission::where('name','index-videogallery')->first()->delete();

        if(!empty(Permission::where('name','create-videogallery')->first()))
            Permission::where('name','create-videogallery')->first()->delete();

        if(!empty(Permission::where('name','edit-videogallery')->first()))
            Permission::where('name','edit-videogallery')->first()->delete();

        if(!empty(Permission::where('name','destroy-videogallery')->first()))
            Permission::where('name','destroy-videogallery')->first()->delete();

        if(!empty(Permission::where('name','show-videogallery')->first()))
            Permission::where('name','show-videogallery')->first()->delete();

        if(!empty(Permission::where('name','update-videogallery')->first()))
            Permission::where('name','update-videogallery')->first()->delete();

        if(!empty(Permission::where('name','store-videogallery')->first()))
            Permission::where('name','store-videogallery')->first()->delete();

        if(!empty(Permission::where('name','addMultiVideosView-videogallery')->first()))
            Permission::where('name','addMultiVideosView-videogallery')->first()->delete();

        if(!empty(Permission::where('name','addMultiVideos-videogallery')->first()))
            Permission::where('name','addMultiVideos-videogallery')->first()->delete();

        if(!empty(Permission::where('name','updateGalleryVideos-videogallery')->first()))
            Permission::where('name','updateGalleryVideos-videogallery')->first()->delete();

        if(!empty(Permission::where('name','forgetCache-videogallery')->first()))
            Permission::where('name','forgetCache-videogallery')->first()->delete();

        //video
        if(!empty(Permission::where('name','index-video')->first()))
            Permission::where('name','index-video')->first()->delete();

        if(!empty(Permission::where('name','create-video')->first()))
            Permission::where('name','create-video')->first()->delete();

        if(!empty(Permission::where('name','edit-video')->first()))
            Permission::where('name','edit-video')->first()->delete();

        if(!empty(Permission::where('name','destroy-video')->first()))
            Permission::where('name','destroy-video')->first()->delete();

        if(!empty(Permission::where('name','show-video')->first()))
            Permission::where('name','show-video')->first()->delete();

        if(!empty(Permission::where('name','update-video')->first()))
            Permission::where('name','update-video')->first()->delete();

        if(!empty(Permission::where('name','store-video')->first()))
            Permission::where('name','store-video')->first()->delete();

        //newssetting
        if(!empty(Permission::where('name','index-newssetting')->first()))
            Permission::where('name','index-newssetting')->first()->delete();

        if(!empty(Permission::where('name','create-newssetting')->first()))
            Permission::where('name','create-newssetting')->first()->delete();

        if(!empty(Permission::where('name','edit-newssetting')->first()))
            Permission::where('name','edit-newssetting')->first()->delete();

        if(!empty(Permission::where('name','destroy-newssetting')->first()))
            Permission::where('name','destroy-newssetting')->first()->delete();

        if(!empty(Permission::where('name','show-newssetting')->first()))
            Permission::where('name','show-newssetting')->first()->delete();

        if(!empty(Permission::where('name','update-newssetting')->first()))
            Permission::where('name','update-newssetting')->first()->delete();

        if(!empty(Permission::where('name','store-newssetting')->first()))
            Permission::where('name','store-newssetting')->first()->delete();
    }

    public function removeEventsTableItems()
    {
        DB::table('events')->where('eventable_type', FutureNews::class)->delete();
        DB::table('events')->where('eventable_type', News::class)->delete();
        DB::table('events')->where('eventable_type', NewsCategory::class)->delete();
        DB::table('events')->where('eventable_type', NewsSetting::class)->delete();
        DB::table('events')->where('eventable_type', NewsSource::class)->delete();
        DB::table('events')->where('eventable_type', Photo::class)->delete();
        DB::table('events')->where('eventable_type', PhotoCategory::class)->delete();
        DB::table('events')->where('eventable_type', RecommendationNews::class)->delete();
        DB::table('events')->where('eventable_type', RelatedNews::class)->delete();
        DB::table('events')->where('eventable_type', Video::class)->delete();
        DB::table('events')->where('eventable_type', VideoCategory::class)->delete();
        DB::table('events')->where('eventable_type', VideoGallery::class)->delete();
    }

    public function removeTaggableTableItems()
    {
        DB::table('taggables')->where('taggable_type', FutureNews::class)->delete();
        DB::table('taggables')->where('taggable_type', News::class)->delete();
        DB::table('taggables')->where('taggable_type', NewsCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', NewsSetting::class)->delete();
        DB::table('taggables')->where('taggable_type', NewsSource::class)->delete();
        DB::table('taggables')->where('taggable_type', Photo::class)->delete();
        DB::table('taggables')->where('taggable_type', PhotoCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', RecommendationNews::class)->delete();
        DB::table('taggables')->where('taggable_type', RelatedNews::class)->delete();
        DB::table('taggables')->where('taggable_type', Video::class)->delete();
        DB::table('taggables')->where('taggable_type', VideoCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', VideoGallery::class)->delete();
    }

    public function removeLinksTableItems()
    {
        DB::table('links')->where('linkable_type', NewsCategory::class)->delete();
        DB::table('links')->where('linkable_type', PhotoCategory::class)->delete();
        DB::table('links')->where('linkable_type', VideoCategory::class)->delete();
    }
}
