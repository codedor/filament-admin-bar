<div class="rounded-xl border border-gray-300 bg-white shadow-sm">
    <table class="w-full">
        <tr class="bg-gray-500/5">
            <th class="p-3 text-left text-sm font-medium text-gray-600">Name</th>
            <th class="p-3 text-left text-sm font-medium text-gray-600">Content</th>
        </tr>
        @foreach ($data as $key => $value)
            <tr class="border-t border-gray-300">
                <td class="p-3">{{ $key }}</td>
                @if (Str::contains($key, 'image'))
                    <td class="p-3">
                        <img
                            class="
                                min-w-12 max-w-12 min-h-12 max-h-12 object-cover
                                rounded-lg shadow-lg shadow-slate-300/50
                            "
                            src="{{ $value }}"
                        />
                    </td>
                @else
                    <td class="p-3 font-light text-slate-600">{{ $value }}</td>
                @endif
            </tr>
        @endforeach
    </table>
</div>
