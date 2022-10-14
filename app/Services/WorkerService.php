<?php

namespace App\Services;
use App\Repositories\WorkerInterfaceImplementation;

class WorkerService{

    protected $workerRepo;

    public function __construct(WorkerInterfaceImplementation $workerRepo){
        $this->workerRepo = $workerRepo;
    }


    public function getAll(){
        
        return $this->workerRepo->index();
    }

    public function save(array $data){
    
        return $this->workerRepo->store($data);
    }

    public function getById($id){
    
        return $this->workerRepo->show($id);
    }

    public function update(array $data, $id){

        $worker = $this->getById($id);
        
        if($worker["code"]){
            return $worker;
        }

        return $this->workerRepo->update($data, $worker);

    }

    public function destroy($id){

        $worker = $this->getById($id);
        
        if($worker["code"]){
            return $worker;
        }
        return $this->workerRepo->destroy($worker);
    }


}

?>