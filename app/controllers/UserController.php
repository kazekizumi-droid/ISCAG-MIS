<?php

require_once BASE_PATH . '/app/controllers/Controller.php';
require_once BASE_PATH . '/app/helpers/Auth.php';

class UserController extends Controller
{
    public function dashboard(): void
    {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('user/dashboard');
    }
}
