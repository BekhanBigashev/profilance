<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use App\Services\LinkShortifyService;
use Illuminate\Http\Request;

class ShortlinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shortlinks = ShortLink::all();
        return view('index', ['shortlinks' => $shortlinks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request, LinkShortifyService $shortifyLinkService)
    {
            $validated = $request->validate([
                'link' => 'required|url',
            ]);
            $shortLink = $shortifyLinkService::getShortLink($validated['link']);
            $link = new Shortlink();
            $link->full_link = $validated['link'];
            $link->short_link = $shortLink;
            $link->save();
            return response()->json(['shortLink' => $shortLink]);

    }

    /**
     * Redirect to target URL by short code in DB
     * @param string $code
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function redirectToFullLink(string $code)
    {
        $link = ShortLink::where('short_link', $code)->first();
        $address = $link->full_link;
        return redirect($link->full_link);
    }
}
