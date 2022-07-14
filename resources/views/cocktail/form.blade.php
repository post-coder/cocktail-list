@extends('layouts.default')

@section('content')
<div id="cocktail-form">
    <a href="{{ route('cocktails.index') }}">Torna indietro</a>
    <h1>{{ isset($cocktail) ? 'Modifica il cocktail "' . $cocktail->name . '"': 'Crea nuovo cocktail' }}</h1>
    
    <form method="post" action="{{ route('cocktails.' . (isset($cocktail) ? 'update' : 'store' ), ['cocktail' => $cocktail->id ?? '']) }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="{{ isset($cocktail) ? 'PUT' : 'POST' }}">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="name" >Nome</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $cocktail->name ?? '' }}" autocomplete="off" />
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="form-group">
                    <label for="content" >Preparazione</label>
                    <textarea name="istructions" id="istructions" class="form-control" rows="4">{{ $cocktail->istructions ?? ''}}</textarea>
                </div>
            </div>

            <div class="col-md-12 mb-3">
                <div class="row row-cols-4">
                    @foreach ($ingredients as $ingredient)
                        <div class="form-check col">
                            {{-- Per ogni tag, dobbiamo controllare se questo tag è incluso nei tags collegati al post. Se sì, metto checked, se non niente --}}
                            <input class="form-check-input" type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}"
                                id="ingredient-{{ $ingredient->id }}"
                                {{ isset($cocktail->name) ? ($cocktail->ingredients->contains($ingredient)  || in_array($ingredient->id, old('ingredients', [])) ? 'checked' : '') : ''}}>
                            <label class="form-check-label" for="ingredient-{{ $ingredient->id }}">
                                {{ $ingredient->name }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <button type="submit" class="form-control btn py-2">Salva</button>
    </form>
</div>
@endsection


