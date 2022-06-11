<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\UserModel;
use App\Models\PostingModel;
use App\Models\PostTypeModel;

class Posting extends BaseController
{

    protected $postingModel;
    protected $userModel;
    protected $session;
    public function __construct(){
        $this->postingModel = new PostingModel();
        $this->postTypeModel = new PostTypeModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Posting',
            'posting' => $this->postingModel->getAll(),
            'jwt' => session()->get('token')
        ];
        
        return view('posting', $data);
    }
    public function create(){
        $data = [
            'title' => 'Create Posting',
            'validation'=> \Config\Services::validation(),
            'post_type' => $this->postTypeModel->findAll(),
            'user' => $this->userModel->where('email', session()->get('email'))->first()
        ];

        return view('create_posting', $data);
    }
    public function save(){
        $validation = \Config\Services::validation();
        if (!$this->validate([
            'title' => 'min_length[10]|required',
            'description' => 'required|min_length[50]',
            'post_type' => 'required',
        ])) {
            return redirect()->to('/posting/create')->withInput()->with('validation', $validation);
        } else {

            $post = [
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'post_type' => $this->request->getVar('post_type'),
                'user' => $this->request->getVar('user'),
            ];
            $this->postingModel->save($post);
            return redirect()->to('/posting');
        }
    }
    public function edit($id_posting){
        $data = [
            'title' => 'Edit Posting',
            'validation'=> \Config\Services::validation (),
            'posting' => $this->postingModel->getFirst($id_posting),
            'post_type' => $this->postTypeModel->findAll(),
            'user' => $this->userModel->where('email', session()->get('email'))->first()
        ];
        
        return view('edit_posting', $data);
    }
    public function update(){
        $validation = \Config\Services::validation();
        $id_posting = $this->request->getVar('id_posting');
        if (!$this->validate([
            'title' => 'min_length[10]|required',
            'description' => 'required|min_length[50]',
            'post_type' => 'required',
        ])) {
            return redirect()->to('/posting/edit/' . $id_posting)->withInput()->with('validation', $validation);
        } else {

            $post = [
                'id_posting' => $id_posting,
                'title' => $this->request->getVar('title'),
                'description' => $this->request->getVar('description'),
                'post_type' => $this->request->getVar('post_type'),
                'user' => $this->request->getVar('user'),
            ];
            $this->postingModel->save($post);
            return redirect()->to('/posting');
        }
    }
    public function delete($id_posting){
        
        $this->postingModel->delete($id_posting);
        return redirect()->to('/posting');
    }

    public function view($id_posting){
        $data = [
            'title' => 'View Posting',
            'posting' => $this->postingModel->getFirst($id_posting),
            'user' => $this->userModel->where('email', session()->get('email'))->first()
        ];
        
        return view('view_posting', $data);
    }

}
