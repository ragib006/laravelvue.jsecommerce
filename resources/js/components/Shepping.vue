<template>
    <div class="container">
        <!-- <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Example Component</div>

                    <div class="card-body">
                        I'm an example component.
                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
           <div class="col-sm-6">


                       <h3 style="padding-bottom:30px;padding-top:20px;font-weight:bold;">Shipping Information</h3>


                         <form enctype="multipart/form-data" role="form" @submit.prevent = "registershippinginformation()" style="padding-bottom:50px;">


                       <div class="form-group">
                         <label for="exampleInputEmail1">Name</label>
                         <input type="text" name="shipping_name" v-model="shipping_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name" required>
                       </div>

                       <div class="form-group">
                          <label for="exampleInputEmail1">Email</label>
                          <input type="email" name="shipping_email" v-model="shipping_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required>
                       </div>

                       <div class="form-group">
                         <label for="exampleInputEmail1">Phone Number</label>
                         <input type="text" name="shipping_phn" v-model="shipping_phn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Phone Name" required>
                        </div>

                        <!-- <div class="form-group">
                         <label for="exampleInputEmail1">Division</label>
                         <input type="text" name="shipping_division" v-model="shipping_division" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Division" required>
                       </div> -->



<!--
                       <div class="form-group">
                          <label for="exampleFormControlSelect1">Added By</label>
                            <select  v-model="shipping_division" class="form-control" id="exampleFormControlSelect1" name="shipping_division" style="width:500px;" required>

                              <option value="">Select</option>
                                <option value="Dhaka">Dhaka</option>
                                <option value="Chittagong">Chittagong</option>
                                <option value="Rajshahi">Rajshahi</option>
                                <option value="Sylhet">Sylhet</option>
                                <option value="Khulna">Khulna</option>
                                <option value="Rangpur">Rangpur</option>
                                <option value="Borisal">Borisal</option>
                                <option value="Mymensingh">Mymensingh</option>


                            </select>

                       </div> -->


                       <div class="form-group">
                    <label>Select Division</label>
                    <select class="form-control" v-model="shipping_division" name="shipping_division">
                      <option>Select</option>
                      <option value="Dhaka">Dhaka</option>
                      <option value="Chittagong">Chittagong</option>
                      <option value="Rajshahi">Rajshahi</option>
                      <option value="Sylhet">Sylhet</option>
                      <option value="Khulna">Khulna</option>
                      <option value="Rangpur">Rangpur</option>
                      <option value="Borisal">Borisal</option>
                      <option value="Mymensingh">Mymensingh</option>
                    </select>
                  </div>


                        <div class="form-group">
                         <label for="exampleInputEmail1">City</label>
                         <input type="text" name="shipping_city" v-model="shipping_city" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter City" required>
                       </div>

                       <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" name="shipping_address" v-model="shipping_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Address" required>
                      </div>



                           <button type="submit" class="btn btn-primary">Submit</button>
                      </form>

           </div>

        </div>
    </div>
</template>


<script>


import Datepicker from 'vuejs-datepicker';

    export default {


      data () {
        return {

        //  showallcoupon:{},

        //ragibcustomerid:{},
        //getmyone:{},

        shipping_name: '',
        shipping_email: '',
        shipping_phn: '',
        shipping_city: '',
        shipping_address: '',
        shipping_division:'',

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




     //add category
        registershippinginformation(){

             axios.post('/submit_shipping_formaction',{shipping_name:this.shipping_name,
                                                       shipping_email:this.shipping_email,
                                                       shipping_phn:this.shipping_phn,
                                                       shipping_city:this.shipping_city,
                                                       shipping_address:this.shipping_address,
                                                       shipping_division:this.shipping_division

                                                       })

             .then((response)=>{

              this.$router.push('/order')


            console.log('customer register successfully');
            })

              .catch(()=>{
            //  this.$router.push('/login_and_register')

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
