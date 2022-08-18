<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use DB;
use App\Addcategory;
use App\Addproduct;
use App\Addproductsize;
use App\Productcolor;
use App\Addcouponcode;
use App\Customerloginandregistration;
use App\Shippinginformation;

use App\Adminlogin;


use DateTime;
use Cart;
Use Image;
use Session;
session_start();

class AdminController extends Controller
{




public function myallpackageget(){

  return DB::table('addpackages')->get();

  //  return $myallpackagestore;


}














public function getdata(){

  $data = DB::table('addpackages')->get();

  return $data;

}






public function admindashboard(){

  return view('view-adminmaster.admin_master');

}


//addcategoryformaction

public function addcategoryformaction(Request $request){

  $data = $request->all();

  $todaydate = date("d-m-Y");
  $category = new Addcategory;
  $category->category_name = $data['category_name'];
  $category->category_type = $data['category_type'];
  $category->category_url = $data['category_url'];
  $category->category_added_date = $todaydate;
  $category->save();
  return 1;

}

//showallcategoryinform


public function showallcategoryinform(){

  return Addcategory::where(['category_type'=>0])->get();


}




public function showallcategory(){


//   return DB::table('addcategories')->get();


     return Addcategory::get();


}

//activecategoryunactive


public function activecategoryunactive($id){

   Addcategory::where(['id'=>$id])->update(['category_status'=>0]);

   return 1;

}

//unactivecategoryactive

public function unactivecategoryactive($id){

Addcategory::where(['id'=>$id])->update(['category_status'=>1]);

return 1;

}

//editcategoryplaceholdervalue

public function editcategoryplaceholdervalue($id){

return Addcategory::where(['id'=>$id])->first();

}

//updatecategory


public function updatecategory(Request $request,$id){

 $data = $request->all();
Addcategory::where(['id'=>$id])->update(['category_name'=>$data['category_name'],'category_type'=>$data['category_type'],'category_url'=>$data['category_url'],'category_added_date'=>$data['category_added_date']]);

return 1;

}


public function categorydelete($id){

Addcategory::where(['id'=>$id])->delete();

return 1;

}

//viewcategorydetails

public function viewcategorydetails($id){

$categoryinformation = Addcategory::where(['id'=>$id])->first();

return response()->json([

          'categoryinformation'=>$categoryinformation


        ],200);


}


//showallsubcategoryinform

public function showallsubcategoryinform(){


  return DB::table('addcategories')
  ->where('category_type','!=',0)->get();



}


//addproductformaction

public function addproductformaction(Request $request){

   $data = $request->all();

   $checkproductname = Addproduct::where(['product_name'=>$data['product_name'],'product_url'=>$data['product_url']])->first();

   // $checkproducturl = Addproduct::where(['product_url'=>$data['product_url']])->first();

   $checkcode = Addproduct::where(['product_code'=>$data['product_code']])->first();
   $todaydate = date('d-m-Y');


  if($checkproductname){

    return 0;


  }elseif($checkcode){

    return 1;

  }else{


$strpos = strpos($request->product_image, ';');
$sub = substr($request->product_image,0,$strpos);
$ex = explode('/',$sub)[1];
//$name = time().".".$ex;

$name = time().$ex;

$img = Image::make($request->product_image)->resize(400,400);
$upload_path = public_path()."/images/";
// $upload_path = public_path('images/customer/large/');
$img->save($upload_path.$name);

$product = new Addproduct;

$product->product_name=$data['product_name'];
$product->product_cat_id=$data['product_cat_id'];
$product->product_price =$data['product_price'];
$product->product_code =$data['product_code'];
$product->product_url=$data['product_url'];
$product->product_description=$data['product_description'];
$product->product_added_date=$todaydate;
$product->product_image = $name;
$product->save();

return 3;


  }


}


//showallproduct

public function showallproduct(){


  $allproduct = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')

  ->get();



  return response()->json([

            'allproduct'=>$allproduct


          ],200);


}


//editlibarybookplaceholdervalue

public function editlibarybookplaceholdervalue($product_id){


  return Addproduct::where(['product_id'=>$product_id])->first();


}

//updateproduct

public function updateproduct(Request $request,$product_id){


    $data = $request->all();



    $post = Addproduct::where(['product_id'=>$product_id])->first();

    if($request->product_image!=$post->product_image){

      //stringposition
      $strpos = strpos($request->product_image, ';');
      //0
      $sub = substr($request->product_image,0,$strpos);
      $ex = explode('/',$sub)[1];
      $name = time().".".$ex;

      $img = Image::make($request->product_image)->resize(400,400);
      $upload_path = public_path()."/images/";
      //$upload_path = public_path('images/customer/large/');
       $image = $upload_path.$post->product_image;
       $img->save($upload_path.$name);



      if(file_exists($image)){

          @unlink($image);


      }


    }else{

    $name = $post->product_image;


    }

   Addproduct::where(['product_id'=>$product_id])->update(['product_name'=>$data['product_name'],'product_cat_id'=>$data['product_cat_id'],'product_price'=>$data['product_price'],'product_description'=>$data['product_description'],'product_url'=>$data['product_url'],'product_code'=>$data['product_code'],
   'product_added_date'=>$data['product_added_date'],'product_image'=>$name]);

    return 1;



}

//viewmyproduct

public function viewmyproduct($product_id){


  $productinfo = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')
  ->where('product_id',$product_id)
  ->first();



  return response()->json([

            'productinfo'=>$productinfo


          ],200);


}

//activeproductunactive


public function activeproductunactive($product_id){

Addproduct::where(['product_id'=>$product_id])->update(['product_status'=>0]);
return 0;


}

//unactiveproductactive

public function unactiveproductactive($product_id){

Addproduct::where(['product_id'=>$product_id])->update(['product_status'=>1]);
return 1;


}

//showallproductsize

public function showallproductsize($product_id){


       $myallsize = DB::table('addproductsizes')

       ->join('addproducts','addproductsizes.size_product_id','=','addproducts.product_id')
       ->where('size_product_id',$product_id)
       ->get();



       return response()->json([

                 'myallsize'=>$myallsize


               ],200);


}

//addproductsizeformaction

public function addproductsizeformaction(Request $request,$product_id){

   $data = $request->all();
   $todaydate = date('d-m-Y');

   $check = Addproductsize::where(['size_name'=>$data['size_name'],'size_product_id'=>$product_id])->first();

   if($check){

       return 0;

   }else{

     $size = new Addproductsize;

     $size->size_product_id = $product_id;
     $size->size_name = $data['size_name'];
     $size->size_weight = $data['size_weight'];
     $size->size_stock = $data['size_stock'];
     $size->size_added_date = $todaydate;
     $size->save();

       return 1;

   }





}


//activesizeunactive

public function activesizeunactive($size_id){

 Addproductsize::where(['size_id'=>$size_id])->update(['size_status'=>0]);
 return 0;

}


public function unactivesizeactive($size_id){

 Addproductsize::where(['size_id'=>$size_id])->update(['size_status'=>1]);
 return 1;

}

//sizedelete

public function sizedelete($size_id){

 Addproductsize::where(['size_id'=>$size_id])->delete();
 return 1;

}


//showallproductcolor

public function showallproductcolor($product_id){


  $myallcolor = DB::table('productcolors')

  ->join('addproducts','productcolors.color_product_id','=','addproducts.product_id')
  ->where('color_product_id',$product_id)
  ->get();



  return response()->json([

            'myallcolor'=>$myallcolor


          ],200);


}


//addproductcolorformaction


public function addproductcolorformaction(Request $request,$product_id){


  $data = $request->all();
  $todaydate = date('d-m-Y');

  $check = Productcolor::where(['color_name'=>$data['color_name'],'color_product_id'=>$product_id])->first();

  if($check){

      return 0;

  }else{

    $size = new Productcolor;

    $size->color_product_id = $product_id;
    $size->color_name = $data['color_name'];
    $size->color_added_date = $todaydate;
    $size->save();

    return 1;

  }


}

//activecolorunactive

public function activecolorunactive($color_id){

Productcolor::where(['color_id'=>$color_id])->update(['color_status'=>0]);
return 0;

}

//unactivecoloractive
public function unactivecoloractive($color_id){

Productcolor::where(['color_id'=>$color_id])->update(['color_status'=>1]);
return 0;

}

//unactivecoloractive
public function colordelete($color_id){

Productcolor::where(['color_id'=>$color_id])->delete();
return 0;

}

//addcouponcodeformaction

public function addcouponcodeformaction(Request $request){

   $data = $request->all();
   $todaydate = date('d-m-Y');

   $check = Addcouponcode::where(['coupon_code'=>$data['coupon_code']])->first();

   if($check){

     return 0;

   }else{


      $couponcode = new Addcouponcode;

      $couponcode->coupon_code = $data['coupon_code'];
      $couponcode->amount_type = $data['amount_type'];
      $couponcode->coupon_amount = $data['coupon_amount'];
      $couponcode->coupon_added_date = $todaydate;
      $couponcode->coupon_expire_date = $data['coupon_expire_date'];
      $couponcode->save();

      return 1;
      // $couponcode->coupon_code = $data['coupon_code'];



   }


}

//showallcouponcode


public function showallcouponcode(){


 $myallcouponcode  = Addcouponcode::get();


   return response()->json([

             'myallcouponcode'=>$myallcouponcode


           ],200);

}

//activecouponunactive

public function activecouponunactive($coupon_id){

  Addcouponcode::where(['coupon_id'=>$coupon_id])->update(['coupon_status'=>0]);
  return 0;

}

//unactivecouponactive

public function unactivecouponactive($coupon_id){

  Addcouponcode::where(['coupon_id'=>$coupon_id])->update(['coupon_status'=>1]);
  return 1;

}


//coupondelete

public function coupondelete($coupon_id){

  Addcouponcode::where(['coupon_id'=>$coupon_id])->delete();
  return 1;

}

//showwebsiteletestproduct


public function showwebsiteletestproduct(){


  $letestproduct = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')

->where('product_status',1)->orderBy('product_id','DESC')
->limit(8)
->get();

//return $productinfo;

  return response()->json([

            'letestproduct'=>$letestproduct


          ],200);


}

//showwebsitenewproduct


public function showwebsitenewproduct(){

  $shownewproduct = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')

->where('product_status',1)
 ->inRandomOrder()
// ->limit(8)
->get();

//return $productinfo;

  return response()->json([

            'shownewproduct'=>$shownewproduct


          ],200);


}


//websiteproductdetailsinformation


public function websiteproductdetailsinformation($product_id){

  $webiteproductdetails = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')
  ->where('product_id',$product_id)
  ->first();


    $checkstock = Addproductsize::where(['size_product_id'=>$product_id])->get();

    $sumstock = Addproductsize::where(['size_product_id'=>$product_id])->sum('size_stock');

    if($sumstock == null){

           $mystock = 0;

    }else{


         $mystock = 1;

    }

  return response()->json([

            'webiteproductdetails'=>$webiteproductdetails,
            'mystock'=>$mystock


          ],200);


}



//showallproductsizeinwebsite


public function showallproductsizeinwebsite($product_id){


$allsize = Addproductsize::where(['size_product_id'=>$product_id,'size_status'=>1])->get();

return response()->json([

          'allsize'=>$allsize

        ],200);

}


//showallproductcolorinwebsite

public function showallproductcolorinwebsite($product_id){


   $allcolor = Productcolor::where(['color_product_id'=>$product_id,'color_status'=>1])->get();

   return response()->json([

             'allcolor'=>$allcolor

           ],200);



}


//addtocartproductformaction

public function addtocartproductformaction(Request $request){


  Session::forget('my_discount');
  Session::forget('mycouponcode');

   $data = $request->all();

   $myproductquntity = $request->my_product_quantity;

   $myproductcolorid = $request->color_id;

   $myproductid = $request->productid;

   $prouctize = $request->size_id;


   $productinformation  = Addproduct::where(['product_id'=>$myproductid])->first();

   $productsizeinformtion = Addproductsize::where(['size_id'=>$prouctize])->first();

   $selectproductsize = $productsizeinformtion->size_name;

   $productcolorinformtion  = Productcolor::where(['color_id'=>$myproductcolorid])->first();

   $selectprouctcolor = $productcolorinformtion->color_name;

   $productsizestocks = $productsizeinformtion->size_stock;




  if($productsizestocks < $myproductquntity){


   return 0;



  }else{


             $data['id'] = $myproductid;
             $data['qty'] = $myproductquntity;
             $data['name'] = $productinformation->product_name;
             $data['price'] = $productinformation->product_price;
             $data['options']['size'] = $selectproductsize;
             $data['options']['sizeid'] = $prouctize;
             $data['options']['color'] = $selectprouctcolor;
             $data['options']['image'] = $productinformation->product_image;

             Cart::add($data);


             return 1;

           }


}


//showallattocartproduct



public function showmuallattocartproduct(){

    return Cart::content();






}



public function delateaddtocartproduct($rowId){

  Session::forget('my_discount');
  Session::forget('mycouponcode');

Cart::remove($rowId);


}

//totalsubtotaltax


public function totalsubtotaltax(){



      $total = Cart::total();

      $subtotal = Cart::subtotal();

      $tax = Cart::tax();



    return response()->json([

         'total'=>$total,
         'subtotal'=>$subtotal,
         'tax'=>$tax

            ],200);


}


///quantityupdateformaction


public function quantityupdateformaction(Request $request){

  Session::forget('my_discount');
  Session::forget('mycouponcode');

  $data = $request->all();


  $myproductsize = $request->size;
  $my_qty = $request->qty;
  $my_rowid = $request->rowId;
  $pro_id = $request->id;


//return $myproductsize;

   $productsizeinformtion  = Addproductsize::where(['size_product_id'=>$pro_id,'size_name'=>$myproductsize])->first();

   $myproductstock = $productsizeinformtion->size_stock;


  if($myproductstock < $my_qty){


   return 0;


  }else{


   Cart::update($my_rowid,$my_qty);

    return 1;

  }



}



//applycoupon_codeformaction

public function applycoupon_codeformaction(Request $request){


  Session::forget('my_discount');
  Session::forget('mycouponcode');


  $data = $request->all();

  $cartsubtotal = Cart::subtotal();

  $myapplycupon = $request->apply_coupon_code;


 $checkmycuponsmillerornot = Addcouponcode::where(['coupon_code'=> $myapplycupon,'coupon_status'=>1])->first();




   if($checkmycuponsmillerornot){

      $couponexpiredate = $checkmycuponsmillerornot->coupon_expire_date;

      $currentdate = date("d-m-Y");

      $mytoday = strtotime($currentdate);

      $myexpiredate = strtotime($couponexpiredate);


        if($myexpiredate < $mytoday){

           return 1;

        }else{



             if($checkmycuponsmillerornot->amount_type == "Fixed"){

               $myamountaftercouponapply = $checkmycuponsmillerornot->coupon_amount;

               //return $myamountaftercouponapply;


              }


              else{

                   $couponpercentage = $checkmycuponsmillerornot->coupon_amount;

                  //  return $couponpercentage;

                   $myamountaftercouponapply = $cartsubtotal * ($couponpercentage/100);


                //   return $myamountaftercouponapply;



              }


              Session::put('my_discount',$myamountaftercouponapply);

              Session::put('mycouponcode',$myapplycupon);

              $my_dicount = Session::get('my_discount');


              //return $my_dicount;

                return 2;



   }



} else{



   return 0;



}

}


public function discountmoneyafterapplycoupon(){


  $my_dicount = Session::get('my_discount');

  return $my_dicount;


}



//showallinvoiceinformation


public function showallinvoiceinformation(){



  $total = Cart::total();

  $subtotal = Cart::subtotal();

  $tax = Cart::tax();

  $discountapplycoupon = Session::get('my_discount');

  $showalladdtocartproduct = Cart::content();

  $todaydate = date('d-m-Y');

  $customerid = Session::get('customer_id');

  $customerinformation = Customerloginandregistration::where(['customer_id'=>$customerid])->first();

  $shippingid = Session::get('shipping_id');

  $shippinginformation = Shippinginformation::where(['shipping_id'=>$shippingid])->first();




return response()->json([

     'total'=>$total,
     'subtotal'=>$subtotal,
     'tax'=>$tax,
     'discountapplycoupon'=>$discountapplycoupon,
     'showalladdtocartproduct'=>$showalladdtocartproduct,
     'today'=>$todaydate,
     'customerinformation'=>$customerinformation,
     'shippinginformation'=>$shippinginformation


        ],200);






}








public function headerallinformation(){

  $carttotal = Cart::total();

 $discountapplycoupon = Session::get('my_discount');

 $showalladdtocartproduct = Cart::content();

 $customerid = Session::get('customer_id');

 $shippingid = Session::get('shipping_id');

 $cartproductcount = Cart::count();



 return response()->json([

   'customerid'=>$customerid,
   'shippingid'=>$shippingid,
   'cartproductcount'=>$cartproductcount,
   'carttotal'=>$carttotal,
   'discountapplycoupon'=>$discountapplycoupon



         ],200);






}












//catgoryandsubcategoryshowheader


public function catgoryandsubcategoryshowheader(){


        $categoryandsubcategory = Addcategory::with('parentcategory')->where(['category_type'=>0,'category_status'=>1])->get();



        return response()->json([

          'categoryandsubcategory'=>$categoryandsubcategory,

        ],200);

}

//mycategorywiseproductshow

public function mycategorywiseproductshow($id){

   $categoryinfo = Addcategory::where(['id'=>$id])->first();

  // return $categoryinfo;

 $categoryproduct = DB::table('addproducts')
//
 ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')
 ->where('product_cat_id',$id)
  ->where('product_status',1)
 ->get();

//
// return  $categoryproduct;

 return response()->json([

   'categoryinfo'=>$categoryinfo,
   'categoryproduct'=> $categoryproduct

 ],200);




//return $categoryproduct;


}


//productdelete

public function productdelete($product_id){

  Addproduct::where(['product_id'=>$product_id])->delete();

  return 1;


}





//adminloginformaction


public function adminloginformaction(Request $request){


   $email = $request->admin_email;

   $password = md5($request->admin_password);

   
   $check = Adminlogin::where(['admin_email'=>$email,'admin_password'=>$password])->first();

   
   if($check){



      Session::put('admin_id',$check->admin_id);

        return 11;


      // return 'right';

   }else{


       return 12;  


      //  return 'wrong';

   }


//   return $password;




}



//showadmininfo


public function showadmininfo(){


   $adminid = Session::get('admin_id');


   $userinfo = Adminlogin::where(['admin_id'=>$adminid])->first();


   return $userinfo;



}





//showoveralldescription

public function showoveralldescription(){

       // $today = date("d-m-Y");

        $today = date('d-m-y');

    $category = DB::table('addcategories')

              ->where('category_status',1)
              ->count('id');


   // return $category;


    $products = DB::table('addproducts')

              ->where('product_status',1)
              ->count('product_id');


             // return $products;


      $pendingorder = DB::table('orders')

                  ->where('order_status',0)
                  ->count('order_id');



      $successorder = DB::table('orders')

                  ->where('order_status',1)
                  ->count('order_id');






      $totalsellproductquantity =  DB::table('orders')

                  ->where('order_status',1)
                  ->sum('order_total_products');




      $totalsellproductmoney =  DB::table('orders')

                  ->where('order_status',1)
                  ->sum('order_total');




      $totalselltodaymoney = DB::table('orders')
                 
                 ->where('order_date',$today)
                  ->where('order_status',1)
                  ->sum('order_total');






      $quantistocksproduct = DB::table('addproductsizes')
                 
        
                  ->where('size_status',1)
                  ->sum('size_stock');





               return response()->json([

                 'category'=>$category,
                 'products'=>$products,
                 'pendingorder'=>$pendingorder,
                 'successorder'=>$successorder,

                 'totalsellproductquantity'=>$totalsellproductquantity,
                 'totalsellproductmoney'=>$totalsellproductmoney,
                 'totalselltodaymoney'=>$totalselltodaymoney,
                 'quantistocksproduct'=>$quantistocksproduct


              ],200);



                 // return $successorder;



}






//adminlogout

public function adminlogout(){


 Session::forget('admin_id');

 return 1;



}




//productdisplayfrontend


public function productdisplayfrontend(){



  $letestproduct = DB::table('addproducts')

  ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')

->where('product_status',1)->orderBy('product_id','DESC')
->limit(8)
->get();

//return $productinfo;

  return response()->json([

            'letestproduct'=>$letestproduct


          ],200);





}



//searchproduct


public function searchproduct(){


  $search = \Request::get('s');


      
  $searches = DB::table('addproducts')

 ->join('addcategories','addproducts.product_cat_id','=','addcategories.id')

  ->where('product_name','LIKE',"%$search%")

  ->orWhere('category_name','LIKE',"%$search%")

  ->get();



    return response()->json([

            'searches'=>$searches


     ],200);


}









//
// public function sam(){
//
//
// $display_category = Addcategory::with('parentcategory')->where(['category_type'=>0,'category_status'=>1])->get();
//   //echo "hello";
//
//
// //echo $display_category;
// return $display_category;
// //  echo "<pre>";
//
// //print_r($display_category);
//
//
// }
//


//public function


//
// //admin login pannel show
// public function login_page_show(){
//
//    return view('admin.admin_login');
//
//
// }
//
//
// //show admin dashboard
//
// public function admindashboard_show(){
//
// //   $today_date = date('d-m-y');
// //
// // $today_sells = DB::table('orders')->sum('sub_total');
// //
// //
// //   return $today_sells;
// //
//
//
//   return view('admin.admin_dash_board');
//
// }
//
//
//
//
// //ADMIN LOGIN FORM ACTION
//
// public function adminlogin_formaction(Request $request){
//
// if($request->isMethod('post')){
//               $data = $request->input();
//              if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
//
//
//                  return redirect('/admin_dashboard');
//
//
//              } else{
//
//                  return redirect('/admin')->with('flash_message_error','Invalid username or password');
//
//
//
//              }
//
//
//
//
//
// }
//
// }
//
// //admin admin_logout
//
// public function adminlogout(){
//
//   Session::flush();
// return redirect('/admin')->with('flash_message_error','Logout successfully');
//
// }
//
// //admin password change page show
//
//
// public function adminpassword_change_pageshow(){
//
//   return view('admin.admin_password_change');
//
//
// }
// //admin password change form action
//
// public function adminpassword_change_formaction(Request $request){
//
//        if($request->isMethod('post')){
//
//     $data = $request->all();
//
//     // echo "<pre>";
//     // print_r($data);
//
//     $password = bcrypt($data['new_password']);
//
//     User::where('id','1')->update(['password'=>$password]);
// return redirect('/admin')->with('flash_message_error','Password change successfully');
//
//
//        }
//
//
//
//
//
//
// }
//



}
