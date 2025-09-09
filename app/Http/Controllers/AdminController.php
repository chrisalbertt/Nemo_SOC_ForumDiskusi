<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Topik;
use App\Models\Komen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    private function checkLoginAdmin()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('err','Silakan login dulu');
        }
        if (session('role') !== 'ADMIN') {
            return redirect()->route('forum.index')->with('err','Akses ditolak, khusus admin');
        }
        return null;
    }

    // --- Kelola Users ---
    public function index()
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        $users = User::orderBy('id_users')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;
        return view('admin.users.create');
    }

    public function store(Request $r)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        $r->validate([
            'nama_lengkap' => 'required',
            'username'     => 'required|unique:users,username',
            'password'     => 'required|min:4',
        ]);

        User::create([
            'nama_lengkap' => $r->nama_lengkap,
            'username'     => $r->username,
            'password'     => Hash::make($r->password), // pakai plain jika untuk pentest
            'role'         => 'ADMIN',                   // force ADMIN
        ]);

        return redirect()->route('admin.users.index')->with('ok','Admin baru berhasil dibuat');
    }

    /** FORM EDIT */
    public function edit($id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    /** PROSES UPDATE */
    public function update(Request $r, $id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        // username unik, abaikan record saat ini (pk = id_users)
        $r->validate([
            'nama_lengkap' => 'required',
            'username'     => "required|unique:users,username,{$id},id_users",
            'password'     => 'nullable|min:4',
        ]);

        $data = [
            'nama_lengkap' => $r->nama_lengkap,
            'username'     => $r->username,
            'role'         => 'ADMIN', // tetap ADMIN
        ];

        if ($r->filled('password')) {
            $data['password'] = Hash::make($r->password); // pakai plain jika pentest
        }

        User::where('id_users', $id)->update($data);

        return redirect()->route('admin.users.index')->with('ok','Data admin berhasil diupdate');
    }

    public function destroy($id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        if ((int)$id === (int)session('user_id')) {
            return back()->with('err','Tidak bisa hapus akun sendiri');
        }

        User::where('id_users', $id)->delete();
        return back()->with('ok','User berhasil dihapus');
    }

    // --- Kelola Topik (opsional) ---
    public function topics()
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        $topics = Topik::withCount('komens')->orderByDesc('id_topik')->paginate(10);
        return view('admin.topics.index', compact('topics'));
    }

    public function manageTopic($id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        $topik = Topik::with('komens')->findOrFail($id);
        return view('admin.topics.manage', compact('topik'));
    }

    public function destroyTopic($id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        Topik::where('id_topik', $id)->delete();
        return back()->with('ok','Topik berhasil dihapus oleh admin');
    }

    public function destroyComment($id)
    {
        if ($resp = $this->checkLoginAdmin()) return $resp;

        Komen::where('id_komen', $id)->delete();
        return back()->with('ok','Komentar berhasil dihapus oleh admin');
    }
}
