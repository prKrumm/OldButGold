<div id="sidebarContainer">
<aside class="themen">
    <h4 id="h-related-tags">Themen</h4>

    @isset($themen)
    @foreach($themen as $thema)
    <div>
        <a href="/treffpunkt" rel="tag"> <span class="label label-default">{{$thema->bezeichnung}}</span></a>&nbsp;<span
                class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                    class="item-multiplier-count">{{$thema->total}}</span></span>
    </div>
    @endforeach
        @endisset
</aside>
</div>
