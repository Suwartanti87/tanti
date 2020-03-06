@extends('layout.index')
@section('content')
@php
$header = ['No', 'Kode','Menu','Price','Foto','Deskripsi','Action'];

$no = 1;
@endphp



<section class="section-margin mb-lg-100">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Featured Food</h4>
        <h2>Fresh taste and great price</h2>
      </div>
      <a href="{{ url('/menu/create') }}" class="btn btn-dark btn-sm">Tambah Menu</a>
 
      <div class="owl-carousel owl-theme featured-carousel">
      	@foreach($ar_menu as $menu)
        <div class="featured-item">
          <td>{{ $menu->foto }}</td>
          <div class="item-body">
            <a href="#">
            	<h5>{{ $menu->idmenu }}</h5>&nbsp;
              <h3>
              	{{ $menu->nama }}</h3>
            </a>
            <p>{{ $menu->keterangan }}</p>
            <div class="item-body">
              <form method="POST" action="{{ route('menu.destroy', $menu->id) }}">
        <a href="{{ route('menu.edit', $menu->id)}}">
                <i class="fas fa-pencil-alt">Update</i>
              </a>
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-link" onclick="return confirm('Yakin Mau Di Hapus?')">
                <i class="fas fa-trash-alt">Delete</i>
                </button>
              </form>
            </div>
          </div>
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">Rp. {{ $menu->harga }}</h3>

            </div>
          
        @endforeach
      </div>
    </div>
    
    </div>
    
  </section>
  @endsection