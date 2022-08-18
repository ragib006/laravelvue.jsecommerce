<template>
<span>

  <form class="form-search">
    <input placeholder="Type something"@keyup="RealSearch" v-model="keyword" type="text" class="input-medium search-query">
    <button type="submit" @click.prevent="RealSearch" class="btn btn-square btn-theme">Search</button>
  </form>



</span>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
