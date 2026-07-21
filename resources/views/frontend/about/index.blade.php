@extends('frontend.layouts.app')
@section('content')
@section('title', __('About Us'))

<title>{{ app_name() }} | @yield('title')</title>

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
        --border:     rgba(0,0,0,.07);
    }

    .ab-wrap * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

    /* ── Hero ── */
    .ab-hero {
        position: relative;
        height: 460px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }
    .ab-hero-bg {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        filter: brightness(.45) saturate(.85);
        transition: transform 8s ease;
    }
    .ab-hero:hover .ab-hero-bg { transform: scale(1.04); }
    .ab-hero::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(135deg, rgba(199, 32, 40, 0.19) 0%, rgba(26, 26, 46, .78) 100%);
    }
    .ab-hero-ring {
        position: absolute;
        border-radius: 50%;
        border: 1px solid rgba(255,255,255,.07);
        pointer-events: none;
        z-index: 1;
    }
    .ab-ring-1 { width: 600px; height: 600px; top: -250px; right: -150px; }
    .ab-ring-2 { width: 360px; height: 360px; bottom: -160px; left: 40px; }

    .ab-hero-inner {
        position: relative; z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 24px;
    }
    .ab-hero-badge {
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
        margin-bottom: 18px;
    }
    .ab-hero h1 {
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 800;
        margin: 0 0 14px;
        letter-spacing: -.5px;
        text-shadow: 0 4px 24px rgba(0,0,0,.3);
        color: #fff;
    }
    .ab-hero p {
        font-size: 17px;
        color: #ffffff;
        max-width: 540px;
        margin: 0 auto;
        line-height: 1.65;
        text-shadow: 0 2px 8px rgba(0,0,0,.4);
    }

    /* ── Body ── */
    .ab-body { background: var(--bg-light); }
    .ab-container { max-width: 1200px; margin: 0 auto; padding: 0 30px; }

    /* ── Section spacing ── */
    .ab-section { padding: 90px 0; }
    .ab-section-alt { padding: 90px 0; background: var(--white); }

    .ab-section-tag {
        display: inline-block;
        background: var(--brand-light);
        color: var(--brand);
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 5px 16px;
        border-radius: 50px;
        margin-bottom: 12px;
    }

    /* ── About Intro: Two-column ── */
    .ab-intro-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center;
    }
    .ab-intro-img-wrap {
        position: relative;
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 24px 60px rgba(0,0,0,.13);
    }
    .ab-intro-img-wrap::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(199,32,39,.1) 0%, transparent 60%);
        z-index: 1;
    }
    .ab-intro-img-wrap img {
        width: 100%;
        height: 480px;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }
    .ab-intro-img-wrap:hover img { transform: scale(1.04); }

    .ab-intro-content h2 {
        font-size: clamp(28px, 3.5vw, 40px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 20px;
        letter-spacing: -.4px;
        line-height: 1.2;
    }
    .ab-intro-content p {
        font-size: 16.5px;
        color: var(--text-mid);
        line-height: 1.8;
        margin: 0;
        text-align: justify;
    }

    /* ── Why Choose Us ── */
    .ab-why-content {
        background: var(--white);
        border-radius: 20px;
        padding: 44px 48px;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 36px rgba(0,0,0,.07);
        font-size: 16.5px;
        color: var(--text-mid);
        line-height: 1.8;
    }
    .ab-why-content h2 {
        font-size: clamp(26px, 3vw, 38px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 20px;
        letter-spacing: -.3px;
    }

    /* ── Features row ── */
    .ab-features {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 28px;
        margin-top: 0;
    }
    .ab-feature-card {
        background: var(--white);
        border-radius: 18px;
        padding: 32px 24px;
        text-align: center;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 20px rgba(0,0,0,.06);
        transition: all .35s ease;
        position: relative;
        overflow: hidden;
    }
    .ab-feature-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 3px;
        background: var(--brand);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .35s ease;
    }
    .ab-feature-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 50px rgba(0,0,0,.11);
        border-color: rgba(199,32,39,.15);
    }
    .ab-feature-card:hover::before { transform: scaleX(1); }

    .ab-feature-icon {
        width: 72px; height: 72px;
        border-radius: 50%;
        object-fit: cover;
        border: 2px solid var(--border);
        margin: 0 auto 18px;
        display: block;
    }
    .ab-feature-title {
        font-size: 16px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 10px;
    }
    .ab-feature-text {
        font-size: 14px;
        color: var(--text-mid);
        line-height: 1.65;
        margin: 0;
    }

    /* ── Mission / Vision cards ── */
    .ab-mv-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }
    .ab-mv-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px 36px;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 32px rgba(0,0,0,.07);
        text-align: center;
        transition: all .35s ease;
        position: relative;
        overflow: hidden;
    }
    .ab-mv-card::after {
        content: '';
        position: absolute;
        bottom: 0; left: 0; right: 0;
        height: 4px;
        border-radius: 0 0 20px 20px;
    }
    .ab-mv-card.mission::after { background: var(--brand); }
    .ab-mv-card.vision::after  { background: #2e7d32; }

    .ab-mv-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 56px rgba(0,0,0,.12);
    }
    .ab-mv-emoji {
        font-size: 48px;
        display: block;
        margin-bottom: 18px;
    }
    .ab-mv-card h3 {
        font-size: 24px;
        font-weight: 800;
        margin: 0 0 16px;
        letter-spacing: -.2px;
    }
    .ab-mv-card.mission h3 { color: var(--brand); }
    .ab-mv-card.vision h3  { color: #2e7d32; }
    .ab-mv-card p {
        font-size: 16px;
        color: var(--text-mid);
        line-height: 1.75;
        margin: 0;
        text-align: justify;
    }

    /* ── Document cards (License / Portfolio) ── */
    .ab-doc-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 28px;
    }
    .ab-doc-card {
        background: var(--white);
        border-radius: 20px;
        padding: 40px 36px;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 32px rgba(0,0,0,.07);
        text-align: center;
        transition: all .35s ease;
        position: relative;
    }
    .ab-doc-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0;
        height: 4px;
        border-radius: 20px 20px 0 0;
        background: var(--brand);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .4s ease;
    }
    .ab-doc-card:hover::before { transform: scaleX(1); }
    .ab-doc-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 24px 56px rgba(0,0,0,.12);
        border-color: rgba(199,32,39,.15);
    }
    .ab-doc-emoji { font-size: 48px; display: block; margin-bottom: 18px; }
    .ab-doc-card h3 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 12px;
        letter-spacing: -.2px;
    }
    .ab-doc-card p {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.65;
        margin: 0 0 24px;
    }
    .ab-doc-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 12px 26px;
        background: linear-gradient(135deg, #6B7280 0%, #9CA3AF 100%);
        color: #fff !important;
        font-size: 14px;
        font-weight: 700;
        border-radius: 50px;
        text-decoration: none !important;
        transition: all .35s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, .18);
        letter-spacing: .3px;
        position: relative;
        overflow: hidden;
    }
    .ab-doc-btn::before {
        content: '';
        position: absolute;
        top: 0; left: -75%;
        width: 50%; height: 100%;
        background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.28) 50%, transparent 100%);
        transform: skewX(-20deg);
        transition: left .55s ease;
        pointer-events: none;
    }
    .ab-doc-btn:hover::before {
        left: 130%;
    }
    .ab-doc-btn:hover {
        background: linear-gradient(135deg, #C72027 0%, #e03037 100%);
        transform: translateY(-2px);
        box-shadow:
            0 8px 24px rgba(199, 32, 39, .5),
            0 0 0 5px rgba(199, 32, 39, .1);
        color: #fff !important;
    }

    /* ── Section heading helpers ── */
    .ab-sh { margin-bottom: 48px; }
    .ab-sh h2 {
        font-size: clamp(28px, 3.5vw, 42px);
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 10px;
        letter-spacing: -.4px;
    }
    .ab-sh p {
        font-size: 16px;
        color: var(--text-mid);
        margin: 0;
        max-width: 620px;
    }

    /* ── Responsive ── */
    @media (max-width: 991px) {
        .ab-intro-grid { grid-template-columns: 1fr; gap: 40px; }
        .ab-intro-img-wrap img { height: 340px; }
        .ab-mv-grid, .ab-doc-grid { grid-template-columns: 1fr; }
    }
    @media (max-width: 640px) {
        .ab-hero { height: 360px; }
        .ab-section, .ab-section-alt { padding: 60px 0; }
        .ab-why-content { padding: 28px 24px; }
        .ab-features { grid-template-columns: 1fr 1fr; }
    }
    @media (max-width: 420px) {
        .ab-features { grid-template-columns: 1fr; }
    }
</style>

<div class="ab-wrap">

    {{-- ── Hero ── --}}
    <div class="ab-hero">
        <div class="ab-hero-bg" style="background-image: url('{{ asset('/setting/about/' . $about->banner_img) }}')"></div>
        <div class="ab-hero-ring ab-ring-1"></div>
        <div class="ab-hero-ring ab-ring-2"></div>
        <div class="ab-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <div class="ab-hero-badge">
                <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M12 8v4M12 16h.01"/></svg>
                Imperial Education & Career
            </div>
            <h1>About Us</h1>
            <p>Dedicated to guiding students toward their global education and career aspirations</p>
        </div>
    </div>

    {{-- ── About Intro ── --}}
    <div class="ab-section">
        <div class="ab-container">
            <div class="ab-intro-grid">
                <div class="ab-intro-img-wrap" data-aos="fade-right" data-aos-duration="800">
                    <img src="{{ asset('/setting/about/' . $about->about_image) }}" alt="About Us">
                </div>
                <div class="ab-intro-content" data-aos="fade-left" data-aos-duration="800">
                    <span class="ab-section-tag">Who We Are</span>
                    <h2>{{ app_name() }}</h2>
                    <p>{{ $about->short_description }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Why Choose Us ── --}}
    <div class="ab-section-alt">
        <div class="ab-container">
            <div class="ab-why-content" data-aos="fade-up" data-aos-duration="800">
                <span class="ab-section-tag">Why Choose Us</span>
                <h2>Our Commitment to You</h2>
                <div>{!! $about->description !!}</div>
            </div>
        </div>
    </div>

    {{-- ── Features ── --}}
    <div class="ab-section">
        <div class="ab-container">
            <div class="ab-sh" data-aos="fade-up" data-aos-duration="700">
                <span class="ab-section-tag">Our Strengths</span>
                <h2>What Sets Us Apart</h2>
            </div>
            <div class="ab-features">
                <div class="ab-feature-card" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                    <img src="{{ asset('setting/brand/hybrid.png') }}" alt="Reliable" class="ab-feature-icon">
                    <div class="ab-feature-title">Reliable</div>
                    <p class="ab-feature-text">Our service is fully customer-centric and focused on bringing the best results and a smile of satisfaction on your face.</p>
                </div>
                <div class="ab-feature-card" data-aos="fade-up" data-aos-delay="90" data-aos-duration="700">
                    <img src="{{ asset('setting/brand/best_price.jpg') }}" alt="Affordable Price" class="ab-feature-icon">
                    <div class="ab-feature-title">Affordable Price</div>
                    <p class="ab-feature-text">Affordability and quality are always on top of our agenda, with customer convenience given top priority.</p>
                </div>
                <div class="ab-feature-card" data-aos="fade-up" data-aos-delay="180" data-aos-duration="700">
                    <img src="{{ asset('setting/brand/quality.png') }}" alt="High Quality Service" class="ab-feature-icon">
                    <div class="ab-feature-title">High Quality Service</div>
                    <p class="ab-feature-text">Premium quality, industry-leading guidance to help students achieve their maximum potential.</p>
                </div>
                <div class="ab-feature-card" data-aos="fade-up" data-aos-delay="270" data-aos-duration="700">
                    <img src="{{ asset('setting/brand/eco.jpg') }}" alt="Global Reach" class="ab-feature-icon">
                    <div class="ab-feature-title">Green Energy</div>
                    <p class="ab-feature-text">We are committed to promoting sustainable and eco-friendly solutions for a better future.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── Mission & Vision ── --}}
    <div class="ab-section-alt">
        <div class="ab-container">
            <div class="ab-sh" data-aos="fade-up" data-aos-duration="700">
                <span class="ab-section-tag">Our Direction</span>
                <h2>Mission & Vision</h2>
                <p>The values and goals that drive everything we do</p>
            </div>
            <div class="ab-mv-grid">
                <div class="ab-mv-card mission" data-aos="fade-right" data-aos-duration="800">
                    <span class="ab-mv-emoji">🎯</span>
                    <h3>Our Mission</h3>
                    <p>{{ $mission->mission_vision ?? 'Mission content is not available.' }}</p>
                </div>
                <div class="ab-mv-card vision" data-aos="fade-left" data-aos-duration="800">
                    <span class="ab-mv-emoji">🚀</span>
                    <h3>Our Vision</h3>
                    <p>{{ $mission->text ?? 'Vision content is not available.' }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- ── License & Portfolio ── --}}
    <div class="ab-section">
        <div class="ab-container">
            <div class="ab-sh" data-aos="fade-up" data-aos-duration="700">
                <span class="ab-section-tag">Documents</span>
                <h2>License & Portfolio</h2>
                <p>Official credentials and a showcase of our work</p>
            </div>
            <div class="ab-doc-grid">
                <div class="ab-doc-card" data-aos="fade-right" data-aos-duration="800">
                    <span class="ab-doc-emoji">📜</span>
                    <h3>Our License</h3>
                    <p>Official government-recognized license for authorized education consultancy operations.</p>
                    @if($mission->pdf_file)
                        <a href="{{ asset('setting/mission/' . $mission->pdf_file) }}" target="_blank" class="ab-doc-btn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            View Official License
                        </a>
                    @else
                        <span style="color:var(--text-light);font-size:14px;">No License File Available</span>
                    @endif
                </div>
                <div class="ab-doc-card" data-aos="fade-left" data-aos-duration="800">
                    <span class="ab-doc-emoji">💼</span>
                    <h3>Our Portfolio</h3>
                    <p>Explore our showcase of work, achievements, and successful student placements worldwide.</p>
                    @if($mission->portfolio)
                        <a href="{{ asset('setting/mission/' . $mission->portfolio) }}" target="_blank" class="ab-doc-btn">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                            View Portfolio
                        </a>
                    @else
                        <span style="color:var(--text-light);font-size:14px;">No Portfolio File Available</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
