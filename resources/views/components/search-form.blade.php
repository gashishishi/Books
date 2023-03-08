<form class="d-flex bg-light" id="search-form" action="/search">
    <!-- 検索方法 -->
    <div class="dropdown" >
        <button class="btn search-target-btn dropdown-toggle bg-body" type="button"
         id="search-target-button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
        検索方法
        </button>
        <ul class="dropdown-menu" id="search-target-dropdown" aria-labelledby="search-target-button">
            <li>
                <label class="d-block ps-2">
                <input type="radio" name="search_target" value="title_author" class="dropdown-item" checked>
                書名+著者名
                </label>
            </li>
            <li>
                <label class="d-block ps-2">
                <input type="radio" name="search_target" value="title" class="dropdown-item">
                書名
                </label>
            </li>
            <li>
            <label class="d-block ps-2">
                <input type="radio" name="search_target" value="author" class="dropdown-item">
                著者名
                </label>
            </li>
            
            <li>
                <div class="dropdown">
                <button class="btn search-type-btn dropdown-toggle bg-body" type="button"
                    id="search-type-button" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="inside">
                検索形式
                </button>
                <ul class="dropdown-menu" id="search-type-dropdown" aria-labelledby="search-type-button">
                    <li>
                        <label class="d-block ps-2">
                            <input type="radio" name="search_type" value="and" class="dropdown-item" checked>
                            すべて含む
                            </label>
                    </li>
                    <li>
                        <label class="d-block ps-2">
                            <input type="radio" name="search_type" value="or" class="dropdown-item">
                            いずれかを含む
                            </label>
                    </li>
                </ul>
                </div>
            </li>
        </ul>
    </div>
    <input class="form-control ms-2 me-2" type="search" name="keywords" placeholder="本を検索"
     aria-label="Search" id="search-input" value="{{old('search')}}">
    <button class="btn btn-outline-success bg-body" id="search-button" disabled>Search</button>
</form>
