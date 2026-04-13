<?php

require_once BASE_PATH . '/config/database.php';

/**
 * User Model
 * Handles all database operations related to users (tenant_accounts).
 */
class User
{
    protected string $table = 'tenant_accounts';
    protected PDO $db;

    public function __construct()
    {
        $this->db = getDbConnection();
    }

    /**
     * Create a new user record.
     */
    public function create(array $data): bool
    {
        $fields = array_keys($data);
        $placeholders = array_map(fn($f) => ":$f", $fields);

        $sql = "INSERT INTO {$this->table} (" . implode(',', $fields) . ") VALUES (" . implode(',', $placeholders) . ")";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute($data);
    }

    /**
     * Find a user by email.
     */
    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch();
    }

    /**
     * Find a user by ID.
     */
    public function findById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE tenant_id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    /**
     * Check if a field value already exists.
     */
    public function exists(string $field, string $value): bool
    {
        // Security: Whitelist allowed fields to prevent SQL injection via dynamic column names
        $allowedFields = ['email', 'contactnum', 'tenant_id'];
        if (!in_array($field, $allowedFields)) {
            throw new Exception("Invalid field name for existence check.");
        }

        $stmt = $this->db->prepare("SELECT COUNT(*) FROM {$this->table} WHERE {$field} = :value");
        $stmt->execute(['value' => $value]);
        return $stmt->fetchColumn() > 0;
    }

    /**
     * Update user verification status and OTP.
     */
    public function updateOTP(string $email, string $otp, string $expiry): bool
    {
        $stmt = $this->db->prepare("UPDATE {$this->table} SET otp_code = :otp, otp_expiry = :expiry WHERE email = :email");
        return $stmt->execute([
            'otp' => $otp,
            'expiry' => $expiry,
            'email' => $email
        ]);
    }

    /**
     * Verify OTP and activate account.
     */
    public function verifyAccount(string $email, string $otp): bool
    {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE email = :email AND otp_code = :otp LIMIT 1");
        $stmt->execute(['email' => $email, 'otp' => $otp]);
        $user = $stmt->fetch();

        if ($user) {
            // Check expiry in PHP
            $expiry = strtotime($user['otp_expiry']);
            if ($expiry < time()) {
                return false; // Expired
            }

            $update = $this->db->prepare("UPDATE {$this->table} SET is_verified = 1, otp_code = NULL, otp_expiry = NULL WHERE email = :email");
            return $update->execute(['email' => $email]);
        }

        return false;
    }

    /**
     * Authenticate user.
     */
    public function authenticate(string $email, string $password)
    {
        $user = $this->findByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }

    /**
     * Update user password.
     */
    public function updatePassword(string $email, string $password): bool
    {
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE {$this->table} SET password = :password, confirmpass = :confirmpass WHERE email = :email");
        return $stmt->execute(['password' => $hashed, 'confirmpass' => $hashed, 'email' => $email]);
    }

    /**
     * Fetch additional profile information.
     */
    public function getAdditionalInfo($userId)
    {
        $stmt = $this->db->prepare("SELECT * FROM tenant_addinfo WHERE tenant_id = :userId LIMIT 1");
        $stmt->execute(['userId' => $userId]);
        return $stmt->fetch();
    }
}
