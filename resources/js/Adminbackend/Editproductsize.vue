<template>
    <span>


      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>

 <div class="card card-primary" style="width:550px;margin-top:25px;margin-left:350px;margin-bottom:200px;">



<div class="card-header">
  <h3 class="card-title">Edit Product Size</h3>

</div>

<form enctype="multipart/form-data" role="form" @submit.prevent = "updatesize()">

<div class="card-body">



    
        <div class="form-group">
        <label>Size Name</label>
        <input v-model="form.size_name" type="text" name="size_name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_name') }" placeholder="Enter Size Name">
        <has-error :form="form" field="size_name"></has-error>
        </div>

        <div class="form-group">
        <label>Product Weight</label>
        <input v-model="form.size_weight" type="text" name="size_weight"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_weight') }" placeholder="Enter Product Weight">
        <has-error :form="form" field="size_weight"></has-error>
        </div>

        <div class="form-group">
        <label>Product Stock</label>
        <input v-model="form.size_stock" type="text" name="size_stock"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_stock') }" placeholder="Enter Product Stocks">
        <has-error :form="form" field="size_stock"></has-error>
        </div>



              <div class="form-group">
        <label>Size Added Date</label>
        <input v-model="form.size_added_date" type="text" name="size_added_date"
        class="form-control" :class="{ 'is-invalid': form.errors.has('size_added_date') }" placeholder="Format- 04-09-2021">
        <has-error :form="form" field="size_added_date"></has-error>
        </div>



 




      <button type="submit" class="btn btn-primary">Update</button>



</div>

</form>


</div>



  <!-- <Mybackendfooter></Mybackendfooter> -->



</span>


</template>

<script>

import Mybackendheader from "./Adminheader.vue"
import MyBackendsidebar from "./Adminsidebar.vue"
//
  // import Mybackendfooter from "./Adminfooter.vue"
    export default {


      data () {
        return {


            showcategoryinform:{},

          // Create a new form instance
          form: new Form({

                  	size_id: '',
              	    size_product_id: '',
              	    size_name: '',
                    size_weight:'',
                    size_stock:'',
                    size_added_date:'',
                    size_status:'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         // Mybackendfooter,
       },


methods:{






    //update category


    updatesize(){


      this.form.post('/update_product_size/'+this.$route.params.size_id)
         .then((response)=>{
          this.$router.push('/add_product')

           Toast.fire({
           icon: 'success',
           title: 'Product Size Update Successfully'
           })

           })
           .catch(()=>{

             console.log('error');

           })

    }







},




        mounted() {


      //  this.showallcategoryinform();



          axios.get('/edit_product_size_placeholder_value/'+this.$route.params.size_id)
         .then((response)=>{

         this.form.fill(response.data)

         })



        },



    }
</script>
