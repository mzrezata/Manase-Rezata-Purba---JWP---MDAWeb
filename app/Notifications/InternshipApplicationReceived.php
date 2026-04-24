<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\InternshipApplication;

class InternshipApplicationReceived extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    public function __construct(InternshipApplication $application)
    {
        $this->application = $application;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Konfirmasi Pendaftaran Magang - PT. Mitra Data Abadi')
            ->greeting('Halo ' . $this->application->full_name . ',')
            ->line('Terima kasih telah mendaftar program magang di PT. Mitra Data Abadi.')
            ->line('Kami telah menerima pendaftaran Anda untuk posisi: **' . $this->application->desired_position . '**')
            ->line('**Detail Pendaftaran:**')
            ->line('- Nama: ' . $this->application->full_name)
            ->line('- Email: ' . $this->application->email)
            ->line('- Posisi: ' . $this->application->desired_position)
            ->line('- Periode: ' . $this->application->start_date->format('d M Y') . ' - ' . $this->application->end_date->format('d M Y'))
            ->line('- Institusi: ' . $this->application->institution_name)
            ->line('')
            ->line('Tim HR kami akan meninjau aplikasi Anda dan menghubungi Anda dalam 3-5 hari kerja.')
            ->line('Jika ada pertanyaan, jangan ragu untuk menghubungi kami.')
            ->line('')
            ->line('Salam,')
            ->line('**PT. Mitra Data Abadi**')
            ->line('*Your Trusted IT Partner*')
            ->salutation(' ');
    }
}