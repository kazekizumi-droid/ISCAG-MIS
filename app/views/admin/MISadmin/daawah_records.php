<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>ISCAG MIS — Da'wah Records</title>
  <link rel="stylesheet" href="<?= asset('css/admin-shared.css') ?>" />
</head>
<body>
<div class="app-wrapper">
  <aside class="sidebar" id="sidebar">
    <button class="sidebar-toggle" id="sidebar-toggle" title="Toggle sidebar"><svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg></button>
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
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>
        <span class="nav-item-label">Dashboard</span>
      </a>
      <a href="../admin_profile.php" class="nav-item" data-tooltip="Profile">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
        <span class="nav-item-label">My Profile</span>
      </a>
      <a href="records.php" class="nav-item" data-tooltip="Users">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3z"/></svg>
        <span class="nav-item-label">User Management</span>
      </a>
      <div class="nav-section-label">Department Records</div>
      <a href="apartment_records.php" class="nav-item" data-tooltip="Apartment">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z"/></svg>
        <span class="nav-item-label">Apartment Records</span>
      </a>
      <a href="daawah_records.php" class="nav-item active" data-tooltip="Da'wah">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>
        <span class="nav-item-label">Da'wah Records</span>
      </a>
      <a href="damayan_records.php" class="nav-item" data-tooltip="Damayan">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"/></svg>
        <span class="nav-item-label">Damayan Records</span>
      </a>
    </nav>
    <div class="sidebar-footer">
      <a href="<?= url('/login') ?>" class="nav-item" data-tooltip="Logout">
        <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
        <span class="nav-item-label">Logout</span>
      </a>
    </div>
  </aside>

  <div class="main-content">
    <div class="top-bar">
      <div>
        <div class="top-bar-title">Da'wah Records</div>
        <div class="top-bar-subtitle">Manage counseling, Islamic education, and marriage service requests</div>
      </div>
      <div class="top-bar-actions"><a href="<?= url('/user/dashboard') ?>" class="btn-topbar">← Dashboard</a></div>
    </div>
    <div class="page-body">
      <div class="breadcrumb-bar">
        <a href="<?= url('/user/dashboard') ?>">MIS Admin</a><span class="sep">›</span><span class="current">Da'wah Records</span>
      </div>

      <!-- STATS -->
      <div class="stats-row">
        <div class="stat-card">
          <div class="stat-icon green"><svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg></div>
          <div><div class="stat-value" id="s-counsel">0</div><div class="stat-label">Counseling</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon teal"><svg viewBox="0 0 24 24"><path d="M5 13.18v4L12 21l7-3.82v-4L12 17l-7-3.82zM12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/></svg></div>
          <div><div class="stat-value" id="s-edu">0</div><div class="stat-label">Education</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon" style="background:#c75a7a;"><svg viewBox="0 0 24 24"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg></div>
          <div><div class="stat-value" id="s-mar">0</div><div class="stat-label">Marriage</div></div>
        </div>
        <div class="stat-card">
          <div class="stat-icon gold"><svg viewBox="0 0 24 24"><path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2z"/></svg></div>
          <div><div class="stat-value" id="s-pending">0</div><div class="stat-label">Pending Total</div></div>
        </div>
      </div>

      <!-- FILTER -->
      <div class="filter-bar">
        <input type="text" class="search-input" id="search" placeholder="Search by name or ref #..." oninput="filterTable()" />
        <select class="filter-select" id="type-filter" onchange="filterTable()">
          <option value="all">All Services</option>
          <option value="counseling">Counseling</option>
          <option value="islamic_education">Islamic Education</option>
          <option value="marriage_service">Marriage</option>
        </select>
        <select class="filter-select" id="status-filter" onchange="filterTable()">
          <option value="all">All Status</option>
          <option value="pending">Pending</option>
          <option value="approved">Approved</option>
          <option value="scheduled">Scheduled</option>
          <option value="active">Active</option>
          <option value="completed">Completed</option>
        </select>
      </div>

      <!-- REQUEST TABLE -->
      <div class="section-card">
        <div class="section-card-header">
          <h6><svg viewBox="0 0 24 24"><path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/></svg>Da'wah Service Requests</h6>
          <span style="font-size:0.75rem;color:var(--text-muted);" id="req-count">0 records</span>
        </div>
        <div class="section-card-body" style="padding:0;">
          <div class="table-wrapper"><table class="mis-table">
            <thead><tr><th>Ref #</th><th>Name</th><th>Service Type</th><th>Date</th><th>Status</th><th>Actions</th></tr></thead>
            <tbody id="req-tbody"></tbody>
          </table></div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= asset('js/admin-shared.js') ?>"></script>
<script>
  initAdminData(); loadUserNav();
  const DAWAH_TYPES = ['counseling_female','counseling_male','islamic_education','marriage_service'];
  let allReqs = getRequests().filter(r => DAWAH_TYPES.includes(r.type));

  // Stats
  document.getElementById('s-counsel').textContent = allReqs.filter(r => r.type.includes('counseling')).length;
  document.getElementById('s-edu').textContent = allReqs.filter(r => r.type === 'islamic_education').length;
  document.getElementById('s-mar').textContent = allReqs.filter(r => r.type === 'marriage_service').length;
  document.getElementById('s-pending').textContent = allReqs.filter(r => r.status === 'pending').length;

  function renderTable(data) {
    document.getElementById('req-count').textContent = data.length + ' records';
    const tbody = document.getElementById('req-tbody');
    if (!data.length) { tbody.innerHTML = '<tr><td colspan="6" style="text-align:center;padding:28px;color:var(--text-muted);">No records found.</td></tr>'; return; }
    tbody.innerHTML = data.map(r => `<tr data-id="${r.id}" data-type="${r.type}" data-status="${r.status}" data-name="${(r.name||'').toLowerCase()}">
      <td class="td-id">${r.id}</td>
      <td style="font-weight:600;">${r.name || 'Unknown'}</td>
      <td>${typeLabel(r.type)}</td>
      <td>${formatDate(r.date)}</td>
      <td><span class="badge-status ${badgeClass(r.status)}">${statusLabel(r.status)}</span></td>
      <td class="actions-cell">
        <button class="btn-action btn-approve" onclick="approveReq('${r.id}')"><svg viewBox="0 0 24 24"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>Approve</button>
        <button class="btn-action btn-reject" onclick="rejectReq('${r.id}')"><svg viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>Reject</button>
      </td>
    </tr>`).join('');
  }
  renderTable(allReqs);

  function filterTable() {
    const search = document.getElementById('search').value.toLowerCase();
    const type = document.getElementById('type-filter').value;
    const status = document.getElementById('status-filter').value;
    let filtered = allReqs;
    if (search) filtered = filtered.filter(r => (r.name||'').toLowerCase().includes(search) || r.id.toLowerCase().includes(search));
    if (type !== 'all') filtered = filtered.filter(r => r.type.includes(type));
    if (status !== 'all') filtered = filtered.filter(r => r.status === status);
    renderTable(filtered);
  }

  function approveReq(id) {
    const all = getRequests(); const r = all.find(x => x.id === id);
    if (r) { r.status = 'approved'; r.updatedAt = new Date().toISOString().split('T')[0]; saveRequests(all); addActivityEntry('Request approved', id + ' approved by MIS Admin', 'MIS Admin', 'approve'); showToast('✅ ' + id + ' approved!', 'var(--success)'); allReqs = getRequests().filter(r => DAWAH_TYPES.includes(r.type)); filterTable(); }
  }
  function rejectReq(id) {
    const all = getRequests(); const r = all.find(x => x.id === id);
    if (r) { r.status = 'rejected'; r.updatedAt = new Date().toISOString().split('T')[0]; saveRequests(all); addActivityEntry('Request rejected', id + ' rejected by MIS Admin', 'MIS Admin', 'reject'); showToast('❌ ' + id + ' rejected.', 'var(--danger)'); allReqs = getRequests().filter(r => DAWAH_TYPES.includes(r.type)); filterTable(); }
  }

  initSidebar(); initDropdowns();
</script>
</body>
</html>
