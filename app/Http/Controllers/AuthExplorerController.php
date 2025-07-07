<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Explorer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthExplorerController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string|max:255|unique:explorers,name',
                'age' => 'nullable|numeric|max:999',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $explorer = Explorer::create([
                'name' => $fields['name'],
                'age' => $fields['age'],
                'password' => bcrypt($fields['password']),
            ]);

            $token = $explorer->createToken('explorer_token')->plainTextToken;
            $explorer->token = $token;

            return response()->json([
                'message' => 'Explorer registered successfully',
                'token' => $token,
                'data' => $explorer
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function login(Request $request): JsonResponse
    {
        try {
            $fields = $request->validate([
                'name' => 'required|string',
                'password' => 'required|string',
            ]);

            $explorer = Explorer::where('name', $fields['name'])->first();

            if (!$explorer || !Hash::check($fields['password'], $explorer->password)) {
                return response()->json([
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $token = $explorer->createToken('explorer_token')->plainTextToken;

            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'data' => $explorer
            ], 200);

        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $e->errors()
            ], 422);
        }
    }

}
