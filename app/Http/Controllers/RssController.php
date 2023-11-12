<?php

namespace App\Http\Controllers;

use App\Models\Rss;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Vedmant\FeedReader\Facades\FeedReader;

class RssController extends Controller
{
    public function feedRequest(string $link)
    {
        $f = FeedReader::read($link);
        $info = [
            'title' => $f->get_title(),
            'description' => $f->get_description(),
            'permalink' => $f->get_permalink(),
            'link' => $f->get_link(),
            'language' => $f->get_language(),
            'image_url' => $f->get_image_url(),
            'author' => $f->get_author()
        ];
        $result = [
            'title' => $f->get_title(),
            'description' => $f->get_description(),
            'permalink' => $f->get_permalink(),
            'link' => $f->get_link(),
            'copyright' => $f->get_copyright(),
            'language' => $f->get_language(),
            'image_url' => $f->get_image_url(),
            'author' => $f->get_author()
        ];
        foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
            $i['title'] = $item->get_title();
            $i['description'] = $item->get_description();
            $i['id'] = $item->get_id();
            $i['content'] = $item->get_content();
            $i['thumbnail'] = $item->get_thumbnail();
            $i['category'] = $item->get_category();
            $i['categories'] = $item->get_categories();
            $i['author'] = $item->get_author();
            $i['authors'] = $item->get_authors();
            $i['contributor'] = $item->get_contributor();
            $i['copyright'] = $item->get_copyright();
            $i['date'] = $item->get_date();
            $i['updated_date'] = $item->get_updated_date();
            $i['local_date'] = $item->get_local_date();
            $i['permalink'] = $item->get_permalink();
            $i['link'] = $item->get_link();
            $i['links'] = $item->get_links();
            $i['enclosure'] = $item->get_enclosure();
            $i['audio_link'] = $item->get_enclosure()->get_link();
            $i['enclosures'] = $item->get_enclosures();
            $i['latitude'] = $item->get_latitude();
            $i['longitude'] = $item->get_longitude();
            $i['source'] = $item->get_source();

            $result['items'][] = $i;
        }
    }
    public function index()
    {
        $id = Auth::user()->id;
        $rss = Rss::where('user_id', Auth::id())->get();
        return Inertia::render('Home')->with(['id' => $id, 'rss' => $rss]);
    }
    public function show()
    {
        
    }
    public function store(Request $request)
    {
        Rss::create([
            'title' => $request->title,
            'link' => $request->link,
            'user_id' => $request->user_id,
        ]);
    }
}
