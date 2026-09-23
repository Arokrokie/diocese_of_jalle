<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\Post;
use App\Models\Event;
use App\Models\Sermon;

class SitemapController extends Controller
{
    /**
     * Generate dynamic XML sitemap for search engines.
     */
    public function index()
    {
        $urls = [];

        // Core Static Pages
        $staticPages = [
            ['url' => route('home'), 'priority' => '1.0', 'changefreq' => 'daily'],
            ['url' => route('about'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('bishop'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('leadership'), 'priority' => '0.9', 'changefreq' => 'weekly'],
            ['url' => route('churches'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('ministries'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('ministry.detail'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('services'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('service.detail'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('sermons'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('events'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('news'), 'priority' => '0.9', 'changefreq' => 'daily'],
            ['url' => route('gallery'), 'priority' => '0.8', 'changefreq' => 'weekly'],
            ['url' => route('donation'), 'priority' => '0.8', 'changefreq' => 'monthly'],
            ['url' => route('faq'), 'priority' => '0.7', 'changefreq' => 'monthly'],
            ['url' => route('contact'), 'priority' => '0.8', 'changefreq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $urls[] = [
                'loc' => $page['url'],
                'lastmod' => now()->toDateString(),
                'changefreq' => $page['changefreq'],
                'priority' => $page['priority'],
            ];
        }

        // Clergy Profiles
        $clergySlugs = [
            'canon-michael-makuol-garang',
            'archdeacon-samuel-akuak',
            'mothers-union-president',
            'youth-director',
        ];
        foreach ($clergySlugs as $slug) {
            $urls[] = [
                'loc' => route('clergy.detail', $slug),
                'lastmod' => now()->toDateString(),
                'changefreq' => 'weekly',
                'priority' => '0.8',
            ];
        }

        // Dynamic Published News / Posts
        try {
            $posts = Post::where('published', true)->get();
            foreach ($posts as $post) {
                $urls[] = [
                    'loc' => route('news.show', $post->slug),
                    'lastmod' => $post->updated_at ? $post->updated_at->toDateString() : now()->toDateString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        } catch (\Exception $e) {
            // Silently continue if database table is unavailable during testing
        }

        // Dynamic Events
        try {
            $events = Event::all();
            foreach ($events as $event) {
                $urls[] = [
                    'loc' => route('event.show', $event->slug),
                    'lastmod' => $event->updated_at ? $event->updated_at->toDateString() : now()->toDateString(),
                    'changefreq' => 'weekly',
                    'priority' => '0.8',
                ];
            }
        } catch (\Exception $e) {
            // Silently continue if database table is unavailable
        }

        // Dynamic Sermons
        try {
            $sermons = Sermon::all();
            foreach ($sermons as $sermon) {
                $urls[] = [
                    'loc' => route('sermon.show', $sermon->slug),
                    'lastmod' => $sermon->updated_at ? $sermon->updated_at->toDateString() : now()->toDateString(),
                    'changefreq' => 'monthly',
                    'priority' => '0.8',
                ];
            }
        } catch (\Exception $e) {
            // Silently continue if database table is unavailable
        }

        // Generate XML Content
        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        foreach ($urls as $item) {
            $xml .= "  <url>\n";
            $xml .= "    <loc>" . htmlspecialchars($item['loc'], ENT_XML1, 'UTF-8') . "</loc>\n";
            $xml .= "    <lastmod>" . $item['lastmod'] . "</lastmod>\n";
            $xml .= "    <changefreq>" . $item['changefreq'] . "</changefreq>\n";
            $xml .= "    <priority>" . $item['priority'] . "</priority>\n";
            $xml .= "  </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }
}
