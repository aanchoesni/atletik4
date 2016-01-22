<?php

class ValidController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        Session::put('statusvalid', Input::get('statvalid'));
        $vstatusvalid = Session::get('statusvalid');

        $payments = Payment::where('year', date('Y'))->where('verifikasi', $vstatusvalid)->get();

        return View::make('valid.index', compact('payments'))->with('stat', $vstatusvalid)->withTitle('Validasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function validasi($id)
    {
        //Start - update status validasi
        $payment = Payment::findOrFail($id);

        $data['verifikasi'] = 1;
        $payment->update($data);
        //End - upate status validasi

        //Start - ambil data atlit yang sudah terverifikasi berdasarkan tahun
        $getatlit = Contest::where('user_id', $payment->user_id)->where('tahun', date('Y'))->where('verifikasi', '1')->get();
        //End - ambil data atlit yang sudah terverifikasi berdasarkan tahun

        //Start - ambil jumlah data atlit yang sudah terverifikasi berdasarkan tahun
        $getsumatlit = Contest::where('user_id', $payment->user_id)->where('tahun', date('Y'))->where('verifikasi', '1')->count();
        //End - ambil jumlah data atlit yang sudah terverifikasi berdasarkan tahun

        //Start - lihat jenjang dari bukti pembayaran
        $jenjang = Payment::where('id', $id)->with('Akun')->first();
        //End - lihat jenjang dari bukti pembayaran

        for ($i = 0; $i < $getsumatlit; $i++) {
            //Start - Ambil urutan nomor dada sesuai jenjang
            $posno     = Sequent::where('jenjang', $jenjang->Akun->last_name)->first();
            $nodadanow = $posno->number + 1;
            //End - Ambil urutan nomor dada sesuai jenjang

            //Start - Ambil 1 altit yang akan diberikan nomor dengan mengambil id
            $getatlit   = Contest::where('user_id', $payment->user_id)->where('tahun', date('Y'))->where('verifikasi', '1')->skip($i)->take(1)->first();
            $getidatlit = $getatlit->id;
            //End - Ambil 1 altit yang akan diberikan nomor dengan mengambil id

            //Start - Update atlit dengan memberi nomor dada
            $contest          = Contest::findOrFail($getidatlit);
            $nodada['nodada'] = str_pad($nodadanow, 3, '0', STR_PAD_LEFT);
            $contest->update($nodada);
            //End - Update atlit dengan memberi nomor dada

            //Start - Update nomer pada table sequent
            $sequent          = Sequent::findOrFail($posno->id);
            $datano['number'] = $nodadanow;
            $sequent->update($datano);
            //End - Update nomer pada table sequent
        }
        return Redirect::to('admin/valid' . '?statvalid=' . Session::get('statusvalid'))->with("successMessage", "Berhasil divalidasi");
    }

    public function notvalidasi($id)
    {
        $payment = Payment::findOrFail($id);

        $data['verifikasi'] = 0;
        $payment->update($data);

        return Redirect::to('admin/valid' . '?statvalid=' . Session::get('statusvalid'))->with("successMessage", "Berhasil membatalkan validasi");
    }
}
