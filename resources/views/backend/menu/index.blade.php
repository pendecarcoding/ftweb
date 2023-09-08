@extends('backend.layouts.app')
@section('content')

<div class="row">
    <div class="col-lg-8 mx-auto">
        <div style="padding: 20px;" class="card">
            <form id="add-item">{{csrf_field()}}
                <input type="text" name="name" placeholder="Label Menu">
                <input type="text" name="url" placeholder="Url">
                <button type="submit">Add Item</button>
            </form>

            <hr />

            <div class="dd" id="nestable">
                <?php
                    $html_menu = menuTree();
                    echo (empty($html_menu)) ? '<ol class="dd-list"></ol>' : $html_menu;
                ?>
            </div>


            <hr />
            <form action="{{route('menu.store')}}" method="post">{{csrf_field()}}
                <input type="hidden" id="nestable-output" name="menu">
                <button type="submit">Save Menu</button>
            </form>
        </div>
    </div>
</div>


@endsection
@section('modal')
    @include('modals.delete_modal')
@endsection
