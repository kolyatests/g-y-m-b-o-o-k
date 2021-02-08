<template>
    <div class="card">
        <div class="card-header mb-4">
            <h4 class="text-uppercase text-center">{{CARD_EXERCISE.description}}</h4>
        </div>
        <div class="row justify-content-center mx-auto">
            <div class="col-md-6">
                <div class="card-body center-block">
                    <img class="img-thumbnail" :src="CARD_EXERCISE.image" alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="" v-html="CARD_EXERCISE.eqipa">
                </div>
                <p class="card-text">{{CARD_EXERCISE.exercise_text}}</p>
                <div>
                    <a href="/sport/favorites" @click.prevent="favoriteAdd()">
                        <img src="/storage/image/favoff.png" width="40" alt="" title="в избранное" v-if="!FAVORITE"/>
                        <img src="/storage/image/favon.png" width="40" alt="" title="в избранное" v-if="FAVORITE"/>
                    </a>
                </div>
                <br>
                <div v-show="CARD_EXERCISE.visible">
                    <a class="btn btn-outline-secondary btn-lg btn-block mb-4" :href="'/sport/add_exercise/'+CARD_EXERCISE.program">
                        <h4>Добавить в тренировку</h4>
                    </a>
                </div>
                <a class="btn btn-outline-secondary btn-lg btn-block mb-4" href="back" @click.prevent="notVisible">
                    <h4>Назад</h4>
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from 'vuex'

    export default {
        name: "exerciseComponent",
        computed:
            mapGetters([
                'CARD_EXERCISE', 'FAVORITE'
            ]),
        ...mapActions([
            'GET_FAVORITE_FROM_API'
        ]),

        methods: {
            ...mapActions([
                'SET_FAVORITE_FROM_API',
                'GET_FAVORITE_FROM_API'

            ]),
            computed() {
                this.GET_FAVORITE_FROM_API()
            },

            favoriteAdd() {
                this.SET_FAVORITE_FROM_API()

            },

            ...mapMutations([
                'EX_VISIBLE'
            ]),
            notVisible() {
                this.EX_VISIBLE()
            },
        },
        mounted() {
            // this.GET_FAVORITE_FROM_API()

        },


    }
</script>

<style scoped>

</style>
