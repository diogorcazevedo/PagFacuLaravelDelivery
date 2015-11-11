<?php

namespace pagfacu\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use pagfacu\Http\Requests;
use pagfacu\Repositories\OrderRepository;
use pagfacu\Repositories\ProductRepository;
use pagfacu\Repositories\UserRepository;
use pagfacu\Services\OrderService;
use pagfacu\Http\Requests\CheckoutRequest;

class CheckoutController extends Controller
{
    /**
     * @var OrderRepository
     */

    private $repository;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var ProductRepository
     */
    private $productRepository;
    /**
     * @var OrderService
     */
    private $service;


    public function __construct(
                                    OrderRepository $repository,
                                    UserRepository $userRepository,
                                    ProductRepository $productRepository,
                                    OrderService $service
                                    )

    {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
        $this->productRepository = $productRepository;
        $this->service = $service;
    }


    public function index()
    {
        $clientId= $this->userRepository->find(Auth::user()->id)->client->id;

        $orders = $this->repository->scopeQuery(function($query) use($clientId){
                    return $query->where('client_id','=',$clientId);
        })->paginate();
        $orders->setPath('order');

        return view('customers/order/index',compact('orders'));

    }

    public function create()
    {

        $products =  $this->productRepository->lists();
        return view('customers/order/create',compact('products'));

    }

    public function store(CheckoutRequest $request)
    {
        $data = $request->all();
        $clientId = $this->userRepository->find(Auth::user()->id)->client->id;
        $data['client_id'] = $clientId;
        $this->service->create($data);

        return redirect()->route('customer.order.index');
    }

}
