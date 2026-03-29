<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MIS — User Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" />
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,600;0,700;1,400&family=Source+Sans+3:wght@300;400;500;600;700&display=swap');

:root {
  --primary: #176b45;
  --primary-dark: #0f5c3a;
  --primary-light: #2f8a60;
  --accent: #c79a2b;
  --accent-light: #e0b84a;
  --sidebar-width: 265px;
  --sidebar-bg: #0f5c3a;
  --content-bg: #f4f6f5;
  --card-bg: #ffffff;
  --text-main: #1f2e2a;
  --text-muted: #6f7f78;
  --border: #d9e3de;
  --success: #2f8a60;
  --warning: #c79a2b;
  --danger: #8b2e2e;
  --info: #1f6f5a;
  --sidebar-text: #b8d2c7;
  --sidebar-active: #c79a2b;
}

* { box-sizing: border-box; margin: 0; padding: 0; }

body {
  font-family: 'Source Sans 3', sans-serif;
  background: var(--content-bg);
  color: var(--text-main);
  font-size: 14.5px;
  line-height: 1.6;
}

/* ───── LAYOUT ───── */
.app-wrapper { display: flex; height: 100vh; overflow: hidden; }

/* ───── SIDEBAR ───── */
.sidebar {
  width: var(--sidebar-width);
  min-width: var(--sidebar-width);
  height: 100vh;
  background: var(--sidebar-bg);
  display: flex;
  flex-direction: column;
  overflow: hidden;
  position: relative;
  flex-shrink: 0;
}

.sidebar::after {
  content: '';
  position: absolute;
  right: 0; top: 0; bottom: 0;
  width: 1px;
  background: linear-gradient(to bottom, transparent, rgba(201,168,76,0.3), transparent);
}

.sidebar-header {
  padding: 24px 20px 20px;
  border-bottom: 1px solid rgba(255,255,255,0.07);
}

.sidebar-brand { display: flex; align-items: center; gap: 12px; }

.sidebar-brand .brand-text { line-height: 1.2; }

.sidebar-brand .brand-text strong {
  display: block;
  font-family: 'Lora', serif;
  font-size: 0.95rem;
  color: white;
  font-weight: 700;
}

.sidebar-brand .brand-text span {
  font-size: 0.7rem;
  color: var(--accent);
  text-transform: uppercase;
  letter-spacing: 0.08em;
}

.sidebar-user {
  padding: 14px 20px;
  background: rgba(255,255,255,0.04);
  border-bottom: 1px solid rgba(255,255,255,0.07);
  display: flex;
  align-items: center;
  gap: 10px;
}

.user-avatar {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: var(--primary-light);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 0.75rem;
  font-weight: 700;
  color: white;
  flex-shrink: 0;
}

.sidebar-user .user-info { flex: 1; overflow: hidden; }

.sidebar-user .user-info strong {
  display: block;
  font-size: 0.82rem;
  color: white;
  font-weight: 600;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.sidebar-user .user-info span {
  font-size: 0.7rem;
  color: var(--accent);
  text-transform: uppercase;
  letter-spacing: 0.06em;
}

.sidebar-nav {
  flex: 1;
  overflow-y: auto;
  padding: 16px 0 8px;
  scrollbar-width: none;
}

.sidebar-nav::-webkit-scrollbar { display: none; }

.nav-section-label {
  padding: 10px 20px 4px;
  font-size: 0.65rem;
  font-weight: 700;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(168,189,208,0.45);
}

.nav-item {
  display: flex;
  align-items: center;
  gap: 11px;
  padding: 10px 20px;
  color: var(--sidebar-text);
  text-decoration: none;
  font-size: 0.87rem;
  font-weight: 500;
  border-left: 3px solid transparent;
  transition: all 0.18s;
  cursor: pointer;
}

.nav-item svg { width: 17px; height: 17px; flex-shrink: 0; opacity: 0.75; }

.nav-item:hover {
  color: white;
  background: rgba(255,255,255,0.06);
  border-left-color: rgba(201,168,76,0.4);
}

.nav-item:hover svg { opacity: 1; }

.nav-item.active {
  color: white;
  background: rgba(201,168,76,0.13);
  border-left-color: var(--accent);
  font-weight: 600;
}

.nav-item.active svg { opacity: 1; fill: var(--accent-light); }

.sidebar-footer {
  padding: 16px 20px;
  border-top: 1px solid rgba(255,255,255,0.07);
}

.sidebar-footer .nav-item {
  padding: 9px 0;
  color: rgba(168,189,208,0.6);
  border: none;
}

.sidebar-footer .nav-item:hover { color: #e8605a; background: none; border: none; }

/* ───── MAIN CONTENT ───── */
.main-content {
  flex: 1;
  height: 100vh;
  overflow-y: auto;
  background: var(--content-bg);
  display: flex;
  flex-direction: column;
}

.top-bar {
  background: white;
  border-bottom: 1px solid var(--border);
  padding: 14px 28px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: sticky;
  top: 0;
  z-index: 100;
  flex-shrink: 0;
}

.top-bar-title {
  font-family: 'Lora', serif;
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--primary-dark);
}

.top-bar-subtitle { font-size: 0.78rem; color: var(--text-muted); margin-top: 1px; }

.top-bar-actions { display: flex; align-items: center; gap: 12px; }

.page-body { padding: 28px; flex: 1; }

/* ───── WELCOME BANNER ───── */
.welcome-banner {
  background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-light) 100%);
  border-radius: 12px;
  padding: 24px 28px;
  color: white;
  margin-bottom: 24px;
  position: relative;
  overflow: hidden;
}

.welcome-banner::before {
  content: '';
  position: absolute;
  right: -30px; bottom: -30px;
  width: 180px; height: 180px;
  border-radius: 50%;
  background: rgba(201,168,76,0.15);
}

.welcome-banner::after {
  content: '';
  position: absolute;
  right: 60px; bottom: -50px;
  width: 120px; height: 120px;
  border-radius: 50%;
  background: rgba(255,255,255,0.06);
}

.welcome-banner h3 {
  font-family: 'Lora', serif;
  font-size: 1.3rem;
  font-weight: 700;
  margin-bottom: 6px;
}

.welcome-banner p { font-size: 0.87rem; opacity: 0.75; margin: 0; }

/* ───── SERVICE CARDS ───── */
.service-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 20px; margin-bottom: 28px; }

.service-card {
  background: white;
  border-radius: 12px;
  padding: 28px 26px;
  border: 1.5px solid var(--border);
  text-decoration: none;
  display: flex;
  align-items: flex-start;
  gap: 18px;
  box-shadow: 0 1px 4px rgba(0,0,0,0.04);
  transition: all 0.2s;
}

.service-card:hover {
  border-color: var(--primary-light);
  box-shadow: 0 6px 24px rgba(26,58,92,0.12);
  transform: translateY(-2px);
}

.service-card-icon {
  width: 52px;
  height: 52px;
  border-radius: 12px;
  background: var(--primary);
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.service-card-icon svg { width: 26px; height: 26px; fill: white; }
.service-card-icon.gold { background: var(--accent); }
.service-card-icon.teal { background: #1e6b7a; }
.service-card-icon.green { background: #2e7d55; }

.service-card-body h5 {
  font-family: 'Lora', serif;
  font-size: 1.05rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin-bottom: 6px;
}

.service-card-body p {
  font-size: 0.82rem;
  color: var(--text-muted);
  line-height: 1.5;
  margin: 0;
}

.service-card-body .btn-go {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  margin-top: 12px;
  font-size: 0.8rem;
  font-weight: 700;
  color: var(--primary-light);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.service-card-body .btn-go svg { width: 14px; height: 14px; }

/* ───── SECTION CARD ───── */
.section-card {
  background: white;
  border-radius: 10px;
  border: 1px solid var(--border);
  box-shadow: 0 1px 4px rgba(0,0,0,0.04);
  margin-bottom: 24px;
  overflow: hidden;
}

.section-card-header {
  padding: 16px 22px;
  border-bottom: 1px solid var(--border);
  display: flex;
  align-items: center;
  justify-content: space-between;
  background: linear-gradient(to right, rgba(26,58,92,0.03), transparent);
}

.section-card-header h6 {
  font-family: 'Lora', serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin: 0;
  display: flex;
  align-items: center;
  gap: 8px;
}

.section-card-header h6 svg { width: 16px; height: 16px; fill: var(--accent); }

.section-card-body { padding: 22px; }

/* ───── TABLES ───── */
.table-wrapper { overflow-x: auto; }

.mis-table {
  width: 100%;
  border-collapse: collapse;
  font-size: 0.87rem;
}

.mis-table thead tr {
  background: var(--primary-dark);
  color: white;
}

.mis-table thead th {
  padding: 11px 14px;
  font-weight: 600;
  font-size: 0.73rem;
  text-transform: uppercase;
  letter-spacing: 0.07em;
  white-space: nowrap;
  border: none;
}

.mis-table tbody tr {
  border-bottom: 1px solid var(--border);
  transition: background 0.15s;
}

.mis-table tbody tr:last-child { border-bottom: none; }
.mis-table tbody tr:hover { background: rgba(26,58,92,0.03); }

.mis-table tbody td {
  padding: 11px 14px;
  color: var(--text-main);
  vertical-align: middle;
}

.mis-table .td-id { font-family: monospace; font-size: 0.82rem; color: var(--text-muted); }

/* ───── BADGES ───── */
.badge-status {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 4px 10px;
  border-radius: 20px;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.04em;
  text-transform: uppercase;
}

.badge-status::before {
  content: '';
  width: 6px; height: 6px;
  border-radius: 50%;
  flex-shrink: 0;
}

.badge-pending { background: rgba(176,125,46,0.12); color: var(--warning); }
.badge-pending::before { background: var(--warning); }
.badge-approved { background: rgba(46,125,85,0.12); color: var(--success); }
.badge-approved::before { background: var(--success); }
.badge-active { background: rgba(30,95,139,0.12); color: var(--info); }
.badge-active::before { background: var(--info); }

/* ───── SCROLLBAR ───── */
.main-content::-webkit-scrollbar { width: 6px; }
.main-content::-webkit-scrollbar-track { background: transparent; }
.main-content::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
.main-content::-webkit-scrollbar-thumb:hover { background: #b0bcc8; }

/* ───── RESPONSIVE ───── */
@media (max-width: 1024px) {
  .service-grid { grid-template-columns: 1fr; }
}

@media (max-width: 768px) {
  :root { --sidebar-width: 220px; }
  .page-body { padding: 18px; }
}

  </style>
</head>
<body>
<div class="app-wrapper">

  <!-- ═══ SIDEBAR ═══ -->
  <aside class="sidebar">
    <div class="sidebar-header">
      <div class="sidebar-brand">
        <img src="<?= asset('assets/logo.jpg') ?>" class="w-100 h-auto" style="max-width: 60px; max-height: 60px; border-radius: 10px;" alt="ISCAG Logo">
        <div class="brand-text"><strong>ISCAG MIS</strong><span>User Portal</span></div>
      </div>
    </div>
    <div class="sidebar-user">
      <div class="user-avatar" style="background:var(--accent);">
        <?= strtoupper(substr($_SESSION['name'] ?? 'U', 0, 2)) ?>
      </div>
      <div class="user-info">
        <strong><?= htmlspecialchars($_SESSION['name'] ?? 'User') ?></strong>
        <span><?= htmlspecialchars($_SESSION['role'] ?? 'Applicant') ?></span>
      </div>
    </div>
    <nav class="sidebar-nav">
      <div class="nav-section-label">Menu</div>
      <a href="<?= url('/user/dashboard') ?>" class="nav-item active">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
        My Dashboard
      </a>

      <div class="nav-section-label">Services</div>
      <a href="#" class="nav-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
        Burial Service
      </a>
      <a href="#" class="nav-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        Male Counseling
      </a>
      <a href="#" class="nav-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        Female Counseling
      </a>
      <a href="#" class="nav-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z"/></svg>
        Apartment Application
      </a>
    </nav>
    <div class="sidebar-footer">
      <a href="<?= url('/logout') ?>" class="nav-item">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
        Logout
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
        <span style="font-size:0.8rem;color:var(--text-muted);">Monday, March 09, 2026</span>
      </div>
    </div>

    <div class="page-body">

      <!-- WELCOME -->
        <h3>Assalamu Alaikum, <?= htmlspecialchars(explode(' ', $_SESSION['name'] ?? 'User')[0]) ?>!</h3>
        <p>Welcome to the Masjid Management Information System. Select a service below to submit a request.</p>
      </div>

      <!-- SERVICE CARDS -->
      <h6 style="font-family:'Lora',serif;font-size:0.9rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:16px;">Available Services</h6>

      <div class="service-grid">
        <a href="#" class="service-card">
          <div class="service-card-icon">
            <svg viewBox="0 0 24 24"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
          </div>
          <div class="service-card-body">
            <h5>Burial Service Request</h5>
            <p>Submit a formal request for burial services for the deceased. Fill in the necessary details about the deceased, family contact, and burial preferences.</p>
            <div class="btn-go">
              Request Service
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </div>
          </div>
        </a>

        <a href="#" class="service-card">
          <div class="service-card-icon teal">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
          </div>
          <div class="service-card-body">
            <h5>Male Counseling Request</h5>
            <p>Request a confidential counseling session with our male counselors for personal, family, or spiritual matters. Schedule your preferred appointment time.</p>
            <div class="btn-go">
              Request Service
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </div>
          </div>
        </a>

        <a href="#" class="service-card">
          <div class="service-card-icon gold">
            <svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>
          </div>
          <div class="service-card-body">
            <h5>Female Counseling Request</h5>
            <p>Request a confidential session with our female counselors. All sessions are conducted with utmost privacy and respect for Islamic values.</p>
            <div class="btn-go">
              Request Service
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </div>
          </div>
        </a>

        <a href="#" class="service-card">
          <div class="service-card-icon green">
            <svg viewBox="0 0 24 24"><path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4zm-8 4H7v-2h2v2zm0-4H7V9h2v2zm0-4H7V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2z"/></svg>
          </div>
          <div class="service-card-body">
            <h5>Apartment Application</h5>
            <p>Apply for a housing unit in the Masjid apartment complex. Submit your family details and preferred unit type for review by the Apartment Management.</p>
            <div class="btn-go">
              Apply Now
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </div>
          </div>
        </a>

        <?php if ($_SESSION['role'] === 'Tenant'): ?>
        <a href="#" class="service-card">
          <div class="service-card-icon" style="background: #e0b84a;">
            <svg viewBox="0 0 24 24" fill="white"><path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z"/></svg>
          </div>
          <div class="service-card-body">
            <h5>Parking Application</h5>
            <p>Request a secure parking slot within the complex. Available exclusively for verified ISCAG tenants.</p>
            <div class="btn-go">
              Apply Now
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z"/></svg>
            </div>
          </div>
        </a>
        <?php endif; ?>
      </div>

      <!-- MY REQUESTS HISTORY -->
      <div class="section-card">
        <div class="section-card-header">
          <h6>
            <svg viewBox="0 0 24 24"><path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z"/></svg>
            My Recent Requests
          </h6>
          <span style="font-size:0.75rem;color:var(--text-muted);">Your submission history</span>
        </div>
        <div class="section-card-body" style="padding:0;">
          <div class="table-wrapper">
            <table class="mis-table">
              <thead>
                <tr>
                  <th>Reference No.</th>
                  <th>Service Type</th>
                  <th>Date Submitted</th>
                  <th>Details</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="td-id">#BUR-001</td>
                  <td><span class="badge-status badge-active">Burial Service</span></td>
                  <td>July 13, 2026</td>
                  <td>Ahmad ibn Yusuf — Section A, Block 3</td>
                  <td><span class="badge-status badge-pending">Pending</span></td>
                </tr>
                <tr>
                  <td class="td-id">#MC-002</td>
                  <td><span class="badge-status" style="background:rgba(30,107,122,0.1);color:#1e6b7a;">Male Counseling</span></td>
                  <td>July 11, 2026</td>
                  <td>Preferred: July 16, 2026 – 2:00 PM</td>
                  <td><span class="badge-status badge-approved">Approved</span></td>
                </tr>
                <tr>
                  <td class="td-id">#APT-001</td>
                  <td><span class="badge-status" style="background:rgba(46,125,85,0.1);color:var(--success);">Apartment</span></td>
                  <td>March 9, 2026</td>
                  <td>Unit Type: 1-Bedroom</td>
                  <td><span class="badge-status badge-pending">Pending</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
</body>
</html>
