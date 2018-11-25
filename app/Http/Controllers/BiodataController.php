<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBiodataRequest;
use App\Http\Requests\UpdateBiodataRequest;
use App\Repositories\BiodataRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use App\Models\Agama;
use App\Models\Biodata;
use App\Models\Kontak;

class BiodataController extends AppBaseController
{
    /** @var  BiodataRepository */
    private $biodataRepository;

    public function __construct(BiodataRepository $biodataRepo)
    {
        $this->biodataRepository = $biodataRepo;
    }

    /**
     * Display a listing of the Biodata.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->biodataRepository->pushCriteria(new RequestCriteria($request));
        $biodatas = $this->biodataRepository->all();

        return view('biodatas.index')
            ->with('biodatas', $biodatas);
    }

    /**
     * Show the form for creating a new Biodata.
     *
     * @return Response
     */
    public function create()
    {
        $agamas =Agama::pluck('nama','id');
        return view('biodatas.create',
            compact('agamas'));
    }

    /**
     * Store a newly created Biodata in storage.
     *
     * @param CreateBiodataRequest $request
     *
     * @return Response
     */
    public function store(CreateBiodataRequest $request)
    {
        $input = $request->all();

        $biodata = $this->biodataRepository->create($input);

        Flash::success('Biodata saved successfully.');

        return redirect(route('biodatas.index'));
    }

    /**
     * Display the specified Biodata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $biodata = $this->biodataRepository->findWithoutFail($id);

        if (empty($biodata)) {
            Flash::error('Biodata not found');

            return redirect(route('biodatas.index'));
        }

        return view('biodatas.show')->with('biodata', $biodata);
    }

    /**
     * Show the form for editing the specified Biodata.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $biodata = $this->biodataRepository->findWithoutFail($id);

        if (empty($biodata)) {
            Flash::error('Biodata not found');

            return redirect(route('biodatas.index'));
        }

        return view('biodatas.edit')->with('biodata', $biodata);
    }

    /**
     * Update the specified Biodata in storage.
     *
     * @param  int              $id
     * @param UpdateBiodataRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBiodataRequest $request)
    {
        $biodata = $this->biodataRepository->findWithoutFail($id);

        if (empty($biodata)) {
            Flash::error('Biodata not found');

            return redirect(route('biodatas.index'));
        }

        $biodata = $this->biodataRepository->update($request->all(), $id);

        Flash::success('Biodata updated successfully.');

        return redirect(route('biodatas.index'));
    }

    /**
     * Remove the specified Biodata from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $biodata = $this->biodataRepository->findWithoutFail($id);

        if (empty($biodata)) {
            Flash::error('Biodata not found');

            return redirect(route('biodatas.index'));
        }

        $this->biodataRepository->delete($id);

        Flash::success('Biodata deleted successfully.');

        return redirect(route('biodatas.index'));
    }
}
