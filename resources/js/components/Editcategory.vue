<template>
    <div>




 <div class="card card-primary" style="width:550px;margin-top:15px;">



<div class="card-header">
  <h3 class="card-title">Category Edit</h3>

</div>

<form @submit.prevent = "updatecategory()">

<div class="card-body">

    <div class="form-group">
      <label>Category Name</label>
      <input v-model="form.cat_name" type="text" name="cat_name" required placeholder="Enter Category Name"
        class="form-control" :class="{ 'is-invalid': form.errors.has('cat_name') }">
      <has-error :form="form" field="cat_name"></has-error>
    </div>

    <div class="form-group">
      <label>Category Url</label>
      <input v-model="form.cat_url" type="text" name="cat_url" required placeholder="Enter Category Url"
        class="form-control" :class="{ 'is-invalid': form.errors.has('cat_url') }" >
      <has-error :form="form" field="cat_url"></has-error>
    </div>

    <div class="form-group">
       <label for="exampleFormControlSelect1">Added By</label>
         <select  v-model="form.cat_addedby" class="form-control" id="exampleFormControlSelect1" name="cat_addedby" :class="{ 'is-invalid': form.errors.has('cat_addedby') }" required>
           <option value="" disabled>Select</option>
             <option value="Ragib">Ragib</option>
             <option value="Ayon">Ayon</option>
             <option value="Mumu">Mumu</option>
             <option value="Akash">Akash</option>
         </select>
         <has-error :form="form" field="cat_addedby"></has-error>
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


          // Create a new form instance
          form: new Form({
            cat_name: '',
            cat_url: '',
            cat_addedby: '',

          cat_status : '',

          })
        }
      },


methods:{


//update category
 updatecategory(){
 this.form.post('/update_category/'+this.$route.params.id)
    .then((response)=>{
     this.$router.push('/add_category')

      Toast.fire({
      icon: 'success',
      title: 'User Update Successfully'
      })




      })
      .catch(()=>{

        console.log('error');

      })



},



},




        mounted() {

           axios.get('/edit_categoryplaceholder_value/'+this.$route.params.id)
           .then((response)=>{

      //    this.form.fill(response.data)

             //console.log('ok');
             this.form.fill(response.data)


           })


        },
    }
</script>
