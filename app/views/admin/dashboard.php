<?php
// TEMPORARY DEBUG SHIM: Define environment if missing
if (!defined('BASE_PATH')) {
    define('BASE_PATH', dirname(__DIR__, 3));
}
if (!function_exists('asset')) {
    function asset($path) { return "/Iscag/public/" . $path; }
}
if (!function_exists('url')) {
    function url($path) { return "/Iscag" . $path; }
}
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Load Auth helper if not loaded
if (!class_exists('Auth')) {
    require_once BASE_PATH . '/app/helpers/Auth.php';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title> Admin Dashboard</title>
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

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Source Sans 3', sans-serif;
      background: var(--content-bg);
      color: var(--text-main);
      font-size: 14.5px;
      line-height: 1.6;
    }

    /* ───── LAYOUT ───── */
    .app-wrapper {
      display: flex;
      height: 100vh;
      overflow: hidden;
    }

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
      right: 0;
      top: 0;
      bottom: 0;
      width: 1px;
      background: linear-gradient(to bottom, transparent, rgba(201, 168, 76, 0.3), transparent);
    }

    .sidebar-header {
      padding: 24px 20px 20px;
      border-bottom: 1px solid rgba(255, 255, 255, 0.07);
    }

    .sidebar-brand {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .sidebar-brand .brand-logo svg {
      width: 20px;
      height: 20px;
      fill: white;
    }

    .sidebar-brand .brand-text {
      line-height: 1.2;
    }

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
      background: rgba(255, 255, 255, 0.04);
      border-bottom: 1px solid rgba(255, 255, 255, 0.07);
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

    .sidebar-user .user-info {
      flex: 1;
      overflow: hidden;
    }

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

    .sidebar-nav::-webkit-scrollbar {
      display: none;
    }

    .nav-section-label {
      padding: 10px 20px 4px;
      font-size: 0.65rem;
      font-weight: 700;
      letter-spacing: 0.12em;
      text-transform: uppercase;
      color: rgba(168, 189, 208, 0.45);
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

    .nav-item svg {
      width: 17px;
      height: 17px;
      flex-shrink: 0;
      opacity: 0.75;
    }

    .nav-item:hover {
      color: white;
      background: rgba(255, 255, 255, 0.06);
      border-left-color: rgba(201, 168, 76, 0.4);
    }

    .nav-item:hover svg {
      opacity: 1;
    }

    .nav-item.active {
      color: white;
      background: rgba(201, 168, 76, 0.13);
      border-left-color: var(--accent);
      font-weight: 600;
    }

    .nav-item.active svg {
      opacity: 1;
      fill: var(--accent-light);
    }

    .sidebar-footer {
      padding: 16px 20px;
      border-top: 1px solid rgba(255, 255, 255, 0.07);
    }

    .sidebar-footer .nav-item {
      padding: 9px 0;
      color: rgba(168, 189, 208, 0.6);
      border: none;
    }

    .sidebar-footer .nav-item:hover {
      color: #e8605a;
      background: none;
      border: none;
    }

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

    .top-bar-subtitle {
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 1px;
    }

    .top-bar-actions {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .btn-topbar {
      padding: 7px 14px;
      border-radius: 7px;
      font-size: 0.8rem;
      font-weight: 600;
      text-decoration: none;
      border: none;
      cursor: pointer;
      display: inline-flex;
      align-items: center;
      gap: 6px;
      transition: all 0.18s;
    }

    .btn-primary-sm {
      background: var(--primary);
      color: white;
    }

    .btn-primary-sm:hover {
      background: var(--primary-dark);
      color: white;
    }

    .page-body {
      padding: 28px;
      flex: 1;
    }

    /* ───── STAT CARDS ───── */
    .stat-cards {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 18px;
      margin-bottom: 28px;
    }

    .stat-card {
      background: white;
      border-radius: 10px;
      padding: 20px 22px;
      border: 1px solid var(--border);
      display: flex;
      align-items: flex-start;
      gap: 14px;
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
    }

    .stat-icon {
      width: 44px;
      height: 44px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .stat-icon svg {
      width: 22px;
      height: 22px;
    }

    .stat-icon.blue {
      background: rgba(30, 95, 139, 0.1);
    }

    .stat-icon.blue svg {
      fill: var(--info);
    }

    .stat-icon.gold {
      background: rgba(201, 168, 76, 0.12);
    }

    .stat-icon.gold svg {
      fill: var(--warning);
    }

    .stat-icon.green {
      background: rgba(46, 125, 85, 0.1);
    }

    .stat-icon.green svg {
      fill: var(--success);
    }

    .stat-icon.red {
      background: rgba(139, 46, 46, 0.1);
    }

    .stat-icon.red svg {
      fill: var(--danger);
    }

    .stat-info {
      flex: 1;
    }

    .stat-info .stat-num {
      font-family: 'Lora', serif;
      font-size: 1.7rem;
      font-weight: 700;
      color: var(--primary-dark);
      line-height: 1;
    }

    .stat-info .stat-label {
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 4px;
      font-weight: 500;
      text-transform: uppercase;
      letter-spacing: 0.04em;
    }

    /* ───── SECTION CARD ───── */
    .section-card {
      background: white;
      border-radius: 10px;
      border: 1px solid var(--border);
      box-shadow: 0 1px 4px rgba(0, 0, 0, 0.04);
      margin-bottom: 24px;
      overflow: hidden;
    }

    .section-card-header {
      padding: 16px 22px;
      border-bottom: 1px solid var(--border);
      display: flex;
      align-items: center;
      justify-content: space-between;
      background: linear-gradient(to right, rgba(26, 58, 92, 0.03), transparent);
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

    .section-card-header h6 svg {
      width: 16px;
      height: 16px;
      fill: var(--accent);
    }

    .section-card-body {
      padding: 22px;
    }

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
      width: 6px;
      height: 6px;
      border-radius: 50%;
      flex-shrink: 0;
    }

    .badge-pending {
      background: rgba(176, 125, 46, 0.12);
      color: var(--warning);
    }

    .badge-pending::before {
      background: var(--warning);
    }

    .badge-approved {
      background: rgba(46, 125, 85, 0.12);
      color: var(--success);
    }

    .badge-approved::before {
      background: var(--success);
    }

    /* ───── RECENT ACTIVITY ───── */
    .activity-item {
      display: flex;
      align-items: flex-start;
      gap: 12px;
      padding: 12px 0;
      border-bottom: 1px solid var(--border);
    }

    .activity-item:last-child {
      border-bottom: none;
    }

    .activity-dot {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-top: 5px;
      flex-shrink: 0;
    }

    .activity-dot.blue {
      background: var(--info);
    }

    .activity-dot.gold {
      background: var(--accent);
    }

    .activity-dot.green {
      background: var(--success);
    }

    .activity-text {
      flex: 1;
    }

    .activity-text strong {
      font-size: 0.87rem;
      color: var(--text-main);
    }

    .activity-text span {
      display: block;
      font-size: 0.78rem;
      color: var(--text-muted);
      margin-top: 2px;
    }

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
      right: -30px;
      bottom: -30px;
      width: 180px;
      height: 180px;
      border-radius: 50%;
      background: rgba(201, 168, 76, 0.15);
    }

    .welcome-banner::after {
      content: '';
      position: absolute;
      right: 60px;
      bottom: -50px;
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.06);
    }

    .welcome-banner h3 {
      font-family: 'Lora', serif;
      font-size: 1.3rem;
      font-weight: 700;
      margin-bottom: 6px;
    }

    .welcome-banner p {
      font-size: 0.87rem;
      opacity: 0.75;
      margin: 0;
    }

    /* ───── SCROLLBAR ───── */
    .main-content::-webkit-scrollbar {
      width: 6px;
    }

    .main-content::-webkit-scrollbar-track {
      background: transparent;
    }

    .main-content::-webkit-scrollbar-thumb {
      background: var(--border);
      border-radius: 3px;
    }

    .main-content::-webkit-scrollbar-thumb:hover {
      background: #b0bcc8;
    }

    /* ───── RESPONSIVE ───── */
    @media (max-width: 1024px) {
      .stat-cards {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 768px) {
      :root {
        --sidebar-width: 220px;
      }

      .stat-cards {
        grid-template-columns: 1fr;
      }

      .page-body {
        padding: 18px;
      }
    }
  </style>
</head>

<body>
  <div class="app-wrapper">

    <!-- ═══ SIDEBAR ═══ -->
    <aside class="sidebar">
      <div class="sidebar-header">
        <div class="sidebar-brand">
          <div class="brand-logo">
            <img src="<?= asset('assets/logo.jpg') ?>" class="w-100 h-auto" style="max-width: 60px; max-height: 60px; border-radius: 10px;" alt="ISCAG Logo">
          </div>
          <div class="brand-text">
            <strong>ISCAG</strong>
            <span>Admin Panel</span>
          </div>
        </div>
      </div>

      <div class="sidebar-user">
        <div class="user-avatar">
          <?= strtoupper(substr($_SESSION['name'] ?? 'A', 0, 2)) ?>
        </div>
        <div class="user-info">
          <strong><?= htmlspecialchars($_SESSION['name'] ?? 'Admin') ?></strong>
          <span><?= htmlspecialchars($_SESSION['role'] ?? 'Administrator') ?></span>
        </div>
      </div>

      <nav class="sidebar-nav">
        <div class="nav-section-label">Overview</div>
        <a href="<?= url('/admin/dashboard') ?>" class="nav-item active">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          Dashboard
        </a>

        <div class="nav-section-label">Departments</div>

        <?php if (Auth::hasRole(['Admin', 'Staff_Damayan'])): ?>
          <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
            </svg>
            Burial Records
          </a>
        <?php endif; ?>

        <?php if (Auth::hasRole(['Admin', 'Staff_Male', 'Staff_Female'])): ?>
          <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
            </svg>
            Counseling Records
          </a>
        <?php endif; ?>

        <?php if (Auth::hasRole(['Admin', 'Staff_Tenant'])): ?>
          <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4zm-8 4H7v-2h2v2zm0-4H7V9h2v2zm0-4H7V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
            </svg>
            Apartment Applications
          </a>
        <?php endif; ?>

        <?php if (Auth::hasRole('Admin')): ?>
          <div class="nav-section-label">Administration</div>
          <a href="#" class="nav-item">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
            </svg>
            User Management
          </a>
        <?php endif; ?>
      </nav>

      <div class="sidebar-footer">
        <a href="<?= url('/logout') ?>" class="nav-item">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z" />
          </svg>
          Logout
        </a>
      </div>
    </aside>

    <!-- ═══ MAIN CONTENT ═══ -->
    <div class="main-content">
      <div class="top-bar">
        <div>
          <div class="top-bar-title">Admin Dashboard</div>
          <div class="top-bar-subtitle">Welcome back — here's an overview of all departments</div>
        </div>
        <div class="top-bar-actions">
          <span style="font-size:0.8rem;color:var(--text-muted);">Monday, March 19, 2026</span>
        </div>
      </div>

      <div class="page-body">

        <!-- WELCOME -->
        <div class="welcome-banner">
          <h3>Assalamu Alaikum, Admin!</h3>
          <p>You have <strong>5 new requests</strong> pending review across all departments.</p>
        </div>

        <!-- STAT CARDS -->
        <div class="stat-cards">
          <div class="stat-card">
            <div class="stat-icon blue">
              <svg viewBox="0 0 24 24">
                <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
              </svg>
            </div>
            <div class="stat-info">
              <div class="stat-num">24</div>
              <div class="stat-label">Burial Requests</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon gold">
              <svg viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
              </svg>
            </div>
            <div class="stat-info">
              <div class="stat-num">38</div>
              <div class="stat-label">Counseling Requests</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon green">
              <svg viewBox="0 0 24 24">
                <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
              </svg>
            </div>
            <div class="stat-info">
              <div class="stat-num">15</div>
              <div class="stat-label">Apartment Applications</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon red">
              <svg viewBox="0 0 24 24">
                <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
              </svg>
            </div>
            <div class="stat-info">
              <div class="stat-num">62</div>
              <div class="stat-label">Registered Users</div>
            </div>
          </div>
        </div>

        <div class="row g-4">
          <!-- RECENT ACTIVITY -->
          <div class="col-lg-7">
            <div class="section-card">
              <div class="section-card-header">
                <h6>
                  <svg viewBox="0 0 24 24">
                    <path d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9zm-1 5v5l4.28 2.54.72-1.21-3.5-2.08V8H12z" />
                  </svg>
                  Recent Activity
                </h6>
                <span style="font-size:0.75rem;color:var(--text-muted);">Last 7 days</span>
              </div>
              <div class="section-card-body" style="padding-top:8px;padding-bottom:8px;">
                <div class="activity-item">
                  <div class="activity-dot blue"></div>
                  <div class="activity-text">
                    <strong>New burial request submitted</strong>
                    <span>Ahmad ibn Yusuf — July 13, 2025 at 10:42 AM</span>
                  </div>
                  <span class="badge-status badge-pending">Pending</span>
                </div>
                <div class="activity-item">
                  <div class="activity-dot gold"></div>
                  <div class="activity-text">
                    <strong>Male counseling request</strong>
                    <span>Mohammad Al-Rashid — July 12, 2025 at 2:15 PM</span>
                  </div>
                  <span class="badge-status badge-approved">Approved</span>
                </div>
                <div class="activity-item">
                  <div class="activity-dot green"></div>
                  <div class="activity-text">
                    <strong>Apartment application received</strong>
                    <span>Fatima Binti Hassan — July 12, 2025 at 9:30 AM</span>
                  </div>
                  <span class="badge-status badge-pending">Pending</span>
                </div>
                <div class="activity-item">
                  <div class="activity-dot gold"></div>
                  <div class="activity-text">
                    <strong>Female counseling request</strong>
                    <span>Aminah Khalid — July 11, 2025 at 3:00 PM</span>
                  </div>
                  <span class="badge-status badge-approved">Approved</span>
                </div>
                <div class="activity-item">
                  <div class="activity-dot blue"></div>
                  <div class="activity-text">
                    <strong>New burial request submitted</strong>
                    <span>Ibrahim Al-Farouq — July 10, 2025 at 8:10 AM</span>
                  </div>
                  <span class="badge-status badge-approved">Approved</span>
                </div>
              </div>
            </div>
          </div>

          <!-- QUICK LINKS -->
          <div class="col-lg-5">
            <div class="section-card">
              <div class="section-card-header">
                <h6>
                  <svg viewBox="0 0 24 24">
                    <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                  </svg>
                  Quick Access
                </h6>
              </div>
              <div class="section-card-body">
                <div style="display:flex;flex-direction:column;gap:10px;">
                  <?php if (Auth::hasRole(['Admin', 'Staff_Damayan'])): ?>
                    <a href="#" class="btn-topbar btn-primary-sm" style="justify-content:center;padding:12px;">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                      </svg>
                      View Burial Records
                    </a>
                  <?php endif; ?>

                  <?php if (Auth::hasRole(['Admin', 'Staff_Male', 'Staff_Female'])): ?>
                    <a href="#" class="btn-topbar btn-outline-sm" style="justify-content:center;padding:12px;">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
                      </svg>
                      View Counseling Records
                    </a>
                  <?php endif; ?>

                  <?php if (Auth::hasRole(['Admin', 'Staff_Tenant'])): ?>
                    <a href="#" class="btn-topbar btn-outline-sm" style="justify-content:center;padding:12px;">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
                      </svg>
                      View Apartment Applications
                    </a>
                  <?php endif; ?>

                  <?php if (Auth::hasRole('Admin')): ?>
                    <a href="#" class="btn-topbar btn-outline-sm" style="justify-content:center;padding:12px;">
                      <svg viewBox="0 0 24 24" width="16" height="16" fill="currentColor">
                        <path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3z" />
                      </svg>
                      Manage Users
                    </a>
                  <?php endif; ?>
                </div>
              </div>
            </div>

            <!-- STATUS SUMMARY -->
            <div class="section-card mt-0">
              <div class="section-card-header">
                <h6>
                  <svg viewBox="0 0 24 24">
                    <path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 3c1.93 0 3.5 1.57 3.5 3.5S13.93 13 12 13s-3.5-1.57-3.5-3.5S10.07 6 12 6zm7 13H5v-.23c0-.62.28-1.2.76-1.58C7.47 15.82 9.64 15 12 15s4.53.82 6.24 2.19c.48.38.76.97.76 1.58V19z" />
                  </svg>
                  Request Summary
                </h6>
              </div>
              <div class="section-card-body">
                <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px solid var(--border);">
                  <span style="font-size:0.85rem;">Pending</span>
                  <span class="badge-status badge-pending">12</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;border-bottom:1px solid var(--border);">
                  <span style="font-size:0.85rem;">Approved</span>
                  <span class="badge-status badge-approved">51</span>
                </div>
                <div style="display:flex;justify-content:space-between;align-items:center;padding:6px 0;">
                  <span style="font-size:0.85rem;">Rejected</span>
                  <span class="badge-status badge-rejected">14</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</body>

</html>