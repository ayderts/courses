@php
    $treeMode = false;
    foreach($dataType->browseRows as $row) {
        if($row->field === 'parent_id') {
            $treeMode = isset($row->details->browse_tree);
        }
    }
    $type = request('type');
@endphp

@if($treeMode && $type == 'tree')
    @include('voyager-extension::bread.browse-tree')
@else
    @include('voyager-extension::bread.browse-list', ['treeMode' => $treeMode])
@endif
