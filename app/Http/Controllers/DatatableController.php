<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Song;
use Illuminate\Http\Request;

class DatatableController extends Controller
{
    public function index()
    {
//        $album_id = 0;
//        $search_value = 'o';
//        $songs = Song::whereHas('album',function ($query) use ($album_id, $search_value){
//            if($album_id != 0)
//            {
//                return $query->where('album_id','=',$album_id);
//            }
//            else{
//                return $query->where('name','like','%'. $search_value .'%');
//            }
//
//        })->get();
//
//        return $songs;

//        $serial_number = [];
//
//        $albums = Album::select('id')->get()->toArray();
//
//        for($i=0; $i<count($albums); $i++){
//            $serial = str_pad($albums[$i]['id'], 5, '0', STR_PAD_LEFT);
//            array_push($serial_number, $serial);
//        }
//        dd($serial_number);

        $albums = Album::all();
        return view('datatable', compact('albums'));
    }


    public function getSongsRecord(Request $request)
    {

        $draw = $request->draw;
        $start = $request->start;
        $length = $request->length;

        $order = $request->order;
        $columns = $request->columns;
        $order_arr = $request->order;

        $search_arr = $request->search;
        $search_by_album = $request->album_id;

        $columnIndex = $order[0]['column'];
        $columnName = $columns[$columnIndex]['data'];
        $columnSortOrder = $order_arr[0]['dir'];


        $songs = null;
        $totalRecords = null;
        $totalRecordsWithFilter = null;

        $searchValue = $search_arr['value'];

        $totalRecords = Song::all()->count();

        $totalRecordsWithFilter = Song::select('count(*) as allcount')
            ->when($request->has('album_id'), function ($q){
                $q->where('album_id',\request('album_id'));
            })
            ->when($request->has('search'),function ($q){
                $q->where('name','like','%'.\request()->search['value'].'%');
            })->count();

//        ->where('name', 'like', '%' . $searchValue . '%')

//        $songs = Song::orderby($columnName, $columnSortOrder)
//            ->where('songs.name', 'like', '%' . $searchValue . '%')
//            ->select('songs.*')
//            ->skip($start)
//            ->limit($length)
//            ->get();


        $songs = Song::select('songs.*')
            ->offset($start)
            ->limit($length)
            ->get();
        $data_arr = array();

        foreach ($songs as $song) {
            $id = $song->id;
            $serial = str_pad($song->id, 5, '0', STR_PAD_LEFT);
            $name = $song->name;
            $song_length = $song->length;
            $album = $song->album->name;

            $data_arr[] = array(
                "id" => $id,
                "Product_no" => $serial,
                "name" => $name,
                "length" => $song_length,
                "album" => $album,
            );
        }

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => 182,
            "aaData" => $data_arr
        );


        return response()->json(
            [
                'album' => $request->album_id,
                'search' => $request->search['value'],
                'total_records' => $totalRecords,
                'total_filtered_records' => $totalRecordsWithFilter,
                'start' => $start,
                'end' => $length
            ]
        );
//        echo json_encode($request->album_id);
//        exit;

    }

    //        if ($request->has('album_id')) {
//            $totalRecords = Song::select('count(*) as allcount')
//                ->where('album_id', '=', $request->album_id)
//                ->count();
//            $totalRecordsWithFilter = Song::select('count(*) as allcount')
//                ->where('album_id', '=', $request->album_id)
//                ->count();
//
//            $songs = Song::orderby($columnName, $columnSortOrder)
//                ->where('album_id', '=', $request->album_id)
//                ->select('songs.*')
//                ->skip($start)
//                ->limit($length)
//                ->get();
//
//        } else {
//
//        }

}
