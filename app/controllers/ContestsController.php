<?php

class ContestsController extends \BaseController
{

    /**
     * Display a listing of contests
     *
     * @return Response
     */
    public function index()
    {
        $date    = \Carbon\Carbon::now();
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $jenjang = Sentry::getUser()->last_name;
        $thn     = date('Y');
        $spay    = Payment::where('user_id', Sentry::getUser()->id)->where(DB::raw('year'), '=', date('Y'))->where('verifikasi', '1')->first();

        if ($jenjang === 'SMA') {
            $runpas = Contest::where('nocontest', 'Lari 100m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 100m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('tppas', $tppas)
                ->with('tppis', $tppis)
                ->with('ltpas', $ltpas)
                ->with('ltpis', $ltpis)
                ->with('thn', $thn)
                ->with('spay', $spay);
        } elseif ($jenjang === 'SMP') {
            $runpas = Contest::where('nocontest', 'Lari 60m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 60m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('tppas', $tppas)
                ->with('tppis', $tppis)
                ->with('ltpas', $ltpas)
                ->with('ltpis', $ltpis)
                ->with('thn', $thn)
                ->with('spay', $spay);
        } elseif ($jenjang === 'SD') {
            $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lbpas  = Contest::where('nocontest', 'Lempar Bola pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lbpis  = Contest::where('nocontest', 'Lempar Bola pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lespa  = Contest::where('nocontest', 'Lari Estafet pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lespi  = Contest::where('nocontest', 'Lari Estafet pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('lbpas', $lbpas)
                ->with('lbpis', $lbpis)
                ->with('lespa', $lespa)
                ->with('lespi', $lespi)
                ->with('thn', $thn)
                ->with('spay', $spay);
        }
    }

    public function indexthn()
    {
        $date    = \Carbon\Carbon::now();
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $jenjang = Sentry::getUser()->last_name;
        $thn     = Input::get('tahun');
        $spay    = Payment::where('user_id', Sentry::getUser()->id)->where(DB::raw('year'), '=', date('Y'))->where('verifikasi', '1')->first();

        if ($jenjang === 'SMA') {
            $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('tppas', $tppas)
                ->with('tppis', $tppis)
                ->with('ltpas', $ltpas)
                ->with('ltpis', $ltpis)
                ->with('thn', $thn)
                ->with('spay', $spay);
        } elseif ($jenjang === 'SMP') {
            $runpas = Contest::where('nocontest', 'Lari 60m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 60m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppas  = Contest::where('nocontest', 'Tolak Peluru pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $tppis  = Contest::where('nocontest', 'Tolak Peluru pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpas  = Contest::where('nocontest', 'Lompat Tinggi pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ltpis  = Contest::where('nocontest', 'Lompat Tinggi pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('tppas', $tppas)
                ->with('tppis', $tppis)
                ->with('ltpas', $ltpas)
                ->with('ltpis', $ltpis)
                ->with('thn', $thn)
                ->with('spay', $spay);
        } elseif ($jenjang == 'SD') {
            $runpas = Contest::where('nocontest', 'Lari 50m pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $runpis = Contest::where('nocontest', 'Lari 50m pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpas  = Contest::where('nocontest', 'Lompat Jauh pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $ljpis  = Contest::where('nocontest', 'Lompat Jauh pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lbpas  = Contest::where('nocontest', 'Lempar Bola pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lbpis  = Contest::where('nocontest', 'Lempar Bola pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lespa  = Contest::where('nocontest', 'Lari Estafet pa')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();
            $lespi  = Contest::where('nocontest', 'Lari Estafet pi')->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->get();

            return View::make('contests.index', compact('contests'))
                ->withTitle('Lomba')
                ->with('menu', $menu)
                ->with('runpas', $runpas)
                ->with('runpis', $runpis)
                ->with('ljpas', $ljpas)
                ->with('ljpis', $ljpis)
                ->with('lbpas', $lbpas)
                ->with('lbpis', $lbpis)
                ->with('lespa', $lespa)
                ->with('lespi', $lespi)
                ->with('thn', $thn)
                ->with('spay', $spay);
        }
    }

    public function create2($id)
    {
        $menu  = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $menus = Menu::find($id);
        $date  = \Carbon\Carbon::now();
        $thn   = date('Y');

        $tgl          = new DateTime(date('Y-m-d'));
        $limit        = Setting::first();
        $limitdtstart = new DateTime($limit->startdayreg);
        $limitdtend   = new DateTime($limit->enddayreg);
        $limitstart   = $limitdtstart->diff($tgl)->format('%R%a');
        $limitend     = $limitdtend->diff($tgl)->format('%R%a');

        $contest = Contest::where('nocontest', $menus->menu)->where('user_id', Sentry::getUser()->id)->where(DB::raw('tahun'), '=', $thn)->count();

        // dd($limitend);
        if ($limitstart < 0) {
            return Redirect::route('user.contests.index')->with('errorMessage', trans('Pendaftaran Lomba Belum Dibuka.'));
        }

        if ($limitend > 0) {
            return Redirect::route('user.contests.index')->with('errorMessage', trans('Pendaftaran Lomba Sudah Ditutup.'));
        }

        if ($contest < 2) {
            return View::make('contests.create')->withTitle('Estafet')->with('menu', $menu)->with('menus', $menus);
        } else {
            if ($menus->menu == 'Lari Estafet pa' and $contest < 8) {
                return View::make('contests.create')->withTitle('Estafet')->with('menu', $menu)->with('menus', $menus);
            } else if ($menus->menu == 'Lari Estafet pi' and $contest < 8) {
                return View::make('contests.create')->withTitle('Estafet')->with('menu', $menu)->with('menus', $menus);
            } else {
                return Redirect::route('user.contests.index')->with('errorMessage', trans('Lomba sudah penuh.'));
            }
        }

    }

    /**
     * Show the form for creating a new contest
     *
     * @return Response
     */
    // public function create()
    // {
    //     return View::make('contests.create')->withTitle('Admin');
    // }

    /**
     * Store a newly created contest in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Contest::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        } else {
            $date    = new \DateTime;
            $jenjang = Sentry::getUser()->last_name;
            $age     = date('Y') - date('Y', strtotime(input::get('tgllhr')));
            // $tahun = \Carbon\Carbon::now();

            if ($jenjang == 'SMA' and $age > 17) {
                return Redirect::back()->withErrors('Umur melebihi batas maksimal')->withInput();
            }

            if ($jenjang == 'SMP' and $age > 14) {
                return Redirect::back()->withErrors('Umur melebihi batas maksimal')->withInput();
            }

            if ($jenjang == 'SD' and $age > 11) {
                return Redirect::back()->withErrors('Umur melebihi batas maksimal')->withInput();
            }

            // isi field cover jika ada cover yang diupload
            if (Input::hasFile('foto') and Input::hasFile('rapor')) {
                $uploaded_file  = Input::file('foto');
                $uploaded_rapor = Input::file('rapor');
                // mengambil extension file
                $extension       = $uploaded_file->getClientOriginalExtension();
                $extension_rapor = $uploaded_rapor->getClientOriginalExtension();
                // membuat nama file random dengan extension
                $filename              = Input::get('nis') . '.' . $extension;
                $filename_rapor        = Input::get('nis') . '.' . $extension_rapor;
                $destinationPath       = public_path() . DIRECTORY_SEPARATOR . 'uploads/foto';
                $destinationPath_rapor = public_path() . DIRECTORY_SEPARATOR . 'uploads/rapor';
                // memindahkan file ke folder public/img
                $uploaded_file->move($destinationPath, $filename); // 25
                $uploaded_rapor->move($destinationPath_rapor, $filename_rapor); // 25

                $contest             = new Contest;
                $contest->nocontest  = input::get('nocontest');
                $contest->verifikasi = '0';
                $contest->name       = input::get('name');
                $contest->nis        = input::get('nis');
                $contest->tmptlhr    = input::get('tmptlhr');
                $contest->tgllhr     = input::get('tgllhr');
                $contest->tahun      = date('Y');
                $contest->nodada     = '';
                $contest->juara      = '-';
                $contest->jenjang    = Sentry::getUser()->last_name;
                $contest->foto       = $filename;
                $contest->rapor      = $filename_rapor;
                $contest->user_id    = Sentry::getUser()->id;
                $contest->sertifikat = Input::has('sertifikat') ? true : false;
                $contest->created_at = $date;
                $contest->updated_at = $date;
                $contest->save();

                return Redirect::route('user.contests.index')->with("successMessage", "Formulir berhasil disimpan");
            } else {
                return Redirect::back()->withErrors('File Foto dan/atau Rapor tidak ada')->withInput();
            }

            //Kerja::create($data);
        }
    }

    /**
     * Display the specified contest.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $contest = Contest::findOrFail(Crypt::decrypt($id));

        return View::make('contests.show', compact('contest'))->withTitle('Cetak');
    }

    /**
     * Show the form for editing the specified contest.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $contest = Contest::find(Crypt::decrypt($id));

        return View::make('contests.edit', compact('contest'))
            ->withTitle('Ubah')
            ->with('menu', $menu);
    }

    /**
     * Update the specified contest in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $contest = Contest::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Contest::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $age     = date('Y') - date('Y', strtotime(input::get('tgllhr')));
        $jenjang = Sentry::getUser()->last_name;

        if ($jenjang == 'SMA' and $age > 17) {
            return Redirect::back()->withErrors('Batas usia maksimum berusia 17 tahun')->withInput();
        }

        if ($jenjang == 'SMP' and $age > 14) {
            return Redirect::back()->withErrors('Batas usia maksimum berusia 14 tahun')->withInput();
        }

        if ($jenjang == 'SD' and $age > 11) {
            return Redirect::back()->withErrors('Batas usia maksimum berusia 11 tahun')->withInput();
        }

        if (Input::hasFile('foto')) {
            $uploaded_file = Input::file('foto');
            // mengambil extension file
            $extension = $uploaded_file->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename        = Input::get('nis') . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/foto';
            // memindahkan file ke folder public/img
            $uploaded_file->move($destinationPath, $filename); // 25
            // ganti field cover dengan cover yang baru

            $contest->foto = $filename;
        }

        if (Input::hasFile('rapor')) {
            $uploaded_rapor = Input::file('rapor');
            // mengambil extension file
            $extension_rapor = $uploaded_rapor->getClientOriginalExtension();
            // membuat nama file random dengan extension
            $filename_rapor        = Input::get('nis') . '.' . $extension_rapor;
            $destinationPath_rapor = public_path() . DIRECTORY_SEPARATOR . 'uploads/rapor';
            // memindahkan file ke folder public/img
            $uploaded_rapor->move($destinationPath_rapor, $filename_rapor); // 25
            // ganti field cover dengan cover yang baru

            $contest->rapor = $filename_rapor;
        }

        $contest['sertifikat'] = Input::has('sertifikat') ? true : false;
        if (!$contest->update(Input::except('foto', 'rapor')) && $contest['sertifikat'] = Input::has('sertifikat') ? true : false) {
            return Redirect::back();
        }
        // $contest->update($data);

        return Redirect::route('user.contests.index')->with("successMessage", "Data formulir berhasil diubah");
        // return Redirect::route('contests.index');
    }

    /**
     * Remove the specified contest from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $contest               = Contest::findOrFail($id);
        $destinationPath       = public_path() . DIRECTORY_SEPARATOR . 'uploads/foto' . DIRECTORY_SEPARATOR . $contest->foto;
        $destinationPath_rapor = public_path() . DIRECTORY_SEPARATOR . 'uploads/rapor' . DIRECTORY_SEPARATOR . $contest->rapor;
        try {
            File::delete($destinationPath);
            File::delete($destinationPath_rapor);
        } catch (FileNotFound $e) {
            // File sudah dihapus/tidak ada
        }
        Contest::destroy($id);

        return Redirect::route('user.contests.index')->with("successMessage", "Data formulir berhasil dihapus");
    }
}
