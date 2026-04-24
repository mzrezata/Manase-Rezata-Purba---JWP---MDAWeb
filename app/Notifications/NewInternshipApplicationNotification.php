<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\InternshipApplication;

class NewInternshipApplicationNotification extends Notification implements ShouldQueue
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
        $url = route('admin.internships.show', $this->application->id);
        
        return (new MailMessage)
            ->subject('🔔 Pendaftaran Magang Baru - ' . $this->application->full_name)
            ->greeting('Halo Tim HR,')
            ->line('Ada pendaftaran magang baru yang perlu ditinjau.')
            ->line('**Informasi Pendaftar:**')
            ->line('- **Nama:** ' . $this->application->full_name)
            ->line('- **Email:** ' . $this->application->email)
            ->line('- **Telepon:** ' . $this->application->phone)
            ->line('- **Posisi:** ' . $this->application->desired_position)
            ->line('- **Institusi:** ' . $this->application->institution_name)
            ->line('- **Jurusan:** ' . $this->application->major)
            ->line('- **Semester:** ' . $this->application->current_semester)
            ->line('- **IPK:** ' . $this->application->gpa)
            ->line('- **Periode:** ' . $this->application->start_date->format('d M Y') . ' - ' . $this->application->end_date->format('d M Y'))
            ->line('- **Waktu Daftar:** ' . $this->application->created_at->format('d M Y H:i'))
            ->line('')
            ->action('Lihat Detail & Review', $url)
            ->line('Silakan review aplikasi ini dan hubungi kandidat jika sesuai.')
            ->salutation('Sistem Rekrutmen PT. Mitra Data Abadi');
    }
}