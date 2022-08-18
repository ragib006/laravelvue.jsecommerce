

<template>
    <span>
      <Mybackendheader></Mybackendheader>
      <MyBackendsidebar></MyBackendsidebar>
        <div class="row justify-content-center" style="margin-bottom:395px;margin-top:20px;">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight:bold;color:blue;font-size:20px;">Category Information</div>

                    <div class="card-body">
                      <span style="margin-bottom:10px;display:block;">
                        <span style="font-weight:bold;color:green;font-size:18px;">Category Name :</span>  <span style="font-weight:bold;color:green;font-size:18px;padding-bottom:30px;">{{categoryinformation.category_name}}</span></br>
                      </span>

                          <span style="margin-bottom:10px;display:block;">
                        <span style="font-weight:bold;color:green;font-size:18px;">Category Url :</span>  <span style="font-weight:bold;color:green;font-size:18px;">{{categoryinformation.category_url}}</span>
                            </span>


                            <span style="margin-bottom:10px;display:block;">
                          <span style="font-weight:bold;color:green;font-size:18px;">Added Date :</span>  <span style="font-weight:bold;color:green;font-size:18px;">{{categoryinformation.category_added_date}}</span>
                              </span>

                    </div>


                </div>
            </div>
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


          categoryinformation:{},

          // Create a new form instance
          form: new Form({

            id: '',
            category_name: '',
            category_type: '',
            category_added_date:'',
            category_url:'',
            category_status:'',


          })
        }
      },


      components: {
         MyBackendsidebar,
         Mybackendheader,
         // Mybackendfooter,
       },


methods:{

  Viewcategory(){


    axios.get('/view_category_details/'+this.$route.params.id).then((res) => {
        //  console.log(res.data)
  this.categoryinformation = res.data.categoryinformation


    })


 },


},




        mounted() {

          this.Viewcategory();

        },



    }
</script>
