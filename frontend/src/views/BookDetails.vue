<template>
  <div class="book-details">
    <div class="card-group">
      <div class="card bg-primary">
        <div class="card-header">
          <h2
            class="page-section-heading text-center text-uppercase text-white"
          >
            {{ book.title }}
          </h2>
        </div>
        <div class="card-body text-center">
          <!-- Icon Divider-->

          <!-- About Section Content-->
          <div class="row">
            <div class="col-lg-12 ml-auto mr-auto">
              <p class="lead">{{ book.description }}</p>
            </div>
          </div>
          <div class="row">
            <ul>
              <li>
                <div>book ISBN : {{ book.isbn }}</div>
              </li>
              <li>
                <div>book price : {{ book.price }}</div>
              </li>
              <li>
                <div>status : {{ book.sold == 1 ? "sold" : "available" }}</div>
              </li>
              <li>
                <div>publis date : {{ book.published_at }}</div>
              </li>
            </ul>
          </div>
          <!-- About Section Button-->
          <div class="text-center mt-4"></div>
        </div>
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


