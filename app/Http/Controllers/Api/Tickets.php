<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tickets extends Controller
{
    public function index(){

        $tickets = Ticket::latest()->get();
        return view('tickets')->with('tickets', $tickets);

    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'cost' => 'required|numeric|unique:tickets',
        'body' => 'required|string',
        'author_id' => 'required|exists:users,id',
    ]);

        // Check if the author_id exists in the users table
        if (!User::where('id', $validatedData['author_id'])->exists()) {
            // Handle the case where the author_id doesn't exist in the users table
            return redirect()->back()->withErrors(['author_id' => 'The selected author is invalid.']);
        }

        $ticket = Ticket::create($validatedData);
        return redirect('api/tickets');
    }

    public function tcreate(Request $request){
        $users = User::all();
        return view('tcreate' , compact('users'));
    }
    public function edit($id)
    {
        $ticket = DB::table('tickets')->find($id);
        return view('ticket', compact('ticket'));
    }

    public function destroy($id)
    {
        DB::table('tickets')->where('id', $id)->delete();
        return redirect('api/tickets');
    }

    public function update(Request $request, $id)
    {
        DB::table('tickets')->where('id', $id)->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'body' => $request->body,
        ]);
        return redirect('api/tickets/');
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tick')->with('tickets', [$ticket]);


    }
}
