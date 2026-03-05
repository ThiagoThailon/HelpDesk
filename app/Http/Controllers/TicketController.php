<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::all();
        return Inertia::render("Chamados", [
            "tickets" => $tickets
        ]);
    }

    public function store(Request $request)
    {

        
        $request->validate([
            "titulo" => "required",
            "descricao" => "required"
        ]);

       Auth::user()->tickets()->create([
            "titulo" => $request->titulo,
            "descricao" => $request->descricao,
        
        ]);
        
        return redirect()->route('tickets.create');
    }

    public function create()
    {
        return Inertia::render("tickets/CriarTickets");
    }

    public function edit(Ticket $ticket){

        return Inertia::render("EditarChamados", [
            'ticket' => $ticket
        ]);
    }

    public function update( Request $request, Ticket $ticket){


        $request->validate([
            'titulo'=>  'required',
            'descricao'=> 'required',
            'status' => 'required'
            
        ]);

        $ticket->update([
            'titulo' => $request->titulo,
            'descricao' => $request ->descricao,
            'status' => $request->status,
        ]);

        return redirect()->route('tickets.index');
    }
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
