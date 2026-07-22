<style>
    /* ═══════════════════════════════════════════
   MODERN ADMIN SIDEBAR
═══════════════════════════════════════════ */

    body.hold-transition.admin-modern-layout {
        background: #f8fafc !important;
    }

    /* ── Sidebar Base ── */
    /* Override any AdminLTE margin-left or transforms with !important */
    .main-sidebar,
    .main-sidebar::before,
    .main-sidebar.sidebar-light-cyan {
        position: fixed !important;
        top: 65px !important;
        left: 0 !important;
        margin-left: 0 !important;
        transform: none !important;
        width: 260px !important;
        height: calc(100vh - 65px) !important;
        background: #0f172a !important;
        /* Elegant slate-900 */
        border-right: none !important;
        box-shadow: 1px 0 10px rgba(0, 0, 0, 0.05) !important;
        overflow-y: auto !important;
        overflow-x: hidden !important;
        z-index: 1040 !important;
        padding-bottom: 2rem;
        transition: left 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* Scrollbar styling */
    .main-sidebar::-webkit-scrollbar {
        width: 4px;
    }

    .main-sidebar::-webkit-scrollbar-track {
        background: transparent;
    }

    .main-sidebar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.15);
        border-radius: 4px;
    }

    /* Hide AdminLTE brand link (we use our own in topbar or sidebar) */
    .main-sidebar .brand-link {
        display: none !important;
    }

    /* ── Content Wrapper ── */
    .content-wrapper {
        margin-left: 260px !important;
        margin-top: 0 !important;
        padding-top: 65px !important;
        /* Space for fixed header */
        min-height: 100vh !important;
        background: #f8fafc !important;
        transition: margin-left 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
    }

    /* ── Backdrop for Mobile ── */
    #admBackdrop {
        display: none;
        position: fixed;
        inset: 65px 0 0 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(2px);
        z-index: 1039;
        cursor: pointer;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    /* ══ MOBILE BEHAVIOR ══ */
    @media (max-width: 991px) {

        /* Hide sidebar by sliding it left */
        .main-sidebar,
        .main-sidebar::before {
            left: -270px !important;
        }

        /* When open, slide it back in */
        .main-sidebar.adm-open,
        .main-sidebar.adm-open::before {
            left: 0 !important;
            box-shadow: 4px 0 25px rgba(0, 0, 0, 0.3) !important;
        }

        /* Content is full width */
        .content-wrapper {
            margin-left: 0 !important;
        }
    }

    /* ── Sidebar Content Styling ── */
    .adm-sb-logo {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1.2rem 1.25rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        margin-bottom: 0.5rem;
    }

    .adm-sb-logo-title {
        font-size: 0.9rem;
        font-weight: 700;
        color: #f8fafc;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .adm-sb-logo-sub {
        font-size: 0.7rem;
        color: #94a3b8;
        margin-top: 2px;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .adm-sb-section {
        padding: 1rem 1.25rem 0.5rem;
        margin: 0;
        font-size: 0.65rem;
        font-weight: 800;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        color: #64748b;
        user-select: none;
    }

    .adm-sb-nav {
        list-style: none;
        margin: 0;
        padding: 0 0.75rem;
    }

    .adm-sb-nav-item {
        margin-bottom: 2px;
    }

    .adm-sb-link {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 0.6rem 0.85rem;
        border-radius: 8px;
        color: #cbd5e1 !important;
        font-size: 0.85rem;
        font-weight: 500;
        text-decoration: none !important;
        transition: all 0.2s;
        cursor: pointer;
    }

    .adm-sb-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #ffffff !important;
    }

    .adm-sb-link.is-active {
        background: #2563eb !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(37, 99, 235, 0.25);
    }

    .adm-sb-link-ico {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
        opacity: 0.7;
        transition: opacity 0.2s;
    }

    .adm-sb-link:hover .adm-sb-link-ico,
    .adm-sb-link.is-active .adm-sb-link-ico {
        opacity: 1;
    }

    .adm-sb-link-text {
        flex: 1;
        min-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .adm-sb-chevron {
        width: 14px;
        height: 14px;
        color: #64748b;
        flex-shrink: 0;
        transition: transform 0.2s;
    }

    .adm-sb-link[aria-expanded="true"] .adm-sb-chevron {
        transform: rotate(90deg);
        color: #cbd5e1;
    }

    .adm-sb-submenu {
        list-style: none;
        margin: 4px 0 4px 1.2rem;
        padding: 0 0 0 0.8rem;
        border-left: 1px solid rgba(255, 255, 255, 0.1);
    }

    .adm-sb-sub-link {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.45rem 0.75rem;
        border-radius: 6px;
        color: #94a3b8 !important;
        font-size: 0.8rem;
        font-weight: 500;
        text-decoration: none !important;
        transition: all 0.15s;
    }

    .adm-sb-sub-link::before {
        content: '';
        width: 4px;
        height: 4px;
        border-radius: 50%;
        background: #64748b;
        flex-shrink: 0;
        transition: background 0.15s;
    }

    .adm-sb-sub-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #f8fafc !important;
    }

    .adm-sb-sub-link:hover::before {
        background: #3b82f6;
    }

    .adm-sb-sub-link.is-active-sub {
        color: #3b82f6 !important;
        font-weight: 600;
    }

    .adm-sb-sub-link.is-active-sub::before {
        background: #3b82f6;
        transform: scale(1.5);
    }

    .adm-sb-divider {
        margin: 0.75rem 1.25rem;
        border: none;
        border-top: 1px solid rgba(255, 255, 255, 0.05);
    }
</style>

<!-- Backdrop -->
<div id="admBackdrop" onclick="window.admClose && window.admClose()"></div>

<!-- ═══ SIDEBAR ═══ -->
<aside class="main-sidebar" id="admSidebar">
    <!-- Hide AdminLTE default brand -->
    <a class="brand-link" href="#"></a>

    <div class="sidebar" style="padding-top:0">

        <!-- Sidebar Header -->
        <div class="adm-sb-logo">
            <div>
                <div class="adm-sb-logo-title">{{ app_name() }}</div>
                <div class="adm-sb-logo-sub">Admin Panel</div>
            </div>
        </div>

        <!-- MAIN -->
        <p class="adm-sb-section">Main</p>
        <ul class="adm-sb-nav">
            <li class="adm-sb-nav-item">
                <a href="{{ route('admin.dashboard') }}"
                    class="adm-sb-link {{ activeClass(Route::is('admin.dashboard'), 'is-active') }}">
                    <svg class="adm-sb-link-ico" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                    </svg>
                    <span class="adm-sb-link-text">Dashboard</span>
                </a>
            </li>
            <li class="adm-sb-nav-item">
                <a href="{{ route('admin.appointment.search') }}"
                    class="adm-sb-link {{ activeClass(Route::is('admin.appointment.*'), 'is-active') }}">
                    <svg class="adm-sb-link-ico" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                    </svg>
                    <span class="adm-sb-link-text">Appointments</span>
                </a>
            </li>
        </ul>

        @if (
        $logged_in_user->hasAllAccess() ||
        ($logged_in_user->can('admin.access.user.list') ||
        $logged_in_user->can('admin.access.user.deactivate') ||
        $logged_in_user->can('admin.access.user.reactivate') ||
        $logged_in_user->can('admin.access.user.clear-session') ||
        $logged_in_user->can('admin.access.user.impersonate') ||
        $logged_in_user->can('admin.access.user.change-password')))

        @if ($logged_in_user->hasAllAccess() || $logged_in_user->can('admin.setting'))
        <hr class="adm-sb-divider">
        <p class="adm-sb-section">Settings</p>
        <ul class="adm-sb-nav">
            @php
            $settingsOpen = Route::is('admin.setting.*') || Route::is('admin.about.*') || Route::is('admin.area') || Route::is('admin.mission');
            @endphp
            <li class="adm-sb-nav-item">
                <a href="#sbSettings" data-toggle="collapse"
                    aria-expanded="{{ $settingsOpen ? 'true' : 'false' }}"
                    class="adm-sb-link {{ $settingsOpen ? 'is-active' : '' }}">
                    <svg class="adm-sb-link-ico" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a6.759 6.759 0 010 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.992l-1.004-.827a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="adm-sb-link-text">Site Settings</span>
                    <svg class="adm-sb-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <ul class="adm-sb-submenu collapse {{ $settingsOpen ? 'show' : '' }}" id="sbSettings">
                    @foreach([
                    ['admin.setting.general', 'General Settings'],
                    ['admin.about.settings', 'About Settings'],
                    ['admin.about.committee', 'Member Settings'],
                    ['admin.setting.slider', 'Slider Settings'],
                    ['admin.setting.service', 'Service Settings'],
                    // ['admin.setting.project', 'Project Settings'],
                    // ['admin.area', 'Add Service Area'],
                    //add destination settings
                    ['admin.setting.project', 'Destination Settings'],
                    ['admin.university.index', 'University'],
                    ['admin.setting.testmony', 'Testimony Settings'],
                    ['admin.setting.blog', 'Blog Settings'],
                    ['admin.setting.faq', 'FAQ Settings'],
                    ['admin.mission', 'Mission Settings'],
                    ['admin.setting.gallery', 'Gallery Settings'],
                    //['admin.setting.brand', 'Partnership Mgmt'],
                    ] as [$r, $l])
                    <li>
                        <a href="{{ route($r) }}" class="adm-sb-sub-link {{ activeClass(Route::is($r), 'is-active-sub') }}">{{ $l }}</a>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
        @endif
        @endif

        @if ($logged_in_user->hasAllAccess())
        <hr class="adm-sb-divider">
        <p class="adm-sb-section">System</p>
        <ul class="adm-sb-nav">
            @php $logsOpen = Route::is('log-viewer::*'); @endphp
            <li class="adm-sb-nav-item">
                <a href="#sbLogs" data-toggle="collapse"
                    aria-expanded="{{ $logsOpen ? 'true' : 'false' }}"
                    class="adm-sb-link {{ $logsOpen ? 'is-active' : '' }}">
                    <svg class="adm-sb-link-ico" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                    </svg>
                    <span class="adm-sb-link-text">Logs</span>
                    <svg class="adm-sb-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </a>
                <ul class="adm-sb-submenu collapse {{ $logsOpen ? 'show' : '' }}" id="sbLogs">
                    <li><a href="{{ route('log-viewer::dashboard') }}" class="adm-sb-sub-link {{ activeClass(Route::is('log-viewer::dashboard'), 'is-active-sub') }}">Log Dashboard</a></li>
                    <li><a href="{{ route('log-viewer::logs.list') }}" class="adm-sb-sub-link {{ activeClass(Route::is('log-viewer::logs.list'), 'is-active-sub') }}">Logs List</a></li>
                </ul>
            </li>
        </ul>
        @endif

    </div>
</aside>

<script>
    /* Global Toggle Script */
    (function() {
        var sidebar = document.getElementById('admSidebar');
        var backdrop = document.getElementById('admBackdrop');
        var hamBtn = document.getElementById('admHamburger');

        function open() {
            if (!sidebar) return;
            sidebar.classList.add('adm-open');
            if (hamBtn) hamBtn.classList.add('is-open');
            if (backdrop) {
                backdrop.style.display = 'block';
                // Trigger reflow to ensure transition runs
                void backdrop.offsetWidth;
                backdrop.style.opacity = '1';
            }
            document.body.style.overflow = 'hidden';
        }

        function close() {
            if (!sidebar) return;
            sidebar.classList.remove('adm-open');
            if (hamBtn) hamBtn.classList.remove('is-open');
            if (backdrop) {
                backdrop.style.opacity = '0';
                setTimeout(function() {
                    backdrop.style.display = 'none';
                }, 300);
            }
            document.body.style.overflow = '';
        }

        window.admToggle = function() {
            if (sidebar && sidebar.classList.contains('adm-open')) {
                close();
            } else {
                open();
            }
        };

        window.admClose = close;

        /* Close on resize to desktop */
        window.addEventListener('resize', function() {
            if (window.innerWidth > 991) close();
        });
    })();
</script>