<template>
    <div>
            <a class=" btn btn-outline-secondary btn-lg btn-block card card-body mb-2"
               @click.prevent="clickEx(card.name)" v-for="card in CARDS2"
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
        data: function () {
            return {}
        },
        computed: {
            ...mapGetters([
                'CARDS2'
            ])
        },
        async mounted() {

        },
        methods: {
            ...mapActions([
                'GET_EXERCISE_FROM_API',
            ]),
            clickEx(name) {
                //console.log(name.data);
                // this.$store.commit('GET_CARDS_FROM_API', name);
                this.GET_EXERCISE_FROM_API(name)
            },
        }














    }
</script>
