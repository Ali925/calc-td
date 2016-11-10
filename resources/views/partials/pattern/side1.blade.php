<div class="calc-draft-item calc-draft-side calc-draft-side__t">
    <?php $angle = $patternPosition->where('value','=','side-1')->first() ?>
    <div class="calc-title">{{$angle->name}}</div>
        @foreach($angle->options as $option)
            <div class="calc-radio">
                <input name="side__l-1" type="radio" value="{{$option->id}}" data-place="{{$angle->value}}"
                       id="side__l-1-{{$option->id}}">
                <label class="calc-radio-label" for="side__l-1-{{$option->id}}">
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