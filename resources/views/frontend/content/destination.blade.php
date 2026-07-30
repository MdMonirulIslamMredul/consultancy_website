@extends('frontend.layouts.app')
@section('title', 'Study Destinations')
@section('meta_description', 'Explore the best study destinations for Bangladeshi students, including the USA, UK, Canada, Australia, and more.')

@section('content')
<style>
    /* ── Google Font ── */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

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

    .sd-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero Banner ── */
    .sd-hero {
        position: relative;
        height: 440px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }

    .sd-hero-bg {
        position: absolute;
        inset: 0;
        background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=2000');
        background-size: cover;
        background-position: center;
        filter: brightness(.45) saturate(.9);
        transition: transform 8s ease;
    }

    .sd-hero:hover .sd-hero-bg {
        transform: scale(1.04);
    }

    .sd-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(199, 32, 40, 0.19) 0%, rgba(26, 26, 46, .85) 100%);
    }

    .sd-hero-inner {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 20px;
    }

    .sd-hero-eyebrow {
        display: inline-block;
        background: rgba(255, 255, 255, .18);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, .3);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 6px 20px;
        border-radius: 50px;
        margin-bottom: 18px;
    }

    .sd-hero h1 {
        font-size: clamp(34px, 5vw, 58px);
        font-weight: 800;
        margin: 0 0 15px;
        letter-spacing: -.5px;
        line-height: 1.1;
        text-shadow: 0 4px 24px rgba(0, 0, 0, .25);
    }

    .sd-hero .crumbs {
        font-size: 14px;
        font-weight: 500;
        letter-spacing: .5px;
    }

    .sd-hero .crumbs a {
        color: rgba(255, 255, 255, 0.7);
        text-decoration: none;
        transition: color .3s ease;
    }

    .sd-hero .crumbs a:hover {
        color: #fff;
    }

    .sd-hero .crumbs span {
        color: rgba(255, 255, 255, 0.4);
        margin: 0 8px;
    }

    .sd-hero .crumbs .current {
        color: var(--brand);
        font-weight: 700;
    }

    /* ── Destinations Grid ── */
    .sd-services {
        padding: 90px 0 80px;
        background: var(--bg-light);
    }

    .sd-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .sd-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(330px, 1fr));
        gap: 32px;
    }

    .sd-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        border: 1.5px solid rgba(0, 0, 0, .06);
        box-shadow: 0 8px 28px rgba(0, 0, 0, .07);
        transition: all .35s ease;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .sd-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--brand);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .35s ease;
    }

    .sd-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 54px rgba(0, 0, 0, .14);
        border-color: rgba(199, 32, 39, .15);
    }

    .sd-card:hover::before {
        transform: scaleX(1);
    }

    .sd-card-img {
        height: 240px;
        overflow: hidden;
        position: relative;
    }

    .sd-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .55s ease;
    }

    .sd-card:hover .sd-card-img img {
        transform: scale(1.07);
    }

    .sd-badge {
        position: absolute;
        bottom: 14px;
        left: 50%;
        transform: translateX(-50%);
        background: rgba(255, 255, 255, 0.95);
        border-radius: 50px;
        padding: 6px 20px;
        font-size: 12px;
        font-weight: 800;
        color: var(--brand);
        text-transform: uppercase;
        letter-spacing: 1px;
        white-space: nowrap;
        box-shadow: 0 4px 15px rgba(0, 0, 0, .1);
    }

    .sd-card-body {
        padding: 28px 28px 32px;
        display: flex;
        flex-direction: column;
        flex: 1;
    }

    .sd-card-body h3 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 12px;
        letter-spacing: -.2px;
        line-height: 1.3;
    }

    .sd-card-body p {
        font-size: 14.5px;
        line-height: 1.65;
        color: var(--text-mid);
        margin: 0 0 24px;
        flex: 1;
    }

    .sd-card-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #6B7280 0%, #9CA3AF 100%);
        color: #fff !important;
        padding: 12px 26px;
        border-radius: 50px;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none !important;
        transition: all .35s ease;
        align-self: flex-start;
        box-shadow: 0 4px 16px rgba(0, 0, 0, .18);
        letter-spacing: .3px;
        position: relative;
        overflow: hidden;
    }

    .sd-card-btn::before {
        content: '';
        position: absolute;
        top: 0;
        left: -75%;
        width: 50%;
        height: 100%;
        background: linear-gradient(120deg, transparent 0%, rgba(255, 255, 255, .28) 50%, transparent 100%);
        transform: skewX(-20deg);
        transition: left .55s ease;
        pointer-events: none;
    }

    .sd-card-btn:hover::before {
        left: 130%;
    }

    .sd-card-btn:hover {
        background: linear-gradient(135deg, #C72027 0%, #e03037 100%);
        transform: translateY(-2px);
        box-shadow:
            0 8px 24px rgba(199, 32, 39, .5),
            0 0 0 5px rgba(199, 32, 39, .1);
        color: #fff !important;
    }

    .sd-card-btn svg {
        transition: transform .3s ease;
    }

    .sd-card-btn:hover svg {
        transform: translateX(4px);
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .sd-services {
            padding: 60px 0;
        }

        .sd-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .sd-hero {
            height: 340px;
        }
    }

    /* ── Partner Universities Grid ── */
    .uv-partners {
        padding: 80px 0;
        background: var(--white);
    }

    .uv-section-title {
        text-align: center;
        margin-bottom: 50px;
    }

    .uv-section-title h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0;
        letter-spacing: -.5px;
    }

    .uv-section-title p {
        font-size: 16px;
        color: var(--text-mid);
        margin: 10px 0 0;
    }

    .uv-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .uv-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
        border: 1px solid rgba(0, 0, 0, 0.03);
        transition: all 0.3s ease;
        text-decoration: none;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        min-height: 180px;
    }

    .uv-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.08);
        border-color: rgba(0, 0, 0, 0.08);
    }

    .uv-card img {
        max-width: 100%;
        max-height: 80px;
        object-fit: contain;
        margin-bottom: 15px;
        transition: transform 0.3s ease;
    }

    .uv-card:hover img {
        transform: scale(1.05);
    }

    .uv-card span {
        font-size: 14px;
        font-weight: 600;
        color: var(--text-dark);
        display: block;
    }

    .uv-view-more {
        text-align: center;
        margin-top: 50px;
    }

    /* ── CTA Section ── */
    .sd-cta-wrap {
        padding: 0 30px 80px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .sd-cta {
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
        border-radius: 32px;
        padding: 70px 70px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 24px 64px -16px rgba(199, 32, 39, .5);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 40px;
    }

    .sd-cta::before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .06);
        top: -200px;
        right: -100px;
        pointer-events: none;
    }

    .sd-cta::after {
        content: '';
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .04);
        bottom: -120px;
        left: 60px;
        pointer-events: none;
    }

    .sd-cta-text {
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .sd-cta-text h2 {
        font-size: clamp(26px, 3vw, 40px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.3px;
        line-height: 1.2;
    }

    .sd-cta-text p {
        font-size: 16px;
        opacity: .88;
        margin: 0;
        line-height: 1.65;
        max-width: 560px;
    }

    .sd-cta-actions {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        gap: 14px;
        flex-shrink: 0;
    }

    .sd-cta-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 9px;
        padding: 16px 36px;
        font-weight: 700;
        font-size: 15px;
        border-radius: 50px;
        text-decoration: none;
        transition: all .3s ease;
        letter-spacing: .3px;
        white-space: nowrap;
    }

    .sd-cta-btn.primary {
        background: #fff;
        color: var(--brand);
        box-shadow: 0 8px 28px rgba(0, 0, 0, .18);
    }

    .sd-cta-btn.primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 36px rgba(0, 0, 0, .22);
    }

    .sd-cta-btn.outline {
        background: transparent;
        color: #fff;
        border: 2px solid rgba(255, 255, 255, .45);
    }

    .sd-cta-btn.outline:hover {
        background: rgba(255, 255, 255, .12);
        border-color: #fff;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .sd-services {
            padding: 60px 0;
        }

        .sd-grid {
            grid-template-columns: 1fr;
        }

        .uv-partners {
            padding: 60px 0;
        }
    }

    @media (max-width: 480px) {
        .sd-hero {
            height: 340px;
        }

        .uv-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }

    @media (max-width: 1024px) {
        .sd-cta {
            flex-direction: column;
            text-align: center;
            padding: 52px 40px;
        }

        .sd-cta-text p {
            max-width: 100%;
        }

        .sd-cta-actions {
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
        }
    }

    @media (max-width: 640px) {
        .sd-cta {
            padding: 44px 28px;
        }

        .sd-cta-actions {
            flex-direction: column;
        }

        .sd-cta-btn {
            width: 100%;
        }
    }
</style>

<div class="sd-wrap main-content">

    {{-- ── Hero ── --}}
    <div class="sd-hero">
        <div class="sd-hero-bg"></div>
        <div class="sd-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <span class="sd-hero-eyebrow">Explore the World</span>
            <h1>Study Destinations</h1>
            <div class="crumbs">
                <a href="/">Home</a>
                <span>›</span>
                <span class="current">Destinations</span>
            </div>
        </div>
    </div>

    {{-- ── Destinations Grid ── --}}
    <section class="sd-services">
        <div class="sd-container">
            @if($destinations->count())
            <div class="sd-grid">
                @foreach($destinations as $dest)
                <div class="sd-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 80 }}">
                    <a href="/study_destination/{{ $dest->id }}" style="display:block; text-decoration:none; color:inherit; height:100%; display:flex; flex-direction:column;">
                        <div class="sd-card-img">
                            @if($dest->image)
                            <img src="{{ asset('setting/banner/' . $dest->image) }}" alt="{{ $dest->title }}">
                            @else
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?auto=format&fit=crop&q=80&w=800" alt="{{ $dest->title }}">
                            @endif
                            <div class="sd-badge">{{ $dest->title }}</div>
                        </div>
                        <div class="sd-card-body">
                            <h3>Study in {{ $dest->title }}</h3>
                            @if($dest->details_title)
                            <p>{{ Str::limit(strip_tags($dest->details_title), 120) }}</p>
                            @endif
                            <div class="sd-card-btn">
                                Explore
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px 0;">
                <i class="fa-solid fa-globe" style="font-size:60px; color:#ccc; margin-bottom:20px; display:block;"></i>
                <h3 style="color:#888;">No destinations available yet.</h3>
            </div>
            @endif
        </div>
    </section>

    {{-- ── Partner Universities Section ── --}}
    @if(isset($universities) && $universities->count() > 0)
    <div class="uv-partners" data-aos="fade-up" data-aos-duration="800">
        <div class="uv-section-title">
            <span class="sd-hero-eyebrow" style="margin-bottom:10px; color:var(--brand); border-color:var(--brand-light); background:var(--brand-light);">Partners</span>
            <h2>Partner Universities</h2>
            <p>Top institutions we partner with across the globe</p>
        </div>

        <div class="uv-grid">
            @foreach($universities as $uni)
            <a href="/universities/{{ $uni->id }}" class="uv-card">
                <img src="{{ asset('/setting/university/' . $uni->logo) }}" alt="{{ $uni->university_name }}">
                <span>{{ $uni->university_name }}</span>
            </a>
            @endforeach
        </div>

        <div class="uv-view-more">
            <a href="{{ route('universities') }}" class="sd-cta-btn primary" style="background: var(--brand); color: #fff;">
                View All Universities
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
    @endif

    {{-- ── CTA ── --}}
    <div class="sd-cta-wrap" data-aos="fade-up" data-aos-duration="900">
        <div class="sd-cta">
            <div class="sd-cta-text">
                <h2>Ready to Start Your Journey?</h2>
                <p>Discover our partner universities or book an appointment with our experts to learn more about your options.</p>
            </div>
            <div class="sd-cta-actions">
                <a href="{{ route('appointment.index') }}" class="sd-cta-btn primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                    </svg>
                    Book Appointment
                </a>
                <a href="/universities" class="sd-cta-btn outline" style="background: rgba(255,255,255,0.1);">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M12 14l9-5-9-5-9 5 9 5z" />
                        <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                        <path d="M12 14v7" />
                    </svg>
                    Partner Universities
                </a>
            </div>
        </div>
    </div>
</div>
@endsection