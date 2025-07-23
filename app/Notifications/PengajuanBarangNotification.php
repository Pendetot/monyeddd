<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\PengajuanBarang;

class PengajuanBarangNotification extends Notification
{
    use Queueable;

    protected $pengajuan;
    protected $type;

    /**
     * Create a new notification instance.
     */
    public function __construct(PengajuanBarang $pengajuan, string $type)
    {
        $this->pengajuan = $pengajuan;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database']; // Also add database for in-app notifications
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $subject = '';
        $greeting = '';
        $body = '';
        $actionText = 'Lihat Detail Pengajuan';
        $actionUrl = url('/pengajuan-barang/' . $this->pengajuan->id);

        // Determine time of day for greeting
        $hour = now()->hour;
        if ($hour >= 5 && $hour < 12) {
            $greeting = 'PAGI';
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = 'SIANG';
        } else {
            $greeting = 'MALAM';
        }

        switch ($this->type) {
            case 'new_request_logistic':
                $subject = 'Pemberitahuan: Pengajuan Barang Baru dari HRD';
                $body = "Selamat {$greeting}, Logistik.\n\nHRD telah mengajukan permintaan barang baru:\n\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\nCatatan HRD: {$this->pengajuan->notes}\n\nMohon untuk segera meninjau pengajuan ini.";
                break;
            case 'new_request_superadmin':
                $subject = 'Pemberitahuan: Permohonan Otorisasi Pengajuan Barang';
                $body = "Selamat {$greeting}, Superadmin.\n\nLogistik telah meneruskan pengajuan barang yang membutuhkan otorisasi Anda:\n\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\nCatatan Logistik: {$this->pengajuan->logistic_notes}\n\nMohon untuk segera meninjau dan memberikan keputusan.";
                break;
            case 'rejected_by_logistic':
                $subject = 'Pemberitahuan: Pengajuan Barang Ditolak oleh Logistik';
                $body = "Selamat {$greeting}, HRD.\n\nPengajuan barang Anda untuk:\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\n\nTelah ditolak oleh Logistik dengan alasan:\n{$this->pengajuan->logistic_notes}\n\nMohon untuk meninjau kembali pengajuan Anda.";
                break;
            case 'rejected_by_superadmin':
                $subject = 'Pemberitahuan: Pengajuan Barang Ditolak oleh Superadmin';
                $body = "Selamat {$greeting}, Logistik.\n\nPengajuan barang untuk:\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\n\nTelah ditolak oleh Superadmin dengan alasan:\n{$this->pengajuan->superadmin_notes}\n\nMohon untuk meneruskan informasi ini kepada HRD.";
                break;
            case 'approved_by_superadmin':
                $subject = 'Pemberitahuan: Pengajuan Barang Disetujui oleh Superadmin';
                $body = "Selamat {$greeting}, Logistik.\n\nPengajuan barang untuk:\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\n\nTelah disetujui oleh Superadmin.\n\nMohon untuk segera memproses pengadaan barang tersebut.";
                break;
            case 'item_status_update':
                $subject = 'Pemberitahuan: Status Barang Pengajuan Anda';
                $statusText = '';
                if ($this->pengajuan->status === 'item_ready') {
                    $statusText = 'sudah siap';
                } elseif ($this->pengajuan->status === 'item_not_ready') {
                    $statusText = 'tidak ready dan akan dilakukan pembelian';
                }
                $body = "Selamat {$greeting}, HRD.\n\nBarang yang Anda ajukan:\nNama Barang: {$this->pengajuan->item_name}\nJumlah: {$this->pengajuan->quantity}\n\nSaat ini {$statusText}.\n\nCatatan Logistik: {$this->pengajuan->logistic_notes}";
                break;
            default:
                $subject = 'Pemberitahuan Pengajuan Barang';
                $body = 'Ada pembaruan pada pengajuan barang.';
                break;
        }

        return (new MailMessage)
                    ->subject($subject)
                    ->greeting("Selamat {$greeting},")
                    ->line($body)
                    ->action($actionText, $actionUrl)
                    ->line('Terima kasih telah menggunakan aplikasi kami!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'pengajuan_id' => $this->pengajuan->id,
            'item_name' => $this->pengajuan->item_name,
            'quantity' => $this->pengajuan->quantity,
            'status' => $this->pengajuan->status,
            'type' => $this->type,
            'notes' => $this->pengajuan->notes,
            'logistic_notes' => $this->pengajuan->logistic_notes,
            'superadmin_notes' => $this->pengajuan->superadmin->notes,
        ];
    }
}