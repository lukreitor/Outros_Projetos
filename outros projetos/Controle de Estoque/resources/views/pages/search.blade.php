@extends('layouts.default')

@section('content')

<div class="panel purple-bg text-white mt-3">
		<div class="panel-heading">Pesquisar Peças</div>
		<form action="/search" method="get" onsubmit="return showLoad()">
		<div class="panel-body primary-color">
			<label class="label-control">Nome</label> 
			<input type="text" name="sname" class="form-control" placeholder="Insria o nome ou descriçao da peça" required="required">
			<br>
		
	</div>
	<div class="panel-footer">
		<button type="submit" class="btn btn-success">Pesquisar</button>
	</div>
	</form>
</div>

<!-- check if $search variable is set, display search result -->
@if (isset($search))
	<div class="panel purple-bg text-white">
		<div class="panel-heading">Resultado da Busca</div>
		<div class="panel-body primary-color">

			<div class='table-responsive'>
			  <table class='table table-bordered'>
			    <thead>
			      <tr>
			        <th>ID</th>
			        <th>Tipo</th>
			        <th>Nome/Descrição</th>
			        <th>Tamanho</th>
			        <th>Quantidade</th>
			      </tr>
			    </thead>
			    <tbody>

				@foreach($search as $searchs) 
					<tr>
						<td>{{$searchs->id}}</td>
						<td>{{$searchs->stk_type}}</td>
						<td>{{$searchs->stk_name}}</td>
						<td>{{$searchs->stk_size}}</td>
						<td>{{$searchs->stk_qty}}</td>
					</tr>
				@endforeach

				</tbody>
					</table>
					<center>{{ $search->appends(Request::only('sname'))->links() }}</center>
				</div>

		</div>
		<div class="panel-footer">
			<a href="{{url('/search')}}" class="btn btn-warning">Resetar Busca</a>
		</div>
	</div>
@endif

@stop