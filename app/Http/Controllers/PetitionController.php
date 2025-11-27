<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Petition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PetitionController extends Controller
{
    public function index() {
        $petitions = Petition::all();
        return view('petitions.index', compact('petitions'));
    }

    public function show(Request $request, $id) {
        $petition = Petition::findOrFail($id);
        return view('petitions.show', compact('petition'));
    }

    public function listMine()
    {
        $userId = auth()->id();
        $petitions = \App\Models\Petition::where('user_id', $userId)->get();

        return view('petitions.mine', compact('petitions'));
    }

    public function firmar(Request $request, $id)
    {
        try {
            $petition = Petition::findOrFail($id);
            $userID = auth()->id();

            if (!$userID) {
                return redirect()->route('login');
            }

            if ($petition->userSigners()->where('user_id', $userID)->exists()) {
                return back()->with('error', 'Ya has firmado esta petición');
            }

            $petition->userSigners()->attach($userID);
            $petition->increment('signatories');

            return back()->with('success', 'Has firmado la petición');
        }
        catch (\Exception $e) {
            \Log::error("Error al firmar la petición ID {$id}: " . $e->getMessage());
            return back()->with('error', 'Ocurrió un error inesperado al procesar la firma.');
        }
    }

    public function create()
    {
        // Recupera todas las categorías activas o disponibles
        $categories = Category::all();

        // Pasa las categorías a la vista
        return view('petitions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'addressee' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        $user = auth()->id();

        $petition = Petition::create([
            'title' => $request->title,
            'description' => $request->description,
            'addressee' => $request->addressee,

            'user_id' => $user,
            'category_id' => $request->category_id,
            'signatories' => 0,
            'status' => 'accepted',
        ]);

        return redirect()->route('petitions.mine')->with('success', '¡Petición creada con éxito!');
    }

}
