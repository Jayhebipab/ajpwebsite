<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Kailangan mo munang i-install ang PHPMailer sa pamamagitan ng Composer:
// composer require phpmailer/phpmailer
require base_path('vendor/autoload.php');

class ContactController extends Controller
{
    public function sendEmail(Request $request)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings para sa Gmail SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jpablobscs@tfvc.edu.ph'; // Palitan ng iyong Gmail email address
        $mail->Password   = 'wwib eltw teep nahv';         // Palitan ng iyong Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

            // Recipients
            // BINAGO ANG LINYANG ITO
            $mail->setFrom('jpablobscs@tfvc.edu.ph', 'Adrenaline Junky Piercinks'); // Ginamit ang iyong email address bilang "From"
            $mail->addAddress('jpablobscs@tfvc.edu.ph', 'Mr.kyowa'); // PALITAN NG IYONG GMAIL ADDRESS
            $mail->addReplyTo($request->email, $request->firstname . ' ' . $request->lastname); // Dinagdag ito para madali mong ma-reply sa email ng user

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'New Tattoo Appointment Inquiry';
            $mail->Body    = "
                <h2>New Contact Form Submission</h2>
                <p><b>Name:</b> " . htmlspecialchars($request->firstname) . " " . htmlspecialchars($request->lastname) . "</p>
                <p><b>Email:</b> " . htmlspecialchars($request->email) . "</p>
                <p><b>Phone Number:</b> " . htmlspecialchars($request->phonenum) . "</p>
                <p><b>Preferred Date:</b> " . htmlspecialchars($request->date) . "</p>
                <p><b>Preferred Time:</b> " . htmlspecialchars($request->time) . "</p>
                <p><b>Tattoo Info:</b> " . htmlspecialchars($request->info) . "</p>
            ";
            $mail->AltBody = "New contact form submission:\nName: " . $request->firstname . " " . $request->lastname . "\nEmail: " . $request->email . "\nPhone: " . $request->phonenum . "\nDate: " . $request->date . "\nTime: " . $request->time . "\nInfo: " . $request->info;

            $mail->send();

            return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');

        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Message could not be sent. Please try again later.');
        }
    }
}