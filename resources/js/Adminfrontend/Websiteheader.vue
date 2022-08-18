<template>
  <span>



    <div class="header">

      <nav class="navbar navbar-expand-lg navbar-light" style="background:#333333">
      <div class="container-fluid">
        <a class="navbar-brand" href="#" style="color:white;color:white;font-family:cursive;margin-left:90px;color:white">World Best Ecommerce Website</a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:450px;">



        <span style="font-family:sans-serif;font-size:17px;margin-right:60px;color:white">Email - zapsplat006@gmail.com</span>
       <span style="margin-right:10px;"> <i class="fas fa-phone" style="font-size:22px;color:white"></i></span>
       <span style="font-family:cursive;font-size:17px;color:white">++00564545</span>




      </div>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-light" style="background:#333333">
      <div class="container-fluid" style="margin-bottom:20px;">
        <span style="margin-left:190px;"><a class="navbar-brand" href="#">

          <img style="height:45px;" src="/images/ppp.jpg" alt="Not Found">

        </a></span>

        <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left:120px;">


          <form class="d-flex">

  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" style="width:500px;" @keyup="RealSearch" v-model="keyword">

            <button class="btn btn-success" type="submit" @click.prevent="RealSearch" style="margin-left:-40px;"><i class="fa fa-search" aria-hidden="true"></i>
    </button>

          </form>

          <span style="margin-left:50px;"><i class="fa fa-shopping-cart" aria-hidden="true" style="font-size:23px;color:white"></i></span>

          <span  class="rounded-circle bg-success" style="height:27px;width:27px;margin-left:5px;margin-top:-30px;" v-if="cartproductcount">
            <p style="margin-left:9px;margin-top:2px;font-family:cursive;color:white">{{cartproductcount}}</p>
          </span>

          <span  class="rounded-circle bg-success" style="height:27px;width:27px;margin-left:5px;margin-top:-30px;" v-else="!cartproductcount">
            <p style="margin-left:9px;margin-top:2px;font-family:cursive;color:white">0</p>
          </span>


        <span style="margin-left:25px;font-size:18px;font-family:sans-serif;color:white">Cart - </span>

        <!-- discountapplycoupon -->
        <span style="margin-left:10px;font-size:18px;font-family:cursive;color:white" v-if="discountapplycoupon">{{carttotal-discountapplycoupon}} TK</span>

        <span style="margin-left:10px;font-size:18px;font-family:cursive;color:white" v-else="carttotal">{{carttotal}} TK</span>

        <!-- <span style="margin-left:10px;font-size:18px;font-family:cursive;color:white" v-else-if="!carttotal && !discountapplycoupon">00.500 TK</span>

            <span style="margin-left:10px;font-size:18px;font-family:cursive;color:white" v-else="!carttotal">3.00 TK</span> -->



            <!-- <td v-if="discountapplycoupon">{{total - discountapplycoupon}} Tk</td>
            <td v-else="!discountapplycoupon">{{total}} TK</td> -->


        </div>
      </div>
    </nav>

      <nav id="menu" class="navbar" style="background:black">
        <div class="nav-inner">
          <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
            <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
          </div>
          <div class="navbar-collapse">
            <ul class="main-navigation">
              <li><router-link to="/"   class="parent"  style="text-decoration:none;font-family:tahoma;">Home</router-link> </li>




              <li><a href="#" class="active parent" style="text-decoration:none;font-family:tahoma;">Product</a>


                <ul style="width:900px;">

                  <div class="row">
                      <div class="col-md-3" style="margin-bottom:15px;" v-for="v_sho in categoryandsubcategory">



                        <!-- <p>{{v_sho.parentcategory.category_name}}</p> -->


                        <li style="margin-bottom:10px;">
                          <span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;">{{v_sho.category_name}}</span>
                        </li>


            <!-- <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">{{v_show.manysubcat.category_name}}</a></li> -->


                        <!-- <li v-for="v_show in v_sho">
                          <a href="category.html"style="text-decoration:none;font-family:tahoma;">{{v_show.parentcategory.category_name}}</a>
                        </li> -->

                        <span v-if="v_sho.parentcategory">
                        <li v-for = "answer in v_sho.parentcategory">
                          <router-link :to="`/category_wise_product_show/${answer.id}`" style="text-decoration:none;font-family:tahoma;">{{answer.category_name}}</router-link>

                        </li>
                      </span>
                        <!-- <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li> -->

                      </div>


                      <!-- <div class="col-md-3" style="margin-bottom:15px;">
                        <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;"> Indian Shirt</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">dfdsfd</a></li>
                        <li><a href="cart.html"style="text-decoration:none;font-family:tahoma;">dfgg</a></li>
                        <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li>

                      </div> -->


                      <!-- <div class="col-md-3" style="margin-bottom:15px;">
                        <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;">Electronices</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">dfdsfd</a></li>
                        <li><a href="cart.html"style="text-decoration:none;font-family:tahoma;">dfgg</a></li>
                        <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li>

                      </div> -->

<!--
                      <div class="col-md-3" style="margin-bottom:15px;">
                          <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;">T-Shirt</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">dfdsfd</a></li>
                        <li><a href="cart.html"style="text-decoration:none;font-family:tahoma;">dfgg</a></li>
                        <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li>

                      </div> -->


                      <!-- <div class="col-md-3" style="margin-bottom:15px;">
                        <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;"> Indian Shirt</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">dfdsfd</a></li>
                        <li><a href="cart.html"style="text-decoration:none;font-family:tahoma;">dfgg</a></li>
                        <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li>

                      </div> -->


                      <!-- <div class="col-md-3" style="margin-bottom:15px;">
                        <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;"> Indian Shirt</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">dfdsfd</a></li>
                        <li><a href="cart.html"style="text-decoration:none;font-family:tahoma;">dfgg</a></li>
                        <li><a href="checkout.html"style="text-decoration:none;font-family:tahoma;">fgfdg</a></li>

                      </div> -->


                      <!-- <div class="col-md-3" style="margin-bottom:15px;">
                        <li><span style="font-weight:bold;color:black;font-size:17px;border-bottom:2px solid green;margin-left:8px;">Login</span></li>
                        <li><a href="category.html"style="text-decoration:none;font-family:tahoma;">About Us</a></li>


                      </div> -->


                  </div>


                </ul>


              </li>




              <li><router-link to="/diplay_addtocart_producart"   class="parent" style="text-decoration:none;font-family:tahoma;" >Cart</router-link> </li>


              <li v-if="customerid && !shippingid" ><router-link to="/shipping_information"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>

              <li v-else-if="customerid && shippingid"><router-link to="/create_invoice"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>

              <li v-else="!customerid && !shippingid"><router-link to="/customer_login_and_registration"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>


              <!-- <li class="nav-item d-none d-sm-inline-block" v-if="customerloginshowlogout && !myshippingid">
       <router-link to="/shepping" class="nav-link">Checkout</router-link>
     </li>


     <li class="nav-item d-none d-sm-inline-block" v-else-if="customerloginshowlogout && myshippingid">
       <router-link to="/order" class="nav-link">Checkout</router-link>
     </li>


     <li class="nav-item d-none d-sm-inline-block" v-else="!customerloginshowlogout && !myshippingid">
       <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
     </li>
 -->











              <li><a href="about-us.html" style="text-decoration:none;font-family:tahoma;">About us</a></li>
              <li><a href="contact.html" style="text-decoration:none;font-family:tahoma;">Contact Us</a> </li>


          <li v-if="customerid">
            <a  style="text-decoration:none;font-family:tahoma;" @click.prevent = "mycustomerlogout(customerid)" >Logout</a>

             <!-- = "addcategory()" -->




          </li>


          <li v-else="!customerid">
              <router-link to="/customer_login_and_registration" class="parent"  style="text-decoration:none;font-family:tahoma;" >Login</router-link>

          </li>



        <!-- <li> -->



        <!-- <td v-if="discountapplycoupon">{{discountapplycoupon}} TK</td>
        <td v-else="!discountapplycoupon">00.00 TK</td>

 -->


            </ul>
          </div>
        </div>
      </nav>

    </div>



  </span>
</template>

<script>
  import _ from 'lodash'

import Mywebiteheader from "./Websiteheader.vue"

import Mybackendfooter from "./Websitefooter.vue"

export default {


  data () {
    return {



customerid:{},
shippingid:{},
customerlogout:{},
cartproductcount:{},
carttotal:{},
discountapplycoupon:{},
categoryandsubcategory:{},

keyword:'',

      form: new Form({



      })
    }
  },




  components: {
    //carousel,
     Mywebiteheader,

     Mybackendfooter,

   },



methods:{



RealSearch:_.debounce(function(){

this.$store.dispatch('SearchProduct',this.keyword);

},500),





Inheadercustomerandshippinginfo(){


  axios.get('/header_all_information').then((res) => {

     this.customerid = res.data.customerid,
     this.shippingid = res.data.shippingid,


     this.cartproductcount = res.data.cartproductcount,
     this.carttotal = res.data.carttotal,
     this.discountapplycoupon = res.data.discountapplycoupon



  })



},



//categorysubcategoryshowinheader

categorysubcategoryshowinheader(){

  axios.get('/catgory_and_subcategory_show_header').then((res) => {

    //  console.log(res.data)

     this.categoryandsubcategory = res.data.categoryandsubcategory
     // this.shippingid = res.data.shippingid


  })






},





mycustomerlogout(customerid){

    axios.get('/customer_logout/'+customerid)
  .then((response)=>{


    Toast.fire({
    icon: 'success',
    title: 'Successfully Logout'
    })


   this.$router.push('/')

  })




},







  ourimage(img){

          return "/images/"+img;

      },



  //    RealSearch(){


    //     this.$store.dispatch('SearchProduct',this.keyword)


    //  }



 // RealSearch:_.debounce(function(){

//this.$store.dispatch('SearchProduct',this.keyword);

//},1000),







},


computed:{


},




    mounted(){

  

       this.categorysubcategoryshowinheader();
       this.Inheadercustomerandshippinginfo();
	     setInterval(() => this.Inheadercustomerandshippinginfo(),4000);


       this.RealSearch();



    }
}
</script>
