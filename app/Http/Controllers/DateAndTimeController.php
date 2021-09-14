<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DateAndTimeController extends Controller
{
    public function getDateAndTime()
    {
//        mysql database date format is yyyy-mm-dd
//        $products = DB::connection('foo')->table('products')
//            ->select(['id','name', 'description', 'price', DB::raw('DATE(created_at) as date')])
//            ->get();
//        dd($products[0]->date);


//        $dt1 = Carbon::create('2021','5','28');
//        $dt2 = Carbon::create('2020','8','13');
//        return $dt1->longRelativeDiffForHumans($dt2,3);
        return view('files.display_date_and_time');
    }

    public function dateAndTimeForm()
    {
        return view('files.date_and_time');
    }

    public function submitDateAndTimeForm(Request $request)
    {
        $join_date = new Carbon($request->join_date);
        $end_date = new Carbon($request->end_date);
//        $join_date->diffInDays($end_date);


//        echo ($join_date->diffInMonths($end_date));
//        exit;
//        return redirect()->route('get.date-and-time');
    }

    public function monthlyDates()
    {
        $firstDay = Carbon::parse(new Carbon('first day of this month'))->toDateString();
        $lastDay = Carbon::parse(new Carbon('last day of this month'))->toDateString();

//        $today = Carbon::now()->toDateString();

        $days = CarbonPeriod::create($firstDay, $lastDay);
        $dates = [];
        foreach ($days as $day) {
            array_push($dates, $day->format('Y-m-d'));
        }


        $dates = collect($dates);
        return view('calander', compact('dates'));

    }

    public function getMonthlyDates(Request $request)
    {

        $myDate = $request->month . '/' . $request->year;
        $firstDay = Carbon::createFromFormat('m/Y', $myDate)
            ->firstOfMonth()->toDateString();
        $lastDay = Carbon::createFromFormat('m/Y', $myDate)
            ->lastOfMonth()->toDateString();

        $days = CarbonPeriod::create($firstDay, $lastDay);
        $dates = [];

        if($request->format == 1)
        {
            foreach ($days as $day) {
                array_push($dates, $day->format('Y-m-d'));
            }
        }

        if($request->format == 2)
        {
            foreach ($days as $day) {

                $explode_date = explode(', ',Carbon::parse($day)->toDayDateTimeString());
                $explode_year = explode(' ', $explode_date[2]);

                array_push($dates, $explode_date[0].', '.$explode_date[1].', '.$explode_year[0]);
            }
        }


        $dates = collect($dates);



//
//

//
//        $day = Carbon::now()->day;
//        $month = Carbon::now()->month;
//        $year = Carbon::now()->year;

//        $data = [$day, $month,$year, $firstDay, $toDay, $diff];
//


//        $tillToday =

        return view('calTemplate',compact('dates'));
//        return response()->json(['data' => $dates]);
    }
}
