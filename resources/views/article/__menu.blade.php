@php
    viewer()->storage([
        'article_categories' => array_values((new \App\Models\ArticleCategory)->documents()->toArray()),
        'document_selected_categories'=> $selected
    ]);
@endphp

<div class="border bg-white p-3 document-menu" style="overflow-x: scroll">
    <tree-menu
            :items="document_categories"
            link="{{route('document.category.show','')}}"
            :selected="document_selected_categories"
    ></tree-menu>
</div>





