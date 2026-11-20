<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ulasan Produk - JoyBite</title>
    <style>
        :root {
            --primary-bg: #FFFBE9;
            --accent-orange: #F28B2A;
            --text-color: #334155;
            --white: #ffffff;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background-color: var(--primary-bg); color: var(--text-color); padding: 2rem; }
        .container { max-width: 800px; margin: 0 auto; }
        h1 { margin-bottom: 2rem; color: #000; text-align: center; }
        
        .card { background: var(--white); padding: 2rem; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 2rem; }
        .form-group { margin-bottom: 1rem; }
        label { display: block; font-weight: bold; margin-bottom: 0.5rem; }
        input, select, textarea { width: 100%; padding: 0.75rem; border: 1px solid #ccc; border-radius: 6px; }
        button { background-color: var(--accent-orange); color: white; border: none; padding: 0.75rem 1.5rem; border-radius: 6px; font-weight: bold; cursor: pointer; }
        button:hover { background-color: #e67e17; }
        
        .ulasan-list { display: flex; flex-direction: column; gap: 1rem; }
        .ulasan-item { background: var(--white); padding: 1.5rem; border-radius: 12px; border-left: 5px solid var(--accent-orange); position: relative; }
        .rating { color: var(--accent-orange); font-weight: bold; margin-bottom: 0.5rem; }
        .komentar { margin-bottom: 1rem; }
        .nama { font-size: 0.9rem; color: #666; }
        
        .action-links { position: absolute; top: 1.5rem; right: 1.5rem; }
        .action-links span { cursor: pointer; margin-left: 10px; font-size: 0.9rem; font-weight: bold; }
        .edit { color: #3b82f6; }
        .hapus { color: #ef4444; }

        .btn-kembali { background-color: transparent; border: 1px solid #ccc; color: #333; margin-bottom: 1rem; display: inline-block; text-decoration: none; padding: 0.5rem 1rem;}
    </style>
    <link rel="stylesheet" href="{{ asset('css/joybite-theme.css') }}">
</head>
<body class="page-reviews">
    <div class="container">
        <a href="{{ url('/pembeli/menu.php') }}" class="btn-kembali">Kembali ke Menu</a>
        <h1>Ulasan Produk JoyBite</h1>

        <div class="card">
            <h3 id="formTitle">Tulis Ulasan Baru</h3>
            <br>
            <form id="formUlasan">
                <input type="hidden" id="edit_id">
                <div class="form-group">
                    <label>ID Produk (Misal: 1 untuk Strawberry Cheesecake)</label>
                    <input type="number" id="id_produk" required>
                </div>
                <div class="form-group">
                    <label>Rating (1 - 5)</label>
                    <select id="rating" required>
                        <option value="5">5 Bintang</option>
                        <option value="4">4 Bintang</option>
                        <option value="3">3 Bintang</option>
                        <option value="2">2 Bintang</option>
                        <option value="1">1 Bintang</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Komentar</label>
                    <textarea id="komentar" rows="3" required></textarea>
                </div>
                <button type="submit">Simpan Ulasan</button>
                <button type="button" id="btnBatal" style="display:none; background:#ccc;" onclick="batalEdit()">Batal</button>
            </form>
        </div>

        <div class="ulasan-list" id="ulasanContainer">
            <!-- Data Ulasan dari API -->
        </div>
    </div>

    <script>
        if(localStorage.getItem("isLoggedIn") !== "true") window.location.href = "{{ url('/login.html') }}";
        const namaPembeli = localStorage.getItem("username");
        const API_URL = "{{ url('/pembeli/ulasan_api.php?api_key=joybite123') }}";

        function muatUlasan() {
            fetch(API_URL)
            .then(res => res.json())
            .then(hasil => {
                const container = document.getElementById('ulasanContainer');
                container.innerHTML = '';
                if(hasil.status === 'success' && hasil.data.length > 0) {
                    hasil.data.forEach(u => {
                        let actions = '';
                        if(u.nama_pembeli === namaPembeli) {
                            actions = `
                                <div class="action-links">
                                    <span class="edit" onclick="editUlasan(${u.id}, ${u.id_produk}, ${u.rating}, '${u.komentar.replace(/'/g, "\\'")}')">[Edit]</span>
                                    <span class="hapus" onclick="hapusUlasan(${u.id})">[Hapus]</span>
                                </div>
                            `;
                        }
                        
                        container.innerHTML += `
                            <div class="ulasan-item">
                                ${actions}
                                <div class="rating">${'★'.repeat(u.rating)} (${u.rating}/5) - Produk ID: ${u.id_produk}</div>
                                <div class="komentar">"${u.komentar}"</div>
                                <div class="nama">Oleh: <b>${u.nama_pembeli}</b></div>
                            </div>
                        `;
                    });
                } else {
                    container.innerHTML = '<p style="text-align:center;">Belum ada ulasan.</p>';
                }
            });
        }

        document.getElementById('formUlasan').addEventListener('submit', function(e){
            e.preventDefault();
            const idEdit = document.getElementById('edit_id').value;
            const payload = {
                id: idEdit,
                nama_pembeli: namaPembeli,
                id_produk: document.getElementById('id_produk').value,
                rating: document.getElementById('rating').value,
                komentar: document.getElementById('komentar').value
            };

            const method = idEdit ? 'PUT' : 'POST';

            fetch(API_URL, {
                method: method,
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            })
            .then(res => res.json())
            .then(hasil => {
                alert(hasil.message);
                if(hasil.status === 'success') {
                    batalEdit();
                    muatUlasan();
                }
            });
        });

        function editUlasan(id, id_produk, rating, komentar) {
            document.getElementById('formTitle').innerText = "Edit Ulasan";
            document.getElementById('edit_id').value = id;
            document.getElementById('id_produk').value = id_produk;
            document.getElementById('id_produk').disabled = true;
            document.getElementById('rating').value = rating;
            document.getElementById('komentar').value = komentar;
            document.getElementById('btnBatal').style.display = 'inline-block';
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function batalEdit() {
            document.getElementById('formTitle').innerText = "Tulis Ulasan Baru";
            document.getElementById('formUlasan').reset();
            document.getElementById('edit_id').value = '';
            document.getElementById('id_produk').disabled = false;
            document.getElementById('btnBatal').style.display = 'none';
        }

        function hapusUlasan(id) {
            if(confirm("Yakin menghapus ulasan ini?")) {
                fetch(`${API_URL}&id=${id}`, { method: 'DELETE' })
                .then(res => res.json())
                .then(hasil => {
                    alert(hasil.message);
                    muatUlasan();
                });
            }
        }

        muatUlasan();
    </script>
</body>
</html>
