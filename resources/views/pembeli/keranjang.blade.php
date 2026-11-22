<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Keranjang</title>
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        :root {
            --primary: #F4D03F;
            --primary-hover: #D4B435;
            --card-bg: #FFFFFF;
            --text-dark: #333333;
            --gray: #888888;
            --white: #FFFFDC;
            --soft-line: #EEEEEE;
            --button: #F28B2A;
            --button-hover: #e07a1b;
        }

        * { box-sizing: border-box; }
        body { 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            background-color: var(--white); 
            margin: 0; 
            color: var(--text-dark); 
        }

        /* Header Seragam */
        header { 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
            padding: 15px 5%; 
            background: var(--card-bg); 
            border-bottom: 1px solid var(--soft-line); 
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .logo { font-weight: bold; color: var(--primary); font-size: 24px; text-decoration: none; }
        
        nav { display: flex; gap: 28px; align-items: center; }
        nav a { 
            text-decoration: none; 
            color: var(--text-dark); 
            font-weight: 500; 
            font-size: 15px;
            display: flex; 
            align-items: center; 
            gap: 6px; 
            transition: color 0.2s;
        }
        nav a:hover { color: var(--button); }
        
        .search-bar { 
            background: #f9f9f9; 
            border: 1px solid #f0f0f0;
            border-radius: 20px; 
            padding: 8px 18px; 
            display: flex; 
            align-items: center; 
            gap: 10px; 
            width: 280px; 
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .search-bar:focus-within {
            border-color: var(--button);
            background: #FFFFFF;
            box-shadow: 0 0 0 3px rgba(242, 139, 42, 0.12);
        }
        .search-bar input { border: none; background: transparent; outline: none; width: 100%; font-size: 14px; }

        /* Icon Basket & Logout */
        .user-tools { display: flex; gap: 18px; align-items: center; }
        .cart-link { 
            position: relative;
            text-decoration: none; 
            color: var(--button); 
            display: flex; 
            align-items: center; 
            padding: 6px;
            border-radius: 50%;
            background: #FFF3E0;
        }
        .cart-badge {
            position: absolute;
            top: -3px;
            right: -4px;
            background: var(--button);
            color: white;
            font-size: 11px;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            border-radius: 50%;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
        }
        .logout-btn {
            text-decoration: none; 
            color: #ef4444; 
            display: flex; 
            align-items: center;
            padding: 6px;
            border-radius: 50%;
            transition: background 0.2s;
        }
        .logout-btn:hover { background: #fef2f2; }

        /* Layout Utama */
        .container { 
            display: flex; 
            padding: 35px 5%; 
            gap: 35px; 
            max-width: 1350px; 
            margin: 0 auto;
            align-items: flex-start;
        }

        .main-content { flex: 2; }
        .back-link { 
            text-decoration: none; 
            color: var(--gray); 
            font-size: 14px; 
            font-weight: 500;
            display: inline-flex; 
            align-items: center;
            gap: 6px;
            margin-bottom: 14px; 
            transition: color 0.2s;
        }
        .back-link:hover { color: var(--button); }
        h2 { margin: 0 0 24px 0; font-size: 26px; color: var(--text-dark); }

        /* Kartu Item Keranjang */
        .cart-item { 
            display: flex; 
            align-items: center; 
            gap: 22px; 
            padding: 20px 24px; 
            background: var(--card-bg);
            border-radius: 20px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            margin-bottom: 18px;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .cart-item:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.08);
        }
        
        .item-img { 
            width: 105px; 
            height: 105px; 
            border-radius: 16px; 
            background: #f5f5f5; 
            object-fit: cover; 
            flex-shrink: 0;
        }

        .item-info { flex: 1; }
        .item-info h4 { margin: 0 0 6px 0; font-size: 19px; text-transform: capitalize; }
        .item-info p { color: var(--gray); font-size: 13px; margin: 0 0 14px 0; }
        
        .btn-hapus { 
            color: #ef4444; 
            background: #fef2f2;
            cursor: pointer; 
            font-size: 13px; 
            border: none; 
            padding: 6px 12px; 
            border-radius: 10px;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            font-weight: 600;
            transition: background 0.2s;
        }
        .btn-hapus:hover { background: #fee2e2; }

        .item-price-qty { 
            text-align: right; 
            min-width: 145px; 
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            gap: 14px;
        }
        .price { font-weight: 700; font-size: 19px; color: var(--button); }
        
        .qty-control { 
            display: inline-flex; 
            align-items: center; 
            gap: 12px; 
            border: 1px solid #ececec; 
            border-radius: 25px; 
            padding: 5px 10px; 
            background: #f9f9f9;
        }
        .qty-btn { 
            cursor: pointer; 
            border: none; 
            background: white; 
            width: 28px;
            height: 28px;
            border-radius: 50%;
            display: flex; 
            align-items: center; 
            justify-content: center;
            padding: 0; 
            color: var(--text-dark); 
            box-shadow: 0 2px 5px rgba(0,0,0,0.06);
            transition: all 0.2s;
        }
        .qty-btn:hover { background: var(--button); color: white; }
        .qty-val { font-weight: 700; min-width: 22px; text-align: center; font-size: 15px; }

        /* Empty / Loading State Card */
        .state-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 50px 20px;
            text-align: center;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            color: var(--gray);
        }
        .state-card h3 { color: var(--text-dark); margin: 10px 0 8px 0; }
        .btn-shop {
            display: inline-block;
            margin-top: 14px;
            background: var(--button);
            color: white;
            text-decoration: none;
            padding: 11px 24px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 4px 12px rgba(242, 139, 42, 0.25);
        }

        /* Sidebar Ringkasan Pesanan */
        .sidebar { 
            flex: 1; 
            background: var(--card-bg); 
            padding: 28px; 
            border-radius: 20px; 
            position: sticky;
            top: 90px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
        }
        .sidebar h3 { margin-top: 0; margin-bottom: 22px; font-size: 20px; }
        .summary-row { display: flex; justify-content: space-between; margin-bottom: 14px; font-size: 15px; color: #666; }
        .summary-row span:last-child { font-weight: 600; color: var(--text-dark); }
        .total-row { 
            display: flex; 
            justify-content: space-between; 
            align-items: center;
            margin-top: 20px; 
            padding-top: 18px;
            border-top: 2px dashed var(--soft-line);
            font-weight: bold; 
            font-size: 20px; 
            color: var(--text-dark); 
        }
        .total-row span:last-child { color: var(--button); font-size: 22px; }
        
        .btn-checkout { 
            width: 100%; 
            background: var(--button); 
            color: white;
            border: none; 
            padding: 16px; 
            border-radius: 15px; 
            font-weight: bold; 
            font-size: 16px; 
            cursor: pointer; 
            margin-top: 24px; 
            transition: all 0.25s ease;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            box-shadow: 0 6px 16px rgba(242, 139, 42, 0.28);
        }
        .btn-checkout:hover { 
            background: var(--button-hover); 
            transform: translateY(-2px); 
            box-shadow: 0 8px 20px rgba(242, 139, 42, 0.35);
        }

        .material-symbols-outlined { font-size: 20px; vertical-align: middle; }

        @media (max-width: 992px) {
            .container { flex-direction: column; }
            .sidebar { width: 100%; position: static; }
            .search-bar { width: 200px; }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/joybite-theme.css') }}">
</head>
<body class="page-cart">

<header>
    <a href="{{ url('/pembeli/menu.php') }}" class="logo">JoyBite</a>
    <nav>
        <a href="{{ url('/pembeli/menu.php') }}"><span class="material-symbols-outlined">home</span> Beranda</a>
        <a href="{{ url('/pembeli/menu.php') }}"><span class="material-symbols-outlined">menu_book</span> Menu</a>
        <a href="{{ url('/pembeli/ulasan.html') }}"><span class="material-symbols-outlined">rate_review</span> Ulasan</a>
        <div class="search-bar">
            <span class="material-symbols-outlined" style="color: #888;">search</span>
            <input type="text" placeholder="cari menu..." onkeydown="if(event.key==='Enter') window.location.href='{{ url('/pembeli/menu.php') }}'">
        </div>
    </nav>
    <div class="user-tools">
        <a href="{{ url('/pembeli/Keranjang.php') }}" class="cart-link" title="Keranjang Belanja">
            <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">shopping_basket</span>
            <span class="cart-badge" id="header-cart-badge">0</span>
        </a>
        <a href="#" onclick="logout()" title="Logout" class="logout-btn">
            <span class="material-symbols-outlined">logout</span>
        </a>
    </div>       
</header>

<div class="container">
    <div class="main-content">
        <a href="{{ url('/pembeli/menu.php') }}" class="back-link">
            <span class="material-symbols-outlined" style="font-size: 18px;">arrow_back</span> Kembali ke Menu
        </a>
        <h2 id="cart-title">Tas Belanja Anda (0)</h2>
        
        <div id="cart-items-container">
            <div class="state-card">
                <p id="loading-msg" style="margin: 0;">Memuat keranjang...</p>
            </div>
        </div>
    </div>

    <div class="sidebar">
        <h3>Ringkasan Pesanan</h3>
        <div class="summary-row">
            <span>Subtotal</span>
            <span id="subtotal">Rp 0</span>
        </div>
        <div class="summary-row">
            <span>Biaya Pengiriman</span>
            <span id="shipping-cost">Rp 0</span>
        </div>
        <div class="summary-row">
            <span>Diskon Promo</span>
            <span style="color: #ef4444;">-Rp 0</span>
        </div>
        
        <div class="total-row">
            <span>Total Akhir</span>
            <span id="grand-total">Rp 0</span>
        </div>
        
        <button class="btn-checkout" onclick="checkout()">
            Lanjut ke Pembayaran
            <span class="material-symbols-outlined">payments</span>
        </button>
    </div>
</div>

<script>
    if(localStorage.getItem("isLoggedIn") !== "true") {
        window.location.href = "{{ url('/login.html') }}";
    }

    function logout() {
        if(confirm("Apakah kamu yakin ingin keluar?")) {
            localStorage.clear();
            window.location.href = "{{ url('/login.html') }}";
        }
    }

    const API_URL = "{{ url('/pembeli/cart_api.php?api_key=joybite123') }}"; 

    async function loadCart() {
        try {
            const response = await fetch(API_URL);
            if (!response.ok) throw new Error("Gagal mengambil data");
            const items = await response.json();
            renderCart(items);
        } catch (err) {
            document.getElementById('cart-items-container').innerHTML = `
                <div class="state-card">
                    <p style="color:#ef4444; margin:0;">Error: ${err.message}</p>
                </div>`;
        }
    }

    function renderCart(items) {
        const container = document.getElementById('cart-items-container');
        const title = document.getElementById('cart-title');
        const badge = document.getElementById('header-cart-badge');
        let html = '';
        let subtotal = 0;
        let totalQty = 0;

        if (items.length === 0) {
            container.innerHTML = `
                <div class="state-card">
                    <span class="material-symbols-outlined" style="font-size: 48px; color: var(--primary);">shopping_basket</span>
                    <h3>Keranjang belanjamu masih kosong</h3>
                    <p style="margin: 0;">Yuk pilih dessert favoritmu dulu di halaman menu!</p>
                    <a href="{{ url('/pembeli/menu.php') }}" class="btn-shop">Ayo Belanja</a>
                </div>`;
            title.innerText = "Tas Belanja Anda (0)";
            badge.style.display = "none";
            updateSummary(0);
            return;
        }

        items.forEach(item => {
            const qty = parseInt(item.jumlah);
            const price = parseInt(item.harga);
            const itemSubtotal = price * qty;
            subtotal += itemSubtotal;
            totalQty += qty;

            const imgSrc = item.gambar 
                ? `{{ asset('images') }}/${item.gambar}` 
                : `https://ui-avatars.com/api/?name=${encodeURIComponent(item.nama_dessert)}&background=F4D03F&color=333&size=400`;

            html += `
            <div class="cart-item">
                <img src="${imgSrc}" class="item-img" alt="${item.nama_dessert}" loading="lazy">
                <div class="item-info">
                    <h4>${item.nama_dessert}</h4>
                    <p>Dessert JoyBite Premium • Subtotal: Rp ${itemSubtotal.toLocaleString('id-ID')}</p>
                    <button class="btn-hapus" onclick="deleteItem(${item.id})">
                        <span class="material-symbols-outlined" style="font-size: 16px;">delete</span> Hapus
                    </button>
                </div>
                <div class="item-price-qty">
                    <span class="price">Rp ${price.toLocaleString('id-ID')}</span>
                    <div class="qty-control">
                        <button class="qty-btn" onclick="updateQty(${item.id}, ${qty - 1})">
                            <span class="material-symbols-outlined" style="font-size: 16px;">remove</span>
                        </button>
                        <span class="qty-val">${qty}</span>
                        <button class="qty-btn" onclick="updateQty(${item.id}, ${qty + 1})">
                            <span class="material-symbols-outlined" style="font-size: 16px;">add</span>
                        </button>
                    </div>
                </div>
            </div>
            `;
        });

        container.innerHTML = html;
        title.innerText = `Tas Belanja Anda (${items.length})`;
        badge.innerText = totalQty;
        badge.style.display = totalQty > 0 ? "flex" : "none";
        updateSummary(subtotal);
    }

    function updateSummary(subtotal) {
        const shipping = subtotal > 0 ? 15000 : 0;
        document.getElementById('subtotal').innerText = `Rp ${subtotal.toLocaleString('id-ID')}`;
        document.getElementById('shipping-cost').innerText = `Rp ${shipping.toLocaleString('id-ID')}`;
        document.getElementById('grand-total').innerText = `Rp ${(subtotal + shipping).toLocaleString('id-ID')}`;
    }

    async function updateQty(id, newQty) {
        if (newQty < 1) return deleteItem(id);
        await fetch(API_URL, {
            method: 'PUT',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ id: id, jumlah: newQty })
        });
        loadCart();
    }

    async function deleteItem(id) {
        if (confirm('Hapus item?')) {
            await fetch(`${API_URL}&id=${id}`, { method: 'DELETE' });
            loadCart();
        }
    }

    async function checkout() {
        const grandTotalText = document.getElementById('grand-total').innerText;
        const total = parseInt(grandTotalText.replace(/[^0-9]/g, ''));
        if (total <= 15000) {
            alert("Keranjang Anda masih kosong!");
            return;
        }

        const nama = localStorage.getItem("username") || "Pembeli Tanpa Nama";
        
        try {
            const res = await fetch("{{ url('/penjual/pesanan_api.php?api_key=joybite123') }}", {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ nama_pembeli: nama, total_harga: total })
            });
            const hasil = await res.json();
            
            if (hasil.status === 'success') {
                alert("Yeay! Pesanan berhasil dibuat dan otomatis masuk ke Daftar Pesanan Penjual.");
                window.location.href = "{{ url('/pembeli/menu.php') }}";
            } else {
                alert("Gagal membuat pesanan: " + hasil.message);
            }
        } catch (e) {
            console.error(e);
            alert("Terjadi kesalahan sistem saat checkout.");
        }
    }

    loadCart();
</script>
</body>
</html>