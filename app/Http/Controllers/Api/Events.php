<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class Events extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events')->with('events', $events);
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event', compact('event'));
    }

    public function create(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:events',
            'date' => 'required|date',
            'author_id' => 'required|integer',
        ]);

        // Check if the author_id exists in the users table
        if (!User::where('id', $validatedData['author_id'])->exists()) {
            // Handle the case where the author_id doesn't exist in the users table
            return redirect()->back()->withErrors(['author_id' => 'The selected author is invalid.']);
        }
        $validatedData['date'] = now()->toDateString();
        $event = Event::create($validatedData);

        return redirect('api/events');
    }
    public function ecreate(Request $request){
        $users = User::all();
        $events  = Event::all();
        return view('ecreate', compact('users') , compact('events'));
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
