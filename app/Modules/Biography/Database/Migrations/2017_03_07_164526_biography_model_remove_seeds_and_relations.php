<?php

use App\Models\Permission;
use App\Modules\Biography\Models\Biography;
use App\Modules\Biography\Models\BiographySetting;
use Illuminate\Database\Migrations\Migration;

class BiographyModelRemoveSeedsAndRelations extends Migration
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

        $this->removeSitemapsTableItems();

        $this->removeRssTableItems();
    }


    public function modelRemoveSeedAndRelations()
    {
        //biography
        if (!empty(Permission::where('name', 'index-biography')->first()))
            Permission::where('name', 'index-biography')->first()->delete();

        if (!empty(Permission::where('name', 'create-biography')->first()))
            Permission::where('name', 'create-biography')->first()->delete();

        if (!empty(Permission::where('name', 'edit-biography')->first()))
            Permission::where('name', 'edit-biography')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-biography')->first()))
            Permission::where('name', 'destroy-biography')->first()->delete();

        if (!empty(Permission::where('name', 'show-biography')->first()))
            Permission::where('name', 'show-biography')->first()->delete();

        if (!empty(Permission::where('name', 'update-biography')->first()))
            Permission::where('name', 'update-biography')->first()->delete();

        if (!empty(Permission::where('name', 'store-biography')->first()))
            Permission::where('name', 'store-biography')->first()->delete();

        foreach (Biography::$statuses as $status) {

            if (!empty(Permission::where('name', $status . '-biography')->first()))
                Permission::where('name', $status . '-biography')->first()->delete();
        };

        //biographysetting
        if (!empty(Permission::where('name', 'index-biographysetting')->first()))
            Permission::where('name', 'index-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'create-biographysetting')->first()))
            Permission::where('name', 'create-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'edit-biographysetting')->first()))
            Permission::where('name', 'edit-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'destroy-biographysetting')->first()))
            Permission::where('name', 'destroy-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'show-biographysetting')->first()))
            Permission::where('name', 'show-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'update-biographysetting')->first()))
            Permission::where('name', 'update-biographysetting')->first()->delete();

        if (!empty(Permission::where('name', 'store-biographysetting')->first()))
            Permission::where('name', 'store-biographysetting')->first()->delete();


        $permissionRepo = new \App\Repositories\PermissionRepository();
        $permissionRepo->forgetCache();

    }

    public function removeEventsTableItems()
    {
        DB::table('events')->where('eventable_type', Biography::class)->delete();
        DB::table('events')->where('eventable_type', BiographySetting::class)->delete();

        $repo = new \App\Repositories\EventRepository();
        $repo->forgetCache();
    }

    public function removeTaggableTableItems()
    {
        DB::table('taggables')->where('taggable_type', Biography::class)->delete();
        DB::table('taggables')->where('taggable_type', BiographySetting::class)->delete();

        $repo = new \App\Repositories\TagRepository();
        $repo->forgetCache();
    }

    public function removeSitemapsTableItems()
    {
        DB::table('sitemaps')
            ->where('url', 'biographies_sitemap')
            ->delete();
    }

    public function removeRssTableItems()
    {
        DB::table('rss')
            ->where('url', 'rss/biographies')
            ->delete();
    }
}


