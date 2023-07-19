<?php
namespace App\Services;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use Carbon\Carbon;

class CalendarGenerator
{
  /**
   * Generate a calendar entry for a user
   * 
   * @param Array $data
   * @return \Illuminate\Http\Response
   */
  public static function user($data = array(), $dateFormat = 'd.m.Y H:i')
  {
    $starts = Carbon::createFromFormat($dateFormat, $data['date']);
    $calendar = Calendar::create('Rückruf ' . \Config::get('custom.company'))->event(
      Event::create('Rückruf ' . \Config::get('custom.company'))->startsAt($starts->subtract('hour', 1))
    );

    return response($calendar->get(), 200, [
      'Content-Type' => 'text/calendar',
      'Content-Disposition' => 'attachment; filename="kalender.ics"',
      'charset' => 'utf-8',
    ]);
  }

  /**
   * Generate a calendar entry for the owner
   * 
   * @param Array $data
   * @return \Illuminate\Http\Response
   */

  public static function owner($data = array(), $dateFormat = 'd.m.Y H:i')
  {
    $starts   = Carbon::createFromFormat($dateFormat, $data['date']);
    $calendar = Calendar::create()->event(
      Event::create()
            ->name('Rückruf ' . \Config::get('custom.company'))
            ->description('Rückruf ' . $data['company'])
            ->attendee($data['email'],  $data['firstname']. ' ' . $data['name'])
            ->startsAt($starts->subtract('hour', 1))
    );

    return response($calendar->get(), 200, [
      'Content-Type' => 'text/calendar',
      'Content-Disposition' => 'attachment; filename="kalender.ics"',
      'charset' => 'utf-8',
    ]);
  }

}