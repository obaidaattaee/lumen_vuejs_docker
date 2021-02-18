<template>
  <div class="book-details justify-content-center">
<div class="row justify-content-center">
  <div class="card col-md-4" style="width:100%">
  <img :src="'https://picsum.photos/200/300'" alt="Mountains" style="width:100%">
  <div class="card-body">
    <h5 class="card-title">{{ book.title }}</h5>
    <p class="card-text">{{ book.description }}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><div>book ISBN : {{ book.isbn }}</div></li>
    <li class="list-group-item">book price : {{ book.price }}</li>
    <li class="list-group-item">status : {{ book.sold == 1 ? "sold" : "available" }}</li>
    <li class="list-group-item">publis date : {{ book.published_at }}</li>
  </ul>

</div>
    </div>
  </div>
</template>

<script>
import Axios from "axios";
export default {
  name: "BookDetails",

  data() {
    return {
      serverMessage: null,
      book_id: "",
      book: {},
    };
  },
  created() {
    this.book_id = this.$route.params.book;
    this.getDetals();
  },
  methods: {
    getDetals: function () {
      Axios.get("/api/books/" + this.book_id + "/show").then((response) => {
        this.book = response.data.data;
      });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->


