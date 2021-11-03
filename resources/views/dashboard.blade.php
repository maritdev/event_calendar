
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Google Calendar Events') }}
        </h2>
    </x-slot>
      @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
	<div>
	    <table>
		  <tr>
		    <th>Event Name</th>
		    <th>Description</th>
		    <th>Start Time</th>
		    <th>End Time</th>
		    <th>Edit</th>
		  </tr>
	    @if($event_lists)
	        @foreach($event_lists AS $events)
				<tr>
				<td>{{ $events->name }}</td>
				<td>{{ $events->description }}</td>
				<td>{{ \Carbon\Carbon::parse($events->start->dateTime)->format('jS F, Y  h:i:s') }}</td>
				<td>{{ \Carbon\Carbon::parse($events->end->dateTime)->format('jS F, Y h:i:s' ) }}</td>
				<td><a href="{{ route('edit_event', ['id' => $events->id]) }}" class="btn btn-primary">Edit</i></a></td>
				</tr>
	        @endforeach
	    @endif
		</table>
		<button class="button"><a href="{{ url('/add') }}" class="btn btn-primary">Add</i></a></button>

	</div>
</x-app-layout>
