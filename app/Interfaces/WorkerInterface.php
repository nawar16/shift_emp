<?php

namespace App\Interfaces;

interface WorkerInterface{

    public function index();

    public function store(array $request);

    public function show($id);

    public function update(array $request, $worker);

    public function destroy($worker);


}


?>