<div class="panel-heading"><h4>Nuevo Comentario</h4></div>
<div class="panel-body">
    {!! Form::open(['url' => '/comentarios', 
                    'method' => 'POST',
                    'class' => 'form-horizontal',
                    'files' => true]
                  ) !!}

        <input type="hidden" name="fkMaterial" value="{{ $res->id }}">
    
    

        <div class="form-group">
            {!! Form::label('detalle', 'Detalle', ['class'=>'col-md-4 control-label']) !!} 
            <div class="col-md-6">
            {!! Form::textarea('detalle',null, ['class'=>'form-control'] ) !!}
            </div>
        </div>  
   
            
        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
            {!! Form::submit('Aceptar', ['class'=>'btn btn-primary']) !!}
            </div>
        </div>
    {!! Form::close() !!}    
</div>
