@extends('layouts.default')

@section('content')

<div class="panel purple-bg text-white mt-3">
		<div class="panel-heading">Lista de Peças</div>

		<div class="panel-body almost-white-bg">

		<div class='table-responsive'>
		<form action="/view" method="post" onsubmit="return showLoad('Deletar Peça?')">
		  <table class='table table-bordered'>
		    <thead class="d-flex justify-content-between">
		      <tr>
		        <th>ID</th>
		        <th>Tipo</th>
		        <th>Nome/Descrição</th>
		        <th>Imagem da Peça</th>
		        <th>Tamanho</th>
		        <th>Quantidade</th>
		        <th>Editar</th>
		        <th>Deletar</th>
		      </tr>
		    </thead>
		    <tbody>
			<!-- iterate through the array of the stocks to display them -->
			@foreach($liststock as $liststocks)
				<tr>
					<td>{{$liststocks->id}}</td>
					<td>{{$liststocks->stk_type}}</td>
					<td>{{$liststocks->stk_name}}</td>
					<td><img src='{{asset("storage/images/$liststocks->id.jpg")}}' width="150px" height="150px" class="img-thumbnail img-responsive" title="{{$liststocks->stk_name.' '.$liststocks->stk_type}}"/></td>
					<td>{{$liststocks->stk_size}}</td>
					<td>{{$liststocks->stk_qty}}</td>


					<td align="center"><a href='/edit/{{$liststocks->id}}' data-toggle="tooltip" title="Editar Peça" class='btn btn-success' onclick='return confirm("Editar Peça?");'><i class='fa fa-fw fa-edit'></i></a> </td>
					<td>
					<button type='submit' class='btn btn-danger' data-toggle="tooltip" title="Apagar Peça"><i class='fa fa-fw fa-trash'></i></button></td>
					<td style='display:none;'><input type='text' name='delstock' value='{{$liststocks->id}}' style='display:none;'></td>
					{{ csrf_field() }}
				</tr>
			@endforeach

			</tbody>
				</table>
				</form>
				<!-- generate markup for pagination links -->
				<center>{{ $liststock->links() }}</center>
			</div>
		</div>
</div>

@stop
