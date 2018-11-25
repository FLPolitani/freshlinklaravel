<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\ChangePasswordUserAPIRequest;
use App\Http\Requests\API\CreateUserAPIRequest;
use App\Http\Requests\API\ResetPasswordUserAPIRequest;
use App\Http\Requests\API\UpdateUserAPIRequest;
use App\Mail\NewUserEmail;
use App\Mail\ResetPasswordEmail;
use App\Models\Pembeli;
use App\Role;
use App\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Mockery\Exception;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class UserController
 * @package App\Http\Controllers\API
 */

class UserAPIController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/users",
     *      summary="Get a listing of the Users.",
     *      tags={"User"},
     *      description="Get all Users",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/User")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    /*    public function index(Request $request)
        {
            $this->userRepository->pushCriteria(new RequestCriteria($request));
            $this->userRepository->pushCriteria(new LimitOffsetCriteria($request));
            $users = $this->userRepository->all();

            return $this->sendResponse($users->toArray(), 'Users retrieved successfully');
        }*/

    /**
     * @param CreateUserAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/users",
     *      summary="Store a newly created User in storage",
     *      tags={"User"},
     *      description="Store User",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="User that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/User")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/User"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateUserAPIRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();
            $users = $this->userRepository->create([
                'name'=>$input['name'],
                'email'=>$input['email'],
                'password'=>bcrypt($input['password'])
            ]);

            $role = Role::where('name', 'pembeli')->firstOrFail();
            $users->attachRole($role);

            $data['users_id'] = $users->id;
            Pembeli::create($data);

            if( !is_null($users->email) && !isset($users->email) ){
                try{
                    Mail::to($users->email)->send(new NewUserEmail($users));
                }catch (\Exception $e){}
            }

            DB::commit();
            return $this->sendResponse($users->toArray(), 'User saved successfully');
        }catch (Exception $e){
            DB::rollBack();
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/users/{id}",
     *      summary="Display the specified User",
     *      tags={"User"},
     *      description="Get User",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of User",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/User"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show()
    {
        /** @var User $user */
        $user = Auth::user();

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        return $this->sendResponse($user->toArray(), 'User retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateUserAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/users/{id}",
     *      summary="Update the specified User in storage",
     *      tags={"User"},
     *      description="Update User",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of User",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="User that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/User")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/User"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update(UpdateUserAPIRequest $request)
    {


        /** @var User $user */
        $user = Auth::user();

        if (empty($user)) {
            return $this->sendError('User not found');
        }

        try{
            DB::beginTransaction();

            $user = User::find(Auth::id());


            DB::commit();
            return $this->sendResponse($user->toArray(), 'User updated successfully');

        }catch (Exception $e){
            DB::rollBack();
            return $this->sendError("Update Data Gagal. Karena :".$e->getMessage());
        }
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/users/{id}",
     *      summary="Remove the specified User from storage",
     *      tags={"User"},
     *      description="Delete User",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of User",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    /*    public function destroy($id)
        {

            $user = $this->userRepository->findWithoutFail($id);

            if (empty($user)) {
                return $this->sendError('User not found');
            }

            $user->delete();

            return $this->sendResponse($id, 'User deleted successfully');
        }*/

    public function storeTokenDevice(Request $request)
    {
        $input = $request->only('token_device');

        try {
            DB::beginTransaction();

            $users=Auth::user();
            $users->token_device=$input['token_device'];
            $users->save();

            DB::commit();
            return $this->sendResponse($users->toArray(), 'User saved successfully');
        }catch (Exception $e){
            DB::rollBack();
            return $this->sendError($e->getMessage());
        }
    }

    public function changePassword(ChangePasswordUserAPIRequest $request)
    {
        $request_data = $request->only(['current-password','password','password_confirmation']);

        $current_password = Auth::User()->password;
        if(Hash::check($request_data['current-password'], $current_password))
        {
            $user_id = Auth::User()->id;
            $user = User::find($user_id);
            $user->password = bcrypt($request_data['password']);
            $user->save();
            return $this->sendResponse($user->toArray(), 'Password has changed successfully');
        }
        else
        {
            return $this->sendError("Password Salah");
        }
    }

    public function resetPassword(ResetPasswordUserAPIRequest $request)
    {
        $input = $request->only(['email']);

        $user = User::where('email',$input['email'])->first();

        if (empty($user)) {
            return $this->sendError('User dengan email tidak ditemukan');
        }

        try {
            DB::beginTransaction();
            $generatePassword=$this->generateRandomString(7);
            $user->password = bcrypt($generatePassword);
            $user->save();
            $data=['password'=>$generatePassword];
            Mail::to($user->email)->send(new ResetPasswordEmail($data));

            DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            return $this->sendError($e->getMessage());
        }
        return $this->sendResponse("Silahkan cek email inbox/spam ".$user->email,"Password berhasil di reset");
    }

    public function generateRandomString($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
