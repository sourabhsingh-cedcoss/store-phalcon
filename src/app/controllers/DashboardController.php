<?php

use Phalcon\Mvc\Controller;


class DashboardController extends Controller
{
    public function indexAction()
    {
    }
    public function operationAction()
    {
        $user = new Users();
        $userdetails = new Userdetails();
        $order = new Orders();
        $product = new Products();
        $action = $this->request->getPost()['action'];
        switch ($action) {
            case 'getUsers':
                return $user->getUsers();
                break;
            case 'getUserDetails':
                $id = $this->request->getPost()['user_id'];
                return $userdetails->getUserDetails($id);
                break;
            case 'updateUserDetail':
                $name = $this->request->getPost()['name'];
                $email = $this->request->getPost()['email'];
                $mobile = $this->request->getPost()['mobile'];
                $pin = $this->request->getPost()['pin'];
                $address = $this->request->getPost()['address'];
                $id = $this->request->getPost()['user_id'];
                return $userdetails->updateUserDetail($id, $name, $email, $mobile, $address, $pin);
                break;
            case 'deleteUser':
                $id = $this->request->getPost()['user_id'];
                return $user->deleteUser($id);
                break;
            case 'updateStatus':
                $id = $this->request->getPost()['user_id'];
                $status = $this->request->getPost()['status'];
                $column = $this->request->getPost()['column'];
                return $user->updateStatus($id, $column, $status);
                break;
            case 'getAllOrders':
                return $order->getAllOrders();
                break;
            case 'updateOrderStatus':
                $id = $this->request->getPost()['order_id'];
                $status = $this->request->getPost()['status'];
                return $order->updateOrderStatus($id, $status);
                break;
            case 'getProducts':
                return $product->getProducts();
                break;
            case 'addNewProduct':
                $name = $this->request->getPost()['name'];
                $brand = $this->request->getPost()['brand'];
                $category = $this->request->getPost()['category'];
                $price = $this->request->getPost()['price'];
                $discount = $this->request->getPost()['discount'];
                $description = $this->request->getPost()['description'];
                return $product->addProduct($name, $brand, $category, $price, $discount, $description);
                break;
            case 'deleteProduct':
                $id = $this->request->getPost()['product_id'];
                return $product->deleteProduct($id);
                break;
            case 'updateProduct':
                $name = $this->request->getPost()['name'];
                $brand = $this->request->getPost()['brand'];
                $category = $this->request->getPost()['category'];
                $price = $this->request->getPost()['price'];
                $discount = $this->request->getPost()['discount'];
                $id = $this->request->getPost()['product_id'];
                return $product->updateProduct($id, $name, $brand, $category, $price, $discount);
                break;
        }
    }
    public function adduserAction()
    {
    }
}
