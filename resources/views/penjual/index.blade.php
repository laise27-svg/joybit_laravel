<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite Penjual Panel</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: #fafaf9; color: #334155; padding: 2rem; }
        .container { max-width: 1000px; margin: 0 auto; }
        
        .header-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; }
        .header-top h2 { font-size: 1.5rem; font-weight: bold; color: #000; margin: 0; }
        .product-count { color: #475569; font-size: 0.9rem; }
        
        .card { background-color: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); padding: 1.5rem; margin-bottom: 2.5rem; border: 1px solid #e2e8f0; }
        
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th { padding: 1rem; border-bottom: 2px solid #e2e8f0; color: #1e293b; font-weight: 600; font-size: 1rem; }
        td { padding: 1rem; border-bottom: 1px solid #f1f5f9; vertical-align: middle; color: #0f172a; font-size: 1rem; }
        
        .action-links { font-weight: bold; font-size: 0.9rem; }
        .link-edit { color: #3b82f6; text-decoration: none; cursor: pointer; margin-right: 10px; }
        .link-delete { color: #ef4444; text-decoration: none; cursor: pointer; }
        
        .section-title { font-size: 1.5rem; font-weight: bold; color: #000; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem; }
        
        .form-container { background-color: #ffffff; border-radius: 12px; padding: 2rem; border: 1px solid #e2e8f0; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05); }
        .form-group { margin-bottom: 1.5rem; }
        label { display: block; font-size: 0.9rem; font-weight: bold; color: #000; margin-bottom: 0.5rem; }
        input { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; outline: none; font-size: 0.9rem; }
        input:focus { border-color: #f97316; box-shadow: 0 0 0 2px #ffedd5; }
        
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; }
        
        .button-group { display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1rem; }
        .btn-cancel { background-color: #ffffff; color: #334155; border: 1px solid #94a3b8; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: bold; cursor: pointer; display: none; }
        .btn-cancel:hover { background-color: #f8fafc; }
        .btn-save { background-color: #f97316; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: bold; cursor: pointer; }
        .btn-save:hover { background-color: #ea580c; }
        
        .logout-btn { background-color: #ef4444; color: white; border: none; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer; font-weight: bold; margin-bottom: 1rem; float: right; }
        .logout-btn:hover { background-color: #dc2626; }
        .clearfix::after { content: ""; clear: both; display: table; }
    </style>
    <link rel="stylesheet" href="{{ asset('css/joybite-theme.css') }}">
</head>
<body class="page-seller">

    <div class="container">
        <div class="clearfix">
            <a href="{{ url('/penjual/index.html') }}" class="seller-brand">
                <span class="material-symbols-outlined">bakery_dining</span>
                JoyBite
            </a>
            <button class="logout-btn" onclick="logout()">Keluar / Logout</button>
        </div>

        <div class="header-top">
            <h2>Produk yang Terdaftar</h2>
            <span class="product-count" id="productCount">Menampilkan 0 produk</span>
        </div>

        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelDessert">
                    <!-- Data will be loaded here -->
                </tbody>
            </table>
        </div>

        <div class="header-top">
            <h2>Daftar Pesanan Pembeli</h2>
        </div>
        <div class="card">
            <table>
                <thead>
                    <tr>
                        <th>ID Pesanan</th>
                        <th>Nama Pembeli</th>
                        <th>Total Harga</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tabelPesanan">
                    <!-- Data pesanan will be loaded here -->
                </tbody>
            </table>
        </div>

        <div class="section-title">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
            </svg>
            <span id="formTitleText">Formulir tambah / ubah produk</span>
        </div>

        <div class="form-container">
            <form id="formTambah">
                <input type="hidden" id="edit_id">

                <div class="form-group">
                    <label>Nama Produk</label>
                    <input type="text" id="nama" placeholder="Contoh : Cromboloni" required>
                </div>
                
                <div class="form-grid">
                    <div class="form-group">
                        <label>Harga Jual</label>
                        <input type="number" id="harga" placeholder="25000" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Stok</label>
                        <input type="number" id="stok" placeholder="40" required>
                    </div>
                </div>

                <div class="button-group">
                    <button type="button" class="btn-cancel" id="btnCancel" onclick="batalEdit()">Batalkan Pengisian</button>
                    <button type="submit" class="btn-save" id="btnSubmit">Simpan Semua Perubahan</button>
                </div>
            </form>
        </div>

    </div>

    <script>
    if(localStorage.getItem("isLoggedIn") !== "true") {
        window.location.href = "{{ url('/login.html') }}";
    }

    function logout() {
        localStorage.removeItem("isLoggedIn");
        localStorage.removeItem("role");
        localStorage.removeItem("id_user");
        localStorage.removeItem("username");
        window.location.href = "{{ url('/login.html') }}"; 
    }

    const baseURL = "{{ url('/penjual') }}";

    function muatDataDessert() {
        fetch(`${baseURL}/dessert_api.php?api_key=joybite123`)
            .then(response => response.json())
            .then(hasil => {
                const tabel = document.getElementById('tabelDessert');
                const countText = document.getElementById('productCount');
                tabel.innerHTML = ''; 

                if (hasil.status === "success") {
                    countText.innerText = `Menampilkan ${hasil.data.length} produk`;
                    hasil.data.forEach(item => {
                        tabel.innerHTML += `
                            <tr>
                                <td>${item.nama_dessert}</td>
                                <td>Rp. ${parseInt(item.harga).toLocaleString('id-ID')}</td>
                                <td>${item.stok}</td>
                                <td class="action-links">
                                    <span class="link-edit" onclick="editDessert('${item.id}', '${item.nama_dessert}', '${item.harga}', '${item.stok}')">[Edit]</span>
                                    <span class="link-delete" onclick="hapusDessert(${item.id})">[Hapus]</span>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    countText.innerText = `Menampilkan 0 produk`;
                    tabel.innerHTML = `<tr><td colspan="4" style="text-align: center; color: #ef4444;">${hasil.message}</td></tr>`;
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }

    function hapusDessert(id) {
        if (confirm("Apakah kamu yakin ingin menghapus menu ini?")) {
            fetch(`${baseURL}/dessert_api.php?id=${id}&api_key=joybite123`, { method: 'DELETE' })
                .then(response => response.json())
                .then(hasil => {
                    if (hasil.status === "success") {
                        alert(hasil.message);
                        muatDataDessert();
                    } else {
                        alert("Gagal menghapus: " + hasil.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }

    function muatDataPesanan() {
        fetch(`${baseURL}/pesanan_api.php?api_key=joybite123`)
            .then(response => response.json())
            .then(hasil => {
                const tabel = document.getElementById('tabelPesanan');
                tabel.innerHTML = ''; 
                if (hasil.status === "success" && hasil.data.length > 0) {
                    hasil.data.forEach(item => {
                        tabel.innerHTML += `
                            <tr>
                                <td>#${item.id}</td>
                                <td>${item.nama_pembeli}</td>
                                <td>Rp. ${parseInt(item.total_harga).toLocaleString('id-ID')}</td>
                                <td><b>${item.status}</b></td>
                                <td>${item.tanggal}</td>
                                <td class="action-links">
                                    <span class="link-edit" onclick="updateStatusPesanan(${item.id})">[Proses]</span>
                                    <span class="link-delete" onclick="hapusPesanan(${item.id})">[Hapus]</span>
                                </td>
                            </tr>
                        `;
                    });
                } else {
                    tabel.innerHTML = `<tr><td colspan="6" style="text-align: center;">Belum ada pesanan</td></tr>`;
                }
            })
            .catch(error => console.error('Error:', error));
    }

    function updateStatusPesanan(id) {
        if (confirm("Ubah status pesanan ini menjadi Selesai?")) {
            fetch(`${baseURL}/pesanan_api.php?api_key=joybite123`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ id: id, status: 'Selesai' })
            })
            .then(res => res.json())
            .then(res => { alert(res.message); muatDataPesanan(); })
            .catch(err => console.error(err));
        }
    }

    function hapusPesanan(id) {
        if (confirm("Yakin ingin menghapus pesanan ini?")) {
            fetch(`${baseURL}/pesanan_api.php?id=${id}&api_key=joybite123`, { method: 'DELETE' })
            .then(res => res.json())
            .then(res => { alert(res.message); muatDataPesanan(); })
            .catch(err => console.error(err));
        }
    }

    function editDessert(id, nama, harga, stok) {
        document.getElementById('edit_id').value = id;
        document.getElementById('nama').value = nama;
        document.getElementById('harga').value = harga;
        document.getElementById('stok').value = stok;

        document.getElementById('btnCancel').style.display = "block";
        window.scrollTo({ top: document.body.scrollHeight, behavior: 'smooth' });
    }

    function batalEdit() {
        document.getElementById('formTambah').reset();
        document.getElementById('edit_id').value = "";
        document.getElementById('btnCancel').style.display = "none";
    }

    document.getElementById('formTambah').addEventListener('submit', function(e) {
        e.preventDefault(); 

        const idEdit = document.getElementById('edit_id').value;
        const urlTarget = `${baseURL}/dessert_api.php?api_key=joybite123`;
        const methodType = idEdit ? 'PUT' : 'POST';

        const dataKirim = {
            id: idEdit,
            nama_dessert: document.getElementById('nama').value,
            harga: document.getElementById('harga').value,
            stok: document.getElementById('stok').value
        };

        fetch(urlTarget, {
            method: methodType,
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(dataKirim)
        })
        .then(response => response.json())
        .then(hasil => {
            if(hasil.status === "success") {
                alert("Berhasil: " + hasil.message);
                batalEdit();
                muatDataDessert();
            } else {
                alert("Gagal: " + hasil.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Terjadi kesalahan jaringan.");
        });
    });

    muatDataDessert();
    muatDataPesanan();
    </script>
</body>
</html>
