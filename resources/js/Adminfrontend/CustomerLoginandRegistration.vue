<template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:340px;padding-top:56px;display:block;font-size:25px;">Customar Login And Registration</h2>

</div>

</div>



<div class="container">
    <div class="row">

      <div class="col-md-6">

    <center><h3 style="font-weight:bold;font-family:tahoma;margin-left:-80px;"> Login</h3></center>

<form style="margin-top:30px;" @submit.prevent ="customerlogin()">

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:18px; font-family:tahoma;">Email Address</label>
<input type="email" class="form-control" name="my_customer_email" v-model="my_customer_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" required style="width:470px;" >
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label" style="font-weight:bold;font-size:18px; font-family:tahoma;">Password</label>
<input type="password" name="my_customer_password" v-model="my_customer_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required style="width:470px;">
</div>

<button type="submit" class="btn btn-success">Login</button>

</form>





 </div>



 <div class="col-md-6">

 <center><h3 style="font-weight:bold;font-family:tahoma;">Create Account</h3></center>

<form style="margin-top:30px;margin-left:40px;" @submit.prevent ="customerregister()">

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer Name</label>
<input type="text" name="customer_name" v-model="customer_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer Name" required style="width:470px;" >
</div>


<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer Email</label>
<input type="email" name="customer_email" v-model="customer_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer Email" required style="width:470px;">
</div>



<div class="form-group">
<label for="exampleFormControlSelect1" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer District</label>
  <select  class="form-control" id="exampleFormControlSelect1" name="customer_districk" v-model="customer_districk" style="" required style="width:470px;">
      <option value="" disabled>Select</option>
      <option value="Mymensing" style="color:green;font-weight:bold;">Mymensing</option>
      <option value="Jamalpur">Jamalpur</option>
      <option value="Netrokona">Netrokona</option>
      <option value="Sherpur">Sherpur</option>


      <option value="Rajshahi" style="color:green;font-weight:bold;">Rajshahi</option>
      <option value="Jaipurhat">Jaipurhat</option>
      <option value="Bogura">Bogura</option>
      <option value="Naogaon">Naogaon</option>
      <option value="Natore">Natore</option>
      <option value="Nawabganj">Nawabganj</option>
      <option value="Pabna">Pabna</option>
      <option value="Sirajganj">Sirajganj</option>


      <option value="Rangpur" style="color:green;font-weight:bold;">Rangpur</option>
      <option value="Gaibandha">Gaibandha</option>
      <option value="Kurigram">Kurigram</option>
      <option value="Lalmonirhat">Lalmonirhat</option>
      <option value="Dinajpur">Dinajpur</option>
      <option value="Panchagarh">Panchagarh</option>
      <option value="Nilphamari">Nilphamari</option>
      <option value="Thakurgaon">Thakurgaon</option>


      <option value="Sylhet" style="color:green;font-weight:bold;">Sylhet</option>
      <option value="Habiganj">Habiganj</option>
      <option value="Moulvibazar">Moulvibazar</option>
      <option value="Sunamganj">Sunamganj</option>


      <option value="Barishal" style="color:green;font-weight:bold;">Barishal</option>
      <option value="Barguna">Barguna</option>
      <option value="Bhola">Bhola</option>
      <option value="Jhalokati">Jhalokati</option>
      <option value="Patuakhali">Patuakhali</option>
      <option value="Pirojpur">Pirojpur</option>

      <option value="Chattogram" style="color:green;font-weight:bold;">Chattogram</option>
      <option value="Bandarban">Bandarban</option>
      <option value="Brahmanbaria">Brahmanbaria</option>
      <option value="Chandpur">Chandpur</option>
      <option value="Cox's Bazar">Cox's Bazar</option>
      <option value="Cumilla">Cumilla</option>
      <option value="Feni">Feni</option>
      <option value="Khagrachhari">Khagrachhari</option>
      <option value="Lakshmipur">Lakshmipur</option>
      <option value="Noakhali">Noakhali</option>
      <option value="Rangamati">Rangamati</option>


      <option value="Dhaka" style="color:green;font-weight:bold;">Dhaka</option>
      <option value="Faridpur">Faridpur</option>
      <option value="Gazipur">Gazipur</option>
      <option value="Gopalganj">Gopalganj</option>
      <option value="Kishoreganj">Kishoreganj</option>
      <option value="Madaripur">Madaripur</option>
      <option value="Manikganj">Manikganj</option>
      <option value="Munshiganj">Munshiganj</option>
      <option value="Narayanganj">Narayanganj</option>
      <option value="Narsingdi">Narsingdi</option>
      <option value="Rajbari">Rajbari</option>
      <option value="Shariatpur">Shariatpur</option>
      <option value="Tangail">Tangail</option>


      <option value="Khulna" style="color:green;font-weight:bold;">Khulna</option>
      <option value="Bagerhat">Bagerhat</option>
      <option value="Chuadanga">Chuadanga</option>
      <option value="Jashore">Jashore</option>
      <option value="Jhenaidah">Jhenaidah</option>
      <option value="Kushtia">Kushtia</option>
      <option value="Magura">Magura</option>
      <option value="Meherpur">Meherpur</option>
      <option value="Narail">Narail</option>
      <option value="Satkhira">Satkhira</option>



  </select>

</div>

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer Address</label>
<input type="text" name="customer_address" v-model="customer_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer Address" required style="width:470px;">
</div>

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer Mobile Number</label>
<input type="text" name="customer_mobile_number" v-model="customer_mobile_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Customer Mobile Number" required style="width:470px;">
</div>

<div class="mb-3">
<label for="exampleInputPassword1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer Password</label>
<input type="password" name="customer_password" v-model="customer_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required style="width:470px;">
</div>


<button type="submit" class="btn btn-success">Submit</button>

</form>


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



        customer_name:'',
        customer_email:'',
        customer_districk:'',
        customer_address:'',
        customer_mobile_number:'',
        customer_password:'',
        my_customer_email:'',
        my_customer_password:'',
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


  customerlogin(){



        axios.post('/customer_login_form_action',{my_customer_email:this.my_customer_email,my_customer_password:this.my_customer_password})

 .then((response) => {

    //  console.log(response.data)





        this.my_customer_email = "";
        this.my_customer_password = "";

     if(response.data==1){

     this.$router.push('/shipping_information')
     Toast.fire({
     icon: 'success',
     title: 'Customer Login Successfully'

      })

    }else{

     Swal.fire({

      icon: 'error',
      title: 'Oops...',
      text: 'Customer Email Or Password Not Valid !!',

      })






     }




        })

      .catch(()=>{

     console.log('error');

      })





  },







  customerregister(){


    axios.post('/customer_register_form_action',{customer_name:this.customer_name,customer_email:this.customer_email,customer_districk:this.customer_districk,customer_address:this.customer_address,customer_mobile_number:this.customer_mobile_number,customer_password:this.customer_password})

    .then((response)=>{



      this.$router.push('/shipping_information')

         Toast.fire({
         icon: 'success',
         title: 'Account Create Successfully '

          })





      })

          .catch(()=>{

         console.log('error');

          })


      },




  // displayaddtocrtproduct(){
  //
  // axios.get('/show_all_add_to_cart_product').then(({data}) => (this.showalladdtocartproduct = data));
  //
  //  },
  //
  //




  ourimage(img){

          return "/images/"+img;

      },







},


computed:{


},




    mounted(){

           // this.displayaddtocrtproduct();
           // this.showtotalsubtotaltax();
           // setInterval(() => this.showtotalsubtotaltax(),4000);
           //
           // this.discountmoneyafterapplycouponcode();
           // setInterval(() => this.discountmoneyafterapplycouponcode(),4000);




    }
}
</script>
