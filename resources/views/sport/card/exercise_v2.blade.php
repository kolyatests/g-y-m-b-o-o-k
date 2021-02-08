<div class="card card-body">
    <div class="row">
        <div class="col-9">
            <h3>{{$exercise->exerciseName->name}}</h3>
            <h4>{{$exercise->description}}</h4>
        </div>
        <div class="col-3 align-self-center">
            <img height="72" width="72" class="bg-light shadow-lg float-right   p-1" alt=""
                 src="{{ Storage::url('image/menu/menu_'.$exercise->exercise_id.'.png')}}"/>
        </div>
    </div>
</div>
