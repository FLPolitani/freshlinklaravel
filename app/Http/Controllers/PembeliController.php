<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePembeliRequest;
use App\Http\Requests\UpdatePembeliRequest;
use App\Repositories\PembeliRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class PembeliController extends AppBaseController
{
    /** @var  PembeliRepository */
    private $pembeliRepository;

    public function __construct(PembeliRepository $pembeliRepo)
    {
        $this->pembeliRepository = $pembeliRepo;
    }

    /**
     * Display a listing of the Pembeli.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->pembeliRepository->pushCriteria(new RequestCriteria($request));
        $pembelis = $this->pembeliRepository->all();

        return view('pembelis.index')
            ->with('pembelis', $pembelis);
    }

    /**
     * Show the form for creating a new Pembeli.
     *
     * @return Response
     */
    public function create()
    {
        return view('pembelis.create');
    }

    /**
     * Store a newly created Pembeli in storage.
     *
     * @param CreatePembeliRequest $request
     *
     * @return Response
     */
    public function store(CreatePembeliRequest $request)
    {
        $input = $request->all();
        $user = User::pluck('name','users_id');

        $pembeli = $this->pembeliRepository->create($input);

        Flash::success('Pembeli saved successfully.');

        return redirect(route('pembelis.index'),compact('user'));
    }

    /**
     * Display the specified Pembeli.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        return view('pembelis.show')->with('pembeli', $pembeli);
    }

    /**
     * Show the form for editing the specified Pembeli.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        return view('pembelis.edit')->with('pembeli', $pembeli);
    }

    /**
     * Update the specified Pembeli in storage.
     *
     * @param  int              $id
     * @param UpdatePembeliRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePembeliRequest $request)
    {
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        $pembeli = $this->pembeliRepository->update($request->all(), $id);

        Flash::success('Pembeli updated successfully.');

        return redirect(route('pembelis.index'));
    }

    /**
     * Remove the specified Pembeli from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $pembeli = $this->pembeliRepository->findWithoutFail($id);

        if (empty($pembeli)) {
            Flash::error('Pembeli not found');

            return redirect(route('pembelis.index'));
        }

        $this->pembeliRepository->delete($id);

        Flash::success('Pembeli deleted successfully.');

        return redirect(route('pembelis.index'));
    }
}
