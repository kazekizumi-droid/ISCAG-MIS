<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>ISCAG MIS — My Profile</title>

    <link rel="stylesheet" href="<?= asset('css/user-shared.css') ?>" />
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

        <aside class="sidebar" id="sidebar">
            <button class="sidebar-toggle" id="sidebar-toggle" title="Toggle sidebar">
                <svg viewBox="0 0 24 24">
                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z" />
                </svg>
            </button>
            <div class="sidebar-header">
                <div class="sidebar-brand">
                    <img src="<?= asset('assets/logo.jpg') ?>" style="max-width:48px;max-height:48px;border-radius:8px;" alt="ISCAG" />
                    <div class="brand-text"><strong>ISCAG MIS</strong><span>User Portal</span></div>
                </div>
            </div>
            <div class="sidebar-user">
                <div class="user-avatar" id="nav-avatar" style="background:var(--accent);">MU</div>
                <div class="user-info"><strong id="nav-name">Muhammad Usman</strong><span id="nav-role">Not
                        Verified</span></div>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section-label">Menu</div>
                <a href="<?= url('/user/dashboard') ?>" class="nav-item" data-tooltip="Dashboard">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                    </svg>
                    <span class="nav-item-label">My Dashboard</span>
                </a>
                <a href="<?= url('/user/dashboard') ?>" class="nav-item active" data-tooltip="Profile">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
                    </svg>
                    <span class="nav-item-label">My Profile</span>
                </a>
                <a href="tenant_notification.php" class="nav-item" data-tooltip="Notifications">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.89 2 2 2zm6-6v-5c0-3.07-1.64-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.63 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2z" />
                    </svg>
                    <span class="nav-item-label">Notifications</span>
                </a>
                <div class="nav-section-label">Services</div>

                <!-- DAMAYAN DROPDOWN -->
                <div class="nav-dropdown-wrap" id="damayan-wrap">
                    <button class="nav-dropdown-trigger" id="damayan-trigger" data-tooltip="Damayan" data-href="<?= url('/user/burial') ?>">
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
                        <a href="<?= url('/user/burial') ?>">
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
                        <a href="Apartment/tenant_add_information_form.php">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 7V3.5L18.5 9H13z" />
                            </svg>
                            Application Form
                        </a>
                        <a href="Apartment/tenant_status.php">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
                            </svg>
                            Application Status
                        </a>
                        <a href="Apartment/apartment_information.php">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M14 17H4v2h10v-2zm6-8H4v2h16V9zM4 15h16v-2H4v2zM4 5v2h16V5H4z" />
                            </svg>
                            Apartment Information
                        </a>
                    </div>
                </div>
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

        <div class="main-content">
            <div class="top-bar">
                <div>
                    <div class="top-bar-title">My Profile</div>
                    <div class="top-bar-subtitle">Manage your personal information and account settings</div>
                </div>
                <div class="top-bar-actions">
                    <a href="<?= url('/user/dashboard') ?>" class="btn-topbar btn-outline-sm">← Back to Dashboard</a>
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
                        <div
                            style="display:flex;align-items:flex-end;gap:20px;margin-top:-44px;margin-bottom:16px;flex-wrap:wrap;">
                            <div style="flex-shrink:0;text-align:center;">
                                <div class="profile-avatar-lg" id="profile-avatar-lg"
                                    style="overflow:hidden;margin:0 auto 8px;width:88px;height:88px;font-size:2rem;border:3px solid white;box-shadow:0 2px 12px rgba(0,0,0,0.15);">
                                    MU</div>
                                <input type="file" id="avatar-input" accept="image/*" style="display:none;" />
                                <div style="display:flex;flex-direction:column;align-items:center;gap:6px;">
                                    <button id="avatar-upload-label" type="button"
                                        onclick="document.getElementById('avatar-input').click()"
                                        style="padding:5px 12px;border-radius:6px;border:1.5px solid var(--primary);background:white;color:var(--primary);font-size:0.75rem;font-weight:700;cursor:pointer;transition:background 0.18s,color 0.18s;white-space:nowrap;">Edit
                                        Photo</button>
                                    <div id="avatar-action-btns"
                                        style="display:none;flex-direction:column;gap:6px;width:100%;">
                                        <button id="avatar-save-btn" type="button"
                                            style="padding:5px 12px;border-radius:6px;border:none;background:var(--primary);color:white;font-size:0.75rem;font-weight:700;cursor:pointer;width:100%;">Save</button>
                                        <button id="avatar-cancel-btn" type="button"
                                            style="padding:5px 12px;border-radius:6px;border:1.5px solid var(--border);background:white;color:var(--text-muted);font-size:0.75rem;font-weight:600;cursor:pointer;width:100%;">Cancel</button>
                                    </div>
                                </div>
                            </div>

                            <!-- name / badges / progress -->
                            <div style="flex:1;min-width:220px;padding-top:48px;">
                                <div style="display:flex;align-items:center;gap:10px;flex-wrap:wrap;margin-bottom:4px;">
                                    <h4 style="font-family:'Lora',serif;font-weight:700;color:var(--primary-dark);margin:0;font-size:1.15rem;"
                                        id="profile-fullname">Muhammad Usman</h4>
                                    <span class="profile-complete-badge" id="profile-badge"
                                        style="background:rgba(139,46,46,0.1);color:var(--danger);">🔒 Incomplete</span>
                                </div>
                                <p style="color:var(--text-muted);font-size:0.83rem;margin:0 0 10px;"
                                    id="profile-email">musman@example.com</p>

                                <!-- info badges -->
                                <div style="display:flex;gap:8px;flex-wrap:wrap;margin-bottom:12px;">
                                    <span id="role-badge"
                                        style="display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:0.72rem;font-weight:600;background:rgba(199,154,43,0.12);color:var(--warning);">⏳
                                        Not Verified</span>
                                    <span
                                        style="display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:0.72rem;font-weight:600;background:rgba(46,125,85,0.1);color:var(--success);">✅
                                        Active</span>
                                    <span
                                        style="display:inline-flex;align-items:center;gap:4px;padding:3px 10px;border-radius:20px;font-size:0.72rem;font-weight:600;background:rgba(199,154,43,0.12);color:var(--warning);"
                                        id="member-since-badge">📅 Member Since —</span>
                                </div>

                                <!-- profile completion bar -->
                                <div
                                    style="margin-bottom:4px;display:flex;justify-content:space-between;font-size:0.75rem;color:var(--text-muted);">
                                    <span>Profile Completion</span><span id="completion-pct">0%</span>
                                </div>
                                <div class="progress-bar-wrap" style="height:6px;">
                                    <div class="progress-bar-fill" id="completion-bar"
                                        style="width:0%;background:var(--primary);"></div>
                                </div>
                            </div>
                        </div>

                        <!-- divider -->
                        <div style="border-top:1px solid var(--border);margin-bottom:18px;"></div>

                        <!-- quick stats -->
                        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:12px;margin-bottom:18px;">
                            <div
                                style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(30,95,139,0.06);">
                                <div style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--primary-dark);line-height:1;"
                                    id="qs-total">0</div>
                                <div
                                    style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                                    Total</div>
                            </div>
                            <div
                                style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(46,125,85,0.07);">
                                <div style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--success);line-height:1;"
                                    id="qs-approved">0</div>
                                <div
                                    style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                                    Approved</div>
                            </div>
                            <div
                                style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(199,154,43,0.08);">
                                <div style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--warning);line-height:1;"
                                    id="qs-pending">0</div>
                                <div
                                    style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                                    Pending</div>
                            </div>
                            <div
                                style="text-align:center;padding:10px 8px;border-radius:8px;background:rgba(139,46,46,0.07);">
                                <div style="font-family:'Lora',serif;font-size:1.3rem;font-weight:700;color:var(--danger);line-height:1;"
                                    id="qs-rejected">0</div>
                                <div
                                    style="font-size:0.7rem;color:var(--text-muted);margin-top:3px;text-transform:uppercase;letter-spacing:0.04em;">
                                    Rejected</div>
                            </div>
                        </div>


                        <!-- action buttons -->
                        <div style="display:flex;gap:10px;flex-wrap:wrap;margin-bottom:16px;">
                            <button id="save-profile-btn" type="button"
                                style="font-size:0.82rem;padding:8px 18px;border-radius:8px;border:1.5px solid var(--primary);background:white;color:var(--primary);font-weight:700;cursor:pointer;transition:background 0.18s,color 0.18s,box-shadow 0.18s;">Update
                                Profile</button>
                            <button type="button"
                                style="padding:8px 18px;border-radius:8px;border:1.5px solid var(--border);background:white;color:var(--text-muted);font-size:0.82rem;font-weight:600;cursor:pointer;display:inline-flex;align-items:center;gap:6px;transition:all 0.18s;"
                                id="view-activity-btn">📊 View Activity</button>
                        </div>

                        <!-- last activity + contact -->
                        <div style="display:flex;gap:24px;flex-wrap:wrap;">
                            <div
                                style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);">
                                <svg viewBox="0 0 24 24" fill="currentColor"
                                    style="width:13px;height:13px;opacity:0.5;">
                                    <path
                                        d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67V7z" />
                                </svg>
                                Last login: <span id="last-login"
                                    style="color:var(--text-main);font-weight:600;">—</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);"
                                id="phone-row">
                                <svg viewBox="0 0 24 24" fill="currentColor"
                                    style="width:13px;height:13px;opacity:0.5;">
                                    <path
                                        d="M6.62 10.79a15.05 15.05 0 006.59 6.59l2.2-2.2a1 1 0 011.01-.24c1.12.37 2.33.57 3.58.57a1 1 0 011 1V20a1 1 0 01-1 1C10.61 21 3 13.39 3 4a1 1 0 011-1h3.5a1 1 0 011 1c0 1.25.2 2.46.57 3.58a1 1 0 01-.25 1.01l-2.2 2.2z" />
                                </svg>
                                <span id="contact-phone">—</span>
                            </div>
                            <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:var(--text-muted);"
                                id="address-row">
                                <svg viewBox="0 0 24 24" fill="currentColor"
                                    style="width:13px;height:13px;opacity:0.5;">
                                    <path
                                        d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                </svg>
                                <span id="contact-address"
                                    style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;max-width:220px;">—</span>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- PROFILE EDIT MODAL moved outside app-wrapper -->

                <!-- ACTIVITY TABLE -->
                <div class="section-card" id="activity-section" style="display:none;">
                    <div class="section-card-header">
                        <h6>
                            <svg viewBox="0 0 24 24">
                                <path
                                    d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
                            </svg>
                            My Activity
                        </h6>
                        <div style="display:flex;align-items:center;gap:10px;">
                            <select id="activity-filter"
                                style="padding:5px 10px;border-radius:6px;border:1.5px solid var(--border);font-size:0.8rem;color:var(--text-main);cursor:pointer;">
                                <option value="all">All</option>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                                <option value="completed">Completed</option>
                            </select>
                            <span id="activity-count" style="font-size:0.75rem;color:var(--text-muted);">0
                                records</span>
                        </div>
                    </div>
                    <div class="section-card-body" style="padding:0;">
                        <div class="table-wrapper" style="padding:0 22px 22px;">
                            <table class="mis-table">
                                <colgroup>
                                    <col style="width:18%" />
                                    <col style="width:28%" />
                                    <col style="width:20%" />
                                    <col style="width:16%" />
                                    <col style="width:18%" />
                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>Ref No.</th>
                                        <th>Service Type</th>
                                        <th>Date Submitted</th>
                                        <th>Status</th>
                                        <th>Last Updated</th>
                                    </tr>
                                </thead>
                                <tbody id="activity-tbody"></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- PROFILE EDIT MODAL -->
    <div id="profile-modal"
        style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.5);z-index:9999;align-items:center;justify-content:center;padding:24px 16px;">
        <div
            style="background:white;border-radius:12px;width:100%;max-width:720px;max-height:90vh;overflow:hidden;box-shadow:0 8px 40px rgba(0,0,0,0.2);display:flex;flex-direction:column;">

            <!-- modal header -->
            <div
                style="display:flex;align-items:center;justify-content:space-between;padding:18px 24px;border-bottom:1px solid var(--border);background:linear-gradient(to right,rgba(26,58,92,0.03),transparent);border-radius:12px 12px 0 0;position:sticky;top:0;background:white;z-index:1;">
                <h6
                    style="font-family:'Lora',serif;font-size:0.95rem;font-weight:700;color:var(--primary-dark);margin:0;display:flex;align-items:center;gap:8px;">
                    <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:var(--accent);">
                        <path
                            d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z" />
                    </svg>
                    Edit Profile Information
                </h6>
                <button id="modal-close-x" type="button"
                    style="background:none;border:1.5px solid transparent;cursor:pointer;padding:6px 10px;border-radius:7px;color:var(--text-muted);font-size:1.5rem;line-height:1;transition:border-color 0.18s,color 0.18s;">&times;</button>
            </div>

            <!-- modal body -->
            <div style="padding:24px;overflow-y:auto;flex:1;">
                <div class="form-section-title">Personal Information</div>

                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:16px;">
                    <div><label class="form-label">Full Name *</label><input type="text" class="form-control"
                            id="f-name" placeholder="Full name" /></div>
                    <div><label class="form-label">Email Address *</label><input type="email" class="form-control"
                            id="f-email" placeholder="email@example.com" /></div>
                    <div><label class="form-label">Gender *</label>
                        <select class="form-select" id="f-gender">
                            <option value="">— Select —</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:16px;">
                    <div><label class="form-label">Contact Number *</label><input type="tel" class="form-control"
                            id="f-phone" placeholder="09XX-XXX-XXXX" /></div>
                    <div><label class="form-label">Date of Birth</label><input type="date" class="form-control"
                            id="f-dob" /></div>
                    <div><label class="form-label">Civil Status</label>
                        <select class="form-select" id="f-civil">
                            <option value="">— Select —</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Widowed</option>
                            <option>Divorced</option>
                        </select>
                    </div>
                </div>

                <div style="display:grid;grid-template-columns:2fr 1fr;gap:16px;margin-bottom:24px;">
                    <div><label class="form-label">Complete Address *</label><input type="text" class="form-control"
                            id="f-address" placeholder="House No., Street, Barangay, City" /></div>
                    <div><label class="form-label">Occupation</label><input type="text" class="form-control"
                            id="f-occupation" placeholder="Current occupation" /></div>
                </div>

                <div class="form-section-title">Islamic Information</div>

                <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
                    <div><label class="form-label">Muslim / Arabic Name</label><input type="text" class="form-control"
                            id="f-arabic-name" placeholder="e.g., Abdullah, Fatimah" /></div>
                    <div><label class="form-label">ISCAG Membership</label>
                        <select class="form-select" id="f-membership">
                            <option value="">— Select —</option>
                            <option>Regular Member</option>
                            <option>Associate Member</option>
                            <option>Non-Member</option>
                        </select>
                    </div>
                    <div><label class="form-label">Year Reverted / Born Muslim</label><input type="number"
                            class="form-control" id="f-revert-year" placeholder="e.g., 2010" min="1900" max="2026" />
                    </div>
                </div>



                <div class="form-submit-row">
                    <button class="btn-cancel" id="modal-cancel-btn" type="button">Cancel</button>
                    <button class="btn-submit" id="modal-save-btn" type="button">Save Profile</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ══════════════════════════════════════════
        // Inlined data helpers (from js/data.js)
        // ══════════════════════════════════════════
        const STORAGE_KEYS = { user: 'mis_user', requests: 'mis_requests', apartments: 'mis_apartments', initialized: 'mis_data_init' };
        const PROFILE_FIELDS = ['name', 'email', 'gender', 'phone', 'address', 'dob', 'civil', 'occupation', 'arabicName', 'membership'];
        const DEFAULT_USER = { id: 'USR-001', name: 'Muhammad Usman', email: 'musman@example.com', gender: '', phone: '', address: '', dob: '', civil: '', occupation: '', arabicName: '', membership: '', revertYear: '', apartment: '', profileComplete: false };
        const DEFAULT_APARTMENTS = [
            { id: 'APT-A1', name: 'Unit A-1 · Studio', price: 3500, available: 2, status: 'available' },
            { id: 'APT-A2', name: 'Unit A-2 · 1-Bedroom', price: 5000, available: 1, status: 'available' },
            { id: 'APT-B1', name: 'Unit B-1 · 2-Bedroom', price: 7500, available: 0, status: 'occupied' },
            { id: 'APT-B2', name: 'Unit B-2 · 2-Bedroom', price: 7500, available: 1, status: 'available' },
            { id: 'APT-C1', name: 'Unit C-1 · Family Suite', price: 10000, available: 0, status: 'reserved' }
        ];
        const DEFAULT_REQUESTS = [
            { id: 'BUR-001', user: 'USR-001', type: 'burial_service', status: 'pending', date: '2026-03-15', updatedAt: '2026-03-15' },
            { id: 'APT-001', user: 'USR-001', type: 'apartment_application', status: 'approved', date: '2026-03-09', updatedAt: '2026-03-12' }
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
        function updateUser(data) {
            const user = getUser();
            Object.assign(user, data);
            const filled = PROFILE_FIELDS.filter(k => user[k] && String(user[k]).trim() !== '');
            user.profileComplete = filled.length === PROFILE_FIELDS.length;
            localStorage.setItem(STORAGE_KEYS.user, JSON.stringify(user));
            return user;
        }
        function getRequests() {
            const raw = localStorage.getItem(STORAGE_KEYS.requests);
            return raw ? JSON.parse(raw) : [];
        }

        // ══════════════════════════════════════════
        // Inlined nav helper (from js/auth.js)
        // ══════════════════════════════════════════
        function loadUserNav() {
            const u = getUser();
            const navName = document.getElementById('nav-name');
            const navAvatar = document.getElementById('nav-avatar');
            if (navName) navName.textContent = u.name;
            if (navAvatar) {
                const photo = localStorage.getItem('mis_user_photo');
                if (photo) {
                    navAvatar.textContent = '';
                    navAvatar.style.backgroundImage = 'url(' + photo + ')';
                    navAvatar.style.backgroundSize = 'cover';
                    navAvatar.style.backgroundPosition = 'center';
                } else {
                    navAvatar.textContent = u.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
                }
            }
        }

        initData();
        loadUserNav();

        const user = getUser();

        // ── Da'wah dropdown ──
        const dawahMenu = document.getElementById('dawah-menu');
        const dawahTrigger = document.getElementById('dawah-trigger');
        if (user.gender === 'female') {
            dawahMenu.innerHTML = `
            <a href="<?= url('/user/counseling-female') ?>"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>Sisters' Counseling</a>`;
            if (dawahTrigger) dawahTrigger.setAttribute('data-href', "Da'awah/Female/user_form-female-counseling.html");
        } else {
            dawahMenu.innerHTML = `
            <a href="<?= url('/user/counseling-male') ?>"><svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>Brothers' Counseling</a>`;
            if (dawahTrigger) dawahTrigger.setAttribute('data-href', "Da'awah/Male/user_form-male-counseling.html");
        }

        // ── Populate form fields ──
        const fields = { name: 'f-name', email: 'f-email', gender: 'f-gender', phone: 'f-phone', dob: 'f-dob', civil: 'f-civil', address: 'f-address', occupation: 'f-occupation', arabicName: 'f-arabic-name', membership: 'f-membership', revertYear: 'f-revert-year' };
        Object.entries(fields).forEach(([key, id]) => { const el = document.getElementById(id); if (el && user[key]) el.value = user[key]; });
        document.getElementById('profile-fullname').textContent = user.name;
        document.getElementById('profile-email').textContent = user.email;

        // ── Set verification role ──
        const isProfileComplete = user.profileComplete;
        const navRole = document.getElementById('nav-role');
        if (navRole) {
            navRole.textContent = isProfileComplete ? 'Verified User' : 'Not Verified';
            navRole.style.color = isProfileComplete ? 'var(--success)' : 'var(--warning)';
        }
        const roleBadge = document.getElementById('role-badge');
        if (roleBadge) {
            if (isProfileComplete) {
                roleBadge.innerHTML = '✅ Verified User';
                roleBadge.style.background = 'rgba(23,107,69,0.1)';
                roleBadge.style.color = 'var(--primary)';
            } else {
                roleBadge.innerHTML = '⏳ Not Verified';
                roleBadge.style.background = 'rgba(199,154,43,0.12)';
                roleBadge.style.color = 'var(--warning)';
            }
        }



        // ── Header card dynamic data ──
        // Member since (use stored date or fallback to today)
        const memberSince = localStorage.getItem('mis_member_since') || (() => {
            const d = new Date().toISOString().split('T')[0];
            localStorage.setItem('mis_member_since', d);
            return d;
        })();
        document.getElementById('member-since-badge').textContent =
            '\uD83D\uDCC5 Member Since ' + new Date(memberSince).toLocaleDateString('en-US', { month: 'short', year: 'numeric' });

        // Last login
        const now = new Date();
        localStorage.setItem('mis_last_login', now.toISOString());
        document.getElementById('last-login').textContent =
            now.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }) + ' ' +
            now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });

        // Contact info
        if (user.phone) document.getElementById('contact-phone').textContent = user.phone;
        if (user.address) document.getElementById('contact-address').textContent = user.address;

        // Quick stats — filter to current user only
        const reqs = getRequests().filter(r => r.user === user.id);
        document.getElementById('qs-total').textContent = reqs.length;
        document.getElementById('qs-approved').textContent = reqs.filter(r => r.status === 'approved').length;
        document.getElementById('qs-pending').textContent = reqs.filter(r => r.status === 'pending').length;
        document.getElementById('qs-rejected').textContent = reqs.filter(r => r.status === 'rejected').length;

        // Profile completion
        const completionFields = ['name', 'email', 'gender', 'phone', 'address', 'dob', 'civil', 'occupation', 'arabicName', 'membership'];
        const filled = completionFields.filter(k => user[k] && String(user[k]).trim() !== '').length;
        const pct = Math.round(filled / completionFields.length * 100);
        document.getElementById('completion-pct').textContent = pct + '%';
        document.getElementById('completion-bar').style.width = pct + '%';
        document.getElementById('completion-bar').style.background = pct === 100 ? 'var(--success)' : pct >= 50 ? 'var(--warning)' : 'var(--danger)';

        // ════════════════════════════════════════
        // AVATAR — fully independent of the form
        // ════════════════════════════════════════
        const avatarEl = document.getElementById('profile-avatar-lg');
        const avatarInput = document.getElementById('avatar-input');
        const avatarSaveBtn = document.getElementById('avatar-save-btn');
        const avatarCancelBtn = document.getElementById('avatar-cancel-btn');
        const avatarActionBtns = document.getElementById('avatar-action-btns');
        const uploadLabel = document.getElementById('avatar-upload-label');
        let pendingPhoto = null;
        let committedPhoto = localStorage.getItem('mis_user_photo') || null;

        // Load saved photo or show initials
        if (committedPhoto) {
            avatarEl.textContent = '';
            avatarEl.style.backgroundImage = 'url(' + committedPhoto + ')';
            avatarEl.style.backgroundSize = 'cover';
            avatarEl.style.backgroundPosition = 'center';
        } else {
            avatarEl.textContent = user.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
        }

        function syncSidebarAvatar(photoUrl) {
            const navAvatar = document.getElementById('nav-avatar');
            if (!navAvatar) return;
            if (photoUrl) {
                navAvatar.textContent = '';
                navAvatar.style.backgroundImage = 'url(' + photoUrl + ')';
                navAvatar.style.backgroundSize = 'cover';
                navAvatar.style.backgroundPosition = 'center';
            } else {
                navAvatar.style.backgroundImage = '';
                navAvatar.textContent = user.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
            }
        }

        syncSidebarAvatar(committedPhoto);

        // Show Save/Cancel when a file is selected
        avatarInput.addEventListener('change', function () {
            const file = this.files[0];
            if (!file) return;
            const reader = new FileReader();
            reader.onload = e => {
                pendingPhoto = e.target.result;
                avatarEl.textContent = '';
                avatarEl.style.backgroundImage = 'url(' + pendingPhoto + ')';
                avatarEl.style.backgroundSize = 'cover';
                avatarEl.style.backgroundPosition = 'center';
                avatarActionBtns.style.display = 'flex';
                uploadLabel.style.display = 'none';
            };
            reader.readAsDataURL(file);
        });

        // Save image
        function doSaveImage() {
            localStorage.setItem('mis_user_photo', pendingPhoto);
            committedPhoto = pendingPhoto;
            pendingPhoto = null;
            avatarActionBtns.style.display = 'none';
            uploadLabel.style.display = 'block';
            syncSidebarAvatar(committedPhoto);
            showToast('🖼️ Profile image saved!', '#176b45');
        }

        // Revert to committed photo
        function doDiscardImage() {
            pendingPhoto = null;
            avatarEl.textContent = '';
            if (committedPhoto) {
                avatarEl.style.backgroundImage = 'url(' + committedPhoto + ')';
                avatarEl.style.backgroundSize = 'cover';
                avatarEl.style.backgroundPosition = 'center';
            } else {
                avatarEl.style.backgroundImage = '';
                avatarEl.textContent = user.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
            }
            avatarActionBtns.style.display = 'none';
            uploadLabel.style.display = 'block';
            avatarInput.value = '';
        }

        avatarSaveBtn.addEventListener('click', () => { if (pendingPhoto) doSaveImage(); });

        // Cancel — directly discard without modal
        avatarCancelBtn.addEventListener('click', () => doDiscardImage());

        // ════════════════════════════════════════
        // FORM MODAL — fully independent of the avatar
        // ════════════════════════════════════════
        const badge = document.getElementById('profile-badge');
        const saveBtn = document.getElementById('save-profile-btn');
        const profileModal = document.getElementById('profile-modal');
        const modalSaveBtn = document.getElementById('modal-save-btn');
        const modalCancelBtn = document.getElementById('modal-cancel-btn');
        const modalCloseX = document.getElementById('modal-close-x');
        const allFields = Object.values(fields).map(id => document.getElementById(id)).filter(Boolean);
        let snapshot = {};

        if (user.profileComplete) {
            badge.textContent = '✅ Profile Complete';
            badge.style.background = 'rgba(46,125,85,0.1)';
            badge.style.color = 'var(--success)';
        }

        function openModal() {
            snapshot = {};
            Object.entries(fields).forEach(([key, id]) => { const el = document.getElementById(id); if (el) snapshot[id] = el.value; });
            profileModal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeModal(discard) {
            if (discard) {
                Object.entries(snapshot).forEach(([id, val]) => { const el = document.getElementById(id); if (el) el.value = val; });
            }
            profileModal.style.display = 'none';
            document.body.style.overflow = '';
        }

        saveBtn.addEventListener('click', openModal);
        saveBtn.onmouseenter = () => { saveBtn.style.background = '#176b45'; saveBtn.style.color = 'white'; saveBtn.style.boxShadow = '0 4px 12px rgba(23,107,69,0.25)'; };
        saveBtn.onmouseleave = () => { saveBtn.style.background = 'white'; saveBtn.style.color = '#176b45'; saveBtn.style.boxShadow = 'none'; };
        modalCloseX.addEventListener('click', () => closeModal(true));
        modalCloseX.onmouseenter = () => { modalCloseX.style.borderColor = 'var(--danger)'; modalCloseX.style.color = 'var(--danger)'; };
        modalCloseX.onmouseleave = () => { modalCloseX.style.borderColor = 'transparent'; modalCloseX.style.color = 'var(--text-muted)'; };
        modalCancelBtn.addEventListener('click', () => closeModal(true));
        profileModal.addEventListener('click', e => { if (e.target === profileModal) closeModal(true); });

        modalSaveBtn.addEventListener('click', () => {
            const data = {};
            Object.entries(fields).forEach(([key, id]) => { const el = document.getElementById(id); if (el) data[key] = el.value; });
            data.name = data.name || user.name;
            const updated = updateUser(data);
            // update nav name only (don't touch avatar — photo may be set)
            const navNameEl = document.querySelector('.sidebar-user .user-info strong');
            if (navNameEl) navNameEl.textContent = updated.name;
            document.getElementById('profile-fullname').textContent = updated.name;
            document.getElementById('profile-email').textContent = updated.email || user.email;
            if (!localStorage.getItem('mis_user_photo')) {
                const initials = updated.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
                avatarEl.textContent = initials;
                const navAvatar = document.getElementById('nav-avatar');
                if (navAvatar) navAvatar.textContent = initials;
            }
            if (updated.profileComplete) {
                badge.textContent = '✅ Complete';
                badge.style.background = 'rgba(46,125,85,0.1)';
                badge.style.color = 'var(--success)';
            }
            if (updated.phone) document.getElementById('contact-phone').textContent = updated.phone;
            if (updated.address) document.getElementById('contact-address').textContent = updated.address;
            const completionFields = ['name', 'email', 'gender', 'phone', 'address', 'dob', 'civil', 'occupation', 'arabicName', 'membership'];
            const filled2 = completionFields.filter(k => updated[k] && String(updated[k]).trim() !== '').length;
            const pct2 = Math.round(filled2 / completionFields.length * 100);
            document.getElementById('completion-pct').textContent = pct2 + '%';
            document.getElementById('completion-bar').style.width = pct2 + '%';
            document.getElementById('completion-bar').style.background = pct2 === 100 ? 'var(--success)' : pct2 >= 50 ? 'var(--warning)' : 'var(--danger)';
            closeModal(false);

            // Check if profile just became complete
            if (pct2 === 100 && pct < 100) {
                showToast('🎉 Your profile has been successfully completed. You now have full access to all available departments.', '#176b45');
            } else {
                showToast('\u2705 Profile saved successfully!', '#2f8a60');
            }

            // Re-evaluate sidebar locks in real-time
            if (typeof window._afterProfileSave === 'function') {
                window._afterProfileSave(pct2);
            }
        });

        function showToast(msg, bg) {
            const toast = document.createElement('div');
            toast.textContent = msg;
            toast.style.cssText = 'position:fixed;top:24px;right:24px;background:' + bg + ';color:white;padding:14px 22px;border-radius:10px;z-index:9999;font-weight:600;font-family:Source Sans 3,sans-serif;font-size:0.9rem;box-shadow:0 4px 16px rgba(0,0,0,0.18);';
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        // ── Activity table ──
        const activityTbody = document.getElementById('activity-tbody');
        const activityFilter = document.getElementById('activity-filter');
        const activityCount = document.getElementById('activity-count');

        function renderActivity(filter) {
            const list = filter === 'all' ? reqs : reqs.filter(r => r.status === filter);
            activityCount.textContent = list.length + ' record' + (list.length !== 1 ? 's' : '');
            activityTbody.innerHTML = list.length
                ? list.map(r => {
                    const type = r.type.replace(/_/g, ' ').replace(/\b\w/g, c => c.toUpperCase());
                    const updated = r.updatedAt || r.date;
                    return `<tr>
            <td class="td-id">#${r.id}</td>
            <td>${type}</td>
            <td>${r.date}</td>
            <td><span class="badge-status badge-${r.status}">${r.status}</span></td>
            <td style="color:var(--text-muted);">${updated}</td>
          </tr>`;
                }).join('')
                : `<tr><td colspan="5" style="text-align:center;padding:28px;color:var(--text-muted);">No activity records found.</td></tr>`;
        }

        renderActivity('all');
        activityFilter.addEventListener('change', () => renderActivity(activityFilter.value));

        const viewActivityBtn = document.getElementById('view-activity-btn');
        const activitySection = document.getElementById('activity-section');
        let activityVisible = false;

        viewActivityBtn.addEventListener('click', () => {
            activityVisible = !activityVisible;
            if (activityVisible) {
                activitySection.style.display = 'block';
                viewActivityBtn.textContent = '📊 Hide Activity';
                viewActivityBtn.style.borderColor = 'var(--primary)';
                viewActivityBtn.style.color = 'var(--primary)';
                viewActivityBtn.style.background = 'rgba(23,107,69,0.04)';
                setTimeout(() => {
                    activitySection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 50);
            } else {
                activitySection.style.display = 'none';
                viewActivityBtn.textContent = '📊 View Activity';
                viewActivityBtn.style.borderColor = 'var(--border)';
                viewActivityBtn.style.color = 'var(--text-muted)';
                viewActivityBtn.style.background = 'white';
            }
        });

        // Hover effect for View Activity button
        viewActivityBtn.addEventListener('mouseenter', () => {
            if (!activityVisible) {
                viewActivityBtn.style.borderColor = 'var(--primary)';
                viewActivityBtn.style.color = 'var(--primary)';
                viewActivityBtn.style.background = 'rgba(23,107,69,0.04)';
            }
        });
        viewActivityBtn.addEventListener('mouseleave', () => {
            if (!activityVisible) {
                viewActivityBtn.style.borderColor = 'var(--border)';
                viewActivityBtn.style.color = 'var(--text-muted)';
                viewActivityBtn.style.background = 'white';
            }
        });

        // ── Sidebar collapse ──
        const sidebar = document.getElementById('sidebar');
        document.getElementById('sidebar-toggle').addEventListener('click', () => sidebar.classList.toggle('collapsed'));

        // ── Lock/Unlock service dropdowns based on profile completion ──
        const isProfile = pct === 100;
        function applyDropdownLocks() {
            const wraps = ['damayan-wrap', 'dawah-wrap', 'apartment-wrap'];
            wraps.forEach(id => {
                const wrap = document.getElementById(id);
                if (!wrap) return;
                if (isProfile) {
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
                // If locked, show toast prompting to complete profile
                if (wrap && wrap.classList.contains('locked')) {
                    showToast('🔒 Please complete your profile above to unlock this service.', '#c79a2b');
                    // Scroll to the profile completion bar
                    document.getElementById('completion-bar').scrollIntoView({ behavior: 'smooth', block: 'center' });
                    return;
                }
                if (sidebar && sidebar.classList.contains('collapsed')) {
                    const href = trigger.getAttribute('data-href');
                    if (href) window.location.href = href;
                    return;
                }
                const isOpen = menu.classList.contains('open');
                document.querySelectorAll('.nav-dropdown').forEach(m => m.classList.remove('open'));
                document.querySelectorAll('.nav-dropdown-trigger').forEach(btn => btn.classList.remove('open'));
                if (!isOpen) { menu.classList.add('open'); trigger.classList.add('open'); }
            });
        }
        initDropdown('damayan-trigger', 'damayan-menu', 'damayan-wrap');
        initDropdown('dawah-trigger', 'dawah-menu', 'dawah-wrap');
        initDropdown('apartment-trigger', 'apartment-menu', 'apartment-wrap');

        // ── Re-check locks after profile save ──
        const origSaveHandler = modalSaveBtn.onclick;
        const origClickListeners = modalSaveBtn._origClick;
        // We patch into the save flow to re-check locks after a successful save
        const _origMSBClick = modalSaveBtn.addEventListener;
        // Override: after profile save, re-evaluate locks
        window._afterProfileSave = function (newPct) {
            const wraps = ['damayan-wrap', 'dawah-wrap', 'apartment-wrap'];
            wraps.forEach(id => {
                const wrap = document.getElementById(id);
                if (!wrap) return;
                if (newPct === 100) {
                    wrap.classList.remove('locked');
                } else {
                    wrap.classList.add('locked');
                }
            });
        };

        // Notification Badge System
        (function() {
            const raw = localStorage.getItem('mis_notifications');
            const notifs = raw ? JSON.parse(raw) : [];
            const unread = notifs.filter(n => n.tenantId === user.id && !n.read).length;
            if (unread > 0) {
                document.querySelectorAll('.nav-item').forEach(link => {
                    const label = link.querySelector('.nav-item-label');
                    if (label && label.textContent.trim() === 'Notifications') {
                        if (!link.querySelector('.notif-dot')) {
                            const dot = document.createElement('span');
                            dot.className = 'notif-dot';
                            dot.textContent = unread;
                            link.style.position = 'relative';
                            link.appendChild(dot);
                        }
                    }
                });
            }
        })();
    </script>
</body>

</html>