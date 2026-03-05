<?php

/**
 * Admin Password Changer
 * 
 * Instructions:
 * 1. Edit the $newPassword variable below with your desired password
 * 2. Run: php change_admin_password.php
 * 3. Keep this file for future password changes
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\Hash;

// ============================================
// EDIT THIS LINE TO CHANGE THE PASSWORD
// ============================================
$newPassword = 'sipifalls123';
// ============================================

$email = 'admin@sipifalls.com';

$user = User::where('email', $email)->first();

if ($user) {
    $user->password = Hash::make($newPassword);
    $user->save();
    echo "\n✓ Password updated successfully!\n";
    echo "Email: {$email}\n";
    echo "New Password: {$newPassword}\n\n";
} else {
    echo "\n✗ Error: User not found with email: {$email}\n\n";
}
