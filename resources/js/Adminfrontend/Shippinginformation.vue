<template>
<span>



<Mywebiteheader></Mywebiteheader>




<div class="container" style="margin-bottom:50px;background:#333333;margin-top:20px;margin-bottom:80px;">

<div class="bb" style="height:150px;width:100%;background:">

<h2 style="color:white;font-family:tahoma;font-weight:bold;margin-left:390px;padding-top:56px;display:block;font-size:27px;">Shipping Information</h2>

</div>

</div>



<div class="container">

     <div class="myshipping" style="margin-top:60px;margin-bottom:100px;">

        <div class="row">

            <div class="col-md-12">


                    <center><h3 style="font-weight:bold;font-family:tahoma;margin-bottom:50px;color:green;">Shipping Information</h3></center>



     <form style="margin-top:30px;width:50%;margin:10px auto;" @submit.prevent ="shippinginformation()">

      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Shipping Name</label>
        <input type="text" name="shipping_name" v-model="shipping_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Shipping Name" required>
     </div>


      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Shipping Email</label>
        <input type="email" name="shipping_email" v-model="shipping_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Shipping Email" required>
     </div>



     <div class="form-group">
     <label for="exampleFormControlSelect1" style="font-weight:bold;font-size:17px; font-family:tahoma;">Customer District</label>
       <select  class="form-control" id="exampleFormControlSelect1" name="shipping_districk" v-model="shipping_districk" style="" required >
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
        <label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Shipping Address</label>
        <input type="text" name="shipping_address" v-model="shipping_address" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Shipping Address" required>
     </div>

        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:17px; font-family:tahoma;">Shipping Mobile Number</label>
        <input type="text" name="shipping_mobile_number" v-model="shipping_mobile_number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Shipping Mobile Number" required>
     </div>


     <button type="submit" class="btn btn-success">Submit</button>

    </form>




             </div>


               <div class="col-md-3">


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



      shipping_name:'',
      shipping_email:'',
      // shipping_districk:'',
      shipping_address:'',
      shipping_districk:'',
      shipping_mobile_number:'',
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



    shippinginformation(){


      axios.post('/shipping_information_form_action',{
        shipping_name:this.shipping_name,
        shipping_email:this.shipping_email,
        shipping_districk:this.shipping_districk,
        shipping_address:this.shipping_address,
        shipping_mobile_number:this.shipping_mobile_number
       })

       .then((response) => {


        //  console.log(response.data)

          this.$router.push('/create_invoice')

              Toast.fire({
              icon: 'success',
              title: 'Shipping Address Taken Successfully '

              })




              })

            .catch(()=>{

           console.log('error');

            })


        },









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
