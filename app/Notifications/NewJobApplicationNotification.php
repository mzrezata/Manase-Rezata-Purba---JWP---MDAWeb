<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\models\JobApplication;

class NewJobApplicationNotification extends Notification implements ShouldQueue
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
        $url = route('admin.jobs.show', $this->application->id);
        
        return (new MailMessage)
            ->subject('🔔 Lamaran Pekerjaan Baru - ' . $this->application->full_name)
            ->greeting('Halo Tim Rekrutmen,')
            ->line('Ada lamaran pekerjaan baru yang perlu ditinjau.')
            ->line('**Informasi Pelamar:**')
            ->line('- **Nama:** ' . $this->application->full_name)
            ->line('- **Email:** ' . $this->application->email)
            ->line('- **Telepon:** ' . $this->application->phone)
            ->line('- **Posisi:** ' . $this->application->applied_position)
            ->line('- **Pendidikan:** ' . $this->application->last_education)
            ->line('- **Jurusan:** ' . $this->application->major)
            ->line('- **Lulus:** ' . $this->application->graduation_year)
            ->line('- **Gaji Harapan:** ' . $this->application->formatted_salary)
            ->line('- **Bisa Mulai:** ' . $this->application->available_from->format('d M Y'))
            ->line('- **Relokasi:** ' . $this->application->willing_to_relocate)
            ->line('- **Waktu Lamar:** ' . $this->application->created_at->format('d M Y H:i'))
            ->line('')
            ->action('Lihat Detail & CV', $url)
            ->line('CV dan dokumen pendukung tersedia di halaman detail.')
            ->salutation('Sistem Rekrutmen PT. Mitra Data Abadi');
    }
}
