@if (count($errors))
    <div class="class-alert-danger">
        <button type="button" class="close" data-dimiss="alert">
                &times;
        </button>
        {{-- Aqui recorro toda la variable de errors y paso cada error a la variable $error --}}
        <ul>
            @foreach ($errors->all() as $error) 
                <li class="fa fa-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif