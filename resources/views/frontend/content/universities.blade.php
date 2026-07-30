@extends('frontend.layouts.app')
@section('content')

<style>
    /* ── Google Font ── */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    /* ── Variables ── */
    :root {
        --brand: #C72027;
        --brand-dark: #A61B21;
        --brand-light: #FDECEA;
        --text-dark: #1A1A2E;
        --text-mid: #4B5563;
        --text-light: #9CA3AF;
        --bg-light: #F8F9FB;
        --white: #FFFFFF;
    }

    .sv-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero Banner ── */
    .sv-hero {
        position: relative;
        min-height: 480px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--brand);
        overflow: hidden;
    }

    .sv-hero.has-bg {
        background-size: cover;
        background-position: center;
    }

    .sv-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(167, 15, 23, 0.19) 0%, rgba(26, 26, 46, .75) 100%);
    }

    .sv-hero::after {
        content: '';
        position: absolute;
        width: 600px;
        height: 600px;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .08);
        top: -200px;
        right: -150px;
        pointer-events: none;
    }

    .sv-hero-inner {
        position: relative;
        z-index: 2;
        max-width: 860px;
        margin: 0 auto;
        padding: 90px 30px 80px;
        text-align: center;
        color: #fff;
    }

    .sv-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, .25);
        border-radius: 50px;
        padding: 6px 18px;
        font-size: 13px;
        font-weight: 600;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: rgba(255, 255, 255, .9);
        margin-bottom: 22px;
    }

    .sv-hero h1 {
        font-size: clamp(32px, 5vw, 58px);
        font-weight: 800;
        margin: 0 0 18px;
        line-height: 1.15;
        letter-spacing: -.5px;
    }

    .sv-hero .crumbs {
        display: flex;
        gap: 8px;
        justify-content: center;
        font-size: 13px;
        flex-wrap: wrap;
        opacity: .8;
    }

    .sv-hero .crumbs a {
        color: #fff;
        text-decoration: none;
    }

    .sv-hero .crumbs a:hover {
        text-decoration: underline;
    }

    .sv-hero .crumbs span {
        color: rgba(255, 255, 255, .6);
    }

    /* ── Main Content ── */
    .uv-body {
        background: var(--bg-light);
        padding: 90px 0;
        min-height: 500px;
    }

    .uv-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .uv-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .uv-header h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0;
        letter-spacing: -.5px;
    }

    .uv-header p {
        font-size: 17px;
        color: var(--text-mid);
        margin: 12px 0 0;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
    }

    /* ── Grid & Cards ── */
    .uv-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
        gap: 30px;
    }

    .uv-card {
        background: #fff;
        border-radius: 24px;
        padding: 40px 25px;
        text-align: center;
        box-shadow: 0 8px 24px rgba(0,0,0,0.03);
        border: 1px solid rgba(0,0,0,0.04);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 220px;
        position: relative;
        overflow: hidden;
    }

    .uv-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 4px;
        background: var(--brand);
        transform: scaleX(0);
        transition: transform 0.3s ease;
        transform-origin: left;
    }

    .uv-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border-color: rgba(0,0,0,0.08);
    }

    .uv-card:hover::before {
        transform: scaleX(1);
    }

    .uv-card img {
        max-width: 100%;
        max-height: 90px;
        object-fit: contain;
        margin-bottom: 20px;
        transition: transform 0.4s ease;
    }

    .uv-card:hover img {
        transform: scale(1.08);
    }

    .uv-card span {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-dark);
        display: block;
        line-height: 1.4;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .uv-grid {
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }
        .uv-card {
            padding: 30px 20px;
            min-height: 190px;
        }
    }

    @media (max-width: 480px) {
        .uv-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
        .uv-card {
            padding: 25px 15px;
            min-height: 160px;
            border-radius: 16px;
        }
        .uv-card img {
            max-height: 70px;
            margin-bottom: 15px;
        }
        .uv-card span {
            font-size: 13px;
        }
    }
</style>

<div class="sv-wrap">

    {{-- ── Hero Banner ── --}}
    <div class="sv-hero {{ optional($banner)->banner ? 'has-bg' : '' }}"
        @if(optional($banner)->banner) style="background-image:url('{{ asset('/setting/university/' . $banner->banner) }}')" @endif>
        <div class="sv-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="sv-hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
                </svg>
                Institutions
            </div>
            <h1>Our Partner Universities</h1>
            <div class="crumbs">
                <a href="/">Home</a>
                <span>›</span>
                <span>Universities</span>
            </div>
        </div>
    </div>

    {{-- ── Universities Grid ── --}}
    <div class="uv-body">
        <div class="uv-container">
            
            <div class="uv-header" data-aos="fade-up">
                <h2>Explore Our Global Network</h2>
                <p>We are proudly partnered with some of the top-ranking universities across the globe to help you achieve your academic dreams.</p>
            </div>

            <div class="uv-grid">
                @foreach ($university as $uni)
                    <a href="/universities/{{ $uni->id }}" class="uv-card" data-aos="fade-up" data-aos-delay="{{ $loop->iteration % 10 * 50 }}">
                        <img src="{{ asset('/setting/university/' . $uni->logo) }}" alt="{{ $uni->university_name }}">
                        <span>{{ $uni->university_name ?? 'University' }}</span>
                    </a>
                @endforeach
            </div>

        </div>
    </div>

</div>
@endsection