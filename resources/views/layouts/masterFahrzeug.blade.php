<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    @include('includes.head')

</head>

<body>


@include('includes.header')


@include('includes.fahrzeug')

<div class="container">
    <div class="row">
        <div class="col-9 col-md-9 col-sm-9">
            @yield('content')
        </div>
        <div class="col-3 col-md-3 col-sm-3">
            <h4 id="h-related-tags">Themen</h4>
            <div>
                <a href="/questions/tagged/motor" class="post-tag no-tag-menu"
                   title="show questions tagged &#39;javascript&#39;" rel="tag">Motor</a>&nbsp;<span
                        class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                            class="item-multiplier-count">1365364</span></span>
            </div>
            <div>
                <a href="/questions/tagged/blech" class="post-tag no-tag-menu"
                   title="show questions tagged &#39;java&#39;"
                   rel="tag">Blech</a>&nbsp;<span class="item-multiplier"><span class="item-multiplier-x">&times;</span>&nbsp;<span
                            class="item-multiplier-count">1242060</span></span>
            </div>
            <div>
                <a href="/questions/tagged/Kotflügel" class="post-tag no-tag-menu" title="show questions tagged &#39;c#&#39;"
                   rel="tag">Kotflügel</a>&nbsp;<span class="item-multiplier"><span
                            class="item-multiplier-x">&times;</span>&nbsp;<span
                            class="item-multiplier-count">1082312</span></span>
            </div>

        </div>
    </div>
</div>


@include('includes.footer')


</body>
</html>