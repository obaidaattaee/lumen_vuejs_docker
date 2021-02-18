<template>
    <div>
        <table class="table table-responseve" id="books-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>title</th>
                    <th>isbn</th>
                    <th>author</th>
                    <th>price</th>
                    <th>sold</th>
                    <th>price</th>
                    <th>publish date</th>
                    <th>description</th>
                    <th>actions</th>
                </tr>
            </thead>
            <tbody class=".table-striped">
                <tr v-for="book in books" :key="book.id">
                    <th>{{ book.id }}</th>
                    <th>{{ book.title }}</th>
                    <th>{{ book.isbn }}</th>
                    <th>{{ book.auther }}</th>
                    <th>{{ book.price }}</th>
                    <th>{{ book.sold ? 'sold' : 'available' }}</th>
                    <th>{{ book.price }}</th>
                    <th>{{ book.published_at }}</th>
                    <th>{{ book.description.slice(0 , 20) + "..."}}</th>
                    <th class="ml-2"> 
                       
                        <router-link :to="'/books/details/' + book.id">
                            <span class="btn btn-info btn-sm ml-2" style="color: #ffffff">more</span>
                        </router-link> 
                        <router-link :to="'/books/' + book.id + '/edit/'">
                            <span class="btn btn-primary btn-sm ml-2" style="color: #ffffff">edit</span>
                        </router-link> 
                        <button class="btn btn-sm btn-danger ml-2" @click="deleteBook(book.id)">delete</button>
                        
                    </th>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import Axios from 'axios';
export default {
    name:"Books",
    data(){
        return {
            books: [],
        }
    },
    async created() {
        if (this.logedin()) {
            console.log("created");
            const response = await Axios.get("/api/books");
            this.books = response.data.data;
        }else{
            this.$router.push('/');
        }
        
    },
    methods:{
        logedin: function (){
            return localStorage.getItem('token') ? true :  false ;
        },
        deleteBook: function(id){
            Axios.delete('/api/books/' + id + '/delete').then((response) => {
                var book = this.books.findIndex( book => book.id == response.data.data.book_id);
                this.books.splice(book , 1  );
            });
        },
    }

}
</script>

