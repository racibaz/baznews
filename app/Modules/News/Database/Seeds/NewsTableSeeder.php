<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\News;
use App\Modules\News\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news1 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_source_id'                  => 1,
            'title'                             => 'İlk Haber 1',
            'small_title'                       => 'İlk Haber 1',
            'slug'                              => 'ilk_haber-1',
            'spot'                              => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content'                           => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'cuff_photo'                        => '1.jpg',
            'thumbnail'                         => '1.jpg',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'break_news'                        => 1,
            'is_comment'                        => 1,
            'is_show_editor_profile'            => 1,
            'is_show_previous_and_next_news'    => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                          => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news2 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_source_id'                  => 1,
            'title'                             => 'İkinci Haber 2',
            'small_title'                       => 'İkinci Haber 2',
            'slug'                              => 'ikinci_haber-2',
            'spot'                              => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content'                           => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'cuff_photo'                        => '2.jpg',
            'thumbnail'                         => '2.jpg',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'is_comment'                        => 1,
            'is_show_editor_profile'            => 1,
            'is_show_previous_and_next_news'    => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                          => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news3 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_source_id'                  => 1,
            'title'                             => 'Üç Haber 3',
            'small_title'                       => 'Üç Haber 3',
            'slug'                              => 'Üç_haber-3',
            'spot'                              => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content'                           => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'cuff_photo'                        => '3.jpg',
            'thumbnail'                         => '3.jpg',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'is_comment'                        => 1,
            'is_show_editor_profile'            => 1,
            'is_show_previous_and_next_news'    => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                          => 'koordinatlar',
            'is_active'                         => 1
        ]);

        $news4 = News::create([
            'user_id'                           => 1,
            'country_id'                        => 1,
            'city_id'                           => 1,
            'news_source_id'                  => 1,
            'title'                             => 'Dört Haber 4',
            'small_title'                       => 'Dört Haber 4',
            'slug'                              => 'Dört_haber-4',
            'spot'                              => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content'                           => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description'                       => 'tanım',
            'keywords'                          => 'anahtar kelimler',
            'meta_tags'                         => 'meta lar',
            'cuff_photo'                        => '4.jpg',
            'thumbnail'                         => '4.jpg',
            'hit'                               => 1,
            'status'                            => 1,
            'band_news'                         => 1,
            'box_cuff'                          => 1,
            'is_cuff'                           => 1,
            'is_comment'                        => 1,
            'is_show_editor_profile'            => 1,
            'is_show_previous_and_next_news'    => 1,
            'main_cuff'                         => 1,
            'mini_cuff'                         => 1,
            'map_text'                               => 'koordinatlar',
            'is_active'                         => 1
        ]);


        $newsCategory1 = NewsCategory::find(1)->first();
        $newsCategory2 = NewsCategory::find(2)->first();
        $newsCategory3 = NewsCategory::find(3)->first();
        $newsCategory4 = NewsCategory::find(4)->first();
        $newsCategory5 = NewsCategory::find(5)->first();
        $newsCategory6 = NewsCategory::find(6)->first();
        $newsCategory7 = NewsCategory::find(7)->first();


        $news1->news_categories()->attach($newsCategory1);
//        $news1->news_categories()->attach($newsCategory2);
//        $news1->news_categories()->attach($newsCategory3);
//        $news1->news_categories()->attach($newsCategory4);
//        $news1->news_categories()->attach($newsCategory5);
//        $news1->news_categories()->attach($newsCategory6);
//        $news1->news_categories()->attach($newsCategory7);

        $news2->news_categories()->attach($newsCategory2);
//        $news2->news_categories()->attach($newsCategory2);
//        $news2->news_categories()->attach($newsCategory3);
//        $news2->news_categories()->attach($newsCategory4);
//        $news2->news_categories()->attach($newsCategory5);
//        $news2->news_categories()->attach($newsCategory6);

        $news3->news_categories()->attach($newsCategory3);
//        $news3->news_categories()->attach($newsCategory2);
//        $news3->news_categories()->attach($newsCategory3);
//        $news3->news_categories()->attach($newsCategory4);
        $news3->news_categories()->attach($newsCategory4);

        $news4->news_categories()->attach($newsCategory5);
    }
}