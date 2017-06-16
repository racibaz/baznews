<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($biographies as $biography)
        <url>
            <loc>{!! route('biography', ['slug' => $biography->slug]) !!}</loc>
            <lastmod>{{ $biography->updated_at }}</lastmod>
            <changefreq>{{config('baznews.site_map_change_freq')}}</changefreq>
            <priority>{{config('baznews.priority')}}</priority>
        </url>
    @endforeach
</urlset>