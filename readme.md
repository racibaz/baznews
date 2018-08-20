# Baznews Haber Yazılımı

* Kurumlum İşlemleri 
  * Sistem Gereksinimleri
  * Konfigürasyon
  * Kurulum
  
* Kullanıcı Yönetimi
  * Kullanıcılar
  * Grouplar
  * Roleler
  * İzinler
* Genel Ayarlar
  * Ayarlar
  * Ülkeler
  * İller
  * Arama Listesi
  * Ping
  * Loglar
  * ENV Yönetimi
* İletişim Yönetimi
* Menüler
* Sayfalar
* Etiketler
* Reklamlar
* Duyurular
* Site Haritası
* Rss Yönetimi
* Olay Yönetimi
* Modül Yönetimi
* Tema Yönetimi
* API Yönetimi

## Modüller
* Biyografi Modülü
* Makale Modülü
* Kitap Modülü
* Haber Modülü


## Kurulum İşlemleri

### Sistem Gereksinimleri

    PHP >= 7.1
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension
    XML PHP Extension

## Konfigürasyon

    Anadizinde .env dosyasını oluşturduktan sonra aşağıdaki gibi düzenleyerek yapılandırabilirsiniz.
    
```php
APP_ENV=local
APP_KEY=YOURAPPKEY
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost
ACTIVE_THEME=news-theme
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOURDBNAME
DB_USERNAME=YOURDBNAME
DB_PASSWORD=YOURDBPASSWORD
BROADCAST_DRIVER=log
CACHE_DRIVER=redis
SESSION_DRIVER=file
QUEUE_DRIVER=redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=465
MAIL_USERNAME=YOUREMAIL
MAIL_PASSWORD=YOUREMAILPASSWORD
MAIL_ENCRYPTION=ssl
PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=
SCOUT_DRIVER=
ALGOLIA_APP_ID=
ALGOLIA_SECRET=
SCOUT_QUEUE=true
FACEBOOK_CLIENT_ID=
FACEBOOK_SECRET=
FACEBOOK_REDIRECT=http://baznews.test/auth/facebook/callback
TWITTER_CLIENT_ID=
TWITTER_SECRET=
TWITTER_REDIRECT=http://baznews.test/auth/twitter/callback
GOOGLE_CLIENT_ID=
GOOGLE_SECRET=
GOOGLE_REDIRECT=http://baznews.test/auth/google/callback
```

## Kurulum

 Anadizinde ki .env doayasında "DB_DATABASE" alanına girdiğiniz isimde veritabanını oluşturun ve konsoldan 
 
 composer update yapın.
 
 php artisan baznews:install 
 veya 
 php artisan migrate
 php artisan db:seed
 php artisan module:migrate
 php artisan module:seed
 php artisan migrate --path=vendor/venturecraft/revisionable/src/migrations
 php artisan passport:install
 
 kodlarını çalıştırın.
