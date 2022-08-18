<template>
  <span>






    <div class="invoice p-3 mb-3">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h4>
        <i class="fas fa-globe"></i> AdminLTE, Inc.
        <!-- <small class="float-right">Date: {{orderpageshippinginformation.created_at | timeformat }}</small> -->
          <small class="float-right">Order-Date: {{cusandsipinformation.order_date}}</small>
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
      <strong style="display:block;margin-top:20px;font-size:18px;">Customer Information</strong><br>

      <span style="display:flex;margin-top:-7px;"><p style="color:black;font-weight:bold;">Shipping Id : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_id}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Name : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_name}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Email : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_email}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Phone : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_phn}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping City : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_city}}</p></span>
      <span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Address : </p>   <p style="margin-left:10px;">{{cusandsipinformation.customer_address}}</p></span>





    </div>
    <!-- /.col -->
<div class="col-sm-4 invoice-col">

<strong style="display:block;margin-top:20px;font-size:18px;">Shipping Information</strong><br>
<span style="display:flex;margin-top:-7px;"><p style="color:black;font-weight:bold;">Shipping Id : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_id}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Name : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_name}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Email : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_email}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Phone : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_phn}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping City : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_city}}</p></span>
<span style="display:flex; margin-top:-12px;"><p style="color:black;font-weight:bold;">Shipping Address : </p>   <p style="margin-left:10px;">{{cusandsipinformation.shipping_address}}</p></span>

    </div>
    <!-- /.col -->
    <div class="col-sm-4 invoice-col">


      <b>Order ID:</b>{{cusandsipinformation.id}}<br>
      

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
        <tr v-for="myorderdetails in orderproduct">


          <td>{{myorderdetails.id}}</td>
          <td>{{myorderdetails.product_name}}</td>
          <td>{{myorderdetails.product_quantity}}</td>
          <td>{{myorderdetails.product_price}} TK</td>
          <td>{{myorderdetails.product_price * myorderdetails.product_quantity}} TK</td>

        </tr>

        </tbody>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->

  <div class="row">
    <!-- accepted payments column -->
    <div class="col-6" v-if="cusandsipinformation.order_status ==='pending'">

  <button style="margin-top:200px;margin-left:20px;" @click.prevent = "takorder(cusandsipinformation.id)" class="btn btn-success"><i class="far fa-credit-card"></i>Approve Order
  </button>

      <!-- <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
        plugg
        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
      </p> -->
    </div>

    <div class="col-6" v-else="cusandsipinformation.order_status ==='success'">

  <!-- <button style="margin-top:200px;margin-left:20px;" @click.prevent = "takorder(cusandsipinformation.id)" class="btn btn-success"><i class="far fa-credit-card"></i>Approve Order
  </button> -->

     <div style="margin-top:150px;">
      <p style="font-size:20px;font-weight:bold;">
         This order already taken
       </p>
     </div>
    </div>


    <div class="col-6">
      <p class="lead">Money Document</p>

      <div class="table-responsive">
        <table class="table">
          <tr>
            <th style="width:50%">Subtotal:</th>
            <td>{{cusandsipinformation.sub_total}} TK</td>
          </tr>

          <tr v-if="cusandsipinformation.discount==null">
            <th>Discount:</th>
            <td>00.00 TK</td>
          </tr>

          <tr v-else="!cusandsipinformation.discount">
            <th>Discount:</th>
            <td>{{cusandsipinformation.total-cusandsipinformation.discount}} TK</td>
          </tr>



          <tr>
            <th>Tax:</th>
            <td>{{cusandsipinformation.vat}} TK</td>
          </tr>


          <!-- <tr>
            <th>Total:</th>
            <td>{{cusandsipinformation.total}} TK</td>
          </tr> -->

          <tr v-if="cusandsipinformation.discount==null">
            <th>Total:</th>
            <td>{{cusandsipinformation.total }} TK</td>
          </tr>

          <tr v-else="!cusandsipinformation.discount">
            <th>Total:</th>
            <td>{{cusandsipinformation.discount }} TK</td>
          </tr>

        </table>
      </div>
    </div>














    <button type="button" onclick="window.print()" target="_blank"  class="btn btn-primary float-left" style="margin-top:10px;margin-left:1000px;">
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

        //  orderdetails:[],
          //customer_and_shipping_information:{},
          cusandsipinformation:{},
           orderproduct:{},


        }
      },

      components: {
        Datepicker
      },


    methods:{


      vieworderdetails(){


          axios.get('/view_order_details/'  + this.$route.params.id).then((res) => {

          this.cusandsipinformation = res.data.cusandsipinformation
          this.orderproduct = res.data.orderproduct

        //  [res.cusacusandsipinformationndsipinformation.order_product]

          })


       },

       takorder(id){

         axios.get('/admin_take_order/'+id)


         .then((response)=>{

      // console.log(response.data);
               //   this.$store.dispatch("allCategory")
               //
               Toast.fire({
               icon: 'success',
               title: 'Admin Approve The Order Successfully'
                })

             this.$router.push('/allorder')

             })

        .catch(()=>{

       console.log('fail');

       })

       },


     //
     // vieworderdetails(){
     //
     //
     //     axios.get('/view_order_details/'  + this.$route.params.id).then(res => {
     //
     //     this.orderdetails = [res.cusandsipinformation.order_product]
     //
     //     })
     //
     //
     //  },



      },




//},







        mounted() {

       this.vieworderdetails();

        //   this.mysubtotal();
        //   this.mytax();
        //   this.mytotal();
        //   this.getcouponediscountamount();
        //
        //   setInterval(() => this.getcouponediscountamount(),3000);
        //
        //
        // this.customerinformationshowinorderdetailspahe();
        //
        // this.shippinginformationorderpage();
        // this.orderdetailsallcartproduct();
      //setInterval(() => this.vieworderdetails(),1000);


        }
    }
</script>
