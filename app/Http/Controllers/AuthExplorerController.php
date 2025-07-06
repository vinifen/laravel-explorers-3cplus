<?php

namespace App\Http\Controllers;

use App\Models\Explorer;
use Illuminate\Http\Request;

class AuthExplorerController extends Controller
{
    public function register(Request $request) {

        $fileds = $request->validate([
            'name' => 'required|string|max:255|unique:explorers,name',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Explorer::create($fileds);

        return response()->json(['message' => 'Register endpoint', 'data' => $request->all()]);
    }

    public function login(Request $request) {
        return response()->json(['message' => 'Login endpoint', 'data' => $request->all()]);
    }

        public function logout(Request $request) {
        return response()->json(['message' => 'Logout endpoint', 'data' => $request->all()]);
    }
}
