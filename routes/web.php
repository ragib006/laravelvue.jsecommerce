<?php

use Illuminate\Support\Facades\Route;




//admin_login_form_action


 Route::post('/admin_login_form_action','AdminController@adminloginformaction');


Route::get('/admin_dashboard','AdminController@admindashboard');
//show_admin_info

Route::get('/show_admin_info','AdminController@showadmininfo');


Route::get('/my_all_package_get','AdminController@myallpackageget');


Route::get('/get_data','AdminController@getdata');

//show_overall_description


Route::get('/show_overall_description','AdminController@showoveralldescription');

//admin_logout



Route::get('/admin_logout','AdminController@adminlogout');

//product_display_frontend

Route::get('/product_display_frontend','AdminController@productdisplayfrontend');





//addcategory_formaction
 Route::post('/addcategory_formaction','AdminController@addcategoryformaction');
//show_all_category_in_form

Route::get('/show_all_category_in_form','AdminController@showallcategoryinform');

//show_all_category
Route::get('/show_all_category','AdminController@showallcategory');

//active_category_unactive


Route::get('/active_category_unactive/{id}','AdminController@activecategoryunactive');

//

Route::get('/unactive_category_active/{id}','AdminController@unactivecategoryactive');

//edit_categoryplaceholder_value

Route::get('/edit_categoryplaceholder_value/{id}','AdminController@editcategoryplaceholdervalue');

//category_delete

Route::get('/category_delete/{id}','AdminController@categorydelete');


Route::post('/update_category/{id}','AdminController@updatecategory');

//addcategory_formaction

Route::get('/category_delete/{id}','AdminController@categorydelete');

//view_category_details

Route::get('/view_category_details/{id}','AdminController@viewcategorydetails');

//show_all_sub_category_in_form

Route::get('/show_all_sub_category_in_form','AdminController@showallsubcategoryinform');

//add_product_formaction
Route::post('/add_product_formaction','AdminController@addproductformaction');

//show_all_product

Route::get('/show_all_product','AdminController@showallproduct');

//edit_libary_book_placeholder_value

Route::get('/edit_libary_book_placeholder_value/{product_id}','AdminController@editlibarybookplaceholdervalue');

//update_product
Route::post('/update_product/{product_id}','AdminController@updateproduct');

//view_my_product
Route::get('/view_my_product/{product_id}','AdminController@viewmyproduct');


//product_delete

Route::get('/product_delete/{product_id}','AdminController@productdelete');
//active_product_unactive

Route::get('/active_product_unactive/{product_id}','AdminController@activeproductunactive');

//unactive_product_active

Route::get('/unactive_product_active/{product_id}','AdminController@unactiveproductactive');

//show_all_product_size

Route::get('/show_all_product_size/{product_id}','AdminController@showallproductsize');

//add_productsize_formaction

Route::post('/add_productsize_formaction/{product_id}','AdminController@addproductsizeformaction');

//active_size_unactive
Route::get('/active_size_unactive/{product_id}','AdminController@activesizeunactive');

//unactive_size_active
Route::get('/unactive_size_active/{product_id}','AdminController@unactivesizeactive');

//size_delete
Route::get('/size_delete/{product_id}','AdminController@sizedelete');

//show_all_product_color
Route::get('/show_all_product_color/{product_id}','AdminController@showallproductcolor');

//add_productcolor_formaction
Route::post('/add_productcolor_formaction/{product_id}','AdminController@addproductcolorformaction');
//active_color_unactive

Route::get('/active_color_unactive/{color_id}','AdminController@activecolorunactive');

//unactive_color_active

Route::get('/unactive_color_active/{color_id}','AdminController@unactivecoloractive');

//color_delete
Route::get('/color_delete/{color_id}','AdminController@colordelete');

//add_coupon_code_formaction
Route::post('/add_coupon_code_formaction','AdminController@addcouponcodeformaction');

//myallcouponcode
Route::get('/show_all_coupon_code','AdminController@showallcouponcode');



//active_coupon_unactive
Route::get('/active_coupon_unactive/{coupon_id}','AdminController@activecouponunactive');
//unactive_coupon_active
Route::get('/unactive_coupon_active/{coupon_id}','AdminController@unactivecouponactive');
//coupon_delete
Route::get('/coupon_delete/{coupon_id}','AdminController@coupondelete');

//show_my_all_order
Route::get('/show_my_all_order','CustomerController@showmyallorder');

//display_my_website_order_details

Route::get('/display_my_website_order_details/{order_id}','CustomerController@displaymywebsiteorderdetails');

//success_payment_pending

Route::get('/success_payment_pending/{order_id}','CustomerController@successpaymentpending');


//pending_payment_success

Route::get('/pending_payment_success/{order_id}','CustomerController@pendingpaymentsuccess');


////order_delete


Route::get('/order_delete/{order_id}','CustomerController@orderelete');

//admin_pending_order_success

Route::get('/admin_pending_order_success/{order_id}','CustomerController@adminpendingordersuccess');


//edit_product_size_placeholder_value

Route::get('/edit_product_size_placeholder_value/{size_id}','CustomerController@editproductsizeplaceholdervalue');

//update_product_size


Route::post('/update_product_size/{size_id}','CustomerController@updateproductsize');













//searchproduct

Route::get('/searchproduct','AdminController@searchproduct');

//show_website_letest_product
Route::get('/show_website_letest_product','AdminController@showwebsiteletestproduct');

//show_website_new_product
Route::get('/show_website_new_product','AdminController@showwebsitenewproduct');

//website_product_details_information

Route::get('/website_product_details_information/{product_id}','AdminController@websiteproductdetailsinformation');
//show_allproductsize_inwebsite

Route::get('/show_allproductsize_inwebsite/{product_id}','AdminController@showallproductsizeinwebsite');

//show_allproductcolor_inwebsite
Route::get('/show_allproductcolor_inwebsite/{product_id}','AdminController@showallproductcolorinwebsite');

//add_to_cart_product_form_action

Route::post('/add_to_cart_product_form_action','AdminController@addtocartproductformaction');

//show_all_at_to_cart_product
Route::get('/show_all_add_to_cart_product','AdminController@showmuallattocartproduct');

//delate_addto_cart_product

Route::get('/delate_addto_cart_product/{rowId}','AdminController@delateaddtocartproduct');

//total_subtotal_tax
Route::get('/total_subtotal_tax','AdminController@totalsubtotaltax');


//quantity_update_form_action
Route::post('/quantity_update_form_action','AdminController@quantityupdateformaction');

//apply_coupon_code_form_action

Route::post('/apply_coupon_code_form_action','AdminController@applycoupon_codeformaction');

//discount_money_after_applycoupon

Route::get('/discount_money_after_applycoupon','AdminController@discountmoneyafterapplycoupon');

//customer_register_form_action

Route::post('/customer_register_form_action','CustomerController@customerregisterformaction');

//customer_login_form_action

Route::post('/customer_login_form_action','CustomerController@customerloginformaction');

//shipping_information_form_action

Route::post('/shipping_information_form_action','CustomerController@shippinginformationformaction');

//show_all_invoice_information

Route::get('/show_all_invoice_information','AdminController@showallinvoiceinformation');


//header_all_information

Route::get('/header_all_information','AdminController@headerallinformation');


//customer_logout


Route::get('/customer_logout/{customerid}','CustomerController@customerlogout');

//checkout_customerid_and_shippingid

Route::get('/incheckout_customer_shipping_id','CustomerController@checkoutcustomeridandshippingid');

//catgory_and_subcategory_show_header

Route::get('/catgory_and_subcategory_show_header','AdminController@catgoryandsubcategoryshowheader');


//my_category_wise_product_show

Route::get('/my_category_wise_product_show/{id}','AdminController@mycategorywiseproductshow');

//Route::get('/sample','AdminController@sam');
//give_order_in_invoice_page

Route::post('/give_order_in_invoice_page','CustomerController@giveorderininvoicepage');















Route::get('/{any}', 'AdminController@admindashboard')->where('any', '.*');
