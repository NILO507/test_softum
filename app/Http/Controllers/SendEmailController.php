<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PHPMailer\PHPMailer\PHPMailer;
use App\Models\EmailMessage;


class SendEmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        // Проверяем входные данные
        $validator = Validator::make($request->all(), [
            'from' => 'required|email',
            'to' => 'required|email',
            'cc' => 'nullable|email',
            'subject' => 'required',
            'type' => 'required|in:text,html',
            'body' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        try {
            // Создаем новый объект PHPMailer
            $mail = new PHPMailer(true);
            $mail->SMTPDebug = 1;
            $mail->isSMTP();
            $mail->Host = Config::get('mail.host');
            $mail->SMTPAuth = true;
            $mail->Username = Config::get('mail.username');
            $mail->Password = Config::get('mail.password');
            $mail->SMTPSecure = Config::get('mail.encryption');
            $mail->Port = Config::get('mail.port');
    
            // Определяем отправителя и получателя
            $mail->setFrom($request->from, Config::get('mail.from.name'));
            $mail->addAddress($request->to);
            if ($request->has('cc')) {
                $mail->addCC($request->cc);
            }
    
            // Устанавливаем тему сообщения
            $mail->Subject = $request->subject;
    
            // Определяем тип сообщения
            if ($request->type === 'html') {
                $mail->isHTML(true);
                $mail->Body = $request->body;
            } else {
                $mail->Body = strip_tags($request->body);
            }
    
            // Отправляем сообщение
            $mail->send();
    
            // Сохраняем данные
            $uuid = (string) Str::uuid();
            $email_message = new EmailMessage();
            $email_message->uuid = $uuid;
            $email_message->from = $request->from;
            $email_message->to = $request->to;
            $email_message->cc = $request->cc;
            $email_message->ip = $request->ip();
            $email_message->user_agent = $request->header('User-Agent');
            $email_message->save();
    
            return redirect('/' . $uuid . '/success')->with('email_data', [
                'from' => $request->from,
                'to' => $request->to,
                'cc' => $request->cc,
                'subject' => $request->subject,
                'type' => $request->type,
                'body' => $request->body,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Failed to send email.']);
        }
    }

    public function success($uuid)
    {
        // Получить данные электронной почты из флэш-сообщения
        $emailData = session()->get('email_data');

        return view('success', [
            'from' => $emailData['from'] ?? null,
            'to' => $emailData['to'] ?? null,
            'cc' => $emailData['cc'] ?? null,
            'subject' => $emailData['subject'] ?? null,
            'type' => $emailData['type'] ?? null,
            'body' => $emailData['body'] ?? null,
        ]);
    }
}
