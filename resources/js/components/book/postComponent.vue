<template>
    <div>

        <article class="post">
            <div class="post-thumb" @click.prevent="getPost(POST[0].slug)" style='cursor: pointer;' v-if="POST[0].image">
                <img class="" :src="'/storage/uploads/'+POST[0].image" alt=""/>
            </div>
            <div class="post-content">
                <header class="entry-header text-center text-uppercase mb-2">
                    <h6 class="text-decoration-none" v-show="POST[0].hasCategory" @click.prevent="getCategory(POST[0].categorySlug)" style='cursor: pointer;'>
                        {{POST[0].categoryTitle}}</h6>
                    <h1 class="entry-title" @click.prevent="getPost(POST[0].slug)" style='cursor: pointer;'>
                        {{POST[0].title}}</h1>
                </header>
                <div class="entry-content">
                    <div class="h3" v-html="POST[0].description"></div>
                </div>

                <div class="row">
                    <div v-for="(postTag,index) in POST[0].GetTags" :key="index" class="mr-2 mb-2">
                        <button class="btn btn-outline-primary btn-sm btn-block" @click.prevent="tagShow(postTag.slug)" style='cursor: pointer;'>
                            #{{postTag.title}}
                        </button>
                    </div>
                </div>

                <div class="social-share">
                    <div class="" @click.prevent="profileUser(POST[0].AuthorName)" style='cursor: pointer;' v-if="POST[0].AuthorImage">
                        <img class="pull-left img-circle" :src="'/storage/'+POST[0].AuthorImage" alt="" height="50"/>
                        <span class="social-share-title pull-left text-capitalize">By {{POST[0].AuthorName}} On {{POST[0].GetDate}}</span>
                    </div>
                    <h4>
                        <ul class="text-center pull-right">
                            <li v-show="POST[0].IsMyPost">
                                <div class="s-facebook" @click.prevent="postEdit(POST[0].id)" style='cursor: pointer;'>
                                    <i class="fa fa-pencil ml-4"/></div>
                            </li>
                            <li v-show="POST[0].IsMyPost">
                                <div class="s-facebook" @click.prevent="postDestroy(POST[0].id)" style='cursor: pointer;'>
                                    <i class="fa fa-trash ml-4"/></div>
                            </li>
                            <li class="list-inline-item" v-show="POST[0].IsMyPost">
                                <div>
                                    <i class="fa fa-heart ml-4" style="color:red"/>
                                    {{ POST[0].LikesCount}}
                                </div>
                            </li>
                            <li class="list-inline-item" v-show="!POST[0].IsMyPost">
                                <div @click.prevent="postLike(POST[0].id)" style='cursor: pointer;'>
                                    <i class="fa fa-heart ml-4" style="color:red"/>
                                    {{ POST[0].LikesCount}}
                                </div>
                            </li>
                            <li>
                                <div class="s-facebook"><i class="fa fa-eye ml-3"/></div>
                            </li>
                            {{POST[0].views}}

                        </ul>
                    </h4>
                </div>
            </div>
        </article>
        <div v-show="!POST[0].CommentsIsEmpty">
            <div class="bottom-comment" v-for="(comment,index) in POST[0].Comments" :key="index">
                <div class="comment-img">
                    <div class="" @click.prevent="profileUser(comment.AuthorName)" style='cursor: pointer;' v-if="POST[0].AuthorImage">
                        <img class="pull-left img-circle" :src="'/storage/'+comment.AuthorImage" alt="" height="50"/>
                    </div>
                </div>
                <div class="comment-text">
                    <h5>{{comment.AuthorName}}</h5>
                    <p class="comment-date">
                        {{comment.created}}
                    </p>
                    <p class="para">{{comment.text}}</p>
                </div>
                <div class="social-share">
                    <h4>
                        <ul class="text-center pull-right">
                            <div v-if="comment.IsMyComment">
                                <li>
                                    <div class="s-facebook" @click.prevent="commentDestroy(comment.id)" style='cursor: pointer;'>
                                        <i class="fa fa-trash"/></div>
                                </li>
                                <li class="list-inline-item">
                                    <i class="fa fa-heart" style="color:red"/>
                                    {{ comment.LikesCount}}
                                </li>
                            </div>
                            <div v-else-if="!comment.UserIsFriend">
                                <li class="list-inline-item">
                                    <div>
                                        <i class="fa fa-heart" style="color:red"/>
                                        {{ comment.LikesCount}}
                                    </div>
                                </li>
                            </div>
                            <div v-else>
                                <li class="list-inline-item">
                                    <div @click.prevent="commentLike(comment.id)" style='cursor: pointer;'>
                                        <i class="fa fa-heart" style="color:red"/>
                                        {{ comment.LikesCount}}
                                    </div>
                                </li>
                            </div>
                        </ul>
                    </h4>
                </div>
            </div>
        </div>
        <div v-show="POST[0].Auth">
            <div class="leave-comment">
                <h4>ОСТАВЬТЕ КОММЕНТАРИЙ</h4>
                <div class="form-horizontal contact-form">
                    <div class="form-group">
                        <div class="col-md-12">
                                <textarea class="form-control " name="message" rows="6" v-on:input='updateMessage' v-model="message"
                                          :class="{'is-invalid':$v.message.$error}"
                                          placeholder="Напишите сообщение"/>
                        </div>
                        <div class="invalid-feedback" v-if="$v.message.required"></div>

                    </div>

                    <div v-if="SET_ERRORS" v-for="category in SET_ERRORS">
                        <div class="m-alert m-alert--outline alert alert-danger alert-dismissible" role="alert" v-for="error in category">
                            <p>{{ error }}</p>
                        </div>
                    </div>
<!--                    <pre>-->
<!--                       {{$v.message}}-->
<!--                    </pre>-->

                    <button class="btn btn-outline-secondary btn-lg btn-block mb-4" @click.prevent="sendMessage()">Оставить комментарий</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapActions, mapGetters, mapMutations} from "vuex";
    import {minLength, required} from 'vuelidate/lib/validators';


    export default {
        data() {
            return {
                message: '',//+
            }
        },
        watch: {
            ...mapMutations([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'CLEAR_TEXTAREA_FALSE',//+

            ]),
            CLEAR_TEXTAREA() {
                this.message = '';
                this.$store.commit('CLEAR_TEXTAREA_FALSE')
            },

        },
        computed: {
            ...mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'POST',//+
                'COMMENTS_POST',//+
                'POST_TAGS',//+
                'SET_ERRORS',//+
                'GET_MESSAGES',//+
                'CLEAR_TEXTAREA',//+
            ]),

        },
        methods: {
            ...mapActions([//тут прописываем всех, кто будет обращаться к actions-берут данные из сети
                'GET_POST_FROM_API',//+
                'GET_CATEGORY_POSTS_FROM_API',//+
                'GET_TAG_POSTS_FROM_API',//+
                // 'PROFILE_USER',
                // 'POST_EDIT',
                'SET_POST_DESTROY_FROM_API',//+
                'SET_POST_LIKE_FROM_API',//+
                'SET_COMMENT_LIKE_FROM_API',//+
                'SET_COMMENT_DESTROY_FROM_API',//+
                'SET_MESSAGE_FROM_API',//+
            ]),
            ...mapMutations([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта
                'updateMessage',//+

            ]),
            ...mapGetters([//тут прописываем всех, кто будет обращаться к getters-берут данные из стейта

                'GET_MESSAGES',//+
            ]),

            updateMessage(event) {
                // console.table(event.target.value)
                this.$store.commit('updateMessage', event.target.value);
            },


            getPost(post_slug) {
                this.GET_POST_FROM_API(post_slug)//+
                window.scrollTo(0, 0)
            },
            getCategory(categorySlug) {//+
                this.GET_CATEGORY_POSTS_FROM_API(categorySlug)//+
            },
            tagShow(tag_slug) {
                this.GET_TAG_POSTS_FROM_API(tag_slug)//+
            },


            profileUser(authorName) {
                // this.PROFILE_USER(authorName)
            },
            postEdit(post_id) {
                // this.POST_EDIT(post_id)
            },
            postDestroy(post_id) {
                this.SET_POST_DESTROY_FROM_API(post_id)//+
                window.scrollTo(0, 0)
            },
            postLike(post_id) {

                this.SET_POST_LIKE_FROM_API(post_id)//+
            },
            commentLike(comment_id) {

                this.SET_COMMENT_LIKE_FROM_API(comment_id)//+
            },
            commentDestroy(comment_id) {

                this.SET_COMMENT_DESTROY_FROM_API(comment_id)//+
                window.scrollTo(0, 0)
            },
            sendMessage() {
                console.log(this.$v.message)


                if (!this.$v.message.$invalid) {
                    let obj = {
                        message: this.GET_MESSAGES,
                        post_id: this.POST[0].id
                    }
                    this.SET_MESSAGE_FROM_API(obj)
                }else{
                    this.$v.message.$touch()
                }

            },
        },
        // updated() {
        //     this.message=''
        // },
        validations: {

            message: {
                required,
                minLength: minLength(4)
            },
        }


    }
</script>

