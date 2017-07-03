<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

    @foreach($sitemaps as $index => $sitemap)
        <sitemap>
            <loc>{{ url($sitemap->url) }}</loc>
            <lastmod>{{ $sitemap->last_modified }}</lastmod>
        </sitemap>
    @endforeach

</sitemapindex>