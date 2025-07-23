<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;

class SettingController extends Controller
{
    public function index()
    {
        $is_form_enabled = Setting::where('key', 'is_form_enabled')->firstOrNew();
        $mail_mailer = Setting::where('key', 'MAIL_MAILER')->firstOrNew();
        $mail_host = Setting::where('key', 'MAIL_HOST')->firstOrNew();
        $mail_port = Setting::where('key', 'MAIL_PORT')->firstOrNew();
        $mail_username = Setting::where('key', 'MAIL_USERNAME')->firstOrNew();
        $mail_password = Setting::where('key', 'MAIL_PASSWORD')->firstOrNew();
        $mail_encryption = Setting::where('key', 'MAIL_ENCRYPTION')->firstOrNew();
        $mail_from_address = Setting::where('key', 'MAIL_FROM_ADDRESS')->firstOrNew();
        $mail_from_name = Setting::where('key', 'MAIL_FROM_NAME')->firstOrNew();

        return view('superadmin.settings', compact(
            'is_form_enabled',
            'mail_mailer',
            'mail_host',
            'mail_port',
            'mail_username',
            'mail_password',
            'mail_encryption',
            'mail_from_address',
            'mail_from_name'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'is_form_enabled' => 'nullable|boolean',
            'mail_mailer' => 'nullable|string',
            'mail_host' => 'nullable|string',
            'mail_port' => 'nullable|integer',
            'mail_username' => 'nullable|string',
            'mail_password' => 'nullable|string',
            'mail_encryption' => 'nullable|string',
            'mail_from_address' => 'nullable|email',
            'mail_from_name' => 'nullable|string',
        ]);

        // Update is_form_enabled
        if ($request->has('is_form_enabled')) {
            $setting = Setting::firstOrNew(['key' => 'is_form_enabled']);
            $setting->value = $request->input('is_form_enabled') ? 'true' : 'false';
            $setting->save();
        }

        // Update SMTP settings
        $smtpSettings = [
            'MAIL_MAILER',
            'MAIL_HOST',
            'MAIL_PORT',
            'MAIL_USERNAME',
            'MAIL_PASSWORD',
            'MAIL_ENCRYPTION',
            'MAIL_FROM_ADDRESS',
            'MAIL_FROM_NAME',
        ];

        foreach ($smtpSettings as $key) {
            if ($request->has($key)) {
                $setting = Setting::firstOrNew(['key' => $key]);
                $setting->value = $request->input($key);
                $setting->save();
            }
        }

        // Clear config cache to apply new mail settings
        Artisan::call('config:clear');

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }

}