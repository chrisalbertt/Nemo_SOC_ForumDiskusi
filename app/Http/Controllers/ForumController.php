<?php

namespace App\Http\Controllers;

use App\Models\Topik;
use App\Models\Komen;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    private function checkLogin()
    {
        if (!session()->has('user_id')) {
            return redirect()->route('login')->with('err','Silakan login dulu');
        }
        return null;
    }

    /** Hanya pemilik topik atau ADMIN yang boleh edit/hapus */
    private function authorizeTopikOwnerOrAdmin(Topik $topik)
    {
        $isOwner = (int) session('user_id') === (int) $topik->id_user;
        $isAdmin = session('role') === 'ADMIN';
        if (!($isOwner || $isAdmin)) {
            return redirect()->route('forum.index')->with('err','Tidak boleh mengubah topik orang lain.');
        }
        return null;
    }

    public function index()
    {
        if ($resp = $this->checkLogin()) return $resp;

        $topics = Topik::withCount('komens')->orderByDesc('id_topik')->paginate(10);
        return view('user.forum.index', compact('topics'));
    }

    public function create()
    {
        if ($resp = $this->checkLogin()) return $resp;
        return view('user.forum.create');
    }

    public function store(Request $r)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $r->validate(['Judul' => 'required', 'Isi' => 'required']);

        Topik::create([
            'id_user'  => session('user_id'),
            'username' => session('username'),
            'Judul'    => $r->Judul,
            'Isi'      => $r->Isi
        ]);

        return redirect()->route('forum.index')->with('ok','Topik berhasil dibuat');
    }

    public function show($id)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $topik = Topik::with('komens')->findOrFail($id);
        return view('user.forum.show', compact('topik'));
    }

    public function edit($id)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $topik = Topik::findOrFail($id);
        if ($resp = $this->authorizeTopikOwnerOrAdmin($topik)) return $resp;

        return view('user.forum.edit', compact('topik'));
    }

    public function update(Request $r, $id)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $topik = Topik::findOrFail($id);
        if ($resp = $this->authorizeTopikOwnerOrAdmin($topik)) return $resp;

        $r->validate(['Judul' => 'required', 'Isi' => 'required']);
        $topik->update(['Judul' => $r->Judul, 'Isi' => $r->Isi]);

        return redirect()->route('forum.show', $id)->with('ok','Topik berhasil diupdate');
    }

    public function destroy($id)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $topik = Topik::findOrFail($id);
        if ($resp = $this->authorizeTopikOwnerOrAdmin($topik)) return $resp;

        $topik->delete();
        return redirect()->route('forum.index')->with('ok','Topik berhasil dihapus');
    }

    public function comment(Request $r, $idTopik)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $r->validate(['Isi' => 'required']);

        Komen::create([
            'id_topik' => $idTopik,
            'id_users' => session('user_id'),
            'username' => session('username'),
            'Isi'      => $r->Isi
        ]);

        return back()->with('ok','Komentar berhasil ditambahkan');
    }

    public function deleteComment($id)
    {
        if ($resp = $this->checkLogin()) return $resp;

        $komen   = Komen::findOrFail($id);
        $isOwner = (int) session('user_id') === (int) $komen->id_users;
        $isAdmin = session('role') === 'ADMIN';

        if (!($isOwner || $isAdmin)) {
            return back()->with('err','Tidak boleh menghapus komentar orang lain.');
        }

        $komen->delete();
        return back()->with('ok','Komentar berhasil dihapus');
    }
}
