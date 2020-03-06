@extends('layout.index')
@section('content')
@php
$header = ['No', 'Kode','Menu','Price','Foto','Deskripsi','Action'];
$no = 1;
$ar_kategori = App\Kategori::All();
@endphp

<a href="{{ url('/menu/create') }}" class="btn btn-dark btn-sm">Add</a>
<table border="1">
	<thead>
		<tr>
		@foreach($header as $jdl)
		<th>{{ $jdl }}</th>
		@endforeach
		</tr>
	</thead>
	<tbody>
		@foreach($ar_menu as $menu)
		<tr>
			<td>{{ $no++ }}</td>
			<td>{{ $menu->idmenu }}</td>
			<td>{{ $menu->nama }}</td>
			<td>{{ $menu->harga }}</td>
			<td>{{ $menu->foto }}</td>
			<td>{{ $menu->keterangan }}</td>
			<td>
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
			</td>
		</tr>
		@endforeach
	</tbody>

</table>
<section class="section-margin mb-lg-100">
    <div class="container">
      <div class="section-intro mb-75px">
        <h4 class="intro-title">Featured Food</h4>
        <h2>Fresh taste and great price</h2>
      </div>
      @foreach($ar_kategori as $kategori)
      <div class="section-intro mb-75px">
      
      <h5 class="intro-title"><a href="/pilihkategori">{{ $kategori->kategori }}</a></h5>
      <br/>
      
      </div>
 <a href="{{ url('/menu/create') }}" class="btn btn-dark btn-sm">Tambah Menu</a><br/><br/>
      <div class="owl-carousel owl-theme featured-carousel">
      	@foreach($ar_menu as $menu)
        <div class="featured-item">
          @if(!empty($menu->foto))
            <img src="{{asset('img')}}/{{ $menu->foto}}" width="50%" />
            @else
            <img src="{{asset('img')}}/nopoto.png" width="50%">
            @endif
          
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
          </div>
        </div>
        @endforeach
      </div>
      @endforeach
    </div>
    
  </section>
  @endsection