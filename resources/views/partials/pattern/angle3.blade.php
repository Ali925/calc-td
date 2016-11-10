<div class="calc-draft-item calc-draft-corner calc-draft-corner__bl">
    <?php $angle = $patternPosition->where('value','=','angle3')->first() ?>
    <div class="calc-title">{{$angle->name}}</div>
    @foreach($angle->options as $option)
        <div class="calc-radio">
            <input name="corner__br" type="radio" value="{{$option->id}}" data-place="{{$angle->value}}" id="corner__br-{{$option->id}}">
            <label class="calc-radio-label" for="corner__br-{{$option->id}}">
                {{$option->name}}
                @if(!empty($option->description))
                    <span class="calc-help-blc">
                   <i class="fa fa-question-circle" aria-hidden="true"></i>
                   <span class="calc-help-text"><span class="calc-bold">{{$option->name}}</span>{{$option->description}}</span>
                 </span>
                @endif
            </label>
        </div>
    @endforeach
</div>