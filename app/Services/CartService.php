<?php

namespace App\Services;

use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\Session\Session;

class CartService
{
    private $session;
    private $cartItems = [];

    public function __construct()
    {
        $this->session = \Config\Services::session();


        // Get cart items from session if available
        if ($this->session->has('cartItems')) {
            $this->cartItems = $this->session->get('cartItems');
        }
    }

    public function addItem($item)
    {
        // Check if item already exists in cart
        if (array_key_exists($item['id'], $this->cartItems) && array_key_exists($item['name'], $this->cartItems)) {
            // Update item quantity
            $this->cartItems[$item['id']]['quantity'] += $item['quantity'];
        } else {
            // Add new item to cart
            $this->cartItems[$item['id']] = $item;
        }

        // Save cart items to session
        $this->session->set('cartItems', $this->cartItems);
    }

    public function updateItem($item)
    {
        // Check if item already exists in cart
        if (array_key_exists($item['id'], $this->cartItems) && array_key_exists($item['name'], $this->cartItems)) {
            // Update item quantity
            $this->cartItems[$item['id']]['quantity'] = $item['quantity'];
        } else {
            // Add new item to cart
            $this->cartItems[$item['id']] = $item;
        }

        // Save cart items to session
        $this->session->set('cartItems', $this->cartItems);
    }

    public function getItems()
    {
        return $this->cartItems;
    }

    public function removeItem($id)
    {
        // Check if item exists in cart
        if (array_key_exists($id, $this->cartItems)) {
            // Remove item from cart
            unset($this->cartItems[$id]);

            // Save cart items to session
            $this->session->set('cartItems', $this->cartItems);
        }
    }

    public function clear()
    {
        // Clear cart items from session
        $this->session->remove('cartItems');
    }
}
