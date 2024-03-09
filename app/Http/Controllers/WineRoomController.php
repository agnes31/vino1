<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bottle;
use App\Models\Cellar;
use App\Models\WineRoom;
use Illuminate\Support\Facades\Auth;

class WineRoomController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        // 
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function destroy(Request $request)
    {
        $bottleId = $request->input('bottleId');
        $cellarId = $request->input('cellarId');
        $wineRoom = WineRoom::where('saq_bottle_id', $bottleId)
            ->where('cellar_id', $cellarId)
            ->first();
        if ($wineRoom) {
            $wineRoom->delete();
        }

        return redirect()->route('cellars.show', $cellarId);
    }

    public function addBottleToCellar(string $id)
    {

        $cellars = Cellar::all()->where('user_id', Auth::user()->id);
        $bottles = Bottle::all()->where('id', $id);

        return view('bottlesCellar.addBottleToCellar', ['cellars' => $cellars, 'bottleId' => $id, 'bottles' => $bottles]);
    }

    public function add(Request $request)
    {
        $cellarId = $request->input('cellarId');
        $bottleId = $request->input('bottleId');
        $quantity = $request->input('quantity', 0);

        // Vérifiez si il y a deja un item dans le cellier
        $wineRoom = WineRoom::where('saq_bottle_id', $bottleId)
            ->where('cellar_id', $cellarId)
            ->first();

        if ($wineRoom) {
            // Si l'association existe, mettez à jour la quantité
            $wineRoom->quantity += $quantity;
            $wineRoom->save();
        } else {
            // Sinon, créez une nouvelle association
            $wineRoom = new WineRoom([
                'saq_bottle_id' => $bottleId,
                'cellar_id' => $cellarId,
                'quantity' => $quantity
            ]);
            $wineRoom->save();
        }
        return redirect()->route('cellars.show', $cellarId);
    }
}
