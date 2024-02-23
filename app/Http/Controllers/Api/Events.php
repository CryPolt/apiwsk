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
        return view('dashboard')->with('events', $events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event', compact('event'));
    }

    public function create(Request $request)
    {
        $event = Event::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Event Created Successfully',
            'event' => $event
        ], 200);
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

}
