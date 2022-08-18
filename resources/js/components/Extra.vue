<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <!-- <div class="card"> -->

                  <Slick ref="slick" :options="slickOptions">
                    <!-- <div class="aa" style="height:300px;width:700px;"> -->
                     <!-- <img style="border:1px solid blue;margin:5px 5px;" src="/images/1606991678.jpeg" alt="">
                     <img style="border:1px solid blue;margin:5px 5px;" src="/images/1603455110.jpeg" alt="">
                     <img style="border:1px solid blue;margin:5px 5px;" src="/images/1602263649.jpeg" alt="">
                     <img style="border:1px solid blue;margin:5px 5px;" src="/images/1602266967.jpeg" alt="">

 -->




                    <div style="">
                     <img style="width:300px;height:250px;" src="/images/1606991678.jpeg" alt="">
                   </div>
                   <div style="">
                     <img style="width:300px;height:250px;" src="/images/1603455110.jpeg" alt="">
                   </div>
                     <div style="">
                     <img style="width:300px;height:250px;"  src="/images/1602263649.jpeg" alt="">
                     </div>
                     <div style="">
                     <img style="width:300px;height:250px;" src="/images/1602266967.jpeg" alt="">
                    </div>

                      <!-- <img src="/images/banner1.jpg" alt="">
                     <img src="/images/banner2.jpg" alt="">
                     <img src="/images/banner3.jpg" alt=""> -->
                      <!-- </div> -->
                 </Slick>







                <!-- </div> -->
            </div>
        </div>
    </div>
</template>

<script>
import Slick from 'vue-slick';
    export default {
      components: { Slick },

     data() {
         return {
             slickOptions: {
                 slidesToShow: 3,
                 autoplay:true,
                 autoplaySpeed:1000,
                 arrows:false,
                 centerMode:true,
                 // fade:true,
                 //accessibility:true,
                // adaptiveHeight:true,
                 // Any other options that can be got from plugin documentation
             },
         };
     },













    }
</script>
