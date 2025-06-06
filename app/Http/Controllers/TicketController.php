<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$tickets = Tiket::all();
        $tickets = Ticket::with('provincia')->get();

        $tickets = $tickets->map(function ($ticket) {
            return [
                'id' => $ticket->id,
                'nombre' => $ticket->nombre,
                'provincia' => [
                    'id' => $ticket->provincia->id,
                    'nombre' => $ticket->provincia->nombre
                ]
            ];
        });
        return response()->json($tickets);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = Ticket::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'provincia_id' => $request->provincia_id,
        ]);

        return response()->json($ticket);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $ticket = Ticket::find($id);
        return response()->json($ticket);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $ticket = Ticket::find($id);
        $ticket->nombre = $request->nombre;
        $ticket->descripcion = $request->descripcion;
        $ticket->provincia_id = $request->provincia_id;
        $ticket->save();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
    }
}
