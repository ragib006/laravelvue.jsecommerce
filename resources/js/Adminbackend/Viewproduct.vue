<template>
    <div>


      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>

<div class="col-md-12" style="margin-top:25px;margin-bottom:300px;width:1200px;margin-left:310px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab" style="color:black;font-weight:bold;font-size:23px;margin-top:10px;">{{productinfo.product_name}}</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body" style="margin-bottom:100px;">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block" style="margin-bottom:70px;">
     <div class="ima" style="width:500px;float:left;height:400px;">
   <img :src="mypostimage(productinfo.product_image)" alt="" style="height:400px;width:400px;">
 </div>

 <!--<img :src="'/images/'+stuent.product_image"/> -->
   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:50px;">
    <span style="font-size:18px;">Product Name : </span> <span style="font-size:18px;color:green;">{{productinfo.product_name}}</span>
   </span>


   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Id  : </span> <span style="font-size:18px;color:green;">{{productinfo.product_id}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Category Name: </span> <span style="font-size:18px;color:green;">{{productinfo.category_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Price : </span> <span style="font-size:18px;color:green;">{{productinfo.product_price}} TK</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Url : </span> <span style="font-size:18px;color:green;">{{productinfo.product_url}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Code : </span> <span style="font-size:18px;color:green;">{{productinfo.product_code}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Added Date: </span> <span style="font-size:18px;color:green;">{{productinfo.product_added_date}}</span>
   </span>








 </div>
 <!-- /.user-block -->


 <h3 style="font-weight:bold;color:black;margin-bottom:20px;">Product Description</h3>
 <p style="text-align:justify;color:black;font-family:tahoma;padding:">
{{productinfo.product_description }}
 </p>

</div>

</div>

</div>

</div>

</div>
<!-- /.card -->
</div>

 <!-- <Mybackendfooter></Mybackendfooter> -->

  </div>
</template>



<script>
import _ from 'lodash'

import Mybackendheader from "./Adminheader.vue"
import MyBackendsidebar from "./Adminsidebar.vue"

    export default {


      data () {
        return {



        productinfo:{},
        //mycourse:{},

          // Create a new form instance
          form: new Form({

                // hall_id:'',
                // hall_name: '',
             	  // hall_type: '',
             	  // hall_added_date: '',
                // hall_status:'',
                //cat_status: '',


          })
        }
      },

      components: {

        MyBackendsidebar,
        Mybackendheader,


       },


    methods:{



      Viewmyproduct(){

     axios.get('/view_my_product/'+this.$route.params.product_id).then((res) => {

    //   console.log(res.data)
     this.productinfo = res.data.productinfo
     // this.hallname = res.data.hallname



     })

   },

   mypostimage(img){

       return "/images/"+img;

   },







},





        mounted() {

          this.Viewmyproduct();

          // this.Viewmystudentcourse();
          //this.Viewmystudentinformation();




        }
    }
</script>
