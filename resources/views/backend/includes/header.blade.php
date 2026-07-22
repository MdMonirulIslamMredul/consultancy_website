<style>
/* ═══════════════════════════════════════════
   MODERN ADMIN TOPBAR
═══════════════════════════════════════════ */

/* Reset AdminLTE header */
nav.main-header.navbar { display: none !important; }

/* Base Topbar */
.adm-topbar {
    position: fixed; top: 0; left: 0; right: 0;
    height: 65px; background: #ffffff;
    z-index: 1049; border-bottom: 1px solid #e2e8f0;
    display: flex; align-items: center; padding: 0 1.25rem;
    box-shadow: 0 4px 20px -5px rgba(0,0,0,0.03);
}

/* ── Hamburger (Mobile Only) ── */
.adm-hamburger {
    display: none;
    background: transparent; border: none; padding: 8px;
    cursor: pointer; margin-right: 12px; border-radius: 8px;
    transition: background 0.2s;
}
.adm-hamburger:hover { background: #f1f5f9; }
.adm-hamburger .hb-line {
    display: block; width: 22px; height: 2px;
    background: #334155; border-radius: 2px; margin: 5px 0;
    transition: transform 0.3s, opacity 0.3s;
}
.adm-hamburger.is-open .hb-line1 { transform: translateY(7px) rotate(45deg); }
.adm-hamburger.is-open .hb-line2 { opacity: 0; }
.adm-hamburger.is-open .hb-line3 { transform: translateY(-7px) rotate(-45deg); }

/* ── Brand / Logo ── */
.adm-topbar-brand {
    display: flex; align-items: center;
    width: 240px; /* Aligns with sidebar */
    height: 100%; flex-shrink: 0; text-decoration: none !important;
}
.adm-topbar-brand img {
    max-width: 150px; height: 42px; object-fit: contain;
}

/* Spacer */
.adm-topbar-spacer { flex: 1; }

/* ── Right Actions ── */
.adm-topbar-right {
    display: flex; align-items: center; gap: 1rem;
}

/* View Site Button */
.adm-btn-site {
    display: flex; align-items: center; gap: 0.4rem;
    padding: 0.45rem 1rem; border-radius: 8px;
    background: #eff6ff; color: #2563eb !important;
    font-size: 0.8rem; font-weight: 600; text-decoration: none !important;
    transition: all 0.2s; border: 1px solid #bfdbfe;
}
.adm-btn-site:hover { background: #2563eb; color: #ffffff !important; border-color: #2563eb; }
.adm-btn-site svg { width: 14px; height: 14px; }

/* User Button */
.adm-user-btn {
    display: flex; align-items: center; gap: 0.5rem;
    padding: 0.25rem 0.75rem 0.25rem 0.25rem;
    border-radius: 50px; background: #f8fafc;
    border: 1px solid #e2e8f0; cursor: pointer;
    transition: all 0.2s; color: #334155; text-decoration: none !important;
}
.adm-user-btn:hover { background: #f1f5f9; border-color: #cbd5e1; }
.adm-user-avatar {
    width: 32px; height: 32px; border-radius: 50%;
    object-fit: cover; border: 2px solid #ffffff;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}
.adm-user-name {
    font-size: 0.82rem; font-weight: 600; max-width: 100px;
    white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
}
.adm-user-chevron {
    width: 14px; height: 14px; color: #64748b; transition: transform 0.2s;
}
.adm-user-btn[aria-expanded="true"] .adm-user-chevron { transform: rotate(180deg); }

/* Dropdown */
.adm-user-dropdown {
    min-width: 220px; border: 1px solid #e2e8f0; border-radius: 12px;
    box-shadow: 0 10px 25px -5px rgba(0,0,0,0.1);
    padding: 0.5rem; margin-top: 0.5rem !important;
}
.adm-user-dropdown .du-head {
    padding: 0.5rem 0.5rem 0.75rem; border-bottom: 1px solid #f1f5f9; margin-bottom: 0.25rem;
}
.adm-user-dropdown .du-name { font-size: 0.85rem; font-weight: 700; color: #0f172a; }
.adm-user-dropdown .du-role { font-size: 0.75rem; color: #64748b; margin-top: 2px; }
.adm-user-dropdown .dropdown-item {
    display: flex; align-items: center; gap: 0.6rem;
    padding: 0.5rem 0.75rem; border-radius: 6px;
    font-size: 0.82rem; font-weight: 500; color: #475569;
    transition: all 0.15s;
}
.adm-user-dropdown .dropdown-item:hover { background: #f1f5f9; color: #0f172a; }
.adm-user-dropdown .dropdown-item svg { width: 16px; height: 16px; opacity: 0.7; }
.adm-user-dropdown .du-logout:hover { background: #fef2f2; color: #ef4444; }
.adm-user-dropdown .du-logout:hover svg { color: #ef4444; }

/* ══ MOBILE ══ */
@media (max-width: 991px) {
    .adm-topbar { padding: 0 0.75rem; }
    .adm-hamburger { display: block; }
    .adm-topbar-brand { width: auto; margin-right: auto; }
    .adm-btn-site span { display: none; }
    .adm-btn-site { padding: 0.45rem; border-radius: 50%; }
    .adm-user-name { display: none; }
    .adm-user-btn { padding: 0.25rem; }
}
</style>

<header class="adm-topbar" id="admTopbar">
    <!-- Hamburger -->
    <button class="adm-hamburger" id="admHamburger" type="button" onclick="window.admToggle && window.admToggle()">
        <span class="hb-line hb-line1"></span>
        <span class="hb-line hb-line2"></span>
        <span class="hb-line hb-line3"></span>
    </button>

    <!-- Brand -->
    <a class="adm-topbar-brand" href="{{ route('frontend.index') }}" target="_blank">
        <img src="{{ asset(get_setting('admin_logo')) }}" alt="Logo">
    </a>

    <!-- Spacer -->
    <div class="adm-topbar-spacer"></div>

    <!-- Right Actions -->
    <div class="adm-topbar-right">
        <!-- View Site -->
        <a href="{{ route('frontend.index') }}" class="adm-btn-site" target="_blank" title="View Site">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
            </svg>
            <span>View Site</span>
        </a>

        <!-- User Dropdown -->
        <div class="dropdown">
            <a href="#" class="adm-user-btn" id="admUserDrop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ $logged_in_user->avatar }}" alt="avatar" class="adm-user-avatar">
                <span class="adm-user-name">{{ $logged_in_user->name }}</span>
                <svg class="adm-user-chevron" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                </svg>
            </a>

            <div class="dropdown-menu adm-user-dropdown dropdown-menu-right" aria-labelledby="admUserDrop">
                <div class="du-head">
                    <div class="du-name">{{ $logged_in_user->name }}</div>
                    <div class="du-role">{{ $logged_in_user->isAdmin() ? 'Administrator' : 'User' }}</div>
                </div>

                @if ($logged_in_user->isAdmin())
                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" /></svg>
                    Administration
                </a>
                @endif
                @if ($logged_in_user->isUser())
                <a class="dropdown-item" href="{{ route('frontend.user.dashboard') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6z" /></svg>
                    Dashboard
                </a>
                @endif
                <a class="dropdown-item" href="{{ route('frontend.user.account') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" /></svg>
                    My Account
                </a>
                <div class="dropdown-divider" style="border-color: #f1f5f9; margin: 0.5rem 0;"></div>
                <a class="dropdown-item du-logout" href="#" onclick="event.preventDefault();document.getElementById('hdr-logout-form').submit();">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" /></svg>
                    Logout
                </a>
                <x-forms.post :action="route('frontend.auth.logout')" id="hdr-logout-form" class="d-none" />
            </div>
        </div>
    </div>
</header>
