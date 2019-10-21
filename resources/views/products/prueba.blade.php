 @extends('main')

 @section('title')
 prueba
 @endsection

 @section('content')
<div class="container mt-5">
 

  @for ($i = 0; $i < 2; $i++)
    {{ $p[$i] }}
  @endfor

</div>
 @endsection
