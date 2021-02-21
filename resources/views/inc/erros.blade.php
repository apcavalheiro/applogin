@if(count($errors)!=0)
    @foreach($errors->all() as $erro)
        <p class="alert alert-danger">{{$erro}}</p>
    @endforeach
@endif

@if(isset($erros_bd))
    @foreach($erros_bd as $erro)
        <p class="alert alert-danger">{{$erro}}</p>
    @endforeach
@endif