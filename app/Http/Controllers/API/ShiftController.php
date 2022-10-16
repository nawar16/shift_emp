<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Worker;
use App\Models\WorkerShift;
use App\Http\Controllers\BaseController;
use App\Http\Requests\AssignShiftRequest;
use App\Http\Requests\UpdateShiftRequest;
use App\Http\Resources\WorkerResource;
use App\Repositories\ShiftInterfaceImplementation;
use Exception;
use App\Services\ShiftService;

class ShiftController extends BaseController
{
    protected $shiftService;

    public function __construct(ShiftService $shiftService){
        $this->shiftService = $shiftService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{

            $shifts = $this->shiftService->getAll();
            return $this->sendResponse($shifts, "success");
            
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
    public function store(Request $request){
        //
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
    public function update(UpdateShiftRequest $request, $id){
  
        try{

            $data = $this->shiftService->update($request->all(), $id);
            
            if($data["code"] == 500){
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse(new WorkerResource($data["data"]), $data["message"]);

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

            $data = $this->shiftService->destroy($id);
   
            if($data["code"] == 500){
               
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse("", $data["message"]);

        }catch(Exception $e){
            return $this->sendError($e->getMessage(),[],500); 
        }
    }

    
    public function assignShifts(AssignShiftRequest $request, $id){

        try{

            $data = $this->shiftService->assign($request->all(), $id);
            
            if($data["code"] == 500){
                return $this->sendError($data["message"], [], $data["code"]);
            }

            return $this->sendResponse(new WorkerResource($data["data"]), $data["message"]);

        }catch(Exception $e){
            
            return $this->sendError($e->getMessage(),[],500); 
        }
    }
}
