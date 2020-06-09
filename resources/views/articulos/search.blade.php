{!! Form::open(array('url'=>'articulos','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<form class="search-form">
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-search"></i></span></div><input class="form-control" type="text" placeholder="Necesito..." name="searchText" value="{{$searchText}}">
            <div class="input-group-append"><button class="btn btn-light" type="button">Buscar </button></div>
        </div>
</form>
{{Form::close()}}