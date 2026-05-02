<x-layouts.admin :title="isset($item->id) ? 'Edit User' : 'New User'">
    <div class="mb-6 flex items-center justify-between">
        <h1 class="text-xl font-semibold text-white">{{ isset($item->id) ? 'Edit User' : 'New User' }}</h1>
        <a href="{{ route('admin.users.index') }}" class="text-sm text-slate-400 hover:text-white">← Back</a>
    </div>
    <div class="card-panel p-6 max-w-xl">
        <form method="POST"
              action="{{ isset($item->id) ? route('admin.users.update', $item) : route('admin.users.store') }}"
              class="space-y-4">
            @csrf
            @if(isset($item->id)) @method('PUT') @endif

            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Full Name *</label>
                <input type="text" name="name" value="{{ old('name', $item->name ?? '') }}" required
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @error('name')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Email Address *</label>
                <input type="email" name="email" value="{{ old('email', $item->email ?? '') }}" required
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @error('email')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Password {{ isset($item->id) ? '(leave blank to keep current)' : '*' }}</label>
                <input type="password" name="password" {{ !isset($item->id) ? 'required' : '' }}
                    class="w-full rounded border-slate-700 bg-slate-900 px-3 py-2 text-sm text-white">
                @error('password')<p class="mt-1 text-xs text-rose-300">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-sm font-medium text-slate-200">Roles</label>
                <div class="space-y-2">
                    @foreach(\Spatie\Permission\Models\Role::all() as $role)
                        <label class="flex items-center gap-2 text-sm text-slate-300">
                            <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                @checked(isset($item) && $item->hasRole($role->name))>
                            {{ ucfirst($role->name) }}
                        </label>
                    @endforeach
                </div>
            </div>
            <div class="pt-2 flex gap-3">
                <button type="submit" class="btn-primary">{{ isset($item->id) ? 'Update User' : 'Create User' }}</button>
                <a href="{{ route('admin.users.index') }}" class="rounded border border-slate-600 px-4 py-2 text-sm text-slate-300 hover:text-white">Cancel</a>
            </div>
        </form>
    </div>
</x-layouts.admin>
