@extends('layouts.default')

@section('content')
  <div >
    <ul class="cocktail-list">
      @foreach ($cocktails as $cocktail)
        
        <li class="cocktail">
          <div class="cocktail-details">
            <div class="cocktail-name">
              <strong>{{ $cocktail->name }}</strong>
            </div>
            <div class="cocktail-istructions">
              <small>Istruzioni</small>
              {{ $cocktail->istructions }}
            </div>
            <div class="cocktail-ingredients">
              <small>Ingredienti</small>
              @foreach($cocktail->ingredients as $ingredient)
                {{$ingredient->name}},
              @endforeach
            </div>
          </div>
          <img class="cocktail-image" src="{{ $cocktail->image }}" alt="">
        </li>
          
      @endforeach    

    </ul>
    
  </div>
@endsection