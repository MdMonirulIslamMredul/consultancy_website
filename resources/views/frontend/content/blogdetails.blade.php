@extends('frontend.layouts.app')
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
        --border:     rgba(0,0,0,.07);
    }

    .bd-wrap * { font-family: 'Inter', sans-serif; box-sizing: border-box; }

    /* ── Hero ── */
    .bd-hero {
        position: relative;
        height: 480px;
        display: flex;
        align-items: flex-end;
        justify-content: center;
        overflow: hidden;
    }
    .bd-hero-bg {
        position: absolute; inset: 0;
        background-size: cover;
        background-position: center;
        transition: transform 8s ease;
    }
    .bd-hero:hover .bd-hero-bg { transform: scale(1.04); }
    .bd-hero::after {
        content: '';
        position: absolute; inset: 0;
        background: linear-gradient(to top, rgba(26,26,46,.9) 0%, rgba(26,26,46,.35) 55%, rgba(0,0,0,.1) 100%);
    }
    .bd-hero-inner {
        position: relative; z-index: 2;
        width: 100%;
        max-width: 860px;
        margin: 0 auto;
        padding: 0 30px 52px;
        color: #fff;
    }
    .bd-hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: var(--brand);
        color: #fff;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        padding: 5px 14px;
        border-radius: 50px;
        margin-bottom: 16px;
    }
    .bd-hero h1 {
        font-size: clamp(28px, 4vw, 50px);
        font-weight: 800;
        margin: 0 0 18px;
        line-height: 1.2;
        letter-spacing: -.5px;
    }
    .bd-hero-meta {
        display: flex;
        align-items: center;
        gap: 22px;
        font-size: 13.5px;
        opacity: .85;
        flex-wrap: wrap;
    }
    .bd-hero-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* ── Content Area ── */
    .bd-body { background: var(--bg-light); padding: 60px 0 90px; }
    .bd-container { max-width: 860px; margin: 0 auto; padding: 0 30px; }

    /* ── Back link ── */
    .bd-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-mid);
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        padding: 9px 20px;
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 50px;
        margin-bottom: 36px;
        transition: all .3s ease;
        box-shadow: 0 2px 10px rgba(0,0,0,.05);
    }
    .bd-back:hover {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
        transform: translateX(-4px);
        text-decoration: none;
        box-shadow: 0 6px 20px rgba(199,32,39,.3);
    }
    .bd-back svg { transition: transform .3s ease; }
    .bd-back:hover svg { transform: translateX(-4px); }

    /* ── Article Card ── */
    .bd-article {
        background: var(--white);
        border-radius: 22px;
        overflow: hidden;
        border: 1.5px solid var(--border);
        box-shadow: 0 8px 36px rgba(0,0,0,.08);
    }

    /* ── Meta Bar ── */
    .bd-meta {
        display: flex;
        align-items: center;
        gap: 22px;
        padding: 22px 40px;
        border-bottom: 1px solid var(--bg-light);
        font-size: 13px;
        color: var(--text-light);
        font-weight: 500;
        flex-wrap: wrap;
    }
    .bd-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .bd-meta svg { color: var(--brand); flex-shrink: 0; }

    /* ── Images ── */
    .bd-image {
        overflow: hidden;
        position: relative;
    }
    .bd-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform .6s ease;
    }
    .bd-image:hover img { transform: scale(1.02); }

    /* ── Content ── */
    .bd-content {
        padding: 40px 40px 48px;
        font-size: 17px;
        line-height: 1.8;
        color: var(--text-mid);
    }
    .bd-content h2 {
        font-size: 28px;
        font-weight: 800;
        color: var(--text-dark);
        margin: 36px 0 16px;
        letter-spacing: -.3px;
        line-height: 1.3;
    }
    .bd-content h3 {
        font-size: 22px;
        font-weight: 700;
        color: var(--text-dark);
        margin: 30px 0 14px;
        letter-spacing: -.2px;
    }
    .bd-content p { margin-bottom: 20px; }
    .bd-content p:last-child { margin-bottom: 0; }
    .bd-content ul, .bd-content ol {
        margin: 20px 0;
        padding-left: 26px;
    }
    .bd-content li { margin-bottom: 10px; }
    .bd-content a { color: var(--brand); text-decoration: underline; transition: .3s; }
    .bd-content a:hover { color: var(--brand-dark); }
    .bd-content blockquote {
        border-left: 4px solid var(--brand);
        background: var(--brand-light);
        margin: 28px 0;
        padding: 18px 24px;
        border-radius: 0 12px 12px 0;
        font-style: italic;
        color: var(--text-dark);
    }
    .bd-content img {
        max-width: 100%;
        border-radius: 12px;
        margin: 20px 0;
    }

    /* ── Divider ── */
    .bd-divider {
        height: 1px;
        background: var(--bg-light);
        margin: 0 40px;
    }

    /* ── Footer Actions ── */
    .bd-footer {
        padding: 28px 40px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 16px;
    }
    .bd-footer-back {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: var(--text-mid);
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        padding: 10px 22px;
        background: var(--bg-light);
        border: 1.5px solid var(--border);
        border-radius: 50px;
        transition: all .3s ease;
    }
    .bd-footer-back:hover {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
        text-decoration: none;
    }
    .bd-share-label {
        font-size: 13px;
        color: var(--text-light);
        font-weight: 600;
        letter-spacing: .4px;
        text-transform: uppercase;
    }

    /* ── Responsive ── */
    @media (max-width: 768px) {
        .bd-hero { height: 380px; }
        .bd-meta, .bd-content, .bd-footer { padding-left: 24px; padding-right: 24px; }
        .bd-divider { margin: 0 24px; }
        .bd-content { font-size: 16px; }
        .bd-content h2 { font-size: 24px; }
    }
    @media (max-width: 480px) {
        .bd-hero { height: 300px; }
        .bd-hero-inner { padding-bottom: 36px; }
        .bd-content { padding: 28px 20px 36px; }
        .bd-meta { padding: 16px 20px; }
        .bd-footer { padding: 20px; }
    }
</style>

<div class="bd-wrap">

    {{-- ── Hero ── --}}
    <div class="bd-hero">
        <div class="bd-hero-bg" style="background-image: url('{{ asset('/setting/blog/' . $blog->banner) }}')"></div>
        <div class="bd-hero-inner" data-aos="fade-up" data-aos-duration="800">
            <span class="bd-hero-tag">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8z"/><polyline points="14 2 14 8 20 8"/></svg>
                Blog
            </span>
            <h1>{{ $blog->title }}</h1>
            <div class="bd-hero-meta">
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                    Admin
                </span>
                <span>
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                    {{ date('j F, Y', strtotime($blog->created_at)) }}
                </span>
            </div>
        </div>
    </div>

    {{-- ── Body ── --}}
    <div class="bd-body">
        <div class="bd-container">

            <a href="/blogs" class="bd-back" data-aos="fade-right" data-aos-duration="600">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                Back to Blogs
            </a>

            <div class="bd-article" data-aos="fade-up" data-aos-duration="800">

                <div class="bd-meta">
                    <span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Admin
                    </span>
                    <span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
                        {{ date('j F, Y', strtotime($blog->created_at)) }}
                    </span>
                </div>

                @if(!empty($blog->image1))
                    <div class="bd-image">
                        <img src="{{ asset('/setting/blog/' . $blog->image1) }}" alt="{{ $blog->title }}">
                    </div>
                @endif

                @if(!empty($blog->details1))
                    <div class="bd-content">
                        {!! $blog->details1 !!}
                    </div>
                @endif

                @if(!empty($blog->image2))
                    <div class="bd-divider"></div>
                    <div class="bd-image">
                        <img src="{{ asset('/setting/blog/' . $blog->image2) }}" alt="{{ $blog->title }}">
                    </div>
                @endif

                @if(!empty($blog->details2))
                    <div class="bd-content" style="padding-top: 0;">
                        {!! $blog->details2 !!}
                    </div>
                @endif

                <div class="bd-divider"></div>
                <div class="bd-footer">
                    <a href="/blogs" class="bd-footer-back">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M19 12H5M12 5l-7 7 7 7"/></svg>
                        All Blogs
                    </a>
                    <span class="bd-share-label">Imperial Education & Career</span>
                </div>

            </div>
        </div>
    </div>

</div>
@endsection
