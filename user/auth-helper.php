<?php
/**
 * Yojna Sathi - Citizen Authentication & User Data Store Helper
 */

define('USERS_DATA_FILE', dirname(__DIR__) . '/data/users.json');

/**
 * Read all users from the persistent JSON file
 */
function get_all_users() {
    if (!file_exists(USERS_DATA_FILE)) {
        return [];
    }
    $content = file_get_contents(USERS_DATA_FILE);
    $data = json_decode($content, true);
    return is_array($data) ? $data : [];
}

/**
 * Save all users to the JSON file
 */
function save_all_users($users) {
    $dir = dirname(USERS_DATA_FILE);
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
    return file_put_contents(USERS_DATA_FILE, json_encode($users, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
}

/**
 * Find user by email address (case-insensitive)
 */
function find_user_by_email($email) {
    $email = strtolower(trim($email));
    $users = get_all_users();
    foreach ($users as $user) {
        if (isset($user['email']) && strtolower(trim($user['email'])) === $email) {
            return $user;
        }
    }
    return null;
}

/**
 * Find user by mobile phone
 */
function find_user_by_phone($phone) {
    $phone = preg_replace('/[^0-9]/', '', $phone);
    $users = get_all_users();
    foreach ($users as $user) {
        $userPhone = preg_replace('/[^0-9]/', '', $user['phone'] ?? '');
        if ($userPhone !== '' && $userPhone === $phone) {
            return $user;
        }
    }
    return null;
}

/**
 * Register a new citizen user
 */
function register_new_user($formData) {
    $users = get_all_users();
    $newId = count($users) > 0 ? (max(array_column($users, 'id')) + 1) : 1;

    $password = $formData['password'] ?? '';
    $userRecord = [
        'id' => $newId,
        'name' => trim($formData['name'] ?? ''),
        'email' => strtolower(trim($formData['email'] ?? '')),
        'phone' => trim($formData['phone'] ?? ''),
        'dob' => trim($formData['dob'] ?? ''),
        'gender' => trim($formData['gender'] ?? 'Not Specified'),
        'state' => trim($formData['state'] ?? 'Rajasthan'),
        'district' => trim($formData['district'] ?? ''),
        'area_type' => trim($formData['area_type'] ?? 'Rural'),
        'pincode' => trim($formData['pincode'] ?? ''),
        'category' => trim($formData['category'] ?? 'General'),
        'occupation' => trim($formData['occupation'] ?? 'Student'),
        'income' => trim($formData['income'] ?? 'Below ₹1,00,000'),
        'specially_abled' => trim($formData['specially_abled'] ?? 'No'),
        'interest' => trim($formData['interest'] ?? 'Education'),
        'whatsapp_alerts' => !empty($formData['whatsapp_alerts']) ? 'yes' : 'no',
        'password_hash' => password_hash($password, PASSWORD_DEFAULT),
        'created_at' => date('Y-m-d H:i:s')
    ];

    $users[] = $userRecord;
    save_all_users($users);

    return $userRecord;
}

/**
 * Verify login credentials (email or phone)
 */
function verify_user_credentials($identifier, $password) {
    $identifier = trim($identifier);
    $user = find_user_by_email($identifier);
    if (!$user && is_numeric(preg_replace('/[^0-9]/', '', $identifier))) {
        $user = find_user_by_phone($identifier);
    }

    if (!$user) {
        return null;
    }

    // Check hashed password or fallback demo password
    if (isset($user['password_hash']) && password_verify($password, $user['password_hash'])) {
        return $user;
    }

    if (isset($user['plain_demo_pwd']) && $user['plain_demo_pwd'] === $password) {
        return $user;
    }

    // Default emergency fallback demo password for renu@example.com
    if ($user['email'] === 'renu@example.com' && ($password === 'password123' || $password === '123456')) {
        return $user;
    }

    return null;
}

/**
 * Update existing user profile
 */
function update_user_profile($email, $updates) {
    $users = get_all_users();
    $updatedUser = null;
    $email = strtolower(trim($email));

    foreach ($users as &$user) {
        if (isset($user['email']) && strtolower(trim($user['email'])) === $email) {
            foreach ($updates as $k => $v) {
                if ($k !== 'id' && $k !== 'password_hash' && $k !== 'created_at') {
                    $user[$k] = $v;
                }
            }
            $updatedUser = $user;
            break;
        }
    }

    if ($updatedUser) {
        save_all_users($users);
    }
    return $updatedUser;
}
