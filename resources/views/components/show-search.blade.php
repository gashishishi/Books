<table class="w-100">
        <tr class="text-center"><th>レンタル</th><th>題名</th><th>著者</th></tr>
        @foreach($items as $item)
        <tr>
            <td>
            <form action="/rent" method="post" id="form{{$item->id}}">
                @csrf
                <input type="hidden" name="id" value="{{$item->id}}">
                <div class="text-center rental-icon"
                id="rental-icon{{$item->id}}">{{$item->stock}}</div>
            </form>
                </td>
                <td>{{$item->title}}</td>
                <td>{{$item->author}}</td>
        </tr>
        @endforeach
    </table>

    {{ $items->appends(request()->input())->links('vendor.pagination.bootstrap-5')}}
