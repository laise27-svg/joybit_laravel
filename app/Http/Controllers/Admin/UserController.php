<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Monolithic Web: List all users.
     */
    public function index(): View
    {
        $users = User::orderBy('id_user', 'asc')->get();
        return view('admin.user_admin', compact('users'));
    }

    /**
     * Monolithic Web: Create or Update user.
     */
    public function store(Request $request): RedirectResponse
    {
        $username = $request->input('username');
        $namaLengkap = $request->input('nama_lengkap');
        $password = $request->input('password');
        $role = $request->input('role');

        if ($request->filled('edit_id')) {
            User::where('id_user', $request->input('edit_id'))->update([
                'username' => $username,
                'nama_lengkap' => $namaLengkap,
                'password' => $password,
                'role' => $role,
            ]);
        } else {
            User::create([
                'username' => $username,
                'nama_lengkap' => $namaLengkap,
                'password' => $password,
                'role' => $role,
            ]);
        }

        return redirect()->back();
    }

    /**
     * Monolithic Web: Delete user.
     */
    public function destroy(Request $request, $id = null): RedirectResponse
    {
        $deleteId = $id ?? $request->query('delete_id');
        if ($deleteId) {
            User::where('id_user', $deleteId)->delete();
        }
        return redirect()->back();
    }

    /**
     * API: Get pembeli users.
     */
    public function apiGet(): JsonResponse
    {
        $pembeli = User::where('role', 'pembeli')
            ->select('id_user', 'username')
            ->get();

        if ($pembeli->count() > 0) {
            return response()->json([
                'status' => 'success',
                'data' => $pembeli,
            ]);
        }

        return response()->json([
            'status' => 'empty',
            'message' => 'Tidak ada data pembeli',
        ]);
    }

    /**
     * API: Pembeli auth login.
     */
    public function apiLogin(Request $request): JsonResponse
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if (empty($username) || empty($password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Username dan Password tidak boleh kosong',
            ]);
        }

        $user = User::where('username', $username)
            ->where('password', $password)
            ->where('role', 'pembeli')
            ->first();

        if ($user) {
            return response()->json([
                'status' => 'success',
                'message' => 'Login Berhasil',
                'data' => [
                    'id_user' => $user->id_user,
                    'username' => $user->username,
                ],
            ]);
        }

        return response()->json([
            'status' => 'error',
            'message' => 'Username atau Password salah',
        ]);
    }
}