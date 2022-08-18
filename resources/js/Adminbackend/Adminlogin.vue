<template>
    <div class="container">




    

<div class="shdlfsdh" style="width:45%;margin:30px auto;margin-top:100px">


<div class="card">

    <center><h3 style="font-weight:bold;padding-top:30px">Admin Login</h3></center>

<form style="margin-top:30px;padding:0px 20px 50px 20px" @submit.prevent ="customerlogin()">

<div class="mb-3">
<label for="exampleInputEmail1" class="form-label" style="font-weight:bold;font-size:18px; font-family:tahoma;">Email Address</label>
<input type="email" class="form-control" name="admin_email" v-model="admin_email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email Address" required style="" >
</div>
<div class="mb-3">
<label for="exampleInputPassword1" class="form-label" style="font-weight:bold;font-size:18px; font-family:tahoma;">Password</label>
<input type="password" name="admin_password" v-model="admin_password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required style="">
</div>

<button type="submit" class="btn btn-success">Login</button>

</form>


</div>

</div>



    </div>
</template>



<script>



export default {


  data () {
    return {



    
        admin_email:'',
        admin_password:'',
    
      // Create a new form instance
      form: new Form({



      })
    }
  },







methods:{


  customerlogin(){



        axios.post('/admin_login_form_action',{admin_email:this.admin_email,admin_password:this.admin_password})

 .then((response) => {

  console.log(response.data)





       this.admin_email = "";
      this.admin_password = "";

      if(response.data==11){

      this.$router.push('/admin_dashboard')
      Toast.fire({
      icon: 'success',
      title: 'Login Successfully'

      })

     }else{

      Swal.fire({

       icon: 'error',
       title: 'Oops...',
       text: 'Invalid Email And Password !!',

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
