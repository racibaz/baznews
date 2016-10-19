<?php '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">


    @foreach ($newsItems as $newsItem)
        <url>
            <loc>https://www.baznews.app/{{ $newsItem->slug }}</loc>
            <lastmod>{{$newsItem->created_at}}</lastmod>
            <changefreq>always</changefreq>
            <priority>1.0</priority>
            <news:news>
                <news:publication>
                    <news:name>{{$newsItem->title}}</news:name>
                    <news:language>tr</news:language>
                </news:publication>
                <news:genres>UserGenerated,PressRelease, Blog</news:genres>
                <news:publication_date>{{$newsItem->created_at}}</news:publication_date>
                <news:title>{{$newsItem->title}}</news:title>
                <news:keywords> {{$newsItem->keywords}}  </news:keywords>
            </news:news>
        </url>
    @endforeach
</urlset>