<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\WorkerShift;
use App\Http\Controllers\BaseController;
use App\Http\Requests\CreateWorkerRequest;
use App\Http\Requests\UpdateWorkerRequest;
use App\Http\Resources\WorkerResource;
use Exception;
use App\Services\WorkerService;

class WorkerController extends BaseController
{


    protected $workerService;

    public function __construct(WorkerService $workerService){
        $this->workerService = $workerService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $workers = $this->workerService->getAll();
            return $this->sendResponse(WorkerResource::collection($workers), "success");
            
        }catch(Exception $e){
            return $this->sendError($e->getMessage(),[],500); 
        }
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
    public function store(CreateWorkerRequest $request){
 
        try{

            $worker = $this->workerService->save($request->all());

            return $this->sendResponse(new WorkerResource($worker), "success");
            
        }catch(Exception $e){
            return $this->sendError($e->getMessage(),[],500); 
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
        try{

            $data = $this->workerService->getById($id);
            
            if($data["code"]){
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse(new WorkerResource($data), "success");

        }catch(Exception $e){
            
            return $this->sendError($e->getMessage(),[],500); 
        }
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
    public function update(UpdateWorkerRequest $request, $id){
        try{

            $data = $this->workerService->update($request->all(), $id);
     
            if($data["code"]){
               
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse(new WorkerResource($data), "success");

        }catch(Exception $e){
            return $this->sendError($e->getMessage(),[],500); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{

            $data = $this->workerService->destroy($id);
   
            if($data["code"] == 500){
               
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse("", $data["message"]);

        }catch(Exception $e){
            return $this->sendError($e->getMessage(),[],500); 
        }
    }
}
