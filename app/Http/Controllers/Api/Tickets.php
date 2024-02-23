<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Tickets extends Controller
{
    public function index(){
        $ticket = DB::table('tickets')->get();
        return view('ticket', compact('ticket'));
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
        $ticket = Ticket::findOrFail($id);
        return view('ticket', compact('ticket'));
    }
}
