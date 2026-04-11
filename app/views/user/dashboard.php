<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>MIS — User Dashboard</title>
  <link rel="stylesheet" href="<?= asset('css/user-shared.css') ?>" />
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
          <img src="<?= asset('assets/logo.jpg') ?>" class="w-100 h-auto" style="max-width: 60px; max-height: 60px; border-radius: 10px;" alt="ISCAG Logo" />
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
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z" />
          </svg>
          <span class="nav-item-label">My Dashboard</span>
        </a>

        <div class="nav-section-label">Services</div>
        <a href="<?= url('/user/burial') ?>" class="nav-item">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z" />
          </svg>
          <span class="nav-item-label">Burial Service</span>
        </a>
        <a href="<?= url('/user/counseling-male') ?>" class="nav-item">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
          </svg>
          <span class="nav-item-label">Male Counseling</span>
        </a>
        <a href="<?= url('/user/counseling-female') ?>" class="nav-item">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
          </svg>
          <span class="nav-item-label">Female Counseling</span>
        </a>
        <a href="<?= url('/user/apartment') ?>" class="nav-item">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4z" />
          </svg>
          <span class="nav-item-label">Apartment Application</span>
        </a>
      </nav>
      <div class="sidebar-footer">
        <a href="<?= url('/logout') ?>" class="nav-item">
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
          <span style="font-size:0.8rem;color:var(--text-muted);"><?= date('l, F d, Y') ?></span>
        </div>
      </div>

      <div class="page-body">

        <!-- WELCOME BANNER -->
        <div class="welcome-banner">
          <h3>Assalamu Alaikum, <?= htmlspecialchars(explode(' ', $_SESSION['name'] ?? 'User')[0]) ?>!</h3>
          <p>Welcome to the ISCAG Management Information System. Select a service below to submit a request.</p>
        </div>

        <!-- SERVICE CARDS -->
        <h6
          style="font-family:'Lora',serif;font-size:0.9rem;font-weight:700;color:var(--text-muted);text-transform:uppercase;letter-spacing:0.08em;margin-bottom:16px;">
          Available Services</h6>

        <div class="service-grid">
          <a href="<?= url('/user/burial') ?>" class="service-card">
            <div class="service-card-icon">
              <svg viewBox="0 0 24 24">
                <path
                  d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
              </svg>
            </div>
            <div class="service-card-body">
              <h5>Burial Service Request</h5>
              <p>Submit a formal request for burial services for the deceased. Fill in the necessary details about the deceased, family contact, and burial preferences.</p>
              <div class="btn-go">
                Request Service
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                </svg>
              </div>
            </div>
          </a>

          <a href="<?= url('/user/counseling-male') ?>" class="service-card">
            <div class="service-card-icon teal">
              <svg viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" />
              </svg>
            </div>
            <div class="service-card-body">
              <h5>Male Counseling Request</h5>
              <p>Request a confidential counseling session with our male counselors for personal, family, or spiritual matters. Schedule your preferred appointment time.</p>
              <div class="btn-go">
                Request Service
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                </svg>
              </div>
            </div>
          </a>

          <a href="<?= url('/user/counseling-female') ?>" class="service-card">
            <div class="service-card-icon gold">
              <svg viewBox="0 0 24 24">
                <path d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z" />
              </svg>
            </div>
            <div class="service-card-body">
              <h5>Female Counseling Request</h5>
              <p>Request a confidential session with our female counselors. All sessions are conducted with utmost privacy and respect for Islamic values.</p>
              <div class="btn-go">
                Request Service
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                </svg>
              </div>
            </div>
          </a>

          <a href="<?= url('/user/apartment') ?>" class="service-card">
            <div class="service-card-icon green">
              <svg viewBox="0 0 24 24">
                <path
                  d="M17 11V3H7v4H3v14h8v-4h2v4h8V11h-4zm-8 4H7v-2h2v2zm0-4H7V9h2v2zm0-4H7V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2zm0-4h-2V5h2v2zm4 8h-2v-2h2v2zm0-4h-2V9h2v2z" />
              </svg>
            </div>
            <div class="service-card-body">
              <h5>Apartment Application</h5>
              <p>Apply for a housing unit in the ISCAG apartment complex. Submit your family details and preferred unit type for review by the Apartment Management.</p>
              <div class="btn-go">
                Apply Now
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                </svg>
              </div>
            </div>
          </a>

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'Tenant'): ?>
          <a href="<?= url('/user/parking') ?>" class="service-card">
            <div class="service-card-icon" style="background: #e0b84a;">
              <svg viewBox="0 0 24 24" fill="white">
                <path d="M18.92 6.01C18.72 5.42 18.16 5 17.5 5h-11c-.66 0-1.21.42-1.42 1.01L3 12v8c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-1h12v1c0 .55.45 1 1 1h1c.55 0 1-.45 1-1v-8l-2.08-5.99zM6.5 16c-.83 0-1.5-.67-1.5-1.5S5.67 13 6.5 13s1.5.67 1.5 1.5S7.33 16 6.5 16zm11 0c-.83 0-1.5-.67-1.5-1.5s.67-1.5 1.5-1.5 1.5.67 1.5 1.5-.67 1.5-1.5 1.5zM5 11l1.5-4.5h11L19 11H5z" />
              </svg>
            </div>
            <div class="service-card-body">
              <h5>Parking Application</h5>
              <p>Request a secure parking slot within the complex. Available exclusively for verified ISCAG tenants.</p>
              <div class="btn-go">
                Apply Now
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12 4l-1.41 1.41L16.17 11H4v2h12.17l-5.58 5.59L12 20l8-8z" />
                </svg>
              </div>
            </div>
          </a>
          <?php endif; ?>
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
                  <?php if (isset($recentRequests) && count($recentRequests) > 0): ?>
                    <?php foreach ($recentRequests as $req): ?>
                      <tr>
                        <td class="td-id">#<?= htmlspecialchars($req['id']) ?></td>
                        <td>
                          <?php if ($req['type'] === 'Burial Service'): ?>
                            <span class="badge-status badge-active"><?= htmlspecialchars($req['type']) ?></span>
                          <?php elseif (strpos($req['type'], 'Counseling') !== false): ?>
                            <span class="badge PHP-styled-badge" style="background:rgba(30,107,122,0.1);color:#1e6b7a;"><?= htmlspecialchars($req['type']) ?></span>
                          <?php else: ?>
                            <span class="badge-status badge-approved" style="background:rgba(46,125,85,0.1);color:var(--success);"><?= htmlspecialchars($req['type']) ?></span>
                          <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($req['date_submitted']) ?></td>
                        <td><?= htmlspecialchars($req['details']) ?></td>
                        <td>
                          <?php if ($req['status'] === 'Pending'): ?>
                            <span class="badge-status badge-pending">Pending</span>
                          <?php elseif ($req['status'] === 'Approved'): ?>
                            <span class="badge-status badge-approved">Approved</span>
                          <?php else: ?>
                            <span class="badge-status badge-rejected">Rejected</span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td class="td-id">#BUR-001</td>
                      <td><span class="badge-status badge-active">Burial Service</span></td>
                      <td>July 13, 2026</td>
                      <td>Ahmad ibn Yusuf — Section A, Block 3</td>
                      <td><span class="badge-status badge-pending">Pending</span></td>
                    </tr>
                    <tr>
                      <td class="td-id">#MC-002</td>
                      <td><span class="badge-status" style="background:rgba(30,107,122,0.1);color:#1e6b7a;padding: 3px 12px;border-radius:20px;font-size:0.68rem;font-weight:700;text-transform:uppercase;">Male Counseling</span></td>
                      <td>July 11, 2026</td>
                      <td>Preferred: July 16, 2026 – 2:00 PM</td>
                      <td><span class="badge-status badge-approved">Approved</span></td>
                    </tr>
                    <tr>
                      <td class="td-id">#APT-001</td>
                      <td><span class="badge-status" style="background:rgba(46,125,85,0.1);color:var(--success);padding: 3px 12px;border-radius:20px;font-size:0.68rem;font-weight:700;text-transform:uppercase;">Apartment</span></td>
                      <td>March 9, 2026</td>
                      <td>Unit Type: 1-Bedroom</td>
                      <td><span class="badge-status badge-pending">Pending</span></td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

  <script src="<?= asset('js/user-shared.js') ?>"></script>
</body>

</html>
