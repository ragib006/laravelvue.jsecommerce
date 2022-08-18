<template>
    <div>


<div class="col-md-9" style="margin-top:25px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab">Product Information</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body">
<div class="tab-content">
<div class="active tab-pane" id="activity">
<!-- Post -->
<div class="post">
 <div class="user-block">
     <div class="ima" style="width:330px;float:left;">
   <img :src="postimage(productinformation.product_image)" alt="" style="height:300px;width:300px;">
 </div>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Name : </span> <span style="font-size:18px;color:green;">{{productinformation.product_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
    <span style="font-size:18px;">Product Id : </span> <span style="font-size:18px;color:green;">{{productinformation.id}}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Product Url : </span> <span style="font-size:18px;color:green;">{{productinformation.product_url}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Category Name : </span> <span style="font-size:18px;color:green;">{{productinformation.category_name.cat_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Added Date : </span> <span style="font-size:18px;color:green;">{{productinformation.created_at | timeformat }}</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;">
         <span style="font-size:18px;">Product Added : </span> <span style="font-size:18px;color:green;">{{productinformation.product_addedby}}</span>
   </span>

 </div>
 <!-- /.user-block -->
 <p style="text-align:justify">
{{productinformation.product_description}}
 </p>

</div>

</div>

</div>

</div>

</div>
<!-- /.card -->
</div>



  </div>
</template>

<script>

export default {


  data () {
    return {
      productinformation: {},

    }
  },


methods:{


  Viewproductdetails(){

      axios.get('/view_product_details/'  + this.$route.params.id).then(({data}) => (this.productinformation = data));

  },

  postimage(img){

      return "images/"+img;

  },

},

    mounted() {

        this.Viewproductdetails()

    }
}


</script>
