

import Mycomponent from './mynewcomponent/Myfirstcomponent.vue'
import Myabout from './mynewcomponent/Myabout.vue'
//import Myheader from './mynewcomponent/Myheader.vue'






import Adminlogin from './Adminbackend/Adminlogin.vue'
import Admaindashboard from './Adminbackend/Admaindashboard.vue'
import Addcategory from './Adminbackend/Addcategory.vue'
import Editcategory from './Adminbackend/Editcategory.vue'
import Viewcategory from './Adminbackend/Viewcategory.vue'
import Addproduct from './Adminbackend/Addproduct.vue'
import Editproduct from './Adminbackend/Editproduct.vue'
import Viewproduct from './Adminbackend/Viewproduct.vue'
import Addproductsize from './Adminbackend/Addproductsize.vue'

import Editproductsize from './Adminbackend/Editproductsize.vue'

import Addproductcolor from './Adminbackend/Addproductcolor.vue'
import Addcouponcode from './Adminbackend/Addcouponcode.vue'
import Showallorder from './Adminbackend/Showallorder.vue'
import Vieworderdetails from './Adminbackend/Vieworderdetails.vue'

import Websitehome from './Adminfrontend/Websitehome.vue'
import Viewwebsiteproductdetails from './Adminfrontend/Viewwebsiteproductdetails.vue'
import Displayaddtocartproduct from './Adminfrontend/Displayaddtocartproduct.vue'
import CustomerLoginandRegistration from './Adminfrontend/CustomerLoginandRegistration.vue'
import Shippinginformation from './Adminfrontend/Shippinginformation.vue'
import Invoice from './Adminfrontend/Invoice.vue'
import Categorywiseproductshow from './Adminfrontend/Categorywiseproductshow.vue'




export const routes  = [



   { path: '/my_component',component: Mycomponent, name: Mycomponent},
    { path: '/my_about',component:Myabout, name:Myabout},
  // { path: '/my_header',component: Myheader, name: Myheader},











//Adminlogin

  { path: '/admin',component:Adminlogin, name:Adminlogin},
  { path: '/admin_dashboard',component: Admaindashboard, name:Admaindashboard},
  { path: '/add_category',component:Addcategory, name:Addcategory },
  { path: '/edit_category_route/:id',component:Editcategory, name: Editcategory },
  { path: '/view_category/:id',component:Viewcategory, name: Viewcategory },
  { path: '/add_product',component:Addproduct, name: Addproduct},
  { path: '/edit_product/:product_id',component:Editproduct, name:Editproduct},
  { path: '/view_product/:product_id',component:Viewproduct, name:Viewproduct},
  { path: '/add_product_size/:product_id',component:Addproductsize, name:Addproductsize},

  { path: '/edit_product_size/:size_id',component:Editproductsize, name:Editproductsize},





  { path: '/add_product_color/:product_id',component:Addproductcolor, name:Addproductcolor},

  { path: '/add_coupon_code',component:Addcouponcode, name: Addcouponcode},

    { path: '/show_all_order',component:Showallorder, name: Showallorder},

   { path: '/view_order_details/:order_id',component:Vieworderdetails, name:Vieworderdetails},





 //Frontend

   { path: '/',component:Websitehome, name:Websitehome},
   { path: '/view_webite_product_details/:product_id',component:Viewwebsiteproductdetails, name:Viewwebsiteproductdetails},
   { path: '/diplay_addtocart_producart',component:Displayaddtocartproduct, name:Displayaddtocartproduct},
   { path: '/create_invoice',component:Invoice, name:Invoice},
   { path: '/category_wise_product_show/:id',component:Categorywiseproductshow, name: Categorywiseproductshow},

   { path: '/customer_login_and_registration',component:CustomerLoginandRegistration, name: CustomerLoginandRegistration},

   { path: '/shipping_information',component:Shippinginformation, name: Shippinginformation},






]
