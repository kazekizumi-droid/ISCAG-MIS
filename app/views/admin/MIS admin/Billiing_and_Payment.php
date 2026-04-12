<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ISCAG MIS — Billing & Payments</title>
  <meta name="description" content="Manage tenant billing, payments, and financial records" />
  <link rel="stylesheet" href="../../css/admin-shared.css" />
  <style>
    /* ── Tab navigation ── */
    .tab-nav {
      display: flex;
      gap: 0;
      border-bottom: 2px solid var(--border);
      margin-bottom: 20px;
    }

    .tab-btn {
      padding: 10px 20px;
      background: none;
      border: none;
      border-bottom: 3px solid transparent;
      font-family: inherit;
      font-size: 0.85rem;
      font-weight: 600;
      color: var(--text-muted);
      cursor: pointer;
      transition: all 0.18s;
      margin-bottom: -2px;
    }

    .tab-btn:hover {
      color: var(--primary);
    }

    .tab-btn.active {
      color: var(--primary-dark);
      border-bottom-color: var(--primary);
    }

    .tab-btn .tab-count {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      min-width: 20px;
      height: 20px;
      border-radius: 10px;
      font-size: 0.68rem;
      font-weight: 700;
      margin-left: 6px;
      padding: 0 6px;
    }

    .tab-btn .tab-count.pending {
      background: rgba(199, 154, 43, 0.15);
      color: var(--warning);
    }

    .tab-btn .tab-count.overdue {
      background: rgba(139, 46, 46, 0.12);
      color: var(--danger);
    }

    .tab-btn .tab-count.paid {
      background: rgba(47, 138, 96, 0.12);
      color: var(--success);
    }

    .tab-panel {
      display: none;
    }

    .tab-panel.active {
      display: block;
    }

    /* ── Empty state ── */
    .empty-state {
      text-align: center;
      padding: 40px 20px;
      color: var(--text-muted);
    }

    .empty-state svg {
      width: 48px;
      height: 48px;
      fill: var(--border);
      margin-bottom: 12px;
    }

    .empty-state h4 {
      font-family: 'Lora', serif;
      font-size: 1rem;
      font-weight: 700;
      color: var(--text-muted);
      margin: 0 0 6px;
    }

    .empty-state p {
      font-size: 0.82rem;
      margin: 0;
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
          <img src="logo.jpg" style="max-width:48px;max-height:48px;border-radius:8px;" alt="ISCAG" />
          <div class="brand-text"><strong>ISCAG MIS</strong><span>Admin Portal</span></div>
        </div>
      </div>
      <div class="sidebar-user">
        <div class="user-avatar" id="nav-avatar" style="background:var(--accent);">AD</div>
        <div class="user-info"><strong id="nav-name">MIS Admin</strong><span>System Administrator</span></div>
      </div>
      <nav class="sidebar-nav">
        <div class="nav-section-label">Overview</div>
        <a href="Admin_Dashboard.html" class="nav-item" data-tooltip="Dashboard">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          <span class="nav-item-label">Dashboard</span>
        </a>
        <a href="admin_profile.html" class="nav-item" data-tooltip="Profile">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z" />
          </svg>
          <span class="nav-item-label">My Profile</span>
        </a>
        <a href="records/records.html" class="nav-item" data-tooltip="Users">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z" />
          </svg>
          <span class="nav-item-label">User Management</span>
        </a>

        <div class="nav-section-label">Verification</div>
        <a href="admin_tenant_confirmation.html" class="nav-item" data-tooltip="Verify">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z" />
          </svg>
          <span class="nav-item-label">Tenant Verification</span>
        </a>

        <div class="nav-section-label">Reports</div>
        <a href="admin_reports.html" class="nav-item" data-tooltip="Reports">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 7V3.5L18.5 9H13zM9 13h6v2H9v-2zm6 4H9v2h6v-2z" />
          </svg>
          <span class="nav-item-label">Tenant Reports</span>
        </a>
        <a href="tenant_timeline.html" class="nav-item" data-tooltip="Timeline">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
          </svg>
          <span class="nav-item-label">Activity Timeline</span>
        </a>

        <div class="nav-section-label">Department Records</div>
        <a href="records/apartment_records.html" class="nav-item" data-tooltip="Apartment">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
          </svg>
          <span class="nav-item-label">Apartment Records</span>
        </a>
        <a href="records/daawah_records.html" class="nav-item" data-tooltip="Da'wah">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
          </svg>
          <span class="nav-item-label">Da'wah Records</span>
        </a>
        <a href="records/damayan_records.html" class="nav-item" data-tooltip="Damayan">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
          </svg>
          <span class="nav-item-label">Damayan Records</span>
        </a>

        <div class="nav-section-label">Finance</div>
        <a href="Billiing_and_Payment.html" class="nav-item active" data-tooltip="Billing">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
          </svg>
          <span class="nav-item-label">Billing & Payments</span>
        </a>

        <div class="nav-section-label">System</div>
        <a href="Admin_Dashboard.html#activity" class="nav-item" data-tooltip="Logs"
          onclick="scrollToSection('activity-section')">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
          </svg>
          <span class="nav-item-label">Activity Log</span>
        </a>
        <a href="Admin_Dashboard.html#staff" class="nav-item" data-tooltip="Staff"
          onclick="scrollToSection('staff-section')">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path
              d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z" />
          </svg>
          <span class="nav-item-label">Staff Management</span>
        </a>
      </nav>
      <div class="sidebar-footer">
        <a href="../homepage/login.html" class="nav-item" data-tooltip="Logout">
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
          <div class="top-bar-title">Billing & Payments</div>
          <div class="top-bar-subtitle">Manage tenant invoices, track payments, and follow up on overdue balances</div>
        </div>
        <div class="top-bar-actions">
          <button class="btn-topbar primary" id="btn-generate-invoice">
            <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:currentColor;margin-right:6px;">
              <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z" />
            </svg>
            Generate Invoice
          </button>
        </div>
      </div>

      <div class="page-body">

        <!-- STATS ROW -->
        <div class="stats-row" id="stats-row">
          <div class="stat-card">
            <div class="stat-icon gold">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
              </svg>
            </div>
            <div>
              <div class="stat-value" id="stat-pending">0</div>
              <div class="stat-label">Pending Payments</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon red">
              <svg viewBox="0 0 24 24">
                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" />
              </svg>
            </div>
            <div>
              <div class="stat-value" id="stat-overdue">0</div>
              <div class="stat-label">Overdue Invoices</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon green">
              <svg viewBox="0 0 24 24">
                <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
              </svg>
            </div>
            <div>
              <div class="stat-value" id="stat-paid">0</div>
              <div class="stat-label">Paid This Month</div>
            </div>
          </div>
          <div class="stat-card">
            <div class="stat-icon blue">
              <svg viewBox="0 0 24 24">
                <path
                  d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
              </svg>
            </div>
            <div>
              <div class="stat-value" id="stat-revenue" style="font-size:1.1rem;">₱0</div>
              <div class="stat-label">Total Revenue</div>
            </div>
          </div>
        </div>

        <!-- TAB NAV -->
        <div class="tab-nav">
          <button class="tab-btn active" onclick="switchTab('all')">
            <svg viewBox="0 0 24 24"
              style="width:14px;height:14px;fill:currentColor;vertical-align:middle;margin-right:4px;">
              <path
                d="M4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6zm16-4H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-1 9H9V9h10v2zm-4 4H9v-2h6v2zm4-8H9V5h10v2z" />
            </svg>
            All Invoices
          </button>
          <button class="tab-btn" onclick="switchTab('pending')">
            <svg viewBox="0 0 24 24"
              style="width:14px;height:14px;fill:currentColor;vertical-align:middle;margin-right:4px;">
              <path
                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-6h2v6zm0-8h-2V7h2v2z" />
            </svg>
            Pending
            <span class="tab-count pending" id="tab-pending-count">0</span>
          </button>
          <button class="tab-btn" onclick="switchTab('overdue')">
            <svg viewBox="0 0 24 24"
              style="width:14px;height:14px;fill:currentColor;vertical-align:middle;margin-right:4px;">
              <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z" />
            </svg>
            Overdue
            <span class="tab-count overdue" id="tab-overdue-count">0</span>
          </button>
          <button class="tab-btn" onclick="switchTab('paid')">
            <svg viewBox="0 0 24 24"
              style="width:14px;height:14px;fill:currentColor;vertical-align:middle;margin-right:4px;">
              <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z" />
            </svg>
            Paid
          </button>
        </div>

        <div class="filter-bar" style="margin-bottom:20px;">
          <input type="text" class="search-input" id="search-input" placeholder="Search by Invoice ID or Tenant..." />
          <select class="filter-select" id="filter-month">
            <option value="">All Months</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
          </select>
          <select class="filter-select" id="filter-year">
            <option value="2026">2026</option>
            <option value="2025">2025</option>
          </select>
        </div>

        <!-- ALL TAB -->
        <div class="tab-panel active" id="tab-all">
          <div class="section-card">
            <div class="section-card-body" style="padding:0;">
              <div class="table-wrapper">
                <table class="mis-table">
                  <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Tenant Name</th>
                      <th>Unit</th>
                      <th>Amount</th>
                      <th>Due Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="all-tbody"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- PENDING TAB -->
        <div class="tab-panel" id="tab-pending">
          <div class="section-card">
            <div class="section-card-body" style="padding:0;">
              <div class="table-wrapper">
                <table class="mis-table">
                  <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Tenant Name</th>
                      <th>Unit</th>
                      <th>Amount</th>
                      <th>Due Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="pending-tbody"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- OVERDUE TAB -->
        <div class="tab-panel" id="tab-overdue">
          <div class="section-card">
            <div class="section-card-body" style="padding:0;">
              <div class="table-wrapper">
                <table class="mis-table">
                  <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Tenant Name</th>
                      <th>Unit</th>
                      <th>Amount</th>
                      <th>Due Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="overdue-tbody"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- PAID TAB -->
        <div class="tab-panel" id="tab-paid">
          <div class="section-card">
            <div class="section-card-body" style="padding:0;">
              <div class="table-wrapper">
                <table class="mis-table">
                  <thead>
                    <tr>
                      <th>Invoice ID</th>
                      <th>Tenant Name</th>
                      <th>Unit</th>
                      <th>Amount</th>
                      <th>Due Date</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody id="paid-tbody"></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="../../JS/admin-shared.js"></script>
  <script>
    // ══ INIT ══
    initAdminData();
    setCurrentRole(ROLES.MIS_ADMIN);
    loadUserNav();
    initSidebar();

    // Generate mock billing data if it doesn't exist
    function initBillingData() {
      if (!localStorage.getItem('mis_billing_records')) {
        const mockBilling = [
          { id: 'INV-2026-001', tenantId: 'USR-001', tenantName: 'Muhammad Usman', unit: 'APT-A1', amount: 3500, dueDate: '2026-04-10', status: 'pending', month: 4, year: 2026 },
          { id: 'INV-2026-002', tenantId: 'USR-002', tenantName: 'Aisha Fatima', unit: 'APT-B1', amount: 7500, dueDate: '2026-04-05', status: 'overdue', month: 4, year: 2026 },
          { id: 'INV-2026-003', tenantId: 'USR-003', tenantName: 'Omar Khan', unit: 'APT-A2', amount: 5000, dueDate: '2026-03-05', status: 'paid', month: 3, year: 2026 },
          { id: 'INV-2026-004', tenantId: 'USR-001', tenantName: 'Muhammad Usman', unit: 'APT-A1', amount: 3500, dueDate: '2026-03-10', status: 'paid', month: 3, year: 2026 }
        ];
        localStorage.setItem('mis_billing_records', JSON.stringify(mockBilling));
      }
    }
    initBillingData();

    function getBillingRecords() {
      return JSON.parse(localStorage.getItem('mis_billing_records') || '[]');
    }

    // Tab switching
    function switchTab(tabId) {
      document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
      document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
      event.currentTarget.classList.add('active');
      document.getElementById('tab-' + tabId).classList.add('active');
    }

    function statusBadge(status) {
      if (status === 'paid') return '<span class="badge-status badge-approved">Paid</span>';
      if (status === 'overdue') return '<span class="badge-status badge-rejected">Overdue</span>';
      if (status === 'pending') return '<span class="badge-status badge-pending">Pending</span>';
      return '<span class="badge-status">' + status + '</span>';
    }

    // ══ RENDER ══
    function renderAll() {
      const records = getBillingRecords();
      let pending = records.filter(r => r.status === 'pending');
      let overdue = records.filter(r => r.status === 'overdue');
      let paid = records.filter(r => r.status === 'paid');

      // Filter handling
      const term = document.getElementById('search-input').value.toLowerCase();
      const m = document.getElementById('filter-month').value;
      const y = document.getElementById('filter-year').value;

      let filtered = records.filter(r => {
        if (term && !r.tenantName.toLowerCase().includes(term) && !r.id.toLowerCase().includes(term)) return false;
        if (m && r.month != m) return false;
        if (y && r.year != y) return false;
        return true;
      });

      // Update filtered arrays
      pending = filtered.filter(r => r.status === 'pending');
      overdue = filtered.filter(r => r.status === 'overdue');
      paid = filtered.filter(r => r.status === 'paid');

      // Stats
      document.getElementById('stat-pending').textContent = records.filter(r => r.status === 'pending').length;
      document.getElementById('stat-overdue').textContent = records.filter(r => r.status === 'overdue').length;

      const paidThisMonth = records.filter(r => r.status === 'paid' && r.month == (new Date().getMonth() + 1));
      document.getElementById('stat-paid').textContent = paidThisMonth.length;

      const totalRev = paidThisMonth.reduce((sum, r) => sum + r.amount, 0);
      document.getElementById('stat-revenue').textContent = '₱' + totalRev.toLocaleString();

      // Tab counts
      document.getElementById('tab-pending-count').textContent = records.filter(r => r.status === 'pending').length;
      document.getElementById('tab-overdue-count').textContent = records.filter(r => r.status === 'overdue').length;

      function renderTbody(tbodyId, dataList, emptyMsg) {
        const tbody = document.getElementById(tbodyId);
        if (dataList.length === 0) {
          tbody.innerHTML = '<tr><td colspan="7"><div class="empty-state"><svg viewBox="0 0 24 24"><path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"/></svg><h4>' + emptyMsg + '</h4><p>No records found.</p></div></td></tr>';
        } else {
          tbody.innerHTML = dataList.map(r => `
                <tr>
                  <td class="td-id">${r.id}</td>
                  <td style="font-weight:600;">${r.tenantName}</td>
                  <td>${r.unit}</td>
                  <td style="font-weight:700;">₱${r.amount.toLocaleString()}</td>
                  <td>${r.dueDate}</td>
                  <td>${statusBadge(r.status)}</td>
                  <td>
                    <div class="actions-cell">
                      <button class="btn-action btn-view" title="View Details">
                        <svg viewBox="0 0 24 24"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                      </button>
                      ${r.status === 'overdue' ? `<button class="btn-action btn-view" style="color:var(--danger);" title="Send Reminder"><svg viewBox="0 0 24 24"><path d="M22 12c0-5.52-4.48-10-10-10S2 6.48 2 12s4.48 10 10 10 10-4.48 10-10zm-11 5H9v-2h2v2zm0-4H9V7h2v6z"/></svg></button>` : ''}
                      ${r.status !== 'paid' ? `<button class="btn-action btn-view" style="color:var(--success);" title="Mark Paid"><svg viewBox="0 0 24 24"><path d="M9 16.2L4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4L9 16.2z"/></svg></button>` : ''}
                    </div>
                  </td>
                </tr>
              `).join('');
        }
      }

      renderTbody('all-tbody', filtered, 'No Invoices');
      renderTbody('pending-tbody', pending, 'No Pending Payments');
      renderTbody('overdue-tbody', overdue, 'No Overdue Invoices');
      renderTbody('paid-tbody', paid, 'No Paid Invoices');
    }

    document.getElementById('search-input').addEventListener('input', renderAll);
    document.getElementById('filter-month').addEventListener('change', renderAll);
    document.getElementById('filter-year').addEventListener('change', renderAll);

    renderAll();
  </script>
</body>

</html>