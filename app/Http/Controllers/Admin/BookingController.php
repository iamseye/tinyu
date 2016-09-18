<?php

namespace App\Http\Controllers\Admin;

use App\Bookings;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Traits\MsgTrait;
use Illuminate\Support\Facades\DB;


class BookingController extends Controller
{
    use MsgTrait;
    //
    public function index()
    {
        $bookings=Bookings::orderBy('situation', 'asc')->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.booking.index',compact('bookings'));
    }

    public function show($id)
    {
        $booking=Bookings::findOrFail($id);
        $booking->tour_title=$booking->tour->title;
        $booking->age_range=$booking->age->range;
        $booking->tour_type=$booking->tour->tour_type;

        return view('admin.booking.edit',compact('booking'));
    }

    public function update(Request $request, $id)
    {
       Bookings::findOrFail($id)->update($request->all());

        $this->succMsg($request,'Data updated');

        return redirect('admin/booking');
    }

    public function search(Request $request)
    {
        $title = $request->get('title');
        $name=$request->get('name');

        $query = DB::table('bookings')
            ->join('tours', 'bookings.tours_id', '=', 'tours.id')
            ->select('bookings.*', 'tours.title');

        if($title!='')
        {
            $query= $query->where('tours.title', 'LIKE', '%'.$title.'%');
        }

        if($name!='')
        {
            $query=$query->where('bookings.name', 'LIKE', '%'.$name.'%');
        }

        $bookings=$query->orderBy('bookings.situation', 'asc')->orderBy('bookings.created_at', 'desc')->paginate(10);


        return view('admin.booking.index',compact('bookings'));
    }
}
