<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MakananHewanModel;
use App\Models\OrderModel;
use App\Models\PeralatanHewanModel;
use App\Models\PerawatanModel;
use App\Services\CartService;

class UserRoleController extends BaseController
{
    public function viewShop()
    {

        $request = \Config\Services::request();
        $params = $request->getGet();
        $q = $params['q'] ?? 'all';


        $food = new MakananHewanModel();
        $tool = new PeralatanHewanModel();
        $data = [];
        $foodAll = $food->findAll();
        $toolAll = $tool->findAll();

        if ($q == 'food') {
            $data['data'] = $foodAll;
        } else if ($q == 'tool') {
            $data['data'] = $toolAll;
        } else {
            $merged_data = array_merge($foodAll, $toolAll);
            $data['data'] = $merged_data;
        }

        echo view('user_shop', $data);
    }

    public function viewPerawatan()
    {
        echo view('user_perawatan',);
    }

    public function reqPerawatan()
    {
        $model = new PerawatanModel();
        $session = \Config\Services::session();
        $user = $session->get('name');

        $payload = [
            "hewan" => $this->request->getPost('hewan'),
            "treatment" => $this->request->getPost('treatment'),
            "user" =>  $user,
            "schedule" => $this->request->getPost('schedule'),
            "phone" => $this->request->getPost('phone'),
        ];
        $model->insert($payload);
        return redirect()->to('/user/shop');
    }

    public function addToCart()
    {
        // Retrieve product information from POST data
        $productId = $this->request->getGet('id');
        $productName = $this->request->getGet('name');
        $productPrice = $this->request->getGet('harga');
        $quantity = $this->request->getGet('quantity');

        // Prepare item data to add to cart
        $item = [
            'id' => $productId,
            'name' => $productName,
            'harga' => $productPrice,
            'quantity' => $quantity,
        ];


        // Add item to cart
        $cartService = new CartService();
        $cartService->addItem($item);

        // Redirect to cart page
        return redirect()->to('/user/carts');
    }


    public function carts()
    {
        $cartService = new CartService();
        $cartItems = $cartService->getItems();
        $totalPrice = 0;
        foreach ($cartItems as $cartItem) {
            $totalPrice += $cartItem['harga'] * $cartItem['quantity'];
        }

        $data['cartItems'] = $cartItems;
        $data['total'] = $totalPrice;

        echo view('user_cart', $data);
    }

    public function cartupdate()
    {
        // Retrieve product information from POST data
        $productId = $this->request->getPost('id');
        $quantity = $this->request->getPost('quantity');
        $name = $this->request->getPost('name');
        $harga = $this->request->getPost('harga');

        // Prepare item data to add to cart
        $item = [
            'id' => $productId,
            'quantity' => $quantity,
            'name' => $name,
            'harga' => $harga,
        ];


        // Add item to cart
        $cartService = new CartService();
        $cartService->updateItem($item);

        // Redirect to cart page
        return redirect()->to('/user/carts');
    }

    public function cartdelete()
    {
        // Retrieve product information from POST data
        $productId = $this->request->getPost('id');


        // Add item to cart
        $cartService = new CartService();
        $cartService->removeItem($productId);

        // Redirect to cart page
        return redirect()->to('/user/carts');
    }

    public function order()
    {
        $session = \Config\Services::session();
        $user = $session->get('name');
        $userid = $session->get('id');
        $cartItems = $session->get('cartItems');
        $order = $this->generateTransactionID();
        $model = new OrderModel();

        foreach ($cartItems as $item) {
            $item = [
                'id_order' => $order,
                'quantity' => $item['quantity'],
                'harga' =>  $item['harga'],
                'name' =>  $item['name'],
                'user' => $user,
                'userid' => $userid,
            ];
            $model->insert($item);
        }
        $cartService = new CartService();
        $cartService->clear();

        // Redirect to cart page
        return redirect()->to('/user/checkout?id=' . $order);
    }

    public function checkout()
    {
        // Retrieve product information from POST data
        $id = $this->request->getGet('id');
        $model = new OrderModel();
        $data = $model->where('id_order = ', $id)->findAll();
        $totalPrice = 0;
        foreach ($data as $cartItem) {
            $totalPrice += $cartItem['harga'] * $cartItem['quantity'];
        }
        $data['data'] = $data;
        $data['total'] = $totalPrice;

        // Redirect to cart page
        echo view('user_checkout', $data);
    }
    public function history()
    {

        $session = \Config\Services::session();
        $request = \Config\Services::request();
        $userid = $session->get('id');
        $userName = $session->get('name');
        $params = $request->getGet();
        $h = $params['h'] ?? 'order';


        $order = new OrderModel();
        $perawatan = new PerawatanModel();
        $data = [];
        $historyOrder = $order->where('userid = ', $userid)->findAll();
        $historyPerawatan = $perawatan->where('user = ', $userName)->findAll();
        if ($h == 'order') {
            $data['data'] = $historyOrder;
            $data['keterangan'] = 'order';
        } else if ($h == 'perawatan') {
            $data['data'] = $historyPerawatan;
            $data['keterangan'] = 'perawatan';
        }

        echo view('user_history', $data);
    }

    function generateTransactionID()
    {
        $date = date('YmdHis'); // Get the current date and time
        $rand = rand(1000, 9999); // Generate a random number
        $id = $date . $rand; // Combine the date and random number
        return $id; // Return the unique ID
    }
}
