@extends('frontend.layouts.app')
@section('title', __('Contact Us'))
@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');

    :root {
        --brand:      #C72027;
        --brand-dark: #A61B21;
        --brand-light:#FDECEA;
        --text-dark:  #1A1A2E;
        --text-mid:   #4B5563;
        --text-light: #9CA3AF;
        --bg-light:   #F8F9FB;
        --white:      #FFFFFF;
        --border:     rgba(0,0,0,.08);
    }

    .ct-wrap * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

    /* ── Hero ── */
    .ct-hero {
        position: relative;
        height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }
    .ct-hero::before {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(199,32,39,.9) 0%, rgba(26,26,46,.8) 100%);
        z-index: 1;
    }
    /* Decorative pattern */
    .ct-hero::after {
        content: '';
        position: absolute;
        width: 700px; height: 700px;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,.07);
        top: -280px; right: -180px;
        z-index: 1;
        pointer-events: none;
    }
    .ct-hero-inner {
        position: relative; z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 24px;
    }
    .ct-hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: rgba(255,255,255,.15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255,255,255,.28);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 7px 20px;
        border-radius: 50px;
        margin-bottom: 20px;
    }
    .ct-hero h1 {
        font-size: clamp(34px, 5vw, 58px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.5px;
        text-shadow: 0 4px 24px rgba(0,0,0,.2);
    }
    .ct-hero p {
        font-size: 17px;
        opacity: .85;
        max-width: 520px;
        margin: 0 auto;
        line-height: 1.65;
    }

    /* ── Body ── */
    .ct-body {
        background: var(--bg-light);
        padding: 90px 0 100px;
    }
    .ct-container {
        max-width: 1160px;
        margin: 0 auto;
        padding: 0 30px;
    }

    /* ── Two-column layout ── */
    .ct-layout {
        display: grid;
        grid-template-columns: 1fr 1.55fr;
        gap: 40px;
        align-items: start;
    }

    /* ── Info Panel ── */
    .ct-info {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .ct-info-header {
        background: linear-gradient(135deg, var(--brand) 0%, var(--brand-dark) 100%);
        border-radius: 20px;
        padding: 36px 32px;
        color: #fff;
        position: relative;
        overflow: hidden;
        box-shadow: 0 16px 48px -12px rgba(199,32,39,.45);
    }
    .ct-info-header::before {
        content: '';
        position: absolute;
        width: 260px; height: 260px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        bottom: -100px; right: -60px;
        pointer-events: none;
    }
    .ct-info-header h2 {
        font-size: 26px;
        font-weight: 800;
        margin: 0 0 10px;
        letter-spacing: -.3px;
    }
    .ct-info-header p {
        font-size: 15px;
        opacity: .85;
        margin: 0;
        line-height: 1.6;
    }

    .ct-info-item {
        background: var(--white);
        border-radius: 16px;
        padding: 22px 24px;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 18px rgba(0,0,0,.06);
        display: flex;
        align-items: flex-start;
        gap: 16px;
        transition: all .3s ease;
    }
    .ct-info-item:hover {
        border-color: rgba(199,32,39,.2);
        transform: translateX(4px);
        box-shadow: 0 8px 28px rgba(0,0,0,.09);
    }
    .ct-info-icon {
        width: 48px; height: 48px;
        border-radius: 12px;
        background: var(--brand-light);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        color: var(--brand);
        font-size: 20px;
    }
    .ct-info-text strong {
        display: block;
        font-size: 13px;
        font-weight: 700;
        color: var(--text-light);
        letter-spacing: .6px;
        text-transform: uppercase;
        margin-bottom: 4px;
    }
    .ct-info-text span, .ct-info-text a {
        font-size: 15px;
        font-weight: 600;
        color: var(--text-dark);
        text-decoration: none;
        line-height: 1.5;
    }
    .ct-info-text a:hover { color: var(--brand); }

    /* Map */
    .ct-map {
        border-radius: 16px;
        overflow: hidden;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 18px rgba(0,0,0,.06);
        height: 220px;
    }
    .ct-map iframe {
        width: 100%; height: 100%;
        display: block;
        border: none;
        filter: grayscale(.1);
    }

    /* ── Form Panel ── */
    .ct-form-card {
        background: var(--white);
        border-radius: 22px;
        padding: 48px 48px;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 36px rgba(0,0,0,.08);
    }
    .ct-form-title {
        font-size: 28px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 8px;
        letter-spacing: -.3px;
    }
    .ct-form-subtitle {
        font-size: 15px;
        color: var(--text-mid);
        margin: 0 0 36px;
        line-height: 1.6;
    }
    .ct-form-subtitle span { color: var(--brand); font-weight: 600; }

    .ct-form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
    .ct-form-group { margin-bottom: 22px; display: flex; flex-direction: column; }
    .ct-form-group.full { grid-column: 1 / -1; }

    .ct-form-group label {
        font-size: 13px;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 8px;
        letter-spacing: .3px;
    }
    .ct-form-group label span { color: var(--brand); }

    .ct-input, .ct-textarea {
        width: 100%;
        padding: 14px 18px;
        border: 1.5px solid rgba(0,0,0,.1);
        border-radius: 12px;
        font-size: 15px;
        font-family: 'Inter', sans-serif;
        color: var(--text-dark);
        background: var(--bg-light);
        transition: all .3s ease;
        outline: none;
    }
    .ct-input::placeholder, .ct-textarea::placeholder { color: var(--text-light); }
    .ct-input:focus, .ct-textarea:focus {
        border-color: var(--brand);
        background: var(--white);
        box-shadow: 0 0 0 4px rgba(199,32,39,.1);
    }
    .ct-textarea {
        resize: vertical;
        min-height: 140px;
    }

    .ct-submit-btn {
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
        box-shadow: 0 8px 28px rgba(199,32,39,.35);
        font-family: 'Inter', sans-serif;
        margin-top: 6px;
    }
    .ct-submit-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 14px 38px rgba(199,32,39,.45);
    }
    .ct-submit-btn svg { transition: transform .3s ease; }
    .ct-submit-btn:hover svg { transform: translateX(4px); }

    /* Success/Error alert */
    .ct-alert {
        padding: 14px 20px;
        border-radius: 12px;
        font-size: 15px;
        font-weight: 600;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .ct-alert.success { background: #ecfdf5; color: #065f46; border: 1.5px solid #6ee7b7; }
    .ct-alert.error   { background: var(--brand-light); color: var(--brand-dark); border: 1.5px solid rgba(199,32,39,.25); }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .ct-layout { grid-template-columns: 1fr; }
        .ct-info { flex-direction: row; flex-wrap: wrap; }
        .ct-info-header { flex: 100%; }
        .ct-info-item { flex: calc(50% - 10px); }
        .ct-map { flex: 100%; }
    }
    @media (max-width: 768px) {
        .ct-body { padding: 60px 0 70px; }
        .ct-form-card { padding: 32px 28px; }
        .ct-form-row { grid-template-columns: 1fr; }
        .ct-form-group.full { grid-column: auto; }
    }
    @media (max-width: 480px) {
        .ct-hero { height: 340px; }
        .ct-info { flex-direction: column; }
        .ct-info-item { flex: auto; }
        .ct-form-card { padding: 26px 20px; }
    }
</style>

<div class="ct-wrap">

    {{-- ── Hero ── --}}
    <div class="ct-hero">
        <div class="ct-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="ct-hero-badge">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.07 9.81a2 2 0 012-2.18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L10.09 14a16 16 0 006.29 6.29l.27-.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 22v-.08z"/></svg>
                Get In Touch
            </div>
            <h1>Contact Us</h1>
            <p>We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>
    </div>

    {{-- ── Body ── --}}
    <div class="ct-body">
        <div class="ct-container">
            <div class="ct-layout">

                {{-- ── Info Panel ── --}}
                <div class="ct-info" data-aos="fade-right" data-aos-duration="800">

                    <div class="ct-info-header">
                        <h2>Let's Connect</h2>
                        <p>Reach out through any of the channels below or fill out the form and we'll be in touch shortly.</p>
                    </div>

                    <div class="ct-info-item">
                        <div class="ct-info-icon">
                            <i class="ri-map-pin-line"></i>
                        </div>
                        <div class="ct-info-text">
                            <strong>Our Office</strong>
                            <span>{{ get_setting('office_address') }}</span>
                        </div>
                    </div>

                    <div class="ct-info-item">
                        <div class="ct-info-icon">
                            <i class="ri-phone-line"></i>
                        </div>
                        <div class="ct-info-text">
                            <strong>Phone</strong>
                            <a href="tel:{{ get_setting('office_phone') }}">{{ get_setting('office_phone') }}</a>
                        </div>
                    </div>

                    <div class="ct-info-item">
                        <div class="ct-info-icon">
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="ct-info-text">
                            <strong>Email</strong>
                            <a href="mailto:{{ get_setting('office_email') }}">{{ get_setting('office_email') }}</a>
                        </div>
                    </div>

                    @php
                        $mapUrl = 'https://maps.google.com/maps?q=' . urlencode(get_setting('office_address')) . '&t=&z=14&ie=UTF8&iwloc=&output=embed';
                    @endphp
                    <div class="ct-map">
                        <iframe src="{{ $mapUrl }}" loading="lazy" allowfullscreen></iframe>
                    </div>

                </div>

                {{-- ── Form Panel ── --}}
                <div class="ct-form-card" data-aos="fade-left" data-aos-duration="800">

                    <h2 class="ct-form-title">Send a Message</h2>
                    <p class="ct-form-subtitle">Fill in the details below and our team will get back to you within <span>24 hours</span>.</p>

                    {{-- Alerts --}}
                    @if(session('success'))
                        <div class="ct-alert success">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 11.08V12a10 10 0 11-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            {{ session('success') }}
                        </div>
                    @endif
                    @if($errors->any())
                        <div class="ct-alert error">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            Please fix the errors below and try again.
                        </div>
                    @endif

                    <x-forms.post :action="route('frontend.pages.contact')" id="contact" name="contact">

                        <div class="ct-form-row">
                            <div class="ct-form-group">
                                <label for="name">Full Name <span>*</span></label>
                                <input type="text"
                                       name="name"
                                       id="name"
                                       class="ct-input"
                                       value="{{ old('name') }}"
                                       placeholder="Your full name"
                                       maxlength="100"
                                       required
                                       autocomplete="name">
                                @error('name')<small style="color:var(--brand);font-size:13px;margin-top:5px;">{{ $message }}</small>@enderror
                            </div>

                            <div class="ct-form-group">
                                <label for="phone">Phone Number <span>*</span></label>
                                <input type="tel"
                                       name="phone"
                                       id="phone"
                                       class="ct-input"
                                       value="{{ old('phone') }}"
                                       placeholder="+880 1XXX-XXXXXX"
                                       maxlength="20"
                                       required
                                       autocomplete="tel">
                                @error('phone')<small style="color:var(--brand);font-size:13px;margin-top:5px;">{{ $message }}</small>@enderror
                            </div>
                        </div>

                        <div class="ct-form-group">
                            <label for="email">Email Address <span>*</span></label>
                            <input type="email"
                                   name="email"
                                   id="email"
                                   class="ct-input"
                                   value="{{ old('email') }}"
                                   placeholder="you@example.com"
                                   maxlength="255"
                                   required
                                   autocomplete="email">
                            @error('email')<small style="color:var(--brand);font-size:13px;margin-top:5px;">{{ $message }}</small>@enderror
                        </div>

                        <div class="ct-form-group">
                            <label for="message">Your Message <span>*</span></label>
                            <textarea name="message"
                                      id="message"
                                      class="ct-textarea"
                                      placeholder="Tell us how we can help you..."
                                      required>{{ old('message') }}</textarea>
                            @error('message')<small style="color:var(--brand);font-size:13px;margin-top:5px;">{{ $message }}</small>@enderror
                        </div>

                        <button type="submit" class="ct-submit-btn">
                            Send Message
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="22" y1="2" x2="11" y2="13"/><polygon points="22 2 15 22 11 13 2 9 22 2"/></svg>
                        </button>

                    </x-forms.post>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection