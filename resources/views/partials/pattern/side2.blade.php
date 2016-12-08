<div class="calc-draft-item calc-draft-side calc-draft-side__r">
    <?php $angle = $patternPosition->where('value','=','side2')->first() ?>
    <div class="calc-title">{{$angle->name}}</div>
        <div class="calc-vert-blc">
            @foreach($angle->options as $option)
                <div class="calc-radio">
                    <input name="side__t-1" type="radio" value="{{$option->id}}"
                           data-place="{{$angle->value}}"
                           data-image="@if(!empty($option->image)){{url('/').'/'.$option->image}}@endif"
                           id="side__t-1-{{$option->id}}"
                    >
                    <label class="calc-radio-label" for="side__t-1-{{$option->id}}">
                        {{$option->name}}
                        @if(!empty($option->description))
                            <span class="calc-help-blc">
                                <i class="fa fa-question-circle" aria-hidden="true"></i>
                                <span class="calc-help-text"><span class="calc-bold">{{$option->name}}</span>
                                    {{strip_tags($option->description)}}</span>
                            </span>
                        @endif
                    </label>
                </div>
            @endforeach
        </div>
</div>