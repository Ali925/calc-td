<div class="calc-draft-item calc-draft-corner calc-draft-corner__tl">
    <?php $angle = $patternPosition->where('value','=','angle4')->first() ?>
    <div class="calc-title">
        @if($angle->kind == 'radius')
            <?php
            $d = str_word_count($angle->name,1);
            $name = (str_word_count($angle->name) > 2)? $d[0].' '.$d[1] : $angle->name;
            echo $name;
            ?>
        @elseif($angle->kind == 'skos')
            <?php
            $d = str_word_count($angle->name,1);
            $name = (str_word_count($angle->name) > 1)? $d[0] : $angle->name;
            echo $name;
            ?>
        @else
            {{$angle->name}}
        @endif
    </div>

    @foreach($angle->options as $option)
        <div class="calc-radio">
            <input name="corner__bl" type="radio" value="{{$option->id}}"
                   data-place="{{$angle->value}}"
                   data-image="@if(!empty($option->image)){{url('/').'/'.$option->image}}@endif"
                   id="corner__bl-{{$option->id}}"
            >
            <label class="calc-radio-label" for="corner__bl-{{$option->id}}">
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