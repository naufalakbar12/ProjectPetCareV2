<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\UserModel;

class UsersController extends BaseController
{
    public function __construct()
    {
        // $this->userModel = new UserModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $model = new UserModel();

        $data['users'] = $model->findAll();

        echo view('view_users', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('tambah_users');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new UserModel();
        $pw = (string) $this->request->getPost('password');

        $payload = [
            "name" => $this->request->getPost('name'),
            "username" => $this->request->getPost('username'),
            "password" =>  md5($pw),
            "role" => $this->request->getPost('role'),
        ];


        $model->insert($payload);
        return redirect()->to('/admin/users');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $model = new UserModel();

        $data['user'] = $model->find($id);

        echo view('edit_users', $data);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $model = new UserModel();
        $pw = (string) $this->request->getPost('password');

        $data = [
            "name" => $this->request->getPost('name'),
            "username" => $this->request->getPost('username'),
            "password" =>  md5($pw),
            "role" => $this->request->getPost('role'),
        ];
        $model->update($id, $data);
        return redirect()->to('/admin/users');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new UserModel();

        $model->delete($id);
        return redirect()->to('/admin/users');
    }
}
