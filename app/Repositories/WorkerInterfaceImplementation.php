<?php 

namespace App\Repositories;

use App\Interfaces\WorkerInterface;
use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\WorkerShift;

class WorkerInterfaceImplementation implements WorkerInterface{

    public function index(){
            
            return Worker::all();
      
    }

    public function store(array $data){
          
            $worker = Worker::create([
                "name" => $data["name"],
                "email" => $data["email"],
                "phone" => $data["phone"],
                "timezone_id" => $data["timezoneId"]
            ]);
            
            return $worker;    
    }

    public function show($id){
 
            $worker = Worker::find($id);

            if(!$worker){
<<<<<<< HEAD
                
=======

>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
                $response = [
                    "message" => "worker is not exist",
                    "code" => 500
                ];
                return $response;
            }
    
            return $worker;    
    }

    public function update(array $data, $worker){
  
            $worker->update([
                "name" => $data["name"],
                "email" => $data["email"],
                "phone" => $data["phone"],
                "timezone_id" => $data["timezoneId"]
            ]);
            
            return $worker;

    }

    public function destroy($worker){
   
            WorkerShift::where('worker_id',$worker)->delete();
            $worker->delete();
    
            return ["message" => "Deleted!", "code" => 200];

    }

}

?>
