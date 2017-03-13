<?php

use App\Models\Permission;
use App\Models\Setting;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Models\ArticleSetting;
use Illuminate\Database\Migrations\Migration;

class ArticleModelRemoveSeedsAndRelations extends Migration
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
        if(!empty(Setting::where('attribute_key','article_count')->first()))
            Setting::where('attribute_key','article_count')->first()->delete();

        if(!empty(Setting::where('attribute_key','article_author_count')->first()))
            Setting::where('attribute_key','article_author_count')->first()->delete();

        if(!empty(Setting::where('attribute_key','recent_article_widget_list_count')->first()))
            Setting::where('attribute_key','recent_article_widget_list_count')->first()->delete();

        if(!empty(Setting::where('attribute_key','article_authors_widget_list_count')->first()))
            Setting::where('attribute_key','article_authors_widget_list_count')->first()->delete();

        if(!empty(Setting::where('attribute_key','article_count')->first()))
            Setting::where('attribute_key','article_count')->first()->delete();

        if(!empty(Setting::where('attribute_key','article_count')->first()))
            Setting::where('attribute_key','article_count')->first()->delete();

        //article
        if(!empty(Permission::where('name','index-article')->first()))
            Permission::where('name','index-article')->first()->delete();

        if(!empty(Permission::where('name','create-article')->first()))
            Permission::where('name','create-article')->first()->delete();

        if(!empty(Permission::where('name','edit-article')->first()))
            Permission::where('name','edit-article')->first()->delete();

        if(!empty(Permission::where('name','destroy-article')->first()))
            Permission::where('name','destroy-article')->first()->delete();

        if(!empty(Permission::where('name','show-article')->first()))
            Permission::where('name','show-article')->first()->delete();

        if(!empty(Permission::where('name','update-article')->first()))
            Permission::where('name','update-article')->first()->delete();

        if(!empty(Permission::where('name','store-article')->first()))
            Permission::where('name','store-article')->first()->delete();

        if(!empty(Permission::where('name','Passive-article')->first()))
            Permission::where('name','Passive-article')->first()->delete();

        if(!empty(Permission::where('name','Active-article')->first()))
            Permission::where('name','Active-article')->first()->delete();

        if(!empty(Permission::where('name','Draft-article')->first()))
            Permission::where('name','Draft-article')->first()->delete();

        if(!empty(Permission::where('name','Preparing-article')->first()))
            Permission::where('name','Preparing-article')->first()->delete();

        if(!empty(Permission::where('name','On Air-article')->first()))
            Permission::where('name','On Air-article')->first()->delete();

        if(!empty(Permission::where('name','Preparing-article')->first()))
            Permission::where('name','Preparing-article')->first()->delete();

        if(!empty(Permission::where('name','Pending for Editor Approval-article')->first()))
            Permission::where('name','Pending for Editor Approval-article')->first()->delete();

        if(!empty(Permission::where('name','Garbage-article')->first()))
            Permission::where('name','Garbage-article')->first()->delete();

        //articleauthor
        if(!empty(Permission::where('name','index-articleauthor')->first()))
            Permission::where('name','index-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','create-articleauthor')->first()))
            Permission::where('name','create-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','edit-articleauthor')->first()))
            Permission::where('name','edit-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','destroy-articleauthor')->first()))
            Permission::where('name','destroy-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','show-articleauthor')->first()))
            Permission::where('name','show-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','update-articleauthor')->first()))
            Permission::where('name','update-articleauthor')->first()->delete();

        if(!empty(Permission::where('name','store-articleauthor')->first()))
            Permission::where('name','store-articleauthor')->first()->delete();

        //articlecategory
        if(!empty(Permission::where('name','index-articlecategory')->first()))
            Permission::where('name','index-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','create-articlecategory')->first()))
            Permission::where('name','create-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','edit-articlecategory')->first()))
            Permission::where('name','edit-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','destroy-articlecategory')->first()))
            Permission::where('name','destroy-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','show-articlecategory')->first()))
            Permission::where('name','show-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','update-articlecategory')->first()))
            Permission::where('name','update-articlecategory')->first()->delete();

        if(!empty(Permission::where('name','store-articlecategory')->first()))
            Permission::where('name','store-articlecategory')->first()->delete();

        //articlesetting
        if(!empty(Permission::where('name','index-articlesetting')->first()))
            Permission::where('name','index-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','create-articlesetting')->first()))
            Permission::where('name','create-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','edit-articlesetting')->first()))
            Permission::where('name','edit-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','destroy-articlesetting')->first()))
            Permission::where('name','destroy-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','show-articlesetting')->first()))
            Permission::where('name','show-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','update-articlesetting')->first()))
            Permission::where('name','update-articlesetting')->first()->delete();

        if(!empty(Permission::where('name','store-articlesetting')->first()))
            Permission::where('name','store-articlesetting')->first()->delete();
    }


    public function removeEventsTableItems()
    {
        DB::table('events')->where('eventable_type', Article::class)->delete();
        DB::table('events')->where('eventable_type', ArticleAuthor::class)->delete();
        DB::table('events')->where('eventable_type', ArticleCategory::class)->delete();
        DB::table('events')->where('eventable_type', ArticleSetting::class)->delete();
    }

    public function removeTaggableTableItems()
    {
        DB::table('taggables')->where('taggable_type', Article::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleAuthor::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleSetting::class)->delete();
    }


    public function removeLinksTableItems()
    {
        DB::table('links')->where('linkable_type', ArticleCategory::class)->delete();
    }
}
