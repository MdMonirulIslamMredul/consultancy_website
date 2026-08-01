@extends('frontend.layouts.app')
@section('title', 'Testimonials - Stories of Satisfaction')
@section('meta_description', 'Read success stories from students who achieved their dreams of studying abroad with SHEC guidance.')

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
        background-image: url('https://images.unsplash.com/photo-1523240795612-9a054b0db644?auto=format&fit=crop&q=80&w=2000');
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

    /* ── Services Grid -> Testimonials Grid ── */
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

    .sd-card-body {
        padding: 36px 32px;
        display: flex;
        flex-direction: column;
        flex: 1;
        position: relative;
    }

    .sd-quote-icon {
        font-size: 64px;
        color: var(--bg-light);
        line-height: 0.8;
        font-family: Georgia, serif;
        letter-spacing: -4px;
        margin-bottom: 20px;
        transition: color .3s ease;
    }

    .sd-card:hover .sd-quote-icon {
        color: var(--brand-light);
    }

    .sd-card-body p.review {
        font-size: 15px;
        line-height: 1.7;
        color: var(--text-mid);
        margin: 0 0 28px;
        flex: 1;
        font-style: italic;
    }

    .sd-divider {
        height: 1px;
        background: #f0f0f0;
        margin-bottom: 22px;
    }

    .sd-author-box {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .sd-author-img {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid var(--brand);
    }

    .sd-author-placeholder {
        width: 52px;
        height: 52px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--brand), var(--brand-dark));
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: #fff;
        font-size: 20px;
    }

    .sd-author-info h4 {
        font-size: 15px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 3px;
    }

    .sd-author-info span {
        font-size: 12px;
        color: var(--text-light);
    }

    .sd-stars {
        margin-left: auto;
    }

    .sd-stars i {
        color: #f4c430;
        font-size: 13px;
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
</style>

<div class="sd-wrap main-content">

    {{-- ── Hero ── --}}
    <div class="sd-hero">
        <div class="sd-hero-bg"></div>
        <div class="sd-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <span class="sd-hero-eyebrow">Real Stories</span>
            <h1>Testimonials</h1>
            <div class="crumbs">
                <a href="/">Home</a>
                <span>›</span>
                <span class="current">Testimonials</span>
            </div>
        </div>
    </div>

    {{-- ── Testimonials Grid ── --}}
    <section class="sd-services">
        <div class="sd-container">
            @if($testmonies->count())
            <div class="sd-grid">
                @foreach($testmonies as $testi)
                <div class="sd-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 80 }}">
                    <div class="sd-card-body">
                        <div class="sd-quote-icon">"&nbsp;"</div>
                        <p class="review">{{ $testi->review ?? 'Great experience!' }}</p>
                        <div class="sd-divider"></div>

                        <div class="sd-author-box">
                            @if($testi->photo)
                            <img src="{{ asset('setting/testmony/' . $testi->photo) }}" alt="{{ $testi->reviewer }}" class="sd-author-img">
                            @else
                            <div class="sd-author-placeholder">
                                <i class="fa-solid fa-user"></i>
                            </div>
                            @endif
                            <div class="sd-author-info">
                                <h4>{{ $testi->reviewer }}</h4>
                                @if($testi->reviewer_job)
                                <span>{{ $testi->reviewer_job }}</span>
                                @endif
                            </div>
                            <div class="sd-stars">
                                @for($i = 0; $i < 5; $i++)
                                    <i class="fa-solid fa-star"></i>
                                    @endfor
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div style="text-align:center; padding:60px 0;">
                <i class="fa-solid fa-comment-dots" style="font-size:60px; color:#ccc; margin-bottom:20px; display:block;"></i>
                <h3 style="color:#888;">No testimonials available yet.</h3>
                <p style="color:#aaa;">Check back soon for student success stories!</p>
            </div>
            @endif
        </div>
    </section>
</div>
@endsection