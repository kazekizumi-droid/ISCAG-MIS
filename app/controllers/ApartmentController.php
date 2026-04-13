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
        $this->view('user/Apartment/apartment_information');
    }

    /**
     * POST /user/apartment/save
     * Expects JSON with keys: addinfo (object), roomtype (string)
     */
    public function save() {
        Auth::protectRole(['Applicant', 'Tenant']);
        header('Content-Type: application/json');
        $userId = $_SESSION['user_id'];
        $body   = json_decode(file_get_contents('php://input'), true);

        if (!$body) {
            echo json_encode(['success' => false, 'message' => 'No data received']);
            return;
        }

        $model = new ApartmentApp();
        $ok = true;

        // 1. Save personal info → tenant_addinfo
        if (!empty($body['addinfo']) && is_array($body['addinfo'])) {
            if (!$model->saveInfo($userId, $body['addinfo'])) {
                $ok = false;
            }
        }

        // 2. Save unit preference → apartmentsapp
        if (!empty($body['roomtype'])) {
            if (!$model->saveApplication($userId, $body['roomtype'])) {
                $ok = false;
            }
        }

        echo json_encode(['success' => $ok]);
    }

    /**
     * POST /user/apartment/upload
     * Expects multipart form: file + type (picture|governmentid|psa|nbi|proofofincome)
     */
    public function handleUpload() {
        Auth::protectRole(['Applicant', 'Tenant']);
        header('Content-Type: application/json');
        $userId = $_SESSION['user_id'];
        $type   = $_POST['type'] ?? 'picture';

        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            echo json_encode(['success' => false, 'message' => 'No file uploaded']);
            return;
        }

        $file = $_FILES['file'];

        // Validate
        $maxSize = 5 * 1024 * 1024;
        if ($file['size'] > $maxSize) {
            echo json_encode(['success' => false, 'message' => 'File too large (max 5 MB)']);
            return;
        }

        $allowedMime = ['image/jpeg','image/png','image/gif','image/webp','application/pdf'];
        $mime = mime_content_type($file['tmp_name']);
        if (!in_array($mime, $allowedMime)) {
            echo json_encode(['success' => false, 'message' => 'Invalid file type']);
            return;
        }

        $uploadDir = BASE_PATH . '/public/uploads/tenants/';
        if (!is_dir($uploadDir)) mkdir($uploadDir, 0777, true);

        $ext      = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $filename = $type . '_' . $userId . '_' . time() . '.' . $ext;
        $target   = $uploadDir . $filename;
        $dbPath   = 'uploads/tenants/' . $filename;

        if (move_uploaded_file($file['tmp_name'], $target)) {
            $model = new ApartmentApp();
            $model->updateRequirement($userId, $type, $dbPath);
            echo json_encode(['success' => true, 'path' => $dbPath]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save file']);
        }
    }
}
