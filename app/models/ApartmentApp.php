<?php
require_once BASE_PATH . '/config/database.php';

class ApartmentApp {
    private $db;

    public function __construct() {
        $this->db = getDbConnection();
    }

    // ─── tenant_addinfo ───────────────────────────────────
    public function getInfo($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tenant_addinfo WHERE tenant_id = :uid LIMIT 1");
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function saveInfo($userId, $data) {
        // Whitelist only columns that exist in tenant_addinfo
        $allowed = [
            'familyname','givenname','middlename','muslimname',
            'civil_status','address','birthdate','pob','age','sex',
            'tribalaffliation','numofmuslim','occupation','monthly_income',
            'companyname','companyadd','companyphone',
            'dateofshahadah','ref_name','ref_contact',
            'iscag_students','date_applied'
        ];
        $safe = [];
        foreach ($allowed as $col) {
            if (array_key_exists($col, $data)) {
                $safe[$col] = $data[$col];
            }
        }
        if (empty($safe)) return false;

        $existing = $this->getInfo($userId);
        if (!$existing) {
            $safe['tenant_id'] = $userId;
            $cols = implode(',', array_keys($safe));
            $phs  = implode(',', array_map(fn($k) => ":$k", array_keys($safe)));
            $sql  = "INSERT INTO tenant_addinfo ($cols) VALUES ($phs)";
        } else {
            $set = implode(',', array_map(fn($k) => "$k = :$k", array_keys($safe)));
            $sql = "UPDATE tenant_addinfo SET $set WHERE tenant_id = :tenant_id";
            $safe['tenant_id'] = $userId;
        }
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($safe);
    }

    // ─── apartmentsapp (unit type) ────────────────────────
    public function getApplication($userId) {
        $stmt = $this->db->prepare("SELECT * FROM apartmentsapp WHERE tenant_id = :uid ORDER BY application_id DESC LIMIT 1");
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function saveApplication($userId, $roomtype) {
        $existing = $this->getApplication($userId);
        if (!$existing) {
            $sql = "INSERT INTO apartmentsapp (tenant_id, roomtype, date, status) VALUES (:uid, :rt, CURDATE(), 'Pending')";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['uid' => $userId, 'rt' => $roomtype]);
        } else {
            $sql = "UPDATE apartmentsapp SET roomtype = :rt WHERE application_id = :aid";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(['rt' => $roomtype, 'aid' => $existing['application_id']]);
        }
    }

    // ─── tenant_requirements (uploads) ────────────────────
    public function getRequirements($userId) {
        $stmt = $this->db->prepare("SELECT * FROM tenant_requirements WHERE tenant_id = :uid LIMIT 1");
        $stmt->execute(['uid' => $userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC) ?: [];
    }

    public function updateRequirement($userId, $type, $path) {
        $colMap = [
            'picture'       => 'picture',
            'governmentid'  => 'governmentid',
            'psa'           => 'psa',
            'nbi'           => 'nbi',
            'proofofincome' => 'proofofincome'
        ];
        $col = $colMap[$type] ?? null;
        if (!$col) return false;

        $existing = $this->getRequirements($userId);
        if (!$existing) {
            $sql = "INSERT INTO tenant_requirements (tenant_id, $col) VALUES (:uid, :path)";
        } else {
            $sql = "UPDATE tenant_requirements SET $col = :path WHERE tenant_id = :uid";
        }
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['uid' => $userId, 'path' => $path]);
    }
}
