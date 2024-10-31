<?php
session_start();
$email = isset($_SESSION['ses_mail']) ? $_SESSION['ses_mail'] : 0;
$password = isset($_SESSION['ses_pass']) ? $_SESSION['ses_pass'] : 0;
$notif = "Silahkan masukkan data yang benar!";

if (!empty($email)) {

    if ($cmd->count("SELECT * FROM akun WHERE akun_email='$email'") == 1) {
        $data = $cmd->fetch("SELECT * FROM akun WHERE akun_email='$email'");
        if (password_verify($password, $data['akun_password'])) {
            $segmen = 0;

            if ($data['akun_level'] == 'admin' && $data['akun_segmen'] == 'semua') {
                $segmen = 'admin.php';
            } else if ($data['akun_level'] == 'viewer' && $data['akun_segmen'] == 'semua') {
                $segmen = 'viewer.php';
            } else if ($data['akun_level'] == 'operator') {
                $segmen = 'operator.php';
            }

            if (!empty($segmen)) {
                require_once __DIR__ . "/$segmen";
            }
        }
    }
} else {
    header("Location: /publik-sinkron");
}
