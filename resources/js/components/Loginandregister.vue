                    <template>
<span>
  <div class="container" style="margin-top:100px;">

     <div class="row" style="padding-bottom:100px;padding-top:40px;">


        <div class="col-md-6">

        <h3 style="padding-bottom:30px;padding-top:20px;font-weight:bold;">Login</h3>

          <form enctype="multipart/form-data" role="form" @submit.prevent = "logincustomer()">

            <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="customer_login_email" v-model="customer_login_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" required>

            </div>
            <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="product_login_password" v-model="product_login_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
       </form>

        </div>
        <div class="col-md-6">

          <h3 style="padding-bottom:30px;padding-top:20px;font-weight:bold;">Register</h3>


            <form enctype="multipart/form-data" role="form" @submit.prevent = "registercustomer()">


          <div class="form-group">
            <label for="exampleInputEmail1">Name</label>
            <input type="text" name="customer_name" v-model="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
          </div>

          <div class="form-group">
             <label for="exampleInputEmail1">Email</label>
             <input type="email" name="customer_email" v-model="customer_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Phone Number</label>
            <input type="text" name="customer_phn" v-model="customer_phn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Name" required>
           </div>

           <div class="form-group">
            <label for="exampleInputEmail1"> City</label>
            <input type="text" name="customer_city" v-model="customer_city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City" required>
          </div>

          <div class="form-group">
           <label for="exampleInputEmail1">Address</label>
           <input type="text" name="customer_address" v-model="customer_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address" required>
         </div>

          <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="product_password" v-model="product_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
          </div>

              <button type="submit" class="btn btn-primary">Submit</button>
         </form>



        </div>


     </div>


  </div>
</span>
</template>

<script>


import Datepicker from 'vuejs-datepicker';

    export default {


      data () {
        return {

        //  showallcoupon:{},

        ragibcustomerid:{},
        getmyone:{},

        customer_name: '',
        customer_email: '',
        customer_phn: '',
        customer_city: '',
        customer_address: '',
        product_password: '',
        customer_login_email: '',
        product_login_password: '',
      //  my:1,

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


    getloginone(){


   axios.get('/getone').then(({data}) => (this.getmyone = data));

    },

      logincustomer(){

       axios.post('/logincustomer_formaction',{customer_login_email:this.customer_login_email,product_login_password:this.product_login_password })
       .then((response)=>{

         if(response.data==1){


Toast.fire({
     icon: 'success',
     title: 'Successfully Login'
      })



        this.$router.push('/shepping')

         }else{

  this.customer_login_email = "";
  this.product_login_password = "";

          console.log('password error');

          Swal.fire({
  icon: 'error',
  title: 'Oops...',
  text: 'Email and password not valid!',

})


            }
//
//         // console.log('your email');
//
      })

        .catch(()=>{
      //this.$router.push('/login_and_register')

         console.log('fail');

        })


     },

















    //login

    // logincustomer(){
    //
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
    //
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
    //
    //  console.log('customer login successfully');
    //  })
    //
    //    .catch(()=>{
    //
    //
    //     console.log('fail');
    //
    //    })
    //
    //
    // },


     //add category
        registercustomer(){

             axios.post('/registercustomer_formaction',{customer_name:this.customer_name,customer_email:this.customer_email,customer_phn:this.customer_phn,customer_city:this.customer_city,customer_address:this.customer_address,product_password:this.product_password })

             .then((response)=>{

              this.$router.push('/shepping')
             // Toast.fire({
             // icon: 'success',
             // title: 'Product Added Successfully'
             //  })


            console.log('customer register successfully');
            })

              .catch(()=>{
              this.$router.push('/login_and_register')

               console.log('fail');

              })

          },




},



        mounted() {

      //  this.getloginone();
        // setInterval(() => this.getloginone(),1000);

        // this.customerid();
        // setInterval(() => this.customerid(),3000);

      //  this.get_all_coupon();

    //  this.$store.dispatch("allCategory")

        }
    }
</script>
