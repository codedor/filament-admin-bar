<div class="rounded-xl border border-gray-300 bg-white">
    <table class="w-full">
        <tr class="bg-gray-500/5">
            <th class="p-4 text-left text-sm font-medium text-gray-600">Name</th>
            <th class="p-4 text-left text-sm font-medium text-gray-600">Content</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr class="border-t border-gray-300">
                <td class="py-3 px-4">{{ $key }}</td>
                @if (Str::contains($key, 'image'))
                    <td class="py-3 px-4">
                        <img class="w-12 h-12 object-cover rounded-md" src="{{ $value }}" />
                    </td>
                @else
                    <td class="py-3 px-4">{{ $value }}</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
