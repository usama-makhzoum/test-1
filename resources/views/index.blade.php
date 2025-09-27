<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" style="background-color: gray;">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
       
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col" dir="rtl" lang="ar">
        <div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-750 lg:grow starting:opacity-0">
            <main style="margin: 10%;
			 background-color: aliceblue;
			 padding: 5%;" >
		@if ($cards)
		    <h2 class="" >
			البطاقات
		    </h2>
		    <div style="display: flex;flex-direction: column;">
		    @foreach($cards as $card)
			<div style="">

			    <span style="background-color:red;margin-left:0.3em">#{{$card->id}}</span><div style="display:inline-block">{{ $card->content }}</div>
			<form style="display:inline-block" action="{{ url('/cards', ['id' => $card->id]) }}" method="post">
			    <input type="submit" value="Del" />
			    <input type="hidden" name="_method" value="delete" />
			    <input type="hidden" name="_token" value="{{ csrf_token() }}">
			</form>
		    </div>

		    @endforeach
	    </div>
		@endif

		<div>
		    <h2>أضيف بطاقة:</h2>

		    <form action="/cards" id="cardCreateFrom" method="post">
			@csrf
			
			<textarea id="content" rows="15" cols="20" name="content" placeholder="أضيف النص هنا.."></textarea>
			    <input type="submit" value="Create"  />
		    </form>
		</div>
            </main>
        </div>

    </body>
</html>
