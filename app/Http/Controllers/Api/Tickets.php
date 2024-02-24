<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tickets extends Controller
{
    public function index(){

        $tickets = Ticket::latest()->get();
        return view('tickets')->with('tickets', $tickets);

    }

    public function edit($id)
    {
        $ticket = DB::table('tickets')->find($id);
        return view('ticket', compact('ticket'));
    }

    public function update(Request $request, $id)
    {
        DB::table('tickets')->where('id', $id)->update([
            'name' => $request->name,
            'cost' => $request->cost,
            'body' => $request->body,
        ]);
    }

    public function show($id)
    {
        $tickets = Ticket::find($id);
        return view('tick')->with('tickets', $tickets);
    }
}
