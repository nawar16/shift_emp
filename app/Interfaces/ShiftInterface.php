<?php

namespace App\Interfaces;

interface ShiftInterface{

    public function index();

    public function workerShiftById($id);

    public function store(array $request, $worker);

    public function update(array $request, $worker);

    public function destroy($workerShift);


}


?>