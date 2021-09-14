@foreach($dates->chunk(7) as $dateChunk)
    <tr>
        @foreach($dateChunk as $date)
            <th scope="col"
                @if(Carbon\Carbon::parse($date)->isSaturday() ||
                Carbon\Carbon::parse($date)->isSunday()) style="background-color: lightgreen" @endif>
                {{$date}}
            </th>
        @endforeach
    </tr>
@endforeach