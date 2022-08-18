<template>

<span>

  <nav class="navbar bg-primary">
    <div class="container-fluid">

      <a class="navbar-brand" style="color:white" href="#">Admin Dashboard</a>

      <span>{{userinfo.admin_name}}</span>

    </div>
  </nav>



</span>
</template>

<script>
  

    export default {


      data () {
        return {


          userinfo:{},
          

         //showmyallteachers:{},



          // Create a new form instance
          form: new Form({

             //   notice_id: '',
             //   notice_title: '',
             //   notice_description: '',
             //   notice_date:'',
                //student_bus_id:'',
             //   notice_status:'',



          })
        }
      },



   




    methods:{

//search category
//RealSerchstudent:_.debounce(function(){

//this.$store.dispatch('Searchstudent',this.keyword);

//},1000),



showuserinfo(){

axios.get('/show_admin_info').then(({data}) => (this.userinfo = data));


},






},


computed:{



},




        mounted() {

          this.showuserinfo();
        


        }
    }
</script>
