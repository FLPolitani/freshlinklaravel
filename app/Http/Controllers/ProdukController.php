<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\DataUsaha;
use App\Models\JenisProduk;
use App\Models\Kategori;
use App\Models\Produk;
use App\Models\Satuan;
use App\Repositories\ProdukRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use League\Flysystem\Exception;
use Illuminate\Support\Facades\File;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class ProdukController extends AppBaseController
{
    /** @var  ProdukRepository */
    private $produkRepository;

    public function __construct(ProdukRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
    }

    /**
     * Display a listing of the Produk.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produkRepository->pushCriteria(new RequestCriteria($request));
        $produks = $this->produkRepository->all();

        return view('produks.index')
            ->with('produks', $produks);
    }

    /**
     * Show the form for creating a new Produk.
     *
     * @return Response
     */
    public function create()
    {
        $jenisProduk = JenisProduk::pluck('nama_jenis_produk','id');
        $satuanTerkecil = Satuan::pluck('nama','id');
        $kategori = Kategori::pluck('nama','id');
        return view('produks.create',compact('jenisProduk','satuanTerkecil','kategori'));
    }

    /**
     * Store a newly created Produk in storage.
     *
     * @param CreateProdukRequest $request
     *
     * @return Response
     */
    public function store(CreateProdukRequest $request)
    {
        $input = $request->all();

        //return $input;
        //$produk = $this->produkRepository->create($input);

        try{
            DB::beginTransaction();
            $produk = Produk::create($input);

            $path = null;

            if( $request->hasFile('foto')) {
                $ext=File::extension($request->file('foto')->getClientOriginalName());
                $filename='foto'.$produk->id.'.'.$ext;
                $path = $request->foto->storeAs('foto', $filename,'local_public');
                chmod(public_path().'/'.$path, 0777);
            }
            if($path!=null){
                $produk->foto=$path;
                $produk->save();
            }

            DB::commit();

            Flash::success('Produk saved successfully.');
        }catch (Exception $e){
            DB::rollback();
            Flash::error('Produk gagal disimpan.');
        }



        return redirect(route('produks.index'));
    }

    /**
     * Display the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);


        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified Produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        $jenisProduk = JenisProduk::pluck('nama_jenis_produk','id');
        $satuanTerkecil = Satuan::pluck('nama','id');
        $kategori = Kategori::pluck('nama','id');

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        return view('produks.edit',compact('jenisProduk','satuanTerkecil','kategori','produk'));
    }

    /**
     * Update the specified Produk in storage.
     *
     * @param  int              $id
     * @param UpdateProdukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProdukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        //$produks = $this->produkRepository->update($request->all(), $id);

        $requestData=$request->all();

        try{
            DB::beginTransaction();
            $produks = Produk::where('id',$id)->firstOrFail();
            $produks->update($requestData);

            $path = null;

            if( $request->hasFile('foto')) {
                $ext=File::extension($request->file('foto')->getClientOriginalName());
                $filename='foto'.$produks->id.'.'.$ext;
                $path = $request->foto->storeAs('foto', $filename,'local_public');
                chmod(public_path().'/'.$path, 0777);
            }
            if($path!=null){
                $produks->foto=$path;
                $produks->save();
            }

            DB::commit();

            Flash::success('Produk updated successfully.');

        }catch (Exception $e){
            DB::rollback();
        }

        return redirect(route('produks.index'));
    }

    /**
     * Remove the specified Produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk not found');

            return redirect(route('produks.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk deleted successfully.');

        return redirect(route('produks.index'));
    }
}
