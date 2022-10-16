<?php

namespace App\Services;
use App\Services\WorkerService;
use App\Repositories\ShiftInterfaceImplementation;

class ShiftService{

    protected $shiftRepo;
    protected $workerService;

    public function __construct(ShiftInterfaceImplementation $shiftRepo, WorkerService $workerService){
        $this->shiftRepo = $shiftRepo;
        $this->workerService = $workerService;
    }


    public function getAll(){
        
        return $this->shiftRepo->index();
    }

    public function workerShiftById($id){

        return $this->shiftRepo->workerShiftById($id);

    }

    public function assign(array $data, $id){

        $worker = $this->workerService->getById($id);
        
        if($worker["code"]){
            return $worker;
        }

        return $this->shiftRepo->store($data, $worker);

    }

    public function update(array $data, $id){

        $worker = $this->workerService->getById($id);
        
        if($worker["code"]){
            return $worker;
        }
        return $this->shiftRepo->update($data, $worker);

    }

    public function destroy($id){

        $workerShift = $this->workerShiftById($id);
        
        if($workerShift["code"]){
            return $workerShift;
        }

        return $this->shiftRepo->destroy($workerShift);
    }


}

?>