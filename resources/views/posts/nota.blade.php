@can('post-edita')
<div class="form-group">
    <strong>Estado:</strong>
    {!! Form::select('estado', array('Pendiente' => 'Pendiente', 'Aprobado' => 'Aprobado' , 'Revision' => 'Revision', 'Rechazado' => 'Rechazado') , null, ['class' => 'form-select']) !!}
</div>
@endcan