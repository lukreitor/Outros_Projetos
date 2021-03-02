@extends('layouts.default')

@section('content')

<!-- display success message -->
@if (Session::has('message'))
<div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel purple-bg text-white">
	<div class="panel-heading">Inserir Peça</div>
	<form action="/home" method="post" enctype="multipart/form-data" onsubmit="return showLoad('Inserir Peça')">
		{{ csrf_field() }}
		<div class="panel-body primary-color ">

			<div class="form-group {{ $errors->has('stype') ? 'has-error' : '' }}">
				<label class="label-control">Tipo</label>
				<select name="stype" class="form-control">
					<option value=''>Selecione o tipo de peça</option>
					<option value='T-Shirt'>Camiseta</option>
					<option value='Sweater'>Sweater</option>
					<option value='Jacket'>Jaqueta</option>
					<option value='Formal Shirt'>Roupa Formal</option>
				</select>
				@if ($errors->has('stype'))
				<span class="help-block alert alert-danger">
					<strong>{{ $errors->first('stype') }}</strong>
				</span>
				@endif
			</div>

			<div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
				<label class="label-control">Nome/descrição do produto</label>
				<input type="text" name="sname" class="form-control" placeholder="Please input stock name/description"
					value="{{ old('sname') }}" required="required">
				@if ($errors->has('sname'))
				<span class="help-block alert alert-danger">
					<strong>{{ $errors->first('sname') }}</strong>
				</span>
				@endif
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="form-group {{ $errors->has('ssize') ? 'has-error' : '' }}">
						<label class="label-control">Tamanho</label>
						<select name="ssize" class="form-control" required="required">
							<option value=''>Por favor escolha o tamanho</option>
							<option value='S'>PP</option>
							<option value='S'>P</option>
							<option value='M'>M</option>
							<option value='L'>G</option>
							<option value='XL'>GG</option>
						</select>
						@if ($errors->has('ssize'))
						<span class="help-block alert alert-danger">
							<strong>{{ $errors->first('ssize') }}</strong>
						</span>
						@endif
					</div>
				</div>


				<div class="col-md-2">
					<div class="form-group {{ $errors->has('squantity') ? 'has-error' : '' }}">
						<label class="label-control">Quantidade</label>
						<input type="number" name="squantity" class="form-control" required="required"
							placeholder="Insert quantity" value="{{ old('sname') }}">
						@if ($errors->has('squantity'))
						<span class="help-block alert alert-danger">
							<strong>{{ $errors->first('squantity') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			<br>


			<div class="row">
				<div class="col-md-5">
					<div class="form-group {{ $errors->has('fileUpload') ? 'has-error' : '' }}">
						<label class="label-control">Enviar Foto</label>
						<input type="file" name="fileUpload" class="form-control fileinput"
							data-show-upload="false" required="required">
						<i>OBS: Apenas arquivos jpg,jpeg são permitidos. Tamanho Máximo: 3MB</i>
						@if ($errors->has('fileUpload'))
						<span class="help-block alert alert-danger">
							<strong>{{ $errors->first('fileUpload') }}</strong>
						</span>
						@endif
					</div>
				</div>
			</div>
			<br>

		</div>
		<div class="panel-footer">
			<button type="submit" name="submit" class="btn btn-success">Inserir</button>
			<button type="reset" name="reset" class="btn btn-warning"
				onclick="return confirm('Reset/clear form?');">Resetar</button>
		</div>
	</form>
</div>

@push('scripts')
<script type="text/javascript">
	// for bootstrap file input
	$(function () {
		$("input.fileinput").fileinput({
			allowedFileExtensions: ["jpg", "jpeg"], // set allowed file format
			maxFileSize: 3000, //set file size limit, 1000 = 1MB
		});
	});
</script>
@endpush

@stop