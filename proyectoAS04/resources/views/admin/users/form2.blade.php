<div class="form-group{{ $errors->has('nombre') ? ' has-error' : ''}}">
    {!! Form::label('nombre', 'Nombre: ', ['class' => 'control-label']) !!}
    {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Ejemplo: Juan Pérez']) !!}
    {!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('rut') ? ' has-error' : ''}}">
    {!! Form::label('rut', 'Rut: ', ['class' => 'control-label']) !!}
    {!! Form::text('rut', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Ejemplo: 18.656.310-7']) !!}
    {!! $errors->first('rut', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : ''}}">
    {!! Form::label('email', 'Email: ', ['class' => 'control-label']) !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : ''}}">
    {!! Form::label('password', 'Contraseña: ', ['class' => 'control-label']) !!}
    @php
        $passwordOptions = ['class' => 'form-control'];
        if ($formMode === 'create') {
            $passwordOptions = array_merge($passwordOptions, ['required' => 'required']);
        }
    @endphp
    {!! Form::password('password', $passwordOptions) !!}
    {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
</div>



<div class="form-group{{ $errors->has('roles') ? ' has-error' : ''}}">
    {!! Form::label('role', 'Rol: ', ['class' => 'control-label']) !!}
    {!! Form::select('roles[]', $roles, isset($user_roles) ? $user_roles : [], ['class' => 'form-control', 'multiple' => true]) !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Editar' : 'Crear', ['class' => 'btn btn-primary']) !!}
</div>
