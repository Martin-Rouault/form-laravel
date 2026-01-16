<?php

namespace App\Http\Controllers;

use App\Mail\GiftCreated;
use App\Models\Gift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class GiftController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gifts = Gift::all();
        return view('gift.index', compact('gifts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('gift.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name'    => 'required|string|min:3|max:50',
            'url'     => 'nullable|url:http,https',
            'details' => 'nullable|string',
            'price'   => 'required|decimal:0,2|min:0',
        ]);

        $gift = Gift::create($validatedData);

        Mail::raw("Le cadeau {$gift->name} a bien été ajouté ({$gift->price}€)", function ($message) use ($gift) {
            $message->to('martin.rlt92@gmail.com')
                ->subject('Nouveau cadeau ajouté');
        });

        Mail::to('martin.rlt92@gmail.com')
            ->send(new GiftCreated($gift));

        return redirect()->route('gifts.index')->with('success', 'Cadeau ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gift $gift)
    {
        return view('gift.show', compact('gift'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gift $gift)
    {
        return view('gift.edit', compact('gift'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gift $gift)
    {
        $validatedData = $request->validate([
            'name'    => 'required|string|min:3|max:50',
            'url'     => 'nullable|url:http,https',
            'details' => 'nullable|string',
            'price'   => 'required|decimal:0,2|min:0',
        ]);

        $gift->update($validatedData);

        return redirect()->route('gifts.index')->with('success', 'Cadeau mis à jour !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gift $gift)
    {
        $gift->delete();

        return redirect()->route('gifts.index')->with('success', 'Cadeau supprimé.');
    }
}
