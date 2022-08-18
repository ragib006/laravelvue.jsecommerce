<template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:490px;padding-top:56px;display:block;font-size:27px;">Invoice</h2>

</div>

</div>


<div class="container">

       <div class="invoice p-3 mb-3">
  <!-- title row -->

  <div class="allaol" style="">
  <div class="row">
    <div class="col-12" style="margin-bottom:30px;">
      <h4>
        <i class="fas fa-file-invoice"></i><span style="margin-left:10px;">Invoice</span>
        <small class="float-right">Date: {{today}}</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info" style="margin-bottom:60px;">

    <div class="col-sm-7 invoice-col" style="font-family:tahoma;margin-bottom:40px;">
      <p style="font-weight:bold;font-size:22px;">Customer Information</p>
      <span style="color:black;font-weight:bold;margin-left:10px;">Customer Id :</span><span style="margin-left:10px;">{{customerinformation.customer_id}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Customer Name :</span><span style="margin-left:10px;">{{customerinformation.customer_name}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Customer Email :</span><span style="margin-left:10px;">{{customerinformation.customer_email}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;"> Customer District :</span><span style="margin-left:10px;">{{customerinformation.customer_districk}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;"> Customer Address :</span><span style="margin-left:10px;">{{customerinformation.customer_address}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;"> Customer Mobile :</span><span style="margin-left:10px;">{{customerinformation.customer_mobile_number}}</span></br>
    </div>
    <!-- /.col -->
    <div class="col-sm-5 invoice-col" style="font-family:tahoma;margin-bottom:40px;">
      <p style="font-weight:bold;font-size:22px;">Shipping Information</p>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Id :</span><span style="margin-left:10px;">{{shippinginformation.shipping_id}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Name :</span><span style="margin-left:10px;">{{shippinginformation.shipping_name}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Email :</span><span style="margin-left:10px;">{{shippinginformation.shipping_email}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping District :</span><span style="margin-left:10px;">{{shippinginformation.shipping_districk}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Address :</span><span style="margin-left:10px;">{{shippinginformation.shipping_address}}</span></br>
      <span style="color:black;font-weight:bold;margin-left:10px;">Shipping Mobile :</span><span style="margin-left:10px;">{{shippinginformation.shipping_mobile_number}}</span></br>
    </div>

  </div>
</div>
  <!-- /.row -->

  <!-- Table row -->

<div class="table-responsive" style="margin-bottom:50px;">

    <table class="table responsive" style="font-family:tahoma;margin-bottom:40px;">
    <thead>
      <tr>

        <!-- <th scope="col" style="text-align:center;">Sl</th> -->
        <th scope="col" style="text-align:center;">Product Id</th>
        <th scope="col" style="text-align:center;">Image</th>
        <th scope="col" style="text-align:center;">Product</th>
        <th scope="col" style="text-align:center;">Price</th>
        <th scope="col" style="text-align:center;">Color</th>

        <th scope="col" style="text-align:center;">Quantity</th>
        <th scope="col" style="text-align:center;">Size</th>
        <th scope="col" style="text-align:center;">Total</th>
          <!-- <th scope="col" style="text-align:center;">Total</th> -->


      </tr>
    </thead>
    <tbody>

         <tr v-for="cart_product in showalladdtocartproduct">


        <td><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;text-align:center;">{{cart_product.id}}</p></td>
        <td style="text-align:center;"><img :src="ourimage(cart_product.options.image)" alt="" style="height:70px;width:70px;"></td>

        <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.name}}</p></td>

        <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.price}} TK</p></td>

         <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.options.color}}</p></td>

         <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.qty}}</p></td>
         <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.options.size}}</p></td>



         <td style="text-align:center;"><p style="margin-top:20px;color:black;font-size:16px;;font-family:tahoma;">{{cart_product.price * cart_product.qty }} TK</p></td>

       <!--   <td><a style="margin-top:20px;display:block;" @click.prevent = "deleteproductaddtocart(cart_product.rowId)">X</a></td>-->









       </tr>





    </tbody>
  </table>
</div>



  <!-- /.row -->

  <div class="row">

    <div class="col-6">

      <img src="images/bkash.png" style="width:50px;float:left;margin-right:15px;margin-top:2px;"><P style="display:block;font-weight:bold;font-size:18px;font-family:tahoma">Bkash Number :<span style="color:blue"> 01755963880</span></P>

      <p class="lead" style="margin-top:50px;font-weight:bold;color:green;">Payment Methods</p>

    <form enctype="multipart/form-data" role="form" @submit.prevent = "giveorder()" style="margin-top:-20px;">
<div class="form-group">
   <label for="exampleFormControlSelect1"></label>
      <select class="form-control" id="exampleFormControlSelect1"  name="payment_method" v-model="payment_method" style="width:120px;"required>
        <option value="" disabled>Select</option>
        <option value="Handcash">Hand cash</option>
        <option value="Bkash">Bkash</option>

      </select>

      <span v-if="payment_method === 'Bkash'">

           <span style="font-weight:bold;padding-top:20px;display:block;margin-bottom:10px;">Enter TrxID</span>
           <input type="text" class="form-control" placeholder="Enter TrxID" style="width:250px;" name="trx_id" v-model="trx_id">

      </span>




</div>
<button style="margin-top:150px;"type="submit" class="btn btn-success">Place Order
</button>
  </form>

    </div>



    <!-- /.col -->
    <div class="col-6">
      <p class="lead"></p>

      <div class="table-responsive" style="font-family:tahoma">
        <table class="table">
          <tr>
            <th style="width:50%;">Subtotal</th>
            <td style="">{{subtotal}} TK</td>
          </tr>
          <tr>
            <th>Discount</th>
            <td v-if="discountapplycoupon">{{discountapplycoupon}} TK</td>
            <td v-else="!discountapplycoupon">0.0 TK</td>
          </tr>

          <tr>
            <th>Tax</th>
            <td>{{tax}} TK</td>
          </tr>
          <tr>
            <th>Total</th>
            <td v-if="discountapplycoupon">{{total - discountapplycoupon}} TK</td>
            <td v-else="!discountapplycoupon">{{total}} TK</td>
          </tr>


        </table>


        <button onclick="window.print()" type="button" class="btn btn-primary float-right" style="margin-right: 5px;margin-top:107px;">
          Generate PDF
        </button>





      </div>
    </div>
    <!-- /.col -->
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
total:{},
subtotal:{},
tax:{},
discountapplycoupon:{},

today:{},
customerinformation:{},
shippinginformation:{},
payment_method:'',
trx_id:'',

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


  giveorder(){

     axios.post('/give_order_in_invoice_page',{payment_method:this.payment_method,trx_id:this.trx_id})

       .then((response)=>{

this.trx_id = "";


         if(response.data==1){

          this.$router.push('/')

              Toast.fire({
              icon: 'success',
              title: 'Thank You For Your Order'
               })




         }else{


            console.log('something is wrong')


         }
        //  else if(response.data==2){
        //
        // this.$router.push('/bkash')
        //
        // }
        // else if(response.data==3){
        //
        // this.$router.push('/rocket')
        //
        //  }
        //  else if(response.data==4){
        //
        //    this.$router.push('/nogot')
        //
        //   }
        // else if(response.data==5){
        //
        //     this.$router.push('/paypal')
        //
        //    }
        //
        //
        //
        //  else{
        //
        //     console.log('you cannot select any payment method');
        //
        // }
        //  console.log('paymentsuccessfull');



      })

        .catch(()=>{

         console.log('fail');

        })

    },

invoiceinformation(){


  axios.get('/show_all_invoice_information').then((res) => {
    // console.log(res.data)

    // Fire.$emit('Myinvoicelode');

    this.total = res.data.total,
    this.subtotal = res.data.subtotal,
    this.tax = res.data.tax,
    this.discountapplycoupon = res.data.discountapplycoupon,
    this.showalladdtocartproduct = res.data.showalladdtocartproduct,
    this.today = res.data.today,
    this.customerinformation = res.data.customerinformation,
    this.shippinginformation = res.data.shippinginformation


  })



},

     //
     //    showtotalsubtotaltax(){
     //
     //    axios.get('/total_subtotal_tax').then((res) => {
     //      // console.log(res.data)
     //      this.total = res.data.total,
     //      this.subtotal = res.data.subtotal,
     //      this.tax = res.data.tax
     //
     //
     //    })
     //
     //
     // },


  //
  // displayaddtocrtproduct(){
  //
  // axios.get('/show_all_add_to_cart_product').then(({data}) => (this.showalladdtocartproduct = data));
  //
  //  },
  //
  //
  //  discountmoneyafterapplycouponcode(){
  //
  //     axios.get('/discount_money_after_applycoupon').then(({data}) => (this.discountapplycoupon = data));
  //
  //
  //   },







  ourimage(img){

          return "/images/"+img;

      },







},


computed:{


},




    mounted(){






            this.invoiceinformation();

            // Fire.$on('Myinvoicelode',()=>{
            //
            //    this.invoiceinformation();
            //
            //
            // });


           setInterval(() => this.invoiceinformation(),5000);





            // this.displayaddtocrtproduct();
            // setInterval(() => this.displayaddtocrtproduct(),4000);
            //
            // this.discountmoneyafterapplycouponcode();
            // setInterval(() => this.discountmoneyafterapplycouponcode(),4000);



      //this.displayaddtocrtproduct();
      //this.showtotalsubtotaltax();

           // this.displayaddtocrtproduct();
           // this.showtotalsubtotaltax();
           // setInterval(() => this.showtotalsubtotaltax(),4000);
           //
           // this.discountmoneyafterapplycouponcode();
           // setInterval(() => this.discountmoneyafterapplycouponcode(),4000);




    }
}
</script>
