 import Axios from "axios";

export default {
    state: {
        cards1: [],//массив карточек в 1 колонке
        cards2: [],//массив карточек в 2 колонке
        cards2Groupp: '',//ссылка на карточки в 2 колонке
        cardExercise: [],//данные по упражнению
        name: '',//
        visible: true,//что видим --2 колонки или описание
        favorite: false,//в фаворитах ли упражнениях
        exerciseFavorite: '',//упражнение для проверки на фаворит
    },

    mutations: {

        NAME_CHANGE(state, name) {//
            state.name = name
        },
        CARDS2_CHANGE(state, cards2) {//массив карточек в 2 колонке
            state.cards2 = cards2
        },
        CARDS2_GROUP_CHANGE(state, cards2Groupp) {////ссылка на карточки в 2 колонке
            state.cards2Groupp = cards2Groupp
        },
        CARDS1_CHANGE(state, cards1) {//массив карточек в 1 колонке
            state.cards1 = cards1
        },
        EX_CHANGE(state, cardExercise) {///данные по упражнению заносим в стейт
            state.cardExercise = cardExercise
        },
        EX_VISIBLE(state, visible) {////что видим --2 колонки или описание
            state.visible = !visible
        },
        EX_FAVORITE(state, favorite) {//в фаворитах ли упражнениях меняем состояние
            state.favorite = !favorite
        },
        FAVORITE(state, favorite) {//в фаворитах ли упражнениях меняем состояние
            state.favorite = favorite
        },
        EX_EXERCISE_FAVORITE(state, exerciseFavorite) {//упражнение для проверки на фаворит
            state.exerciseFavorite = exerciseFavorite
        },

    },

    actions: {
        GET_CARDS2_FROM_API: async ({commit,getters}, payload) => {
            let data = await Axios.get('/sport/' + payload);
            commit('CARDS2_CHANGE', data.data);
            commit('CARDS2_GROUP_CHANGE', payload);

        },
        GET_CARDS2_FROM_API_AFTER_BACK: async ({commit,getters}) => {
            let data = await Axios.get('/sport/' + getters.CARDS2_GROUP);
            commit('CARDS2_CHANGE', data.data);
            commit('EX_VISIBLE')

        },

        GET_CARDS1_FROM_API: async (context) => {//группы мышц
            let data = await Axios.get('/sport/muscle');
            context.commit('CARDS1_CHANGE', data.data);
        },
        GET_EXERCISE_FROM_API: async ({commit}, payload) => {
            let data = await Axios.get('/sport/' + payload);//выводим страницу с описанием упражнения
            commit('EX_CHANGE', data.data);//данные по упражнению мутируем
            commit('EX_VISIBLE', data.data);//что видим --2 колонки или описание ---переключанм на описание
            commit('EX_EXERCISE_FAVORITE', data.data.image);//упражнение для проверки на фаворит
            let data2 = await Axios.post('/sport/get_favorite', {favorite: data.data.image});//делаем пост запрос с номером упражнения
            //console.log('1---' + data2.data)
            if (data2.status === 200 && data2.data === 1) {//если ответ верно меняем
                commit('FAVORITE', true);//
            } else {
                commit('FAVORITE', false);//
            }

        },

        SET_FAVORITE_FROM_API: async ({commit, getters, dispatch}) => {//установить favorite упражнения
            let data = await Axios.post('/sport/set_favorite', {favorite: getters.EXERCISEFAVORITE});
            //console.log('getters.FAVORITE---'+getters.EXERCISEFAVORITE)
            //console.log('2---' + data.data)
            if (data.status === 200 && data.data === 1) {//если ответ верно меняем
                commit('FAVORITE', true);//
            } else {
                commit('FAVORITE', false);//
            }

        },


    },

    getters: {
        CARDS1(state) {
            return state.cards1;//массив карточек в 1 колонке
        }
        ,
        CARDS2(state) {
            return state.cards2;//массив карточек в 2 колонке
        }
        ,
        CARD_EXERCISE(state) {
            return state.cardExercise;
        }
        ,
        VISIBLE(state) {//что видим --2 колонки или описание
            return state.visible;
        }
        ,
        FAVORITE(state) {//в фаворитах ли упражнениях
            return state.favorite;
        },
        EXERCISEFAVORITE(state) {//упражнение для проверки на фаворит
            return state.exerciseFavorite;
        },
        CARDS2_GROUP(state) {//ссылка на карточки в 2 колонке
            return state.cards2Groupp;
        },
    }
}
