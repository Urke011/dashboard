@include('head')

<div class="container">
    <div class="row">
        @foreach($categoriesData as $data)
            <div class="col-md-3 mb-4">
                <div class="card bg-dark text-white h-100">
                    <div class="card-body text-center">
                        <h5 class="card-title">{{ $data['category']->label }}</h5>
                        <img src="{{ $data['category']->img }}" alt="{{ $data['category']->label }}"
                             class="img-fluid mb-3"
                             style="width: 6.25rem; height: 6.25rem; object-fit: cover; border-radius: 0.5rem;">

                        @if($data['receipts']->isNotEmpty())
                            <ul style="list-style: none; padding: 0; margin: 0;">
                                @foreach($data['receipts'] as $receipt)
                                    <li>{{ $receipt->category_name }}: {{ $receipt->formatted_amount }}</li>
                                @endforeach
                            </ul>

                            {{-- If food is a category, display subcategories --}}
                            @if($data['category']->label === 'food')
                                @php
                                    $childCategories = collect($categoriesData)
                                        ->filter(fn($c) => $c['category']->parent_id === $data['category']->id);
                                @endphp

                                @if($childCategories->isNotEmpty())
                                    <hr>
                                    <strong>Podkategorije (ukupno u food):</strong>
                                    <ul style="list-style: none; padding: 0; margin: 0;">
                                        @foreach($childCategories as $child)
                                            <li>{{ $child['category']->label }}: {{ number_format($child['totalAmount'],0,',','.') }} rsd</li>
                                        @endforeach
                                    </ul>
                                @endif
                            @endif

                            <hr>
                            <p>
                                <strong>Total: {{ number_format($data['totalAmount'],0,',','.') }} rsd
                                    ({{ $data['percent'] }}%)</strong>
                            </p>
                        @else
                            <p><i>There are no costs in this category.</i></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
