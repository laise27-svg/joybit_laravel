<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBite - Menu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --yellow-primary: #F4C430;
            --yellow-hover: #E0AE19;
            --yellow-amber-text: #A87800;
            --yellow-banner-bg: #FFF2B2;
            --yellow-soft-tint: #FFFBEB;
            --canvas-bg: #FFFDF5;
            --surface-white: #FFFFFF;
            --card-lemon: #FFF8D6;
            --card-apricot: #FFF1D6;
            --card-vanilla: #FEF9E7;
            --card-blush: #FDEEF4;
            --text-main: #231F20;
            --text-muted: #8A8478;
            --border-subtle: #F2ECE1;
            --shadow-soft: 0 4px 20px rgba(180, 140, 20, 0.06);
            --shadow-yellow: 0 6px 16px rgba(244, 196, 48, 0.32);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            color: var(--text-main);
            background: var(--canvas-bg);
            font-family: 'Plus Jakarta Sans', 'Segoe UI', sans-serif;
            -webkit-font-smoothing: antialiased;
        }

        button,
        input {
            font: inherit;
        }

        a {
            color: inherit;
        }

        .dashboard-shell {
            display: grid;
            grid-template-columns: 248px minmax(0, 1fr) 336px;
            min-height: 100vh;
        }

        .left-sidebar {
            position: sticky;
            top: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding: 30px 20px 22px;
            background: var(--surface-white);
            border-right: 1px solid var(--border-subtle);
        }

        .logo {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            margin: 0 10px 38px;
            color: var(--yellow-amber-text);
            font-size: 25px;
            font-weight: 800;
            letter-spacing: -1.2px;
            text-decoration: none;
        }

        .logo-mark {
            display: grid;
            width: 38px;
            height: 38px;
            place-items: center;
            border-radius: 13px;
            color: var(--text-main);
            background: var(--yellow-primary);
        }

        .logo-mark .material-symbols-outlined {
            font-size: 22px;
        }

        .sidebar-caption {
            margin: 0 12px 12px;
            color: #B0A99B;
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.4px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            display: grid;
            gap: 7px;
        }

        .sidebar-link {
            position: relative;
            display: flex;
            min-height: 44px;
            align-items: center;
            gap: 13px;
            padding: 0 14px;
            border-radius: 12px;
            color: var(--text-muted);
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .sidebar-link .material-symbols-outlined {
            font-size: 20px;
        }

        .sidebar-link:hover,
        .sidebar-link.active {
            color: var(--yellow-amber-text);
            background: var(--yellow-soft-tint);
        }

        .sidebar-link.active::before {
            position: absolute;
            top: 10px;
            bottom: 10px;
            left: 0;
            width: 4px;
            border-radius: 0 4px 4px 0;
            background: var(--yellow-primary);
            content: '';
        }

        .sidebar-divider {
            height: 1px;
            margin: 23px 4px;
            background: var(--border-subtle);
        }

        .price-filter {
            padding: 0 10px;
        }

        .price-filter h2 {
            margin: 0 0 15px;
            font-size: 14px;
            font-weight: 600;
        }

        .price-slider {
            width: 100%;
            margin: 2px 0 10px;
            accent-color: var(--yellow-amber-text);
            cursor: pointer;
        }

        .price-display {
            display: flex;
            justify-content: space-between;
            gap: 8px;
            margin: 0;
            color: var(--text-muted);
            font-size: 11px;
        }

        .price-display strong {
            color: var(--yellow-amber-text);
            font-size: 12px;
        }

        .sidebar-promo {
            margin-top: auto;
            padding: 13px;
            border: 1px solid #FDE68A;
            border-radius: 18px;
            background: var(--yellow-soft-tint);
        }

        .sidebar-promo img {
            display: block;
            width: 100%;
            height: 92px;
            border-radius: 12px;
            object-fit: cover;
        }

        .sidebar-promo h2 {
            margin: 12px 0 5px;
            font-size: 13px;
        }

        .sidebar-promo p {
            margin: 0 0 12px;
            color: var(--text-muted);
            font-size: 11px;
            line-height: 1.6;
        }

        .sidebar-promo a {
            display: flex;
            min-height: 36px;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            background: var(--yellow-primary);
            color: var(--text-main);
            font-size: 11px;
            font-weight: 700;
            text-decoration: none;
            transition: background 0.2s ease;
        }

        .sidebar-promo a:hover {
            background: var(--yellow-hover);
        }

        .main-content {
            min-width: 0;
            padding: 26px 26px 38px;
        }

        .topbar {
            display: flex;
            min-height: 46px;
            align-items: center;
            justify-content: space-between;
            gap: 18px;
            margin-bottom: 24px;
        }

        .welcome-copy {
            color: var(--text-muted);
            font-size: 12px;
        }

        .welcome-copy strong {
            color: var(--text-main);
            font-weight: 700;
        }

        .topbar-actions {
            display: flex;
            min-width: 0;
            align-items: center;
            gap: 15px;
        }

        .search-bar {
            display: flex;
            width: min(320px, 30vw);
            height: 44px;
            align-items: center;
            gap: 9px;
            padding: 0 14px;
            border: 1px solid var(--border-subtle);
            border-radius: 24px;
            background: var(--surface-white);
            box-shadow: 0 2px 10px rgba(244, 196, 48, 0.08);
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .search-bar:focus-within {
            border-color: var(--yellow-primary);
            box-shadow: 0 0 0 3px rgba(244, 196, 48, 0.16);
        }

        .search-bar > .material-symbols-outlined {
            color: var(--text-muted);
            font-size: 19px;
        }

        .search-bar input {
            width: 100%;
            min-width: 0;
            border: 0;
            outline: 0;
            background: transparent;
            color: var(--text-main);
            font-size: 12px;
        }

        .search-bar input::placeholder {
            color: #AAA397;
        }

        .cart-link {
            position: relative;
            display: grid;
            width: 42px;
            height: 42px;
            flex: 0 0 auto;
            place-items: center;
            border: 1px solid var(--border-subtle);
            border-radius: 50%;
            background: var(--surface-white);
            color: var(--text-main);
            text-decoration: none;
            transition: color 0.2s ease, background 0.2s ease;
        }

        .cart-link:hover {
            background: var(--yellow-soft-tint);
            color: var(--yellow-amber-text);
        }

        .cart-link .material-symbols-outlined {
            font-size: 21px;
        }

        .cart-badge {
            position: absolute;
            top: -3px;
            right: -3px;
            display: none;
            min-width: 18px;
            height: 18px;
            align-items: center;
            justify-content: center;
            padding: 0 4px;
            border: 2px solid var(--surface-white);
            border-radius: 10px;
            background: var(--yellow-primary);
            color: var(--text-main);
            font-size: 9px;
            font-weight: 800;
        }

        .profile-chip {
            display: flex;
            align-items: center;
            gap: 9px;
        }

        .profile-copy {
            display: grid;
            gap: 2px;
            text-align: right;
        }

        .profile-copy strong {
            max-width: 105px;
            overflow: hidden;
            font-size: 11px;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .profile-copy span {
            color: var(--text-muted);
            font-size: 10px;
        }

        .profile-avatar {
            display: grid;
            width: 39px;
            height: 39px;
            flex: 0 0 auto;
            place-items: center;
            border: 2px solid #F6E6A7;
            border-radius: 50%;
            background: var(--yellow-soft-tint);
            color: var(--yellow-amber-text);
            font-size: 12px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .logout-btn {
            display: grid;
            width: 36px;
            height: 36px;
            flex: 0 0 auto;
            place-items: center;
            border: 0;
            border-radius: 50%;
            background: transparent;
            color: var(--text-muted);
            cursor: pointer;
            transition: background 0.2s ease, color 0.2s ease;
        }

        .logout-btn:hover {
            background: #FFF1E9;
            color: #B45309;
        }

        .hero-banner {
            position: relative;
            display: flex;
            min-height: 190px;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            padding: 25px 30px;
            border-radius: 22px;
            background: linear-gradient(130deg, #FFF2B2 0%, #FFE57F 100%);
        }

        .hero-copy {
            position: relative;
            z-index: 1;
            max-width: 62%;
        }

        .hero-eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 10px;
            color: #8E6A00;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.3px;
            text-transform: uppercase;
        }

        .hero-eyebrow .material-symbols-outlined {
            font-size: 15px;
        }

        .hero-banner h1 {
            max-width: 370px;
            margin: 0;
            color: var(--text-main);
            font-size: clamp(20px, 2vw, 27px);
            font-weight: 800;
            letter-spacing: -0.8px;
            line-height: 1.28;
        }

        .hero-banner p {
            max-width: 350px;
            margin: 8px 0 15px;
            color: #6F6240;
            font-size: 11px;
            line-height: 1.6;
        }

        .hero-cta {
            display: inline-flex;
            min-height: 38px;
            align-items: center;
            gap: 7px;
            padding: 0 15px;
            border-radius: 11px;
            background: var(--yellow-primary);
            box-shadow: 0 4px 12px rgba(180, 140, 20, 0.18);
            color: var(--text-main);
            font-size: 11px;
            font-weight: 800;
            text-decoration: none;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .hero-cta:hover {
            transform: translateY(-2px);
            background: var(--yellow-hover);
        }

        .hero-cta .material-symbols-outlined {
            font-size: 17px;
        }

        .hero-image {
            width: clamp(125px, 20vw, 205px);
            height: clamp(125px, 20vw, 205px);
            flex: 0 0 auto;
            margin: -20px -4px -20px 10px;
            border: 8px solid rgba(255, 255, 255, 0.38);
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0 12px 28px rgba(117, 83, 0, 0.16);
            transform: rotate(5deg);
        }

        .section-block {
            margin-top: 29px;
        }

        .section-heading {
            display: flex;
            align-items: end;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 14px;
        }

        .section-heading h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
            letter-spacing: -0.3px;
        }

        .section-heading p {
            margin: 4px 0 0;
            color: var(--text-muted);
            font-size: 10px;
        }

        .view-all {
            flex: 0 0 auto;
            padding: 5px 0;
            border: 0;
            background: transparent;
            color: var(--yellow-amber-text);
            cursor: pointer;
            font-size: 10px;
            font-weight: 700;
        }

        .category-list {
            display: grid;
            grid-template-columns: repeat(5, minmax(90px, 1fr));
            gap: 11px;
        }

        .category-card {
            position: relative;
            display: flex;
            min-height: 93px;
            align-items: end;
            overflow: hidden;
            padding: 12px;
            border: 2px solid transparent;
            border-radius: 16px;
            background: var(--category-image, linear-gradient(135deg, #F4C430, #E0AE19));
            background-position: center;
            background-size: cover;
            color: var(--surface-white);
            cursor: pointer;
            text-align: left;
            transition: border-color 0.2s ease, transform 0.2s ease;
        }

        .category-card::before {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(35, 31, 32, 0.04), rgba(35, 31, 32, 0.65));
            content: '';
        }

        .category-card span {
            position: relative;
            z-index: 1;
            font-size: 11px;
            font-weight: 800;
        }

        .category-card:hover {
            transform: translateY(-2px);
        }

        .category-card.active {
            border-color: var(--yellow-primary);
            box-shadow: 0 0 0 2px rgba(244, 196, 48, 0.16);
        }

        .category-all {
            --category-image: linear-gradient(135deg, #F6D365 0%, #E6A817 100%);
        }

        .category-cake {
            --category-image: url('{{ asset('images/strawberrycheesecake.jpg') }}');
        }

        .category-donut {
            --category-image: linear-gradient(135deg, #D78959, #7D4632);
        }

        .category-bread {
            --category-image: linear-gradient(135deg, #D7A66A, #75523A);
        }

        .category-pastry {
            --category-image: url('{{ asset('images/cromboloni.jpg') }}');
        }

        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 14px;
        }

        .product-card {
            display: flex;
            min-width: 0;
            flex-direction: column;
            padding: 13px;
            border: 1px solid rgba(242, 236, 225, 0.8);
            border-radius: 19px;
            background: var(--card-tint, var(--surface-white));
            box-shadow: var(--shadow-soft);
            transition: transform 0.22s ease, box-shadow 0.22s ease;
        }

        .card-lemon {
            --card-tint: var(--card-lemon);
        }

        .card-apricot {
            --card-tint: var(--card-apricot);
        }

        .card-vanilla {
            --card-tint: var(--card-vanilla);
        }

        .card-blush {
            --card-tint: var(--card-blush);
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 11px 26px rgba(153, 117, 26, 0.12);
        }

        .product-card-top {
            display: flex;
            min-height: 24px;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
        }

        .product-category {
            overflow: hidden;
            color: #766B50;
            font-size: 9px;
            font-weight: 700;
            text-overflow: ellipsis;
            text-transform: uppercase;
            white-space: nowrap;
        }

        .rating-badge {
            display: inline-flex;
            flex: 0 0 auto;
            align-items: center;
            gap: 3px;
            padding: 4px 7px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.84);
            color: #66531D;
            font-size: 9px;
            font-weight: 700;
        }

        .rating-badge .material-symbols-outlined {
            color: #C89200;
            font-size: 13px;
            font-variation-settings: 'FILL' 1;
        }

        .product-image-wrap {
            display: grid;
            min-height: 132px;
            place-items: center;
        }

        .product-image-wrap img {
            width: 112px;
            height: 112px;
            border: 5px solid rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            background: #FFFFFF;
            object-fit: cover;
            box-shadow: 0 5px 16px rgba(74, 56, 20, 0.12);
            transition: transform 0.28s ease;
        }

        .product-card:hover .product-image-wrap img {
            transform: scale(1.05);
        }

        .product-card h3 {
            min-height: 38px;
            margin: 0 0 5px;
            color: var(--text-main);
            font-size: 13px;
            font-weight: 800;
            line-height: 1.45;
        }

        .product-description {
            display: -webkit-box;
            min-height: 30px;
            overflow: hidden;
            margin: 0 0 12px;
            color: var(--text-muted);
            font-size: 10px;
            line-height: 1.5;
            -webkit-box-orient: vertical;
            -webkit-line-clamp: 2;
        }

        .card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: auto;
            padding-top: 10px;
            border-top: 1px solid rgba(155, 130, 73, 0.14);
        }

        .price {
            color: var(--text-main);
            font-size: 13px;
            font-weight: 800;
        }

        .add-btn {
            display: grid;
            width: 34px;
            height: 34px;
            flex: 0 0 auto;
            place-items: center;
            border: 0;
            border-radius: 11px;
            background: var(--surface-white);
            color: var(--yellow-amber-text);
            cursor: pointer;
            box-shadow: 0 2px 8px rgba(109, 84, 23, 0.08);
            transition: transform 0.2s ease, background 0.2s ease, color 0.2s ease;
        }

        .add-btn:hover {
            transform: translateY(-1px);
            background: var(--yellow-primary);
            color: var(--text-main);
        }

        .add-btn .material-symbols-outlined {
            font-size: 20px;
        }

        .empty-menu {
            grid-column: 1 / -1;
            padding: 38px 20px;
            border: 1px dashed #E9DDAF;
            border-radius: 18px;
            background: var(--surface-white);
            color: var(--text-muted);
            text-align: center;
        }

        .empty-menu .material-symbols-outlined {
            color: var(--yellow-amber-text);
            font-size: 38px;
        }

        .empty-menu h3 {
            margin: 8px 0 5px;
            color: var(--text-main);
            font-size: 15px;
        }

        .empty-menu p {
            margin: 0;
            font-size: 11px;
        }

        .order-panel {
            position: sticky;
            top: 0;
            display: flex;
            height: 100vh;
            flex-direction: column;
            padding: 27px 21px 20px;
            overflow-y: auto;
            border-left: 1px solid var(--border-subtle);
            background: var(--surface-white);
        }

        .order-panel-heading {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 17px;
        }

        .order-panel-heading h2 {
            margin: 0;
            font-size: 16px;
            font-weight: 800;
        }

        .order-count {
            display: grid;
            min-width: 25px;
            height: 25px;
            place-items: center;
            padding: 0 6px;
            border-radius: 9px;
            background: var(--yellow-soft-tint);
            color: var(--yellow-amber-text);
            font-size: 10px;
            font-weight: 800;
        }

        .member-card {
            position: relative;
            overflow: hidden;
            padding: 18px;
            border-radius: 18px;
            background: linear-gradient(135deg, #F6D365 0%, #E6A817 100%);
            color: #392B06;
        }

        .member-card::after {
            position: absolute;
            right: -25px;
            bottom: -65px;
            width: 150px;
            height: 150px;
            border: 1px solid rgba(255, 255, 255, 0.26);
            border-radius: 50%;
            box-shadow: 0 0 0 15px rgba(255, 255, 255, 0.08), 0 0 0 30px rgba(255, 255, 255, 0.06);
            content: '';
        }

        .member-card-label {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 1.2px;
            text-transform: uppercase;
        }

        .member-card-label .material-symbols-outlined {
            font-size: 16px;
        }

        .member-card strong {
            position: relative;
            z-index: 1;
            display: block;
            margin-top: 22px;
            font-size: 16px;
            font-weight: 800;
        }

        .member-card p {
            position: relative;
            z-index: 1;
            margin: 3px 0 0;
            font-size: 10px;
            opacity: 0.78;
        }

        .order-list-heading {
            margin: 24px 0 12px;
            font-size: 13px;
            font-weight: 800;
        }

        .order-list {
            display: grid;
            gap: 13px;
        }

        .order-item {
            display: grid;
            grid-template-columns: 46px minmax(0, 1fr) auto;
            align-items: center;
            gap: 10px;
        }

        .order-item img {
            width: 46px;
            height: 46px;
            border-radius: 14px;
            background: var(--yellow-soft-tint);
            object-fit: cover;
        }

        .order-item-info {
            min-width: 0;
        }

        .order-item-info strong {
            display: block;
            overflow: hidden;
            font-size: 10px;
            font-weight: 700;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .order-item-info span {
            display: block;
            margin-top: 4px;
            color: var(--text-muted);
            font-size: 9px;
        }

        .order-item-quantity {
            align-self: start;
            padding: 4px 6px;
            border-radius: 7px;
            background: var(--yellow-soft-tint);
            color: var(--yellow-amber-text);
            font-size: 9px;
            font-weight: 800;
            white-space: nowrap;
        }

        .cart-empty {
            display: grid;
            min-height: 128px;
            place-content: center;
            justify-items: center;
            padding: 15px;
            border: 1px dashed var(--border-subtle);
            border-radius: 15px;
            color: var(--text-muted);
            text-align: center;
        }

        .cart-empty .material-symbols-outlined {
            margin-bottom: 7px;
            color: #D7BD68;
            font-size: 26px;
        }

        .cart-empty p {
            margin: 0;
            font-size: 10px;
            line-height: 1.5;
        }

        .cart-panel-bottom {
            margin-top: auto;
            padding-top: 20px;
        }

        .cart-subtotal {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            color: var(--text-muted);
            font-size: 11px;
        }

        .cart-subtotal strong {
            color: var(--text-main);
            font-weight: 700;
        }

        .coupon-link {
            display: flex;
            min-height: 44px;
            align-items: center;
            justify-content: space-between;
            gap: 8px;
            margin-top: 16px;
            padding: 0 12px;
            border: 1px solid #F3E5AB;
            border-radius: 12px;
            background: var(--canvas-bg);
            color: #766B50;
            font-size: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: border-color 0.2s ease, background 0.2s ease;
        }

        .coupon-link:hover {
            border-color: var(--yellow-primary);
            background: var(--yellow-soft-tint);
        }

        .coupon-link-label {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .coupon-link .material-symbols-outlined {
            color: var(--yellow-amber-text);
            font-size: 18px;
        }

        .cart-total {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-top: 19px;
            padding-top: 17px;
            border-top: 1px solid var(--border-subtle);
            font-size: 11px;
            font-weight: 700;
        }

        .cart-total strong {
            color: var(--yellow-amber-text);
            font-size: 16px;
            font-weight: 800;
        }

        .checkout-btn {
            display: flex;
            min-height: 47px;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 13px;
            border-radius: 13px;
            background: var(--yellow-primary);
            box-shadow: var(--shadow-yellow);
            color: var(--text-main);
            font-size: 12px;
            font-weight: 800;
            text-decoration: none;
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .checkout-btn:hover {
            transform: translateY(-1px);
            background: var(--yellow-hover);
        }

        .checkout-btn .material-symbols-outlined {
            font-size: 18px;
        }

        .toast {
            position: fixed;
            right: 24px;
            bottom: 24px;
            z-index: 20;
            display: flex;
            align-items: center;
            gap: 9px;
            padding: 12px 17px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 13px;
            background: #292522;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.18);
            color: var(--surface-white);
            font-size: 11px;
            font-weight: 600;
            opacity: 0;
            pointer-events: none;
            transform: translateY(12px);
            transition: opacity 0.25s ease, transform 0.25s ease;
        }

        .toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .toast .material-symbols-outlined {
            color: var(--yellow-primary);
            font-size: 19px;
        }

        .material-symbols-outlined {
            font-size: 20px;
            font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
        }

        @media (max-width: 1180px) {
            .dashboard-shell {
                grid-template-columns: 220px minmax(0, 1fr);
            }

            .left-sidebar {
                grid-row: 1 / span 2;
            }

            .order-panel {
                position: static;
                grid-column: 2;
                height: auto;
                min-height: 430px;
                border-top: 1px solid var(--border-subtle);
                border-left: 0;
            }

            .cart-panel-bottom {
                margin-top: 25px;
            }

            .category-list {
                grid-template-columns: repeat(5, minmax(80px, 1fr));
            }
        }

        @media (max-width: 760px) {
            .dashboard-shell {
                display: flex;
                flex-direction: column;
            }

            .left-sidebar {
                position: static;
                min-height: auto;
                padding: 13px 18px;
                border-right: 0;
                border-bottom: 1px solid var(--border-subtle);
            }

            .logo {
                margin: 0 0 12px;
                font-size: 21px;
            }

            .logo-mark {
                width: 33px;
                height: 33px;
                border-radius: 11px;
            }

            .sidebar-caption,
            .sidebar-divider,
            .price-filter,
            .sidebar-promo {
                display: none;
            }

            .sidebar-nav {
                display: flex;
                gap: 7px;
                overflow-x: auto;
            }

            .sidebar-link {
                min-width: max-content;
                min-height: 38px;
                padding: 0 11px;
                font-size: 11px;
            }

            .sidebar-link.active::before {
                top: auto;
                right: 11px;
                bottom: 0;
                left: 11px;
                width: auto;
                height: 3px;
                border-radius: 3px 3px 0 0;
            }

            .main-content {
                padding: 17px 17px 28px;
            }

            .topbar {
                align-items: flex-start;
                margin-bottom: 17px;
            }

            .welcome-copy {
                display: none;
            }

            .topbar-actions {
                width: 100%;
                gap: 9px;
            }

            .search-bar {
                width: auto;
                flex: 1;
            }

            .profile-copy {
                display: none;
            }

            .logout-btn {
                width: 32px;
            }

            .hero-banner {
                min-height: 176px;
                padding: 20px;
                border-radius: 18px;
            }

            .hero-copy {
                max-width: 70%;
            }

            .hero-banner h1 {
                font-size: 19px;
            }

            .hero-banner p {
                max-width: 230px;
                font-size: 10px;
            }

            .hero-image {
                width: 105px;
                height: 105px;
                margin-right: -30px;
                border-width: 5px;
            }

            .section-block {
                margin-top: 23px;
            }

            .category-list {
                grid-template-columns: repeat(5, minmax(84px, 1fr));
                gap: 8px;
                overflow-x: auto;
                padding-bottom: 4px;
            }

            .category-card {
                min-height: 80px;
                padding: 9px;
            }

            .category-card span {
                font-size: 10px;
            }

            .menu-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
                gap: 10px;
            }

            .product-card {
                padding: 10px;
                border-radius: 16px;
            }

            .product-image-wrap {
                min-height: 110px;
            }

            .product-image-wrap img {
                width: 92px;
                height: 92px;
            }

            .product-card h3 {
                font-size: 12px;
            }

            .price {
                font-size: 11px;
            }

            .order-panel {
                width: 100%;
                min-height: 0;
                padding: 21px 17px;
                border-top: 1px solid var(--border-subtle);
            }

            .member-card {
                max-width: 450px;
            }

            .cart-panel-bottom {
                margin-top: 22px;
            }
        }

        @media (max-width: 380px) {
            .hero-image {
                width: 82px;
                height: 82px;
            }

            .hero-banner h1 {
                font-size: 17px;
            }

            .product-card-top {
                align-items: flex-start;
            }

            .rating-badge {
                gap: 1px;
                padding: 4px;
            }
        }
    </style>
</head>
<body>

<div class="dashboard-shell">
    <aside class="left-sidebar">
        <a href="{{ url('/pembeli/menu.php') }}" class="logo">
            <span class="logo-mark"><span class="material-symbols-outlined">bakery_dining</span></span>
            JoyBite
        </a>

        <p class="sidebar-caption">Menu Utama</p>
        <nav class="sidebar-nav" aria-label="Navigasi utama">
            <a href="{{ url('/pembeli/menu.php') }}" class="sidebar-link">
                <span class="material-symbols-outlined">home</span>
                Beranda
            </a>
            <a href="{{ url('/pembeli/menu.php') }}" class="sidebar-link active" aria-current="page">
                <span class="material-symbols-outlined">menu_book</span>
                Menu Dessert
            </a>
            <a href="{{ url('/pembeli/ulasan.html') }}" class="sidebar-link">
                <span class="material-symbols-outlined">rate_review</span>
                Ulasan
            </a>
            <a href="{{ url('/pembeli/Keranjang.php') }}" class="sidebar-link">
                <span class="material-symbols-outlined">receipt_long</span>
                Keranjang
            </a>
        </nav>

        <div class="sidebar-divider"></div>
        <section class="price-filter" aria-labelledby="price-filter-title">
            <h2 id="price-filter-title">Filter Harga</h2>
            <input type="range" id="priceSlider" class="price-slider" min="10000" max="150000" step="5000" value="150000" oninput="updatePriceFilter(this.value)" aria-label="Harga maksimal">
            <p class="price-display">
                <span>Maksimal</span>
                <strong id="priceLabel">Rp 150.000</strong>
            </p>
        </section>

        <section class="sidebar-promo">
            <img src="{{ asset('images/cromboloni.jpg') }}" alt="Cromboloni JoyBite">
            <h2>Manisnya hari ini</h2>
            <p>Temukan camilan favoritmu dan tambahkan ke keranjang.</p>
            <a href="#menu-section">Jelajahi menu</a>
        </section>
    </aside>

    <main class="main-content">
        <header class="topbar">
            <div class="welcome-copy">Selamat datang kembali, <strong id="welcome-name">Pembeli</strong></div>
            <div class="topbar-actions">
                <label class="search-bar">
                    <span class="material-symbols-outlined">search</span>
                    <input type="text" id="searchInput" placeholder="Cari dessert favorit..." onkeyup="searchMenu(event)" aria-label="Cari dessert">
                </label>
                <a href="{{ url('/pembeli/Keranjang.php') }}" class="cart-link" title="Buka keranjang" aria-label="Buka keranjang">
                    <span class="material-symbols-outlined">shopping_basket</span>
                    <span class="cart-badge" id="header-cart-badge">0</span>
                </a>
                <div class="profile-chip">
                    <div class="profile-copy">
                        <strong id="profile-name">Pembeli</strong>
                        <span>Pembeli</span>
                    </div>
                    <span class="profile-avatar" id="profile-avatar" aria-hidden="true">P</span>
                </div>
                <button type="button" onclick="logout()" title="Keluar" class="logout-btn" aria-label="Keluar">
                    <span class="material-symbols-outlined">logout</span>
                </button>
            </div>
        </header>

        <section class="hero-banner" aria-labelledby="hero-title">
            <div class="hero-copy">
                <div class="hero-eyebrow">
                    <span class="material-symbols-outlined">auto_awesome</span>
                    Freshly baked for you
                </div>
                <h1 id="hero-title">Discover Sweet Happiness at Your Fingertips</h1>
                <p>Temukan dessert favoritmu dan nikmati momen manis hari ini.</p>
                <a href="#menu-section" class="hero-cta">
                    Jelajahi menu
                    <span class="material-symbols-outlined">arrow_forward</span>
                </a>
            </div>
            <img class="hero-image" src="{{ asset('images/strawberrycheesecake.jpg') }}" alt="Strawberry cheesecake JoyBite">
        </section>

        <section class="section-block" aria-labelledby="categories-title">
            <div class="section-heading">
                <div>
                    <h2 id="categories-title">Categories</h2>
                    <p>Pilih kategori untuk menemukan rasa favoritmu</p>
                </div>
            </div>
            <div class="category-list">
                <button type="button" class="category-card category-all active" onclick="filterCategory('all', this)" aria-pressed="true">
                    <span>Semua Menu</span>
                </button>
                <button type="button" class="category-card category-cake" onclick="filterCategory('Kue', this)" aria-pressed="false">
                    <span>Kue</span>
                </button>
                <button type="button" class="category-card category-donut" onclick="filterCategory('Donat', this)" aria-pressed="false">
                    <span>Donat</span>
                </button>
                <button type="button" class="category-card category-bread" onclick="filterCategory('Roti', this)" aria-pressed="false">
                    <span>Roti</span>
                </button>
                <button type="button" class="category-card category-pastry" onclick="filterCategory('Pastry', this)" aria-pressed="false">
                    <span>Pastry</span>
                </button>
            </div>
        </section>

        <section class="section-block" id="menu-section" aria-labelledby="menu-title">
            <div class="section-heading">
                <div>
                    <h2 id="menu-title">Pilihan Dessert</h2>
                    <p id="menu-count" aria-live="polite">Memuat menu...</p>
                </div>
                <button type="button" class="view-all" onclick="showAllMenu()">Lihat semua</button>
            </div>
            <div class="menu-grid" id="menu-container"></div>
        </section>
    </main>

    <aside class="order-panel" aria-labelledby="order-panel-title">
        <div class="order-panel-heading">
            <h2 id="order-panel-title">Order Menu</h2>
            <span class="order-count" id="order-count">0</span>
        </div>

        <section class="member-card" aria-label="Kartu member JoyBite">
            <div class="member-card-label">
                <span class="material-symbols-outlined">workspace_premium</span>
                JoyBite Member
            </div>
            <strong id="member-name">Pembeli</strong>
            <p>Senang menyajikan momen manis</p>
        </section>

        <h3 class="order-list-heading">Pesanan kamu</h3>
        <div class="order-list" id="order-items" aria-live="polite">
            <div class="cart-empty">
                <span class="material-symbols-outlined">shopping_bag</span>
                <p>Keranjangmu masih kosong.<br>Tambahkan dessert favoritmu.</p>
            </div>
        </div>

        <div class="cart-panel-bottom">
            <div class="cart-subtotal">
                <span>Subtotal</span>
                <strong id="cart-subtotal">Rp 0</strong>
            </div>
            <a href="{{ url('/pembeli/Keranjang.php') }}" class="coupon-link">
                <span class="coupon-link-label">
                    <span class="material-symbols-outlined">confirmation_number</span>
                    Lihat detail keranjang
                </span>
                <span class="material-symbols-outlined">chevron_right</span>
            </a>
            <div class="cart-total">
                <span>Total sementara</span>
                <strong id="cart-total">Rp 0</strong>
            </div>
            <a href="{{ url('/pembeli/Keranjang.php') }}" class="checkout-btn">
                Lanjut ke keranjang
                <span class="material-symbols-outlined">arrow_forward</span>
            </a>
        </div>
    </aside>
</div>

<div class="toast" id="toast" role="status" aria-live="polite">
    <span class="material-symbols-outlined">check_circle</span>
    <span id="toast-msg">Berhasil ditambahkan ke keranjang</span>
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

    const MENU_API = "{{ url('/pembeli/produk_api.php?api_key=joybite123') }}";
    const CART_API = "{{ url('/pembeli/cart_api.php?api_key=joybite123') }}";
    const PRODUCT_IMAGE_FALLBACK = "{{ asset('images/strawberrycheesecake.jpg') }}";

    let allProducts = [];
    let currentCategory = 'all';
    let currentMaxPrice = 150000;

    const username = localStorage.getItem('username') || 'Pembeli';
    document.getElementById('welcome-name').textContent = username;
    document.getElementById('profile-name').textContent = username;
    document.getElementById('member-name').textContent = username;
    document.getElementById('profile-avatar').textContent = Array.from(username)[0] || 'P';

    async function fetchMenu() {
        try {
            const response = await fetch(MENU_API);
            allProducts = await response.json();
            applyFilters();
        } catch (err) {
            console.error("Gagal load menu:", err);
        }
    }

    async function updateCartBadge() {
        try {
            const res = await fetch(CART_API);
            const items = await res.json();
            const total = items.reduce((sum, item) => sum + parseInt(item.jumlah || 0), 0);
            const badge = document.getElementById('header-cart-badge');
            badge.textContent = total;
            badge.style.display = total > 0 ? 'flex' : 'none';
            document.getElementById('order-count').textContent = total;
            renderCart(items);
        } catch (err) {
            console.error("Gagal memuat badge keranjang:", err);
        }
    }

    function filterCategory(category, element) {
        currentCategory = category;
        document.querySelectorAll('.category-card').forEach(el => {
            el.classList.remove('active');
            el.setAttribute('aria-pressed', 'false');
        });
        element.classList.add('active');
        element.setAttribute('aria-pressed', 'true');
        applyFilters();
    }

    function showAllMenu() {
        const allCategory = document.querySelector('.category-card[onclick*="all"]');
        const priceSlider = document.getElementById('priceSlider');
        priceSlider.value = priceSlider.max;
        currentMaxPrice = parseInt(priceSlider.max);
        document.getElementById('priceLabel').textContent = `Rp ${currentMaxPrice.toLocaleString('id-ID')}`;
        filterCategory('all', allCategory);
    }

    function updatePriceFilter(val) {
        currentMaxPrice = parseInt(val);
        document.getElementById('priceLabel').textContent = `Rp ${currentMaxPrice.toLocaleString('id-ID')}`;
        applyFilters();
    }

    function applyFilters() {
        const filtered = allProducts.filter(item => {
            const itemCat = (item.kategori || '').toLowerCase();
            const matchCat = currentCategory === 'all' || itemCat === currentCategory.toLowerCase() || (currentCategory === 'Kue' && itemCat === 'dessert');
            const matchPrice = parseInt(item.harga) <= currentMaxPrice;
            return matchCat && matchPrice;
        });
        renderMenu(filtered);
    }

    function renderMenu(items) {
        const container = document.getElementById('menu-container');
        const countLabel = document.getElementById('menu-count');
        countLabel.innerText = `${items.length} menu tersedia`;

        if (items.length === 0) {
            container.innerHTML = `
                <div class="empty-menu">
                    <span class="material-symbols-outlined">cake</span>
                    <h3>Menu tidak ditemukan</h3>
                    <p>Coba kategori lain atau sesuaikan batas harga.</p>
                </div>`;
            return;
        }

        const cardTints = ['card-lemon', 'card-apricot', 'card-vanilla', 'card-blush'];
        container.innerHTML = items.map((item, index) => {
            const imgSrc = item.gambar ? `{{ asset('images') }}/${encodeURIComponent(item.gambar)}` : PRODUCT_IMAGE_FALLBACK;
            const category = item.kategori || 'Dessert';
            const rating = Number(item.rating || 0).toFixed(1);
            const price = Number(item.harga || 0);
            return `
            <article class="product-card ${cardTints[index % cardTints.length]}">
                <div class="product-card-top">
                    <span class="product-category">${escapeHtml(category)}</span>
                    <span class="rating-badge">
                        <span class="material-symbols-outlined">star</span>
                        ${rating}
                    </span>
                </div>
                <div class="product-image-wrap">
                    <img src="${escapeHtml(imgSrc)}" alt="${escapeHtml(item.nama_produk)}" loading="lazy">
                </div>
                <h3>${escapeHtml(item.nama_produk)}</h3>
                <p class="product-description">${escapeHtml(item.deskripsi || 'Dessert pilihan JoyBite.')}</p>
                <div class="card-footer">
                    <span class="price">Rp ${price.toLocaleString('id-ID')}</span>
                    <button type="button" class="add-btn" data-product-name="${escapeHtml(item.nama_produk)}" data-product-price="${price}" title="Tambah ke Keranjang" aria-label="Tambah ${escapeHtml(item.nama_produk)} ke keranjang">
                        <span class="material-symbols-outlined">add</span>
                    </button>
                </div>
            </article>
        `}).join('');

        container.querySelectorAll('.add-btn').forEach(button => {
            button.addEventListener('click', () => {
                addToCart(button.dataset.productName, Number(button.dataset.productPrice));
            });
        });
    }

    function escapeHtml(value) {
        return String(value ?? '').replace(/[&<>"']/g, character => ({
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        })[character]);
    }

    function renderCart(items) {
        const container = document.getElementById('order-items');
        const subtotal = items.reduce((sum, item) => sum + (Number(item.subtotal) || Number(item.harga) * Number(item.jumlah)), 0);
        document.getElementById('cart-subtotal').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;
        document.getElementById('cart-total').textContent = `Rp ${subtotal.toLocaleString('id-ID')}`;

        if (items.length === 0) {
            container.innerHTML = `
                <div class="cart-empty">
                    <span class="material-symbols-outlined">shopping_bag</span>
                    <p>Keranjangmu masih kosong.<br>Tambahkan dessert favoritmu.</p>
                </div>`;
            return;
        }

        container.innerHTML = items.map(item => {
            const image = item.gambar ? `{{ asset('images') }}/${encodeURIComponent(item.gambar)}` : PRODUCT_IMAGE_FALLBACK;
            const price = Number(item.harga || 0);
            return `
                <article class="order-item">
                    <img src="${escapeHtml(image)}" alt="" loading="lazy">
                    <div class="order-item-info">
                        <strong>${escapeHtml(item.nama_dessert)}</strong>
                        <span>Rp ${price.toLocaleString('id-ID')}</span>
                    </div>
                    <span class="order-item-quantity">x${Number(item.jumlah) || 0}</span>
                </article>`;
        }).join('');
    }

    function showToast(message) {
        const toast = document.getElementById('toast');
        document.getElementById('toast-msg').innerText = message;
        toast.classList.add('show');
        setTimeout(() => toast.classList.remove('show'), 2500);
    }

    async function addToCart(nama, harga) {
        const payload = {
            nama_dessert: nama,
            harga: harga,
            jumlah: 1
        };

        try {
            const response = await fetch(CART_API, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(payload)
            });
            const result = await response.json();
            showToast(result.message || "Berhasil ditambahkan ke keranjang");
            await updateCartBadge();
        } catch (err) {
            alert("Gagal menambahkan ke keranjang");
        }
    }

    async function searchMenu(e) {
        if (e.key === 'Enter') {
            const keyword = document.getElementById('searchInput').value;
            try {
                const response = await fetch(MENU_API, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ keyword: keyword })
                });
                allProducts = await response.json();
                applyFilters();
            } catch (err) {
                console.error("Gagal mencari menu:", err);
            }
        }
    }

    fetchMenu();
    updateCartBadge();
</script>

</body>
</html>