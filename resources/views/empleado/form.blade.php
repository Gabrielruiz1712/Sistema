<h1>{{$modo}} empleado</h1>

@if (count($errors)>0)

<div class="alert alert-danger" role="alert">
    <ul>
    @foreach ($errors->all() as $error )
<li>{{$error}}</li>
@endforeach
</ul>
</div>


@endif
<link href="{{ mix('css/app.css') }}" rel="stylesheet">
<div class="form-grup">

<label for="Nombre"> Nombre </label>
<input type="text" class="form-control" name="Nombre"
 value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre') }}" id="Nombre">
</div>

<div class="form-grup">
<label for="ApellidoPaterno"> Apellido Paterno </label>
<input type="text" class="form-control" name="ApellidoPaterno"
 value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">

</div>

<div class="form-grup">
<label for="ApellidoMaterno"> Apellido Materno </label>
<input type="text" class="form-control" name="ApellidoMaterno"
 value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno') }}"  id="ApellidoMaterno">
</div>

<div class="form-grup">
<label for="Correo"> Correo </label>
<input type="text" class="form-control" name="Correo"
value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo') }}"  id="Correo">

</div>

<div class="form-grup">
    <label for="Password"> Contraseña </label>
    <input type="text" class="form-control" name="Password"
    value="{{isset($empleado->Password)?$empleado->Password:old('Password') }}" id="Password">


</div>

<div class="form-grup">
        <label for="Telefono"> Telefono </label>
        <input type="text" class="form-control" name="Telefono"
        value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono') }}"  id="Telefono">

</div>

<div class="form-grup">
<label for="Foto"> </label>
@if (isset($empleado->Foto))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">
@endif
<input type="File" class="form-control" name="Foto" value=""  id="Foto">
<br>
</div>

<input class="btn btn-success" type="submit" value="{{$modo}} datos">
<a class="btn btn-primary" href="{{url('empleado/')}}">REGRESAR</a>
<br>
