<?php
namespace App\Mail;
use App\Services\CalendarGenerator;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PresentationOwner extends Mailable
{
  use Queueable, SerializesModels;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct($data)
  {
    $this->data = $data;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    $calendar = CalendarGenerator::owner($this->data, 'd.m.Y');
    return $this->from(['address' => \Config::get('custom.email.from'), 'name' => \Config::get('custom.company')])
                ->subject('Anfrage Online-Produktevorführung')
                ->with(['data' => $this->data])
                ->attachData($calendar, 'kalender.ics', array('mime' => "text/calendar"))
                ->markdown('mail.presentation-owner');
  }
}
