<?php
use App\Home;
use Illuminate\Support\Facades\Request;

class HomeRepository{
    protected $model;
    
    public function __construct(Home $home)
    {
        $this->model = $home;    
    }

    
}