<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($books as $book)
        <url>
            <loc>https://www.baznews.app/{{ $book->slug }}</loc>
            <lastmod>{{ $book->updated_at }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>0.6</priority>
        </url>
    @endforeach
</urlset>