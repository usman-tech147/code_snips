<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class MusicDatatableController extends Controller
{
    public function index()
    {
        $albums = Album::select('id','name')->get();
        $bands = Band::select('id','name')->get();
        $dates = Song::select([
            DB::raw("DATE_FORMAT(created_at, '%Y') as Year")
        ])->groupBy('Year')
            ->orderBy('Year')
            ->get();
        return view('music.songs_datatable',compact('albums','bands','dates'));
    }

    public function ajaxGetSongs(Request $request)
    {

//        $songs = DB::table('songs')
//            ->join('albums', 'albums.id', '=', 'songs.album_id')
//            ->join('bands', 'bands.id', '=', 'albums.band_id')
//            ->select('songs.id','songs.name as song', 'songs.length', DB::raw("DATE_FORMAT(songs.created_at, '%Y, %M, %d') as release_date"),'albums.name as album', 'bands.name as band')


//        $songs = DB::table('songs')
//            ->join('albums', 'albums.id', '=', 'songs.album_id')
//            ->join('bands', 'bands.id', '=', 'albums.band_id')
//            ->select('songs.id','songs.name as song', 'songs.length',
//                'created_at as release_date', 'albums.name as album', 'bands.name as band');

        $songs = Song::select('songs.id','songs.name as song','songs.length',
            DB::raw("DATE_FORMAT(songs.created_at, '%Y, %M, %d') as release_date"),
            'albums.name as album', 'bands.name as band')
            ->join('albums','albums.id','=','songs.album_id')
            ->join('bands', 'bands.id', '=', 'albums.band_id');

        return DataTables::of($songs)
            ->addColumn('actions', function ($song) {
                $button = '<div class="btn-group btn-group-sm" role="group" aria-label="Basic example">';
                $button .= '<button id="'.$song->id.'" class="view btn btn-primary">View</button>';
                $button .= '<button id="'.$song->id.'" class="edit btn btn-warning">Edit</button>';
                $button .= '<button type="button" id="'.$song->id.'" class="delete btn btn-danger">Delete</button>';
                $button .= '</div>';
                return $button;
            })
            ->addColumn('serial_number', function ($song){
                $serial_number = str_pad($song->id,'8','0',0);
                return $serial_number;
            })
//            ->addColumn('release_date', function ($song){
//                return Carbon::parse($song->release_date)->format('Y, F, d');
//            })
            ->filter(function ($query) use ($request){
                if(!empty($request->name)){
                    $query->where('songs.name','like','%'.$request->name.'%');
                }
                if(!empty($request->album)){
                    $query->where('songs.album_id','=',$request->album);
                }
                if(!empty($request->band)){
                    $query->whereHas('album', function ($query) use ($request){
                        $query->where('band_id','=',$request->band);
                    });
                }
                if(!empty($request->date)){
                    $query->whereDate('songs.created_at','like','%'.$request->date.'%');
                }
                if(!empty($request->song_length)){
                    $split = explode('-', $request->song_length);
                    $query->whereBetween('songs.length', [$split[0], $split[1]]);
                }
            })
            ->rawColumns(['actions'])->toJson();
    }

}
