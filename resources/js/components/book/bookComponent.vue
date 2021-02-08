<template>
    <div class="row content-main">

        <div class="col-lg-8" v-show="VIEW_PAGE_POSTS">
            <posts-component/>
        </div>
        <div class="col-lg-8" v-show="VIEW_PAGE_POST">
            <post-component/>
        </div>



        <sidebar-component/>

    </div>
</template>

<script>
    import {mapGetters} from "vuex";


    export default {
        computed:
            mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'VIEW_PAGE_POST',//+
                'VIEW_PAGE_POSTS',//+
            ]),


    }
</script>

