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
              <small>Preparazione</small>
              {{ $cocktail->istructions }}
            </div>
            <div class="cocktail-ingredients">
              <small>Ingredienti</small>
              @foreach($cocktail->ingredients as $ingredient)
                {{$ingredient->name}},
              @endforeach
            </div>
          </div>
          <div class="cocktail-image">  
            <img src="{{ $cocktail->image }}" alt="">
            <a href="{{ route('cocktails.edit', $cocktail) }}" class="edit-btn-overlay">
              <span>Modifica</span>
            </a>
          </div>

        </li>
          
      @endforeach    

    </ul>
    
  </div>

  <a id="add-cocktail-btn" href="{{ route('cocktails.create') }}">
    <span>
      +
    </span>
  </a>
@endsection