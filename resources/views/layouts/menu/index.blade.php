@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Assign Child Menus</h2>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        <div class="col-md-6">
            <form method="POST" id="menuForm">
                @csrf
                @method('POST')

                <div class="form-group">
                    <label for="parent_menu">Select Parent Menu:</label>
                    <select id="parent_menu" class="form-control" name="parent_id" required>
                        <option value="">-- Select Parent --</option>
                        @foreach($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->display_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Child Menus:</label>
                    <div id="child_menu_container">
                       <div class="row">
                       @foreach($allMenus as $menu)
                        <div class="col-md-4">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="child_menus[]" value="{{ $menu->id }}" id="menu_{{ $menu->id }}">
                                <label class="form-check-label" for="menu_{{ $menu->id }}">{{ $menu->display_name }}</label>
                            </div>
                        </div>
                        @endforeach
                       </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('parent_menu').addEventListener('change', function() {
        var parentId = this.value;
        if (!parentId) return;

        fetch(`/menus/${parentId}/children`)
            .then(response => response.json())
            .then(data => {
                document.querySelectorAll('[name="child_menus[]"]').forEach(checkbox => {
                    checkbox.checked = data.includes(parseInt(checkbox.value));
                });
            });

        // Update form action dynamically
        document.getElementById('menuForm').setAttribute('action', `/menus/${parentId}/update`);
    });
</script>

@endsection