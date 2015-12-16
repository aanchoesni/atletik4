<?php

class HomeController extends BaseController
{

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |    Route::get('/', 'HomeController@showWelcome');
    |
     */
    // protected $layout = 'layouts.master';

    // public function showWelcome()
    // {
    //     return View::make('hello');
    // }

    public function index()
    {
        // $this->layout->content =
        if (Sentry::getUser()->hasPermission('admin')) {
            return View::make('dashboard.indexadmin')->withtitle("Dashboard Admin");
        } elseif (Sentry::getUser()->hasPermission('panitia')) {
            return View::make('dashboard.indexpanitia')->withtitle("Dashboard Panitia");
        } elseif (Sentry::getUser()->hasPermission('user')) {
            $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
            $jenjang = Sentry::getUser()->last_name;
            if ($jenjang === 'SMA') {
                $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();

                $juma  = Contest::where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $jumpa = $runpas + $ljpas + $tppas + $ltpas;
                $jumpi = $runpis + $ljpis + $tppis + $ltpis;

                return View::make('dashboard.indexuser')
                    ->withtitle("Dashboard User")
                    ->with('menu', $menu)
                    ->with('runpas', $runpas)
                    ->with('runpis', $runpis)
                    ->with('ljpas', $ljpas)
                    ->with('ljpis', $ljpis)
                    ->with('tppas', $tppas)
                    ->with('tppis', $tppis)
                    ->with('ltpas', $ltpas)
                    ->with('ltpis', $ltpis)
                    ->with('juma', $juma)
                    ->with('jumpa', $jumpa)
                    ->with('jumpi', $jumpi);
            } elseif ($jenjang === 'SMP') {
                $runpas = Contest::where('nocontest', 'Lari 60m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $runpis = Contest::where('nocontest', 'Lari 60m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();

                $juma  = Contest::where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $jumpa = $runpas + $ljpas + $tppas + $ltpas;
                $jumpi = $runpis + $ljpis + $tppis + $ltpis;

                return View::make('dashboard.indexuser')
                    ->withtitle("Dashboard User")
                    ->with('menu', $menu)
                    ->with('runpas', $runpas)
                    ->with('runpis', $runpis)
                    ->with('ljpas', $ljpas)
                    ->with('ljpis', $ljpis)
                    ->with('tppas', $tppas)
                    ->with('tppis', $tppis)
                    ->with('ltpas', $ltpas)
                    ->with('ltpis', $ltpis)
                    ->with('juma', $juma)
                    ->with('jumpa', $jumpa)
                    ->with('jumpi', $jumpi);
            } elseif ($jenjang === 'SD') {
                $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $lbpas  = Contest::where('nocontest', 'Lempar Bola pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $lbpis  = Contest::where('nocontest', 'Lempar Bola pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $lespa  = Contest::where('nocontest', 'Lari Estafet pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $lespi  = Contest::where('nocontest', 'Lari Estafet pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();

                $juma  = Contest::where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->count();
                $jumpa = ($runpas + $ljpas + $lbpas + $lespa);
                $jumpi = ($runpis + $ljpis + $lbpis + $lespi);

                return View::make('dashboard.indexuser')
                    ->withtitle("Dashboard User")
                    ->with('menu', $menu)
                    ->with('runpas', $runpas)
                    ->with('runpis', $runpis)
                    ->with('ljpas', $ljpas)
                    ->with('ljpis', $ljpis)
                    ->with('lbpas', $lbpas)
                    ->with('lbpis', $lbpis)
                    ->with('lespa', $lespa)
                    ->with('lespi', $lespi)
                    ->with('juma', $juma)
                    ->with('jumpa', $jumpa)
                    ->with('jumpi', $jumpi);
            }
        }
    }

    public function authenticate()
    {
        // Ambil credentials dari $_POST variable
        $credentials = array(
            'email'    => Input::get('email'),
            'password' => Input::get('password'),
        );

        try {
            // authentikasi user
            $user = Sentry::authenticate($credentials, false);
            // Redirect user ke dashboard
            return Redirect::intended('dashboard'); // yang mambuat tidak bisa diakses apabila tidak login (inteded)
        } catch (Cartalyst\Sentry\Users\WrongPasswordException $e) {
            return Redirect::back()->with('errorMessage', 'Password yang Anda masukan salah.')->withInput(Input::except('password'));
        } catch (Exception $e) {
            return Redirect::back()->with('errorMessage', trans('Akun dengan email tersebut tidak ditemukan di sistem kami.'))->withInput(Input::except('password'));
        } catch (Cartalyst\Sentry\Users\UserNotActivatedException $e) {
            return Redirect::back()->with('errorMessage', trans('Akun dengan email tersebut belum aktif mohon cek email.'))->withInput(Input::except('password'));
        }

    }

    public function logout()
    {
        // Logout user
        Sentry::logout();
        // Redirect user ke halaman login
        return Redirect::to('login')->with('successMessage', 'Anda berhasil logout.');
    }

}
