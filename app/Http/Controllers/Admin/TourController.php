<?php

namespace App\Http\Controllers\Admin;

use App\Locations;
use App\RegularTours;
use App\Tours;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Traits\MsgTrait;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class TourController extends Controller
{
    use MsgTrait;
    //
    public function index()
    {
        $tours=Tours::orderBy('offShelf', 'asc')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.tour.index',compact('tours'));
    }

    public function create()
    {
        $items = Locations::pluck('name', 'id');

        return view('admin.tour.create',compact('items'));
    }

    public function store(Requests\creaetTourRequest $request)
    {

        if($request->get('schedule_type')=='regular')
        {
            $regular_tour=new RegularTours;
            $regular_tour->save();
            if ($request->hasFile('picture')) {

                $file = $request->file('picture');

                if ($file->isValid()) {
                    $extension=$file->getClientOriginalExtension();

                    $fileName = 'R'.$regular_tour->id.'_'.time().'.'.$extension;
                    $destinationPath = base_path() . '/public/images/tours/';
                    Image::make($file)->save($destinationPath . $fileName);
                }
            }


            //count which dates have to create tours
            $end_date=$request->get('tour_end_time');
            $start_date=$request->get('tour_start_time');

            //regular weeks and time
            $weeks=$request->get('week');
            $weeks_start=$request->get('start_time');
            $weeks_end=$request->get('end_time');

            $weekStr='';

            for($j=0;$j<sizeof($weeks);$j++)
            {
                $endDate = strtotime($end_date);

                for($i = strtotime($weeks[$j], strtotime($start_date)); $i <= $endDate; $i = strtotime('+1 week', $i))
                {
                    $regular_week_date= date('Y-m-d', $i);
                    //combine date and time
                    $tour_start_time= date('Y-m-d H:i:s',strtotime($regular_week_date.' '.($weeks_start[$j]).':00'));
                    $tour_end_time= date('Y-m-d H:i:s',strtotime($regular_week_date.' '.($weeks_end[$j]).':00'));

                    $tour=Tours::create($request->all());
                    $tour->regular_tour_id=$regular_tour->id;
                    $tour->picture=$fileName;
                    $tour->tour_start_time=$tour_start_time;
                    $tour->tour_end_time=$tour_end_time;
                    $tour->save();

                }
                $weekStr=$weekStr.$weeks[$j].',';
            }

            $regular_tour->title = $request->get('title');
            $regular_tour->tour_id=$tour->id;
            $regular_tour->week=$weekStr;
            $regular_tour->tour_start_date=$start_date;
            $regular_tour->tour_end_date=$end_date;
            $regular_tour->save();

        }
        else
        {
            $tour_end_time=$request->get('once_tour_end_time');
            $tour_start_time=$request->get('once_tour_start_time');

            $tour=Tours::create($request->all());

            $tour->tour_start_time=date('Y-m-d H:i:s',strtotime($tour_start_time));
            $tour->tour_end_time=date('Y-m-d H:i:s',strtotime($tour_end_time));

            if ($request->hasFile('picture')) {

                $file = $request->file('picture');

                if ($file->isValid()) {
                    $extension=$file->getClientOriginalExtension();

                    $fileName = 'O'.$tour->id.'_'.time().'.'.$extension;
                    $destinationPath = base_path() . '/public/images/tours/';
                    Image::make($file)->save($destinationPath . $fileName);
                }
            }

            $tour->picture=$fileName;

            $tour->save();
        }

        return redirect('admin/tour');
    }

    public function show($id)
    {
        $tour=Tours::findorFail($id);
        $items = Locations::pluck('name', 'id');

        return view('admin.tour.edit',compact('tour','items'));
    }

    public function update(Request $request, $id)
    {
        Tours::find($id)->update($request->all());

        $this->succMsg($request,'Data updated');

        return redirect('admin/tour');

    }

    public function search(Request $request)
    {

        $title = $request->get('title');
        $tour_type=$request->get('tour_type');
        $schedule_type=$request->get('schedule_type');
        $range_dates=$request->get('range_dates');


        $query = DB::table('tours');

        if($title!='')
        {
            $query= $query->where('title', 'LIKE', '%'.$title.'%');
        }

        if($tour_type!='')
        {
            $query=$query->where('tour_type',$tour_type);
        }

        if($schedule_type!='')
        {
            $query=$query->where('schedule_type',$schedule_type);
        }

        if($range_dates!='')
        {
            $range_dates=explode("~", $range_dates);
            $start_date=$range_dates[0];
            $end_date=$range_dates[1];
            $query=$query->where('tour_start_time','>=',$start_date)
                         ->where('tour_start_time','<=',$end_date);
        }

        $tours=$query->orderBy('tour_start_time', 'desc')->paginate(10);


        return view('admin.tour.index',compact('tours'));

    }

    public function booking($tour_id)
    {
        $bookings=Tours::find($tour_id)->bookings()->paginate(10);;

        return view('admin.booking.index',compact('bookings'));
    }
}
