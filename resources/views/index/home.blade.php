@extends('layouts.app')

@section('content')
  <!-- jumbotron -->
  <div class="jumbotron homepage m-0 bg-gradient">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 second">
          <h1 class="display-4 pt-5 mb-3 text-white text-center-sm">{{__('general.welcome_title')}}</h1>
          <p class="text-white text-center-sm">{{__('general.subtitle_welcome')}}</p>
          <p>
           <!-- <a href="{{url('creators')}}" class="btn btn-lg btn-main btn-outline-light btn-w-mb px-4 mr-2" role="button">{{__('general.explore')}}</a> -->

            <a class="btn btn-lg btn-main btn-light btn-w px-4 toggleRegister btn-arrow" href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}">
              {{__('general.getting_started')}}</a>
          </p>
        </div>
        <div class="col-lg-8 first">
        <!--  <img src="{{url('public/img', $settings->home_index)}}" class="img-center img-fluid"> -->
        </div>
      </div>
    </div>
  </div>
  <!-- ./ jumbotron -->
  
  <div class="category-slider" style="background-color: #000000;">
    <div class="category-wrapper">
        @foreach (Categories::where('mode', 'on')->orderBy('name')->get() as $category)
            <a class="category-slide" href="{{ url('category', $category->slug) }}">
                <img src="{{ url('public/img-category', $category->image) }}" alt="Category Image" class="category-image" />
                <span class="category-name">{{ Lang::has('categories.' . $category->slug) ? __('categories.' . $category->slug) : $category->name }}</span>
            </a>
        @endforeach
    </div>
    <div class="arrow-container">
        <button class="prev-button">&#10094;</button>
        <button class="next-button">&#10095;</button>
    </div>
</div>


<style>
   .category-slider {
    overflow: hidden;
    position: relative;
    padding: 10px 0; /* Espaçamento superior e inferior aumentado */
}

.category-wrapper {
    display: flex;
    transition: transform 0.5s ease;
}

.category-slide {
    flex: 0 0 auto;
    margin-right: 20px;
    text-align: center;
    text-decoration: none;
    color: #ffffff;
    transition: transform 0.3s ease;
}

.category-slide:last-child {
    margin-right: 0;
}

.category-slide:hover {
    transform: scale(1.1);
}

.category-image {
    width: 150px;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

.category-name {
    display: block;
    margin-top: 10px;
    font-size: 18px;
    font-family: 'Arial', sans-serif;
}

.arrow-container {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 10px;
}

.prev-button, .next-button {
    background: none;
    color: #ffffff;
    border: none;
    font-size: 33px;
    cursor: pointer;
    outline: none;
}

.prev-button:hover, .next-button:hover {
    color: red
}




.jumbotron {
    background-color: #000000;
}

.section {
    background-color: #000000;
}

.bg-gradient {
    background-color: #000000;
}

.category-slider {
    background-color: #000000;
}

body {
    background-color: #000000;
    
  }




</style>

<script>

    document.addEventListener('DOMContentLoaded', () => {
    const categoryWrapper = document.querySelector('.category-wrapper');
    const slides = document.querySelectorAll('.category-slide');
    const nextButton = document.querySelector('.next-button');
    const prevButton = document.querySelector('.prev-button');
    let currentPosition = 0;
    let intervalId;
    let touchStartX = 0;
    let touchEndX = 0;

    // Clone os primeiros slides e adicione-os ao final do wrapper para criar um loop contínuo
    const numberOfClones = 3; // Ajuste conforme necessário
    for (let i = 0; i < numberOfClones; i++) {
        const clone = slides[i].cloneNode(true);
        categoryWrapper.appendChild(clone);
    }

    const calculateSlideMove = () => {
        const slide = document.querySelector('.category-slide');
        return slide.offsetWidth + 20; // Espaço entre os slides
    };

    const resetPositionIfNeeded = () => {
        const maxOffset = -(categoryWrapper.scrollWidth - window.innerWidth + calculateSlideMove() * numberOfClones);
        if (currentPosition <= maxOffset) {
            // Sem transição para resetar a posição e criar um loop contínuo
            categoryWrapper.style.transition = 'none';
            currentPosition = 0;
            categoryWrapper.style.transform = `translateX(${currentPosition}px)`;
            // Adiciona um delay antes de reativar a transição
            setTimeout(() => {
                categoryWrapper.style.transition = 'transform 0.5s ease';
            }, 20);
        }
    };

    const slideCategories = (direction = 'next') => {
        const moveDistance = calculateSlideMove();
        if (direction === 'next') {
            currentPosition -= moveDistance;
            resetPositionIfNeeded();
        } else {
            currentPosition += moveDistance;
            if (currentPosition > 0) {
                currentPosition = -(categoryWrapper.scrollWidth - window.innerWidth - calculateSlideMove() * numberOfClones);
            }
        }
        categoryWrapper.style.transform = `translateX(${currentPosition}px)`;
    };

    const startAutoSlide = () => {
        if (intervalId) clearInterval(intervalId);
        intervalId = setInterval(() => slideCategories('next'), 3000);
    };

    const stopAutoSlide = () => clearInterval(intervalId);

    nextButton.addEventListener('click', () => {
        slideCategories('next');
        stopAutoSlide();
    });

    prevButton.addEventListener('click', () => {
        slideCategories('prev');
        stopAutoSlide();
    });

    categoryWrapper.addEventListener('mouseover', stopAutoSlide);
    categoryWrapper.addEventListener('mouseout', startAutoSlide);

    categoryWrapper.addEventListener('touchstart', (event) => {
        touchStartX = event.touches[0].clientX;
    });

    categoryWrapper.addEventListener('touchmove', (event) => {
        touchEndX = event.touches[0].clientX;
    });

    categoryWrapper.addEventListener('touchend', () => {
        if (touchStartX - touchEndX > 50) {
            // Swipe da direita para a esquerda, mover para a próxima categoria
            slideCategories('next');
        } else if (touchEndX - touchStartX > 50) {
            // Swipe da esquerda para a direita, mover para a categoria anterior
            slideCategories('prev');
        }
    });

    startAutoSlide();
});

</script>




  

 @if ($settings->widget_creators_featured == 'on')

    @if ($users->count() != 0)
    <!-- Users -->
    <div class="section py-5 py-large" style="background-color: #000000;">
        
        
      <div class="container">
         
          



        <div class="btn-block text-center mb-5">
          <h1 class="txt-white" style="color: #FFFFFF;">{{__('general.creators_featured')}}</h1>
          <p style="color: #FFFFFF;">
            {{__('general.desc_creators_featured')}}
          </p>
        </div>
        <div class="row">

          <div class="owl-carousel owl-theme" >
            @foreach ($users as $response)
              @include('includes.listing-creators', ['textColor' => '#FFFFFF']) <!-- Assumindo que você possa passar um parâmetro para mudar a cor do texto aqui -->
            @endforeach
          </div>

          @if ($usersTotal > $users->total())
          <div class="w-100 text-center mt-4 px-lg-0 px-3">
            <a href="{{url('creators')}}" class="btn-arrow btn btn-lg btn-main btn-outline-primary btn-w px-4" style="color: #FFFFFF; border-color: #FFFFFF;">
              {{__('general.view_all_creators')}}
            </a>
          </div>
          @endif
        </div><!-- End Row -->
      </div><!-- End Container -->
    </div><!-- End Section -->
  @endif
@endif

<!--
  <div class="section py-5 py-large" style="background-color: #000000; color: #FFFFFF;">
    <div class="container" style="background-color: #000000;">
        <div class="btn-block text-center mb-5">
            <h1>{{__('general.header_box_2')}}</h1>
            <p>
                {{__('general.desc_box_2')}}
            </p>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <div class="text-center">
                    <img src="{{url('public/img', $settings->img_1)}}" class="img-center img-fluid" width="200">
                    <h4 class="mt-1">{{__('general.card_1')}}</h4>
                    <p class="text-muted mt-1">{{__('general.desc_card_1')}}</p>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="text-center">
                    <img src="{{url('public/img', $settings->img_2)}}" class="img-center img-fluid" width="200">
                    <h4 class="mt-1">{{__('general.card_2')}}</h4>
                    <p class="text-muted mt-1">{{__('general.desc_card_2')}}</p>
                </div>
            </div>

            <div class="col-lg-4" >
                <div class="text-center">
                    <img src="{{url('public/img', $settings->img_3)}}" class="img-center img-fluid" width="200">
                    <h4 class="mt-1">{{__('general.card_3')}}</h4>
                    <p class="text-muted mt-1">{{__('general.desc_card_3')}}</p>
                </div>
            </div>
        </div>
    </div>
</div> -->



  <!-- Create profile -->
  
  
<div class="section py-5 py-large" style="background-color: #000000; color: #FFFFFF;">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-12 col-lg-7 text-center mb-3">
        <img src="{{url('public/img', $settings->img_4)}}" alt="User" class="img-fluid">
      </div>
      <div class="col-12 col-lg-5">
        <h1 class="m-0 card-profile">{{__('general.header_box_3')}}</h1>
        <div class="col-lg-9 col-xl-8 p-0">
          <p class="py-4 m-0">{{__('general.desc_box_3')}}</p>
        </div>
        <a href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}" class="btn-arrow btn btn-lg btn-main btn-outline-primary btn-w px-4" style="color: #FFFFFF; border-color: #FFFFFF;">
          {{__('general.getting_started')}}
        </a>
      </div>
    </div>
  </div>
</div> 
<!-- End Section -->




  @if ($settings->show_counter == 'on')
  <!-- Counter -->
  <div class="section py-2 bg-gradient style="background-color: #000000;"  text-white">
    <div class="container" style="color: #ffffff;">
      <div class="row">
        <div class="col-md-4">
          <div class="d-flex py-3 my-1 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="bi bi-people align-baseline"></i></span>
            <div>
              <h3 class="mb-0">{!! Helper::formatNumbersStats($usersTotal) !!}</h3>
              <h5>{{__('general.creators')}}</h5>
            </div>
          </div>

        </div>
        <div class="col-md-4">
          <div class="d-flex py-3 my-1 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="bi bi-images align-baseline"></i></span>
            <div>
              <h3 class="mb-0">{!! Helper::formatNumbersStats(Updates::count()) !!}</h3>
              <h5 class="font-weight-light">{{__('general.content_created')}}</h5>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="d-flex py-3 my-1 my-lg-0 justify-content-center">
            <span class="mr-3 display-4"><i class="bi bi-cash-coin align-baseline"></i></span>
            <div>
              <h3 class="mb-0">@if($settings->currency_position == 'left') {{ $settings->currency_symbol }}@endif{!! Helper::formatNumbersStats(Transactions::whereApproved('1')->sum('earning_net_user')) !!}@if($settings->currency_position == 'right'){{ $settings->currency_symbol }} @endif</h3>
              <h5 class="font-weight-light">{{__('general.earnings_of_creators')}}</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@if ($settings->earnings_simulator == 'on')
<!-- Earnings simulator -->
<div class="section py-5 py-large" style="background-color: black; color: white;">
  <div class="container mb-4" style="background-color: #000000; color: #FFFFFF;">
    <div class="btn-block text-center">
      <h1>{{__('general.earnings_simulator')}}</h1>
      <p>
        {{__('general.earnings_simulator_subtitle')}}
      </p>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label for="rangeNumberFollowers" class="w-100">
          {{ __('general.number_followers') }}
          <i class="feather icon-facebook mr-1"></i>
          <i class="feather icon-twitter mr-1"></i>
          <i class="feather icon-instagram"></i>
          <span class="float-right">
            #<span id="numberFollowers">1000</span>
          </span>
        </label>
        <input type="range" class="custom-range" value="0" min="1000" max="1000000" id="rangeNumberFollowers" onInput="$('#numberFollowers').html($(this).val())">
      </div>

      <div class="col-md-6">
        <label for="rangeMonthlySubscription" class="w-100">{{ __('general.monthly_subscription_price') }}
          <span class="float-right">
            {{ $settings->currency_position == 'left' ? $settings->currency_symbol : null }}<span id="monthlySubscription">{{ $settings->min_subscription_amount }}</span>{{ $settings->currency_position == 'right' ? $settings->currency_symbol : null }}
        </span>
        </label>
        <input type="range" class="custom-range" value="0" onInput="$('#monthlySubscription').html($(this).val())" min="{{ $settings->min_subscription_amount }}" max="{{ $settings->max_subscription_amount }}" id="rangeMonthlySubscription">
      </div>

      <div class="col-md-12 text-center mt-4">
        <h3 class="font-weight-light">{{__('general.earnings_simulator_subtitle_2')}}
          <span class="font-weight-bold"><span id="estimatedEarn"></span> <small>{{$settings->currency_code}}</small></span>
          {{ __('general.per_month') }}*</h3>
        <p class="mb-1">
          * {{__('general.earnings_simulator_subtitle_3')}}
        </p>
        @if ($settings->fee_commission != 0)
          <small class="w-100 d-block">* {{__('general.include_platform_fee', ['percentage' => $settings->fee_commission])}}</small>
        @endif
      </div>
    </div>
  </div>
</div>
@endif

<div class="jumbotron m-0 text-white text-center bg-gradient" style="background-color: black;">
  <div class="container position-relative">
    <h1>{{__('general.head_title_bottom')}}</h1>
    <p>{{__('general.head_title_bottom_desc')}}</p>
    <p>
      <a href="{{url('creators')}}" class="btn btn-lg btn-main btn-outline-light btn-w-mb px-4 mr-2" role="button">{{__('general.explore')}}</a>
      <a class="btn-arrow btn btn-lg btn-main btn-light btn-w px-4 toggleRegister" href="{{ $settings->registration_active == '1' ? url('signup') : url('login')}}" role="button">
      {{__('general.getting_started')}}
    </a>
    </p>
  </div>
</div>

@endsection

@section('javascript')




  @if ($settings->earnings_simulator == 'on')
  <script type="text/javascript">

  function decimalFormat(nStr)
  {
    @if ($settings->decimal_format == 'dot')
     var $decimalDot = '.';
     var $decimalComma = ',';
     @else
     var $decimalDot = ',';
     var $decimalComma = '.';
     @endif

     @if ($settings->currency_position == 'left')
     var currency_symbol_left = '{{$settings->currency_symbol}}';
     var currency_symbol_right = '';
     @else
     var currency_symbol_right = '{{$settings->currency_symbol}}';
     var currency_symbol_left = '';
     @endif

      nStr += '';
      var x = nStr.split('.');
      var x1 = x[0];
      var x2 = x.length > 1 ? $decimalDot + x[1] : '';
      var rgx = /(\d+)(\d{3})/;
      while (rgx.test(x1)) {
          var x1 = x1.replace(rgx, '$1' + $decimalComma + '$2');
      }
      return currency_symbol_left + x1 + x2 + currency_symbol_right;
    }

    function earnAvg() {
      var fee = {{ $settings->fee_commission }};
      @if($settings->currency_code == 'JPY')
       $decimal = 0;
      @else
       $decimal = 2;
      @endif

      var monthlySubscription = parseFloat($('#rangeMonthlySubscription').val());
      var numberFollowers = parseFloat($('#rangeNumberFollowers').val());

      var estimatedFollowers = (numberFollowers * 5 / 100)
      var followersAndPrice = (estimatedFollowers * monthlySubscription);
      var percentageAvgFollowers = (followersAndPrice * fee / 100);
      var earnAvg = followersAndPrice - percentageAvgFollowers;

      return decimalFormat(earnAvg.toFixed($decimal));
    }
   $('#estimatedEarn').html(earnAvg());

   $("#rangeNumberFollowers, #rangeMonthlySubscription").on('change', function() {

     $('#estimatedEarn').html(earnAvg());

   });
  </script>
@endif

@if (session('success_verify'))
  <script type="text/javascript">

	swal({
		title: "{{ __('general.welcome') }}",
		text: "{{ __('users.account_validated') }}",
		type: "success",
		confirmButtonText: "{{ __('users.ok') }}"
		});
    </script>
	 @endif

	 @if (session('error_verify'))
   <script type="text/javascript">
	swal({
		title: "{{ __('general.error_oops') }}",
		text: "{{ __('users.code_not_valid') }}",
		type: "error",
		confirmButtonText: "{{ __('users.ok') }}"
		});
    </script>
	 @endif


@endsection
