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
        --radius-lg: 20px;
        --radius-xl: 32px;
        --shadow-sm: 0 4px 16px rgba(0, 0, 0, .07);
        --shadow-md: 0 12px 36px rgba(0, 0, 0, .12);
        --shadow-lg: 0 24px 60px rgba(0, 0, 0, .16);
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

    /* Decorative circles */
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

    /* ── Content Sections ── */
    .sv-body {
        background: var(--bg-light);
        padding: 90px 0 60px;
    }

    .sv-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .sv-section {
        display: flex;
        align-items: center;
        gap: 70px;
        margin-bottom: 90px;
        background: var(--white);
        border-radius: var(--radius-xl);
        box-shadow: var(--shadow-sm);
        overflow: hidden;
        border: 1px solid rgba(0, 0, 0, .05);
    }

    .sv-section.reverse {
        flex-direction: row-reverse;
    }

    .sv-section-media {
        flex: 0 0 46%;
        position: relative;
        min-height: 420px;
        overflow: hidden;
    }

    .sv-section-media img {
        width: 100%;
        height: 100%;
        min-height: 420px;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .sv-section-media:hover img {
        transform: scale(1.04);
    }

    .sv-section-content {
        flex: 1;
        padding: 52px 52px 52px 0;
    }

    .sv-section.reverse .sv-section-content {
        padding: 52px 0 52px 52px;
    }

    .sv-section-tag {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 50px;
        margin-bottom: 18px;
    }

    .sv-section-content h2 {
        font-size: clamp(26px, 3vw, 38px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 20px;
        line-height: 1.25;
        letter-spacing: -.3px;
        position: relative;
        padding-bottom: 18px;
    }

    .sv-section-content h2::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 48px;
        height: 4px;
        background: var(--brand);
        border-radius: 4px;
    }

    .sv-section-content .sv-text {
        font-size: 16px;
        line-height: 1.8;
        color: var(--text-mid);
        margin-top: 18px;
    }

    .sv-section-content .sv-text p {
        margin-bottom: 14px;
    }

    .sv-section-content .sv-text p:last-child {
        margin-bottom: 0;
    }

    /* No image variant */
    .sv-section.no-media .sv-section-content {
        flex: 1;
        padding: 52px;
    }

    /* ── CTA Section ── */
    .sv-cta-wrap {
        padding: 0 30px 80px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .sv-cta {
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
        border-radius: var(--radius-xl);
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

    .sv-cta::before {
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

    .sv-cta::after {
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

    .sv-cta-text {
        position: relative;
        z-index: 1;
        flex: 1;
    }

    .sv-cta-text h2 {
        font-size: clamp(26px, 3vw, 40px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.3px;
        line-height: 1.2;
    }

    .sv-cta-text p {
        font-size: 16px;
        opacity: .88;
        margin: 0;
        line-height: 1.65;
        max-width: 560px;
    }

    .sv-cta-actions {
        position: relative;
        z-index: 1;
        display: flex;
        flex-direction: column;
        gap: 14px;
        flex-shrink: 0;
    }

    .sv-cta-btn {
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

    .sv-cta-btn.primary {
        background: #fff;
        color: var(--brand);
        box-shadow: 0 8px 28px rgba(0, 0, 0, .18);
    }

    .sv-cta-btn.primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 36px rgba(0, 0, 0, .22);
    }

    /* ── Partner Universities Section ── */
    .uv-partners {
        margin-top: -30px;
        padding-bottom: 90px;
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
    }

    .uv-card {
        background: #fff;
        border-radius: 20px;
        padding: 30px 20px;
        text-align: center;
        box-shadow: 0 4px 16px rgba(0,0,0,0.04);
        border: 1px solid rgba(0,0,0,0.03);
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
        box-shadow: 0 12px 30px rgba(0,0,0,0.08);
        border-color: rgba(0,0,0,0.08);
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

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .sv-section { gap: 0; flex-direction: column; }
        .sv-section.reverse { flex-direction: column; }
        .sv-section-media { flex: none; width: 100%; min-height: 320px; }
        .sv-section-media img { min-height: 320px; }
        .sv-section-content, .sv-section.reverse .sv-section-content { padding: 40px 36px; }
        .sv-cta { flex-direction: column; text-align: center; padding: 52px 40px; }
        .sv-cta-text p { max-width: 100%; }
        .sv-cta-actions { flex-direction: row; flex-wrap: wrap; justify-content: center; }
    }

    @media (max-width: 640px) {
        .sv-body { padding: 60px 0 40px; }
        .sv-section { margin-bottom: 40px; }
        .sv-section-content, .sv-section.reverse .sv-section-content { padding: 30px 24px; }
        .sv-cta { padding: 44px 28px; }
        .sv-cta-actions { flex-direction: column; }
        .sv-cta-btn { width: 100%; }
        .uv-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
    }
</style>

<div class="sv-wrap">

    {{-- ── Hero Banner ── --}}
    <div class="sv-hero {{ $project->banner ? 'has-bg' : '' }}"
        @if($project->banner) style="background-image:url('{{ asset('/setting/banner/' . $project->banner) }}')" @endif>
        <div class="sv-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="sv-hero-badge">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                    <line x1="12" y1="22.08" x2="12" y2="12"></line>
                </svg>
                Study Destination
            </div>
            <h1>Study in {{ $project->title }}</h1>
            <div class="crumbs">
                <a href="/">Home</a>
                <span>›</span>
                <span>Destinations</span>
                <span>›</span>
                <span>{{ $project->title }}</span>
            </div>
        </div>
    </div>

    {{-- ── Content Sections ── --}}
    <div class="sv-body">
        <div class="sv-container">

            @if($project->details || $project->image)
            <div class="sv-section {{ !$project->image ? 'no-media' : '' }}" data-aos="fade-up" data-aos-duration="800">
                @if($project->image)
                <div class="sv-section-media">
                    <img src="{{ asset('/setting/banner/' . $project->image) }}" alt="{{ $project->title }}">
                </div>
                @endif
                @if($project->details)
                <div class="sv-section-content {{ !$project->image ? '' : '' }}">
                    <span class="sv-section-tag">Overview</span>
                    <h2>{{ $project->details_title ?: 'About Studying Here' }}</h2>
                    <div class="sv-text">{!! $project->details !!}</div>
                </div>
                @endif
            </div>
            @endif

            @if($project->details_description || $project->image3)
            <div class="sv-section reverse {{ !$project->image3 ? 'no-media' : '' }}" data-aos="fade-up" data-aos-duration="800">
                @if($project->image3)
                <div class="sv-section-media">
                    <img src="{{ asset('/setting/banner/' . $project->image3) }}" alt="{{ $project->title }}">
                </div>
                @endif
                @if($project->details_description)
                <div class="sv-section-content">
                    <span class="sv-section-tag">More Information</span>
                    <h2>Additional Details</h2>
                    <div class="sv-text">{!! $project->details_description !!}</div>
                </div>
                @endif
            </div>
            @endif

            {{-- ── Partner Universities Section ── --}}
            @if(isset($university) && count($university) > 0)
            <div class="uv-partners" data-aos="fade-up" data-aos-duration="800">
                <div class="uv-section-title">
                    <h2>Our Partner Universities</h2>
                    <p>Top institutions we partner with in {{ $project->title }}</p>
                </div>
                
                <div class="uv-grid">
                    @foreach($university->flatten() as $uni)
                        @if($loop->iteration <= 8) {{-- Limit to 8 to keep it clean, view more link handles the rest --}}
                        <a href="/universities/{{ $uni->id }}" class="uv-card">
                            <img src="{{ asset('/setting/university/' . $uni->logo) }}" alt="{{ $uni->university_name }}">
                            <span>{{ $uni->university_name }}</span>
                        </a>
                        @endif
                    @endforeach
                </div>

                <div class="uv-view-more">
                    <a href="{{ route('universities') }}" class="sv-cta-btn primary" style="background: var(--brand); color: #fff;">
                        View All Universities
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
            </div>
            @endif

        </div>
    </div>

    {{-- ── CTA ── --}}
    <div class="sv-cta-wrap" data-aos="fade-up" data-aos-duration="900">
        <div class="sv-cta">
            <div class="sv-cta-text">
                <h2>Ready to Study in {{ $project->title }}?</h2>
                <p>Let our experts guide you through the process and help you secure admission at top universities.</p>
            </div>
            <div class="sv-cta-actions">
                <a href="{{ route('appointment.index') }}" class="sv-cta-btn primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                    </svg>
                    Book Appointment
                </a>
                <a href="/contact" class="sv-cta-btn outline">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.07 9.81a2 2 0 012-2.18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L10.09 14a16 16 0 006.29 6.29l.27-.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 22v-.08z" />
                    </svg>
                    Contact Us
                </a>
                <a href="/universities" class="sv-cta-btn outline" style="background: rgba(255,255,255,0.1);">
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
