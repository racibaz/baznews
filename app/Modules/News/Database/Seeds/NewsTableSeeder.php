<?php

namespace App\Modules\News\Database\Seeds;

use App\Modules\News\Models\News;
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
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 1,
            'title' => 'İlk Haber 1',
            'small_title' => 'İlk Haber 1',
            'slug' => 'ilk_haber-1',
            'spot' => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content' => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '1.jpg',
            'thumbnail' => '1.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'break_news' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);

        $news2 = News::create([
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 1,
            'title' => 'İkinci Haber 2',
            'small_title' => 'İkinci Haber 2',
            'slug' => 'ikinci_haber-2',
            'spot' => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content' => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '2.jpg',
            'thumbnail' => '2.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);

        $news3 = News::create([
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 1,
            'title' => 'Üç Haber 3',
            'small_title' => 'Üç Haber 3',
            'slug' => 'Üç_haber-3',
            'spot' => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content' => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '3.jpg',
            'thumbnail' => '3.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);

        $news4 = News::create([
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 1,
            'title' => 'Dört Haber 4',
            'small_title' => 'Dört Haber 4',
            'slug' => 'Dört_haber-4',
            'spot' => 'Spicy jalapeno bacon ipsum dolor amet pork salami shankle meatloaf. Venison pancetta cupim shankle strip steak capicola biltong t-bone pork pork belly cow ground round hamburger short loin.',
            'content' => 'Spicy jalapeno bacon ipsum dolor amet salami pastrami beef pork chop shankle shoulder, ball tip hamburger spare ribs pork loin turkey cow. Salami chicken ham hock drumstick tenderloin, shank jerky tongue beef ribs. Meatball short ribs jowl, prosciutto picanha sausage drumstick andouille ribeye bacon bresaola flank short loin tail. Andouille chicken cow shoulder swine. Meatloaf jowl pancetta, brisket beef ribs turkey chicken pork belly. Beef ribs sirloin spare ribs cupim cow kevin turkey. Sirloin bresaola short loin hamburger turkey brisket jerky.

Doner picanha landjaeger pancetta shoulder turducken, ribeye t-bone leberkas pastrami tail corned beef. Picanha swine t-bone ham hock, pork shank burgdoggen tongue strip steak rump chuck pork belly frankfurter. Pastrami frankfurter alcatra, strip steak shankle ham cupim sirloin pig picanha chicken tail kielbasa. Rump short loin pancetta, beef ribs pork loin chicken drumstick pork chop t-bone fatback spare ribs pastrami. Turducken filet mignon spare ribs pig pastrami burgdoggen. Pig cow ball tip flank, landjaeger ground round shank corned beef prosciutto.

Salami t-bone andouille burgdoggen turducken brisket ribeye tri-tip porchetta hamburger capicola flank pig. Picanha shank pig pork belly shoulder tenderloin, t-bone kielbasa chuck brisket pork hamburger. Corned beef capicola brisket, prosciutto tail swine cupim porchetta turkey ribeye turducken. Bresaola picanha burgdoggen, meatloaf beef ribs fatback shoulder.

Ham hock frankfurter shank cow pork loin sirloin turducken jowl leberkas. Frankfurter cupim pork, rump ham hock doner ham short ribs tail pork belly strip steak. Rump pork chop strip steak, alcatra tail burgdoggen meatball hamburger. Burgdoggen pork bresaola prosciutto, brisket ham hock biltong tri-tip pork belly chuck pancetta. Kevin frankfurter andouille drumstick flank, ham ribeye prosciutto boudin porchetta. Hamburger bresaola bacon kevin.

Prosciutto sirloin pork belly drumstick t-bone, filet mignon landjaeger porchetta rump frankfurter picanha. Jerky salami capicola, chuck ribeye rump hamburger tenderloin beef pork turkey tongue spare ribs corned beef. Pork loin chicken burgdoggen jerky, tri-tip tenderloin beef. Salami porchetta cupim turkey, strip steak tongue brisket bresaola short ribs. Cow pastrami tri-tip, hamburger pork loin capicola beef ribs. Bresaola leberkas kielbasa, jerky short loin pork chop salami t-bone.
Does your lorem ipsum text long for something a little meatier? Give our generator a try… it’s tasty!',
            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '4.jpg',
            'thumbnail' => '4.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);


        $news5 = News::create([
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 5,
            'title' => 'İnsanlığın Çocuğu: Miguel de Cervantes Saavedra 5',
            'small_title' => 'İnsanlığın Çocuğu: Miguel de Cervantes Saavedra 5',
            'slug' => 'insanligin-cocugu-miguel-de-cervantes-saavedra-5',
            'spot' => 'Günümün büyük çoğunluğunu romancı, şair ve oyun yazarı Cervantes’i düşünerek geçiriyorum. Bu, yalnızlığıyla yarışacak kimsenin bulunmadığı adamı düşünüyorum. Kendisiye/acılarıyla alay edecek boyuta varma erdemine ulaşmış insanla günümü geçirmek istiyorum. O inandığı değerlerinin karşısında sadık bir mürit gibidir.',
            'content' => 'Yapıtı Don Kişot’ta salt aşkı değil kusursuz dostluğu da idealize etmiştir. Belleğinde yaşattığı aşkın kutsallığına erişmek için bir metrese gerek duymuyordu. Kendisini şövalye sanan Don Kişot, her şövalyenin bir sevgilisinin olması gerektiğini düşüyor. Sıradan, şişman bir köylü kızı olan Aldonzo’ya Dulcinea del Toboso takma adını verir ve sevgilisi yapar kendisine. Onu soylu bir ailenin güzel kızı olarak düşünüyor. Yanına kendi köyünde yaşayan Sancho Panza’yı seyisi olarak alır ve yola koyulur.  Karşısına çıkan hanın sahibine kendisini şövalye olarak ilan ettiriyor. Öyle ki yel değirmenlerini dev sanıyor ve üzerine yürüyor. Onun insan yanının yapıtlarına yansıyan en büyük özelliği tüm duyguları kendisiyle eşitlemiş olmasıdır. Yalnız yeldeğirmenlerinin peşine düşmesinin bir diğer nedeni de kendi ayarında bir dost bulamamış olmasıdır. Serüvenci ruhuyla şövalye yürekli bu dostumun başına neler gelmiyor ki… O günün kederle el ele verip parçaladığı kalbini geceleri onarıyor. Sabahları ise kendi külünden doğan bir Anka kuşudur.  O yüzden yel değirmenine karşı savaş açacak gücü kendisinde görüyor. Endişeli bir ruha sahip olması onu içten içe yiyip tüketiyor. Onun hakkında okuduklarımı yolda yürürken hatırlamaya başlıyorum. 29 Eylül 1547 tarihinde Alcalá de Henares, İspanya’da doğan ve 22 Nisan 1616 (68 yaşında) Madrid, İspanya’da ölen Miguel de Cervantes Saavedra’nın yol arkadaşım olmasını yürekten istiyorum. Endülüslü bir anneden doğma ailesi Galice’dengelme. Kendisi de Kelt ırkından sayılıyor. Batı edebiyatının klasikleri arasındaki yerini alan Modern Avrupa’nın ilk romanı olarak kabul edilen yazdığı magnum opusu Don Kişot  bugüne kadar yazılmış en iyi kurgusal eserlerden biri sayılıyor.Onun yapıtlarına yansıyan insan yanını bir başka mercek altında incelemek istiyorum. Genç yaşında yazmaya başladığı denemeleri ve tiyatro eserleriyle kısa bir süre sonra edebiyat çevresinde adını duyuruyor. Bugün bile İspanyol edebiyatında roman geleneğinin başlatıcısı olarak kabul ediliyor. İşlenen bir suç ad benzerliğinden dolayı kendisine malolunca İtalya’dan ayrılıyor. Yaşadığı bir dizi serüvenden dolayı Osmanlılar tarafından tutsak edilen Cervantes, 1575-1580 yılları arasında da Cezayir‘de esir olarak yaşıyor.Birçok yaralanma tehlikesi geçiren Cervantes bir top güllesiyle yazık ki sol elini kaybediyor. Birçok kez kaçmaya teşebbüs ediyor ama başarılı olamıyor. Hapse atılınca da hapiste kendisini tamamen edebiyata adıyor. En büyük yapıtı olan Don Quijote (Don Kişot)’u kaleme alıyor. Bu eseri sayesinde tüm dünyada da tanınıyor. Bu yapıtında kendi hayatıyla alay ettiği, özellikle de yapıttaki kahramanların hayatlarıyla kendi hayatı arasında birçok benzerlik görüldüğü anlaşılıyor. Don Kişot dünyanın en çok okunan eserlerinden biridir ve 38 dile çevrilmiştir. Bu eser hâlâ dünyanın en çok okunan romanları arasındaki yerini koruyor. Don Kişot bir çocuk gibi her şeye inanır. Yeryüzünde yaşayan insanlar arasında en safıdır o. Dünyada var olan hiçbir çirkinlik ona bulaşmaz. Dünyadaki tüm insanlar onun gibi saftırlar. Kişiliğinin en belirgin özelliği umuda sımsıkı sarılmasıdır. Onun cennetinde herkese yer vardır. Her tür çiçeğin açtığı bir cennettir. Cennetine girmek isteyenlerinin de girmeme hakkı vardır. Israrı ve baskıyı sevmemektir. Öyle ki kendi cennetinde kendisi dışarıda kalabilir. Adalet tüm haksızlıkların temelidir. Polislik mesleğinin kendisine verilmesini ister. Prensler ve çağın büyükleri pekâlâ iyilikseverlikle yanında yer alabilirler. Don Kişot; cennetinde yaptığı düzenlenmelerle Tanrı’yı da üzülmekten koruyacaktır. İyi niyetli insanları bir araya getirerek barışı sağlayacağını düşünen kahramanımız bilgelik düzeyinde bir bilgi birikimine sahiptir. O kadar namuslu olmasaydı kesinlikle bilgin olurdu. İnsanlara birşeyler öğretmesini sevmez. Öğretecek olsa dahi büyük bir mütevazılıkla yapar. Gereğinden fazla okuyan kahramanınız okuduklarının oluşturduğu iksiri insanlara dağıtıyor. Onun için başarının hiçbir önemi yoktur; zira o edebi başarıya gönül vermiştir. Don Kişot, soylu atının üzerinde bir masal kahramanıdır. Onda olan inanç, haşmet ve ihtişam kimsede yoktur. Girdiği her savaştan yenik çıkan, bu savaşların soylu beceriksizi duygu dünyasıyla insanı kendisine hayran bırakıyor. “İşte size, barbarlara karşı, İsa uğruna yapılan savaşta bir kolunu kaybeden Lepant’ın askeri. Kralların zalimliklerine, evdeki sefalete en önemlisi de  aile hayatının tüm saçmalığını ortadan kaldırmış olursunuz. Böylece edebiyat çevreleri,  kutsal papazlar tarikatının ifşa etmiş oldu. (…) Artık sizi Don Kişot ve Cervantes’ten ayrı tutmuyorum.” Onun kişiliğinin bir diğer özelliği de coşkulu olmasıdır. Adalete karşı özel bir bağlılığı vardır; zira mutlak bir duygunun içindeki coşkuyu arıyor. Güzelliklerle dolu bir dünya özlemi vardır ve bu özleminde de oldukça samimidir. İlahi adaleti yeryüzünden tecelli etme görevini kendisi kendine vermiştir. Onun bilgeliği süvari atına kılıcıyla binmesi değil; cehennem Tanrılarının yeryüzünün bütün güçlerinden daha güçlü olduğunu farkına varmasıdır. Dürüstlüğü hukuk ve adalet kavramından daha önemli buluyor; çünkü dürüstlüğün olduğu yerde hukuk da adalet de yerli yerine oturacaktır. Hakkı söylemek başka şu haklıya hakkını vermek başka şeydir. Kahramanımız haklıya hakkını dağıtan bir tasavvuf dervişi gibidir. Hiçbir sıkıntı onun iyilikseverliğinietkilemez. Onda inanç ve cesaretin verdiği yücelik vardır. Söz konusu cesaret olduğunda akıl devre dışı kalıyor. O yaratıyor ve yarattığı insanları fethediyor. Yazarın yazın dehası da tam da burada devreye giriyor. Kendini insanlığı kurtarmaya adamış bu insan insanlığın soytarısı oluyor. İnsan ilişkisini daha derinden sorguladığı için ezik insan psikolojisini ortaya koyuyor. Yoksulların birbirleriyle olan savaşlarının zenginlerin birbirlerine olan savaşları aratmadığını tüm çıplaklığıyla sergiliyor. İnsanlık için ne kadar soylu da olsa düşünceleri iradeleri elinden alınmış insanların soytarısı olmaktan öteye gidemiyor. Aslıda burjuvanın soytarıları olduklarını farkına varamayan bir grup insanın içine düştüğü iç acıtıcı durumu sergiliyor yazar. Durum böyle olunca kahramanımızda  trajikomik acıların  kralıdır süvarisi değil.


Ben bunları düşünerek yolda yürürken yanıma yaklaşan adamı fark ettim. Direkt kendini tanıtarak benim yol arkadaşım olmak istediğini söyledi. Tarif edilmez bir mutlulukla, heyecanla sarsıldı ruhum.  Bir süre öylesine yürüdük ikimizde. Ben onun yüzüne yansıyan duyguları seyrediyordum o ise ruhumun derinliklerini gözlerimde görüyordu. Yakınlık ya da uzaklık ikimizin birbirimize duyumsadığı duygu sarmalı içinde yok olmuştu. Hiçliğin ne olduğunu ilk kez o an algılıyordum. Başka başka çağlarda yaşamış ve birbirinden habersiz bu iki insanının birbirine duyumsadığı derinliği karşısında ürktüm. İkimizde birbirimizden ürkmekte haklıydık; çünkü birbirimize dair tüm bilinmezliğimizi bilinir yapıyordu bakışlarımız. Bu ölüme meydan okuyan birliğin karşısında nutkum tutulmuştu.  Sadece duygularımız değil, adımlarımız da birbiriyle yarışıyordu. Bir ara onun, elini omzuma attığını fark etim. Ben de elimi onun omuzlarına attım. Birbirimize gülümseyerek yolumuza devam ettik. Konuşmayı ben başlattım:


“Sevgili Cervantes, sen gelmeden önce yapıtın Don Kişot hakkında yaptığım yorumları seninle de paylaşmak istiyorum.  Don Koşot’ta saflık taban yapıyor. O öyle saf ve temiz bir anne ve babadan dünyaya geliyor ki saflıktan başka hiçbir şeye inanmıyor haklı olarak. Çirkinlik onun dünyasına ulaşmıyor. Gücünü de saflığından alıyor. Gücünü saflığından alan bu güzellik ‘insana’ olan umudunu asla yitirmiyor. Onun gözünde herkes cennette yaşamaya layıktır. Kötülükler ile çirkinlikleri giderme konusunda oldukça cesurdur. İyi niyeti sayesinde insanlığa umudu aşılıyor. Kendi cennetine tüm insanlığı sığdırıyor.  Kapısı insanlığa açık cennetinde isteyen herkese yer vardır ve rengârenk çiçekler açıyor cennetinde. Don Kişot taşradan gelmiş ve taşranın tüm özelliklerine sahip bir sözde şövalyedir. Onun en paha biçilmez özelliği herkese barışı getirmesidir. Birçok saflığına karşı bir bilge olacak kadar da birikimdir. İnsanlara vereceği bilgileri büyük bir mütevazılıkla veriyor.  Onda kibir yoktur. Bu saygıdeğer şövalyenin en büyük özelliği fazla okumasıdır. Atının heybesinde hayatın yaralarını iyileştirecek birçok iksiri vardır. İşsizlere ayrı iksir, yürekli olanlara da aşk iksiri dağıtıyor. Heybesinde ateşli silah yoktur. Kendi iyi yanını göstererek taraftar edinmek ve topladığı taraftarla da kötülükleri yeryüzünde silip atmaktır amacı. Bireysel mutluluklar onun yanında bir anlam taşımadığı için tek başına gülmüyor. İnsanlığın gülümsemesi yansıyor gözlerine. Onun için başarının bir ederi yoktur; o edebi zaferin peşindedir. İnsanlığın savunucusu bir masal kahramanına benziyor. İnanç ve o inançtan alınan haşmetli bir vakur duruşu vardır onun. Gücüde savaşının haklı bir savaşım olmasından gelmektedir. Siyasi tehditleri tınmayan bu kahraman tamı tamına sensin.  Bu bakış açısıyla ele aldığın kahramanların sayesinde edebiyat çevrelerini, kutsal Papazların Tarikatı’nı deşifre açıklıyorsun. Hiçbir alçaklık Sizin soyluluğu karşısında varlık göstermiyor. İnsanlık ya ağlayacaktır onuruyla ya da gülecektir. İkisinin ortası yoktur onda.


cervantes-don-kisot


Adalete tutkuyla bağlı olan Don Kişot davasına da aşkla bağlıdır.  Acı çekenlerin, zülüm görenlerin canlı koruyuculuğuna soyunmuş olan Don Kişot, kılıcını eline aldığında göklerden düşmüş bir meleğe benziyor. Barışı ve adaleti yönetim biçimi olarak algılıyor. Bu özellikleriyle akla dayanan bir erdemin ve Tanrı aşkının şövalyesidir. Kutsallıkla hakkaniyeti çok önemsiyor. Tüm sıkıntılarına ve önemli görevlerin omzuna yüklediği sorumluluklara rağmen her zaman iyilik doludur. Onun en büyük meziyeti sevmeyi bilmesidir. Bilge bir deli olarak insanın karşısına çıkıyor. Hayalperesttir. Haksızlıkları ortadan kaldırmak için barbarlığa soyunuyor. O,  yaşama ve ülkelere saldırma cesaretini özgürlük tutkusundan alıyor. Suçluları bile kurtarırken onlardan özür diliyor.


“Sevgili Bedriye, Sen benimhayal dünyamdan bana sesleniyorsun. İstersen ben sana kendi gerçek dünyamdan sesleneyim de beni öyle yenilmez kahramanlardan biri sayma. Savaşta yaralanmış beceriksiz bir hastayım. Direngen oluşumu bir kahramanlık sıfatı sayabilirsin ya da duyarlılığımı. Hayatımın seninle en önemli benzerliği çok az yardım görmemdir. Cezayir’de tutsak, Tunus’ta uşaktım. Ayağında zincir, boynunda tasma en önemlisi de her zaman yoksul. Elit kent soyluları arasında yitip gitmiş, aileye bakmak sorumluluğu üstlenmiş, gel gör ki ailede de aptallık sıfatı olan birisiyim. Öyle eziğim ki Bedriye öfkelensem de sinirlenmezdim. Akılcı dünyanın tüm kötülüklerine karşı merhamet ve adaletin hâkim olması için savaşıyordum yeryüzünde.


Bendeki zafer duygusu saygıdeğer bir yüceliktir. Güzellik ve iyilik dolu dünyamda akıl arama Bedriye. Yaratılmak/ yaratmak benimen önemli özelliğimdir. Yaratanı fethetme. İnsanlık bile Don Kişot’un kutsallığını anlayamadı. Bu komik kahraman, kutsiyetin en büyük mucizesidir. Bana göre kutsal kahraman, kendine Tanrı’nın soytarısı adını vererek kendisine yakışanı yaptı. Zira patron yerine konulmayı beklerken soytarı olarak anıldı. Bedriye bana göre “büyük sanat eseri, her zaman sanatçıdan söz ettirir ve onu ortaya koyar. Böyle olması doğaldır ve gerisi mühim değildir. Düşünce bir aynadır. Her sanatçı Tanrı’nın bir aynasıdır. Spinoza bunu böyle kabul ediyor. Don Kişot ve Cervantes’te bir Martin, bir Georges azizliği mevcuttur. Cervantes’in, Aristo’dan daha üstün ve bu kadar güçlü oluşu da bundandır. Cervantes ve Rabelais, birbirine denk bir güce sahiptir.” Ben geçmişe Rebelais da geleceğe dönüktür. Ben soyluluğu şaha kaldıran eşitliğe tutkunum. Duygusal olarak ele alırsam kendimi bütün çağların içinde mevcuttum ben.


“Sevgili Bedriye ben de hayat çoğu kez eserin üstüne çıkıyor. Bana göre alay etmek için tamamen başka bir anlam yakalamak gerekiyor; oysaki Don Kişot’un kendisi gülünç, akıllı, uslu, derin bilgili ve saygıdeğer biri oluyor. Bu üslup belli başlı yapıların kahramanlarına özgü bir sıfattır.  Don Kişot’ta Bedriye, büyük bir erdem ve fazilet bağışlayıcılık vardır. Don Kişot “Sen iyi bir Hıristiyan değilsin; çünkü her hangi hareketi hiçbir zaman unutmazsın, diyor. İnsan yedi yüz kere affediyor, fakat affettiklerinin hiçbirini bir türlü unutmuyor. Ve unutulmuş olmayı, insanın unutmadığı ortaya çıkıyor.” Ben de komikliğin her türü mevcuttur. Öyle saftır ki benim kahramanım için başarı önemli değildir onun için önemli olan misyonudur, zafer değil.


“Sevgili Cervantes, köylü Sancho hakkındaki fikirlerini öğrenmek istiyorum.”


“Bedriye, Sancho’nun da Don Kişot’tan dahafarklı bir saflığı yoktur. Her ne kadar ona efendim diyorsa da gerçekte ona inanıyor. Her şey bir yana onu çok seviyor. Sancho’nun tercihiydi Don Kişot. Herkesçe bilinen birini tüm özellikleriyle olduğu gibi kabul ediyor. Bu yüzden Don Kişot sadece Sancho’nun aşkı olmaz, onun inancıdır da.Bir vefayla bağlıdır Don Kişot’a. Ondan asla şüphe duymaz “Sevgili Cervantes, sen büyük bir üslup sanatçısısın. “Sanattan çok, hareketten ise daha az kuşku duyar.” Böyle olman sanatçılık değerine gölge düşürmez. Gerek senin gerekse Don Kişot için güzellik çok önemlidir. Sizde gerçek birer sanatçısınız. Güzellik ve adalet sevgisi var ikinizde de. Gerçek aşkı da sanatçıda tutkunun ritimlerinden biri olarak algılıyorsun. Objeler ve çareler konusunda sevgili dostum yanılsan da sanatçıyı adalete götüren hamlede hiç yanılmıyorsun. Bu bile seni ölümsüz yapmaya yetiyor. Sanatçının şaheser yaratmak için yeteneğinin olmasını şart koşuyorsun. Don Kişot’uancak altmış yaşında yayımlıyorsun.  Bu yaşına kadar yazık ki sanatçı yanın hep eksik kalıyor. Bu yapıtla hem kendini hem de Don Kişot’u hayatının zirvelerine çıkarıyorsun. Sende biliyorsun ki her türlü ıstırap, dayanılmaz güçlükler sanatçının eserinde şaheserler yaratabilir. Don Kişot karakterinde canlı bir insanlığı armağan ediyorsun. Senin insan yönün öyle yüce ki en acımasız düşmanlarına bile iyilik yapıyorsun.  Senin derin iradenle verdiğin mücadelenin büyüklüğünü kim inkâr edebilir. Senin kazanmak istediğin başarı maddi değil manevidir. Maddi bir zafer nasıl olsa kazanılır ama manevi kayıpların yeri doldurulamaz. Asker olmak için onurlu davaları olan soylu biri olmalı insan.  Yapıtlarında kullandığın İspanyolca İspanya’nın en güzel dilidir. Dil kusursuzdur yapıtlarında. Dildeki ahenk yapın başından sonuna kadar okuyucuyu sarıp sarmalıyor. Hele komikliğiöyle ustalıkladile giydiriyorsun ki, okuyucu elindeki yapıtı bırakmak istemiyor. Krakerin hareketli, komik, hazır cevaptır. Senin komiklik anlayışını yerli yerine oturtan bir saptamayı sana hatırlatmak istiyorum:


“Cervantes’in komiklik özelliği, Rebelais ve Flaubert’inki gibidir: Bu nitelik dili aşan bir üsluptur. Dil gene de düşünceye baskın çıkan bir üsluptur. Rebelais’da kelimeler,  Flaubert’de kelimelerin düzeni, ifade ettikleri şeyden daha çok söz konusu olur. Cervantes’te bu yetenek iki kat daha fazladır.”


Don Kişot’un dostu yoktu. O da benim gibi kendi eşitini bulamadığı için yalnızdı. Sanchogibi sadık müritten de dost olmaz. Dost olabilmesi için onun üstünde olması yanlışlarına tavır koyacak cesareti olması gerekiyor. Bilinç düzeyi de önemli dostluklarda. Kaldı ki Don Kişot için aşk bile kusursuz dostluktur. Don Kişot’ta aynı zamanda bir insanın çocukluk, gençlik ve yaşlılık, bir diğer anlamıyla olgunluk dönemlerini de ustaca veriyorsun. Üstelik de Don Kişot’un bütün İspanya olduğunu gerçeğini sana anımsatırsam ne düşünürsün? Sancho gerçek bir vatandaştır. Bir çocuk gibi kolay kandırılır. Kendi çıkarının kölesi olmuşların karşısında Sancho bir kahramandır. En önemlisi Don Kişot’un gerçek bir kahraman olduğunu ondan başka kimse anlamamıştır. Bu yönüyle de bilgedir. Karşılaştığı zorluktan kaçmaz, üstüne gider.”


“Sevgili Cervantes, insanın yaşı gibi kahramanları da değişiyor. İnan bana benim kahramanım da Don Kişot’tur. Onun iç dünyasındaki güzelliklere tutunmaya öylesine ihtiyaç duyuyorum ki… Kahramanın insan olamayacak kadar insandı. Belki de bu yüzden kurgu kahraman olarak anılıyor. Dünyanın ve insanların içinde yaşayacaksın ve kirlenmeyeceksin… Sonunda kahramanın da uyanışı acıoluyor. Fakat kirlenmiyor. Bu özelliği bile tek başına onu ölümsüz yapmaya yeter diye düşünüyorum. Senin hayatından binlerce hayat çıkabilir. Bir insanın hayatı böylesi deneyimlerle donatılmışsa kahramanı da Don Kişot ile Sancho gibi soytarı kılığına girmiş bilgeler olur. Hayata isyan etmen için sayısız nedenlerin varken sen direnmeyi ve üreterek yaşamayı tercih ediyorsun. Asıl kahramanolan sensin, boynunda tasma, ayağında zincir olan bir esir o dönemin yanlışlarını ne güzel alaya alıyor. İntikamın bile insanlık abidesi sayılabilecek bir erdemdir. Acının insana kazandırdığı büyüklüğü düşündüm dostum. Büyük ruhunun karşısında ayağa kalktım. Yaşadığın her anı satır satır aklında tutan bir hafıza! Dünyaya nanik atan kahramanların sahibi bir esir. Merak ediyorum yazdıklarından dolayı yaşadıklarına minnet duydun mu?”


“Doğrusunu istersen Bedriye ruhumun olgunlaşması sanıldığı kadar kolay olmadı. Sen yapıtımı basma yaşımı biliyorsun. Ben bile ancak o yaşta acılarıma gülerek yaklaştım. Yazdıklarımda yaşadıklarımı gülerek anlattımsa da içim delik deşik. Neydi biliyor musun Bedriye? Hayatım boyunca ciddiye alınmamıştım. Saygı görmemişim. En acınası da konuşmaya tenezzül edemediğim insanlar ayağıma pranga vurup beni yönetebildiklerini düşünüyorlardı / yönetiyorlardı da. Ben aldığım her nefeste öldüm. Ölümün de acının da her türünü tanıdım ve tattım. Acıya kesti bedenim. Ama iradem yaşama pencere açtı ve yaşama tutundum.  Yazın dünyasını keşfettim ve o dünyanın soytarısı da şövalyesi de ben oldum. Ruhun önüne kim geçebilir. Silahlar düşünceyi öldürmeyi başarsaydı Bedriye, geçmişten geleceğe okuyacağımız kitapların sayıları bu denli kalabalık olmazdı. Bedelsiz hiçbir şey olmuyor. Bugün geldiğim yere gelmek için kimse benim çektiğim çileleri çekmek istemez. Şunu söylememe izin ver: sonunda soytarı yaptıkları, boynuna tasma, ayağına zincir geçirdikleri kölenin önünde onlar diz çöktü; ben çökmedim. Hem de salt ülkemde değil bütün dünya yaşadıklarım ille de yarattığım kahramanlarımın önünde diz çöktü. Varsın sana da kimse yardım etmesin. Sen benim gittiğim çile yolundan git. Hem benim kadar şanssız da sayılmazsın. Ben her zaman senin dostun olarak arkandayım. Beni anman yeterli buluşmamıza. Seni bu duygularla kucaklıyorum.',
            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '5.jpg',
            'thumbnail' => '5.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);


        $news6 = News::create([
            'user_id' => 1,
            'country_id' => 1,
            'city_id' => 1,
            'news_source_id' => 5,
            'title' => 'Rear Window (1954, Alfred Hitchcock) 6',
            'small_title' => 'Rear Window (1954, Alfred Hitchcock) 6',
            'slug' => 'rear-window-1954-alfred-hitchcock-6',
            'spot' => 'François Truffaut’ya göre sinema hakkında bir sinema filmi. Alfred Hitchcock’a göre katıksız bir aşk filmi. İzleyicilere göre bir cinayet ve dedektiflik filmi. İşin aslı hepsi de doğru. Hem de bir sahnesi hariç tamamı tek bir odada, çoğu nesnel kamerayla çekilmiş, tam bir maharet örneği. Alfred Hitchcock’un da büyük katkısının olduğu John Michael Hayes’in hikayesi aslında gerçek bir olaydan esinlenerek oluşturulmuş ve Hitchcock, böylece genel kabul gören ilk başyapıtını vermiş. Gerçi özellikle 1970’lerden sonra Hitchcock’un neredeyse çektiği her sahneyi en ufak anına kadar araştıran ve irdeleyen sinemasever kuşak, yönetmenin önceki başyapıtlarına da hak ettiği değeri verdi ama Rear Window, çoktan tarihe bu yönüyle geçmişti bile.',
            'content' => 'Rear Window, yalnızca basit bir başyapıt değil, tek başına tüm bir “suspense” sinemasının çehresini değiştiren, etkilerinin bugün dahi hissedildiği, sinema tarihine yön veren bir film. Neredeyse her anında değerlendirilmesi gereken bir sinema anlayışı olan bir film. Bir doğa fotoğrafçısının, açıklanmayan bir sebepten dolayı bacağı kırık halde apartmanının geniş penceresinin önünde, tekerlekli sandalyesinde haftalar geçirmesi ve bu arada da hepsi birbirinden ilginç komşularının özel hayatlarını gözetlemesi ve aralarından birinin karısını öldürdüğünü düşünmesi sonucunda gelişen olayları anlatan film, izleme, başkasının hayatını takip etme gibi unsurlarıyla aslında tam bir sinema tezahürü.


Ana kahramanımız Jeff’i ilk bulduğumuz yer bir sinema perdesine benzeyen, geniş ve yüksek pencerelerdir. Bacağı kırılmış olduğundan Jeff, tam bir pasif hayatı yaşar. Hatta sevgilisinin şehevi öpücüklerine bile aynen karşılık vermekten başka bir şey yapacak çaresi yoktur. Bu açıdan tam bir film izleyicisine benzer. İzlediği komşuların hayatlarında değişiklik yaratamaz, pasiftir, onları yalnızca seyretmekle yetinir. Yalnız Kalp adını verdiği orta yaşlı yalnız kadının intihara kadar giden yalnızlığını sadece izlemekle yetinir. Beste sıkıntısı çeken ve bir ara Hitchcock’un da bizzat misafiri olduğu müzisyen komşusunun piyano resitallerini dinlemekle yetinir. Aynı anda 3 erkekle aynı evde birlikte olabilecek kadar popüler ve seksi genç kızın, cinsel uyarıcı niteliğindeki danslarını sadece izlemekle kalır. Büyük bir aşkla dolu oldukları her hallerinden belli olan yeni evli bir çiftin ilişkilerinin sadece 3-4 günde bozulmasına şahit olur. Çocuksuz ve tüm sevgisini köpeğinde bulan bir yaşlı çiftin rutin hayatını izler. Tüm bunların yanı sıra kendi başı da beladadır. Çünkü, sosyete güzeli, onun macera dolu yaşamına adapte olamayacak Lisa kendisine deli gibi aşıktır ve evlenmek istemektedir.


Jeff, karşı apartmanda gördüğü tüm ailelerde aslında kendi bilinçaltının yansımalarını bulur. Lisa, çok güzeldir ve etrafından erkekler ayrılmayacaktır. Tıpkı balerin komşusu gibi. Lisa’yla aşk içinde evlense dahi ilişkileri bir süre sonra sıradanlaşacaktır. Tıpkı, yeni evli çift komşusu gibi. Bir müddet sonra yaşlanıp sevgilerini bir köpekte bulacak hale geleceklerdir. Ya da ayrılacak ve besteci ile Yalnız Kalp gibi hayatlarını sıkıntıyla geçireceklerdir. Jeff’in Lisa’yla olan ilişkisine yönelik tüm korkularını komşularının hayatları simgeler. Ama en beteri en son komşudur. Zira Lisa ve Jeff’in ilişkisi daha da kötüye gidip Lisa iyice dırdırcı bir hal alırsa işler sarpa saracaktır.


Jeff’in arka penceresindeki en tehlikeli komşusu işte tam da böyle bir dertten muzdariptir. Daha sonra adının Lars olduğunu öğreneceğimiz komşusu, karısından tam anlamıyla bıkmıştır ve Jeff’e göre bir gece vakti onu doğramış ve parçalarını bir bavula tıkıştırmıştır. Durum Jeff’in fena halde ilgisini çeker, çünkü Lisa ile olan güzel ilişkisinin o noktaya kadar varabileceğini düşünür. Lisa ve hemşiresi Stella, bu cinayete inanmazlar. Bu noktada hem Lisa’nın hem de Stella’nın Jeff’e evlenmesi yönünde baskı kurduklarını belirteyim.


Jeff, cinayet hakkında daha iyi ipuçları bulduğunda artık Lisa ve Stella da ona inanmaya başlar ve bir an önce Lars’ın karısını öldürdüğü gerçeğini ortaya çıkarmaya çalışırlar. Alfred Hitchcock’un tarzına aşina olan seyirci, bu cinayetin ortaya çıkmasıyla Jeff ve Lisa’nın da evleneceğini çoktan anlamıştır.


Nihayet, tam bir gerilim ve macera cümbüşü gibi geçen dakikalar ve türlü uğraşlar sonunda cinayet ortaya çıkar. Hem de bizzat katilin Jeff’in evine gelip onu balkondan atmasıyla. Fakat bu sahnede bile Hitchcock, katili acınası biri yapar. (Aynı durum Notorious/Aşktan da Üstün’ün Alex’i için de geçerlidir.) Seyirci tıpkı Jeff gibi edilgen bir konumdadır. Jeff’in kendini korumak için elindeki tek alet de ışığı, karşısındakinin gözlerini bir anlığına kamaştıran ve netlik kazanmasa da bir penise benzeyen tele-objektiftir. Filmin başından beri çaresiz ve pasif durumda olan Jeff’e iktidarsızlık özelliği de katan bir sahnedir bu. Bu fallik simge aynı zamanda izleyicinin bir sinema filminin karşısındaki durumuna da eşdeğerdir.


Film, evin içinden çekilmeyen tek sahneyle, Jeff’in diğer bacağının da kırılmasıyla finale gelir. Nihayet Lars yakalanmış, Yalnız Kalp ve besteci adı Lisa olan şarkısı sayesinde tanışmış, yeni evli çift ilk önemli kavgalarını etmiş, balerinin aşktan bihaber kocası eve dönmüştür. Kamera, Jeff’e döndüğünde onu pencereye arkasını dönmüş olarak buluruz. Jeff, yaşadıklarından tatmin olmuştur, kafasındaki sorunları bitirmiştir. Lisa ise bir doğa dergisi okur haldedir. Bu Lisa ve Jeff’in evlenme kararı verdiklerine bir delalettir. Lisa, elindeki dergiyi bırakıp moda dergisine geçtiğinde Hitchcock’un biz izleyicisine acı bir sırıtış bıraktığına emin oluruz ve film son bulur.


Baştan sona açık ya da gizli simgelerle dolu bu mükemmel filmin tek kusuru ana konusuna girmekte bir an için zorlanmasıdır. Fakat konusuna dahil olduğunda adeta tutulamayan bir yarış atı gibidir ve gerçek sinemaseverlere hayatlarının en unutulmaz anlarını yaşatır. Alfred Hitchcock’un en verimli döneminin başlangıcında kotardığı bu başyapıt bugün IMDB Top 250 listesinde de en sevilen Hitchcock filmi durumundadır. Büyük yönetmen, bu filmden 1960 yılındaki Psycho/Sapık’a kadar türlü başyapıtlar verir ve sinema tarihinin en önemli dönemini hazırlar.


James Stewart’ın ve kariyerinin en güzel dönemini geçiren Grace Kelly’nin ne büyük oyuncular olduğuna bir kez daha şahit olduğumuz filmde emektar Thelma Ritter da Stella rolünde yer alır. Rear Window, daha sonraları sinemada çok kez taklit edilen ya da parodileri çekilen bir film olacaktır. Christopher Reeve, nam-ı diğer Superman, yine Rear Window ismini taşıyan remake filminde başrolü alacaktır. Hollywood’un yeni yetmelerinden Shia LaBeouf, Disturbia/Şüphe’de, Jeff’inkine benzer bir sınavdan geçecektir. Roman Polanski, Le Locataire/Kiracı’da Rear Window’dan ne kadar etkilendiğini gösterecektir.


Alfred Hitchcock, izleyicisine hayatın dilimlerinden değil, pasta dilimlerinden sunduğunu ifade eder. Rear Window, o pasta dilimlerinin belki de en heyecanla yutulanıdır. Bonus olarak da 50’lerin çok çok üzerinde seksapalite içeren sahneleriyle Grace Kelly’yi sunar bize. Kelly, Monako prensesliğine giden yolda, aynı yıl 3 filmde birden oynar. Diğer iki filminden biri de yine bir Hitchcock başyapıtı olan Dial M For Murder/Cinayet Var’dır. 3. film ise Kelly’e tek Oscar’ını getiren The Country Girl/Taşra Kızı’dır. James Stewart ise Rope/Ölüm Kararı’ndan 6 yıl sonra ilk defa bir Hitchcock filminde yer alacaktır. Bir sonraki Hitchcock projesi de 1958 yapımı Vertigo/Yükseklik Korkusu’dur. Hitchcock, bu ikilinin kariyerlerinin doruğunda olmasını da fırsat bilip bize leziz mi leziz bir pasta dilimi bırakmıştır, 2017’de bile eskimeyen…


İlginç Bilgi: Jeff’in finalde tele-objektifiyle kullandığı flaşörün yarattığı ışık aynı zamanda onun aydınlanacağına ve arınacağına bir delalettir.',

            'description' => 'tanım',
            'keywords' => 'anahtar kelimler',
            'meta_tags' => 'meta lar',
            'cuff_photo' => '6.jpg',
            'thumbnail' => '6.jpg',
            'status' => 1,
            'band_news' => 1,
            'box_cuff' => 1,
            'is_cuff' => 1,
            'is_comment' => 1,
            'is_show_editor_profile' => 1,
            'is_show_previous_and_next_news' => 1,
            'main_cuff' => 1,
            'mini_cuff' => 1,
            'map_text' => 'koordinatlar',
            'is_active' => 1
        ]);


        $news1->news_categories()->attach(1);
        $news2->news_categories()->attach(2);
        $news3->news_categories()->attach(3);
        $news3->news_categories()->attach(4);
        $news4->news_categories()->attach(5);
        $news5->news_categories()->attach(6);
        $news6->news_categories()->attach(7);
    }
}