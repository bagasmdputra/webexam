@extends('layouts.app')

@section('svg')
<svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
  <symbol id="svg_checkmark" viewBox="0 0 47.9999 48.0002"><path fill-rule="evenodd" clip-rule="evenodd" d="M24.0004,48.0002C10.7454,47.9992,0,37.2551,0,24.0001 C0,10.7447,10.7454,0.0005,24.0004,0c13.2542,0.0005,23.9995,10.7447,23.9995,24.0001 C47.9999,37.2551,37.2546,47.9992,24.0004,48.0002z M39.5563,8.4436C35.5718,4.4609,30.0778,2.0005,24.0004,2 C17.9221,2.0005,12.428,4.4609,8.4436,8.4436C4.461,12.4279,2,17.9218,1.999,24.0001C2,30.078,4.461,35.5719,8.4436,39.5561 c3.9844,3.9828,9.4785,6.4432,15.5568,6.4441c6.0774-0.0009,11.5714-2.4613,15.5559-6.4441 c3.9824-3.9842,6.4435-9.4781,6.4445-15.556C45.9998,17.9218,43.5387,12.4279,39.5563,8.4436z M19.7063,33.7347 c-0.3906,0.3903-1.0244,0.3903-1.415,0l-6.2081-6.2083c-0.3897-0.3903-0.3897-1.0237,0-1.414c0.3905-0.3908,1.0244-0.3908,1.4151,0 l5.5,5.5007L33.773,16.8392c0.3906-0.3908,1.0244-0.3908,1.4153,0c0.3895,0.3903,0.3895,1.0237,0,1.414L19.7063,33.7347z"/></symbol>
  <symbol id="svg_xmark" viewBox="0 0 47.9998 48.0002"><path fill-rule="evenodd" clip-rule="evenodd" d="M24.0004,48.0002C10.7453,47.9997,0,37.2551,0,24.0001 C0,10.7447,10.7453,0,24.0004,0c13.2543,0,23.9994,10.7447,23.9994,24.0001C47.9998,37.2551,37.2547,47.9997,24.0004,48.0002z M39.5564,8.4436C35.5718,4.4604,30.0777,2,24.0004,1.9995C17.922,2,12.428,4.4604,8.4435,8.4436 C4.4611,12.4279,2,17.9218,1.999,24.0001C2,30.078,4.4611,35.5714,8.4435,39.5561c3.9845,3.9833,9.4785,6.4436,15.5569,6.4446 c6.0773-0.001,11.5714-2.4613,15.556-6.4446c3.9824-3.9847,6.4434-9.4781,6.4444-15.556 C45.9998,17.9218,43.5388,12.4279,39.5564,8.4436z M32.6872,32.6864c-0.3908,0.3903-1.0244,0.3903-1.4152,0l-7.293-7.2923 l-7.2921,7.2923c-0.3908,0.3903-1.0245,0.3903-1.4153,0c-0.3896-0.3908-0.3896-1.0233,0-1.4145l7.2932-7.2929l-7.2932-7.2928 c-0.3896-0.3908-0.3896-1.0233,0-1.4145c0.3908-0.3903,1.0245-0.3903,1.4153,0l7.2921,7.2928l7.293-7.2928 c0.3908-0.3903,1.0244-0.3903,1.4152,0c0.3895,0.3912,0.3895,1.0237,0,1.4145L25.394,23.979l7.2932,7.2929 C33.0767,31.6631,33.0767,32.2956,32.6872,32.6864z"/></symbol></svg>
  @endsection

  @section('content')
  <div class="top-gap"></div>
  <section id="hero" class="internal no-bg">
    <div class="inner">
      <h2 class="block-title-red text-center">Pricing</h2>
      <p class="tagline text-center">
        <strong>Simple pricing for all of Exam Package.</strong>
        <span class="sub">You'll pay one price for access to all of Exam Package include Real Exam and Learning.</span>
      </p>
    </div>
  </section>

  <section id="pricing" class="at-top">
    <div class="inner">
      <div class="block-wrap">
        <div class="wrap-title">
          &nbsp;
        </div>

        @foreach($prices as $prices)
        <div class="price-block">
          <h4>{{$prices->name}}</h4>
          <div class="price">
            <sup>IDR</sup><strong>{{$prices->pricing}}</strong><em>.00</em>
            <p class="desc"><strong>{{$prices->duration}}</strong> days</p>
          </div>
          <div class="revenue">
            <p class="desc">
              <strong>{{$prices->description}}</strong>
            </p>
          </div>
          <div class="cta">
            @if(Auth::guest())
            <a class="btn" data-modal-id="#riyo-signup-form" href="{{url('/register')}}">signup</a>
            @else
            @if($prices->pricing!=0)
            <form id="payment-form" method="post" action="snapfinish">
              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
              <input type="hidden" name="result_type" id="result-type" value="">
              <input type="hidden" name="result_data" id="result-data" value="">
            </form>

            <button id="pay-button">Choose</button>
            @else
            <button disabled>Choosen</button>
            @endif
            @endif

          </div>
          </div>
          @endforeach

      </div>
    </section>


    <section id="points" class="full">
      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>

      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>

      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>

      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>

      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>

      <div class="text-block">
        <h4>Cancel at anytime</h4>
        <p>
          Easily cancel your account by pressing a single button. You can export your data at anytime as well.
        </p>
      </div>


    </section>

    <table class="table-generic">
      <thead>
        <tr>
          <th></th>
          <td>
            Free
          </td>
          <td>
            Basic
          </td>
          <td>
            Premium
          </td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th>Monthly Charge</th>
          <td>
            $0
          </td>
          <td>
            $41
          </td>
          <td>
            $41
          </td>
        </tr>
        <tr>
          <th>Individual package</th>
          <td>
            4%
          </td>
          <td>
            1%
          </td>
          <td>
            1%
          </td>
        </tr>
        <tr>
          <th>Cashback</th>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
        </tr>
        <tr>
          <th>Certification</th>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
        </tr>
        <tr>
          <th>Change Password</th>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
          <td>
            Unlimited
          </td>
        </tr>
        <tr>
          <th>Free Exam Mode</th>
          <td>
            <svg class="green"><use xlink:href="#svg_checkmark" /></svg>
          </td>
          <td>
            <svg class="green"><use xlink:href="#svg_checkmark" /></svg>
          </td>
          <td>
            <svg class="green"><use xlink:href="#svg_checkmark" /></svg>
          </td>
        </tr>
        <tr>
          <th>Real Exam Mode</th>
          <td>
            <svg class="red"><use xlink:href="#svg_xmark" /></svg>
          </td>
          <td>
            <svg class="green"><use xlink:href="#svg_checkmark" /></svg>
          </td>
          <td>
            <svg class="green"><use xlink:href="#svg_checkmark" /></svg>
          </td>
        </tr>
        <tr>
          <th>Learning Exam Mode</th>
          <td>
            <svg class="red"><use xlink:href="#svg_xmark" /></svg>
          </td>
          <td>
            <svg class="red"><use xlink:href="#svg_xmark" /></svg>
          </td>
          <td>
            <svg class="red"><use xlink:href="#svg_xmark" /></svg>
          </td>
        </tr>
      </tbody>
    </table>
    @verbatim
    <script type="text/javascript">
    $('#pay-button').click(function (event) {
      event.preventDefault();
      $(this).attr("disabled", "disabled");

      $.ajax({

        url: './snaptoken',
        cache: false,
        success: function(data) {
          //location = data;
          console.log('token = '+data);

          var resultType = document.getElementById('result-type');
          var resultData = document.getElementById('result-data');
          function changeResult(type,data){
            $("#result-type").val(type);
            $("#result-data").val(JSON.stringify(data));
            //resultType.innerHTML = type;
            //resultData.innerHTML = JSON.stringify(data);
          }
          snap.pay(data, {

            onSuccess: function(result){
              changeResult('success', result);
              console.log(result.status_message);
              console.log(result);
              $("#payment-form").submit();
            },
            onPending: function(result){
              changeResult('pending', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            },
            onError: function(result){
              changeResult('error', result);
              console.log(result.status_message);
              $("#payment-form").submit();
            }
          });
        }
      });
    });
    </script>
    @endverbatim
    @endsection
