@extends('layouts.master')

@section('title')
  Dobrodosli
@endsection

@section('content')
@include('includes.message-block')
<div class="row">
    <div class="col-md-6">
        
        <form action="{{route('signup') }}" method="post">
        
            <h3>Registruj se</h3>
            
            <div class="form-group">
                <label for="email">Vasa e-mail adresa</label>
                <input class="form-control" type="text" name="email" id="email" value="{{Request::old('name')}}">
            </div>  
            
             <div class="form-group">
                <label for="first_name">Vasae ime</label>
                <input class="form-control" type="text" name="first_name" id="first_name">
            </div> 
            
            
             <div class="form-group">
                <label for="password">Vasa sifra</label>
                <input class="form-control" type="password" name="password" id="password">
                <br>
                <button type="submit" class="btn btn-primary">Registruj se</button>
                <input type="hidden" name="_token"   value="{{Session::token()}}">
            </div> 
            
        </form>
        
        
        
        
    </div>
    
    
<!--    ----------------------------------------------------->
    

 <div class="col-md-6">
        
        <form action="{{route('signin') }}" method="post">
        
            <h3>Uloguj te se</h3>
            
            <div class="form-group">
                <label for="email">Vasa e-mail adresa</label>
                <input class="form-control" type="text" name="email" id="email">
            </div>  
            
             
            
            
             <div class="form-group">
                <label for="password">Vasa sifra</label>
                <input class="form-control" type="password" name="password" id="password">
                <br>
                <button type="submit" class="btn btn-primary">Uloguj se</button>
                <input type="hidden" name="_token"   value="{{Session::token()}}">
            </div> 
            
        </form>
        
        
    </div>
    
</div>
@endsection