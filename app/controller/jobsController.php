<?php

class jobsController extends Controller {

    public function index($id = "") {
        $this->model('jobs');
        
        if($id == "") {
            $this->view('jobs' . DIRECTORY_SEPARATOR . 'index', $this->model->readAll());
            $this->view->page_title = 'Jobs | Christian Pelitones';
        } else {
            $this->view('jobs' . DIRECTORY_SEPARATOR . 'singles', $this->model->readJob($id));
            $this->view->page_title = 'Jobs | Christian Pelitones';
        }
        
        $this->view->render();
    }
}