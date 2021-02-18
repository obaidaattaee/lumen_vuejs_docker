<template>
  <div id="app">
    <div id="nav">
      <nav class="navbar navbar-expand-lg text-uppercase fixed-top py-4" style="background-color: #2c3e50 !important;" id="mainNav">
            <div class="container">
                <router-link to="/">Library</router-link>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-lg-2"><router-link to="/">Home</router-link></li>
                    <li class="nav-item mx-lg-2" v-if="isLogin"><router-link to="/create">Add New</router-link></li>
                    <li class="nav-item mx-lg-2" v-if="! isLogin"><router-link to="/login">login</router-link></li>
                </ul>
            </div>
        </nav>
      <br><br><br>
    </div>
    <router-view />
  </div>
</template>
<script>
  export default {
    name:"app",
    data() {
      return {
        isLogin : false
      }
      
    },
    created() {
      this.logedin() ;
    },
    methods: {
      logedin: function (){
        localStorage.getItem('token') ? this.isLogin = true : this.isLogin = false ;
      },
    }
  }
</script>
<style lang="scss">
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  width: 100%;

}
body{
    font-size: 1rem;
  font-weight: 400;
  line-height: 1.5;
  color: #ffffff;
  text-align: left;
  text-transform: uppercase !important;
}
#nav {
  padding: 30px;
  a {
    color: #ebf0f5;
    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
