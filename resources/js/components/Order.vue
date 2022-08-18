<template>
  <span>






    <div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> AdminLTE, Inc.
        <small class="float-right">Date: {{orderpageshippinginformation.created_at | timeformat }}</small>
      </h4>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-4 invoice-col">
       <!-- From
      <address>
        <strong>Customer Information</strong><br>
        <span style="display:flex;margin-top:10px;"><p style="color:black;font-weight:bold;">Customer Id : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_id}}</p></span>
        <span style="display:flex;"><p style="color:black;font-weight:bold;">Customer Name : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_name}}</p></span>

      </address> -->
      <strong>Customer Information</strong><br>
      <span style="display:flex;margin-top:20px;"><p style="color:black;font-weight:bold;">Customer Id : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_id}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Customer Name : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_name}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Customer Email : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_email}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Customer Phone : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_phn}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Customer City : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_city}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Customer Address : </p>   <p style="margin-left:10px;">{{customerinformationisorderpage.customer_address}}</p></span>



    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
<!-- shippinginformationisorderpage -->
<strong>Shipping Information</strong><br>
<span style="display:flex;margin-top:20px;"><p style="color:black;font-weight:bold;">Shipping Id : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_id}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Name : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_name}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Email : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_email}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Phone : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_phn}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping City : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_city}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Address : </p>   <p style="margin-left:10px;">{{orderpageshippinginformation.shipping_address}}</p></span>


    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">
      <b>Invoice #007612</b><br>
      <br>
      <b>Order ID:</b> 4F3S8J<br>
      <b>Payment Due:</b> 2/22/2014<br>
      <b>Account:</b> 968-34567
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-responsive">
      <table class="table table-striped">
        <thead>
        <tr>
          <th>Product Id</th>
          <th>Product Name</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="orderprocuct in ordercartproduct">
          <td>{{orderprocuct.id}}</td>
          <td>{{orderprocuct.name}}</td>
          <td>{{orderprocuct.qty}}</td>
          <td>{{orderprocuct.price}} TK</td>
          <td>{{orderprocuct.price *orderprocuct.qty}} TK</td>
        </tr>



        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6">
      <p class="lead">Payment Methods:</p>
      <!-- <img src="{{asset('backend')}}/dist/img/credit/visa.png" alt="Visa">
      <img src="{{asset('backend')}}/dist/img/credit/mastercard.png" alt="Mastercard">
      <img src="{{asset('backend')}}/dist/img/credit/american-express.png" alt="American Express">
      <img src="{{asset('backend')}}/dist/img/credit/paypal2.png" alt="Paypal"> -->
    <form enctype="multipart/form-data" role="form" @submit.prevent = "giveorder()">
<div class="form-group">
   <label for="exampleFormControlSelect1"></label>
      <select class="form-control" id="exampleFormControlSelect1"  name="payment_method" v-model="payment_method" style="width:250px;"required>
        <option value="">Select</option>
        <option value="Handcash">Hand cash</option>
        <option value="Bkash">Bkash</option>
        <option value="Rocket">Rocket</option>
        <option value="Nogot">Nogot</option>
        <option value="Paypal">Paypal</option>

      </select>
</div>
<button style="margin-top:150px;"type="submit" class="btn btn-success"><i class="far fa-credit-card"></i>Order
</button>
  </form>
  <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
    <i class="fas fa-download"></i> Generate PDF
  </button> -->


      <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
        plugg
        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
      </p> -->
    </div>
    <!-- /.col -->
    <!-- <div class="col-6">
      <p class="lead">Amount Due 2/22/2014</p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>$250.30</td>
          </tr>
          <tr>
            <th>Tax (9.3%)</th>
            <td>$10.34</td>
          </tr>
          <tr>
            <th>Shipping:</th>
            <td>$5.80</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>$265.24</td>
          </tr>
        </table>
      </div>
    </div> -->


    <div class="col-6" v-if="showdiscountamount">
      <p class="lead">Amount Due 2/22/2014</p>

      <div class="table-responsive" >
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>{{showsubtotal}} TK</td>
          </tr>
          <tr>
            <th>Discount:</th>
            <td>{{showtotal-showdiscountamount}} TK</td>
          </tr>
          <tr>
            <th>Tax:</th>
            <td>{{showtax}} TK</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>{{showdiscountamount}} TK</td>
          </tr>
        </table>
      </div>
    </div>




    <div class="col-6" v-if="!showdiscountamount">
      <p class="lead">Amount Due 2/22/2014</p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>{{showsubtotal}} TK</td>
          </tr>
          <tr>
            <th>Discount:</th>
            <td>00.00 TK</td>
          </tr>
          <tr>
            <th>Tax:</th>
            <td> {{showtax}} TK</td>
          </tr>
          <tr>
            <th>Total:</th>
            <td>{{showtotal}} TK</td>
          </tr>
        </table>
      </div>
    </div>














    <button type="button" onclick="window.print()" target="_blank" class="btn btn-primary float-left" style="margin-top:-30px;margin-left:1000px;">
      <i class="fas fa-download"></i> Generate PDF
    </button>


    <!-- /.col -->
  </div>
  <!-- /.row -->



   <!-- <div class="row no-print">
    <div class="col-8">
      <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

     <button type="submit" class="btn btn-success float-right"><i class="far fa-credit-card"></i>Order
      </button>




      <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
        <i class="fas fa-download"></i> Generate PDF
      </button>
    </div>
  </div>  -->



</div>


  </span>
</template>


<script>


import Datepicker from 'vuejs-datepicker';

    export default {


      data () {
        return {

        //  showallcoupon:{},

        customerinformationisorderpage:{},
        orderpageshippinginformation:{},
        ordercartproduct:{},

        showsubtotal:{},
        showtax:{},
        showtotal:{},
        showdiscountamount:{},

        payment_method:'',
        // sessionflashlogout:{},
        // myshippingid:{},



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




      giveorder(){

         axios.post('/give_order_in_order_page',{payment_method:this.payment_method })

           .then((response)=>{


             Toast.fire({
                  icon: 'success',
                  title: 'Thank You For Your Order'
                   })




             if(response.data==1){

            this.$router.push('/handkash')

             }
             else if(response.data==2){

            this.$router.push('/bkash')

            }
            else if(response.data==3){

            this.$router.push('/rocket')

             }
             else if(response.data==4){

               this.$router.push('/nogot')

              }
            else if(response.data==5){

                this.$router.push('/paypal')

               }



             else{

                console.log('you cannot select any payment method');

            }
             console.log('paymentsuccessfull');
          })

            .catch(()=>{

             console.log('fail');

            })

        },


      customerinformationshowinorderdetailspahe(){

     axios.get('/get_customer_information_in_order_page').then(({data}) => (this.customerinformationisorderpage = data));


      },

      shippinginformationorderpage(){

     axios.get('/get_shipping_informationorder_page').then(({data}) => (this.orderpageshippinginformation = data));


      },


      orderdetailsallcartproduct(){

     axios.get('/all_order_product').then(({data}) => (this.ordercartproduct = data));


      },


      mysubtotal(){

    axios.get('/subtotal').then(({data}) => (this.showsubtotal = data));
    // this.quantityupdate();


  },
  mytax(){

    axios.get('/tax').then(({data}) => (this.showtax = data));

  },

  mytotal(){
    axios.get('/total').then(({data}) => (this.showtotal = data));
  },
  getcouponediscountamount(){


   axios.get('/discount_amount').then(({data}) => (this.showdiscountamount = data));

  },






    // getshippingid(){
    //
    // axios.get('/get_shipping_id').then(({data}) => (this.myshippingid = data));
    //
    // },
    //







     //  mylogout(){
     //
     // axios.get('/click_and_logout').then(({data}) => (this.sessionflashlogout = data));
     //
     // Toast.fire({
     //      icon: 'success',
     //      title: 'Successfully logout'
     //       })
     //
     //   this.$router.push('/shope_product')

      // console.log('hi');


      },




//},







        mounted() {

          this.mysubtotal();
          this.mytax();
          this.mytotal();
          this.getcouponediscountamount();

          setInterval(() => this.getcouponediscountamount(),3000);


        this.customerinformationshowinorderdetailspahe();

        this.shippinginformationorderpage();
        this.orderdetailsallcartproduct();
        setInterval(() => this.orderdetailsallcartproduct(),1000);


        }
    }
</script>
