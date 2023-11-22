@props(['listing_tags'])


@php
$tags = explode(',', $listing_tags);
$trimmed_tags = array_map('trim', $tags);
@endphp
<ul class="flex">
    @foreach ($trimmed_tags as $trimmed_tag)
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
        <a href="/?tag={{$trimmed_tag}}">{{$trimmed_tag}}</a>
    </li>
    @endforeach
</ul>