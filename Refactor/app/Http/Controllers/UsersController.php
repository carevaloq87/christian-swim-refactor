<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;

class UsersController extends Controller
{

    /**
     * Display a listing of the users.
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function index()
    {
        //Ignoring pagination as the code do not suggest to use it
        return User::get();
    }

    /**
     * Display the specified users.
     *
     * @param int $id
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //Won't use findOrFail because the use case suggest that
        //Is needed to send null instead of a 404 page when the
        //user do not exist - Do not affect the existing func...
        $user = User::find($id);

        return $user;
    }

    /**
     * Display pets for the specified users.
     *
     * @param int $id
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function pets($id)
    {
        //Won't use findOrFail because the use case suggest that
        //Is needed to send null instead of a 404 page when the
        //user do not exist - Do not affect the existing func...
        $pets = [];
        $user = User::find($id);
        if($user) {
            $pets = $user->pets;
        }
        return $pets;
    }

    /**
     * Store a new users in the storage.
     *
     * @param Illuminate\Http\Request $request
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            //$input = $request->except(['password', 'username', 'api_token']);
            //$input = $request->only(['first_name', 'middle_name', 'last_name', 'email', 'contact_number']);

            $data = $this->getData($request);
            $data['disabled'] = false; //Shoud be added as a Constant in the top as a good practice

            $user = User::create($data);
            return $user;

        } catch (Exception $exception) {
            //Usually an error should be provided in order to infor users
            //$exception->getMessage() should be used to give better feedback
            return null;
        }
    }

    /**
     * Remove the specified pet for a given user.
     * it is also validating that the pet belongs to the user
     *
     * @param int $user_id
     * @param int $pet_id
     *
     * @return Illuminate\Http\JsonResponse
     */
    public function destroy($user_id, $pet_id)
    {
        try {
            $user = User::find($user_id);

            if($user) {
                $pet = $user->pets->find($pet_id);
                if($pet){
                    $pet->delete();
                } else {
                    return 'Pet not found or do not belong to the user';
                }
            } else {
                return 'User not found';
            }
            return null;
        } catch (Exception $exception) {
            return null;
        }
    }


    /**
     * Get the request's data from the request.
     *
     * @param Illuminate\Http\Request\Request $request
     * @return array
     */
    protected function getData(Request $request)
    {
        $rules = [
            'first_name' => 'required|max:64',
            'middle_name' => 'max:64',
            'last_name' => 'required|max:64',
            'email' => 'required|unique:users|max:256',
            'contact_number' => '',
        ];

        $data = $request->validate($rules);
        return $data;
    }

}
