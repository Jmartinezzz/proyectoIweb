<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Cliente;
use App\Order;
use App\Detalle;
use Illuminate\Support\Facades\DB;

class OrdenesController extends Controller
{
     public function ordenes(){        
    	$orders = DB::table('orders')
    				->join('orderdetails', 'orders.OrderID', '=', 'orderdetails.OrderID')
            		->leftJoin('customers', 'orders.CustomerID', '=', 'customers.CustomerID')
            		->join('products', 'orderdetails.ProductID', '=', 'products.ProductID')
            		->select('orders.*', 'customers.CompanyName','orders.total', 'products.UnitPrice', 'products.ProductName', 'orderdetails.Quantity')
            		->orderBy('OrderID', 'desc')                   
            		->paginate(10);
    	return view('orders.orders',['orders' => $orders]);
    }
}
