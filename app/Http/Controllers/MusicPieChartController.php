<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MusicPieChartController extends Controller
{
    public function index()
    {
        return view('music.songs_pie_chart');
    }

    public function ajaxSongsStatistics()
    {
        $songs_per_album = DB::table('songs')
            ->select('albums.name as album',DB::raw('count(songs.id) as total_songs'))
            ->join('albums','songs.album_id','=','albums.id')
            ->groupBy('songs.album_id')
            ->get();
        return response()->json(['data' => $songs_per_album]);
    }
}
