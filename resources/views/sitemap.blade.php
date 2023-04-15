<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc>https://ultravetmall.com/</loc>
        <lastmod>2021-09-21</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/blog</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/products</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/about</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/faq</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/contact</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>
    <url>
        <loc>https://ultravetmall.com/terms-and-conditions</loc>
        <lastmod>2021-09-18</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1</priority>
    </url>

    @forelse($AllProducts as $Product)
        <url>
            <loc>{{route('product.single' , [$Product->slug , $Product->id])}}</loc>
            <lastmod>{{$Product->updated_at->format('Y-m-d')}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>
    @empty
    @endforelse
    @forelse($AllBrands as $Brand)
        <url>
            <loc>{{route('product.all')}}?brand_id={{$Brand->id}}</loc>
            <lastmod>{{$Brand->updated_at->format('Y-m-d')}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>
    @empty
    @endforelse
    @forelse($AllPets as $Pet)
        <url>
            <loc>{{route('product.all')}}?pet_id={{$Pet->id}}</loc>
            <lastmod>{{$Pet->updated_at->format('Y-m-d')}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>
    @empty
    @endforelse
    @forelse($AllCategories as $Category)
        <url>
            <loc>{{route('product.all')}}?category_id={{$Category->id}}</loc>
            <lastmod>{{$Category->updated_at->format('Y-m-d')}}</lastmod>
            <changefreq>daily</changefreq>
            <priority>1</priority>
        </url>
    @empty
    @endforelse
</urlset>
