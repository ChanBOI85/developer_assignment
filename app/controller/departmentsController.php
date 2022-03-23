<?php

class departmentsController extends Controller {

    public function index($id = "") {
        $this->model('departments');
        
        if($id == "") {
            $this->view('departments' . DIRECTORY_SEPARATOR . 'index', $this->model->readAll());
            $this->view->page_title = 'Departments | Christian Pelitones';
        } else {
            $this->view('departments' . DIRECTORY_SEPARATOR . 'singles', $this->model->readDepartment($id));
            $this->view->page_title = 'Departments | Christian Pelitones';
        }
        
        $this->view->render();
    }
}