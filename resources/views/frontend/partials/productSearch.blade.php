<div class="agileits_search">
    <form action="{{ route('product.search',) }}" method="get">
        <input name="search" type="search" placeholder="Search Product" required="">
        <button type="submit" class="btn btn-default" aria-label="Left Align">
            <span class="fa fa-search" aria-hidden="true"> </span>
        </button>
    </form>
</div>