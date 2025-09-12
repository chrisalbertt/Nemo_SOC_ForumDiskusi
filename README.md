# 💬 Web Forum Diskusi (Laravel)

## 🔄 Alur Penggunaan
1. **Register** → User baru membuat akun.  
2. **Login** → masuk sesuai role:
   - **Admin** → diarahkan ke Dashboard Admin.
   - **User** → diarahkan ke Dashboard User.
3. **User**
   - Membuat, membaca, mengedit, menghapus topik sendiri.
   - Menambahkan komentar pada topik.
   - Menghapus komentarnya sendiri.
4. **Admin**
   - Mengelola user (tambah, edit, hapus).
   - Menghapus topik & komentar milik user.
5. **Logout** → keluar dari sistem.

---

## ✨ Fitur Utama
- **Autentikasi**
  - Register user baru
  - Login & Logout
- **Role**
  - **Admin**
    - Dashboard Admin
    - CRUD User/Admin
    - Menghapus topik & komentar
  - **User**
    - Dashboard User
    - CRUD Topik (buat, lihat, edit, hapus)
    - Memberi komentar & hapus komentar sendiri
- **Forum Diskusi**
  - Daftar topik beserta jumlah komentar
  - Detail topik + thread komentar
