<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserContactRequest;
use App\Repositories\UserContactRepository;
use App\Http\Resources\UserContactResource;
use Illuminate\Support\Facades\DB;
use App\Models\UserContact;

class UserContactController extends Controller
{
    protected $userContactRepository;

    public function __construct(UserContactRepository $userContactRepository)
    {
        $this->userContactRepository = $userContactRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserContactRequest $request)
    {
        Db::beginTransaction();
        try {
            $data = $request->only(['name', 'email', 'phone', 'feedback', 'option']);
            $userContact = $this->userContactRepository->create($data);
            DB::commit();
            return responseCreated(new UserContactResource($userContact));
        } catch(\Exception $exception) {
            DB::roolback();
            return responseError(500, $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
