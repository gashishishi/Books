<div class="p-2 {{$class}}">
<p class="m-auto text-center w-75">{{$msg}}</p>
</div>
<table class="w-100">
<tr class="text-center"><th><!- 返却する --></th><th>題名</th><th>著者</th><th>レンタル日時</th><th>返却予定</th></tr>
    @foreach($items as $item)
    <tr>
        <td>
            <form action="/return" method="post" id="form{{$item['id']}}">
                @csrf
                <input type="hidden" name="id" value="{{$item['id']}}">
                <div class="text-center return-icon" 
                    id="return-icon{{$item['id']}}">返却
                </div>
            </form>
        </td>
        <td><div class="">{{$item['title']}}</div></td>
        <td><div class="">{{$item['author']}}</div></td>
        <td><div class="">{{$item['checkout']}}</div></td>
        <td><div class="">{{$item['expectedReturn']}}</div></td>
    </tr>
    @endforeach
</table>