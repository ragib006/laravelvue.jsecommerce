<template>
<span>


<section id="content">
<div class="container">
 <div class="row">
   <div class="span8">
     <article>
       <div class="row">
         <div class="span8">





           <div class="post-image">
             <div class="post-heading">
               <h3><a href="#">{{singlefullpost.product_name}}</a></h3>
             </div>
                 <img :src="postimage(singlefullpost.product_image)" alt="" style="height:400px;width:400px;">
           </div>
           <p style="text-align:justify;">
             {{singlefullpost.product_description}}
           </p>

           <div class="bottom-article">
             <ul class="meta-post">
               <li><i class="icon-user"></i><a href="#">{{singlefullpost.product_addedby}}</a></li>
               <li><i class="icon-folder-open"></i><a href="#">{{singlefullpost.created_at | timeformat }}</a></li>
               <li><i class="icon-tags"></i><a href="#">{{singlefullpost.category_name.cat_name}}</a></li>
             </ul>
           </div>
         </div>
       </div>
     </article>
     <!-- author info -->

















   </div>
   <div class="span4">



     <aside class="right-sidebar">


          <BlogSidebar/>


     </aside>








   </div>






 </div>
</div>
</section>





</span>
</template>

<script>


import BlogSidebar from "./BlogSidebar.vue"

    export default {

      name:"SingleBlog",

      data () {
        return {

        singlefullpost : {},



        }
      },

         components:{

            BlogSidebar


         },





        // computed:{
        //
        //
        // },

        methods:{


          Showsinglepost(){

            axios.get('/show_single_post/'  + this.$route.params.id).then(({data}) => (this.singlefullpost = data));


          },

          postimage(img){

              return "images/"+img;

          },








        },

          mounted() {


              this.Showsinglepost();

            //  this.Showtotalpost(this.$route.params.id);


          },



          

        watch:{

             $route(to,from){

                  this.Showsinglepost();

             }

        },









        }

</script>
