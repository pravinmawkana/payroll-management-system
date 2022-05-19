<h1>Home Page </h1>
{{-- Blade Display Data Example with compate  --}}
<h1> Name:- {{ $name }} </h1>
@isset($id)
 <h1> Id :-  {{ $id }} </h1>    
 @if($id==12)
  <h1> Id is equalto 12 </h1>  
  @elseif($id==0)
  <h1> Id is equalto 0 </h1>
  @else
  <h1> Invalide ID </h1>
 @endif
@endisset


@for ($i = 0; $i < $id; $i++)
    The current value is {{ $i }} </br>
@endfor

</br>HTML Message :- {!! $msg !!}