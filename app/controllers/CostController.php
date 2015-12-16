<?php

class CostController extends BaseController
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
            $cost    = Setting::first();
            $school  = School::where('user_id', Sentry::getUser()->id)->first();
            $payment = Payment::where('user_id', Sentry::getUser()->id)->where(DB::raw('year'), '=', date('Y'))->first();

            if ($jenjang === 'SMA') {
                $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();

                $jrunpas = $runpas * $cost->moneyreg;
                $jrunpis = $runpis * $cost->moneyreg;
                $jljpas  = $ljpas * $cost->moneyreg;
                $jljpis  = $ljpis * $cost->moneyreg;
                $jtppas  = $tppas * $cost->moneyreg;
                $jtppis  = $tppis * $cost->moneyreg;
                $jltpas  = $ltpas * $cost->moneyreg;
                $jltpis  = $ltpis * $cost->moneyreg;

                $jtotal = $jrunpas + $jrunpis + $jljpas + $jljpis + $jtppas + $jtppis + $jltpas + $jltpis;

                return View::make('costs.index')
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
                    ->with('jrunpas', $jrunpas)
                    ->with('jrunpis', $jrunpis)
                    ->with('jljpas', $jljpas)
                    ->with('jljpis', $jljpis)
                    ->with('jtppas', $jtppas)
                    ->with('jtppis', $jtppis)
                    ->with('jltpas', $jltpas)
                    ->with('jltpis', $jltpis)
                    ->with('jtotal', $jtotal)
                    ->with('cost', $cost)
                    ->with('school', $school)
                    ->with('payment', $payment);
            } elseif ($jenjang === 'SMP') {
                $runpas = Contest::where('nocontest', 'Lari 60m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $runpis = Contest::where('nocontest', 'Lari 60m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();

                $jrunpas = $runpas * $cost->moneyreg;
                $jrunpis = $runpis * $cost->moneyreg;
                $jljpas  = $ljpas * $cost->moneyreg;
                $jljpis  = $ljpis * $cost->moneyreg;
                $jtppas  = $tppas * $cost->moneyreg;
                $jtppis  = $tppis * $cost->moneyreg;
                $jltpas  = $ltpas * $cost->moneyreg;
                $jltpis  = $ltpis * $cost->moneyreg;

                $jtotal = $jrunpas + $jrunpis + $jljpas + $jljpis + $jtppas + $jtppis + $jltpas + $jltpis;

                return View::make('costs.index')
                    ->withtitle("Biaya")
                    ->with('menu', $menu)
                    ->with('runpas', $runpas)
                    ->with('runpis', $runpis)
                    ->with('ljpas', $ljpas)
                    ->with('ljpis', $ljpis)
                    ->with('tppas', $tppas)
                    ->with('tppis', $tppis)
                    ->with('ltpas', $ltpas)
                    ->with('ltpis', $ltpis)
                    ->with('jrunpas', $jrunpas)
                    ->with('jrunpis', $jrunpis)
                    ->with('jljpas', $jljpas)
                    ->with('jljpis', $jljpis)
                    ->with('jtppas', $jtppas)
                    ->with('jtppis', $jtppis)
                    ->with('jltpas', $jltpas)
                    ->with('jltpis', $jltpis)
                    ->with('jtotal', $jtotal)
                    ->with('cost', $cost)
                    ->with('school', $school)
                    ->with('payment', $payment);
            } elseif ($jenjang === 'SD') {
                $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $lbpas  = Contest::where('nocontest', 'Lempar Bola pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $lbpis  = Contest::where('nocontest', 'Lempar Bola pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $lespa  = Contest::where('nocontest', 'Lari Estafet pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();
                $lespi  = Contest::where('nocontest', 'Lari Estafet pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', date('Y'))->where('verifikasi', 1)->count();

                $jrunpas = $runpas * $cost->moneyreg;
                $jrunpis = $runpis * $cost->moneyreg;
                $jljpas  = $ljpas * $cost->moneyreg;
                $jljpis  = $ljpis * $cost->moneyreg;
                $jlbpas  = $lbpas * $cost->moneyreg;
                $jlbpis  = $lbpis * $cost->moneyreg;
                if ($lespa % 8 == 0) {
                    $lespa  = $lespa / 8;
                    $jlespa = $lespa * $cost->moneyregest;
                } else {
                    $lespa  = 0;
                    $jlespa = $lespa * $cost->moneyregest;
                }
                if ($lespi % 8 == 0) {
                    $lespi  = $lespi / 8;
                    $jlespi = $lespi * $cost->moneyregest;
                } else {
                    $lespi  = 0;
                    $jlespi = $lespi * $cost->moneyregest;
                }

                $jtotal = $jrunpas + $jrunpis + $jljpas + $jljpis + $jlbpas + $jlbpis + $jlespa + $jlespi;

                return View::make('costs.index')
                    ->withtitle("Biaya")
                    ->with('menu', $menu)
                    ->with('runpas', $runpas)
                    ->with('runpis', $runpis)
                    ->with('ljpas', $ljpas)
                    ->with('ljpis', $ljpis)
                    ->with('lbpas', $lbpas)
                    ->with('lbpis', $lbpis)
                    ->with('lespa', $lespa)
                    ->with('lespi', $lespi)
                    ->with('jrunpas', $jrunpas)
                    ->with('jrunpis', $jrunpis)
                    ->with('jljpas', $jljpas)
                    ->with('jljpis', $jljpis)
                    ->with('jlbpas', $jlbpas)
                    ->with('jlbpis', $jlbpis)
                    ->with('jlespa', $jlespa)
                    ->with('jlespi', $jlespi)
                    ->with('jtotal', $jtotal)
                    ->with('cost', $cost)
                    ->with('school', $school)
                    ->with('payment', $payment);
            }
        }
    }
}
