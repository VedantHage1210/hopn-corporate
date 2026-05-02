<x-layouts.admin :title="$title">
    <div class="card-panel p-6">
        <form method="POST" action="{{ $action }}" class="space-y-4" enctype="multipart/form-data">
            @csrf
            @if(!empty($method) && strtoupper($method) !== 'POST')
                @method($method)
            @endif

            @foreach($fields as $field)
                @php
                    $name = $field['name'];
                    $type = $field['type'] ?? 'text';
                    $label = $field['label'] ?? ucfirst(str_replace('_', ' ', $name));
                    $value = old($name, data_get($item ?? null, $name, $field['default'] ?? ''));
                    $options = $field['options'] ?? [];
                @endphp
                <div>
                    <label class="mb-1 block text-sm font-medium text-slate-200">{{ $label }}</label>
                    @if($type === 'textarea')
                        <textarea name="{{ $name }}" rows="4" class="w-full rounded border-slate-700 bg-slate-900 text-white">{{ $value }}</textarea>
                    @elseif($type === 'checkbox')
                        <label class="inline-flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="{{ $name }}" value="1" @checked((bool)$value)>
                            Enabled
                        </label>
                    @elseif($type === 'select')
                        <select name="{{ $name }}" class="w-full rounded border-slate-700 bg-slate-900 text-white">
                            @foreach($options as $optionValue => $optionLabel)
                                <option value="{{ $optionValue }}" @selected((string)$optionValue === (string)$value)>{{ $optionLabel }}</option>
                            @endforeach
                        </select>
                    @elseif($type === 'file')
                        <input type="file" name="{{ $name }}" class="w-full rounded border-slate-700 bg-slate-900 text-white">
                    @elseif($type === 'password')
                        <input type="password" name="{{ $name }}" value="" class="w-full rounded border-slate-700 bg-slate-900 text-white">
                    @else
                        <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="w-full rounded border-slate-700 bg-slate-900 text-white">
                    @endif
                    @error($name)
                        <p class="mt-1 text-xs text-rose-300">{{ $message }}</p>
                    @enderror
                </div>
            @endforeach

            @if(($showSubmit ?? true) === true)
                <div class="pt-2">
                    <button type="submit" class="btn-primary">Save</button>
                </div>
            @endif
        </form>
    </div>
</x-layouts.admin>
