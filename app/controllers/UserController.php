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

    public function updateProfile(): void
    {
        Auth::protectRole(['Applicant', 'Tenant']);
        $userId = $_SESSION['user_id'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
            return;
        }

        // Collect fields from modal.
        // As per requirements: Sex and Name are NOT changeable.
        $data = [
            'email'      => $_POST['email'] ?? null,
            'phone'      => $_POST['phone'] ?? null,
            'address'    => $_POST['address'] ?? null,
            'dob'        => $_POST['dob'] ?? null,
            'civil'      => $_POST['civil'] ?? null,
            'occupation' => $_POST['occupation'] ?? null,
            'arabicName' => $_POST['arabicName'] ?? null,
        ];

        $userModel = new User();
        $success = $userModel->updateProfile($userId, $data);

        header('Content-Type: application/json');
        echo json_encode([
            'success' => $success,
            'message' => $success ? 'Profile updated successfully.' : 'Failed to update profile data.'
        ]);
    }
}
