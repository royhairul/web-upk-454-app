@extends('layouts.admin', ['page' => 'Dashboard'])


@section('title', 'Dashboard')

@section('head-optional')
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
  <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" /> -->
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
@endsection

@section('main-content')
<h1 class="text-2xl font-semibold">Selamat Datang, {{ Auth::user()->username }}</h1>
<p class="text-base text-slate-500 leading-8">
  Berikut adalah rekap untuk hari ini
</p>


<div class="mt-8 w-[60%]" id="calendar"></div>

<script>
  $(document).ready(function() {
	  $('#calendar').fullCalendar({
      defaultView: 'month',
      timeZone: 'local',
      now: '@php echo date('Y-m-d', time()) @endphp',
      editable: true,
      selectable: true,
      selectHelper: true,
      select: null,
      events: null,
      eventRender: null
    }); //end fullCalendar block	
  });
</script>
@endsection