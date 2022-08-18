<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                  <carousel :items="1" :autoplay="true" :loop="true" :nav="false" :dots="false">



                    <img style="" src="/images/banner1.jpg" alt="">


                    <img style="" src="/images/banner2.jpg" alt="">


                    <img style=""  src="/images/banner3.jpg" alt="">


                    <!-- <img style="" src="/images/1602266967.jpeg" alt=""> -->





                     <!-- <img style="" src="/images/1606991678.jpeg" alt="">


                     <img style="" src="/images/1603455110.jpeg" alt="">


                     <img style=""  src="/images/1602263649.jpeg" alt="">


                     <img style="" src="/images/1602266967.jpeg" alt="">

 -->



                    <!-- <img src="https://placeimg.com/200/200/any?1">

    <img src="https://placeimg.com/200/200/any?2">

    <img src="https://placeimg.com/200/200/any?3">

    <img src="https://placeimg.com/200/200/any?4"> -->

                  </carousel>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import carousel from 'vue-owl-carousel'
    export default {
      components: { carousel },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
