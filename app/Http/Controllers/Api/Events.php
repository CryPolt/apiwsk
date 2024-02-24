<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class Events extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events')->with('events', $events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event', compact('event'));
    }

    public function create(Request $request)
    {
        $event = Event::create($request->all());
        return redirect('api/events');
    }
    public function ecreate(Request $request){
        return view('ecreate');
    }
    public function edit($id)
    {
        $event = DB::table('events')->find($id);
        return view('edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        DB::table('events')->where('id', $id)->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'body' => $request->body,
        ]);

    }


    public function destroy($id)
    {
        DB::table('events')->where('id', $id)->delete();
        return redirect('api/events');
    }

}
