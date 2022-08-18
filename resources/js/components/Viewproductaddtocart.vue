<template>
    <div>


<div class="col-md-12" style="margin-top:25px;">
<div class="card">
<div class="card-header p-2">
<ul class="nav nav-pills">
<li class="nav-item"><p data-toggle="tab">Product Information</p></li>

</ul>
</div><!-- /.card-header -->



<div class="card-body" style="height:600px;">
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

   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Product Url : </span> <span style="font-size:18px;color:green;">{{productinformation.product_url}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Category Name : </span> <span style="font-size:18px;color:green;">{{productinformation.category_name.cat_name}}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Added Date : </span> <span style="font-size:18px;color:green;">{{productinformation.created_at | timeformat }}</span>
   </span>
   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Product Price : </span> <span style="font-size:18px;color:green;">{{productinformation.product_price }} TK</span>
   </span>

   <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Product Added : </span> <span style="font-size:18px;color:green;">{{productinformation.product_addedby}}</span>
   </span>
   <!-- <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
         <span style="font-size:18px;">Quantity : </span><input style="width:60px;" type="number" class="input-number" v-model="qty" name="product_qty"/></span>
   </span> -->

   <span class="username" style="margin-left:330px;margin-bottom:3px;margin-top:20px;">
     <button type="button" class="btn btn-success" @click.prevent="AddTocart(productinformation)" style="">

         Add To Cart
       </button>
   </span>

 <!-- <form enctype="multipart/form-data" role="form" @submit.prevent ="addtocart()"> -->
<!--
<form enctype="multipart/form-data" role="form" @submit.prevent = "addtocartproduct()"> -->

   <!-- <div class="form-group">
     <label>Product Url</label>
     <input v-model="form.qty" type="number" name="qty" style="width:60px;"
       class="form-control" :class="{ 'is-invalid': form.errors.has('qty') }" placeholder="Enter Product Url" required>
     <has-error :form="form" field="qty"></has-error>
   </div> -->

   <!-- <input v-model="form.productinformation" type="hidden" name="product_id" style="width:60px;"
     class="form-control" :class="{ 'is-invalid': form.errors.has('product_id') }" placeholder="Enter Product Url" required>
   <has-error :form="form" field="product_id"></has-error> -->

<!-- <span class="username" style="margin-left:50px;margin-bottom:3px;margin-top:10px;">
<span style="font-size:18px;">Quantity : </span><input style="width:60px;" name="product" type="number" class="input-number" :value="1"/></span>
</span> -->

<!-- <div class="form-group">
  <label>Product Url</label>
  <input v-model="form.product_url" type="text" name="product_url"
    class="form-control" :class="{ 'is-invalid': form.errors.has('product_url') }" placeholder="Enter Product Url" required>
  <has-error :form="form" field="product_url"></has-error>
</div> -->

<!-- <input type="hidden" name="product_id" :value="productinformation.id"> -->

<input type="number" name="pro_qty" value="2">

<!--
<button type="submit" class="btn btn-primary">Add to Cart</button>

 </form> -->



                  <!-- <a class="btn btn-danger btn-sm" style="margin-top:17px;" @click.prevent = "addToCart()"><i class="fa fa-trash" aria-hidden="true"></i></a>
 -->

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
    //  showalladdtocartproduct:{},
    //  productId:0,
    //  product:{},
      //qty:1,

      // form: new Form({
      //
      //   qty:1,
      //
      //
      // })

    }
  },


methods:{
AddTocart(productinformation){
axios.post('/addtocart_formaction',productinformation)
.then((response)=>{

        //this.$store.dispatch("allCategory")

      Toast.fire({
      icon: 'success',
      title: 'Product Add To Cart Successfully'
       })

         this.$router.push('/shope_product')
    })

.catch(()=>{

console.log('fail');

})






},

  Viewproductdetails(){

      axios.get('/view_product_details/'  + this.$route.params.id).then(({data}) => (this.productinformation = data));

  },

addtocartproduct(){

axios.post('/addtocart_formaction')


},

// getalladdtocartproduct(){
//
// axios.get('/all_addtocart_product').then(({data}) => (this.showalladdtocartproduct = data));
//
// },


  postimage(img){

      return "images/"+img;

  },

},

    mounted() {

        this.Viewproductdetails();

        //this.getalladdtocartproduct();

        // this.productId = this.$route.params.id,
        //
        // console.log(this.$route.params.id)



}

}


</script>
