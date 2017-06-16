<?php '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">

    @foreach ($newsItems as $newsItem)
        <url>
            <loc>{!! route('show_news', ['slug' => $newsItem->slug]) !!}</loc>
            <lastmod>{{$newsItem->created_at}}</lastmod>
            <changefreq>{{config('baznews.site_map_change_freq')}}</changefreq>
            <priority>{{config('baznews.priority')}}</priority>
            <news:news>
                <news:publication>
                    <news:name>{{$newsItem->title}}</news:name>
                    <news:language>{{config('app.local')}}</news:language>
                </news:publication>
                <news:genres>{{config('baznews.genres')}}</news:genres>
                <news:publication_date>{{$newsItem->created_at}}</news:publication_date>
                <news:title>{{$newsItem->title}}</news:title>
                <news:keywords> {{$newsItem->keywords}}  </news:keywords>
            </news:news>
        </url>
    @endforeach
</urlset>