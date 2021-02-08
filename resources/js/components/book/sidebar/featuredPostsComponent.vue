<template>
    <aside class="widget">
        <h3 class="widget-title text-uppercase text-center"  @click.prevent="getFeaturedPosts()" style='cursor: pointer;'>Рекомендованные посты</h3>

        <div class="popular-post">
            <div @click.prevent="getPost(post.slug)" class=""
                 v-for="(post,index) in FEATURED_POSTS[0]" :key="index">
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
                'FEATURED_POSTS'//+
            ]) ,

        methods: {
            ...mapActions([//тут прописываем всех, кто будет обращаться к actions-берут данные из сети
                'GET_POST_FROM_API',//+
                'GET_FEATURED_POSTS_FROM_API',//+
            ]),

            getPost(post_slug) {
                this.GET_POST_FROM_API(post_slug)//+

                window.scrollTo(0, 0)
            },
            getFeaturedPosts() {
                this.GET_FEATURED_POSTS_FROM_API()//+
            },
        },
        mounted() {
        },





    }
</script>

