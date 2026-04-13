<?php

require_once BASE_PATH . '/app/controllers/Controller.php';
require_once BASE_PATH . '/app/helpers/Auth.php';

require_once BASE_PATH . '/app/models/User.php';

class UserController extends Controller
{
    public function dashboard(): void
    {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('dashboard');
    }
    public function profile(): void
    {
        Auth::protectRole(['Applicant', 'Tenant']);
        $userId = $_SESSION['user_id'] ?? null;
        
        $userModel = new User();
        $account = $userModel->findById($userId);
        $info = $userModel->getAdditionalInfo($userId);
        
        $this->view('user/tenant_account', [
            'account' => $account,
            'info' => $info
        ]);
    }

    public function notifications(): void
    {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('user/tenant_notification');
    }
}
