<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    private $repository;
    private $userID;

    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
        $this->userID = auth('sanctum')->user() ? auth('sanctum')->user()->id : null;
    }

    public function addProductInCart(Request $request)
    {
        $productID = $request->product_id;

        return $this->repository->addProductInCart($this->userID, $productID);
    }

    public function removeProductFromCart(Request $request)
    {
        $productID = $request->product_id;

        return $this->repository->removeProductFromCart($this->userID, $productID);
    }

    public function setCartProductQuantity(Request $request)
    {
        $productID = $request->product_id;
        $quantity = $request->quantity;

        return $this->repository->setCartProductQuantity($this->userID, $productID, $quantity);        
    }

    public function getUserCart(Request $request)
    {
        return $this->repository->getUserCart($this->userID);
    }
}
