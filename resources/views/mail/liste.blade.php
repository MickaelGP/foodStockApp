<style>
    h1{
        text-align: center;
    }
</style>

<div>
    <h1>Bonjour, {{ $name }} </h1>
    <h2>Votre liste de course :</h2>
        @foreach($data as $item)
            <p>{{ $item }}</p>
        @endforeach
</div>
