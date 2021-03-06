<div class="calc-draft-item calc-draft-side calc-draft-side__b">
    <?php $angle = $patternPosition->where('value','=','side3')->first() ?>
        <div class="calc-title">
            {{$angle->name}}
        </div>
        @foreach($angle->options as $option)
            <div class="calc-radio">
                <input name="side__r-1" type="checkbox" value="{{$option->id}}"
                       data-place="{{$angle->value}}"
                       data-image="@if(!empty($option->image)){{url('/').'/'.$option->image}}@endif"
                       id="side__r-1-{{$option->id}}"
                >
                <label class="calc-radio-label" for="side__r-1-{{$option->id}}">
                    @if($option->kind == 'soed')
                        <?php
                        $d = explode(" ",$option->name);
                        $name = (count($d) > 3)? $d[0].' '.$d[1].' '.$d[2] : $option->name;
                        echo $name;
                        ?>
                    @elseif($option->kind == 'eurozap')
                        <?php
                        $d = explode(" ",$option->name);
                        $name = (count($d) > 2)? $d[0].' '.$d[1] : $option->name;
                        echo $name;
                        ?>
                    @else
                        {{$option->name}}
                    @endif
                    @if(!empty($option->description))
                        <span class="calc-help-blc">
                            <i class="fa fa-question-circle" aria-hidden="true"></i>
                            <span class="calc-help-text"><span class="calc-bold">@if(!empty($name)) {{$name}} @else {{$option->name}} @endif</span>
                                {{strip_tags($option->description)}}</span>
                        </span>
                    @endif
                </label>
            </div>
        @endforeach
</div>