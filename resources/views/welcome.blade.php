<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Batik Kelompok 9 — Sentra UMKM Batik Lokal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root{
            --cream:      #F4E9D8;
            --cream-soft: #FBF5EA;
            --indigo:     #1C2B4A;
            --indigo-2:   #26375C;
            --soga:       #8B5A2B;
            --soga-dark:  #5B3B1C;
            --gold:       #C7972A;
            --ink:        #241A12;
            --line:       rgba(199,151,42,0.35);
        }

        *{box-sizing:border-box;}
        html{scroll-behavior:smooth;}
        body{
            margin:0;
            background:var(--cream);
            color:var(--ink);
            font-family:'Plus Jakarta Sans', sans-serif;
            -webkit-font-smoothing:antialiased;
        }
        h1,h2,h3,h4{
            font-family:'Fraunces', serif;
            color:var(--indigo);
            margin:0;
        }
        a{text-decoration:none;color:inherit;}
        a:focus-visible, button:focus-visible{
            outline:3px solid var(--gold);
            outline-offset:3px;
        }
        .eyebrow{
            font-size:0.78rem;
            letter-spacing:0.16em;
            text-transform:uppercase;
            font-weight:700;
            color:var(--soga);
        }

        /* ---------- NAVBAR ---------- */
        .navbar{
            background:var(--cream-soft);
            border-bottom:1px solid var(--line);
            position:sticky;
            top:0;
            z-index:20;
        }
        .navbar-inner{
            max-width:1120px;
            margin:0 auto;
            padding:16px 24px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .brand{
            font-family:'Fraunces', serif;
            font-weight:600;
            font-size:1.3rem;
            color:var(--indigo);
            display:flex;
            align-items:center;
            gap:10px;
        }
        .brand-mark{
            width:30px;height:30px;flex:none;
        }
        .nav-links{
            display:flex;
            align-items:center;
            gap:28px;
            list-style:none;
            margin:0;padding:0;
        }
        .nav-links a{
            font-weight:600;
            font-size:0.95rem;
            color:var(--indigo-2);
            padding-bottom:4px;
            border-bottom:2px solid transparent;
            transition:border-color .2s ease;
        }
        .nav-links a.active,
        .nav-links a:hover{
            border-color:var(--gold);
        }
        .btn-login{
            background:var(--indigo);
            color:var(--cream-soft) !important;
            padding:9px 20px;
            border-radius:999px;
            font-weight:700;
            border:1px solid var(--indigo);
            transition:background .2s ease, color .2s ease;
        }
        .btn-login:hover{
            background:var(--soga);
            border-color:var(--soga);
        }
        .nav-toggle{display:none;}

        /* ---------- HERO ---------- */
        .hero{
            position:relative;
            overflow:hidden;
            background:
                repeating-linear-gradient(
                    115deg,
                    transparent 0px, transparent 26px,
                    rgba(199,151,42,0.10) 26px, rgba(199,151,42,0.10) 28px
                ),
                linear-gradient(160deg, var(--indigo) 0%, var(--indigo-2) 55%, var(--indigo) 100%);
            padding:88px 24px 100px;
        }
        .hero-inner{
            max-width:1120px;
            margin:0 auto;
            display:grid;
            grid-template-columns:1.35fr 0.65fr;
            gap:56px;
            align-items:center;
        }
        .hero h1{
            color:var(--cream-soft);
            font-size:clamp(2.1rem, 4vw, 3.2rem);
            line-height:1.12;
            font-weight:600;
            margin-bottom:20px;
        }
        .hero h1 em{
            font-style:italic;
            color:var(--gold);
        }
        .hero p.lead{
            color:rgba(251,245,234,0.82);
            font-size:1.08rem;
            line-height:1.7;
            max-width:46ch;
            margin-bottom:34px;
        }
        .hero-ctas{
            display:flex;
            flex-wrap:wrap;
            gap:14px;
        }
        .btn{
            display:inline-flex;
            align-items:center;
            gap:8px;
            padding:13px 26px;
            border-radius:999px;
            font-weight:700;
            font-size:0.98rem;
            transition:transform .18s ease, box-shadow .18s ease, background .18s ease;
        }
        .btn-primary{
            background:var(--gold);
            color:var(--ink);
        }
        .btn-primary:hover{
            transform:translateY(-2px);
            box-shadow:0 10px 22px rgba(199,151,42,0.35);
        }
        .btn-ghost{
            border:1.5px solid rgba(251,245,234,0.55);
            color:var(--cream-soft);
        }
        .btn-ghost:hover{
            background:rgba(251,245,234,0.1);
            transform:translateY(-2px);
        }

        /* Seal / cap batik — signature element */
        .seal-wrap{
            display:flex;
            justify-content:center;
        }
        .seal{
            width:196px;height:196px;
            animation:spin 26s linear infinite;
        }
        @keyframes spin{
            from{transform:rotate(0deg);}
            to{transform:rotate(360deg);}
        }
        .seal-center{
            animation:none;
        }
        @media (prefers-reduced-motion:reduce){
            .seal{animation:none;}
        }

        /* ---------- SECTION HEADER ---------- */
        .section{
            max-width:1120px;
            margin:0 auto;
            padding:96px 24px;
        }
        .section-head{
            max-width:64ch;
            margin:0 auto 52px;
            text-align:center;
        }
        .section-head h2{
            font-size:clamp(1.7rem, 3vw, 2.3rem);
            font-weight:600;
            margin:10px 0 14px;
        }
        .section-head p{
            color:#5A4B3B;
            font-size:1.02rem;
            line-height:1.7;
        }

        /* ---------- FEATURE CARDS (kain / fabric swatches) ---------- */
        .kain-grid{
            display:grid;
            grid-template-columns:repeat(3, 1fr);
            gap:28px;
        }
        .kain-card{
            background:var(--cream-soft);
            border:1px solid var(--line);
            border-radius:4px;
            padding:34px 28px;
            position:relative;
            transition:transform .2s ease, box-shadow .2s ease;
        }
        .kain-card::before{
            content:"";
            position:absolute;
            top:10px;left:10px;right:10px;bottom:10px;
            border:1.5px dashed rgba(139,90,43,0.4);
            border-radius:2px;
            pointer-events:none;
        }
        .kain-card:hover{
            transform:translateY(-6px);
            box-shadow:0 18px 34px rgba(28,43,74,0.12);
        }
        .kain-num{
            font-family:'Fraunces', serif;
            font-size:0.85rem;
            color:var(--gold);
            font-weight:700;
            letter-spacing:0.08em;
        }
        .kain-card h4{
            font-size:1.2rem;
            font-weight:600;
            margin:10px 0 12px;
        }
        .kain-card p{
            color:#5A4B3B;
            font-size:0.96rem;
            line-height:1.65;
            margin:0;
        }

        /* ---------- FABRIC-EDGE DIVIDER ---------- */
        .tepi-kain{
            height:22px;
            background:var(--indigo);
            -webkit-mask-image: radial-gradient(circle at 11px -3px, transparent 12px, black 12.5px);
            -webkit-mask-size: 22px 22px;
            -webkit-mask-repeat: repeat-x;
            mask-image: radial-gradient(circle at 11px -3px, transparent 12px, black 12.5px);
            mask-size: 22px 22px;
            mask-repeat: repeat-x;
        }

        /* ---------- FOOTER ---------- */
        footer{
            background:var(--indigo);
            color:rgba(251,245,234,0.75);
            padding:40px 24px;
            text-align:center;
            font-size:0.9rem;
        }
        footer strong{color:var(--cream-soft);}

        @media (max-width:900px){
            .hero-inner{grid-template-columns:1fr;text-align:center;}
            .hero p.lead{margin-left:auto;margin-right:auto;}
            .hero-ctas{justify-content:center;}
            .kain-grid{grid-template-columns:1fr;}
            .nav-links{display:none;}
        }
    </style>
</head>
<body>

    <nav class="navbar">
        <div class="navbar-inner">
            <a class="brand" href="{{ route('home') }}">
                <svg class="brand-mark" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <circle cx="20" cy="20" r="19" fill="none" stroke="#C7972A" stroke-width="1.5"/>
                    <path d="M20 6 L20 34 M6 20 L34 20" stroke="#C7972A" stroke-width="1" opacity="0.5"/>
                    <circle cx="20" cy="20" r="7" fill="#C7972A"/>
                </svg>
                Batik Kelompok 9
            </a>
            <button class="nav-toggle" type="button" aria-label="Menu">☰</button>
            <ul class="nav-links">
                <li><a class="active" href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('produk.index') }}">Katalog</a></li>
                
                @auth
                    <!-- Tampilan jika user SUDAH login -->
                    <li>
                        <span style="font-weight: 600; color: var(--indigo-2); font-size: 0.95rem;">
                            Halo, <strong style="color: var(--soga);">{{ auth()->user()->nama }}</strong>
                        </span>
                    </li>
                    @if(auth()->user()->isAdmin())
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="btn-login" style="background: var(--soga); border-color: var(--soga);">
                                Dashboard
                            </a>
                        </li>
                    @endif
                    <li>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf 
                            <button type="submit" style="background: none; border: none; color: #dc2626; font-weight: 700; cursor: pointer; font-family: inherit;">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <!-- Tampilan jika user BELUM login -->
                    <li><a class="btn-login" href="{{ route('login') }}">Masuk</a></li>
                @endauth
            </ul>
            
        </div>
    </nav>

    <section class="hero">
        <div class="hero-inner">
            <div>
                <p class="eyebrow" style="color:var(--gold);">Sentra Digital UMKM Batik</p>
                <h1>Batik Asli Perajin Lokal, <em>Dijahit Rapi</em> dalam Satu Platform</h1>
                <p class="lead">
                    Sistem informasi pemasaran dari Kelompok 9 untuk mempertemukan pengrajin batik daerah dengan pasar yang lebih luas — mulai dari katalog motif, pemesanan kain, hingga pembukuan penjualan yang rapi dan terpercaya.
                </p>
                <div class="hero-ctas">
                    <a href="{{ route('produk.index') }}" class="btn btn-primary">Jelajahi Katalog Motif</a>
                    <a href="#fitur" class="btn btn-ghost">Pelajari Fitur</a>
                </div>
            </div>
            <div class="seal-wrap">
                <svg class="seal" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Cap batik Kelompok 9">
                    <defs>
                        <path id="sealCircle" d="M 100,100 m -78,0 a 78,78 0 1,1 156,0 a 78,78 0 1,1 -156,0"/>
                    </defs>
                    <circle cx="100" cy="100" r="96" fill="none" stroke="#C7972A" stroke-width="1.2" opacity="0.6"/>
                    <circle cx="100" cy="100" r="60" fill="none" stroke="#C7972A" stroke-width="1.2" opacity="0.6"/>
                    <text font-family="Plus Jakarta Sans" font-size="12" font-weight="700" fill="#F4E9D8" letter-spacing="3">
                        <textPath href="#sealCircle" startOffset="0%">
                            UMKM BATIK · KELOMPOK 9 · KAIN LOKAL ·
                        </textPath>
                    </text>
                    <g class="seal-center">
                        <path d="M100 55 C112 70 112 90 100 100 C88 90 88 70 100 55 Z" fill="#C7972A"/>
                        <circle cx="100" cy="112" r="5" fill="#C7972A"/>
                        <path d="M100 117 L100 140" stroke="#C7972A" stroke-width="2"/>
                    </g>
                </svg>
            </div>
        </div>
    </section>

    <div class="tepi-kain" aria-hidden="true"></div>

    <section class="section" id="fitur">
        <div class="section-head">
            <p class="eyebrow">Fitur Utama</p>
            <h2>Semua yang Dibutuhkan Perajin, dalam Satu Kain Digital</h2>
            <p>Dirancang bersama pelaku UMKM batik agar proses jualan tetap sederhana, transparan, dan mudah dilacak  dari kain sampai ke pembeli.</p>
        </div>
        <div class="kain-grid">
            <div class="kain-card">
                <span class="kain-num">01</span>
                <h4>Katalog Motif Nusantara</h4>
                <p>Pajang setiap motif parang, kawung, mega mendung lengkap dengan cerita dan ketersediaan stok yang selalu <em>real-time</em>.</p>
            </div>
            <div class="kain-card">
                <span class="kain-num">02</span>
                <h4>Pesanan &amp; Pelacakan Kain</h4>
                <p>Pembeli memasukkan kain ke keranjang, mengunggah bukti bayar, lalu memantau status pesanan sampai kain siap dikirim.</p>
            </div>
            <div class="kain-card">
                <span class="kain-num">03</span>
                <h4>Pembukuan yang Akurat</h4>
                <p>Riwayat transaksi tersimpan aman dengan harga pokok terlindungi, memudahkan perajin menyusun laporan penjualan tiap bulan.</p>
            </div>
        </div>
    </section>

    <footer>
        <p><strong>Batik Kelompok 9</strong> — Sistem Informasi Pemasaran UMKM Batik Lokal</p>
    </footer>

</body>
</html>
