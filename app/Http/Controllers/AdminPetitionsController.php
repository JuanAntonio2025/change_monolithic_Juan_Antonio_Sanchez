<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\File;
use App\Models\Petition;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPetitionsController extends Controller
{
    public function index() {
        return view('admin.petitions.index');
    }

    public function show()
    {
        $petitions = Petition::with(['category', 'user'])->orderBy('created_at', 'asc')->paginate(5);
        return view('admin.petitions.show', compact('petitions'));
    }

    public function details($id) {
        $petition = Petition::findOrFail($id);
        return view('admin.petitions.details', compact('petition'));
    }

    public function create() {
        $users = User::all();
        $categories = Category::all();
        return view('admin.petitions.edit-add', compact('users', 'categories'));
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'addressee' => 'required|max:255',
            'signatories' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,accepted',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $petition = Petition::create([
            'title' => $request->title,
            'description' => $request->description,
            'addressee' => $request->addressee,
            'signatories' => $request->signatories,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $this->fileUpload($file, $petition->id);
            }
        }

        return redirect()->route('admin.petitions.show')->with('success', '¡Petición creada con éxito!');
    }

    public function fileUpload($file, $petition_id) {
        $destino = public_path('fotos');
        $originalName = $file->getClientOriginalName();

        $uniqueName = time() . '_' . $originalName;

        $file->move($destino, $uniqueName);
        $relativePath = 'fotos/' . $uniqueName;

        $fileModel = new File;
        $fileModel->petition_id = $petition_id;
        $fileModel->name = $originalName;
        $fileModel->file_path = $relativePath;
        $fileModel->save();

        return $fileModel;
    }

    public function edit($id) {
        $petition = Petition::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('admin.petitions.update', compact('petition', 'users', 'categories'));
    }

    public function update(Request $request, $id) {
        $petition = Petition::findOrFail($id);

        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'addressee' => 'required|max:255',
            'signatories' => 'nullable|integer|min:0',
            'status' => 'required|in:pending,accepted',
            'user_id' => 'required|exists:users,id',
            'category_id' => 'required|exists:categories,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $petition->update([
            'title' => $request->title,
            'description' => $request->description,
            'addressee' => $request->addressee,
            'signatories' => $request->signatories ?? $petition->signatories,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $this->fileUpload($file, $petition->id);
            }
        }

        return redirect()->route('admin.petitions.show')->with('success', '¡Petición actualizada con éxito!');
    }

    public function delete($file_id) {
        $file = File::findOrFail($file_id);

        $filePath = public_path($file->file_path);
        if(file_exists($filePath)) {
            unlink($filePath);
        }

        $file->delete();
        return back()->with('success', 'Imagen eliminada');
    }

    public function deletePetition($id) {
        $petition = Petition::findOrFail($id);

        foreach($petition->files as $file) {
            $filePath = public_path($file->file_path);
            if(file_exists($filePath)) {
                unlink($filePath);
            }
            $file->delete();
        }

        $petition->delete();
        return back()->with('success', 'Imagen eliminada');
    }
}
