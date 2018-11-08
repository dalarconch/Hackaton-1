<div class="form-group{{ $errors->has('name') ? ' has-error' : ''}}">
    {!! Form::label('name', 'Nombre: ', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Etiqueta: ', ['class' => 'control-label']) !!}
    {!! Form::text('label', null, ['class' => 'form-control']) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('label') ? ' has-error' : ''}}">
    {!! Form::label('label', 'Permisos: ', ['class' => 'control-label']) !!}
    {!! Form::select('permissions[]', $permissions, isset($role) ? $role->permissions->pluck('name') : [], ['class' => 'form-control', 'multiple' => true]) !!}
    {!! $errors->first('label', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Editar' : 'Crear', ['class' => 'btn btn-primary']) !!}
</div>
