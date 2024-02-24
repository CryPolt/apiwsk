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
    public function create(Request $request)
    {
        $ticket = Ticket::create($request->all());
        return redirect('api/tickets');
    }

    public function tcreate(){
        return view('tcreate');
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
        redirect()->back();
    }

    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        return view('tick')->with('tickets', [$ticket]);


    }
}
