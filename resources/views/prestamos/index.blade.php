@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
<div class="pmd-card pmd-card-default pmd-z-depth pmd-card-custom-form">
  <div class="pmd-card-title">
      <h2 class="pmd-card-title-text">Prestamos</h2>
  </div>

		<div class="panel-body">
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

		            	<a href="{{ url('prestamos/'.$f->id.'/edit')}}" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-eye-open"></span>Seleccionar</a>
		        </tr>
		        @endforeach

		     </tbody>
		    </table>
	</div>

	


</div>
</div>
</div>
</div>


@endsection
