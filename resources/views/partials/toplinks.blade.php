<div class="calc-top-links">
    <div class="calc-nav">Техническая документация</div>
    <div class="calc-top-links-blc">
        <div class="calc-top-links-inside">
            @foreach($tech_stack as $tech)
                <p><a href="{{url('/').'/'.$tech->file}}"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> {{$tech->name}}</a></p>
                <p><a href="#"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Инструкция по монтажу и эксплуатации столешниц.pdf</a></p>
            @endforeach
        </div>
    </div>
</div>