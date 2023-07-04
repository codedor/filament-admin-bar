<div>
    <table>
        @foreach ($data as $key => $value)
            <tr>
                <td>{{ $key }}</td>
                @if (Str::contains($key, 'image'))
                    <td><img src="{{ $value }}" /></td>
                @else
                    <td>{{ $value }}</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
