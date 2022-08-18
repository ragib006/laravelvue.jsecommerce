<template>
<span>


  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="/shope_product" class="nav-link">Home</router-link>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>

      <li class="nav-item d-none d-sm-inline-block">
        <router-link to="/add_to_cart" class="nav-link">Cart</router-link>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block" v-if="customerloginshowlogout">
        <router-link to="/shepping" class="nav-link">Checkout</router-link>
      </li>
      <li class="nav-item d-none d-sm-inline-block" v-else="!customerloginshowlogout">
        <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
      </li> -->

      <!-- <li class="nav-item d-none d-sm-inline-block" v-if="customerloginshowlogout!==null && myshippingid==null">
        <router-link to="/shepping" class="nav-link">Checkout</router-link>
      </li>


      <li class="nav-item d-none d-sm-inline-block" v-else-if="customerloginshowlogout!==null && myshippingid!==null">
        <router-link to="/order" class="nav-link">Checkout</router-link>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block" v-else="customerloginshowlogout==null || myshippingid==null">
        <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
      </li> -->
      <!-- <li class="nav-item d-none d-sm-inline-block" v-else>
        <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
      </li> -->



            <li class="nav-item d-none d-sm-inline-block" v-if="customerloginshowlogout && !myshippingid">
              <router-link to="/shepping" class="nav-link">Checkout</router-link>
            </li>


            <li class="nav-item d-none d-sm-inline-block" v-else-if="customerloginshowlogout && myshippingid">
              <router-link to="/order" class="nav-link">Checkout</router-link>
            </li>

            <!-- <li class="nav-item d-none d-sm-inline-block" v-else="customerloginshowlogout==null || myshippingid==null">
              <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
            </li> -->
            <li class="nav-item d-none d-sm-inline-block" v-else="!customerloginshowlogout && !myshippingid">
              <router-link to="/login_and_register" class="nav-link">Checkout</router-link>
            </li>













        <li class="nav-item d-none d-sm-inline-block" v-if="customerloginshowlogout">

         <a class="nav-link" @click.prevent="mylogout()" style="font-weight:bold;color:blue;">Logout</a>
<!-- @click.prevent = "deletecategory(showcategory.id)" -->
        <!-- <p class="nav-link" @click.prevent = "logout()">Logout</p>-->
      </li>

       <li class="nav-item d-none d-sm-inline-block" v-else="!customerloginshowlogout">
        <router-link to="/login_and_register" class="nav-link" style="font-weight:bold;color:blue;">Login</router-link>
      </li>

      <!-- <li class="nav-item d-none d-sm-inline-block">
        <router-link to="/login_and_register" class="nav-link">Login</router-link>
      </li> -->

    </ul>


    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

  </nav>









</span>
</template>

<script>


import Datepicker from 'vuejs-datepicker';

    export default {


      data () {
        return {

        //  showallcoupon:{},

        customerloginshowlogout:{},
        sessionflashlogout:{},
        myshippingid:{},



          // coupon_code: '',
          // amount: '',
          // amount_type: '',
          // expiry_date: '',
          // coupon_status:'',

        }
      },

      components: {
        Datepicker
      },


    methods:{




     loginshowlogout(){

    axios.get('/get_customer_id').then(({data}) => (this.customerloginshowlogout = data));


     },

    getshippingid(){

    axios.get('/get_shipping_id').then(({data}) => (this.myshippingid = data));

    },








      mylogout(){

     axios.get('/click_and_logout').then(({data}) => (this.sessionflashlogout = data));

     Toast.fire({
          icon: 'success',
          title: 'Successfully logout'
           })

       this.$router.push('/shope_product')

      // console.log('hi');


      },



    //login

    //  logincustomer(){
    // //
    //   axios.post('/logincustomer_formaction',{customer_login_email:this.customer_login_email,product_login_password:this.product_login_password })
    //   .then((response)=>{
    //
    //      if(!this.ragibcustomerid){
    //
    //        Toast.fire({
    //        icon: 'success',
    //        title: 'Email Password Not Valid'
    //         })
    //
    //
    //         this.$router.push('/login_and_register')
    //         // this.$router.push('/shepping')
    //
    //      }else{
    //
    //        Toast.fire({
    //        icon: 'success',
    //        title: 'Email Password Not Valid'
    //         })
    //
    //
    //        this.$router.push('/shepping')
    //
    //      }
    //
    //  console.log('customer login successfully');
    //  })
    //
    //    .catch(()=>{
    //   // this.$router.push('/login_and_register')
    //
    //     console.log('fail');
    //
    //    })
    //
    //
    // },




// loginshowlogout(){
//
// axios.get('/customer_login_show_logout').then(({data}) => (this.customerloginshowlogout = data));
//
// },




},







        mounted() {

        // this.mylogout();
        //setInterval(() => this.mylogout(),3000);
        this.loginshowlogout();
       setInterval(() => this.loginshowlogout(),1000);

         this.getshippingid();
         setInterval(() => this.getshippingid(),1000);
        // //
        // // this.logout();

        //this.get_all_coupon();


        }
    }
</script>
