<template>

    <div class="">
        <article class="post" v-for="(post,index) in ALL_POSTS[0]" :key="index">
            <div class="post-thumb" @click.prevent="getPost(post.slug)" style='cursor: pointer;' v-if="post.image">
                <img class="" :src="'/storage/uploads/'+post.image" alt=""/>
                <div class="post-thumb-overlay  text-uppercase text-center">
                    View Post
                </div>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase">
                    <h6 v-show="post.HasCategory" @click.prevent="getCategory(post.CategorySlug)" style='cursor: pointer;'>
                        {{post.CategoryTitle}}</h6>
                    <h1 class="entry-title" @click.prevent="getPost(post.slug)" style='cursor: pointer;'>
                        {{post.title}}</h1>
                </header>
                <div class="entry-content">
                    <div v-html="post.description"></div>
                    <br>
                    <div class=" text-center  ">
                        <div class="btn btn-outline-primary text-center text-uppercase " @click.prevent="getPost(post.slug)">
                            Continue Reading
                        </div>
                    </div>
                </div>
                <br>
                <div class="social-share">
                    <img class="pull-left img-circle" :src="'/storage/'+post.AuthorImage" alt="" height="50" v-show="post.AuthorImage"/>
                    <span class="social-share-title pull-left text-capitalize">By {{post.AuthorName}} On {{post.GetDate}}</span>
                    <ul class="text-center pull-right h4">
                        <li>
                            <div class="s-facebook"><i class="fa fa-eye"/></div>
                        </li>
                        {{post.views}}
                    </ul>
                </div>
            </div>
        </article>

        <section class=" row">
            <div class="d-inline mx-auto center">
                <div class="btn btn-outline-primary" :class="{ active: !PAGINATION[0].prev_page_url }" @click.prevent="getPosts(PAGINATION[0].prev_page_url)">Назад</div>
                <div class="btn btn-outline-primary active">Страница {{ PAGINATION[0].current_page }} из {{ PAGINATION[0].last_page }}</div>
                <div class="btn btn-outline-primary" :class="{ active: !PAGINATION[0].next_page_url }" @click.prevent="getPosts(PAGINATION[0].next_page_url)"
                     style='cursor: pointer;'>Следующая
                </div>

            </div>
        </section>

        <br>
        <br>
        <br>

    </div>


</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        computed:
            mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'ALL_POSTS',//+
                'PAGINATION',//+
            ]),

        methods: {
            ...mapActions([//тут прописываем всех, кто будет обращаться к actions-берут данные из сети
                'GET_POST_FROM_API',//+
                'GET_CATEGORY_POSTS_FROM_API',//+
                'GET_POSTS_FROM_API',//+

            ]),
            getPost(post_slug) {//+
                this.GET_POST_FROM_API(post_slug)
                window.scrollTo(0, 0)
            },
            getPosts(posts) {
                this.GET_POSTS_FROM_API(posts)//+
            },
            getCategory(categorySlug) {//+
                this.GET_CATEGORY_POSTS_FROM_API(categorySlug)
            },



        },
        mounted() {//запускается при начальной загрузке страницы
            this.GET_POSTS_FROM_API()//+

        },
        updated() {
            window.scrollTo(0, 0)
        }


    }
</script>

