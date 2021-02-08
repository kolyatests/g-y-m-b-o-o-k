<template>
    <div class="row content-main">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-sm-2">
                    <div class="" @click.prevent="profileUser(user.name)" style='cursor: pointer;' v-if="user.avatar">
                        <img class="avatar-sm media-object img-thumbnail rounded-circle" :src="'/storage/'+user.avatar" alt="" height="50"/>
                    </div>
                    <!--                    <a href="{{ route('profile_user',$user->name) }}">-->
                    <!--                        <img src="{{ Storage::url(\App\Models\User::where('id',$user->id)->first()->getImage())}}"-->
                    <!--                             alt="" height="50" width="50" class=" avatar-sm media-object img-thumbnail rounded-circle" >-->
                    <!--                    </a>-->
                </div>
                <div class="col-sm-10">
                    <div class="d-flex align-items-center media-body">
                        <div class="" @click.prevent="profileUser(user.name)" style='cursor: pointer;'>
                            <span class="profile-link">{{(user.name)}}</span>
                        </div>
                        <!--                        <a href="{{ route('profile_user',$user->name) }}"-->
                        <!--                           class="profile-link">-->
                        <!--                            {{ $user->getNameOrUsername() }}-->
                        <!--                        </a>-->
                    </div>
                    <div class="" v-if="user.location">
                        <p>Откуда: {{user.location}}</p>
                    </div>
                    <!--                    @if ($user->location)-->
                    <!--                    <p>Откуда: {{ $user->location }}</p>-->
                    <!--                    @endif-->
                </div>
            </div>
            <hr>
            <div class="alert alert-primary" v-if="user.walls">
                Пока нет ни одной записи на стене.
            </div>
            <!--            @if ( ! $walls->count() )-->
            <!--            <div class="alert alert-primary" role="alert">-->
            <!--                Пока нет ни одной записи на стене.-->
            <!--            </div>-->
            <!--            @else-->
            <div class="alert alert-primary" v-else>
                <div class="post" v-for="(wall,index) in user.walls" :key="index">
                    <!-- @foreach ($walls as $wall)-->
                    <div class="media">
                        <div class="mr-3" @click.prevent="profileUser(wall.UserName)" style='cursor: pointer;' v-if="wall.UserImage">
                            <img class="avatar-sm media-object img-thumbnail rounded-circle"
                                 :src="'/storage/'+wall.UserImage" alt="" height="50"/>
                        </div>
                        <!--                        <a class="mr-3" href="{{ route('profile_user',$wall->user->name) }}">-->
                        <!--                            <img src="{{ Storage::url(\App\Models\User::where('id',$wall->user->id)->first()->getImage())}}"-->
                        <!--                                 alt="" height="50" width="50" class=" avatar-sm media-object img-thumbnail rounded-circle" >-->
                        <!--                        </a>-->
                        <div class="media-body">
                            <div class="d-flex align-items-center">
                                <div class="" @click.prevent="profileUser(wall.UserName)" style='cursor: pointer;'>
                                    <span class="profile-link">{{wall.UserName}}</span>
                                </div>
                                <!--                                <a href="{{ route('profile_user',$wall->user->name) }}"-->
                                <!--                                   class="profile-link">-->
                                <!--                                    {{ $wall->user->getNameOrUsername() }}</a>-->
                            </div>
                            <div class="" v-html="wall.body"></div>
                            <!--<p>{!!  $wall->body !!}</p>-->
                            <ul class="list-inline">
                                <li class="list-inline-item" v-if="wall.Auth">
                                    <div class="" @click.prevent="setLike(wall.id)" style='cursor: pointer;'>
                                        <span class="profile-link">Лайк</span>
                                    </div>
                                </li>
                                <!--                                @if ( $wall->user->id !== Auth::id() )-->
                                <!--                                <li class="list-inline-item">-->
                                <!--                                    <a href="{{ route('book.wall.like',$wall->id) }}">Лайк</a>-->
                                <!--                                </li>-->
                                <!--                                @endif-->
                                <li class="list-inline-item">
                                    <i class="fa fa-heart" style="color:red"/> {{ wall.LikeCount }}
                                </li>
                                <li class="list-inline-item">{{ wall.Created }}</li>
                            </ul>


                            <div class="post" v-for="(reply,index) in wall.Replies" :key="index">
                                <!-- @foreach ($wall->replies as $reply)-->
                                <div class="media">
                                    <div class="mr-3" @click.prevent="profileUser(reply.UserName)" style='cursor: pointer;' v-if="reply.UserImage">
                                        <img class="avatar-sm media-object img-thumbnail rounded-circle" :src="'/storage/'+reply.UserImage" alt="" height="50"/>
                                    </div>
                                    <!--                                <a class="mr-3" href="{{ route('profile_user',$reply->user->name ) }}">-->
                                    <!--                                    <img src="{{ Storage::url(\App\Models\User::where('id',$reply->user->id)->first()->getImage())}}"-->
                                    <!--                                         alt="" height="50" width="50" class=" avatar-sm media-object img-thumbnail rounded-circle">-->
                                    <!--                                </a>-->
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="" @click.prevent="profileUser(reply.UserName)" style='cursor: pointer;'>
                                                <span class="profile-link">{{reply.UserName}}</span>
                                            </div>
                                            <!--                                        <a href="{{ route('profile_user',$reply->user->name) }}"-->
                                            <!--                                           class="profile-link">-->
                                            <!--                                            {{ $reply->user->getNameOrUsername() }}</a>-->
                                        </div>
                                        <div class="" v-html="reply.body"></div>
                                        <!--                                    <p>{!! $reply->body !!}</p>-->
                                        <ul class="list-inline">
                                            <li class="" v-if="reply.Auth">
                                                <div class="" @click.prevent="setLike(reply.id)" style='cursor: pointer;'>
                                                    <span class="profile-link">Лайк</span>
                                                </div>
                                            </li>
                                            <!--                                        @if ($reply->user->id !== Auth::id())-->
                                            <!--                                        <li class="list-inline-item">-->
                                            <!--                                            <a href="{{ route('book.wall.like',$reply->id) }}">Лайк</a>-->
                                            <!--                                        </li>-->
                                            <!--                                        @endif-->
                                            <li class="list-inline-item">
                                                <i class="fa fa-heart" style="color:red"/> {{ reply.LikeCount }}
                                            </li>
                                            <li class="list-inline-item">{{ reply.Created }}</li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                            <div class="" v-if="reply.UserIsFriend">
                                <!--                                @if ($authUserIsFriend || Auth::id() === $wall->user->id)-->
                                <div class="form-group">
                                <textarea class="form-control" :name="`reply-${ wall.id }`" rows="3" v-on:input='updateMessage'
                                          placeholder="Напишите сообщение"/>
                                </div>
                                <button class="btn btn-outline-secondary btn-lg btn-block mb-4" @click.prevent="sendMessage(reply.id)">Оставить комментарий</button>
                                <!--                                <form method="POST" action="{{ route('book.wall.reply',$wall->id) }}"-->
                                <!--                                      class="mb-4"-->
                                <!--                                      class="needs-validation" novalidate>-->
                                <!--                                    @csrf-->
                                <!--                                    <div class="form-group">-->
                                <!--                                                          <textarea name="reply-{{ wall.id }}"-->
                                <!--                                                                    class="form-control{{ $errors->has(" reply-{$wall->id}") ? ' is-invalid' : '' }}"-->
                                <!--                                                                    placeholder="Прокомментировать" rows="3"></textarea>-->
                                <!--                                        @if ($errors->has("reply-{$wall->id}") )-->
                                <!--                                        <span class="invalid-feedback">{{ $errors->first("reply-{$wall->id}") }} </span>-->
                                <!--                                        @endif-->
                                <!--                                    </div>-->
                                <!--                                    <button type="submit" class="btn btn-primary btn-sm">Написать</button>-->
                                <!--                                </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="" v-if="user.FriendRequestPending">
                <!--            @if ( Auth::user()->hasFriendRequestPending($user) )-->
                <p>В ожидании подтверждения запроса в друзья.</p>
            </div>
            <div class="" v-else-if="user.FriendRequestPending">
                <!--                            @elseif ( Auth::user()->hasFriendRequestReceived($user) )-->
                <!--                <a href="{{ route('book.friend.accept',$user->name) }}"-->
                <!--                   class="btn btn-primary mb-2">Подтвердить дружбу</a>-->
                <div class="" @click.prevent="acceptFriend(user.name)" style='cursor: pointer;'>
                    <div class="btn btn-primary mb-2">Подтвердить дружбу</div>
                </div>
            </div>
            <div class="" v-else-if="user.IsFriendWith">
                <!--            @elseif ( Auth::user()->isFriendWith($user) )-->
                {{user.name }} у Вас в друзьях.
                <div class="" @click.prevent="deleteFriend(user.name)" style='cursor: pointer;'>
                    <div class="btn btn-primary mb-2">Удалить из друзей</div>
                </div>

                <!--                <form action="{{ route('book.friend.delete',$user->name) }}" method="POST">-->
                <!--                    @csrf-->
                <!--                    <input type="submit" class="btn btn-primary my-2" value="Удалить из друзей">-->
                <!--                </form>-->
            </div>
            <div class="" v-else-if="user.AuthNotUser">
                <!--                @elseif ( Auth::id() !== $user->id )-->
                <div class="" @click.prevent="addFriend(user.name)" style='cursor: pointer;'>
                    <div class="btn btn-primary mb-2">Добавить в друзья</div>
                </div>
                <!--                -->
                <!--                <a href="{{ route('book.friend.add',$user->name) }}"-->
                <!--                   class="btn btn-primary mb-2">Добавить в друзья</a>-->
                <!--                @endif-->
            </div>
            <div class="" v-else-if="!user.FriendsCount">
                <h4>Друзья</h4>
                <!--                @if ( ! $user->friends()->count() )-->
                <p>У {{user.name }} нет друзей</p>
            </div>
            <div class="" v-else>
                <h4>Друзья</h4>
                <div class="" v-for="(friend,index) in user.friends" :key="index">
                    <!--                    @foreach ( $user->friends() as $user )-->
                    <div class="row">
                        <div class="col-sm-2">
                            <!--  <a href="{{ route('profile_user',$user->name) }}">-->
                            <!--                                <img src="{{ Storage::url(\App\Models\User::where('id',$user->id)->first()->getImage())}}"-->
                            <!--                                     alt="" height="50" width="50" class=" avatar-sm media-object img-thumbnail rounded-circle">-->
                            <!--                            </a>-->
                            <div class="" @click.prevent="profileUser(friend.name)" style='cursor: pointer;' v-if="user.avatar">
                                <img class="avatar-sm media-object img-thumbnail rounded-circle" :src="'/storage/'+friend.avatar" alt="" height="50"/>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="d-flex align-items-center media-body">
                                <!--                                <a href="{{ route('profile_user', $user->name) }}"-->
                                <!--                                   class="profile-link">-->
                                <!--                                    {{ friend.name }}-->
                                <!--                                </a>-->
                                <div class="" @click.prevent="profileUser(friend.name)" style='cursor: pointer;'>
                                    <span class="profile-link">{{(friend.name)}}</span>
                                </div>
                            </div>
                            <div class="" v-if="friend.location">
                                <p>Откуда: {{friend.location}}</p>
                            </div>
                            <!--                            @if ($user->location)-->
                            <!--                            <p>Откуда: {{ friend.location }}</p>-->
                            <!--                            @endif-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        methods: {
            profileUser(authorName) {
                // this.PROFILE_USER(authorName)
            },
            setLike(likeId) {

            },
            addFriend(userName) {

            },

            acceptFriend(userName) {

            },

            deleteFriend(userName) {

            },


        }
    }
</script>

<style scoped>

</style>
