<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Validasi Produk</title>
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

        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 50px;
        }

        .product-card {
            background: var(--white);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.03);
            border: 1px solid transparent;
            transition: border 0.3s, transform 0.3s;
        }

        .product-card:hover {
            border: 1px solid var(--accent-orange);
            transform: translateY(-5px);
        }

        .image-placeholder {
            width: 100%;
            height: 160px;
            background-color: var(--secondary-bg);
            border-radius: 15px;
            margin-bottom: 15px;
        }

        .product-card h3 {
            margin: 10px 0 5px 0;
            font-size: 18px;
            color: #444;
        }

        .store-name {
            font-size: 14px;
            color: #999;
            margin-bottom: 15px;
        }

        .status-badge {
            background-color: #fff4e6;
            color: var(--accent-orange);
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-delete {
            margin-top: 15px;
            background: none;
            border: none;
            color: #d9534f;
            cursor: pointer;
            font-size: 13px;
            padding: 0;
            font-weight: bold;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete:hover {
            text-decoration: underline;
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

        .modal-content input, .modal-content textarea {
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
<body class="page-admin-validations">

    <aside class="sidebar">
        <div class="logo">JoyBite</div>
        <ul class="nav-menu">
            <li class="nav-item" onclick="window.location.href='{{ url('/admin/user_admin.php') }}'">Manajemen User</li>
            <li class="nav-item active">Validasi Produk</li>
            <li class="nav-item" onclick="logout()" style="color: #d9534f; margin-top: 30px; font-weight: bold;">Logout</li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Validasi Produk</h1>
            <button class="btn-add" onclick="openModal()">+ Tambah Produk</button>
        </header>

        <section class="product-grid">
            @if ($products->isEmpty())
                <p>Tidak ada produk untuk divalidasi.</p>
            @else
                @foreach ($products as $p)
                    <div class="product-card">
                        <div class="image-placeholder"></div>
                        <h3>{{ $p->nama_produk }}</h3>
                        <div class="store-name">{{ $p->nama_toko }}</div>
                        <span class="status-badge">{{ $p->status }}</span>
                        <p style="font-size: 14px; line-height: 1.5; color: #666; margin-top: 10px;">{{ $p->deskripsi }}</p>
                        <a href="{{ url('/admin/validasi.php') }}?delete_id={{ $p->id_validasi }}" class="btn-delete" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus Produk</a>
                    </div>
                @endforeach
            @endif
        </section>
    </main>

    <div id="productModal" class="modal">
        <div class="modal-content">
            <h2 style="color: var(--accent-orange); margin-top: 0;">Tambah Produk</h2>
            <form action="{{ url('/admin/validasi.php') }}" method="POST">
                @csrf
                <input type="text" name="nama_produk" placeholder="Nama Produk" required>
                <input type="text" name="nama_toko" placeholder="Nama Toko" required>
                <textarea name="deskripsi" rows="4" placeholder="Deskripsi Produk"></textarea>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" name="tambah_produk" class="btn-save">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openModal() { document.getElementById('productModal').style.display = 'block'; }
        function closeModal() { document.getElementById('productModal').style.display = 'none'; }
        window.onclick = function(event) {
            const modal = document.getElementById('productModal');
            if (event.target == modal) closeModal();
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
