<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitemapController extends Controller
{
    
    public function sitemap(Request $request)
    {
        $filePath = \Storage::disk('public')->path('.') . '/sitemap.xml';
        $filename = 'sitemap.xml';
        return \Response::make(file_get_contents($filePath), 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'inline; filename="'.$filename.'"',
            // 'Content-Transfer-Encoding'=> 'binary',
            // 'Accept-Ranges'=> 'bytes'
        ]);
    }

    public function generateSitemap(Request $request)
    {
        $path = \Storage::disk('public')->path('') . 'sitemap.xml';
        \Spatie\Sitemap\SitemapGenerator::create('https://teacode.ma')->getSitemap()->writeToFile($path);
        return redirect('/sitemap');
    }
}
