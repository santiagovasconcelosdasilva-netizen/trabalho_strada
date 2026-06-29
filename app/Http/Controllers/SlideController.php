<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class SlideController extends Controller
{
    public function index()
    {
        $slides = Slide::orderBy('priority')->orderBy('id')->get();

        return view('slides.dashboard', compact('slides'));
    }

    public function create()
    {
        return view('slides.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tag' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'image_path' => ['required', 'image', 'mimes:jpeg,png,gif', 'max:2048'],
            'priority' => ['required', 'integer', 'min:1', 'max:999'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (Schema::hasColumn('slides', 'is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        if ($request->hasFile('image_path')) {
            $validated['image_path'] = $request->file('image_path')->store('slides', 'public');
        }

        Slide::create($validated);

        return redirect()->route('slides.index')->with('success', 'Slide criado com sucesso.');
    }

    public function show(Slide $slide)
    {
        return view('slides.show', compact('slide'));
    }

    public function edit(Slide $slide)
    {
        return view('slides.edit', compact('slide'));
    }

    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'tag' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:1000'],
            'image_path' => ['nullable', 'image', 'mimes:jpeg,png,gif', 'max:2048'],
            'priority' => ['required', 'integer', 'min:1', 'max:999'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if (Schema::hasColumn('slides', 'is_active')) {
            $validated['is_active'] = $request->boolean('is_active');
        }

        if ($request->hasFile('image_path')) {
            // Delete old image if exists
            if ($slide->image_path && \Storage::disk('public')->exists($slide->image_path)) {
                \Storage::disk('public')->delete($slide->image_path);
            }
            $validated['image_path'] = $request->file('image_path')->store('slides', 'public');
        }

        $slide->update($validated);

        return redirect()->route('slides.index')->with('success', 'Slide atualizado com sucesso.');
    }

    public function destroy(Slide $slide)
    {
        $slide->delete();

        return redirect()->route('slides.index')->with('success', 'Slide excluído com sucesso.');
    }
}
