<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\JobApplication;

class JobApplicationReceived extends Notification implements ShouldQueue
{
    use Queueable;

    protected $application;

    public function __construct(JobApplication $application)
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
            ->subject('Konfirmasi Lamaran Pekerjaan - PT. Mitra Data Abadi')
            ->greeting('Halo ' . $this->application->full_name . ',')
            ->line('Terima kasih telah melamar pekerjaan di PT. Mitra Data Abadi.')
            ->line('Kami telah menerima lamaran Anda untuk posisi: **' . $this->application->applied_position . '**')
            ->line('**Detail Lamaran:**')
            ->line('- Nama: ' . $this->application->full_name)
            ->line('- Email: ' . $this->application->email)
            ->line('- Posisi: ' . $this->application->applied_position)
            ->line('- Pendidikan: ' . $this->application->last_education . ' - ' . $this->application->major)
            ->line('- Dapat Mulai: ' . $this->application->available_from->format('d M Y'))
            ->line('')
            ->line('Tim rekrutmen kami akan meninjau lamaran Anda dan menghubungi Anda untuk tahap selanjutnya jika profil Anda sesuai dengan kebutuhan kami.')
            ->line('Proses seleksi biasanya memakan waktu 1-2 minggu.')
            ->line('')
            ->line('Terima kasih atas minat Anda bergabung dengan tim kami!')
            ->line('')
            ->line('Salam,')
            ->line('**Tim Rekrutmen PT. Mitra Data Abadi**')
            ->line('*Your Trusted IT Partner*')
            ->salutation(' ');
    }
}