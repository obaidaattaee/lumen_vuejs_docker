<template>
  <div class="up-start">
            <section class="page-section portfolio" id="portfolio">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-secondary mb-5">Our Library</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <!-- Portfolio Grid Items-->
                <div class="row justify-content-center">
                    <!-- Portfolio Item 1-->
                    <div class="col-md-3" v-for="book in books" :key="book.id">
                      <div class="content">
                        <img :src="'https://picsum.photos/200/300'" alt="Mountains" style="width:100%">
                        <h3>{{ book.title }}</h3>
                        <p class="col-md-3">{{ book.description.slice(0 , 20) }}</p>
                        <p>
                          <router-link :to="'/books/details/' + book.id" :class="'btn btn-sm btn-info'">
                            more details
                          </router-link>
                        </p>
                      </div>
                    </div>
                    
                    

                         
                </div>
            </div>
        </section>



  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "UpStart",
  data() {
    return {
      serverMessage: null,
      books: []
    };
  },
  async created() {
    console.log("created");
    const response = await axios.get("/api/books");
    this.serverMessage = response.data.message;
    this.books = response.data.data;
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->

