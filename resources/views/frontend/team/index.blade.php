@extends('frontend.layouts.app')
@section('content')

<title>{{ app_name() }} | Our Team</title>

@php
$sliders = DB::table('sliders')->where('is_active', 1)->get();
$heroSlider = $sliders->first();
@endphp

<style>
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
        --border: rgba(0, 0, 0, .07);
    }

    .tm-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero ── */
    .tm-hero {
        position: relative;
        height: 440px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }

    .tm-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        filter: brightness(.4) saturate(.85);
        transition: transform 8s ease;
    }

    .tm-hero:hover .tm-hero-bg {
        transform: scale(1.04);
    }

    .tm-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        /* background: linear-gradient(135deg, rgba(199, 32, 39, .72) 0%, rgba(26, 26, 46, .8) 100%); */
        background: linear-gradient(135deg, rgba(199, 32, 40, 0.19) 0%, rgba(26, 26, 46, .78) 100%);
    }

    /* Decorative rings */
    .tm-hero-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .08);
        pointer-events: none;
        z-index: 1;
    }

    .tm-hero-ring-1 {
        width: 500px;
        height: 500px;
        top: -200px;
        right: -100px;
    }

    .tm-hero-ring-2 {
        width: 300px;
        height: 300px;
        bottom: -120px;
        left: 60px;
    }

    .tm-hero-inner {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 20px;
    }

    .tm-hero-eyebrow {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(255, 255, 255, .15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, .28);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 7px 20px;
        border-radius: 50px;
        margin-bottom: 18px;
    }

    .tm-hero h1 {
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.5px;
        text-shadow: 0 4px 24px rgba(0, 0, 0, .25);
    }

    .tm-hero p {
        font-size: 17px;
        color: #ffffff;
        max-width: 560px;
        margin: 0 auto;
        line-height: 1.65;
        text-shadow: 0 2px 8px rgba(0, 0, 0, .45);
    }

    /* ── Section ── */
    .tm-section {
        background: var(--bg-light);
        padding: 90px 0 100px;
    }

    .tm-container {
        max-width: 1260px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* Section header */
    .tm-section-header {
        text-align: center;
        margin-bottom: 64px;
    }

    .tm-section-tag {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 6px 18px;
        border-radius: 50px;
        margin-bottom: 14px;
    }

    .tm-section-header h2 {
        font-size: clamp(30px, 4vw, 46px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 14px;
        letter-spacing: -.5px;
    }

    .tm-section-header p {
        font-size: 17px;
        color: var(--text-mid);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    /* ── Grid ── */
    .tm-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
        gap: 32px;
    }

    /* ── Card ── */
    .tm-card {
        background: var(--white);
        border-radius: 22px;
        overflow: hidden;
        border: 1.5px solid var(--border);
        box-shadow: 0 6px 24px rgba(0, 0, 0, .07);
        transition: all .38s cubic-bezier(.175, .885, .32, 1.2);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        position: relative;
    }

    /* Red top bar on hover */
    .tm-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: var(--brand);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .38s ease;
        z-index: 2;
    }

    .tm-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 24px 60px rgba(0, 0, 0, .13);
        border-color: rgba(199, 32, 39, .18);
    }

    .tm-card:hover::before {
        transform: scaleX(1);
    }

    /* Photo area */
    .tm-photo-area {
        width: 100%;
        background: linear-gradient(160deg, var(--brand-light) 0%, #fff5f5 100%);
        padding: 42px 0 32px;
        position: relative;
    }

    .tm-photo-ring {
        position: relative;
        width: 148px;
        height: 148px;
        margin: 0 auto;
    }

    .tm-photo-ring::before {
        content: '';
        position: absolute;
        inset: -5px;
        border-radius: 50%;
        background: conic-gradient(var(--brand) 0deg, var(--brand-dark) 120deg, rgba(199, 32, 39, .3) 240deg, var(--brand) 360deg);
        animation: spin 4s linear infinite;
        z-index: 0;
    }

    @keyframes spin {
        to {
            transform: rotate(360deg);
        }
    }

    .tm-photo {
        width: 148px;
        height: 148px;
        border-radius: 50%;
        object-fit: cover;
        border: 5px solid var(--white);
        position: relative;
        z-index: 1;
        display: block;
        transition: transform .4s ease;
    }

    .tm-card:hover .tm-photo {
        transform: scale(1.06);
    }

    /* Card body */
    .tm-card-body {
        padding: 24px 28px 32px;
        width: 100%;
    }

    .tm-name {
        font-size: 20px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 8px;
        letter-spacing: -.2px;
    }

    .tm-position {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .7px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 50px;
        margin-bottom: 22px;
    }

    /* Social links */
    .tm-socials {
        display: flex;
        justify-content: center;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .tm-socials a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        border: 1.5px solid rgba(199, 32, 39, .2);
        color: var(--brand);
        font-size: 15px;
        text-decoration: none;
        transition: all .3s ease;
        background: var(--brand-light);
    }

    .tm-socials a:hover {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(199, 32, 39, .35);
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
        .tm-section {
            padding: 70px 0 80px;
        }

        .tm-section-header {
            margin-bottom: 48px;
        }
    }

    @media (max-width: 640px) {
        .tm-hero {
            height: 360px;
        }

        .tm-section {
            padding: 55px 0 65px;
        }

        .tm-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 24px;
        }

        .tm-photo-ring,
        .tm-photo {
            width: 130px;
            height: 130px;
        }
    }
</style>

<div class="tm-wrap">

    {{-- ── Hero ── --}}
    <div class="tm-hero">
        @if($heroSlider)
        <div class="tm-hero-bg" style="background-image: url('{{ asset('/setting/banner/' . $heroSlider->image) }}')"></div>
        @endif
        <div class="tm-hero-ring tm-hero-ring-1"></div>
        <div class="tm-hero-ring tm-hero-ring-2"></div>
        <div class="tm-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="tm-hero-eyebrow">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                </svg>
                Imperial Education & Career
            </div>
            <h1>Meet Our Team</h1>
            <p>Dedicated professionals committed to guiding students toward their global education goals</p>
        </div>
    </div>

    {{-- ── Team Grid ── --}}
    <section class="tm-section">
        <div class="tm-container">

            <div class="tm-section-header" data-aos="fade-up" data-aos-duration="700">
                <span class="tm-section-tag">Our People</span>
                <h2>The Experts Behind Your Success</h2>
                <p>Our team brings years of experience in international education counselling, visa processing, and career guidance</p>
            </div>

            <div class="tm-grid">
                @foreach ($team as $index => $member)
                <div class="tm-card"
                    data-aos="fade-up"
                    data-aos-duration="700"
                    data-aos-delay="{{ ($index % 4) * 90 }}"
                    data-aos-once="true">

                    <div class="tm-photo-area">
                        <div class="tm-photo-ring">
                            <img src="{{ asset('/setting/committee/' . $member->photo) }}"
                                alt="{{ $member->name }}"
                                class="tm-photo">
                        </div>
                    </div>

                    <div class="tm-card-body">
                        <h5 class="tm-name">{{ $member->name }}</h5>
                        <span class="tm-position">{{ $member->position }}</span>

                        <ul class="tm-socials">
                            <li>
                                <a href="#" aria-label="Facebook">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="Twitter">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="Instagram">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" aria-label="LinkedIn">
                                    <i class="ri-linkedin-fill"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                @endforeach
            </div>

        </div>
    </section>

</div>
@endsection