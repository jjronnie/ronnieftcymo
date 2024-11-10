<?php

namespace App\Providers;
use App\Models\Student; 


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;


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
  // In app/Providers/AppServiceProvider.php

  public function boot()
  {
      View::composer(
          'backend.layouts.nav', // Specify the correct view path
          function ($view) {
              $students = Student::latest()->take(5)->get(); // Fetch the latest 5 students
              $view->with('students', $students); // Pass students to the view
          }
      );
  }

}
