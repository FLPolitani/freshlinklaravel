<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateKontaksRequest;
use App\Http\Requests\UpdateKontaksRequest;
use App\Repositories\KontaksRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class KontaksController extends AppBaseController
{
    /** @var  KontaksRepository */
    private $kontaksRepository;

    public function __construct(KontaksRepository $kontaksRepo)
    {
        $this->kontaksRepository = $kontaksRepo;
    }

    /**
     * Display a listing of the Kontaks.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->kontaksRepository->pushCriteria(new RequestCriteria($request));
        $kontaks = $this->kontaksRepository->all();

        return view('kontaks.index')
            ->with('kontaks', $kontaks);
    }

    /**
     * Show the form for creating a new Kontaks.
     *
     * @return Response
     */
    public function create()
    {
        return view('kontaks.create');
    }

    /**
     * Store a newly created Kontaks in storage.
     *
     * @param CreateKontaksRequest $request
     *
     * @return Response
     */
    public function store(CreateKontaksRequest $request)
    {
        $input = $request->all();

        $kontaks = $this->kontaksRepository->create($input);

        Flash::success('Kontaks saved successfully.');

        return redirect(route('kontaks.index'));
    }

    /**
     * Display the specified Kontaks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            Flash::error('Kontaks not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.show')->with('kontaks', $kontaks);
    }

    /**
     * Show the form for editing the specified Kontaks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            Flash::error('Kontaks not found');

            return redirect(route('kontaks.index'));
        }

        return view('kontaks.edit')->with('kontaks', $kontaks);
    }

    /**
     * Update the specified Kontaks in storage.
     *
     * @param  int              $id
     * @param UpdateKontaksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateKontaksRequest $request)
    {
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            Flash::error('Kontaks not found');

            return redirect(route('kontaks.index'));
        }

        $kontaks = $this->kontaksRepository->update($request->all(), $id);

        Flash::success('Kontaks updated successfully.');

        return redirect(route('kontaks.index'));
    }

    /**
     * Remove the specified Kontaks from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $kontaks = $this->kontaksRepository->findWithoutFail($id);

        if (empty($kontaks)) {
            Flash::error('Kontaks not found');

            return redirect(route('kontaks.index'));
        }

        $this->kontaksRepository->delete($id);

        Flash::success('Kontaks deleted successfully.');

        return redirect(route('kontaks.index'));
    }
}
