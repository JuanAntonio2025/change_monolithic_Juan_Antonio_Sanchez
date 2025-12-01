<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
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

    public function create()
    {
        $categories = Category::all();
        return view('petitions.create', compact('categories'));
    }

    public function listMine()
    {
        try {
            $userId = auth()->id();
            $petitions = \App\Models\Petition::where('user_id', $userId)->get();

            return view('petitions.mine', compact('petitions'));

        } catch (\Throwable $th) {
            return back()->withErrors([$th->getMessage()])->withInput();
        }
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

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'addressee' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            'file' => 'required',
        ]);

        $user = auth()->id();

        $petition = Petition::create([
            'title' => $request->title,
            'description' => $request->description,
            'addressee' => $request->addressee,
            'user_id' => $user,
            'category_id' => $request->category_id,
            'signatories' => 0,
            'status' => 'pending',
        ]);

        if ($request->hasFile('file')) {
            $this->fileUpload($request, $petition->id);
        }

        return redirect()->route('petitions.mine')->with('success', '¡Petición creada con éxito!');
    }

    public function fileUpload(Request $req, $petition_id) {
        $file = $req->file('file');

        if ($file) {
            $originalName = $file->getClientOriginalName();
            $filePath = $file->store('fotos', 'public');
            $fileModel = new File;
            $fileModel->petition_id = $petition_id;
            $fileModel->name = $originalName;
            $fileModel->file_path = $filePath;
            $fileModel->save();

            return $fileModel;
        }

        return null;
    }

    public function peticionesFirmadas(Request $request)
    {
        try {
            $user = auth()->user();

            if (!$user) {
                return redirect()->route('login');
            }

            $petitions = $user->signedPetitions;

            return view('petitions.peticionesfirmadas', compact('petitions'));
        }catch (\Exception $exception){
            return back()->withError( $exception->getMessage())->withInput();
        }
    }


}
