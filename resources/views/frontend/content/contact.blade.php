@extends('frontend.layouts.app')
@section('content')
@section('title', __('Contact'))

<title>{{ app_name() }} | @yield('title')</title>

@php
$sliders = DB::table('sliders')->where('is_active', 1)->get();
$heroSlider = $sliders->first();
$mapUrl = 'https://maps.google.com/maps?q=' . urlencode(get_setting('office_address')) . '&t=&z=14&ie=UTF8&iwloc=&output=embed';
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
        --border: rgba(0, 0, 0, .08);
    }

    .cx-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero ── */
    .cx-hero {
        position: relative;
        height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }

    .cx-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        filter: brightness(.4) saturate(.8);
        transition: transform 8s ease;
    }

    .cx-hero:hover .cx-hero-bg {
        transform: scale(1.04);
    }

    .cx-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(199, 32, 40, 0.19) 0%, rgba(26, 26, 46, .78) 100%);
    }

    .cx-hero-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, .07);
        pointer-events: none;
        z-index: 1;
    }

    .cx-ring-1 {
        width: 600px;
        height: 600px;
        top: -250px;
        right: -150px;
    }

    .cx-ring-2 {
        width: 360px;
        height: 360px;
        bottom: -160px;
        left: 40px;
    }

    .cx-hero-inner {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 24px;
    }

    .cx-hero-badge {
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

    .cx-hero h1 {
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.5px;
        text-shadow: 0 4px 24px rgba(0, 0, 0, .22);
    }

    .cx-hero p {
        font-size: 17px;
        color: #ffffff;
        max-width: 520px;
        margin: 0 auto;
        line-height: 1.65;
        text-shadow: 0 2px 8px rgba(0, 0, 0, .4);
    }

    /* ── Body ── */
    .cx-body {
        background: var(--bg-light);
        padding: 90px 0 100px;
    }

    .cx-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* ── Main Grid ── */
    .cx-grid {
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 40px;
        align-items: start;
    }

    /* ─────────────────────────────── */
    /* ── Left: Appointment Form ──── */
    /* ─────────────────────────────── */
    .cx-form-card {
        background: var(--white);
        border-radius: 22px;
        padding: 48px 48px;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 36px rgba(0, 0, 0, .08);
    }

    .cx-section-tag {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 5px 16px;
        border-radius: 50px;
        margin-bottom: 14px;
    }

    .cx-form-title {
        font-size: 30px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 6px;
        letter-spacing: -.3px;
    }

    .cx-form-sub {
        font-size: 15px;
        color: var(--text-mid);
        margin: 0 0 34px;
        line-height: 1.6;
    }

    .cx-form-sub strong {
        color: var(--brand);
    }

    .cx-form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 0;
    }

    .cx-fg {
        margin-bottom: 20px;
        display: flex;
        flex-direction: column;
    }

    .cx-fg label {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
        letter-spacing: .3px;
    }

    .cx-fg label span {
        color: var(--brand);
    }

    .cx-input,
    .cx-textarea {
        width: 100%;
        padding: 13px 17px;
        border: 1.5px solid rgba(0, 0, 0, .1);
        border-radius: 11px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background: var(--bg-light);
        transition: all .3s ease;
        outline: none;
    }

    .cx-input::placeholder,
    .cx-textarea::placeholder {
        color: var(--text-light);
    }

    .cx-input:focus,
    .cx-textarea:focus {
        border-color: var(--brand);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(199, 32, 39, .1);
    }

    .cx-textarea {
        resize: vertical;
        min-height: 120px;
    }

    .cx-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        width: 100%;
        padding: 17px 36px;
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
        color: #fff;
        font-size: 16px;
        font-weight: 700;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        transition: all .3s ease;
        letter-spacing: .4px;
        box-shadow: 0 8px 28px rgba(199, 32, 39, .35);
        font-family: 'Inter', sans-serif;
        margin-top: 6px;
    }

    .cx-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 38px rgba(199, 32, 39, .45);
    }

    .cx-btn svg {
        transition: transform .3s ease;
    }

    .cx-btn:hover svg {
        transform: translateX(4px);
    }

    .cx-alert-success {
        display: flex;
        align-items: center;
        gap: 10px;
        background: #ecfdf5;
        color: #065f46;
        border: 1.5px solid #6ee7b7;
        padding: 14px 20px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 26px;
    }

    /* ─────────────────────────────── */
    /* ── Right: Contact Info ──────── */
    /* ─────────────────────────────── */
    .cx-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .cx-info-header {
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
        border-radius: 20px;
        padding: 36px 32px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 16px 48px -12px rgba(199, 32, 39, .45);
    }

    .cx-info-header::before {
        content: '';
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        background: rgba(255, 255, 255, .07);
        bottom: -100px;
        right: -60px;
        pointer-events: none;
    }

    .cx-info-header h2 {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 10px;
        letter-spacing: -.3px;
    }

    .cx-info-header p {
        font-size: 14.5px;
        color: rgba(255, 255, 255, .95);
        margin: 0;
        line-height: 1.65;
    }

    .cx-info-item {
        background: var(--white);
        border-radius: 16px;
        padding: 20px 22px;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
        display: flex;
        align-items: flex-start;
        gap: 16px;
        transition: all .3s ease;
        text-decoration: none;
    }

    .cx-info-item:hover {
        border-color: rgba(199, 32, 39, .2);
        transform: translateX(4px);
        box-shadow: 0 8px 28px rgba(0, 0, 0, .09);
    }

    .cx-info-icon {
        width: 46px;
        height: 46px;
        border-radius: 12px;
        background: var(--brand-light);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--brand);
        font-size: 20px;
    }

    .cx-info-text strong {
        display: block;
        font-size: 12px;
        font-weight: 700;
        color: var(--text-light);
        letter-spacing: .6px;
        text-transform: uppercase;
        margin-bottom: 4px;
    }

    .cx-info-text span,
    .cx-info-text a {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark);
        text-decoration: none;
        line-height: 1.5;
        display: block;
    }

    .cx-info-text a:hover {
        color: var(--brand);
    }

    /* Social */
    .cx-social-card {
        background: var(--white);
        border-radius: 16px;
        padding: 22px 22px;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
    }

    .cx-social-card h4 {
        font-size: 15px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0 0 16px;
        letter-spacing: .2px;
    }

    .cx-socials {
        display: flex;
        gap: 10px;
        list-style: none;
        margin: 0;
        padding: 0;
        flex-wrap: wrap;
    }

    .cx-socials a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 42px;
        height: 42px;
        border-radius: 12px;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 18px;
        text-decoration: none;
        border: 1.5px solid rgba(199, 32, 39, .15);
        transition: all .3s ease;
    }

    .cx-socials a:hover {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(199, 32, 39, .35);
    }

    /* Map */
    .cx-map {
        border-radius: 16px;
        overflow: hidden;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
        height: 200px;
    }

    .cx-map iframe {
        width: 100%;
        height: 100%;
        display: block;
        border: none;
        filter: grayscale(.1);
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .cx-grid {
            grid-template-columns: 1fr;
        }

        .cx-info {
            flex-direction: row;
            flex-wrap: wrap;
        }

        .cx-info-header {
            flex: 100%;
        }

        .cx-info-item {
            flex: calc(50% - 10px);
        }

        .cx-social-card,
        .cx-map {
            flex: calc(50% - 10px);
        }
    }

    @media (max-width: 768px) {
        .cx-body {
            padding: 60px 0 70px;
        }

        .cx-form-card {
            padding: 32px 26px;
        }

        .cx-form-row {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 560px) {
        .cx-hero {
            height: 340px;
        }

        .cx-info {
            flex-direction: column;
        }

        .cx-info-item,
        .cx-social-card,
        .cx-map {
            flex: 100%;
        }

        .cx-form-card {
            padding: 26px 18px;
        }
    }
</style>

<div class="cx-wrap">

    {{-- ── Hero ── --}}
    <div class="cx-hero">
        @if($heroSlider)
        <div class="cx-hero-bg" style="background-image: url('{{ asset('/setting/banner/' . $heroSlider->image) }}')"></div>
        @endif
        <div class="cx-hero-ring cx-ring-1"></div>
        <div class="cx-hero-ring cx-ring-2"></div>
        <div class="cx-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="cx-hero-badge">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.07 9.81a2 2 0 012-2.18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L10.09 14a16 16 0 006.29 6.29l.27-.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 22v-.08z" />
                </svg>
                Contact & Appointments
            </div>
            <h1>Get In Touch</h1>
            <p>Book an appointment or reach out to us — we're here to help you every step of the way.</p>
        </div>
    </div>

    {{-- ── Body ── --}}
    <div class="cx-body">
        <div class="cx-container">
            <div class="cx-grid">

                {{-- ── Left: Appointment Form ── --}}
                <div class="cx-form-card" data-aos="fade-right" data-aos-duration="800">
                    <span class="cx-section-tag">Appointment</span>
                    <h2 class="cx-form-title">Book Your Appointment</h2>
                    <p class="cx-form-sub">Fill in the details below and our counsellors will confirm within <strong>24 hours</strong>.</p>

                    @if(session('success'))
                    <div class="cx-alert-success">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg>
                        {{ session('success') }}
                    </div>
                    @endif

                    <form action="{{ route('appointment.store') }}" method="POST">
                        @csrf

                        <div class="cx-form-row" style="margin-bottom:20px;">
                            <div class="cx-fg" style="margin-bottom:0;">
                                <label for="name">Full Name <span>*</span></label>
                                <input type="text" id="name" name="name" class="cx-input"
                                    placeholder="Your full name" required
                                    value="{{ old('name') }}">
                            </div>
                            <div class="cx-fg" style="margin-bottom:0;">
                                <label for="phone">Phone Number <span>*</span></label>
                                <input type="tel" id="phone" name="phone" class="cx-input"
                                    placeholder="+880 1XXX-XXXXXX" required
                                    value="{{ old('phone') }}">
                            </div>
                        </div>

                        <div class="cx-fg">
                            <label for="car_model">Address <span>*</span></label>
                            <input type="text" id="car_model" name="car_model" class="cx-input"
                                placeholder="Your home address" required
                                value="{{ old('car_model') }}">
                        </div>

                        <div class="cx-form-row" style="margin-bottom:20px;">
                            <div class="cx-fg" style="margin-bottom:0;">
                                <label for="date">Preferred Date <span>*</span></label>
                                <input type="date" id="date" name="date" class="cx-input" required>
                            </div>
                            <div class="cx-fg" style="margin-bottom:0;">
                                <label for="time">Preferred Time <span>*</span></label>
                                <input type="time" id="time" name="time" class="cx-input" required>
                            </div>
                        </div>

                        <div class="cx-fg">
                            <label for="note">Additional Notes</label>
                            <textarea id="note" name="note" class="cx-textarea"
                                placeholder="Any special requests or topics you'd like to discuss...">{{ old('note') }}</textarea>
                        </div>

                        <button type="submit" class="cx-btn">
                            Book Appointment
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <rect x="3" y="4" width="18" height="18" rx="2" />
                                <path d="M16 2v4M8 2v4M3 10h18" />
                            </svg>
                        </button>
                    </form>
                </div>

                {{-- ── Right: Contact Info ── --}}
                <div class="cx-info" data-aos="fade-left" data-aos-duration="800">

                    <div class="cx-info-header">
                        <h2>Contact Information</h2>
                        <p>Reach out through any channel below. We're happy to assist you with your education and career goals.</p>
                    </div>

                    <div class="cx-info-item">
                        <div class="cx-info-icon"><i class="ri-phone-line"></i></div>
                        <div class="cx-info-text">
                            <strong>Phone</strong>
                            <a href="tel:{{ get_setting('office_phone') }}">{{ get_setting('office_phone') }}</a>
                        </div>
                    </div>

                    <div class="cx-info-item">
                        <div class="cx-info-icon"><i class="ri-mail-line"></i></div>
                        <div class="cx-info-text">
                            <strong>Email</strong>
                            <a href="mailto:{{ get_setting('office_email') }}">{{ get_setting('office_email') }}</a>
                        </div>
                    </div>

                    <div class="cx-info-item">
                        <div class="cx-info-icon"><i class="ri-map-pin-line"></i></div>
                        <div class="cx-info-text">
                            <strong>Office Address</strong>
                            <span>{{ get_setting('office_address') }}</span>
                        </div>
                    </div>

                    <div class="cx-social-card">
                        <h4>Follow Us On Social Media</h4>
                        <ul class="cx-socials">
                            <li><a href="{{ get_setting('facebook') }}" target="_blank" aria-label="Facebook"><i class="ri-facebook-fill"></i></a></li>
                            <li><a href="{{ get_setting('twitter') }}" target="_blank" aria-label="Twitter"><i class="ri-twitter-fill"></i></a></li>
                            <li><a href="{{ get_setting('instagram') }}" target="_blank" aria-label="Instagram"><i class="ri-instagram-line"></i></a></li>
                            <li><a href="{{ get_setting('linkedin') }}" target="_blank" aria-label="LinkedIn"><i class="ri-linkedin-fill"></i></a></li>
                        </ul>
                    </div>

                    <div class="cx-map">
                        <iframe src="{{ $mapUrl }}" loading="lazy" allowfullscreen></iframe>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>
@endsection