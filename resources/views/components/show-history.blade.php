<table class="w-100">
<tr class="text-center"><th>題名</th><th>著者</th><th>レンタル日時</th><th>返却日時</th></tr>
    @foreach($items as $item)
    <tr>

        <td><div class="">{{$item['book']->title}}</div></td>
        <td><div class="">{{$item['book']->author}}</div></td>
        <td><div class="">{{$item->checkout}}</div></td>
        <td><div class="">{{$item->returned}}</div></td>
    </tr>
    @endforeach
</table>