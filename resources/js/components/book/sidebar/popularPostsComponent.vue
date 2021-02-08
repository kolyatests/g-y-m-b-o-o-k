<template>
    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center" @click.prevent="getPosts()" style='cursor: pointer;'>
            Все посты
        </h3>
        <br>
        <h3 class="widget-title text-uppercase text-center" @click.prevent="getMyPosts()" style='cursor: pointer;'>
            Мои посты
        </h3>
        <br>
        <h3 class="widget-title text-uppercase text-center" @click.prevent="getPopularPosts()" style='cursor: pointer;'>Популярные посты</h3>


        <div class="popular-post">
            <div @click.prevent="getPost(post.slug)" class=""
                 v-for="(post,index) in POPULAR_POSTS[0]" :key="index">
                <div class="popular-img" style='cursor: pointer;'  v-if="post.image">
                    <img :src="'/storage/uploads/'+post.image" alt=""/>
                    <div class="p-overlay"></div>
                </div>
                <div class="p-content" style='cursor: pointer;'>
                    {{post.title}}
                    <span class="p-date">{{post.date}}</span>
                </div>
            </div>
        </div>


    </aside>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        computed:
            mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'POPULAR_POSTS'//+
            ]),
        methods: {
            ...mapActions([//тут прописываем всех, кто будет обращаться к actions-берут данные из сети
                'GET_POST_FROM_API',//+
                'GET_POSTS_FROM_API',//+
                'GET_SIDEBAR_FROM_API',
                'GET_MY_POSTS_FROM_API',
                'GET_POPULAR_POSTS_FROM_API',
            ]),
            getPost(post_slug) {
                this.GET_POST_FROM_API(post_slug)//+

                window.scrollTo(0, 0)
            },
            getPosts() {
                this.GET_POSTS_FROM_API()//+
            },
            getMyPosts() {
                this.GET_MY_POSTS_FROM_API()//+
            },
            getPopularPosts() {
                this.GET_POPULAR_POSTS_FROM_API()//+
            },
        },
        mounted() {
            this.GET_SIDEBAR_FROM_API()//+
        },


    }
</script>
