@extends('frontend.layouts.app')
@section('content')

@section('title', __('Blogs'))
<title>{{ app_name() }} | @yield('title')</title>

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

    .bl-wrap * {
        font-family: 'Inter', sans-serif;
        box-sizing: border-box;
    }

    /* ── Hero ── */
    .bl-hero {
        position: relative;
        height: 420px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: var(--brand);
    }

    .bl-hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        filter: brightness(.45) saturate(.85);
        transition: transform 8s ease;
    }

    .bl-hero:hover .bl-hero-bg {
        transform: scale(1.04);
    }

    .bl-hero::after {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(199, 32, 40, 0.19) 0%, rgba(26, 26, 46, .78) 100%);
    }

    .bl-hero-inner {
        position: relative;
        z-index: 2;
        text-align: center;
        color: #fff;
        padding: 0 20px;
    }

    .bl-hero-eyebrow {
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
        margin-bottom: 16px;
    }

    .bl-hero h1 {
        font-size: clamp(36px, 5vw, 60px);
        font-weight: 800;
        margin: 0;
        letter-spacing: -.5px;
        text-shadow: 0 4px 24px rgba(0, 0, 0, .25);
    }

    /* ── Layout ── */
    .bl-body {
        background: var(--bg-light);
        padding: 80px 0 90px;
    }

    .bl-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 30px;
    }

    .bl-layout {
        display: grid;
        grid-template-columns: 1fr 340px;
        gap: 40px;
        align-items: start;
    }

    /* ── Blog Cards ── */
    .bl-card {
        background: var(--white);
        border-radius: 18px;
        overflow: hidden;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        transition: all .35s ease;
        display: flex;
        flex-direction: column;
        margin-bottom: 32px;
        position: relative;
    }

    .bl-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: var(--brand);
        transform: scaleX(0);
        transform-origin: left;
        transition: transform .35s ease;
        z-index: 1;
    }

    .bl-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 50px rgba(0, 0, 0, .12);
        border-color: rgba(199, 32, 39, .15);
    }

    .bl-card:hover::before {
        transform: scaleX(1);
    }

    .bl-card-img {
        height: 260px;
        overflow: hidden;
        position: relative;
    }

    .bl-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .6s ease;
    }

    .bl-card:hover .bl-card-img img {
        transform: scale(1.06);
    }

    .bl-card-body {
        padding: 30px 32px 34px;
    }

    .bl-card-meta {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 16px;
        font-size: 13px;
        color: var(--text-light);
        font-weight: 500;
    }

    .bl-card-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .bl-card-meta svg {
        color: var(--brand);
        flex-shrink: 0;
    }

    .bl-card-body h3 {
        font-size: 22px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 14px;
        line-height: 1.35;
        letter-spacing: -.2px;
        transition: color .3s;
    }

    .bl-card-body h3 a {
        text-decoration: none;
        color: inherit;
    }

    .bl-card-body h3 a:hover {
        color: var(--brand);
    }

    .bl-card-body p {
        font-size: 15px;
        color: var(--text-mid);
        line-height: 1.7;
        margin: 0 0 24px;
    }

    .bl-read-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: linear-gradient(135deg, #6B7280 0%, #9CA3AF 100%);
        color: #fff !important;
        font-weight: 700;
        font-size: 14px;
        padding: 11px 26px;
        border-radius: 50px;
        text-decoration: none !important;
        transition: all .35s ease;
        box-shadow: 0 4px 16px rgba(0, 0, 0, .18);
        letter-spacing: .3px;
        position: relative;
        overflow: hidden;
    }

    .bl-read-btn::before {
        content: '';
        position: absolute;
        top: 0; left: -75%;
        width: 50%; height: 100%;
        background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,.28) 50%, transparent 100%);
        transform: skewX(-20deg);
        transition: left .55s ease;
        pointer-events: none;
    }

    .bl-read-btn:hover::before {
        left: 130%;
    }

    .bl-read-btn:hover {
        background: linear-gradient(135deg, #C72027 0%, #e03037 100%);
        transform: translateY(-2px);
        box-shadow:
            0 8px 24px rgba(199, 32, 39, .5),
            0 0 0 5px rgba(199, 32, 39, .1);
        color: #fff !important;
    }

    .bl-read-btn svg {
        transition: transform .3s ease;
    }

    .bl-read-btn:hover svg {
        transform: translateX(4px);
    }

    /* ── Sidebar ── */
    .bl-sidebar-card {
        background: var(--white);
        border-radius: 18px;
        padding: 28px 26px;
        border: 1.5px solid var(--border);
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        margin-bottom: 28px;
    }

    .bl-sidebar-title {
        font-size: 18px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 0 0 22px;
        padding-bottom: 14px;
        border-bottom: 2px solid var(--bg-light);
        position: relative;
        letter-spacing: -.2px;
    }

    .bl-sidebar-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 40px;
        height: 2px;
        background: var(--brand);
    }

    .bl-recent-item {
        display: flex;
        gap: 14px;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid var(--bg-light);
        text-decoration: none;
        transition: all .3s ease;
    }

    .bl-recent-item:last-child {
        border-bottom: none;
        padding-bottom: 0;
    }

    .bl-recent-item:hover {
        text-decoration: none;
    }

    .bl-recent-item:hover .bl-recent-title {
        color: var(--brand);
    }

    .bl-recent-img {
        width: 70px;
        height: 70px;
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
        border: 1.5px solid var(--border);
    }

    .bl-recent-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform .4s ease;
    }

    .bl-recent-item:hover .bl-recent-img img {
        transform: scale(1.08);
    }

    .bl-recent-info {
        flex: 1;
        min-width: 0;
    }

    .bl-recent-title {
        font-size: 14px;
        font-weight: 700;
        color: var(--text-dark);
        line-height: 1.4;
        transition: color .3s;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .bl-recent-date {
        font-size: 12px;
        color: var(--text-light);
        margin-top: 5px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .bl-recent-date svg {
        color: var(--brand);
    }

    /* ── Empty state ── */
    .bl-empty {
        text-align: center;
        padding: 80px 30px;
        background: var(--white);
        border-radius: 18px;
        border: 1.5px solid var(--border);
    }

    .bl-empty svg {
        color: var(--text-light);
        margin-bottom: 16px;
    }

    .bl-empty p {
        font-size: 17px;
        color: var(--text-mid);
    }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
        .bl-layout {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 640px) {
        .bl-body {
            padding: 50px 0 60px;
        }

        .bl-card-img {
            height: 200px;
        }

        .bl-card-body {
            padding: 22px 22px 26px;
        }

        .bl-card-body h3 {
            font-size: 19px;
        }

        .bl-hero {
            height: 320px;
        }
    }
</style>

<div class="bl-wrap">

    {{-- Hero --}}
    <div class="bl-hero">
        <div class="bl-hero-bg" style="background-image: url('{{ asset('/setting/blog/' . $banner->banner) }}')"></div>
        <div class="bl-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <span class="bl-hero-eyebrow">Insights & Updates</span>
            <h1>Our Blog</h1>
        </div>
    </div>

    {{-- Body --}}
    <div class="bl-body">
        <div class="bl-container">
            <div class="bl-layout">

                {{-- Blog List --}}
                <div class="bl-posts">
                    @forelse ($blogs as $blog)
                    <article class="bl-card" data-aos="fade-up" data-aos-duration="700" data-aos-delay="{{ $loop->index * 80 }}">
                        @if($blog->image1)
                        <div class="bl-card-img">
                            <a href="/blog/details/{{ $blog->id }}">
                                <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="{{ $blog->title }}">
                            </a>
                        </div>
                        @endif
                        <div class="bl-card-body">
                            <div class="bl-card-meta">
                                <span>
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                        <circle cx="12" cy="7" r="4" />
                                    </svg>
                                    Admin
                                </span>
                                <span>
                                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <path d="M16 2v4M8 2v4M3 10h18" />
                                    </svg>
                                    {{ date('j M Y', strtotime($blog->created_at)) }}
                                </span>
                            </div>
                            <h3><a href="/blog/details/{{ $blog->id }}">{{ $blog->title }}</a></h3>
                            @if($blog->details1)
                            <p>{{ Str::limit(strip_tags($blog->details1), 130) }}</p>
                            @endif
                            <a href="/blog/details/{{ $blog->id }}" class="bl-read-btn">
                                Read More
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M5 12h14M12 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    @empty
                    <div class="bl-empty">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z" />
                            <path d="M14 2v6h6M16 13H8M16 17H8M10 9H8" />
                        </svg>
                        <p>No blog posts found.</p>
                    </div>
                    @endforelse
                </div>

                {{-- Sidebar --}}
                <aside>
                    <div class="bl-sidebar-card" data-aos="fade-left" data-aos-duration="700">
                        <div class="bl-sidebar-title">Latest Posts</div>
                        @foreach ($recent as $post)
                        <a href="/blog/details/{{ $post->id }}" class="bl-recent-item">
                            @if($post->image1)
                            <div class="bl-recent-img">
                                <img src="{{ asset('/setting/blog/' . $post->image1) }}" alt="{{ $post->title }}">
                            </div>
                            @endif
                            <div class="bl-recent-info">
                                <div class="bl-recent-title">{{ $post->title }}</div>
                                <div class="bl-recent-date">
                                    <svg width="11" height="11" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                        <rect x="3" y="4" width="18" height="18" rx="2" />
                                        <path d="M16 2v4M8 2v4M3 10h18" />
                                    </svg>
                                    {{ date('j M Y', strtotime($post->created_at)) }}
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </aside>

            </div>
        </div>
    </div>

</div>
@endsection