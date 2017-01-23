<div class="calc-top-links">
    <div class="calc-nav">Техническая документация</div>
    <div class="calc-top-links-blc">
        <div class="calc-top-links-inside">
            @foreach($tech_stack as $tech)
                <p><a href="{{url('/').'/'.$tech->file}}" target="_blank"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{$tech->name}}</a></p>
            @endforeach
        </div>
    </div>
</div>