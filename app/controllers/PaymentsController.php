<?php

class PaymentsController extends \BaseController
{

    /**
     * Display a listing of payments
     *
     * @return Response
     */
    public function index()
    {
        $payments = Payment::all();

        return View::make('payments.index', compact('payments'));
    }

    /**
     * Show the form for creating a new payment
     *
     * @return Response
     */
    public function create()
    {
        $tgl        = new DateTime(date('Y-m-d'));
        $limit      = Setting::first();
        $limitdtend = new DateTime($limit->enddaypay);
        $limitend   = $limitdtend->diff($tgl)->format('%R%a');

        $menu    = Menu::where('tipe', Sentry::getUser()->last_name)->get();
        $jstotal = Session::get('jstotal');

        if ($limitend > 0) {
            return Redirect::to('user/cost')->with('errorMessage', trans('Pembayaran Sudah Ditutup.'));
        }

        return View::make('payments.create')->withTitle('Payment')->with('menu', $menu)->with('jstotal', $jstotal);
    }

    /**
     * Store a newly created payment in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), Payment::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        if (Input::hasFile('attachment')) {
            $no              = Payment::max('id') + 1;
            $noinvoice       = 'AT' . date('Ymd') . $no;
            $uploaded_file   = Input::file('attachment');
            $extension       = $uploaded_file->getClientOriginalExtension();
            $filename        = Sentry::getUser()->first_name . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'uploads/payments';
            $uploaded_file->move($destinationPath, $filename); // 25

            $data['noinvoice']  = $noinvoice;
            $data['attachment'] = $filename;
            $data['school']     = Sentry::getUser()->first_name;
            $data['year']       = date('Y');
            $data['verifikasi'] = 0;
            $data['user_id']    = Sentry::getUser()->id;
            Payment::create($data);

            return Redirect::to('user/cost')->with("successMessage", "Konfirmasi Pembayaran berhasil dimasukkan");
        }
    }

    /**
     * Display the specified payment.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $payment = Payment::findOrFail($id);

        return View::make('payments.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified payment.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $payment = Payment::find($id);

        return View::make('payments.edit', compact('payment'));
    }

    /**
     * Update the specified payment in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $payment = Payment::findOrFail($id);

        $validator = Validator::make($data = Input::all(), Payment::$rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $payment->update($data);

        return Redirect::route('payments.index');
    }

    /**
     * Remove the specified payment from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroyer($id)
    {
        Payment::destroy($id);

        return Redirect::route('admin.valid')->with('successMessage', 'Konfirmasi pembayaran berhasil dibatalkan');
    }

}
