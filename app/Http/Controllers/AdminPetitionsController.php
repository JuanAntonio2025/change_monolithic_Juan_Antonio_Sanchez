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

    public function show() {
        $petitions = Petition::all();
        return view('admin.petitions.show', compact('petitions'));
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

        // Subida de imágenes
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

        // Opcional: evitar sobrescribir archivos con el mismo nombre
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

        // Actualizar datos de la petición
        $petition->update([
            'title' => $request->title,
            'description' => $request->description,
            'addressee' => $request->addressee,
            'signatories' => $request->signatories ?? $petition->signatories,
            'status' => $request->status,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
        ]);

        // Subir nuevas imágenes
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $this->fileUpload($file, $petition->id);
            }
        }

        return redirect()->route('admin.petitions.show')->with('success', '¡Petición actualizada con éxito!');
    }

    // Eliminar imagen individual
    public function delete($file_id) {
        $file = File::findOrFail($file_id);

        // Borrar archivo físico
        $filePath = public_path($file->file_path);
        if(file_exists($filePath)) {
            unlink($filePath);
        }

        // Borrar registro en DB
        $file->delete();
        return back()->with('success', 'Imagen eliminada');
    }

    public function deletePetition($id) {
        $petition = Petition::findOrFail($id);

        // Borrar todas las imágenes asociadas
        foreach($petition->files as $file) {
            $filePath = public_path($file->file_path);
            if(file_exists($filePath)) {
                unlink($filePath);
            }
            $file->delete();
        }

        // Borrar la petición
        $petition->delete();
    }
}
