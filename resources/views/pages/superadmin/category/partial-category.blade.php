<div class="company-list-table pt-4">
    @if (count($categories))
        @foreach ($categories as $category)
            <div class="company-card company-card-dashboard ">
                <div class="total-user">
                    <h1><span class="text-secondary text-md"> <small>Name</small> </span> <span>{{ $category->name }}</span></h1>
                </div>
                <div class="total-user">
                    <h1><span class="text-secondary text-md"> <small>Description</small> </span> <span>{{ $category->description }}</span></h1>
                </div>

                <div class="company-card-action my-auto">
                    <a href="{{ route('category.edit', $category['id']) }}"><img
                            src="{{ asset('assets/images/edit-icon.svg') }}" alt="" /></a>
                    <form method="POST" action="{{ url('category/' . $category['id']) }}">
                        @csrf
                        @method('DELETE')
                        <a href="javascript:void(0)" onclick="delete_data(this)">
                            <img src="{{ asset('assets/images/delete-icon.svg') }}" alt="Delete" />
                        </a>
                    </form>
                </div>
            </div>
        @endforeach
    @else
        <div class="company-card no-record">
            <h1>No Record Found!</h1>
        </div>
    @endif

</div>

<div class="container pagination-wrapper py-4">
    <div id="pagination-links" class="pagination">
        {{ $categories->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>
