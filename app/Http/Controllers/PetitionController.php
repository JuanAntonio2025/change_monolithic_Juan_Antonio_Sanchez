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

    public function create()
    {
        $categories = Category::all();
        return view('petitions.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'addressee' => 'required|max:255',
            'category_id' => 'required|exists:categories,id',
            //'file' => 'required'
        ]);

        /*$input = $request->all();

        try {
            $category = Category::findOrFail($input['category'])
            $user = auth()->id()
            $petition = new Petition($input)
            $petition->category()->associate($category)
            $petition->user()->associate($user)

            $petition->signatories = 0
            $petition->status = 'pending'

            $res=$petition->save()

            if($res) {
                $res_file = $this->fileUpload($request, $petition->id)
                if ($res_file) {
                    return redirect('mispeticiones')
                }
            }
        } catch(\Exception $e) {
            return back()->withError($e->getMessage())->withInput()
        }
        */

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

    /*
    public function fileUpload(Request $req, $petition_id = null) {
            $file = $req->file('file')
            $fileModel = new File
            $fileModel->petition_id = $petition_id
            if ($req->file('file')) {
                $filename = $fileName = time() . '_' . $file->getClientOriginalName()
                $file->move('petitions')
            }

            $fileModel->name = $filename
            $fileModel->file_path = $filename
            $req = $fileModel->save()
            return $fileModel
        }
    */

}
