<?php '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:news="http://www.google.com/schemas/sitemap-news/0.9">

    @foreach ($articles as $article)
        <url>
            <loc>{!! route('article', ['slug' => $article->slug]) !!}</loc>
            <news:news>
                <news:publication>
                    <news:name>{{$article->title}}</news:name>
                    <news:language>{{config('app.locale')}}</news:language>
                </news:publication>
                <news:genres>{{config('baznews.genres')}}</news:genres>
                <news:publication_date>{{$article->created_at}}</news:publication_date>
                <news:title>{{$article->title}}</news:title>
                <news:keywords>{{$article->keywords}}</news:keywords>
            </news:news>
        </url>
    @endforeach
</urlset>