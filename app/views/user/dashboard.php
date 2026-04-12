<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MIS — User Dashboard</title>
  <link rel="stylesheet" href="../css/user-shared.css" />
  <style>
    /* ── Locked Dropdown State ── */
    .nav-dropdown-wrap.locked .nav-dropdown-trigger {
      opacity: 0.6;
      cursor: not-allowed;
    }

    .nav-dropdown-wrap.locked .nav-dropdown-trigger:hover {
      background: rgba(139, 46, 46, 0.06);
    }

    .nav-dropdown-wrap.locked .nav-dropdown-arrow {
      display: none;
    }

    .nav-lock-icon {
      width: 14px;
      height: 14px;
      fill: var(--warning);
      margin-left: auto;
      flex-shrink: 0;
      display: none;
    }

    .nav-dropdown-wrap.locked .nav-lock-icon {
      display: block;
    }

    .nav-dropdown-wrap.locked .nav-dropdown {
      display: none !important;
    }

    .nav-lock-badge {
      display: none;
      font-size: 0.6rem;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.04em;
      color: var(--warning);
      background: rgba(199, 154, 43, 0.1);
      padding: 2px 8px;
      border-radius: 10px;
      margin-left: 6px;
      white-space: nowrap;
    }

    .nav-dropdown-wrap.locked .nav-lock-badge {
      display: inline-flex;
    }

    .sidebar.collapsed .nav-lock-badge {
      display: none !important;
    }

    .sidebar.collapsed .nav-lock-icon {
      display: none !important;
    }
  </style>
</head>

<body>
  <div class="app-wrapper">

    <!-- ═══ SIDEBAR ═══ -->
    <aside class="sidebar" id="sidebar">
      <button class="sidebar-toggle" id="sidebar-toggle" title="Toggle sidebar">
        <svg viewBox="0 0 24 24">
          <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
        </svg>
      </button>
      <div class="sidebar-header">
        <div class="sidebar-brand">
          <img src="../../logo.jpg" style="max-width:48px;max-height:48px;border-radius:8px;" alt="ISCAG" />
          <div class="brand-text"><strong>ISCAG MIS</strong><span>User Portal</span></div>
        </div>
      </div>
      <div class="sidebar-user">
        <div class="user-avatar" id="nav-avatar" style="background:var(--accent);">MU</div>
        <div class="user-info"><strong id="nav-name">Muhammad Usman</strong><span id="nav-role">Not Verified</span>
        </div>
      </div>
      <nav class="sidebar-nav">
        <div class="nav-section-label">Menu</div>
        <a href="dashboard.html" class="nav-item active" data-tooltip="Dashboard">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          <span class="nav-item-label">My Dashboard</span>
        </a>
        <a href="tenant_account.html" class="nav-item" data-tooltip="Profile">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
          </svg>
          <span class="nav-item-label">My Profile</span>
        </a>
        <a href="tenant_notification.html" class="nav-item" data-tooltip="Notifications">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
          </svg>
          <span class="nav-item-label">Notifications</span>
        </a>
        <div class="nav-section-label">Services</div>

        <!-- DAMAYAN DROPDOWN -->
        <div class="nav-dropdown-wrap" id="damayan-wrap">
          <button class="nav-dropdown-trigger" id="damayan-trigger" data-tooltip="Damayan"
            data-href="Damayan/user_burial-form.html">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
            </svg>
            <span class="nav-item-label">Damayan</span>
            <span class="nav-lock-badge">Locked</span>
            <svg class="nav-lock-icon" viewBox="0 0 24 24">
              <path
                d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2z" />
            </svg>
            <svg class="nav-dropdown-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </button>
          <div class="nav-dropdown" id="damayan-menu">
            <a href="Damayan/user_burial-form.html">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
              </svg>
              Burial Service
            </a>
          </div>
        </div>

        <!-- DA'WAH DROPDOWN -->
        <div class="nav-dropdown-wrap" id="dawah-wrap">
          <button class="nav-dropdown-trigger" id="dawah-trigger" data-tooltip="Da'wah">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
            </svg>
            <span class="nav-item-label">Da'wah</span>
            <span class="nav-lock-badge">Locked</span>
            <svg class="nav-lock-icon" viewBox="0 0 24 24">
              <path
                d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2z" />
            </svg>
            <svg class="nav-dropdown-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </button>
          <div class="nav-dropdown" id="dawah-menu">
            <!-- populated by JS based on gender -->
          </div>
        </div>

        <!-- APARTMENT DROPDOWN -->
        <div class="nav-dropdown-wrap" id="apartment-wrap">
          <button class="nav-dropdown-trigger" id="apartment-trigger" data-tooltip="Apartment">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
            </svg>
            <span class="nav-item-label">Apartment</span>
            <span class="nav-lock-badge">Locked</span>
            <svg class="nav-lock-icon" viewBox="0 0 24 24">
              <path
                d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2z" />
            </svg>
            <svg class="nav-dropdown-arrow" viewBox="0 0 24 24">
              <path d="M7 10l5 5 5-5z" />
            </svg>
          </button>
          <div class="nav-dropdown open" id="apartment-menu">
            <a href="Apartment/tenant_add_information_form.html">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 7V3.5L18.5 9H13z" />
              </svg>
              Application Form
            </a>
            <a href="Apartment/tenant_status.html">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path
                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
              </svg>
              Application Status
            </a>
            <a href="Apartment/apartment_information.html">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M14 17H4v2h10v-2zm6-8H4v2h16V9zM4 15h16v-2H4v2zM4 5v2h16V5H4z" />
              </svg>
              Apartment Information
            </a>
          </div>
        </div>
      </nav>
      <div class="sidebar-footer">
        <a href="../../homepage/login.html" class="nav-item" data-tooltip="Logout">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
          </svg>
          <span class="nav-item-label">Logout</span>
        </a>
      </div>
    </aside>

    <!-- ═══ MAIN CONTENT ═══ -->
    <div class="main-content">
      <div class="top-bar">
        <div>
          <div class="top-bar-title">User Dashboard</div>
          <div class="top-bar-subtitle">Submit service requests and track your applications</div>
        </div>
        <div class="top-bar-actions">
          <span id="top-date" style="font-size:0.8rem;color:var(--text-muted);"></span>
        </div>
      </div>

      <div class="page-body">

        <!-- WELCOME BANNER -->
        <div class="welcome-banner">
          <h3 id="welcome-heading">Assalamu Alaikum!</h3>
          <p>Welcome to the Masjid Management Information System. Select a service below to submit a request.</p>

          <!-- Profile completion widget -->
          <div class="profile-widget" id="profile-widget">
            <div class="profile-ring">
              <svg viewBox="0 0 36 36">
                <circle class="ring-bg" cx="18" cy="18" r="15.9" />
                <circle class="ring-fill" cx="18" cy="18" r="15.9" id="ring-fill" stroke="white"
                  stroke-dasharray="0 100" />
              </svg>
              <span class="ring-pct" id="ring-pct">0%</span>
            </div>
            <div class="profile-widget-info">
              <div class="pw-title">Profile Completion Status</div>
              <p class="pw-sub" id="pw-sub">Complete all required fields to gain full system access.</p>
            </div>
            <a href="tenant_account.html" class="btn-complete-profile" id="btn-complete-profile">Complete Profile</a>
          </div>
        </div>

        <!-- SERVICE CARDS -->
        <h6
          style="font-family:'Lora',serif;font-size:0.9rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:16px;">
          Available Services</h6>

        <div class="service-grid" id="service-grid">
          <!-- Populated by JS -->
        </div>

        <!-- MY REQUESTS HISTORY -->
        <div class="section-card">
          <div class="section-card-header">
            <h6>
              <svg viewBox="0 0 24 24">
                <path
                  d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
              </svg>
              My Recent Requests
            </h6>
            <span style="font-size:0.75rem;color:var(--text-muted);" id="req-count">Your submission history</span>
          </div>
          <div class="section-card-body" style="padding:0;">
            <div class="table-wrapper">
              <table class="mis-table">
                <thead>
                  <tr>
                    <th>Reference No.</th>
                    <th>Service Type</th>
                    <th>Date Submitted</th>
                    <th>Status</th>
                    <th>Last Updated</th>
                  </tr>
                </thead>
                <tbody id="req-tbody"></tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script>
    // ── Inlined data helpers (no module imports — works from file://) ──
    const STORAGE_KEYS = { user: 'mis_user', requests: 'mis_requests', apartments: 'mis_apartments', initialized: 'mis_data_init' };
    const PROFILE_FIELDS = ['name', 'email', 'gender', 'phone', 'address', 'dob', 'civil', 'occupation', 'arabicName', 'membership'];
    const FIELD_LABELS = { name: 'Full Name', email: 'Email Address', gender: 'Gender', phone: 'Contact Number', address: 'Complete Address', dob: 'Date of Birth', civil: 'Civil Status', occupation: 'Occupation', arabicName: 'Muslim / Arabic Name', membership: 'Masjid Membership' };
    const DEFAULT_USER = { id: 'USR-001', name: 'Muhammad Usman', email: 'musman@example.com', gender: '', phone: '', address: '', dob: '', civil: '', occupation: '', arabicName: '', membership: '', revertYear: '', apartment: '', profileComplete: false };
    const DEFAULT_REQUESTS = [
      { id: 'BUR-001', user: 'USR-001', type: 'burial_service', status: 'pending', date: '2026-03-15', updatedAt: '2026-03-15' },
      { id: 'APT-001', user: 'USR-001', type: 'apartment_application', status: 'approved', date: '2026-03-09', updatedAt: '2026-03-12' }
    ];
    const DEFAULT_APARTMENTS = [
      { id: 'APT-A1', name: 'Unit A-1 · Studio', price: 3500, available: 2, status: 'available' },
      { id: 'APT-A2', name: 'Unit A-2 · 1-Bedroom', price: 5000, available: 1, status: 'available' },
      { id: 'APT-B1', name: 'Unit B-1 · 2-Bedroom', price: 7500, available: 0, status: 'occupied' },
      { id: 'APT-B2', name: 'Unit B-2 · 2-Bedroom', price: 7500, available: 1, status: 'available' },
      { id: 'APT-C1', name: 'Unit C-1 · Family Suite', price: 10000, available: 0, status: 'reserved' }
    ];

    function initData() {
      if (!localStorage.getItem(STORAGE_KEYS.initialized)) {
        localStorage.setItem(STORAGE_KEYS.user, JSON.stringify(DEFAULT_USER));
        localStorage.setItem(STORAGE_KEYS.apartments, JSON.stringify(DEFAULT_APARTMENTS));
        localStorage.setItem(STORAGE_KEYS.requests, JSON.stringify(DEFAULT_REQUESTS));
        localStorage.setItem(STORAGE_KEYS.initialized, '1');
      }
    }
    function getUser() {
      const raw = localStorage.getItem(STORAGE_KEYS.user);
      return raw ? JSON.parse(raw) : { ...DEFAULT_USER };
    }
    function getRequests() {
      const raw = localStorage.getItem(STORAGE_KEYS.requests);
      return raw ? JSON.parse(raw) : [];
    }
    function getProfileCompletion() {
      const user = getUser();
      const missing = [];
      let filled = 0;
      PROFILE_FIELDS.forEach(k => {
        if (user[k] && String(user[k]).trim() !== '') { filled++; } else { missing.push(FIELD_LABELS[k] || k); }
      });
      return { percentage: Math.round((filled / PROFILE_FIELDS.length) * 100), filled, total: PROFILE_FIELDS.length, missingFields: missing };
    }

    function showToast(msg, bg) {
      const toast = document.createElement('div');
      toast.textContent = msg;
      toast.style.cssText = 'position:fixed;top:24px;right:24px;background:' + bg + ';color:white;padding:14px 22px;border-radius:10px;z-index:99999;font-weight:600;font-family:Source Sans 3,sans-serif;font-size:0.9rem;box-shadow:0 4px 16px rgba(0,0,0,0.18);max-width:400px;';
      document.body.appendChild(toast);
      setTimeout(() => { toast.style.opacity = '0'; toast.style.transition = 'opacity 0.3s ease'; setTimeout(() => toast.remove(), 300); }, 3000);
    }

    function showAccessModal(config) {
      const existing = document.getElementById('access-control-modal');
      if (existing) existing.remove();

      const { percentage = 0, missingFields = [], redirectUrl = 'tenant_account.html' } = config;

      if (!document.getElementById('acm-keyframes')) {
        const styleEl = document.createElement('style');
        styleEl.id = 'acm-keyframes';
        styleEl.textContent = `
        @keyframes acmFadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes acmSlideUp { from { opacity:0;transform:translateY(24px) scale(0.96); } to { opacity:1;transform:translateY(0) scale(1); } }
      `;
        document.head.appendChild(styleEl);
      }

      const missingHtml = missingFields.length > 0
        ? `<div style="margin-top:16px;text-align:left;">
           <p style="font-size:0.78rem;color:#6f7f78;margin:0 0 8px;font-weight:600;">Required information:</p>
           <ul style="margin:0;padding:0 0 0 18px;font-size:0.8rem;color:#1f2e2a;line-height:1.8;">
             ${missingFields.map(f => '<li>' + f + '</li>').join('')}
           </ul>
         </div>` : '';

      const modalHtml = `
      <div id="access-control-modal" style="
        position:fixed;inset:0;z-index:99999;
        display:flex;align-items:center;justify-content:center;
        background:rgba(15,30,22,0.55);backdrop-filter:blur(6px);
        padding:24px;animation:acmFadeIn 0.3s ease;
      ">
        <div style="
          background:white;border-radius:16px;
          width:100%;max-width:440px;
          box-shadow:0 20px 60px rgba(0,0,0,0.25);
          overflow:hidden;animation:acmSlideUp 0.35s ease;
        ">
          <div style="height:4px;background:linear-gradient(90deg,#0f5c3a,#c79a2b);"></div>
          <div style="padding:32px 28px 24px;text-align:center;">
            <div style="margin-bottom:8px;">
              <svg viewBox="0 0 24 24" style="width:48px;height:48px;fill:#c79a2b;">
                <path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1s3.1 1.39 3.1 3.1v2z"/>
              </svg>
            </div>
            <div style="position:relative;width:80px;height:80px;margin:0 auto 16px;">
              <svg viewBox="0 0 36 36" style="width:80px;height:80px;transform:rotate(-90deg);">
                <circle cx="18" cy="18" r="15.9" fill="none" stroke="#e8ece9" stroke-width="3"/>
                <circle cx="18" cy="18" r="15.9" fill="none" stroke="${percentage >= 40 ? '#c79a2b' : '#8b2e2e'}" stroke-width="3"
                  stroke-dasharray="${percentage} ${100 - percentage}" stroke-linecap="round"/>
              </svg>
              <span style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;font-family:'Lora',serif;font-size:1.1rem;font-weight:700;color:#0f5c3a;">${percentage}%</span>
            </div>
            <h4 style="font-family:'Lora',serif;font-size:1.15rem;font-weight:700;color:#0f5c3a;margin:0 0 10px;">Please Complete Your Profile</h4>
            <p style="font-size:0.87rem;color:#6f7f78;line-height:1.6;margin:0;">Please complete your profile information first. Your profile is <strong>${percentage}%</strong> complete. Kindly fill in all required fields to access this service.</p>
            ${missingHtml}
          </div>
          <div style="display:flex;gap:10px;padding:0 28px 24px;justify-content:center;">
            <button id="acm-cancel-btn" style="padding:10px 22px;border-radius:8px;border:1.5px solid #d9e3de;background:white;color:#6f7f78;font-size:0.85rem;font-weight:600;cursor:pointer;">Cancel</button>
            <button id="acm-primary-btn" style="padding:10px 22px;border-radius:8px;border:none;background:linear-gradient(135deg,#0f5c3a,#2f8a60);color:white;font-size:0.85rem;font-weight:700;cursor:pointer;box-shadow:0 4px 12px rgba(15,92,58,0.3);">Go to Profile</button>
          </div>
        </div>
      </div>
    `;
      document.body.insertAdjacentHTML('beforeend', modalHtml);

      const modal = document.getElementById('access-control-modal');
      document.getElementById('acm-primary-btn').addEventListener('click', () => { window.location.href = redirectUrl; });
      document.getElementById('acm-cancel-btn').addEventListener('click', () => {
        modal.style.animation = 'acmFadeIn 0.2s ease reverse forwards';
        setTimeout(() => modal.remove(), 200);
      });
      modal.addEventListener('click', e => {
        if (e.target === modal) { modal.style.animation = 'acmFadeIn 0.2s ease reverse forwards'; setTimeout(() => modal.remove(), 200); }
      });
    }

    // ══════════════════════════════════════
    //  INIT
    // ══════════════════════════════════════
    initData();

    const user = getUser();
    const { percentage, missingFields } = getProfileCompletion();
    const isComplete = percentage === 100;

    // ── Load user nav ──
    const navName = document.getElementById('nav-name');
    const navAvatar = document.getElementById('nav-avatar');
    if (navName) navName.textContent = user.name;
    if (navAvatar) {
      const photo = localStorage.getItem('mis_user_photo');
      if (photo) {
        navAvatar.textContent = '';
        navAvatar.style.backgroundImage = 'url(' + photo + ')';
        navAvatar.style.backgroundSize = 'cover';
        navAvatar.style.backgroundPosition = 'center';
      } else {
        navAvatar.textContent = user.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
      }
    }

    // ── Set role label ──
    const navRole = document.getElementById('nav-role');
    if (navRole) {
      navRole.textContent = isComplete ? 'Verified User' : 'Not Verified';
      navRole.style.color = isComplete ? 'var(--success)' : 'var(--warning)';
    }

    // ── Date in top bar ──
    const now = new Date();
    document.getElementById('top-date').textContent =
      now.toLocaleDateString('en-US', { weekday: 'long', month: 'long', day: 'numeric', year: 'numeric' });

    // ── Welcome heading ──
    const firstName = user.name.split(' ')[0] || 'User';
    document.getElementById('welcome-heading').textContent = `Assalamu Alaikum, ${firstName}!`;

    // ── Profile completion widget ──
    const ringFill = document.getElementById('ring-fill');
    const ringPct = document.getElementById('ring-pct');
    const pwSub = document.getElementById('pw-sub');
    const btnComplete = document.getElementById('btn-complete-profile');

    setTimeout(() => {
      ringFill.setAttribute('stroke-dasharray', `${percentage} ${100 - percentage}`);
      ringFill.setAttribute('stroke', isComplete ? '#e0b84a' : 'white');
    }, 100);
    ringPct.textContent = percentage + '%';

    if (isComplete) {
      pwSub.textContent = 'Your profile is complete. You have full access to all available departments.';
      btnComplete.textContent = 'View Profile';
      btnComplete.style.borderColor = 'rgba(224,184,74,0.5)';
      btnComplete.style.background = 'rgba(224,184,74,0.15)';
    } else {
      pwSub.textContent = `Your profile is ${percentage}% complete. Complete all required fields to gain full system access.`;
    }

    // ── Da'wah sidebar dropdown (gender-based, correct paths) ──
    const dawahMenu = document.getElementById('dawah-menu');
    const dawahTrigger = document.getElementById('dawah-trigger');
    if (user.gender === 'female') {
      dawahMenu.innerHTML = `
      <a href="Da'awah/Female/user_form-female-counseling.html">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        Sisters' Counseling
      </a>`;
      dawahTrigger.setAttribute('data-href', "Da'awah/Female/user_form-female-counseling.html");
    } else {
      dawahMenu.innerHTML = `
      <a href="Da'awah/Male/user_form-male-counseling.html">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        Brothers' Counseling
      </a>`;
      dawahTrigger.setAttribute('data-href', "Da'awah/Male/user_form-male-counseling.html");
    }

    // ── Build service cards ──
    const serviceGrid = document.getElementById('service-grid');

    const dawahHref = user.gender === 'female'
      ? "Da'awah/Female/user_form-female-counseling.html"
      : "Da'awah/Male/user_form-male-counseling.html";

    const services = [
      {
        id: 'damayan',
        title: 'Damayan — Burial Services',
        desc: 'Submit a formal request for burial services for the deceased. Fill in the necessary details about the deceased, family contact, and burial preferences.',
        icon: '<path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/>',
        iconClass: '',
        href: 'Damayan/user_burial-form.html',
        btnText: 'Request Service'
      },
      {
        id: 'dawah',
        title: !isComplete ? "Da'wah — Counseling Services"
          : user.gender === 'female' ? "Da'wah — Sisters' Counseling"
            : "Da'wah — Brothers' Counseling",
        desc: !isComplete
          ? 'Request a confidential counseling session for personal, family, or spiritual matters. Complete your profile to access gender-specific counseling services.'
          : user.gender === 'female'
            ? 'Request a confidential session with our female counselors. All sessions are conducted with utmost privacy and respect for Islamic values.'
            : 'Request a confidential counseling session with our male counselors for personal, family, or spiritual matters. Schedule your preferred appointment time.',
        icon: '<path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>',
        iconClass: user.gender === 'female' ? 'purple' : 'teal',
        href: dawahHref,
        btnText: 'Request Service'
      },
      {
        id: 'apartment',
        title: 'Apartment Application',
        desc: 'Apply for a housing unit in the Masjid apartment complex. Submit your family details and preferred unit type for review by the Apartment Management.',
        icon: '<path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4zm-8 4H7v-2h2v2zm0-4H7V9h2v2zm0-4H7V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2z"/>',
        iconClass: 'green',
        href: 'Apartment/tenant_add_information_form.html',
        btnText: 'Apply Now'
      }
    ];

    services.forEach(svc => {
      const card = document.createElement('div');
      card.className = 'service-card';
      card.innerHTML = `
      <div class="service-card-icon ${svc.iconClass}">
        <svg viewBox="0 0 24 24">${svc.icon}</svg>
      </div>
      <div class="service-card-body">
        <h5>${svc.title}</h5>
        <p>${svc.desc}</p>
        <div class="btn-go">
          ${svc.btnText}
          <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
        </div>
      </div>
    `;

      card.addEventListener('click', (e) => {
        e.preventDefault();
        if (!isComplete) {
          showAccessModal({
            percentage,
            missingFields,
            redirectUrl: 'tenant_account.html?edit=true'
          });
        } else {
          window.location.href = svc.href;
        }
      });

      serviceGrid.appendChild(card);
    });

    // ── Requests table ──
    const reqs = getRequests().filter(r => r.user === user.id);
    const reqTbody = document.getElementById('req-tbody');
    const reqCount = document.getElementById('req-count');

    reqCount.textContent = reqs.length + ' record' + (reqs.length !== 1 ? 's' : '');

    if (reqs.length === 0) {
      reqTbody.innerHTML = '<tr><td colspan="5" style="text-align:center;padding:28px;color:var(--text-muted);">No service requests yet. Submit your first request above.</td></tr>';
    } else {
      reqTbody.innerHTML = reqs.map(r => {
        const type = r.type.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
        return '<tr>' +
          '<td class="td-id">#' + r.id + '</td>' +
          '<td>' + type + '</td>' +
          '<td>' + r.date + '</td>' +
          '<td><span class="badge-status badge-' + r.status + '">' + r.status + '</span></td>' +
          '<td style="color:var(--text-muted);">' + (r.updatedAt || r.date) + '</td>' +
          '</tr>';
      }).join('');
    }

    // ── Sidebar toggle ──
    const sidebar = document.getElementById('sidebar');
    document.getElementById('sidebar-toggle').addEventListener('click', () => {
      sidebar.classList.toggle('collapsed');
      // Close any open dropdowns when collapsing
      if (sidebar.classList.contains('collapsed')) {
        document.querySelectorAll('.nav-dropdown').forEach(m => m.classList.remove('open'));
        document.querySelectorAll('.nav-dropdown-trigger').forEach(btn => btn.classList.remove('open'));
      }
    });

    // ── Lock/Unlock service dropdowns based on profile completion ──
    function applyDropdownLocks() {
      const wraps = ['damayan-wrap', 'dawah-wrap', 'apartment-wrap'];
      wraps.forEach(id => {
        const wrap = document.getElementById(id);
        if (!wrap) return;
        if (isComplete) {
          wrap.classList.remove('locked');
        } else {
          wrap.classList.add('locked');
        }
      });
    }
    applyDropdownLocks();

    // ── Dropdown toggles (with lock check) ──
    function initDropdown(triggerId, menuId, wrapId) {
      const trigger = document.getElementById(triggerId);
      const menu = document.getElementById(menuId);
      const wrap = document.getElementById(wrapId);
      trigger.addEventListener('click', () => {
        // If locked, show access modal
        if (wrap && wrap.classList.contains('locked')) {
          showAccessModal({ percentage, missingFields, redirectUrl: 'tenant_account.html' });
          return;
        }
        // If sidebar is collapsed, navigate directly to the service page
        if (sidebar.classList.contains('collapsed')) {
          const href = trigger.getAttribute('data-href');
          if (href) window.location.href = href;
          return;
        }
        // Normal dropdown toggle when expanded
        const isOpen = menu.classList.contains('open');
        document.querySelectorAll('.nav-dropdown').forEach(m => m.classList.remove('open'));
        document.querySelectorAll('.nav-dropdown-trigger').forEach(btn => btn.classList.remove('open'));
        if (!isOpen) { menu.classList.add('open'); trigger.classList.add('open'); }
      });
    }
    initDropdown('damayan-trigger', 'damayan-menu', 'damayan-wrap');
    initDropdown('dawah-trigger', 'dawah-menu', 'dawah-wrap');
    initDropdown('apartment-trigger', 'apartment-menu', 'apartment-wrap');
  </script>

  <!-- Notification Badge System -->
  <script src="../JS/admin-shared.js"></script>
  <script>
    initAdminData();
    initReportsData();
    initNotifBadge('tenant');
  </script>
</body>

</html>