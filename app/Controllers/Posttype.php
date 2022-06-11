<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\PostingModel;
use App\Models\PostTypeModel;

class Posttype extends BaseController
{

    protected $postingModel;
    protected $userModel;
    protected $postTypeModel;
    protected $session;
    public function __construct(){
        $this->postingModel = new PostingModel();
        $this->postTypeModel = new PostTypeModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Post Type',
            'post_type' => $this->postTypeModel->findAll(),
        ];
        
        return view('post_type', $data);
    }
    public function create(){
        $data = [
            'title' => 'Create Post Type',
            'validation'=> \Config\Services::validation(),
        ];

        return view('create_posttype', $data);
    }
    public function save(){
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'jenis' => 'required',
            'type' => 'required',
        ])) {
            return redirect()->to('/posttype/create')->withInput()->with('validation', $validation);
        } else {

            $post = [
                'jenis' => $this->request->getVar('jenis'),
                'type' => $this->request->getVar('type'),
            ];
            $this->postTypeModel->save($post);
            return redirect()->to('/posttype');
        }
    }
    public function edit($id_post_type){
        $data = [
            'title' => 'Edit Post Type',
            'validation'=> \Config\Services::validation (),
            'post_type' => $this->postTypeModel->where('id_post_type', $id_post_type)->first(),
        ];
        
        return view('edit_posttype', $data);
    }
    public function update(){
        $validation = \Config\Services::validation();
        $id_post_type = $this->request->getVar('id_post_type');
        if (!$this->validate([
            'jenis' => 'required',
            'type' => 'required',
        ])) {
            return redirect()->to('/posttype/edit/' . $id_post_type)->withInput()->with('validation', $validation);
        } else {

            $post = [
                'id_post_type' => $id_post_type,
                'jenis' => $this->request->getVar('jenis'),
                'type' => $this->request->getVar('type'),
            ];
            $this->postTypeModel->save($post);
            return redirect()->to('/posttype');
        }
    }
    public function delete($id_post_type){
        
        $this->postTypeModel->delete($id_post_type);
        return redirect()->to('/posttype');
    }
}
