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
            return View::make('dashboard.indexadmin')->withtitle("Dashboard Panitia");
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

    public function forgot()
    {
        return View::make('login.forgot');
    }

    /**
     * Kirim email reset password
     * @return response
     */
    public function sendResetCode()
    {
        // Validasi email dan catcha
        $rules = array(
            'email' => 'required|exists:users',
        );

        $validator = Validator::make($data = Input::all(), $rules);

        // Redirect jika validasi gagal
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $user = Sentry::findUserByLogin(Input::get('email'));
        $data = array(
            'email'     => $user->email,
            // Generate code untuk password reset
            'resetCode' => $user->getResetPasswordCode(),
        );

        // Kirim email untuk reset password
        Mail::send('emails.auth.reminder', $data, function ($message) use ($user) {
            $message->to($user->email, $user->first_name)->subject('Reset Password Atletik Unesa');
        });

        // Redirect ke halaman login
        return Redirect::to('login')->with("successMessage", "Silahkan cek email Anda ($user->email) untuk me-reset password.");
    }

    /**
     * Tampilkan halaman untuk membuat password baru
     * @param string $token
     * @return response
     */
    public function createNewPassword()
    {
        try {
            $user = Sentry::findUserByLogin(Input::get('email'));
            if ($user->checkResetPasswordCode(Input::get('resetCode'))) {
                return View::make('login.resetpassword')
                    ->with('email', $user->email)
                    ->with('resetCode', Input::get('resetCode'));
            } else {
                return Redirect::route('login')->with('errorMessage', 'Reset code tidak valid.');
            }
        } catch (UserNotFoundException $e) {
            return Redirect::to('login')->with('errorMessage', $e->getMessage());
        }
    }

    /**
     * Simpan password user yang baru
     * @param string $token
     * @return response
     */
    public function storeNewPassword()
    {
        try
        {
            // Cari user berdasarkan email
            $user = Sentry::findUserByLogin(Input::get('email'));
            // Check apakah resetCode valid
            if ($user->checkResetPasswordCode(Input::get('resetCode'))) {
                // Validasi password baru
                $rules     = array('password' => 'confirmed|required|min:5');
                $validator = Validator::make($data = Input::all(), $rules);
                // Redirect jika validasi gagal
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                // Reset password user
                $user->attemptResetPassword(Input::get('resetCode'), Input::get('password'));
                return Redirect::to('login')->with('successMessage', 'Berhasil me-reset password. Silahkan login dengan password baru.');
            } else {
                return Redirect::to('login')->with('errorMessage', 'Reset code tidak valid.');
            }
        } catch (Cartalyst\Sentry\Users\UserNotFoundException $e) {
            return Redirect::to('login')->with('errorMessage', $e->getMessage());
        }
    }

}
