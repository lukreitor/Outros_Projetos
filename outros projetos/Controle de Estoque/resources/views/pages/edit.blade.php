@extends('layouts.default')

@section('content')

 <!-- display success message -->
@if (Session::has('message'))
   <div class="alert alert-success">{{ Session::get('message') }}</div>
@endif

<div class="panel purple-bg text-white">
		<div class="panel-heading">Editar Peça</div>
		<form action="/update" method="post" onsubmit="return showLoad('Atualizar Peça?')">
      {{ csrf_field() }}
		<div class="panel-body">

      <div class="form-group {{ $errors->has('stype') ? 'has-error' : '' }}">
  			<label class="label-control">Tipo</label>
  			<select name="stype" class="form-control" required="required">
  				<option value=''>Tipo de peça</option>
  			<?php

  				$types = array('T-Shirt','Sweater','Jacket','Formal Shirt');

  				foreach($types as $types)
  				{
  					if($editstock->stk_type == $types)
  					{
  						echo "<option value='$types' selected>$types</option>";
  					}
  					else
  					{
  						echo "<option value='$types'>$types</option>";
  					}
  				}
  			?>
  			</select>
  			@if ($errors->has('stype'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('stype') }}</strong>
            </span>
        @endif
			</div>

      <div class="form-group {{ $errors->has('sname') ? 'has-error' : '' }}">
  			<label class="label-control">Descrição e nome da peça</label>
  			<input type="text" name="sname" class="form-control" placeholder="Please input stock name/description" required="required" value="{{$editstock->stk_name}}">
  			@if ($errors->has('sname'))
            <span class="help-block alert alert-danger">
                <strong>{{ $errors->first('sname') }}</strong>
            </span>
        @endif
			</div>

			<div class="col-md-3">
        <div class="form-group {{ $errors->has('ssize') ? 'has-error' : '' }}">
    			<label class="label-control">Tamanho</label>
    			<select name="ssize" class="form-control" required="required">
    				<option value=''>Please choose stock size</option>
    				<?php
    					$size = array('S','M','L','XL');
    					foreach($size as $size)
    					{
    						if($editstock->stk_size == $size)
    						{
    							echo "<option value='$size' selected>$size</option>";
    						}
    						else
    						{
    							echo "<option value='$size'>$size</option>";
    						}
    					}
    				?>
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
    			<label class="label-control">Quantidade em Stock</label>
    			<input type="number" name="squantity" class="form-control" required="required" placeholder="Insert quantity" value="{{$editstock->stk_qty}}">
    			@if ($errors->has('squantity'))
              <span class="help-block alert alert-danger">
                  <strong>{{ $errors->first('squantity') }}</strong>
              </span>
          @endif
        </div>
      </div>
			<br>

			<input type = "hidden" name = "sid" value = "{{$editstock->id}}">

	</div>
	<div class="panel-footer">
		<button type="submit" name="submit" class="btn btn-success">Atualizar</button>
	</div>
	</form>
</div>

@stop
