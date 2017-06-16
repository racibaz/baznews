<?php

use App\Models\Permission;
use App\Models\Setting;
use App\Modules\Book\Models\BookAuthor;
use App\Modules\Book\Models\BookCategory;
use App\Modules\Book\Models\BookPublisher;
use App\Modules\Book\Models\BookSetting;
use Illuminate\Database\Migrations\Migration;

class BookModelRemoveSeedsAndRelations extends Migration
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

        $this->removeLinksTableItems();

        $this->removeSitemapsTableItems();

        $this->removeRssTableItems();
    }


    public function modelRemoveSeedAndRelations()
    {
        //setting
        if(!empty(Setting::where('attribute_key','book_count')->first()))
            Setting::where('attribute_key','book_count')->first()->delete();

        $settingRepo = new \App\Repositories\SettingRepository();
        $settingRepo->forgetCache();

        //book
        if(!empty(Permission::where('name','index-book')->first()))
            Permission::where('name','index-book')->first()->delete();

        if(!empty(Permission::where('name','create-book')->first()))
            Permission::where('name','create-book')->first()->delete();

        if(!empty(Permission::where('name','edit-book')->first()))
            Permission::where('name','edit-book')->first()->delete();

        if(!empty(Permission::where('name','destroy-book')->first()))
            Permission::where('name','destroy-book')->first()->delete();

        if(!empty(Permission::where('name','show-book')->first()))
            Permission::where('name','show-book')->first()->delete();

        if(!empty(Permission::where('name','update-book')->first()))
            Permission::where('name','update-book')->first()->delete();

        if(!empty(Permission::where('name','store-book')->first()))
            Permission::where('name','store-book')->first()->delete();


        //book_category
        if(!empty(Permission::where('name','index-bookcategory')->first()))
            Permission::where('name','index-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','create-bookcategory')->first()))
            Permission::where('name','create-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','edit-bookcategory')->first()))
            Permission::where('name','edit-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','destroy-bookcategory')->first()))
            Permission::where('name','destroy-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','show-bookcategory')->first()))
            Permission::where('name','show-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','update-bookcategory')->first()))
            Permission::where('name','update-bookcategory')->first()->delete();

        if(!empty(Permission::where('name','store-bookcategory')->first()))
            Permission::where('name','store-bookcategory')->first()->delete();

        //bookpublisher
        if(!empty(Permission::where('name','index-bookpublisher')->first()))
            Permission::where('name','index-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','create-bookpublisher')->first()))
            Permission::where('name','create-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','edit-bookpublisher')->first()))
            Permission::where('name','edit-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','destroy-bookpublisher')->first()))
            Permission::where('name','destroy-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','show-bookpublisher')->first()))
            Permission::where('name','show-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','update-bookpublisher')->first()))
            Permission::where('name','update-bookpublisher')->first()->delete();

        if(!empty(Permission::where('name','store-bookpublisher')->first()))
            Permission::where('name','store-bookpublisher')->first()->delete();

        //bookauthor
        if(!empty(Permission::where('name','index-bookauthor')->first()))
            Permission::where('name','index-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','create-bookauthor')->first()))
            Permission::where('name','create-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','edit-bookauthor')->first()))
            Permission::where('name','edit-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','destroy-bookauthor')->first()))
            Permission::where('name','destroy-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','show-bookauthor')->first()))
            Permission::where('name','show-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','update-bookauthor')->first()))
            Permission::where('name','update-bookauthor')->first()->delete();

        if(!empty(Permission::where('name','store-bookauthor')->first()))
            Permission::where('name','store-bookauthor')->first()->delete();

        //booksetting
        if(!empty(Permission::where('name','index-booksetting')->first()))
            Permission::where('name','index-booksetting')->first()->delete();

        if(!empty(Permission::where('name','create-booksetting')->first()))
            Permission::where('name','create-booksetting')->first()->delete();

        if(!empty(Permission::where('name','edit-booksetting')->first()))
            Permission::where('name','edit-booksetting')->first()->delete();

        if(!empty(Permission::where('name','destroy-booksetting')->first()))
            Permission::where('name','destroy-booksetting')->first()->delete();

        if(!empty(Permission::where('name','show-booksetting')->first()))
            Permission::where('name','show-booksetting')->first()->delete();

        if(!empty(Permission::where('name','update-booksetting')->first()))
            Permission::where('name','update-booksetting')->first()->delete();

        if(!empty(Permission::where('name','store-booksetting')->first()))
            Permission::where('name','store-booksetting')->first()->delete();

        $permissionRepo = new \App\Repositories\PermissionRepository();
        $permissionRepo->forgetCache();
    }

    public function removeEventsTableItems()
    {
        DB::table('events')->where('eventable_type', Book::class)->delete();
        DB::table('events')->where('eventable_type', BookAuthor::class)->delete();
        DB::table('events')->where('eventable_type', BookCategory::class)->delete();
        DB::table('events')->where('eventable_type', BookPublisher::class)->delete();
        DB::table('events')->where('eventable_type', BookSetting::class)->delete();

        $repo = new \App\Repositories\EventRepository();
        $repo->forgetCache();
    }


    public function removeTaggableTableItems()
    {
        DB::table('taggables')->where('taggable_type', Book::class)->delete();
        DB::table('taggables')->where('taggable_type', BookAuthor::class)->delete();
        DB::table('taggables')->where('taggable_type', BookCategory::class)->delete();
        DB::table('taggables')->where('taggable_type', BookPublisher::class)->delete();
        DB::table('taggables')->where('taggable_type', BookSetting::class)->delete();

        $repo = new \App\Repositories\TagRepository();
        $repo->forgetCache();
    }

    public function removeLinksTableItems()
    {
        DB::table('links')->where('linkable_type', BookCategory::class)->delete();
    }

    public function  removeSitemapsTableItems()
    {
        DB::table('sitemaps')
            ->where('url', 'books_sitemap')
            ->delete();
    }

    public function  removeRssTableItems()
    {
        DB::table('rss')
            ->where('url', 'rss/books')
            ->delete();
    }
}