<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Manajemen User</title>
    <style>
        :root {
            --primary-bg: #FFFBE9;    
            --secondary-bg: #FFFFDC;  
            --accent-orange: #F28B2A; 
            --text-color: #5d5d5d;
            --white: #ffffff;
            --border-color: #f0ead2;
        }

        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            margin: 0;
            display: flex;
            background-color: var(--primary-bg);
            color: var(--text-color);
        }

        .sidebar {
            width: 260px;
            height: 100vh;
            background-color: var(--secondary-bg);
            border-right: 1px solid var(--border-color);
            padding: 30px 20px;
            position: fixed;
        }

        .logo {
            font-size: 28px;
            font-weight: 800;
            color: var(--accent-orange);
            margin-bottom: 40px;
            text-align: center;
            letter-spacing: 1px;
        }

        .nav-menu {
            list-style: none;
            padding: 0;
        }

        .nav-item {
            padding: 14px 20px;
            margin-bottom: 10px;
            border-radius: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-item:hover {
            background-color: #fffdf0;
            color: var(--accent-orange);
        }

        .nav-item.active {
            background-color: var(--accent-orange);
            color: var(--white);
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(242, 139, 42, 0.2);
        }

        .main-content {
            margin-left: 260px;
            padding: 40px;
            width: calc(100% - 260px);
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .card { background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); padding: 1.5rem; margin-bottom: 2.5rem; border: 1px solid #e2e8f0; }
        
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 1rem; border-bottom: 2px solid #e2e8f0; color: #1e293b; font-weight: 600; font-size: 1rem; }
        td { padding: 1rem; border-bottom: 1px solid #f1f5f9; vertical-align: middle; color: #0f172a; font-size: 1rem; }
        
        .action-links { font-weight: bold; font-size: 0.9rem; }
        .link-edit { color: #3b82f6; text-decoration: none; cursor: pointer; margin-right: 10px; }
        .link-delete { color: #ef4444; text-decoration: none; cursor: pointer; }

        .btn-add {
            background-color: var(--accent-orange);
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 25px;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 10px rgba(242, 139, 42, 0.3);
            transition: transform 0.2s, background-color 0.2s;
        }

        .btn-add:hover {
            transform: scale(1.05);
            background-color: #e67e17;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.4);
            z-index: 1000;
        }

        .modal-content {
            background: var(--white);
            width: 400px;
            margin: 80px auto;
            padding: 30px;
            border-radius: 20px;
        }

        .modal-content input, .modal-content select {
            width: 100%;
            margin-bottom: 15px;
            padding: 12px;
            border: 1px solid #eee;
            border-radius: 10px;
            outline: none;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }

        .btn-cancel { background: #eee; border: none; padding: 10px 20px; border-radius: 10px; cursor: pointer; }
        .btn-save { background: var(--accent-orange); color: white; border: none; padding: 10px 20px; border-radius: 10px; cursor: pointer; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/joybite-theme.css') }}">
</head>
<body class="page-admin-users">

    <aside class="sidebar">
        <div class="logo">JoyBite</div>
        <ul class="nav-menu">
            <li class="nav-item active">Manajemen User</li>
            <li class="nav-item" onclick="window.location.href='{{ url('/admin/validasi.php') }}'">Validasi Produk</li>
            <li class="nav-item" onclick="logout()" style="color: #d9534f; margin-top: 30px; font-weight: bold;">Logout</li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Manajemen User</h1>
            <button class="btn-add" onclick="openModal()">+ Tambah User</button>
        </header>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Role</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($users->isEmpty())
                        <tr><td colspan="5" style="text-align: center;">Tidak ada data user.</td></tr>
                    @else
                        @foreach ($users as $u)
                            <tr>
                                <td>{{ $u->id_user }}</td>
                                <td>{{ $u->username }}</td>
                                <td>{{ $u->nama_lengkap }}</td>
                                <td>{{ $u->role }}</td>
                                <td class="action-links">
                                    <span class="link-edit" onclick="editUser({{ $u->id_user }}, '{{ addslashes($u->username) }}', '{{ addslashes($u->nama_lengkap) }}', '{{ addslashes($u->password) }}', '{{ addslashes($u->role) }}')">[Edit]</span>
                                    <a href="{{ url('/admin/user_admin.php') }}?delete_id={{ $u->id_user }}" class="link-delete" onclick="return confirm('Yakin ingin menghapus user ini?')">[Hapus]</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>

    <div id="userModal" class="modal">
        <div class="modal-content">
            <h2 id="modalTitle" style="color: var(--accent-orange); margin-top: 0;">Tambah User</h2>
            <form action="{{ url('/admin/user_admin.php') }}" method="POST">
                @csrf
                <input type="hidden" name="edit_id" id="edit_id">
                <input type="text" name="username" id="username" placeholder="Username" required>
                <input type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
                <input type="text" name="password" id="password" placeholder="Password" required>
                <select name="role" id="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="penjual">Penjual</option>
                    <option value="pembeli">Pembeli</option>
                </select>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() { 
            document.getElementById('modalTitle').innerText = "Tambah User";
            document.getElementById('edit_id').value = "";
            document.getElementById('username').value = "";
            document.getElementById('nama_lengkap').value = "";
            document.getElementById('password').value = "";
            document.getElementById('role').value = "";
            document.getElementById('userModal').style.display = 'block'; 
        }
        function closeModal() { document.getElementById('userModal').style.display = 'none'; }
        window.onclick = function(event) {
            const modal = document.getElementById('userModal');
            if (event.target == modal) closeModal();
        }
        
        function editUser(id, uname, fname, pass, role) {
            document.getElementById('modalTitle').innerText = "Edit User";
            document.getElementById('edit_id').value = id;
            document.getElementById('username').value = uname;
            document.getElementById('nama_lengkap').value = fname;
            document.getElementById('password').value = pass;
            document.getElementById('role').value = role;
            document.getElementById('userModal').style.display = 'block';
        }

        function logout() {
            if(confirm("Apakah Anda yakin ingin keluar?")) {
                localStorage.clear();
                window.location.href = "{{ url('/login.html') }}";
            }
        }
        if(localStorage.getItem("role") !== "admin") {
            window.location.href = "{{ url('/login.html') }}";
        }
    </script>
</body>
</html>
