<?php
require_once BASE_PATH . '/app/controllers/Controller.php';
require_once BASE_PATH . '/app/models/ApartmentApp.php';
require_once BASE_PATH . '/app/helpers/Auth.php';

class ApartmentController extends Controller {
    public function apply() {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('user/Apartment/tenant_add_information_form');
    }

    public function status() {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('user/Apartment/tenant_status');
    }

    public function info() {
        Auth::protectRole(['Applicant', 'Tenant']);
        $this->view('user/Apartment/tenant_info'); // Assuming this exists or falls back
    }

    public function handleUpload() {
        Auth::protectRole(['Applicant', 'Tenant']);
        $userId = $_SESSION['user_id'];
        $type = $_POST['type'] ?? 'document';
        
        if (!isset($_FILES['file'])) {
            echo json_encode(['success' => false, 'message' => 'No file uploaded']);
            return;
        }

        $file = $_FILES['file'];
        $uploadDir = BASE_PATH . '/public/uploads/tenants/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $fileName = $type . '_' . $userId . '_' . time() . '.' . $ext;
        $targetPath = $uploadDir . $fileName;
        $dbPath = 'uploads/tenants/' . $fileName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $model = new ApartmentApp();
            $model->updateRequirement($userId, $type, $dbPath);
            echo json_encode(['success' => true, 'path' => $dbPath]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to move file']);
        }
    }

    public function save() {
        Auth::protectRole(['Applicant', 'Tenant']);
        $userId = $_SESSION['user_id'];
        $data = json_decode(file_get_contents('php://input'), true);
        
        if (!$data) {
            echo json_encode(['success' => false, 'message' => 'No data received']);
            return;
        }

        $model = new ApartmentApp();
        if ($model->saveInfo($userId, $data)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save data']);
        }
    }
}
