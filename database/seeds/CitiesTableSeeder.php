<?php

use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities[1]="Adana";
        $cities[2]="Adıyaman";
        $cities[3]="Afyon";
        $cities[4]="Ağrı";
        $cities[5]="Amasya";
        $cities[6]="Ankara";
        $cities[7]="Antalya";
        $cities[8]="Artvin";
        $cities[9]="Aydın";
        $cities[10]="Balıkesir";
        $cities[11]="Bilecik";
        $cities[12]="Bingöl";
        $cities[13]="Bitlis";
        $cities[14]="Bolu";
        $cities[15]="Burdur";
        $cities[16]="Bursa";
        $cities[17]="Çanakkale";
        $cities[18]="Çankırı";
        $cities[19]="Çorum";
        $cities[20]="Denizli";
        $cities[21]="Diyarbakır";
        $cities[22]="Edirne";
        $cities[23]="Elazığ";
        $cities[24]="Erzincan";
        $cities[25]="Erzurum";
        $cities[26]="Eskişehir";
        $cities[27]="Gaziantep";
        $cities[28]="Giresun";
        $cities[29]="Gümüşhane";
        $cities[30]="Hakkari";
        $cities[31]="Hatay";
        $cities[32]="Isparta";
        $cities[33]="İçel";
        $cities[35]="İstanbul";
        $cities[34]="İzmir";
        $cities[36]="Kars";
        $cities[37]="Kastamonu";
        $cities[38]="Kayseri";
        $cities[39]="Kırklareli";
        $cities[40]="Kırşehir";
        $cities[41]="Kocaeli";
        $cities[42]="Konya";
        $cities[43]="Kütahya";
        $cities[44]="Malatya";
        $cities[45]="Manisa";
        $cities[46]="Kahramanmaraş";
        $cities[47]="Mardin";
        $cities[48]="Muğla";
        $cities[49]="Muş";
        $cities[50]="Nevşehir";
        $cities[51]="Niğde";
        $cities[52]="Ordu";
        $cities[53]="Rize";
        $cities[54]="Sakarya";
        $cities[55]="Samsun";
        $cities[56]="Siirt";
        $cities[57]="Sinop";
        $cities[58]="Sivas";
        $cities[59]="Tekirdağ";
        $cities[60]="Tokat";
        $cities[61]="Trabzon";
        $cities[62]="Tunceli";
        $cities[63]="Şanlıurfa";
        $cities[64]="Uşak";
        $cities[65]="Van";
        $cities[66]="Yozgat";
        $cities[67]="Zonguldak";
        $cities[68]="Aksaray";
        $cities[69]="Bayburt";
        $cities[70]="Karaman";
        $cities[71]="Kırıkkale";
        $cities[72]="Batman";
        $cities[73]="Şırnak";
        $cities[74]="Bartın";
        $cities[75]="Ardahan";
        $cities[76]="Iğdır";
        $cities[77]="Yalova";
        $cities[78]="Karabük";
        $cities[79]="Kilis";
        $cities[80]="Osmaniye";
        $cities[81]="Düzce  ";


        foreach ($cities as $city){

            City::create([
                'country_id'            => 1,
                'name'                  => $city,
                'is_active'             => 1,
            ]);
        }
    }
}
