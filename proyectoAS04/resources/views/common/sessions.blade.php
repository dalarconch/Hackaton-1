<!-- Verificar que el mensaje enviado en el controlador es correcto -->
@if(session('status'))
  <div class="alert alert-success">
    {{ session('status') }}
  </div>
@endif