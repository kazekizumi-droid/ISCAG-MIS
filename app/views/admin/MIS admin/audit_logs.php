<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ISCAG MIS — Data Audit Logs</title>
    <meta name="description" content="System tracking and audit logging" />
    <link rel="stylesheet" href="../../css/admin-shared.css" />
    <style>
        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .filter-input {
            flex: 1;
            padding: 10px 14px;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-family: inherit;
            font-size: 0.95rem;
        }

        .audit-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .audit-table th {
            background: #f8f9fa;
            padding: 12px 16px;
            text-align: left;
            font-weight: 700;
            color: var(--text-muted);
            text-transform: uppercase;
            font-size: 0.8rem;
        }

        .audit-table td {
            padding: 16px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }

        .audit-table tbody tr:hover {
            background: #fcfcfc;
        }

        .tag {
            padding: 4px 10px;
            border-radius: 4px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
        }

        .tag-login {
            background: rgba(47, 138, 96, 0.1);
            color: var(--success);
        }

        .tag-delete {
            background: rgba(220, 53, 69, 0.1);
            color: var(--danger);
        }

        .tag-update {
            background: rgba(199, 154, 43, 0.1);
            color: var(--warning);
        }

        .tag-create {
            background: rgba(23, 107, 69, 0.1);
            color: var(--primary);
        }

        .tag-billing {
            background: rgba(43, 110, 199, 0.1);
            color: #2b6ec7;
        }

        .log-details {
            color: var(--text-muted);
            font-size: 0.85rem;
            line-height: 1.5;
            margin-top: 4px;
        }

        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text-muted);
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
                    <div class="brand-text"><strong>ISCAG MIS</strong><span>Admin Portal</span></div>
                </div>
            </div>
            <div class="sidebar-user">
                <div class="user-avatar" id="nav-avatar" style="background:var(--accent);">AD</div>
                <div class="user-info"><strong id="nav-name">MIS Admin</strong><span>System Administrator</span></div>
            </div>
            <nav class="sidebar-nav">
                <div class="nav-section-label">Overview</div>
                <a href="admin_dashboard - Copy.html" class="nav-item">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
                    </svg>
                    <span class="nav-item-label">Dashboard</span>
                </a>

                <div class="nav-section-label">Finance</div>
                <a href="Billiing_and_Payment - Copy.html" class="nav-item">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z" />
                    </svg>
                    <span class="nav-item-label">Billing & Payments</span>
                </a>
                <a href="statement_of_account.html" class="nav-item">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 7V3.5L18.5 9H13zM9 13h6v2H9v-2zm6 4H9v2h6v-2z" />
                    </svg>
                    <span class="nav-item-label">Statement of Account</span>
                </a>

                <div class="nav-section-label">System</div>
                <a href="audit_logs.html" class="nav-item active">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
                    </svg>
                    <span class="nav-item-label">Data Audit Logs</span>
                </a>
            </nav>
            <div class="sidebar-footer">
                <a href="../../../homepage/login.html" class="nav-item">
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
                    <div class="top-bar-title">Data Audit Logs</div>
                    <div class="top-bar-subtitle">System-wide tracking for accountability and security</div>
                </div>
                <div class="top-bar-actions">
                    <button class="btn-topbar" onclick="downloadCSV()">
                        <svg viewBox="0 0 24 24" style="width:16px;height:16px;fill:currentColor;margin-right:6px;">
                            <path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z" />
                        </svg>
                        Export to CSV
                    </button>
                </div>
            </div>

            <div class="page-body">

                <div class="filter-bar">
                    <input type="text" id="search-input" class="filter-input"
                        placeholder="Search by user, action, or module..." onkeyup="renderLogs()" style="flex:2;" />
                    <select id="filter-module" class="filter-input" onchange="renderLogs()">
                        <option value="">All Modules</option>
                        <option value="USER">User Management</option>
                        <option value="BILLING">Billing</option>
                        <option value="DAMAYAN">Damayan</option>
                        <option value="DA'WAH">Da'wah</option>
                        <option value="APARTMENT">Apartment</option>
                    </select>
                    <input type="date" id="filter-date" class="filter-input" onchange="renderLogs()" />
                </div>

                <div class="section-card">
                    <div class="section-card-body" style="padding: 0;">
                        <div style="overflow-x:auto;">
                            <table class="audit-table">
                                <thead>
                                    <tr>
                                        <th>Timestamp</th>
                                        <th>User ID</th>
                                        <th>Module</th>
                                        <th>Action</th>
                                        <th>Details / Notes</th>
                                    </tr>
                                </thead>
                                <tbody id="logs-tbody">
                                    <!-- JS Injected -->
                                </tbody>
                            </table>
                        </div>
                        <div id="empty-state" class="empty-state" style="display:none;">
                            <svg viewBox="0 0 24 24"
                                style="width:48px;height:48px;fill:var(--border);margin-bottom:12px;">
                                <path
                                    d="M13 3c-4.97 0-9 4.03-9 9H1l3.89 3.89.07.14L9 12H6c0-3.87 3.13-7 7-7s7 3.13 7 7-3.13 7-7 7c-1.93 0-3.68-.79-4.94-2.06l-1.42 1.42C8.27 19.99 10.51 21 13 21c4.97 0 9-4.03 9-9s-4.03-9-9-9z" />
                            </svg>
                            <h4>No logs match your filter</h4>
                            <p>Try clearing your search or date filter to see more data.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="../../JS/admin-shared.js"></script>
    <script>
        initAdminData();
        initSidebar();

        // Generate mock audit logs if not present
        function loadMockLogs() {
            let logs = JSON.parse(localStorage.getItem('mis_audit_logs') || '[]');
            if (logs.length === 0) {
                logs = [
                    { admin_id: "MIS-ADMIN", module: "SYSTEM", action: "LOGIN", timestamp: new Date(Date.now() - 3600000).toISOString(), details: "Logged in via MIS Admin portal" },
                    { admin_id: "STAFF-APT", module: "BILLING", action: "UPDATE_PAYMENT", timestamp: new Date(Date.now() - 10000000).toISOString(), details: "Marked INV-2026-004 as PAID" },
                    { admin_id: "MIS-ADMIN", module: "USER", action: "DELETE_RECORD", timestamp: new Date(Date.now() - 86400000).toISOString(), details: "Deleted duplicate account for USR-009" },
                    { admin_id: "SYSTEM", module: "APARTMENT", action: "CREATE_APP", timestamp: new Date(Date.now() - 100000000).toISOString(), details: "Tenant submitted new application APT-REQ-02" },
                    { admin_id: "STAFF-DAWAH", module: "DA'WAH", action: "APPROVE_REQ", timestamp: new Date(Date.now() - 200000000).toISOString(), details: "Approved counseling request #FC-001" },
                ];
                localStorage.setItem('mis_audit_logs', JSON.stringify(logs));
            }
            return logs;
        }

        function formatTime(isoStr) {
            const d = new Date(isoStr);
            return d.toLocaleDateString() + ' ' + d.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' });
        }

        function getActionTag(action) {
            let a = action.toUpperCase();
            if (a.includes("LOGIN") || a.includes("APPROVE")) return `<span class="tag tag-login">${action}</span>`;
            if (a.includes("DELETE") || a.includes("REJECT") || a.includes("REMOVE")) return `<span class="tag tag-delete">${action}</span>`;
            if (a.includes("UPDATE") || a.includes("EDIT")) return `<span class="tag tag-update">${action}</span>`;
            if (a.includes("CREATE") || a.includes("SUBMIT") || a.includes("ADD")) return `<span class="tag tag-create">${action}</span>`;
            if (a.includes("PAYMENT") || a.includes("BILL")) return `<span class="tag tag-billing">${action}</span>`;
            return `<span class="tag" style="background:#e0e0e0;color:#333;">${action}</span>`;
        }

        let allLogs = loadMockLogs();

        function renderLogs() {
            const tbody = document.getElementById('logs-tbody');
            const empty = document.getElementById('empty-state');

            const search = document.getElementById('search-input').value.toLowerCase();
            const module = document.getElementById('filter-module').value;
            const date = document.getElementById('filter-date').value;

            let filtered = allLogs.filter(log => {
                if (search && !(log.admin_id.toLowerCase().includes(search) || log.action.toLowerCase().includes(search) || (log.details && log.details.toLowerCase().includes(search)))) return false;
                if (module && log.module !== module) return false;
                if (date && !log.timestamp.startsWith(date)) return false;
                return true;
            });

            filtered.sort((a, b) => new Date(b.timestamp) - new Date(a.timestamp)); // Newest first

            tbody.innerHTML = '';
            if (filtered.length === 0) {
                empty.style.display = 'block';
            } else {
                empty.style.display = 'none';
                filtered.forEach(log => {
                    const tr = document.createElement('tr');
                    tr.innerHTML = `
            <td style="white-space:nowrap;color:var(--text-muted);font-size:0.85rem;">${formatTime(log.timestamp)}</td>
            <td style="font-weight:600;">${log.admin_id}</td>
            <td><strong>${log.module}</strong></td>
            <td>${getActionTag(log.action)}</td>
            <td><div class="log-details">${log.details || '--'}</div></td>
          `;
                    tbody.appendChild(tr);
                });
            }
        }

        function downloadCSV() {
            let csvContent = "data:text/csv;charset=utf-8,Timestamp,User ID,Module,Action,Details\n";
            allLogs.forEach(function (rowArray) {
                let row = [rowArray.timestamp, rowArray.admin_id, rowArray.module, rowArray.action, `"${rowArray.details || ''}"`];
                csvContent += row.join(",") + "\n";
            });
            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "audit_logs.csv");
            document.body.appendChild(link);
            link.click();
        }

        renderLogs();
    </script>
</body>

</html>