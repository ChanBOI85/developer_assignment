<?php

class employeesController extends Controller {

    public function index($id = "") {
        $this->model('employees');
        
        if($id == "") {
            $this->view('employees' . DIRECTORY_SEPARATOR . 'index', $this->model->readAll());
            $this->view->page_title = 'Employees | Christian Pelitones';
        } else {
            $this->view('employees' . DIRECTORY_SEPARATOR . 'singles', $this->model->readEmployee($id));
            $this->view->page_title = 'Employee | Christian Pelitones';
        }
        
        $this->view->render();
    }
}