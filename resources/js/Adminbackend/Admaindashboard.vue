<template>
<span>


    <Mybackendheader></Mybackendheader>

    <MyBackendsidebar></MyBackendsidebar>

  <div class="dashboard" style="margin-top:20px;margin-bottom:425px;">


    <div class="row">
      <div class="col-md-12">

    <div class="card" style="width: 17rem;float:left;margin-left:20px;">
    <div class="card-body">
      <h5 class="card-title" style="font-size:20px;font-weight:bold">Total Product</h5>

      <p class="card-text" style="font-size:30px">{{products}}</p>
    
    </div>
  </div>


  <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Total Category</h5>

          <p class="card-text" style="font-size:30px">{{category}}</p>
    
  </div>
  </div>


  <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
   <h5 class="card-title" style="font-size:20px;font-weight:bold">Pending Order</h5>

      <p class="card-text" style="font-size:30px">{{pendingorder}}</p>
    
  </div>
  </div>


  <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Success Order</h5>

          <p class="card-text" style="font-size:30px">{{successorder}}</p>
  
  </div>
  </div>







    <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Total Sell Quantity</h5>

          <p class="card-text" style="font-size:30px">{{totalsellproductquantity}}</p>
  
  </div>
  </div>


    <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Total Sell</h5>

          <p class="card-text" style="font-size:30px">{{totalsellproductmoney}} TK</p>
  
  </div>
  </div>



    <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Total Sell Today</h5>

          <p class="card-text" style="font-size:30px">{{totalselltodaymoney}} TK</p>
  
  </div>
  </div>



    <div class="card" style="width: 17rem;float:left;margin-left:20px;">
  <div class="card-body">
     <h5 class="card-title" style="font-size:20px;font-weight:bold">Now Stocks Product</h5>

          <p class="card-text" style="font-size:30px">{{quantistocksproduct}}</p>
  
  </div>
  </div>





    </div>


    </div>


  </div>


 <!-- <Mybackendfooter></Mybackendfooter> -->



</span>
</template>




 <script>


  import Mybackendheader from "./Adminheader.vue"
  import MyBackendsidebar from "./Adminsidebar.vue"
  // import Mybackendfooter from "./Adminfooter.vue"

     export default {


       data () {
         return {

          category:{},
          products:{},
          pendingorder:{},
          successorder:{},


          totalsellproductquantity:{},
          totalsellproductmoney:{},
          totalselltodaymoney:{},
          quantistocksproduct:{},




           // Create a new form instance
           form: new Form({



           })
         }
       },




       components: {
          MyBackendsidebar,
          Mybackendheader,
          // Mybackendfooter,
        },



     methods:{



      showallinfo(){

//axios.get('/show_all_notice_frontend').then(({data}) => (this.allnotice = data));


   axios.get('/show_overall_description').then((res) => {


   // console.log(res.data)

       this.category = res.data.category,
       this.products = res.data.products,
       this.pendingorder = res.data.pendingorder,
       this.successorder = res.data.successorder,

        this.totalsellproductquantity = res.data.totalsellproductquantity,
        this.totalsellproductmoney = res.data.totalsellproductmoney,
        this.totalselltodaymoney = res.data.totalselltodaymoney,
        this.quantistocksproduct = res.data.quantistocksproduct
       //totalsellproductquantity


    })


},


 },


 computed:{


 },




         mounted() {

           this.showallinfo();

         }
     }
 </script>
