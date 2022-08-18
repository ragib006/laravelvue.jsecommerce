<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use App\Addcategory;
use Illuminate\Support\Facades\Hash;
use App\Addproduct;
use App\Addproductsize;
use App\Productcolor;
use App\Addcouponcode;
use App\Customerloginandregistration;

use App\Order;
use App\Orderdetails;
use App\Payment;


use App\Shippinginformation;


use DateTime;
use Cart;
Use Image;
use Session;
session_start();

class CustomerController extends Controller
{


  //customerregisterformaction

  public function customerregisterformaction(Request $request){


    $data = array();

    $todaydate = date("d-m-Y");
    $data['customer_name'] = $request->customer_name;
    $data['customer_email'] = $request->customer_email;
    $data['customer_districk'] = $request->customer_districk;

    $data['customer_address'] = $request->customer_address;
    $data['customer_mobile_number'] = $request->customer_mobile_number;
    $data['customer_password'] = md5($request->customer_password);
    $data['customer_register_date'] = $todaydate;


    $customer = DB::table('customerloginandregistrations')->insertGetId($data);

    Session::put('customer_id',$customer);
    Session::put('customer_email',$request->customer_email);

    return 1;



  }


//customerloginformaction


public function customerloginformaction(Request $request){

  $customer_email =$request->my_customer_email;
  $customer_password =md5($request->my_customer_password);


  $result = DB::table('customerloginandregistrations')->where(['customer_email'=>$customer_email,'customer_password'=>$customer_password])->first();


  if($result){


 Session::put('customer_id',$result->customer_id);

    return 1;

  }else{


   return 0;


  }



}



//shippinginformationformaction

public function shippinginformationformaction(Request $request){

$data = array();

$todaydate = date("d-m-Y");
$data['shipping_name'] = $request->shipping_name;
$data['shipping_email'] = $request->shipping_email;
$data['shipping_districk'] = $request->shipping_districk;
$data['shipping_address'] = $request->shipping_address;
$data['shipping_mobile_number'] = $request->shipping_mobile_number;
$data['shipping_added_date'] = $todaydate;


$shipping = DB::table('shippinginformations')->insertGetId($data);

Session::put('shipping_id',$shipping);
Session::put('shipping_email',$request->shipping_email);

return 1;



}



//headercustomershippingid
//
//
// public function headercustomershippingid(){
//
//
//
//      $carttotal = Cart::total();
//
//     $discountapplycoupon = Session::get('my_discount');
//
//     $showalladdtocartproduct = Cart::content();
//
//     $customerid = Session::get('customer_id');
//
//     $shippingid = Session::get('shipping_id');
//
//     $cartproductcount = Cart::count();
//
//
//
//   return response()->json([
//
//     'customerid'=>$customerid,
//     'shippingid'=>$shippingid,
//     'cartproductcount'=>$cartproductcount,
//     'carttotal'=>$carttotal,
//     'discountapplycoupon'=>$discountapplycoupon
//
//
//
//           ],200);
//
//
//
//
//
// }

//customerlogout

public function customerlogout($customerid){


//return $customerid;
   $customeridflash = Session::forget('customer_id');

   $shippingidflash = Session::forget('shipping_id');
  //
  // return $flash;


}



//checkoutcustomeridandshippingid

public function checkoutcustomeridandshippingid(){



  $customerid = Session::get('customer_id');

  $shippingid = Session::get('shipping_id');


  return response()->json([

    'customerid'=>$customerid,
    'shippingid'=>$shippingid



          ],200);



}



//giveorderininvoicepage


public function giveorderininvoicepage(Request $request){

$today = date('d-m-y');
$paymentmethod=$request->payment_method;
$trxid = $request->trx_id;



$my_dicount = Session::get('my_discount');

if($my_dicount == ''){

  $discountmoney = 0;

}else{

  $discountmoney = $my_dicount;


 }

$customerid = Session::get('customer_id');
$shippingid = Session::get('shipping_id');

$total = Cart::total();



$carttotal = ($total-$discountmoney);
$cartubtotal = Cart::subtotal();
$carttax = Cart::tax();









if($paymentmethod==='Handcash'){





  $orderdata=array();
  $orderdata['order_customer_id']=$customerid;
  $orderdata['order_shipping_id']=$shippingid;
  $orderdata['order_discount']=$discountmoney;
  $orderdata['order_date']=$today;
  $orderdata['order_status']=0;
  $orderdata['order_total_products']=Cart::count();
  $orderdata['order_sub_total']=Cart::subtotal();
  $orderdata['order_vat']=Cart::tax();
  $orderdata['order_total']=$carttotal;
  $orderdata['payment_method']=$paymentmethod;
  $orderdata['payment_trx_id']=$paymentmethod;
  $orderdata['payment_status']=0;

  $order_id=DB::table('orders')
         ->insertGetId($orderdata);



}else if($paymentmethod==='Bkash'){


  $orderdata=array();
  $orderdata['order_customer_id']=$customerid;
  $orderdata['order_shipping_id']=$shippingid;
  $orderdata['order_discount']=$discountmoney;
  $orderdata['order_date']=$today;
  $orderdata['order_status']=0;
  $orderdata['order_total_products']=Cart::count();
  $orderdata['order_sub_total']=Cart::subtotal();
  $orderdata['order_vat']=Cart::tax();
  $orderdata['order_total']=$carttotal;
  $orderdata['payment_method']=$paymentmethod;
  $orderdata['payment_trx_id']=$trxid;
  $orderdata['payment_status']=0;

  $order_id=DB::table('orders')
         ->insertGetId($orderdata);


}else{

   $mypaymentmethod = 'Nothing';


}



  $contents=Cart::content();

  $orderdetails=array();

  foreach($contents as $v_content){

  $orderdetails['my_order_id']=$order_id;
  $orderdetails['my_product_id']=$v_content->id;
  $orderdetails['my_size_id']=$v_content->options->sizeid;

  $orderdetails['my_product_name']=$v_content->name;
  $orderdetails['my_product_price']=$v_content->price;
  $orderdetails['my_product_quantity']=$v_content->qty;
  $orderdetails['my_order_total']=$carttotal;
  $orderdetails['my_product_image']=$v_content->options->image;
  $orderdetails['my_product_size']=$v_content->options->size;
  $orderdetails['my_product_color']=$v_content->options->color;

           DB::table('orderdetails')
           ->insert($orderdetails);

  }

    Cart::destroy();

    Session::forget('my_discount');
    Session::forget('mycouponcode');

    return 1;


}

//showmyallorder



public function showmyallorder(){

  $allorder=DB::table('orders')


          ->join('customerloginandregistrations','orders.order_customer_id','=','customerloginandregistrations.customer_id')
          ->join('shippinginformations','orders.order_shipping_id','=','shippinginformations.shipping_id')
         // ->join('payments','order_payment_id','=','payments.payment_id')
          ->get();




          return response()->json([

            'allorder'=>$allorder


                  ],200);


}

//displaymywebsiteorderdetails

public function displaymywebsiteorderdetails($order_id){

  $orderinfo=DB::table('orders')

          ->join('customerloginandregistrations','orders.order_customer_id','=','customerloginandregistrations.customer_id')
          ->join('shippinginformations','orders.order_shipping_id','=','shippinginformations.shipping_id')
          ->where('order_id',$order_id)
          ->first();

  $orderproduct = DB::table('orderdetails')

  ->join('orders','orderdetails.my_order_id','=','orders.order_id')

 // ->join('shippinginformations','orders.order_shipping_id','=','shippinginformations.shipping_id')
 ->where('my_order_id',$order_id)
  ->get();



          return response()->json([

            'orderinfo'=>$orderinfo,
            'orderproduct'=>$orderproduct


                  ],200);




}


//successpaymentpending


public function successpaymentpending($order_id){

Order::where(['order_id'=>$order_id])->update(['payment_status'=>0]);

return 0;

}

//pendingpaymentsuccess
public function pendingpaymentsuccess($order_id){

Order::where(['order_id'=>$order_id])->update(['payment_status'=>1]);
return 1;

}

//orderelete


public function orderelete($order_id){

Order::where(['order_id'=>$order_id])->delete();
return 1;


}

//adminpendingordersuccess

public function adminpendingordersuccess($order_id){



     $data = Orderdetails::where(['my_order_id'=>$order_id])->get();

      foreach($data as $show){

        $sizeid = $show->my_size_id;
        $productid = $show->my_product_id;
        $quantity = $show->my_product_quantity;


        $attribute = Addproductsize::where(['size_id'=>$sizeid,'size_product_id'=>$productid])->first();

        $qty = $attribute->size_stock;

        $updatestock = $qty - $quantity;

    Addproductsize::where(['size_id'=>$sizeid,'size_product_id'=>$productid])->update(['size_stock'=>$updatestock]);

     //  return 1;


     }



Order::where(['order_id'=>$order_id])->update(['order_status'=>1]);
return 1;

















     // foreach($data as $show){

      //   $sizeid = $show->my_size_id;
    //     $productid = $show->my_product_id;
     //    $quantity = $show->my_product_quantity;


      //   $attribute = Addproductsize::where(['size_id'=>$sizeid,'size_product_id'=>$productid])->get();


     //    return $attribute;

        // $qty = $attribute->size_stock;

       //  $updatestock = $qty - $quantity;

    // Addproductsize::where(['size_id'=>$sizeid,'size_product_id'=>$productid])->update(['size_stock'=>$updatestock]);

     //  return 1;


    // }




 // return $quantity;






}


//editproductsizeplaceholdervalue

public function editproductsizeplaceholdervalue($size_id){



  return Addproductsize::where(['size_id'=>$size_id])->first();



}

//updateproductsize


public function updateproductsize(Request $request,$size_id){

    $data = $request->all();

    $sizeinfo = Addproductsize::where(['size_id'=>$size_id])->first();

    $proid = $sizeinfo->size_product_id;

 Addproductsize::where(['size_id'=>$size_id])->update(['size_product_id'=>$proid,'size_name'=>$data['size_name'],'size_weight'=>$data['size_weight'],'size_stock'=>$data['size_stock'],'size_added_date'=>$data['size_added_date']]);

 return 1;



}















}
