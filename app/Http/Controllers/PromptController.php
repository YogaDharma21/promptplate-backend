<?php

namespace App\Http\Controllers;

use App\Models\Prompt;
use Illuminate\Http\Request;

class PromptController extends Controller
{
    public function index()
    {
        try {
            $prompt = Prompt::all();
            return response()->json($prompt);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'tag_id' => 'required|exists:tags,id',
        ]);

        try {
            $request->user()->prompts()->create($validatedData);
            return response()->json(['message' => 'Prompt created successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
