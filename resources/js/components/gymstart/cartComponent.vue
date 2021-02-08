<template>
    <div class="card card-body">
        <div class="row">
            <div class="col-9">
                <h5 id="104"> {{GYMSTARTCART.gymcart_104}}</h5>
                <h6 id="105">{{GYMSTARTCART.gymcart_105}}</h6>
            </div>
            <div class="col-3 align-self-center">
                <img  id="106" height="72" width="72" class="bg-light shadow-lg float-right   p-1" alt=""
                      :src="GYMSTARTCART.gymcart_img_106"/>
            </div>
        </div>
    </div>

</template>

<script>
    import { mapGetters} from 'vuex'

    export default {
        data: function () {
            return {}
        },
        computed:
            mapGetters([
                'GYMSTARTCART'
            ])
        ,


    }
</script>
