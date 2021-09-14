<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index()
    {
        $songs = Song::select('id','name','length',DB::raw("DATE_FORMAT(songs.created_at, '%Y, %M, %d') as release_date"),'album_id')
            ->orderBy('length', 'desc')->paginate(10);
        $albums = Album::all();
        $dates = Song::select([
            DB::raw("DATE_FORMAT(created_at, '%Y') as Year")
        ])->groupBy('Year')
            ->orderBy('Year')
            ->get();
        return view('music.songs', compact('songs', 'albums', 'dates'));
    }

    public function songsFilter(Request $request)
    {
        $songs = Song::select('id','name','length',DB::raw("DATE_FORMAT(songs.created_at, '%Y, %M, %d') as release_date"),'album_id')
            ->where(function ($query) use ($request) {
            if (!empty($request->album)) {
                $query->where('album_id', $request->album);
            }
            if (!empty($request->name)) {
                $query->where('name', 'like', '%' . $request->name . '%');
            }
            if (!empty($request->length)) {
                $split = explode('-', $request->length);
                $query->whereBetween('length', [$split[0], $split[1]]);
            }
            if (!empty($request->date)) {
                $query->whereDate('created_at', 'like', '%' . $request->date . '%');
            }
        })->orderBy('length', 'desc')->paginate(10);
        return view('music.partials.songs_ajax_template', compact('songs'))->render();
    }

    public function updateSongsDate()
    {
        Song::whereBetween('id', [1, 10])
            ->update(['created_at' => '2001-01-18']);
        Song::whereBetween('id', [11, 20])
            ->update(['created_at' => '2002-02-21']);
        Song::whereBetween('id', [21, 30])
            ->update(['created_at' => '2003-01-28']);
        Song::whereBetween('id', [31, 40])
            ->update(['created_at' => '2004-04-18']);
        Song::whereBetween('id', [41, 50])
            ->update(['created_at' => '2005-05-05']);
        Song::whereBetween('id', [51, 60])
            ->update(['created_at' => '2006-11-04']);
        Song::whereBetween('id', [61, 70])
            ->update(['created_at' => '2011-11-09']);
        Song::whereBetween('id', [71, 80])
            ->update(['created_at' => '2012-11-19']);
        Song::whereBetween('id', [81, 90])
            ->update(['created_at' => '2005-01-17']);
        Song::whereBetween('id', [91, 100])
            ->update(['created_at' => '2006-11-23']);
        Song::whereBetween('id', [101, 110])
            ->update(['created_at' => '2018-02-28']);
        Song::whereBetween('id', [111, 120])
            ->update(['created_at' => '2009-06-29']);
        Song::whereBetween('id', [121, 130])
            ->update(['created_at' => '2019-01-07']);
        Song::whereBetween('id', [131, 140])
            ->update(['created_at' => '2021-03-01']);
        Song::whereBetween('id', [141, 150])
            ->update(['created_at' => '2001-11-11']);
        Song::whereBetween('id', [151, 160])
            ->update(['created_at' => '2002-09-12']);
        Song::whereBetween('id', [161, 170])
            ->update(['created_at' => '2005-01-22']);
        Song::whereBetween('id', [171, 180])
            ->update(['created_at' => '2016-01-23']);
        Song::whereBetween('id', [181, 182])
            ->update(['created_at' => '2007-01-18']);
        return 1;
    }
}
