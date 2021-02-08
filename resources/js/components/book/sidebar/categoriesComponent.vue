<template>
    <aside class="widget border pos-padding">
        <h3 class="widget-title text-uppercase text-center">Категории</h3>
        <ul>
                <div @click.prevent="getCategory(category.slug)"  style='cursor: pointer;'
                     v-for="(category,index) in CATEGORIES[0]" :key="index">
                    <li>
                            {{category.title}}
                            <div class="post-count float-right">({{category.posts_count}})</div>
                    </li>
                </div>



        </ul>
    </aside>
</template>

<script>
    import {mapActions, mapGetters} from "vuex";

    export default {
        computed:
            mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'CATEGORIES'//+
            ]) ,

        methods: {
            ...mapActions([//тут прописываем всех, кто будет обращаться к actions-берут данные из сети
                'GET_CATEGORY_POSTS_FROM_API',//+
            ]),
            getCategory(categorySlug) {
                this.GET_CATEGORY_POSTS_FROM_API(categorySlug)//+
                window.scrollTo(0, 0)

            },
        },
        mounted() {
        },




    }
</script>
