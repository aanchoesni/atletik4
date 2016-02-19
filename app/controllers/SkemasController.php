<?php

class SkemasController extends \BaseController
{

    /**
     * Display a listing of skemas
     *
     * @return Response
     */
    public function index()
    {
        $skemas = Skema::with('Contest')->get();

        return View::make('skemas.index', compact('skemas'))->withTitle('Skema');
    }

    public function kelolaskema()
    {
        Session::put('sktahun', Input::get('tahun'));
        Session::put('sklomba', Input::get('nocontest'));
        Session::put('skjenjang', Input::get('jenjang'));

        $skemas = Skema::where('tahun', Session::get('sktahun'))->where('jenjang', Session::get('skjenjang'))->where('lomba', Session::get('sklomba'))->with('Contest')->get();

        return View::make('skemas.indexdetail', compact('skemas'))->withTitle('Skema');
    }

    public function indexcetak()
    {
        return View::make('skemas.indexcetak')->withTitle('Skema');
    }

    public function exportskema()
    {
        $date = \Carbon\Carbon::now();
        Session::put('skctahun', Input::get('tahun'));
        Session::put('skclomba', Input::get('nocontest'));
        Session::put('skcjenjang', Input::get('jenjang'));
        Session::put('skcseri', Input::get('seri'));
        Session::put('skctipe', Input::get('tipe'));

        $tipe = Input::get('tipe');

        $skemas = Skema::where('tahun', Session::get('skctahun'))->where('jenjang', Session::get('skcjenjang'))->where('lomba', Session::get('skclomba'))->where('seri', Session::get('skcseri'))->orderBy('nolint', 'asc')->with('Contest')->get();

        $output = Input::get('output');
        switch ($output) {
            case 'PDF':
                return $this->exportPdfskema($skemas, $tipe);
                break;
            case 'EXCEL':
                return $this->exportExcelskema($skemas);
                break;
            default:
                break;
        }
    }

    private function exportPdfskema($skemas, $tipe)
    {
        $name          = Session::get('skclomba') . '_' . Session::get('skcseri') . '.pdf';
        $data['datas'] = $skemas;
        if ($tipe == 'nolint') {
            $pdf = PDF::loadView('skemas.cetaklint', $data)->setPaper('a4')->setOrientation('portrait');
        }
        if ($tipe == 'nourut') {
            $pdf = PDF::loadView('skemas.cetakurut', $data)->setPaper('a4')->setOrientation('portrait');
        }
        return $pdf->download($name);
    }

    private function exportExcelskema($skemas)
    {
        $name = Session::get('skclomba') . '_' . Session::get('skcseri');
        Excel::create($name, function ($excel) use ($skemas) {
            // Set the properties
            $name = Session::get('skclomba') . '_' . Session::get('skcseri');
            $excel->setTitle($name)
                ->setCreator('Atletik Unesa ' . date('Y')); $excel->sheet($name, function ($sheet) use ($skemas) {

                if (Session::get('skcjenjang') == 'SD') {
                    $jenjang = 'SD SEDERAJAT';
                } elseif (Session::get('skcjenjang') == 'SMP') {
                    $jenjang = 'SMP SEDERAJAT';
                } elseif (Session::get('skcjenjang') == 'SMA') {
                    $jenjang = 'SMA SEDERAJAT';
                }

                $sheet->mergeCells('A1:G1')
                    ->row(1, array('URUTAN ACARA TINGKAT ' . $jenjang));
                $sheet->mergeCells('A2:G2')
                    ->row(2, array('KEJUARAAN ATLETIK UNESA TAHUN ' . Session::get('skctahun')));
                $sheet->mergeCells('A3:G3')
                    ->row(3, array(Session::get('skclomba') . Session::get('skcseri')));
                $row = 5;

                if (Session::get('skctipe') == 'nolint') {
                    $ftipe = 'No. Lint';
                } elseif (Session::get('skctipe') == 'nourut') {
                    $ftipe = 'No. Urut';
                }

                $sheet->row($row, array(
                    $ftipe,
                    'No. Dada',
                    'Nama Siswa',
                    'Tahun',
                    'Asal Sekolah',
                    'Hasil',
                    'Urutan',
                ));
                foreach ($skemas as $value) {
                    $sheet->row(++$row, array(
                        $value->nolint,
                        $value->contest->nodada,
                        $value->contest->name,
                        date('Y', strtotime($value->contest->tgllhr)),
                        $value->contest->akun->first_name,
                    ));
                }
            });
        })->export('xls');

    }

    /**
     * Show the form for creating a new skema
     *
     * @return Response
     */
    public function create()
    {
        return View::make('skemas.create');
    }

    /**
     * Store a newly created skema in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Skema::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $data['tahun']   = Session::get('sktahun');
        $data['jenjang'] = Session::get('skjenjang');
        $data['lomba']   = Session::get('sklomba');
        Skema::create($data);

        return Redirect::to('admin/kelolaskema' . '?tahun=' . Session::get('sktahun') . '&jenjang=' . Session::get('skjenjang') . '&nocontest=' . Session::get('sklomba'))->withTitle('Skema');
        // return Redirect::route('admin.kelolaskema')->withTitle('Skema');
    }

    /**
     * Display the specified skema.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $skema = Skema::findOrFail($id);

        return View::make('skemas.show', compact('skema'));
    }

    /**
     * Show the form for editing the specified skema.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $skema = Skema::find($id);

        return View::make('skemas.edit', compact('skema'));
    }

    /**
     * Update the specified skema in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $skema = Skema::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Skema::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $skema->update($data);

        return Redirect::route('skemas.index');
    }

    /**
     * Remove the specified skema from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        Skema::destroy($id);

        return Redirect::to('admin/kelolaskema' . '?tahun=' . Session::get('sktahun') . '&jenjang=' . Session::get('skjenjang') . '&nocontest=' . Session::get('sklomba'))->withTitle('Skema');
    }

    public function postData()
    {
        switch (Input::get('type')):
    case 'nocontest':
        $return = '<option value=""></option>';
        foreach (Menu::where('tipe', Input::get('id'))->get() as $row) {
                $return .= "<option value='$row->menu'>$row->menu</option>";
        }

        return $return;
        break;
        endswitch;
    }

}
