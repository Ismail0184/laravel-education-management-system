

<div class="header" >
    <!-- Mask -->
    <!-- Header container -->
    <div class="d-flex align-items-end flex-column bd-highlight mr-5">
        <div class="p-2 bd-highlight">
            <img src="{{ asset('assets') }}/img/theme/{{ Session::get('m')['name'] }}.png" class="img" alt="..." style="width: 200px;; height: 200px;">
        </div>
        <div class="p-2 bd-highlight display-4">{{ Session::get('m')['name'] }} </div>
        <div class="d-flex flex-nowrap">{{ Session::get('m')['address'] }}</div>
        <div class="p-2 bd-highlight">{{ Session::get('m')['mobile'] }}</div>
        <div class="p-2 bd-highlight">Email: {{ Session::get('m')['email'] }}, Website: {{ Session::get('m')['website'] }}</div>
    </div>
  </div> 