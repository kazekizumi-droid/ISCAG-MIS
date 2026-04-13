<?php
require_once BASE_PATH . '/config/database.php';

class ApartmentApp {
    private $db;

    public function __construct() {
        $this->db = getDbConnection();
    }

    /**
     * Get or create tenant info record
     */
    public function getInfo($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tenant_addinfo WHERE tenant_id = :userId LIMIT 1");
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetch() ?: [];
    }

    /**
     * Save application data to tenant_addinfo
     */
    public function saveInfo($userId, $data) {
        $info = $this->getInfo($userId);
        if (!$info) {
            $data['tenant_id'] = $userId;
            $fields = array_keys($data);
            $cols = implode(',', $fields);
            $placeholders = implode(',', array_map(fn($f) => ":$f", $fields));
            $sql = "INSERT INTO tenant_addinfo ($cols) VALUES ($placeholders)";
        } else {
            $fields = array_keys($data);
            $set = implode(',', array_map(fn($f) => "$f = :$f", $fields));
            $sql = "UPDATE tenant_addinfo SET $set WHERE tenant_id = :tenant_id";
            $data['tenant_id'] = $userId;
        }
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    /**
     * Update a requirement path in tenant_requirements
     */
    public function updateRequirement($userId, $type, $path) {
        // Check if record exists
        $stmt = $this->db->prepare("SELECT * FROM tenant_requirements WHERE tenant_id = :userId LIMIT 1");
        $stmt->execute(['userId' => $userId]);
        $req = $stmt->fetch();

        $colMap = [
            'picture' => '2x2_picture',
            'valid_id' => 'valid_id',
            'coe' => 'coe'
        ];
        $col = $colMap[$type] ?? null;
        if (!$col) return false;

        if (!$req) {
            $sql = "INSERT INTO tenant_requirements (tenant_id, $col) VALUES (:userId, :path)";
        } else {
            $sql = "UPDATE tenant_requirements SET $col = :path WHERE tenant_id = :userId";
        }
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['userId' => $userId, 'path' => $path]);
    }
}
