<?php 

namespace App\Repositories;

use App\Interfaces\ShiftInterface;
use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Worker;
use App\Models\WorkerShift;
use Exception;

class ShiftInterfaceImplementation implements ShiftInterface{

    public function index(){
    
            $shifts = Shift::all();
    
            return $shifts;

    }

    public function workerShiftById($id){

        $workerShift = WorkerShift::find($id);

        if(!$workerShift){

            $response = [
                "message" => "Worker Shift isn't exist",
                "code" => 500
            ];
            return $response;
        }
        return $workerShift;
    }

    public function store(array $request, $worker){

            $failed = array();
            $success = array();
    
            foreach($request["workerShifts"] as $workerShift){
                $shift = Shift::find($workerShift['shiftId']);
                $existShift = WorkerShift::where('worker_id', $worker->id)->where('shift_day', date('Y-m-d',strtotime($workerShift['shiftDay'])))->first();
                if(strtotime($shift->start) < strtotime(date("H:i:s")) && date("Y-m-d") == date('Y-m-d',strtotime($workerShift['shiftDay']))){
                   
                    array_push($failed, "You can't add this shift ".$workerShift["shiftId"].", ".$workerShift["shiftDay"]." because its time has gone");
                
                }elseif($existShift){
                
                    array_push($failed, "Worker already has shift on this day ". date('Y-m-d',strtotime($workerShift['shiftDay'])));
               
                }else{ 
                    WorkerShift::create([
                        "worker_id" => $worker->id,
                        "shift_id" => $workerShift['shiftId'],
                        "shift_day" => $workerShift['shiftDay']
                    ]); 
                    array_push($success, "shift ".$workerShift["shiftId"].", ".$workerShift["shiftDay"]." added successfully");  
                }
            }
    
    
            if(!$success){

                $response = [
                    "message" => $failed,
                    "code" => 500
                ];
                return $response;
            }
            return [
                "message" => array_merge($success,$failed),
                "data" => $worker,
                "code" => 200
            ];

    }

    public function update(array $request, $worker){

            $failed = array();
            $success = array();
    
            foreach($request["workerShifts"] as $workerShift){
                
                $existWorkerShift = WorkerShift::where('id',$workerShift['workerShiftId'])->where('worker_id',$worker->id)->first();
                $shift = Shift::find($workerShift['shiftId']);
                $existWorkerShiftDay = WorkerShift::where('id','!=',$workerShift['workerShiftId'])->where('worker_id', $worker->id)->where('shift_day', date('Y-m-d',strtotime($workerShift['shiftDay'])))->first();
            
                if(!$existWorkerShift){
    
                    array_push($failed, "This worker shift ".$workerShift["workerShiftId"].", is not for this worker!");
    
                }elseif(strtotime($shift->start) < strtotime(date("H:i:s")) && date("Y-m-d") == date('Y-m-d',strtotime($workerShift['shiftDay']))){
    
                    array_push($failed, "You can't update this worker shift ".$workerShift["workerShiftId"].", because this shift time passed for this day ".$workerShift["shiftDay"]);
                
                }elseif($existWorkerShiftDay){
                
                    array_push($failed, "Worker already has shift on this day ". date('Y-m-d',strtotime($workerShift['shiftDay'])));
               
                }else{ 
                    $existWorkerShift->update([
                        "shift_id" => $workerShift['shiftId'],
                        "shift_day" => $workerShift['shiftDay']
                    ]); 
                    array_push($success, "Worker shift ".$workerShift["workerShiftId"].", updated successfully");  
                }
            }
    
            if(!$success){

                $response = [
                    "message" => $failed,
                    "code" => 500
                ];
                return $response;
            }
            return [
                "message" => array_merge($success,$failed),
                "data" => $worker,
                "code" => 200
            ];

    }

    public function destroy($workerShift){
       
            $workerShift->delete();
            return ["message" => "Deleted!", "code" => 200];
            
    }

}

?>
