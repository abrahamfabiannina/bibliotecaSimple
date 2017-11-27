<div class="panel-heading"><h3>Comentarios</h3></div>
	<div class="panel-body">


	<div class="table-responsive">
	<table class="table table-bordered table-responsive table-striped">
	    <thead>

	        <tr>
	            <th> Fecha </th>
	            <th> Comentario </th>	            
	            <th> </th>
	        </tr>
	    </thead>
	    <tbody>
	    	@foreach ($resCom as $f)

	        <tr>
	            <td>{{ $f->fecha }}</td>
	            <td>{{ $f->detalle }}</td>
	            <td>
	            		
	            @if(Auth::user()->rol == 'Administrador')            	
	            	<form action="{{ route('comentarios.destroy',$f->id) }}" method="POST" onclick="return confirm('Seguro que quiere Eliminar')">
	            	  {{ csrf_field() }} <!--token para confirmar la eliminacion por un usuario-->
	            	  <input type="hidden" name="_method" value="DELETE">

	            	  <input type="hidden" name="fkMaterial" value="{{ $res->id }}">

	            	  <button type="submit">E</button>
	            	  
	            	</form>
	            @endif

	            </td>
	        </tr>
	        @endforeach

	     </tbody>
	    </table>

	    <div class="pagination">{!! $resCom->render() !!}</div>

	    @include('comentarios.create')	    
	</div>

	</div>
</div>

    
