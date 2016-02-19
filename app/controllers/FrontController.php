<?php

class FrontController extends \BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $tgl          = new DateTime(date('Y-m-d'));
        $limit        = Setting::first();
        $limitdtstart = new DateTime($limit->startdayreg);
        $limitdtend   = new DateTime($limit->enddayreg);
        $limitstart   = $limitdtstart->diff($tgl)->format('%R%a');
        $limitend     = $limitdtend->diff($tgl)->format('%R%a');

        $sponsors = Sponsor::all();

        if ($limitstart < 0) {
            $stat = 0;
            return View::make('front.index')
                ->with('stat', $stat)
                ->with('limit', $limit)
                ->with('sponsors', $sponsors);
        }

        if ($limitend > 0) {
            $stat = 0;
            return View::make('front.index')
                ->with('stat', $stat)
                ->with('limit', $limit)
                ->with('sponsors', $sponsors);
        }

        return View::make('front.index')
            ->with('stat', 1)
            ->with('limit', $limit)
            ->with('sponsors', $sponsors);
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

}
