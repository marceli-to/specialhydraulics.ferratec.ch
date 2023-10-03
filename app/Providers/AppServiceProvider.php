<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    setLocale(LC_ALL, 'de_CH.UTF-8');
    // Set global mailto address
    if ($this->app->environment('local') || $this->app->environment('staging'))
    {
      \Mail::alwaysTo(env('MAIL_TO'));
    }
  }
}
