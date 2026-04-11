<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ISCAG MIS — Admin Profile</title>
  <link rel="stylesheet" href="<?= asset('css/admin-shared.css') ?>" />
  <style>
    /* ── Profile-specific styles (same design as user_profile.html) ── */
    .profile-avatar-lg {
      width: 88px;
      height: 88px;
      border-radius: 50%;
      background: var(--primary);
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 2rem;
      font-weight: 700;
      color: white;
      font-family: 'Lora', serif;
    }

    .profile-complete-badge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 0.72rem;
      font-weight: 700;
      letter-spacing: 0.02em;
    }

    .progress-bar-wrap {
      width: 100%;
      background: #e8ece9;
      border-radius: 4px;
      overflow: hidden;
    }

    .progress-bar-fill {
      height: 100%;
      border-radius: 4px;
      transition: width 0.6s ease, background 0.3s ease;
    }

    .form-section-title {
      font-family: 'Lora', serif;
      font-size: 0.88rem;
      font-weight: 700;
      color: var(--primary-dark);
      padding-bottom: 10px;
      border-bottom: 2px solid rgba(23, 107, 69, 0.15);
      margin-bottom: 16px;
    }

    .form-submit-row {
      display: flex;
      gap: 10px;
      justify-content: flex-end;
      margin-top: 20px;
      padding-top: 18px;
      border-top: 1px solid var(--border);
    }

    .btn-cancel {
      padding: 9px 20px;
      border-radius: 8px;
      border: 1.5px solid var(--border);
      background: white;
      color: var(--text-muted);
      font-size: 0.85rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.18s;
      font-family: inherit;
    }

    .btn-cancel:hover {
      border-color: var(--danger);
      color: var(--danger);
      background: rgba(139, 46, 46, 0.04);
    }

    .btn-submit {
      padding: 9px 20px;
      border-radius: 8px;
      border: none;
      background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
      color: white;
      font-size: 0.85rem;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.18s;
      box-shadow: 0 4px 12px rgba(23, 107, 69, 0.25);
      font-family: inherit;
    }

    .btn-submit:hover {
      box-shadow: 0 6px 20px rgba(23, 107, 69, 0.35);
      transform: translateY(-1px);
    }

    .info-badge {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      padding: 3px 10px;
      border-radius: 20px;
      font-size: 0.72rem;
      font-weight: 600;
    }

    .dept-card {
      padding: 14px 18px;
      border-radius: 10px;
      border: 1px solid var(--border);
      background: white;
      display: flex;
      align-items: center;
      gap: 14px;
      transition: all 0.2s;
      cursor: default;
    }

    .dept-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    }

    .dept-icon {
      width: 40px;
      height: 40px;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-shrink: 0;
    }

    .dept-icon svg {
      width: 20px;
      height: 20px;
      fill: white;
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
          <img src="<?= asset('assets/logo.jpg') ?>" style="max-width:48px;max-height:48px;border-radius:8px;" alt="ISCAG" />
          <div class="brand-text"><strong>ISCAG MIS</strong><span>Admin Portal</span></div>
        </div>
      </div>
      <div class="sidebar-user">
        <div class="user-avatar" id="nav-avatar" style="background:var(--accent);">AD</div>
        <div class="user-info"><strong id="nav-name">MIS Admin</strong><span>System Administrator</span></div>
      </div>
      <nav class="sidebar-nav">
        <div class="nav-section-label">Overview</div>
        <a href="<?= url('/user/dashboard') ?>" class="nav-item" data-tooltip="Dashboard">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          <span class="nav-item-label">Dashboard</span>
        </a>
        <a href="admin_profile.php" class="nav-item active" data-tooltip="Profile">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
          </svg>
          <span class="nav-item-label">My Profile</span>
        </a>
        <a href="records/records.php" class="nav-item" data-tooltip="Users">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
          </svg>
          <span class="nav-item-label">User Management</span>
        </a>

        <div class="nav-section-label">Verification</div>
        <a href="admin_tenant_confirmation.php" class="nav-item" data-tooltip="Verify">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" />
          </svg>
          <span class="nav-item-label">Tenant Verification</span>
        </a>

        <div class="nav-section-label">Reports</div>
        <a href="admin_reports.php" class="nav-item" data-tooltip="Reports">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 7V3.5L18.5 9H13zM9 13h6v2H9v-2zm6 4H9v2h6v-2z" />
          </svg>
          <span class="nav-item-label">Tenant Reports</span>
        </a>
        <a href="tenant_timeline.php" class="nav-item" data-tooltip="Timeline">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
          </svg>
          <span class="nav-item-label">Activity Timeline</span>
        </a>

        <div class="nav-section-label">Department Records</div>
        <a href="records/apartment_records.php" class="nav-item" data-tooltip="Apartment">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
          </svg>
          <span class="nav-item-label">Apartment Records</span>
        </a>
        <a href="records/daawah_records.php" class="nav-item" data-tooltip="Da'wah">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
          </svg>
          <span class="nav-item-label">Da'wah Records</span>
        </a>
        <a href="records/damayan_records.php" class="nav-item" data-tooltip="Damayan">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
          </svg>
          <span class="nav-item-label">Damayan Records</span>
        </a>

        <div class="nav-section-label">Finance</div>
        <a href="#billing" class="nav-item" data-tooltip="Billing" onclick="scrollToSection('billing-section')">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
          </svg>
          <span class="nav-item-label">Billing & Payments</span>
        </a>

        <div class="nav-section-label">System</div>
        <a href="#activity" class="nav-item" data-tooltip="Logs" onclick="scrollToSection('activity-section')">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
          </svg>
          <span class="nav-item-label">Activity Log</span>
        </a>
        <a href="#staff" class="nav-item" data-tooltip="Staff" onclick="scrollToSection('staff-section')">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
          </svg>
          <span class="nav-item-label">Staff Management</span>
        </a>
      </nav>
      <div class="sidebar-footer">
        <a href="<?= url('/login') ?>" class="nav-item" data-tooltip="Logout">
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
          <div class="top-bar-title">Admin Profile</div>
          <div class="top-bar-subtitle">Manage your administrator account and personal information</div>
        </div>
        <div class="top-bar-actions">
          <a href="<?= url('/user/dashboard') ?>" class="btn-topbar">← Dashboard</a>
        </div>
      </div>

      <div class="page-body">

        <!-- PROFILE HEADER CARD -->
        <div class="section-card" style="margin-bottom:24px;overflow:hidden;">
          <!-- gradient banner strip -->
          <div
            style="background:linear-gradient(135deg,var(--primary-dark) 0%,var(--primary-light) 100%);height:72px;position:relative;overflow:hidden;">
            <div
              style="position:absolute;right:-20px;bottom:-20px;width:140px;height:140px;border-radius:50%;background:rgba(201,168,76,0.12);">
            </div>
            <div
              style="position:absolute;right:80px;bottom:-30px;width:90px;height:90px;border-radius:50%;background:rgba(255,255,255,0.06);">
            </div>
          </div>

          <div style="padding:0 28px 24px;">
            <!-- avatar row -->
            <div style="display:flex;align-items:flex-end;gap:20px;margin-top:-44px;margin-bottom:16px;flex-wrap:wrap;">
              <div style="flex-shrink:0;text-align:center;">
                <div class="profile-avatar-lg" id="profile-avatar-lg"
                  style="overflow:hidden;margin:0 auto 8px;border:3px solid white;box-shadow:0 2px 12px rgba(0,0,0,0.15);">
                  AD</div>
                <input type="file" id="avatar-input" accept="image/*" style="display:none;" />
                <button id="avatar-upload-label" type="button" onclick="document.getElementById('avatar-input').click()"
                  style="padding:5px 12px;border-radius:6px;border:1.5px solid var(--primary);background:white;color:var(--primary);font-size:0.75rem;font-weight:700;cursor:pointer;transition:background 0.18s,color 0.18s;">Edit
                  Photo</button>
              </div>

              <!-- name / badges / progress -->
              <div style="flex:1;min-width:220px;padding-top:48px;">
                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:4px;">
                  <h4
                    style="font-family:'Lora',serif;font-weight:700;color:var(--primary-dark);margin:0;font-size:1.15rem;"
                    id="profile-fullname">Admin</h4>
                  <span class="profile-complete-badge" id="profile-badge"
                    style="background:rgba(46,125,85,0.1);color:var(--success);">✅ Complete</span>
                </div>
                <p style="color:var(--text-muted);font-size:0.83rem;margin:0 0 10px;" id="profile-email">admin@iscag.org
                </p>

                <!-- info badges -->
                <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                  <span class="info-badge" style="background:rgba(199,154,43,0.12);color:var(--accent);">🛡️ System
                    Administrator</span>
                  <span class="info-badge" style="background:rgba(46,125,85,0.1);color:var(--success);">✅ Active</span>
                  <span class="info-badge" style="background:rgba(30,95,139,0.1);color:var(--info);"
                    id="member-since">📅 Staff Since —</span>
                </div>

                <!-- profile completion bar -->
                <div
                  style="margin-bottom:4px;display:flex;justify-content:space-between;font-size:0.75rem;color:var(--text-muted);">
                  <span>Profile Completion</span><span id="completion-pct">100%</span>
                </div>
                <div class="progress-bar-wrap" style="height:6px;">
                  <div class="progress-bar-fill" id="completion-bar" style="width:100%;background:var(--success);">
                  </div>
                </div>
              </div>
            </div>

            <div style="border-top:1px solid var(--border);margin-bottom:18px;"></div>

            <!-- quick stats -->
            <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;">
              <div style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(30,95,139,0.06);">
                <div
                  style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--primary-dark);line-height:1;"
                  id="qs-users">0</div>
                <div
                  style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                  Users Managed</div>
              </div>
              <div style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(46,125,85,0.07);">
                <div
                  style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--success);line-height:1;"
                  id="qs-staff">0</div>
                <div
                  style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                  Staff Accounts</div>
              </div>
              <div style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(199,154,43,0.08);">
                <div
                  style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--warning);line-height:1;"
                  id="qs-pending">0</div>
                <div
                  style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                  Pending</div>
              </div>
              <div style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(139,46,46,0.07);">
                <div
                  style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--danger);line-height:1;"
                  id="qs-depts">3</div>
                <div
                  style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                  Departments</div>
              </div>
            </div>

            <!-- action buttons -->
            <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:16px;">
              <button id="edit-profile-btn" type="button"
                style="font-size:0.82rem;padding:8px 18px;border-radius:8px;border:1.5px solid var(--primary);background:white;color:var(--primary);font-weight:700;cursor:pointer;transition:all 0.18s;font-family:inherit;">Update
                Profile</button>
              <button type="button" id="view-activity-btn"
                style="padding:8px 18px;border-radius:8px;border:1.5px solid var(--border);background:white;color:var(--text-muted);font-size:0.82rem;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:all 0.18s;font-family:inherit;">📊
                View Activity</button>
            </div>

            <!-- last login + contact -->
            <div style="display:flex;gap:24px;flex-wrap:wrap;">
              <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:13px;height:13px;opacity:0.5;">
                  <path
                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" />
                </svg>
                Last login: <span id="last-login" style="color:var(--text-main);font-weight:600;">Today, 2:28 PM</span>
              </div>
              <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:13px;height:13px;opacity:0.5;">
                  <path
                    d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                </svg>
                <span id="contact-email" style="color:var(--text-main);font-weight:600;">admin@iscag.org</span>
              </div>
              <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);">
                <svg viewBox="0 0 24 24" fill="currentColor" style="width:13px;height:13px;opacity:0.5;">
                  <path
                    d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z" />
                </svg>
                <span id="contact-phone">+63 917 000 0000</span>
              </div>
            </div>
          </div>
        </div>

        <!-- ACTIVITY LOG -->
        <div class="section-card" id="activity-section" style="display:none;">
          <div class="section-card-header">
            <h6>
              <svg viewBox="0 0 24 24">
                <path
                  d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
              </svg>
              Admin Activity Log
            </h6>
            <span id="activity-count" style="font-size:0.75rem;color:var(--text-muted);">0 entries</span>
          </div>
          <div class="section-card-body" style="padding:0;">
            <div class="table-wrapper" style="padding:0 22px 22px;">
              <table class="mis-table">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Detail</th>
                    <th>Time</th>
                    <th>Type</th>
                  </tr>
                </thead>
                <tbody id="activity-tbody"></tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- DEPARTMENT ACCESS CARDS -->
        <div class="section-card">
          <div class="section-card-header">
            <h6>
              <svg viewBox="0 0 24 24">
                <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4z" />
              </svg>
              Department Access
            </h6>
            <span
              style="font-size:0.72rem;color:var(--success);background:rgba(46,125,85,0.1);padding:3px 10px;border-radius:12px;font-weight:700;">Full
              Access</span>
          </div>
          <div class="section-card-body">
            <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;">
              <div class="dept-card">
                <div class="dept-icon" style="background:var(--primary);">
                  <svg viewBox="0 0 24 24">
                    <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
                  </svg>
                </div>
                <div>
                  <div style="font-weight:700;font-size:0.9rem;">Da'wah</div>
                  <div style="font-size:0.75rem;color:var(--text-muted);">Counseling · Education · Marriage</div>
                </div>
              </div>
              <div class="dept-card">
                <div class="dept-icon" style="background:#5a2e7a;">
                  <svg viewBox="0 0 24 24">
                    <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
                  </svg>
                </div>
                <div>
                  <div style="font-weight:700;font-size:0.9rem;">Damayan</div>
                  <div style="font-size:0.75rem;color:var(--text-muted);">Burial Services</div>
                </div>
              </div>
              <div class="dept-card">
                <div class="dept-icon" style="background:var(--accent);">
                  <svg viewBox="0 0 24 24">
                    <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
                  </svg>
                </div>
                <div>
                  <div style="font-weight:700;font-size:0.9rem;">Apartments</div>
                  <div style="font-size:0.75rem;color:var(--text-muted);">Units · Tenants · Billing</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- ACCOUNT SETTINGS -->
        <div class="section-card">
          <div class="section-card-header">
            <h6>
              <svg viewBox="0 0 24 24">
                <path
                  d="M19.14 12.94c.04-.3.06-.61.06-.94 0-.32-.02-.64-.07-.94l2.03-1.58a.49.49 0 00.12-.61l-1.92-3.32a.49.49 0 00-.59-.22l-2.39.96c-.5-.38-1.03-.7-1.62-.94l-.36-2.54a.48.48 0 00-.48-.41h-3.84a.48.48 0 00-.48.41l-.36 2.54c-.59.24-1.13.57-1.62.94l-2.39-.96a.49.49 0 00-.59.22L2.74 8.87c-.12.21-.08.47.12.61l2.03 1.58c-.05.3-.07.62-.07.94s.02.64.07.94l-2.03 1.58a.49.49 0 00-.12.61l1.92 3.32c.12.22.37.29.59.22l2.39-.96c.5.38 1.03.7 1.62.94l.36 2.54c.05.24.24.41.48.41h3.84c.24 0 .44-.17.48-.41l.36-2.54c.59-.24 1.13-.56 1.62-.94l2.39.96c.22.08.47 0 .59-.22l1.92-3.32c.12-.22.07-.47-.12-.61l-2.01-1.58zM12 15.6A3.6 3.6 0 1115.6 12 3.6 3.6 0 0112 15.6z" />
              </svg>
              Account Settings
            </h6>
          </div>
          <div class="section-card-body">
            <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
              <div>
                <label class="form-label">Admin ID</label>
                <p style="font-weight:600;font-family:monospace;color:var(--text-muted);" id="admin-id">ADM-001</p>
              </div>
              <div>
                <label class="form-label">Role</label>
                <p style="font-weight:600;">System Administrator (Super Admin)</p>
              </div>
              <div>
                <label class="form-label">Date Assigned</label>
                <p style="font-weight:600;" id="date-assigned">Jan 1, 2025</p>
              </div>
              <div>
                <label class="form-label">Account Status</label>
                <p><span class="badge-status badge-approved">Active</span></p>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <!-- EDIT PROFILE MODAL -->
  <div id="profile-modal"
    style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;padding:24px 16px;">
    <div
      style="background:white;border-radius:12px;width:100%;max-width:720px;max-height:90vh;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.2);display:flex;flex-direction:column;">
      <!-- modal header -->
      <div
        style="display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--border);background:white;z-index:1;">
        <h6
          style="font-family:'Lora',serif;font-size:0.95rem;font-weight:700;color:var(--primary-dark);margin:0;display:flex;align-items:center;gap:8px;">
          <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:var(--accent);">
            <path
              d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
          </svg>
          Edit Admin Profile
        </h6>
        <button id="modal-close-x" type="button" onclick="closeProfileModal()"
          style="background:none;border:1.5px solid transparent;cursor:pointer;padding:6px 10px;border-radius:7px;color:var(--text-muted);font-size:1.5rem;line-height:1;">&times;</button>
      </div>
      <!-- modal body -->
      <div style="padding:24px;overflow-y:auto;flex:1;">
        <div class="form-section-title">Personal Information</div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:16px;">
          <div><label class="form-label">Full Name *</label><input type="text" class="form-control" id="f-name"
              placeholder="Full name" /></div>
          <div><label class="form-label">Email Address *</label><input type="email" class="form-control" id="f-email"
              placeholder="admin@iscag.org" /></div>
          <div><label class="form-label">Phone *</label><input type="tel" class="form-control" id="f-phone"
              placeholder="+63 917 000 0000" /></div>
        </div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
          <div><label class="form-label">Gender</label>
            <select class="form-control" id="f-gender" style="appearance:auto;">
              <option value="">— Select —</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>
          <div><label class="form-label">Date of Birth</label><input type="date" class="form-control" id="f-dob" />
          </div>
          <div><label class="form-label">Address</label><input type="text" class="form-control" id="f-address"
              placeholder="City, Province" /></div>
        </div>
        <div class="form-section-title">Islamic Information</div>
        <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
          <div><label class="form-label">Muslim / Arabic Name</label><input type="text" class="form-control"
              id="f-arabic" placeholder="e.g., Abdullah" /></div>
          <div><label class="form-label">ISCAG Membership</label>
            <select class="form-control" id="f-membership" style="appearance:auto;">
              <option value="">— Select —</option>
              <option>Regular Member</option>
              <option>Associate Member</option>
              <option>Non-Member</option>
            </select>
          </div>
          <div><label class="form-label">Occupation</label><input type="text" class="form-control" id="f-occupation"
              placeholder="Current occupation" /></div>
        </div>
        <div class="form-submit-row">
          <button class="btn-cancel" type="button" onclick="closeProfileModal()">Cancel</button>
          <button class="btn-submit" type="button" onclick="saveAdminProfile()">Save Profile</button>
        </div>
      </div>
    </div>
  </div>

  <script src="<?= asset('js/admin-shared.js') ?>"></script>
  <script>
    initAdminData();
    loadUserNav();

    // Admin profile data key
    const ADMIN_PROFILE_KEY = 'mis_admin_profile';
    const DEFAULT_ADMIN = {
      id: 'ADM-001', name: 'Muhammad Usman', email: 'admin@iscag.org',
      phone: '+63 917 000 0000', gender: 'male', dob: '', address: 'Cotabato City',
      arabic: 'Usman', membership: 'Regular Member', occupation: 'System Administrator',
      assigned: '2025-01-01'
    };

    function getAdminProfile() {
      const raw = localStorage.getItem(ADMIN_PROFILE_KEY);
      if (raw) return JSON.parse(raw);
      // Merge from existing user profile
      const user = getUser();
      const admin = { ...DEFAULT_ADMIN };
      if (user.name && user.name !== 'Muhammad Usman') admin.name = user.name;
      if (user.email) admin.email = user.email;
      if (user.phone) admin.phone = user.phone;
      if (user.gender) admin.gender = user.gender;
      if (user.dob) admin.dob = user.dob;
      if (user.address) admin.address = user.address;
      if (user.arabicName) admin.arabic = user.arabicName;
      if (user.membership) admin.membership = user.membership;
      if (user.occupation) admin.occupation = user.occupation;
      localStorage.setItem(ADMIN_PROFILE_KEY, JSON.stringify(admin));
      return admin;
    }

    function renderProfile() {
      const admin = getAdminProfile();
      const users = getAllUsers();
      const staff = getStaffList();
      const reqs = getRequests();

      // Header
      const initials = admin.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
      document.getElementById('profile-avatar-lg').textContent = initials;
      document.getElementById('profile-fullname').textContent = admin.name;
      document.getElementById('profile-email').textContent = admin.email;
      document.getElementById('contact-email').textContent = admin.email;
      document.getElementById('contact-phone').textContent = admin.phone || '—';
      document.getElementById('member-since').textContent = '📅 Staff Since ' + formatDate(admin.assigned);
      document.getElementById('admin-id').textContent = admin.id;
      document.getElementById('date-assigned').textContent = formatDate(admin.assigned);

      // Photo
      const photo = localStorage.getItem('mis_user_photo');
      const avatarEl = document.getElementById('profile-avatar-lg');
      if (photo) {
        avatarEl.textContent = '';
        avatarEl.style.backgroundImage = 'url(' + photo + ')';
        avatarEl.style.backgroundSize = 'cover';
        avatarEl.style.backgroundPosition = 'center';
      }

      // Nav user
      const navAvatar = document.getElementById('nav-avatar');
      if (navAvatar) {
        if (photo) {
          navAvatar.textContent = '';
          navAvatar.style.backgroundImage = 'url(' + photo + ')';
          navAvatar.style.backgroundSize = 'cover';
          navAvatar.style.backgroundPosition = 'center';
        } else {
          navAvatar.textContent = initials;
        }
      }
      const navName = document.getElementById('nav-name');
      if (navName) navName.textContent = admin.name;

      // Stats
      document.getElementById('qs-users').textContent = users.length;
      document.getElementById('qs-staff').textContent = staff.length;
      document.getElementById('qs-pending').textContent = reqs.filter(r => r.status === 'pending').length;

      // Completion
      const fields = ['name', 'email', 'phone', 'gender', 'address', 'arabic', 'membership', 'occupation'];
      const filled = fields.filter(k => admin[k] && String(admin[k]).trim() !== '').length;
      const pct = Math.round((filled / fields.length) * 100);
      document.getElementById('completion-pct').textContent = pct + '%';
      document.getElementById('completion-bar').style.width = pct + '%';
      document.getElementById('completion-bar').style.background = pct >= 100 ? 'var(--success)' : pct >= 50 ? 'var(--accent)' : 'var(--danger)';

      const badge = document.getElementById('profile-badge');
      if (pct >= 100) {
        badge.textContent = '✅ Complete';
        badge.style.background = 'rgba(46,125,85,0.1)';
        badge.style.color = 'var(--success)';
      } else {
        badge.textContent = '🔒 ' + pct + '% Complete';
        badge.style.background = 'rgba(199,154,43,0.12)';
        badge.style.color = 'var(--warning)';
      }
    }

    renderProfile();

    // Edit modal
    document.getElementById('edit-profile-btn').addEventListener('click', () => {
      const admin = getAdminProfile();
      document.getElementById('f-name').value = admin.name || '';
      document.getElementById('f-email').value = admin.email || '';
      document.getElementById('f-phone').value = admin.phone || '';
      document.getElementById('f-gender').value = admin.gender || '';
      document.getElementById('f-dob').value = admin.dob || '';
      document.getElementById('f-address').value = admin.address || '';
      document.getElementById('f-arabic').value = admin.arabic || '';
      document.getElementById('f-membership').value = admin.membership || '';
      document.getElementById('f-occupation').value = admin.occupation || '';
      document.getElementById('profile-modal').style.display = 'flex';
    });

    function closeProfileModal() {
      document.getElementById('profile-modal').style.display = 'none';
    }

    function saveAdminProfile() {
      const admin = getAdminProfile();
      admin.name = document.getElementById('f-name').value.trim() || admin.name;
      admin.email = document.getElementById('f-email').value.trim() || admin.email;
      admin.phone = document.getElementById('f-phone').value.trim();
      admin.gender = document.getElementById('f-gender').value;
      admin.dob = document.getElementById('f-dob').value;
      admin.address = document.getElementById('f-address').value.trim();
      admin.arabic = document.getElementById('f-arabic').value.trim();
      admin.membership = document.getElementById('f-membership').value;
      admin.occupation = document.getElementById('f-occupation').value.trim();
      localStorage.setItem(ADMIN_PROFILE_KEY, JSON.stringify(admin));

      // Also update the shared user profile
      const user = getUser();
      user.name = admin.name;
      user.email = admin.email;
      user.phone = admin.phone;
      user.gender = admin.gender;
      localStorage.setItem('mis_user', JSON.stringify(user));

      closeProfileModal();
      showToast('✅ Profile updated successfully!', 'var(--success)');
      renderProfile();
    }

    // Photo upload
    document.getElementById('avatar-input').addEventListener('change', function (e) {
      const file = e.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = function (ev) {
        localStorage.setItem('mis_user_photo', ev.target.result);
        showToast('✅ Photo updated!', 'var(--success)');
        renderProfile();
      };
      reader.readAsDataURL(file);
    });

    // Activity toggle
    let activityVisible = false;
    document.getElementById('view-activity-btn').addEventListener('click', () => {
      activityVisible = !activityVisible;
      document.getElementById('activity-section').style.display = activityVisible ? 'block' : 'none';
      if (activityVisible) renderActivity();
    });

    function renderActivity() {
      const log = getActivityLog();
      document.getElementById('activity-count').textContent = log.length + ' entries';
      const tbody = document.getElementById('activity-tbody');
      tbody.innerHTML = log.slice(0, 15).map(e => `<tr>
      <td style="font-weight:600;">${e.action}</td>
      <td style="font-size:0.82rem;color:var(--text-muted);">${e.detail}</td>
      <td style="font-size:0.82rem;color:var(--text-muted);">${timeAgo(e.time)}</td>
      <td><span class="badge-status badge-${e.type === 'approve' ? 'approved' : e.type === 'alert' ? 'pending' : 'completed'}">${e.type}</span></td>
    </tr>`).join('');
    }

    // Close modal on backdrop click
    document.getElementById('profile-modal').addEventListener('click', e => {
      if (e.target === document.getElementById('profile-modal')) closeProfileModal();
    });

    initSidebar();
    initDropdowns();
  </script>
</body>

</html>