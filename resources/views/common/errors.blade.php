@if (count($errors) > 0)
 <!--Formating a list of errors-->
 <div class="error alert">
   
   <strong>Something went wrong. Here's propably why:</strong>

   <ul>

     @foreach ($errors->all() as $error)
       <li> {{ $error }} </li>
     @endforeach
   </ul>
 </div>
@endif
