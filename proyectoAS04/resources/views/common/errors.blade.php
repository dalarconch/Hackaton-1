<!-- Validacion de errores -->
@if ($errors->any()) <!--any = si existe algun error-->
  <div class="alert alert-danger"> <!-- Clase para capturar los errores y -->
    <ul>
      @foreach($errors->all() as $error) <!--se recorren todos los errores-->
        <li>{{ $error }}</li> <!--se imprime en pantalla el error-->
      @endforeach
    </ul>
  </div>
@endif