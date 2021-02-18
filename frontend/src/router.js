import Vue from "vue";
import Router from "vue-router";
import Home from "./views/Home.vue";
import CreateBook from "./views/CreateBook.vue";
import BookDetails from "./views/BookDetails.vue";
import LogIn from "./views/LogIn.vue";
import Books from "./views/admin/Books.vue";
import BookEdit from "./views/admin/BookEdit.vue";

Vue.use(Router);

export default new Router({
  mode: "history",
  base: process.env.BASE_URL,
  routes: [
    {
      path: "/",
      name: "home",
      component: Home
    },
    {
      path: "/create",
      name: "create",
      component: CreateBook
    },
    {
      path: "/books/details/:book",
      name: "BookDetails",
      component: BookDetails
    },
    {
      path: "/books/:book/edit",
      name: "BookEdit",
      component: BookEdit
    },
    {
      path: "/login",
      name: "LogIn",
      component: LogIn
    },
    {
      path: "/admin/books",
      name: "books",
      component: Books
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (about.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () =>
        import(/* webpackChunkName: "about" */ "./views/About.vue")
    }
  ]
});
