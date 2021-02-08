<?php

namespace App\Models;

use App\Models\Book\BookComment;
use App\Models\Book\BookPost;
use App\Models\Book\BookWall;
use App\Models\Book\BookWallLike;
use App\Models\Shop\UserShopProgram;
use App\Models\Sport\Km;
use App\Models\Sport\Lang;
use App\Models\Sport\Unit;
use App\Models\Sport\UserActivityDays;
use App\Models\Sport\UserFavorites;
use App\Models\Sport\UserGrafikExercise;
use App\Models\Sport\UserProgram;
use App\Models\Sport\UserProgramWeek;
use App\Models\Sport\UserResult;
use App\Models\Sport\UserResultSave;
use App\Models\Sport\UserTrainer;
use App\Models\Sport\UserTraining;
use App\Models\Sport\Weight;
use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use SoftDeletes;
    use  Notifiable;
    use HasFactory;

    public const USER = 0;
    public const ADMIN = 1;
    public const TRAINER = 2;
    public const MODERATOR = 3;
    public const MANAGER = 4;

    public const BAN = 1;
    public const UNBAN = 0;

    public const EMAIL_VERIFIED = 88;
    public const EMAIL_UNVERIFIED = 22;

    protected $fillable = [
        'name',
        'email',
        'login',
        'password',
        'avatar',
        'first_name',
        'last_name',
        'location',
        'gender',
        'verify',
        'provider',
        'provider_id',
        'lang_id',
        'weight_id',
        'unit_id',
        'calendar_id'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'trainer_code',
        'role',
        'ban',
        'lang_id',
        'email',
        'created_at',
        'updated_at',
        'deleted_at',
        'pivot',
    ];

    protected $dates = ['deleted_at'];

    public function userFavorites()
    {
        return $this->hasMany(UserFavorites::class);
    }

    public function trainer()
    {
        return $this->hasOne(UserTrainer::class, 'user_id', 'id');
    }

    public function usersTrainer()
    {
        return $this->hasMany(UserTrainer::class, 'trainer_id', 'id');
    }

    public function weight()
    {
        return $this->hasOne(Weight::class, 'weight_id', 'weight_id')
            ->where('lang',(session('lang_id', 'rus')));
    }

    public function km()
    {
        return $this->hasOne(Km::class, 'km_id', 'unit_id')
            ->where('lang',(session('lang_id', 'rus')));
    }

    public function userTrainings()
    {
        return $this->hasMany(UserTraining::class, 'user_id', 'id')->userId();
    }

    public function userTrainingById($id)
    {
        return $this->hasOne(UserTraining::class, 'user_id', 'id')->where('id',$id)->first();
    }

    public function userTrainingByExerciseProgramWeek($exercise, $day, $program)
    {
        return $this->hasOne(UserTraining::class, 'user_id', 'id')
            ->where('program_week_id', $program)
            ->where('user_program_id', $day)
            ->where('exercise_id', $exercise)->userId()
            ;
    }

    public function userTrainingByProgramWeek($day, $program)
    {
        return $this->hasMany(UserTraining::class, 'user_id', 'id')
            ->where('program_week_id', $program)->where('user_program_id', $day)->userId();
    }

    public function userTrainingByWeek($program)
    {
        return $this->hasMany(UserTraining::class, 'user_id', 'id')
            ->where('program_week_id', $program)->userId();
    }

    public function userTrainingByProgram($day)
    {
        return $this->hasMany(UserTraining::class, 'user_id', 'id')
            ->where('user_program_id', $day)->userId();
    }

    public function userResultSaves()
    {
        return $this->hasMany(UserResultSave::class, 'user_id', 'id')->userId();
    }

    public function userResultSavesByDay($day)
    {
        return $this->hasMany(UserResultSave::class, 'user_id', 'id')
            ->where('activity_days_id', $day)->userId();
    }

    public function userResult()
    {
        return $this->hasMany(UserResult::class, 'user_id', 'id')->userId();
    }

    public function userResultByDay($day)
    {
        return $this->hasMany(UserResult::class, 'user_id', 'id')
            ->where('activity_days_id', $day)->userId();
    }

    public function userProgramWeeks()//
    {
        return $this->hasMany(UserProgramWeek::class, 'user_id', 'id')->userId();
    }

    public function userProgramWeeksByWeek($program)
    {
        return $this->hasOne(UserProgramWeek::class, 'user_id', 'id')
            ->where('program_week_id', $program)->userId();
    }

    public function userPrograms()//
    {
        return $this->hasMany(UserProgram::class, 'user_id', 'id')->userId();
    }

    public function userProgramsByProgramWeek($day, $program)
    {
        return $this->hasMany(UserProgram::class, 'user_id', 'id')
            ->where('program_week_id', $program)->where('user_program_id', $day)->userId();
    }

    public function userProgramsByWeek($program)
    {
        return $this->hasMany(UserProgram::class, 'user_id', 'id')
            ->where('program_week_id', $program)->userId();
    }

    public function userActivityDays()
    {
        return $this->hasMany(UserActivityDays::class, 'user_id', 'id')->userId();
    }

    public function userActivityDaysByDay($day)
    {
        return $this->hasMany(UserActivityDays::class, 'user_id', 'id')
            ->where('date', $day)->userId();
    }

    public function userGrafikExercises()
    {
        return $this->hasMany(UserGrafikExercise::class, 'user_id', 'id')->userId();
    }

    public function unit()
    {
        return $this->hasOne(Unit::class, 'unit_id', 'unit_id');
    }

    public function lang()
    {
        return $this->hasOne(Lang::class, 'id', 'lang_id');
    }

    public function posts()
    {
        return $this->hasMany(BookPost::class);
    }

    public function comments()
    {
        return $this->hasMany(BookComment::class);
    }

    public function userShopPrograms()
    {
        return $this->hasMany(UserShopProgram::class, 'user_id', 'id')->userId();
    }

    public function removeCompletely()
    {
        $this->trainer()->delete();
        $this->userTrainings()->delete();
        $this->userResultSaves()->delete();
        $this->userResult()->delete();
        $this->userProgramWeeks()->delete();
        $this->userPrograms()->delete();
        $this->userActivityDays()->delete();
        $this->userGraficExercises()->delete();
        $this->userShopPrograms()->delete();
        $this->posts()->delete();
        $this->comments()->delete();
        $this->forceDelete();
    }

    public static function add($fields)//# создание пользователя
    {
        $user = new static;
        $user->fill($fields);
        $user->save();
        return $user;
    }

    public function edit($fields)
    {
        $this->toggleAdminTrainer($fields);
        $this->toggleBan($fields);
        unset($fields['moderator']);
        unset($fields['manager']);
        unset($fields['moderator']);
        unset($fields['manager']);
        unset($fields['ban']);
        if (!$fields['password']) {
            unset($fields['password']);
        }
        $this->fill($fields);
        $this->save();
    }

    public function editBan($fields)
    {
        $this->toggleBan($fields);
        unset($fields['ban']);
        $this->fill($fields);
        $this->save();
    }

    public function generatePassword($password, $user)//#
    {
        $this->password = (! $password) ? bcrypt($password) : $user->password;
        $this->save();
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }
        if ($this->avatarl) {
            Storage::delete('uploads/' . $this->avatar); //удаляем предыдущую картинку
        }
        $filename = Str::random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if ($this->avatar) {
            Storage::delete('uploads/' . $this->avatar);
        }
    }

    public function getImage()//# получение картинки
    {
        if ($this->avatar == null) {
            return '/image/no-image.png'; //когда картинки нет -возвращаем какой-то рисунок
        }

        return '/uploads/' . $this->avatar;
    }

    public function makeAdmin()//сделать пользователя админом
    {
        $this->update(['role' => self::ADMIN]);

    }

    public function makeTrainer()//сделать пользователя тренером
    {
        $this->update(['role' => self::TRAINER]);
    }

    public function makeModerator()//сделать пользователя модератором
    {
        $this->update(['role' => self::MODERATOR]);
    }

    public function makeManager()//сделать пользователя менеджером
    {
        $this->update(['role' => self::MANAGER]);
    }

    public function makeNormal()//сделать админа пользователем обычным
    {
        $this->update(['role' => self::USER]);
    }

    public function toggleAdminTrainer($value)//переключатель админ-пользователь-тренер
    {
        if (!isset($value['role'])) {
            return self::USER;
        }
        if ($value['role'] == self::ADMIN) {
            return $this->makeAdmin();
        }
        if ($value['role'] == self::TRAINER) {
            return $this->makeTrainer();
        }
        if ($value['role'] == self::MODERATOR) {
            return $this->makeModerator();
        }
        if ($value['role'] == self::MANAGER) {
            return $this->makeManager();
        }

        return $this->makeNormal();
    }

    public function ban()//забанить юзера
    {
        if ($this->role != self::BAN) {
            $this->ban = self::BAN;
            $this->save();
        }
    }

    public function unban()//разбанить юзера
    {
        $this->update(['ban' => self::UNBAN]);
    }

    public function toggleBan($value)//переключатель бан-разбан
    {
        if (array_key_exists('ban', $value)) {
            $value['ban'] = self::BAN;

            return $this->ban();
        }
        $value['ban'] = self::UNBAN;

        return $this->unban();
    }

    public function isOnline()
    {
        return Cache::has('user-is-online-' . $this->id);
    }

    public function isAdmin()
    {
        return $this->role === self::ADMIN;
    }

    public function isTrainer()
    {
        return $this->role === self::TRAINER;
    }

    public function isModerator()
    {
        return $this->role === self::MODERATOR;
    }

    public function isManager()
    {
        return $this->role === self::MANAGER;
    }

    public function isBan()
    {
        return $this->ban === self::BAN;
    }

    public function isVerified()
    {
        return $this->verify === self::EMAIL_VERIFIED;
    }

    public function getName()// получить имя и фамилию, или имя
    {
        if ($this->first_name && $this->last_name) {
            return "{$this->first_name} {$this->last_name}";
        }
        if ($this->first_name) {
            return $this->first_name;
        }
    }

    public function getNameOrUsername()// получить имя и фамилию, или логин
    {
        return $this->getName() ?: $this->name;
    }

    public function getFirstNameOrUsername()// получить имя или логин
    {
        return $this->first_name ?: $this->name;
    }

    public function walls()// пользователю принадлежит статус (связь один ко многим)
    {
        return $this->hasMany(BookWall::class, 'user_id');
    }

    public function likes()// получить лайки пользователя (связь один ко многим)
    {
        return $this->hasMany(BookWallLike::class, 'user_id');
    }

    public function friendsOfMine()// устанавливаем отношение многие ко многим, мои друзья
    {
        return $this->belongsToMany(self::class, 'book_friends', 'user_id', 'friend_id');
    }

    public function friendOf()// устанавливаем отношение многие ко многим, друг
    {
        return $this->belongsToMany(self::class, 'book_friends', 'friend_id', 'user_id');
    }

    public function friends()// получить друзей
    {
        return $this->friendsOfMine()->wherePivot('accepted', true)->get()
            ->merge($this->friendOf()->wherePivot('accepted', true)->get());
    }

    public function friendRequests()// запросы в друзья
    {
        return $this->friendsOfMine()->wherePivot('accepted', false)->get();
    }

    public function friendRequestsPending()// запрос на ожидание друга
    {
        return $this->friendOf()->wherePivot('accepted', false)->get();
    }

    public function hasFriendRequestPending(self $user)// есть запрос на добавление в друзья
    {
        return (bool)$this->friendRequestsPending()->where('id', $user->id)->count();
    }

    public function hasFriendRequestReceived(self $user)// получил запрос о дружбе
    {
        return (bool)$this->friendRequests()->where('id', $user->id)->count();
    }

    public function addFriend(self $user)// добавить друга
    {
        $this->friendOf()->attach($user->id);
    }

    public function deleteFriend(self $user) // удалить из друзей
    {
        $this->friendOf()->detach($user->id);
        $this->friendsOfMine()->detach($user->id);
    }

    public function acceptFriendRequest(self $user) // принять запрос на дружбу
    {
        $this->friendRequests()->where('id', $user->id)->first()->pivot->update(['accepted' => true]);
    }

    public function isFriendWith(self $user)// пользователь уже в друзьях
    {
        return (bool)$this->friends()->where('id', $user->id)->count();
    }

    public function hasLikedWall(BookWall $wall)// запись уже пролайкана
    {
        return (bool)$wall->likes->where('user_id', $this->id)->count();
    }

    public function hasLikedPost(BookPost $post)
    {
        return (bool)$post->likes->where('user_id', $this->id)->count();
    }

    public function hasLikedComment(BookComment $comment)
    {
        return (bool)$comment->likes->where('user_id', $this->id)->count();
    }

    public function createUser()
    {
        $this->update(
            [
                'lang_id' => 'rus',
                'weight_id' => 1,
                'unit_id' => 1,
                'calendar_id' => 1,
            ]
        );
        Auth::login($this, true);
        session(
            [
                'lang_id' => auth()->user()->lang_id,
                'weight_id' => auth()->user()->weight_id,
                'unit_id' => auth()->user()->unit_id,
                'calendar_id' => auth()->user()->calendar_id,
            ]
        );
    }


}
