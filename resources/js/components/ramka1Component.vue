<template>
    <div>
        <a class=" btn btn-outline-secondary btn-lg btn-block card card-body mb-2"
           @click.prevent="clickCard(card.name)" v-for="card in CARDS1"
           :href="card.name">
            <div class="row" ref="show2">
                <div class="col-9">
                    <h5>{{card.text}}</h5>
                </div>
                <div class="col-3 align-self-center">
                    <img height="72" width="72" class="bg-light shadow-lg float-right   p-1" alt=""
                         :src="card.img"/>
                </div>
            </div>
        </a>
    </div>


</template>

<script>
    import {mapActions, mapGetters} from 'vuex'

    export default {

        props: [
            'cards',
        ],
        computed:
            mapGetters([
                'CARDS1'
            ])
        ,
        methods: {
            ...mapActions([
                'GET_CARDS2_FROM_API',
                'GET_CARDS1_FROM_API'
            ]),
            clickCard(name) {
                console.log(name);
                // this.$store.commit('GET_CARDS2_FROM_API', name);
                this.GET_CARDS2_FROM_API(name)
            },
        },
        mounted() {

               this.GET_CARDS1_FROM_API();



        }


    }
</script>

<style scoped>

</style>
