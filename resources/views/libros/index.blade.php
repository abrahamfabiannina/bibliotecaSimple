@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Libros</h2>
  </div>

	<div class="panel-body">
		<div class="form-group">
		<a href="{{ url('libros/create') }}" class="btn btn-primary ">Nuevo</a>
	</div>
	<div class="pmd-table-card pmd-card pmd-z-depth">
	
	<table id="datatable" class="table pmd-table table-striped table-hover table">

	    <thead>

	        <tr>
	            <th> Descripcion </th>
	            <th> Cantidad </th>
	            <th> Existencia </th>
	            <th>  </th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($res as $f)

	        <tr>
	            <td>{{ $f->descripcion }}</td>
	            <td>{{ $f->cantidad }}</td>
	            <td>{{ $f->existencia }}</td>
	            <td>
	            	<a href="{{ url('libros/'.$f->id)}}" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-eye-open"></span></a>
	            	<a href="{{ url('libros/'.$f->id.'/edit')}}" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-edit"></span></a>

	            	<!--form action="{{ route('libros.destroy', $f->id) }}" method="post" onclick="return confirm()"  style="display: inline">
	            		<input type="hidden" name="_method" value="DELETE">
	            		{{ csrf_field() }}
	            		<button type="submit" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash"></span></button>
	            	</form-->
				
				<!--Boton de confirmacion MODAL para Eliminar -->
				<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteComment{{$f->id}}">
                  <span class="glyphicon glyphicon-trash"></span>
                </button>
                <!-- Ventana modal para eliminar -->
                <div class="modal fade" id="deleteComment{{$f->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="pmd-card-title-text">Desea Eliminar este Registro</h3>
                      </div>
                      <div class="modal-body">
                       Libro : {{$f->descripcion}} 
                       					
                      </div>
                      <div class="modal-footer">
                       		<form action="{{ route('libros.destroy', $f->id) }}" method="post" >
								   <input type="hidden" name="_method" value="DELETE">
								   {{ csrf_field() }}
								   <button type="submit" class="btn btn-warning ">Eliminar</button>
								   <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
				         	</form>						
                       
                      </div>
                    </div>
                  </div>
                </div>
                <!--Boton de confirmacion MODAL para Eliminar -->	


	            	
	            </td>
	           
	           

	        </tr>
	        @endforeach

	     </tbody>
	    </table>




					




	    	</div>

			</div>


	</div>
</div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
 $('.confirmdelete').click(function(e) {
            e.preventDefault();
            var href = $(this).attr('href');
            var jobname = $(this).data('jobname');
            return vex.dialog.confirm({
                message: 'Are you sure you want to withdraw job ' + jobname + '?',
                callback: function(confirmed) {
                    if (confirmed) {
                        window.location.href = href;
                    }
                }
            });
        });
</script>


@endsection
