<template>
    <div>

 <div class="card card-primary" style="width:550px;margin-top:15px;">
<div class="card-header">
  <h3 class="card-title">Product Edit </h3>

</div>

<form @submit.prevent = "updateproduct()">

<div class="card-body">



               <div class="form-group">
                 <label>Product Name</label>
                 <input v-model="form.product_name" type="text" name="product_name"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('product_name') }" placeholder="Enter product Name" required>
                 <has-error :form="form" field="product_name"></has-error>
               </div>

               <div class="form-group">
                  <label for="exampleFormControlSelect1">Seclect Category</label>
                    <select  v-model="form.category_id" class="form-control" id="exampleFormControlSelect1" name="category_id" :class="{ 'is-invalid': form.errors.has('category_id') }" style="width:500px;" required>
                      <option value="" disabled>Select</option>
                      <option v-for="category in showallcategoryinproductpage" :value="category.id">{{category.cat_name}}</option>
                        <!-- <tr v-for="showcategory in categorys" :key="showcategory.id"> -->

                    </select>
                    <has-error :form="form" field="category_id"></has-error>
               </div>








               <div class="form-group">
                 <label>Product Url</label>
                 <input v-model="form.product_url" type="text" name="product_url"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('product_url') }" placeholder="Enter Product Url" required>
                 <has-error :form="form" field="product_url"></has-error>
               </div>

               <div class="form-group">
                 <label>Product Price</label>
                 <input v-model="form.product_price" type="number" name="product_price"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('product_price') }" required>
                 <has-error :form="form" field="product_price"></has-error>
               </div>

               <div class="form-group">
                 <label>Product Quantity</label>
                 <input v-model="form.product_qty" type="number" name="product_qty"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('product_qty') }" required>
                 <has-error :form="form" field="product_qty"></has-error>
               </div>


    <div class="form-group">
       <label for="exampleInputFile">File input</label>
       <div class="ass" style="margin-bottom:10px;">
        <!-- <img :src="`ragibimage/${form.photo}`" alt="" style="height:70px;width:70px;"> -->
        <img :src="updateimage()" alt="" style="height:70px;width:70px;">
       </div>

        <div class="input-group">
          <div class="custom-file">
              <input @change="changephoto($event)" type="file" class="custom-file-input" id="exampleInputFile" name="product_image" :class="{ 'is-invalid': form.errors.has('product_image') }">
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>


                 <has-error :form="form" field="product_image"></has-error>
               </div>
               <!-- <div class="input-group-append">
                 <span class="input-group-text" id="">Upload</span>
               </div> -->
             </div>
           </div>













               <div class="form-group">
                  <label for="exampleFormControlSelect1">Added By</label>
                    <select  v-model="form.product_addedby" class="form-control" id="exampleFormControlSelect1" name="product_addedby" :class="{ 'is-invalid': form.errors.has('product_addedby') }" style="width:500px;" required>
                      <option value="" disabled>Select</option>
                        <option value="Ragib">Ragib</option>
                        <option value="Ayon">Ayon</option>
                        <option value="Mumu">Mumu</option>
                        <option value="Akash">Akash</option>
                    </select>
                    <has-error :form="form" field="product_addedby"></has-error>
               </div>


               <div class="form-group">
                 <label>Product Description</label>
                 <textarea v-model="form.product_description" type="text" name="product_description"
                   class="form-control" :class="{ 'is-invalid': form.errors.has('product_description') }" placeholder="Enter Product Description" required></textarea>
                 <has-error :form="form" field="product_description"></has-error>
               </div>


  <!-- /.card-body -->

  <div class="card-footer">
    <button type="submit" class="btn btn-primary" style="margin-left:400px;">Submit</button>
  </div>

</div>

</form>


</div>







    </div>
</template>

<script>
    export default {


      data () {
        return {

         showallcategoryinproductpage:{},

          // Create a new form instance
          form: new Form({

            product_name: '',
            category_id: '',
            product_url: '',
            product_image: '',
            product_price: '',
            product_qty: '',
            product_description:'',
            product_addedby:'',
            product_status:'',





          })
        }
      },


methods:{


//update category
 updateproduct(){
 this.form.post('/update_product/'+this.$route.params.id)
    .then((response)=>{
     this.$router.push('/add_product')

      Toast.fire({
      icon: 'success',
      title: 'Product Update Successfully'
      })
    //  console.log('success');



      })
      .catch(()=>{

        console.log('error');

      })



},


//droudown category
get_all_category(){


//axios.get('/allproduct').then(({data}) => (this.products = data));
axios.get('/allcategory').then(({data}) => (this.showallcategoryinproductpage = data));


},






//when image click the image show

  changephoto(event){

         let file = event.target.files[0];


         let reader = new FileReader();
         reader.onload = event => {
         this.form.product_image = event.target.result
         console.log(event.target.result)

        };

       reader.readAsDataURL(file);
  //   console.log(event);


        },



//update previous image show

        updateimage(){

           let img = this.form.product_image;
           if(img.length>100){

              return  this.form.product_image

           }else {


              return "images/"+this.form.product_image


           }

        }



















},




        mounted() {
          //  console.log('Component mounted.')

           this.get_all_category();

           //category placeholder value show +this.$route.params.id

           // axios.get(`/edit_category_placeholder_value/${this.$route.params.id}`)
           axios.get('/edit_category_placeholder_value/'+this.$route.params.id)
           .then((response)=>{

           this.form.fill(response.data)

           })


        }
    }
</script>
