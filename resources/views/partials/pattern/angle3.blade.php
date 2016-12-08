<div class="calc-draft-item calc-draft-corner calc-draft-corner__bl">
    <?php $angle = $patternPosition->where('value','=','angle3')->first() ?>
    <div class="calc-title">{{$angle->name}}</div>
    @foreach($angle->options as $option)
        <div class="calc-radio">
            <input name="corner__br" type="radio" value="{{$option->id}}"
                   data-place="{{$angle->value}}"
                   data-image="@if(!empty($option->image)){{url('/').'/'.$option->image}}@endif"
                   id="corner__br-{{$option->id}}"
            >
            <label class="calc-radio-label" for="corner__br-{{$option->id}}">
                @if($option->kind == 'radius')
                    <?php
                    $d = explode(" ",$option->name);
                    $name = (count($d) > 2)? $d[0].' '.$d[1] : $option->name;
                    echo $name;
                    ?>
                @elseif($option->kind == 'skos')
                    <?php
                    $d = explode(" ",$option->name);
                    $name = (count($d) > 1)? $d[0] : $option->name;
                    echo $name;
                    ?>
                @else
                    {{$option->name}}
                @endif
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