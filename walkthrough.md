# MVC Restructure — Walkthrough

## What Changed

Restructured the flat 8-file PHP project into a clean MVC architecture ready for backend development.

### New Directory Structure

```
Iscag/
├── .htaccess                    ← redirects to public/
├── app/
│   ├── controllers/
│   │   ├── Controller.php       ← base class with view() helper
│   │   ├── HomeController.php
│   │   ├── AuthController.php   ← login, register, forgot-pw, OTP, reset
│   │   ├── AdminController.php
│   │   └── UserController.php
│   ├── models/
│   │   ├── User.php
│   │   ├── BurialRequest.php
│   │   ├── CounselingRequest.php
│   │   └── ApartmentApplication.php
│   └── views/
│       ├── home/index.php
│       ├── auth/ (login, register, forgot-password, verify-otp, reset-password)
│       ├── admin/dashboard.php
│       └── user/dashboard.php
├── config/
│   └── database.php             ← PDO connection (fill in credentials)
├── public/
│   ├── .htaccess                ← rewrites to index.php
│   ├── index.php                ← front controller + url()/asset() helpers
│   ├── css/                     ← place CSS files here
│   └── assets/                  ← place images (logo.jpg, bgcover.png, etc.)
└── routes/
    └── web.php                  ← route definitions
```

### Route Map

| URL | Controller | Method |
|-----|-----------|--------|
| `/` | HomeController | [index()](file:///c:/xampp/htdocs/Iscag/app/controllers/HomeController.php#7-11) |
| `/login` | AuthController | [login()](file:///c:/xampp/htdocs/Iscag/app/controllers/AuthController.php#16-51) |
| `/register` | AuthController | [register()](file:///c:/xampp/htdocs/Iscag/app/controllers/AuthController.php#52-113) |
| `/forgot-password` | AuthController | [forgotPassword()](file:///c:/xampp/htdocs/Iscag/app/controllers/AuthController.php#161-190) |
| `/verify-otp` | AuthController | [verifyOtp()](file:///c:/xampp/htdocs/Iscag/app/controllers/AuthController.php#114-160) |
| `/reset-password` | AuthController | [resetPassword()](file:///c:/xampp/htdocs/Iscag/app/controllers/AuthController.php#191-219) |
| `/admin/dashboard` | AdminController | [dashboard()](file:///c:/xampp/htdocs/Iscag/app/controllers/AdminController.php#8-13) |
| `/user/dashboard` | UserController | [dashboard()](file:///c:/xampp/htdocs/Iscag/app/controllers/AdminController.php#8-13) |

### Helper Functions (available in all views)

- [url('/login')](file:///c:/xampp/htdocs/Iscag/public/index.php#17-25) → generates `/Iscag/login`
- [asset('css/homepage.css')](file:///c:/xampp/htdocs/Iscag/public/index.php#26-34) → generates `/Iscag/public/css/homepage.css`

## Before You Test

1. **Copy your static assets** (`logo.jpg`, `bgcover.png`, `bg-image.png`, `homepage.css`) into `public/assets/` and `public/css/`
2. **Enable mod_rewrite** in XAMPP: open `C:\xampp\apache\conf\httpd.conf` and ensure `LoadModule rewrite_module modules/mod_rewrite.so` is uncommented
3. **Restart Apache** via the XAMPP control panel

## New Features Implemented

### 1. Signup & OTP Verification
- **Functional Signup**: The `register` page now saves data to `tenant_accounts`.
- **OTP via Email**: Uses PHPMailer to send a 6-digit verification code to the user's email.
- **Login Security**: Passwords are hashed using `password_hash()` and verified during login.
- **Activation Flow**: Users are created with `is_verified = 0` and must enter the OTP to activate their account.

### 2. Role-Based Access Control (RBAC)
Access is now filtered based on the `role` column in the database:

| Role | Access Level |
|---|---|
| **Applicant** | Access to 4 departments (Burial, Counseling, Apartment). |
| **Tenant** | Above + Parking Application service. |
| **Staff_[Dept]** | Access to `admin/dashboard` but filtered to show only their specific department. |
| **Admin** | Full access to all departments and user management. |

## RBAC Testing Guide

To see different parts of the system, change the `role` column in the `tenant_accounts` table:

1. **Applicant View**: Set `role = 'Applicant'`. You will see the basic 4 department links.
2. **Tenant View**: Set `role = 'Tenant'`. You will see the 4 departments + the **Parking Application**.
3. **Staff View**: Set `role = 'Staff_Damayan'`. Log in to see only Damayan records in the Admin Dashboard.
   * *Roles*: `Staff_Damayan`, `Staff_Male`, `Staff_Female`, `Staff_Tenant`.
4. **Admin View**: Set `role = 'Admin'`. See everything.

## Forgot Password Flow

1. Go to the **Login** page and click **Forgot Password**.
2. Enter your registered email.
3. An OTP will be sent to the email (via PHPMailer).
4. Enter the OTP on the verification page.
5. If correct, you will be redirected to **Reset Password** to create a new one.

## Technical Details

- **Database Updates**: Added `otp_code`, `otp_expiry`, and `is_verified` to `tenant_accounts`.
- **Mailer Helper**: `app/helpers/Mailer.php` wraps PHPMailer for easy email sending.
- **Auth Helper**: `app/helpers/Auth.php` provides `Auth::check()`, `Auth::hasRole()`, and `Auth::protect()`.

## How to Test

1. **Register**: Go to `/Iscag/register`, fill in the name, email, and password.
2. **Verify**: Check the email `rjfelizardo25@gmail.com` for the OTP (in a real scenario, it goes to the user's email). Enter it on the `/Iscag/verify-otp` page.
3. **Login**: Go to `/Iscag/login`.
4. **RBAC**: Change a user's role in the `tenant_accounts` table to `Tenant` or `Applicant` to see how the dashboard content changes.
