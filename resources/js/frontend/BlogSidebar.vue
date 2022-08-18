<template>
  <span>




    <div class="span4">
      <aside class="right-sidebar">
        <div class="widget">


          <form class="form-search">
            <input placeholder="Type something"@keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
            <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
          </form>

        </div>
        <div class="widget">
          <h5 class="widgetheading">Categories</h5>



          <ul class="cat" v-for="showcategory in allcategory" :key="showcategory.id">

       <li><i class="icon-angle-right"></i><router-link :to="`/categorywisepost/${showcategory.id}`" style="text-decoration:none">{{showcategory.cat_name}}</router-link><span></span></li>


          </ul>
        </div>
        <div class="widget">
          <h5 class="widgetheading">Random posts</h5>
          <ul class="recent" v-for="showrecentpost in recentpost" :key="showrecentpost.id">
            <li>

                <img :src="postimage(showrecentpost.product_image)" alt="" style="height:80px;width:80px;"></td>
              <h6><router-link :to="`/single_post/${showrecentpost.id}`" style="text-decoration:none">{{showrecentpost.product_name}}</router-link></h6>
              <p style="text-align:justify;">
              {{showrecentpost.product_description | shortlength(100,"  ... ")}}
              </p>
            </li>


          </ul>
        </div>
        <!-- <div class="widget">
          <h5 class="widgetheading">Popular tags</h5>
          <ul class="tags">
            <li><a href="#">Web design</a></li>
            <li><a href="#">Trends</a></li>
            <li><a href="#">Technology</a></li>
            <li><a href="#">Internet</a></li>
            <li><a href="#">Tutorial</a></li>
            <li><a href="#">Development</a></li>
          </ul>
        </div> -->
      </aside>
    </div>










  </span>
</template>

<script>

import _ from 'lodash'


    export default {

  name: "BlogSidebar",

  data () {
    return {


    keyword:'',
    // keyword:'',
    //keyword:'',
    //  keyword :'',
     // search_input:"",
     //
     // search_reult:"",


      allcategory : {},
      recentpost : {},



    }
  },

  // components:{
  //
  //   BlogSearch
  //
  //
  // },



          methods:{


            // RealSearch(){
            //
            //   this.$store.dispatch('Searchpost',this.keyword);
            //
            //
            // },


            // RealSearch(){
            //
            //   this.$store.dispatch('Searchpost',this.keyword);
            //
            //
            // },

            RealSearch:_.debounce(function(){

              // this.$store.dispatch('Searchpost',this.keyword);
               this.$store.dispatch('Searchpost',this.keyword);

            },1000),

         // RealSearch(){
         //
         //    this.$store.dipatch('Searchpost',this.keyword);
         //
         //
         // },

         // RealSearh(){
         //
         // this.$store.dipatch('SearchPost',this.keyword);
         //
         //
         // },

          Showallcategory(){

            axios.get('/showallcategoryin_website').then(({data}) => (this.allcategory = data));
          },



          Recentpost(){

       axios.get('/show_recent_post').then(({data}) => (this.recentpost = data));


          },

          postimage(img){

              return "images/"+img;

          },



          //
          //
          // getdata(val){
          //
          //
          //
          // },


          },


            mounted() {


              this.Showallcategory();

               this.Recentpost();

               this.RealSearch();


            },

     //
     // watch:{
     //
     //
     //    search_input:function(val){
     //
     //       this.getdata(val);
     //
     //
     //       }
     //
     //
     //
     //
     // }









    }
</script>
