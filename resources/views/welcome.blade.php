@extends('layouts.afza')

@section('css')
    <link href="/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="/vendor/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/vendor/swiper/css/swiper-bundle.css">
@endsection

@section('content')
<div class="listcontent-area">
    <aside class="cart-area  dz-scroll" id="cart_area">
        <div class="">
            <div class="h-100" id="home-counter">
                <div class="card">
                    <div class="card-body">
                        <img src="/images/counter.jpg" class="img-fluid mb-5" alt="">
                        <h3 class="title mb-4">Selamat Datang ke Restoran AFZA</h3>
                    </div>
                </div>
            </div>
        </div>
    </aside>
    <div class="row">
        @forelse ($menus as $menu)
        <div class="col-xl-3 col-xxl-4 col-lg-6 col-md-12 col-sm-6">
            <div class="card item-card">
                <div class="card-body p-0">
                    <img src="/{{ $menu->photo ?? 'images/blank.png' }}" style="max-height: 130px; min-height: 130px; min-width: 130px"  class="img-fluid rounded-start" alt="...">
                    <div class="info">
                        <h5 class="card-title">{{ $menu->name }}</h5> <h6 class="text-info">{{ $menu->categories->name }}</h6>
                        <p class="card-text">{{ $menu->description }}</p>
                        <p class="card-text">RM <small class="text-muted">{{ $menu->price }}</small></p>
                    </div>
                </div>
            </div>
        </div>
        @empty

        @endforelse
    </div>
</div>
@endsection

@section('js')
<!-- Counter Up -->
<script src="/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="/vendor/jquery.counterup/jquery.counterup.min.js"></script>

<script src="/vendor/owl-carousel/owl.carousel.js"></script>
<script src="/vendor/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js"></script>
<script>
    function ItemsCarousel()
	{

		/*  testimonial one function by = owl.carousel.js */
		jQuery('.item-carousel').owlCarousel({
			loop:true,
			margin:10,
			nav:true,
			center:true,
			autoWidth:true,
			autoplay:true,
			dots: false,
			items:4,
			navText: ['', ''],
			breackpoint:[


			]

		})
	}

	jQuery(window).on('load',function(){
		setTimeout(function(){
			ItemsCarousel();
		}, 1000);
	});

	function handleTabs(){
		$('#add-order-content,#place-order').css("display","none");
		$('#add-order').on('click',function(){
			$('#add-order-content').css("display","block");
			$('#home-counter').css("display","none");
		})
		$('#place-order-tab').on('click',function(){
			$('#place-order').css("display","block");
			$('#add-order-content').css("display","none");
		})
		$('#place-order-cancel').on('click',function(){
			$('#place-order').css("display","none");
			$('#add-order-content').css("display","block");
		})
		$('#home-counter-tab').on('click',function(){
			$('#home-counter').css("display","block");
			$('#add-order-content').css("display","none");
		})
	}
	handleTabs();

</script>
@endsection
