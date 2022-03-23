<?php

class homeController extends Controller {

    public function index($id="", $name="") {
        $this->view('home\index', [
            'name' => $name,
            'id' => $id
        ]);

        $this->view->page_title = 'Home | Christian Pelitones';
        $this->view->render();
    }


}