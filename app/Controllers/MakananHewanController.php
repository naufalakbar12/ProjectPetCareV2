<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\MakananHewanModel;

class MakananHewanController extends BaseController
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
        $model = new MakananHewanModel();
        $request = \Config\Services::request();
        $params = $request->getGet();
        $search = $params['search'] ?? '';

        if ($search == '') {
            $data['makanan_hewan'] = $model->findAll();
        } else {
            $data['makanan_hewan'] = $model->like('name', $search)->orLike('harga', $search)->findAll();
        }

        $data['search'] = $search;


        $data['data'] = $model->findAll();

        echo view('view_makananhewan', $data);
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
        echo view('tambah_makananhewan');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        $model = new MakananHewanModel();

        $fileName = "";

        $rules = ['photo' => 'uploaded[photo]|max_size[photo,3024]|ext_in[photo,png,jpeg,jpg,gif,bmp]|is_image[photo]'];


        print_r($this->request->getFile('photo'));

        if ($this->validate($rules)) {
            $photo = $this->request->getFile('photo');

            if ($photo) {
                $fileName = $photo->getRandomName(); // Mendapatkan nama file baru secara acak

                $photo->move('photos', $fileName); // Memindahkan file ke public/photos dengan nama acak
            }


            $payload = [
                "name" => $this->request->getPost('name'),
                "image" => $fileName,
                "harga" => $this->request->getPost('harga'),
            ];


            $model->insert($payload);

            return redirect()->to('/admin/makanan');
        } else {
            $errors = $this->validator->getErrors();
            print_r($errors);
            return redirect()->back()->withInput()->with('errors', $errors);
            // Handle the validation errors
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        $model = new MakananHewanModel();

        $data['data'] = $model->find($id);

        echo view('edit_makananhewan', $data);
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {

        $model = new MakananHewanModel();

        $fileName = "";

        $data = [];

        $photo = $this->request->getFile('photo');

        if ($photo->isValid()) {
            $fileName = $photo->getRandomName(); // Mendapatkan nama file baru secara acak

            $photo->move('photos', $fileName); // Memindahkan file ke public/photos dengan nama acak
            $data = [
                "name" => $this->request->getPost('name'),
                "image" => $fileName,
                "harga" => $this->request->getPost('harga'),
            ];
            $model->update($id, $data);
        } else {
            $data = [
                "name" => $this->request->getPost('name'),
                "harga" => $this->request->getPost('harga'),
            ];
            $model->update($id, $data);
        }




        return redirect()->to('/admin/makanan');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $model = new MakananHewanModel();

        $model->delete($id);
        return redirect()->to('/admin/makanan');
    }
}
