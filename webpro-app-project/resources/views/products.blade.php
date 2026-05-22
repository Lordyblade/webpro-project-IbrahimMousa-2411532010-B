<!DOCTYPE html> 
<html> 
<head> 
<title>Data Produk</title> 
</head> 
<body> 
  
<h1>Daftar Produk</h1> 

@extends('layouts.app') 
  
@section('title', 'Products') 
  
@section('content') 

<ul> 
@foreach ($products as $product) 
<li>{{ $product->name }} - Rp {{ number_format($product->price, 0, ',', '.') }}</li>    
@endforeach 
</ul> 
  
</body> 
</html> 