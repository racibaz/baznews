<?php

use App\Models\Permission;
use App\Models\Setting;
use App\Modules\Article\Models\Article;
use App\Modules\Article\Models\ArticleAuthor;
use App\Modules\Article\Models\ArticleCategory;
use App\Modules\Article\Models\ArticleSetting;
use App\Repositories\SettingRepository;
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
     * Reverse the model data.
     *
     * @return void
     */
    public function down()
    {
        $this->modelRemoveSeedAndRelations();

        $this->removeEventsTableItems();

        $this->removeTaggableTableItems();

        $this->removeLinksTableItems();

        $this->removeSitemapsTableItems();

        $this->removeRssTableItems();

        $this->removeSearchListItems();
    }

    public function modelRemoveSeedAndRelations()
    {
        //setting
        if (!empty(Setting::where('attribute_key', 'article_count')->first()))
            Setting::where('attribute_key', 'article_count')->first()->delete();

        if (!empty(Setting::where('attribute_key', 'article_author_count')->first()))
            Setting::where('attribute_key', 'article_author_count')->first()->delete();

        if (!empty(Setting::where('attribute_key', 'recent_article_widget_list_count')->first()))
            Setting::where('attribute_key', 'recent_article_widget_list_count')->first()->delete();

        if (!empty(Setting::where('attribute_key', 'article_authors_widget_list_count')->first()))
            Setting::where('attribute_key', 'article_authors_widget_list_count')->first()->delete();

        if (!empty(Setting::where('attribute_key', 'article_count')->first()))
            Setting::where('attribute_key', 'article_count')->first()->delete();

        if (!empty(Setting::where('attribute_key', 'article_count')->first()))
            Setting::where('attribute_key', 'article_count')->first()->delete();

        $settingRepo = new SettingRepository();
        $settingRepo->forgetCache();

        //article
        if (!empty(Permission::where('name', 'index-article')->first()))
            Permission::where('name', 'index-article')->first()->delete();

        if (!empty(Permission::where('name', 'create-article')->first()))
            Permission::where('name', 'create-article')->first()->delete();

        if (!empty(Permission::where('name', 'edit-article')->first()))
            Permission::where('name', 'edit-article')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-article')->first()))
            Permission::where('name', 'destroy-article')->first()->delete();

        if (!empty(Permission::where('name', 'show-article')->first()))
            Permission::where('name', 'show-article')->first()->delete();

        if (!empty(Permission::where('name', 'update-article')->first()))
            Permission::where('name', 'update-article')->first()->delete();

        if (!empty(Permission::where('name', 'store-article')->first()))
            Permission::where('name', 'store-article')->first()->delete();

        foreach (Article::$statuses as $status) {

            if (!empty(Permission::where('name', $status . '-article')->first()))
                Permission::where('name', $status . '-article')->first()->delete();
        };

        //articleauthor
        if (!empty(Permission::where('name', 'index-articleauthor')->first()))
            Permission::where('name', 'index-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'create-articleauthor')->first()))
            Permission::where('name', 'create-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'edit-articleauthor')->first()))
            Permission::where('name', 'edit-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-articleauthor')->first()))
            Permission::where('name', 'destroy-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'show-articleauthor')->first()))
            Permission::where('name', 'show-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'update-articleauthor')->first()))
            Permission::where('name', 'update-articleauthor')->first()->delete();

        if (!empty(Permission::where('name', 'store-articleauthor')->first()))
            Permission::where('name', 'store-articleauthor')->first()->delete();

        //articlecategory
        if (!empty(Permission::where('name', 'index-articlecategory')->first()))
            Permission::where('name', 'index-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'create-articlecategory')->first()))
            Permission::where('name', 'create-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'edit-articlecategory')->first()))
            Permission::where('name', 'edit-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-articlecategory')->first()))
            Permission::where('name', 'destroy-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'show-articlecategory')->first()))
            Permission::where('name', 'show-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'update-articlecategory')->first()))
            Permission::where('name', 'update-articlecategory')->first()->delete();

        if (!empty(Permission::where('name', 'store-articlecategory')->first()))
            Permission::where('name', 'store-articlecategory')->first()->delete();

        //articlesetting
        if (!empty(Permission::where('name', 'index-articlesetting')->first()))
            Permission::where('name', 'index-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'create-articlesetting')->first()))
            Permission::where('name', 'create-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'edit-articlesetting')->first()))
            Permission::where('name', 'edit-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-articlesetting')->first()))
            Permission::where('name', 'destroy-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'show-articlesetting')->first()))
            Permission::where('name', 'show-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'update-articlesetting')->first()))
            Permission::where('name', 'update-articlesetting')->first()->delete();

        if (!empty(Permission::where('name', 'store-articlesetting')->first()))
            Permission::where('name', 'store-articlesetting')->first()->delete();


        $permissionRepo = new \App\Repositories\PermissionRepository();
        $permissionRepo->forgetCache();
    }

    public function removeEventsTableItems()
    {
        DB::table('events')->where('eventable_type', Article::class)->delete();
        DB::table('events')->where('eventable_type', ArticleAuthor::class)->delete();
        DB::table('events')->where('eventable_type', ArticleCategory::class)->delete();
        DB::table('events')->where('eventable_type', ArticleSetting::class)->delete();

        $repo = new \App\Repositories\EventRepository();
        $repo->forgetCache();
    }

    public function removeTaggableTableItems()
    {
        DB::table('taggables')->where('taggable_type', Article::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleAuthor::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', ArticleSetting::class)->delete();

        $repo = new \App\Repositories\TagRepository();
        $repo->forgetCache();
    }

    public function removeLinksTableItems()
    {
        DB::table('links')->where('linkable_type', ArticleCategory::class)->delete();
    }

    public function removeSitemapsTableItems()
    {
        DB::table('sitemaps')
            ->where('url', 'articles_sitemap')
            ->delete();
    }

    public function removeRssTableItems()
    {
        DB::table('rss')
            ->where('url', 'rss/articles')
            ->delete();
    }

    public function removeSearchListItems()
    {
        DB::table('search_lists')
            ->where('class_path', Article::class)
            ->delete();
    }
}
