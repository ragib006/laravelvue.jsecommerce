    <template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

  <div class="bb" style="height:150px;width:100%;background:">

  <h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:460px;padding-top:53px;display:block;">Cart Product</h2>

  </div>

</div>



<div class="bb" style="width:80%;margin:40px auto">



  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" style="width:100px;">Image</th>
      <th scope="col" style="width:300px;">Product Name</th>
      <th scope="col" style="width:100px;padding-left:20px">Color</th>
      <th scope="col" style="width:120px;padding-left:20px">Price</th>
      <th scope="col" style="width:250px;padding-left:90px;">Quantity</th>
        <th scope="col" style="width:100px">Size</th>
      <th scope="col" style="padding-left:20px">Total</th>
      <th scope="col" style="padding-left:88px">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="cart_product in showalladdtocartproduct">
        <td><img :src="ourimage(cart_product.options.image)" alt="" style="height:70px;width:70px;"></td>
        <td><p style="margin-top:20px;color:black;font-size:16px;font-family:tahoma;">{{cart_product.name}}</p></td>
        <td><p style="margin-top:20px;color:black;font-size:16px;font-family:tahoma;margin-left:5px;">{{cart_product.options.color}}</p></td>
        <td><p style="margin-top:20px;color:black;font-size:16px;font-family:tahoma;margin-left:0px;">{{cart_product.price}} TK</p></td>
      <td>


          <form enctype="multipart/form-data" role="form" @submit.prevent ="quantityupdate(cart_product)" style="margin-left:40px;">

          <input  type="number" min="1" name="qty" v-model="cart_product.qty" style="background:#F3F6FB;border:none;width:65px;height:35px;margin-top:18px;float:left;padding-left:20px;border:1px solid pink;">


             <input v-show="false" name="rowId" v-model="cart_product.rowId">

             <input v-show="false" name="id" v-model="cart_product.id">

             <input v-show="false" name="size" v-model="cart_product.options.size">


          <button type="submit" class="btn btn-success btn-sm" style="height:33px;margin-top:19px;margin-left:18px;">Update</button>


      </form>



      </td>

        <td><p style="margin-top:20px;color:black;font-size:16px;font-family:tahoma;margin-left:5px;">{{cart_product.options.size}} </p></td>
       <td><p style="margin-top:20px;color:black;font-size:16px;font-family:tahoma;">{{cart_product.price * cart_product.qty }} TK</p></td>

       <td>
          <center>

           <a class="btn btn-info btn-sm" style="margin-top:20px;margin-left:60px" @click.prevent = "deleteproductaddtocart(cart_product.rowId)"><i style="color:white;" class="fa fa-trash" aria-hidden="true"></i></a>
          </center>
       </td>



    </tr>








  </tbody>
</table>



</div>



<!-- <h1>fdghfhgfjhh</h1> -->
<div class="mybox" style="width:80%;margin:50px auto;margin-bottom:150px;">

  <span style="font-size:22px;font-weight:bold;color:black;font-family:tahoma;">Coupon Discount</span>

    <div class="row">
      <div class="col-md-6">
      <div class="coupon" style="">

      <form  @submit.prevent = "applycoupon()">

        <input type="text" class="form-control" name="apply_coupon_code" v-model="apply_coupon_code" style="background:#F3F6FB;border:none;width:200px;height:38px;border:1px solid pink;margin-top:30px;float:left;background:#F3F6FB;padding-left:20px;font-family:tahoma" placeholder="Apply Coupon Code">

        <button type="submit" class="btn btn-success" style="margin-top:30px;margin-left:15px">Apply</button>

      </form>

   </div>
   </div>





   <div class="col-md-4">
   <div class="coupon" style="width:380px;height:330px;background:#EFEDEF;margin-left:192px;">

     <span style="color:black;font-family:sans-serif;margin-left:20px;padding-top:20px;font-weight:bold;font-size:23px;display:block;">Cart Information</span>



   <div class="row">

     <div class="col-md-6">

       <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:30px;display:block;font-family:sans-serif;">Subtotal :</span>


        <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;">Tax :</span>

          <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;">Discount :</span>

        <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;">Total :</span>

     </div>



     <div class="col-md-6">


         <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:30px;display:block;font-family:sans-serif;">{{subtotal}} TK</span>
         <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;">{{tax}} TK</span>
          <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;" v-if="discountapplycoupon">{{discountapplycoupon}} TK</span>
          <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;" v-else="!discountapplycoupon">0.0 TK</span>
          <!-- <span v-if="discountapplycoupon">{{discountapplycoupon}} TK</span>
                            <span v-else="!discountapplycoupon">0 TK</span> -->


         <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;" v-if="discountapplycoupon">{{total - discountapplycoupon}} TK</span>
       <span style="font-size:16px;font-weight:bold;color:black;margin-left:50px;padding-top:13px;display:block;font-family:sans-serif;" v-else="!discountapplycoupon">{{total}} TK</span>

         <!-- <span v-if="discountapplycoupon">{{total - discountapplycoupon}} TK</span>
                         <span v-else="!discountapplycoupon">{{total}} TK</span> -->





     </div>



   </div>


   <span v-if="customerid && !shippingid">
    <router-link to="/shipping_information" class="btn btn-success" style="margin-top:20px;margin-left:136px;">Check Out</router-link>
   </span>

   <span v-else-if="customerid && shippingid">
    <router-link to="/create_invoice" class="btn btn-success" style="margin-top:20px;margin-left:136px;">Check Out</router-link>
   </span>


   <span v-else="!customerid && !shippingid">
    <router-link to="/customer_login_and_registration" class="btn btn-success" style="margin-top:20px;margin-left:136px;">Check Out</router-link>
   </span>



<!--
    <li  ><router-link to="/shipping_information"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>

    <li v-else-if="customerid && shippingid"><router-link to="/create_invoice"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>

    <li v-else="!customerid && !shippingid"><router-link to="/customer_login_and_registration"  class="parent" style="text-decoration:none;font-family:tahoma;" >Checkout</router-link> </li>
 -->







</div>
</div>











 </div>

</div>




  <Mybackendfooter></Mybackendfooter>



</span>
</template>

<script>


 import Mywebiteheader from "./Websiteheader.vue"

  import Mybackendfooter from "./Websitefooter.vue"

    export default {


      data () {
        return {



showalladdtocartproduct:{},

discountapplycoupon:{},
total:{},
subtotal:{},
tax:{},
qty:'',
rowId:'',
id:'',
size:'',
apply_coupon_code:'',

shippingid:{},
customerid:{},
          // Create a new form instance
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



      discountmoneyafterapplycouponcode(){

         axios.get('/discount_money_after_applycoupon').then(({data}) => (this.discountapplycoupon = data));


       },



       Incheckoutcustomerandshippinginfo(){


         axios.get('/incheckout_customer_shipping_id').then((res) => {

            this.customerid = res.data.customerid,
            this.shippingid = res.data.shippingid




         })



       },















      applycoupon(){


// axios.post('/apply_coupon_code_form_action',{apply_coupon_code:this.apply_coupon_code})

axios.post('/apply_coupon_code_form_action',{apply_coupon_code:this.apply_coupon_code})

.then(response => {

//  console.log(response.data)

 this.apply_coupon_code = "";

if(response.data==0){



// Swal.fire({
//
//     icon: 'error',
//     title: 'Oops...',
//     text: 'Sorry This Coupon Is Not Correct !!',
//
//     })

    Toast.fire({
     icon: 'error',
     title: 'Sorry This Coupon Is Not Correct !!'

      })



  }else if(response.data==1){


    Toast.fire({
     icon: 'error',
     title: 'Sorry This Coupon Already Expire !!'

      })

    }else{


  Toast.fire({
   icon: 'success',
   title: 'Coupon Successfully Apply'

    })


    }

      })

    .catch(()=>{

   console.log('error');

    })


},




quantityupdate(cart_product){

axios.post('/quantity_update_form_action',{qty:cart_product.qty,rowId:
   cart_product.rowId,id:cart_product.id,size:cart_product.options.size})

.then((response)=>{


 if(response.data==0){

   Toast.fire({
   icon: 'error',
   title: 'Sorry Product Stocks Is Too Low'

    })



   }


else if(response.data==1){

 Toast.fire({
 icon: 'success',
 title: 'Product Quantity Update Successfully'

  })


}else{

  console.log(response.data)

  }

  })
  .catch(()=>{

    console.log('error');

  })



},


      showtotalsubtotaltax(){

      axios.get('/total_subtotal_tax').then((res) => {
        // console.log(res.data)
        this.total = res.data.total,
        this.subtotal = res.data.subtotal,
        this.tax = res.data.tax

       //
       // this.mystock = res.data.mystock

      })


   },





      displayaddtocrtproduct(){

      axios.get('/show_all_add_to_cart_product').then(({data}) => (this.showalladdtocartproduct = data));

       },






      ourimage(img){

              return "/images/"+img;

          },

          deleteproductaddtocart(rowId){


         axios.get('/delate_addto_cart_product/'+rowId)
        .then((response)=>{

          Toast.fire({
          icon: 'success',
          title: 'Product Delate Successfully From Cart'
           })

        //   this.displayaddtocrtproduct();
            this.displayaddtocrtproduct();


            })
         .catch(()=>{
         console.log('fail');

          })


        },



      //checkoutshippingidandcustomerid


    // checkoutshippingidandcustomerid(){
    //
    //
    //   axios.get('/checkout_customerid_and_shippingid').then((res) => {
    //     // console.log(res.data)
    //     this.shippingid = res.data.shippingid,
    //     this.customerid = res.data.customerid
    //
    //
    //
    //   })
    //
    //
    // }







},


computed:{


},




        mounted(){

               this.displayaddtocrtproduct();
               this.showtotalsubtotaltax();
               setInterval(() => this.showtotalsubtotaltax(),5000);

               this.discountmoneyafterapplycouponcode();
               setInterval(() => this.discountmoneyafterapplycouponcode(),5000);

               this.Incheckoutcustomerandshippinginfo();
                setInterval(() => this.Incheckoutcustomerandshippinginfo(),4000);




        }
    }
</script>
                                                                                                                                                                                                                              
