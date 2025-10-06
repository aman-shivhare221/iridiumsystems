<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class WelcomeController extends Controller
{
   public function getData(){
      $data= DB::table('customers as c')
      ->join('orders as o ','c.customer_id','=','o.customer_id')
      ->select('c.customer_id','c.name','c.email',
       DB::raw('SUM(O.amount) as total_spent') 
      )
      ->where('o.order_date','>=', DB::row('DATE_SUB(CURDATE(), INTERVAL 1 YEAR)  '))
      ->groupBy('c.customer_id','c.name','c.email')
      ->orderByDESC('total_spent')
      ->limit(5)->get()->toArray();

      return $data;

   }
}
