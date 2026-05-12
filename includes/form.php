<?php
require_once __DIR__ . '/config.php';

$formSent  = false;
$formError = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['_form'])) {
    // Honeypot: boti vyplní pole "website", lidé ne
    if (!empty($_POST['website'])) {
        header('Location: /?odeslano=1');
        exit;
    }

    $name    = trim($_POST['name']    ?? '');
    $email   = filter_var(trim($_POST['email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $phone   = trim($_POST['phone']   ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $message) {
        $to      = $config['contact']['email'];
        $subject = 'Nová poptávka z vykopu.to';
        $body    = "Jméno: {$name}\r\nE-mail: {$email}\r\nTelefon: {$phone}\r\n\r\nZpráva:\r\n{$message}";
        $headers = implode("\r\n", [
            'From: web@vykopu.to',
            "Reply-To: {$email}",
            'Content-Type: text/plain; charset=UTF-8',
            'MIME-Version: 1.0',
        ]);
        $formSent = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, $headers);
        if (!$formSent) {
            $formError = true;
        }
    } else {
        $formError = true;
    }

    if ($formSent) {
        header('Location: /?odeslano=1');
        exit;
    }
}

$formSent = isset($_GET['odeslano']);
