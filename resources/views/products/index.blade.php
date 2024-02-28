<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Products</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
 <header>
 <p>black-market!</p>
 @auth 
 <div>
    <p>Beidzot atpakal, {{auth()->user()->name}}</p>
    <form action="/logout" method="post">
    @csrf
    <button>Log out</button>
    </form>
  </div>
 @endauth
  @guest
  <div>
    <p><a href="/login">log in</a><p>
    <p><a href="/register">register</a><p>
    </div>
  @endguest
 </header>
  <main>
  <h1>Products</h1>
    <a href="/products/create">Uztaisīt jaunu</a>
    @foreach($products as $product)
    <article>
      <h2><a href="/products/{{$product->id}}">{{$product->name}}</a></h2>
      <img src={{$product->imageURL}} alt="{{$product->name}}" width="200px"/>
      <p>{{$product->description}}
      </p>
      <p>{{$product->price}} EUR</p>
    </article>
    @endforeach
  </main>
</body>
</html>