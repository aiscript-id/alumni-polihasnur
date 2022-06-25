<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Tracer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $tracers = Tracer::active()->with('my_tracer')->get();
        // return response()->json($tracers);
        return view('user.dashboard', compact('tracers'));
    }

    public function profile()
    {
        $user = Auth::user();
        $prodi = Prodi::all();
        return view('user.profile', compact('user', 'prodi'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'whatsapp' => $request->whatsapp,
            // 'company' => $request->company,
            // 'position' => $request->position,
            'address' => $request->address,
            'prodi_id' => $request->prodi_id,
            'angkatan' => $request->angkatan,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_lulus' => $request->tahun_lulus,
        ];

        $user->update($data);

        toastr()->success('Profile berhasil diperbarui');
        return redirect()->route('user.profile');
    }

    public function updatePassword(Request $request)
    {
        // check old password

        $user = Auth::user();
        $request->validate([
            'old_password' => 'required|string|min:8',
            'password' => 'required|string|min:8',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            toastr()->success('Password berhasil diperbarui');
            return redirect()->route('user.profile');
        } else {
            toastr()->error('Password lama tidak sesuai');
            return redirect()->route('user.profile');
        }

    }


    public function alumni()
    {
        $users = User::role('user')->latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }
}
